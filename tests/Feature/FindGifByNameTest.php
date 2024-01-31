<?php

namespace Tests\Feature;

use Tests\TestCase;

class FindGifByNameTest extends TestCase
{
    /** @test */
    public function find_by_name(): void
    {
        $responseToken =  $this->postJson('/api/login',$this->dataLogin())
        ->assertStatus(200);

        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$responseToken["token"],
        ])->getJson('/api/gif/search?'.$this->dataFind())
        ->assertStatus(200);
       
    }

    private function dataLogin()
    {
        return [
            'grant_type' => "client_credentials",
            'email' => "andrestejerina97@gmail.com",
            'password' => "prexTest"
        ];
    }
    private function dataFind()
    {
        return http_build_query([
            'name' => "cara",
            'limit' => "5",
            'offset' => "1"
        ]);
    }
}
