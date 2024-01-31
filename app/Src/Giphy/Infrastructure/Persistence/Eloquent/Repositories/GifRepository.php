<?php

namespace App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories;

use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\Gif as GifEloquent;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\Log as LogEloquent;
use Ghanem\Giphy\Facades\Giphy;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\User as UserEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Src\Giphy\Domain\Entity\Gif as EntityGif;
use App\Src\Giphy\Domain\Repository\GifRepositoryInterface ;
class GifRepository implements GifRepositoryInterface
{
    use HasFactory;
    private $gifModelEloquent;
    private $userModelEloquent;

    public function __construct() {
        $this->gifModelEloquent = new GifEloquent();
        $this->userModelEloquent = new UserEloquent();
        $this->logModelEloquent = new LogEloquent();
    }
    function findByName(string $name, int $limit=25, int $offset=0) : array {
        $giphys = Giphy::search($name,$limit,$offset);
        foreach ($giphys->data as $giphy) {
            $gifModel= new EntityGif($giphy->id,$giphy->slug,$giphy->images->original->url);
            $gifs[]=["id"=>$gifModel->getId(),"name"=>$gifModel->getName(),"path"=>$gifModel->getPath()];
        }
        return $gifs;
    }

    function findByGifId(string $id) : EntityGif {
        $gif = Giphy::getByID($id);
        $gifModel= new EntityGif($gif->data->id,$gif->data->slug,$gif->data->images->original->url);

        return $gifModel;
    }

    function save(string $gif_id,string $nick, int $user_id) : void {

        $gif = Giphy::getByID($gif_id);
        $user=$this->userModelEloquent->where("id",$user_id)->first();
        $this->gifModelEloquent->gifId=$gif->data->id;
        $this->gifModelEloquent->name=$gif->data->slug;
        $this->gifModelEloquent->path=$gif->data->images->original->url;
        $this->gifModelEloquent->save();

        $user->gifs()->attach($this->gifModelEloquent->id);
        $user->save();

    }


}
