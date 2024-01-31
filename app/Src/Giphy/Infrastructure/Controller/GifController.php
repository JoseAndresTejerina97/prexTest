<?php

namespace App\Src\Giphy\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Src\Giphy\Application\UseCase\CreateFavoriteGifUseCase;
use App\Src\Giphy\Application\UseCase\CreateLog;
use App\Src\Giphy\Application\UseCase\FindByIdGifUseCase;
use App\Src\Giphy\Application\UseCase\FindGifByNameUseCase;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories\GifRepository;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories\LogRepository;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GifController extends Controller
{

    private $gifRepository;
    private $userRepository;
    private $createLogUseCase;
    private $userId;
    private $userName;
    private $userEmail;

    public function __construct(GifRepository $gifRepository, UserRepository $userRepository, LogRepository $logRepository)
    {
        $this->gifRepository = $gifRepository;
        $this->userRepository = $userRepository;
        $this->createLogUseCase = new CreateLog($logRepository);
        $this->userId=Auth::guard("api")->user()->id;
        $this->userName=Auth::guard("api")->user()->name;
        $this->userEmail=Auth::guard("api")->user()->email;
    }


    public function findByName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'limit' => 'numeric',
            'offset' => 'numeric',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $gifs = new FindGifByNameUseCase($this->gifRepository);
        $gifs = $gifs->execute($request->name, $request->input("limit", 25), $request->input("offset", 0));
        $response=response($gifs);
        //add to log
        $this->createLogUseCase->execute("gif.findByName",$request->getContent(),$response->content(), $response->getStatusCode(),$request->ip(),$this->userName,$this->userEmail,$this->userId);
        return $response;
    }

    public function findById($id, Request $request)
    {
        $gifUseCase = new FindByIdGifUseCase($this->gifRepository);
        $gif = $gifUseCase->execute($id);
        $response=response(["id" => $gif->getId(), "name" => $gif->getName(), "path" => $gif->getPath()]);
        
        //add to log
        $this->createLogUseCase->execute("gif.findById",json_encode(["id"=>$id]),$response->content(), $response->getStatusCode(),$request->ip(),$this->userName,$this->userEmail,$this->userId);

        return $response;
    }

    public function setFavorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gif_id' => 'required|string',
            'alias' => 'required|string',
            'user_id' => 'numeric|string',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $gifUseCase = new CreateFavoriteGifUseCase($this->gifRepository);
        try {
            $gifUseCase->execute($request->gif_id, $request->alias, $request->user_id);
             //add to log
            $this->createLogUseCase->execute("gif.setFavorite",$request->getContent(),"",200,$request->ip(),$this->userName,$this->userEmail,$this->userId);
        } catch (\Throwable $th) {
            $this->createLogUseCase->execute("gif.setFavorite",$request->getContent(),"",500,$request->ip(),$this->userName,$this->userEmail,$this->userId);
            return ["error" => $th->getMessage()];
        }
        return [];
    }

}
