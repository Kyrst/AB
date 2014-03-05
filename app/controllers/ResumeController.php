<?php
class ResumeController extends ApplicationController
{
	public $layout = 'layouts/resumes/default';

	private $theme = 'default';

	function __construct()
	{
		parent::__construct();
	}

	public function setupLayout($from_no_controller = false)
	{
		parent::setupLayout($from_no_controller);

		$this->include_header();
	}

	public function resume($username)
	{
		try
		{
			$profile_user = User::where('username', $username)->firstOrFail();

			$this->assign('profile_user', $profile_user);
		}
		catch ( Exception $e )
		{
			$this->notice->add_error('Could not find actor.');

			return Redirect::route('home');
		}

		$this->set_theme('default');

		$this->display('resume/' . $this->theme);
	}

	private function set_theme($theme_name)
	{
		$this->theme = $theme_name;
	}
}