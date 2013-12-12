<?php
use Kyrst\Base\Helpers\Ajax as Ajax;
use Kyrst\Base\Helpers\Notice as Notice;

class HomeController extends ApplicationController
{
	public function index()
	{
		$this->display();
	}

	public function login()
	{
		if ( $this->is_ajax )
		{
			$post = Input::all();

			$validation = Validator::make
			(
				$post,
				array
				(
					'email' => array('required'),
					'password' => array('required')
				)
			);

			$ajax = new Ajax($this->notice);

			if ( $validation->fails() )
			{
				$ajax->set_validation($validation);
			}

			try
			{
				Auth::attempt
				(
					array
					(
						'email' => $post['email'],
						'password' => $post['password']
					),
					true
				);
			}
			catch ( Exception $e )
			{
				$ajax->output_with_error('INVALID_CREDENTIALS');
			}

			$ajax->output();
		}

		$this->display('Login to Acting Bio', false);
	}

	public function sign_up()
	{
		if ( $this->is_ajax )
		{
			$post = Input::all();

			$validation = Validator::make
			(
				$post,
				array
				(
					'email' => array('required', 'unique:users,email'),
					'username' => array('required', 'unique:users,username'),
					'first_name' => array('required'),
					'last_name' => array('required'),
					'birthdate' => array('required'),
					'password' => array('required'),
					'password_verify' => array('required', 'same:password')
				)
			);

			$ajax = new Ajax($this->notice);

			if ( $validation->fails() )
			{
				$ajax->set_validation($validation);
			}

			$this->user = User::register($post['email'], $post['alias'], $post['password'], $post['first_name'], $post['last_name'], $post['birthdate']);

			$ajax->redirect(URL::route('dashboard'));

			$ajax->output();
		}

		$this->display('Sign Up for Acting Bio', false, array('bootstrap-datepicker'));
	}

	public function newsletter_submit()
	{
		if ( !$this->is_ajax || !($post = Input::all()) )
		{
			return;
		}

		$ajax = new Ajax($this->notice);

		// Check if e-mail is valid
		if ( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) )
		{
			$ajax->output_with_error('Please enter a valid e-mail address.');
		}

		$email = trim($post['email']);

		// Only add if it hasn't been added already
		if ( User::where('email', '=', $email)->count() === 0 )
		{
			User::register($email, str_random(8), '', '');
		}

		$ajax->output();
	}
}