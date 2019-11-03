<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrimeNumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST',route('prime-number.process'),[
            'number' => 4
        ]);

        $response->assertStatus(200)->assertJson([
            'rc' => '00',
            'result' => [2, 3, 5, 7]
        ]);
    }
}
