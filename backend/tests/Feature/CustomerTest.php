<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A feature test_the_customer.
     *
     * @return void
     */
    public function test_the_customer()
    {
        $login = $this->post('api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123"
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $data = $login['data']['id'];
        $token = $login['token'];

        $this->json('GET', 'api/customer/'.$data, [], ['Authorization' => 'Bearer ' . $token,'Accept' => 'application/json',])
        ->assertStatus(200)->assertJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }

     /**
     * A feature test_create_customer_if_email_exits.
     *
     * @return void
     */
    public function test_create_customer_if_email_exits()
    {
        $this->json('POST', 'api/customer', [
            "name" => "johndoes",
            "email" => "johndoe@example.net",
            "password" => "abcerty",
            "address" => "Jl. Nagrek",
        ], ['Accept' => 'application/json'])
        ->assertStatus(422)
        ->assertJsonStructure([
            "message",
            "errors" => [
                "email" => []
            ]
        ]);
    }

    /**
     * A feature test_create_customer_success.
     *
     * @return void
     */
    public function test_create_customer_success()
    {
        $this->json('POST', 'api/customer', [
            "name" => "afrianda",
            "email" => "alfabet@example.net",
            "password" => "aflabet123",
            "address" => "Jl. Nagrek",
        ], ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            "success",
            "message",
        ]);
    }

     /**
     * A feature test_update_customer_success.
     *
     * @return void
     */
    public function test_update_customer_success()
    {
        $login = $this->post('api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123",
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $id = $login['data']['id'];
        $token = $login['token'];

        $this->json('PUT', 'api/customer/'.$id, [
            "name" => "jon adreson",
            "email" => "johndoe@example.net",
            "address" => "Jl. Nagrek",
        ], ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            "success",
            "message",
        ]);
    }

     /**
     * A feature test_update_customer_if_email_exits.
     *
     * @return void
     */
    public function test_update_customer_if_email_exits()
    {
        $login = $this->post('api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123"
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $id = $login['data']['id'];
        $token = $login['token'];

        $this->json('PUT', 'api/customer/'.$id, [
            "name" => "jon adreson",
            "email" => "doejohn@example.net",
            "address" => "Jl. Nagrek",
        ], ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])
        ->assertStatus(422)
        ->assertJsonStructure([
            "message",
            "errors" => [
                "email" => []
            ]
        ]);
    }

     /**
     * A feature test_delete_customer_then_logout.
     *
     * @return void
     */
    public function test_delete_customer_then_logout()
    {
        $login = $this->post('api/auth/login', [
            "email" => "johndoe@example.net",
            "password" => "123123"
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $id = $login['data']['id'];
        $token = $login['token'];

        $this->json('DELETE', 'api/customer/'.$id, [], ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])
        ->assertStatus(204);
    }
}
