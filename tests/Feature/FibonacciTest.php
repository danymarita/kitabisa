<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST',route('fibonacci.process'),[
            'number' => 4
        ]);

        $response->assertStatus(200)->assertJson([
            'rc' => '00',
            'result' => [0, 1, 1, 2]
        ]);
    }
}
