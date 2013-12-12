<?php
class DashboardController extends ApplicationController
{
	public $layout = 'layouts/dashboard';

	function __construct()
	{
		parent::__construct();

		// Mars Admin
		$this->load_lib('mars-admin', true);
	}

	public function index()
	{
		$this->display();
	}
}