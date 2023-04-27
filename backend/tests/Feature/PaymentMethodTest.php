<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    /**
     * A feature test_the_payment_method.
     *
     * @return void
     */
    public function test_the_payment_method()
    {
        $this->json('GET', 'api/payment-method', [], [
            'Accept' => 'application/json',
        ])->assertStatus(200)->assertJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }
}
