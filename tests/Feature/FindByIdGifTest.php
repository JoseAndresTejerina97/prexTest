<?php

namespace Tests\Feature;

use Tests\TestCase;

class FindByIdGifTest extends TestCase
{
    /** @test */
    public function find_by_id(): void
    {
        $responseToken =  $this->postJson('/api/login',$this->dataLogin())
        ->assertStatus(200);

        $response=$this->withHeaders([
            'Authorization' => 'Bearer '.$responseToken["token"],
        ])->getJson('/api/gif/'.$this->dataFind())
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
        return "qIfG2193qAwGgw4hdg";
    }
}
