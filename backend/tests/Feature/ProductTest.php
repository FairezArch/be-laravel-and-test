<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
     /**
     * A feature test_the_product.
     *
     * @return void
     */
    public function test_the_product()
    {
        $this->json('GET', 'api/product', [], [
            'Accept' => 'application/json',
        ])->assertStatus(200)->assertJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }
}
