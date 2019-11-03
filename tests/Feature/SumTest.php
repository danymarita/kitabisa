<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SumTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST',route('sum.process'),[
            'x' => 1,
            'y' => 2
        ]);

        $response->assertStatus(200)->assertJson([
            'rc' => '00',
            'result' => 3
        ]);
    }
}
