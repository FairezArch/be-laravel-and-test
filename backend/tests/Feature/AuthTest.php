<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{


     /**
     * A feature test_the_auth_login.
     *
     * @return void
     */
    public function test_the_auth_login()
    {
        $this->json('POST', 'api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123"
        ],['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data',
                'token',
        ]);
    }

    /**
     * A feature test_the_auth_login.
     *
     * @return void
     */
    public function test_the_auth_login_if_incorrect()
    {
        $this->json('POST', 'api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "1231235"
        ],['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure([
                'message',
        ]);
    }

    /**
     * A feature test_the_auth_logout.
     *
     * @return void
     */
    public function test_the_auth_logout()
    {
        $login = $this->post('api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123"
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $token = $login['token'];

        $this->json('POST', 'api/auth/logout',['Accept' => 'application/json'], [
            'Authorization' => 'Bearer ' . $token,
        ])->assertStatus(204);
    }
}
