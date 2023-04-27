<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
     /**
     * A feature test_the_transaction_by_customer.
     *
     * @return void
     */
    public function test_the_transaction_by_customer()
    {
        $login = $this->post('api/auth/login', [
            "email" => "doejohn@example.net",
            "password" => "123123",
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $token = $login['token'];

        $this->json('GET', 'api/transaction', [], ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            "success",
            "message",
            'data',
        ]);
    }

    /**
     * A feature test_create_transaction.
     *
     * @return void
     */
    public function test_create_transaction()
    {
        $login = $this->post('api/auth/login', [
            "email" => "doejohn@example.net",
            "password" => "123123",
        ],['Accept' => 'application/json'])->assertStatus(200)->decodeResponseJson();

        $token = $login['token'];


        $this->json('POST', 'api/transaction',
            [
                "products" => [
                        [
                         "id" => 1,
                         "quantity" => 2
                        ],
                        [
                            "id" => 2,
                            "quantity" => 1
                        ]
                ],
                "payment_method" => [
                                [
                                  "id" => 1,
                                  "amount" => 14000
                                ],
                                [
                                     "id" => 2,
                                     "amount" => 10000
                                ]
                ]
            ], ['Authorization' => 'Bearer ' . $token, 'Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            "success",
            "message",
            'data',
        ]);
    }
}
