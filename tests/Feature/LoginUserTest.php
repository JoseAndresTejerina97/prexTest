<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    /** @test */
    public function send_body_empty(): void
    {
        $this->postJson('/api/login', [])
        ->assertStatus(201);

       
    }

    /** @test */
    public function token_retrieved(): void
    {
        $this->postJson('/api/login',$this->data())
        ->assertStatus(200);

    }

    private function data()
    {
        return [
            'grant_type' => "client_credentials",
            'email' => "andrestejerina97@gmail.com",
            'password' => "prexTest"
        ];
    }
}
