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
        $this->assertTrue(true);
    }

    public function testLoginPost(){
	    $response = $this->call('POST', '/login', [
	        'name' => 'lethach',
	        'password' => 'zxcv1234',
	        '_token' => csrf_token()
	    ]);
	    $this->assertEquals(200, $response->getStatusCode());
	    $this->assertEquals('auth.login', $response->original->name());
	}

	public function testEquality()
    {
        $this->assertEquals(
            [1, 2, 3, 4, 5, 6],
            ['1', 2, 33, 4, 5, 6]
        );
    }
}
