<?php

namespace Tests\Feature;

use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\Gif;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateFavoriteGifTest extends TestCase
{
    /** @test */
    public function favorite_gif_is_saved(): void
    {
        $responseToken =  $this->postJson('/api/login',$this->dataLogin())
        ->assertStatus(200);
        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$responseToken["token"],
        ])->postJson('/api/gif/favorite',$this->dataCreateGif())
        ->assertStatus(200);

        $gif= Gif::where('gifId',$this->dataCreateGif()["gif_id"])->first();
        $this->assertNotNull($gif);
       
    }

    private function dataLogin()
    {
        return [
            'grant_type' => "client_credentials",
            'email' => "andrestejerina97@gmail.com",
            'password' => "prexTest"
        ];
    }
    private function dataCreateGif()
    {
        return [
            'gif_id' => "qIfG2193qAwGgw4hdg",
            'alias' => "mi favorito",
            'user_id' => "1"
        ];
    }
}
