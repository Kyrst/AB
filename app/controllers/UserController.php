<?php
class UserController extends ApplicationController
{
	function __construct()
	{
		$username = Session::get('username');
	}

	public function index()
	{
		$this->display();
	}
}