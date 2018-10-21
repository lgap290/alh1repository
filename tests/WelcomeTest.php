<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    public function test_welcome_a_guest_user()
    {
        $this->assertSame(welcome(), 'Welcome guest!');
    }
	public function test_welcome_a_known_user()
	{
		$user = new \App\User(['name' => 'Duilio']);
	 
		auth()->login($user);
	 
		$this->assertSame(welcome(), 'Welcome Duilio!');
	}
}
