<?php

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \Illuminate\Support\Facades\Auth;

class IntegrationCase extends TestCase {

	use TestTrait, DatabaseTransactions;

	protected $baseUrl = 'http://localhost';

	public function setUp(){
		parent::setUp();
		Session::flush();
		\Illuminate\Support\Facades\Cache::flush();
		$this->resetEvents();
	}

	public function tearDown(){
		if(Auth::check()){
			Auth::logout();
		}
	}

	protected function sign_in(){
		$this->visit('login')
			->submitForm('Login', ['loginUsername' => $this->user['username'], 'loginpassword' => $this->user['password']])
			->see('You have logged in.')
			->seePageIs('/user');
	}

	public function flush_flash(){
		Session::forget('success');
		Session::forget('error');
	}

}