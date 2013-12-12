<?php
class AdminController extends ApplicationController
{
	public $layout = 'layouts/admin';

	public function index()
	{
		$this->display();
	}
}