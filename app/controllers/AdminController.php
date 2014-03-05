<?php
class AdminController extends ApplicationController
{
	public $layout = 'layouts/admin';

	function __construct()
	{
		parent::__construct();

		if ( $this->user === NULL || !$this->user->is_admin() )
		{
			header('Location: /');
			exit;

			return Redirect::to('dashboard');
		}
	}

	public function setupLayout($from_no_controller = false)
	{
		parent::setupLayout($from_no_controller);

		$this->include_header();
	}

	public function index()
	{
		$this->display();
	}

	public function users()
	{
		$users = User::all();

		$this->assign('num_users', count($users));
		$this->assign('users', $users);

		$this->display();
	}
}