<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        {
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/register', ['email' => 'jovenlusterio16@gmai.com', 'password' => 'test123']);
    
            $response
                ->assertStatus(201)
                ->assertJson([
                    'created' => true,
                ]);
        }
    }
}
