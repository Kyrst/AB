<?php
class ProfileController extends ApplicationController
{
	public $layout = 'layouts/public_profile';

	public function public_profile($username)
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

		$this->display();
	}
}