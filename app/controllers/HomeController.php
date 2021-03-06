<?php
use Kyrst\Base\Helpers\Ajax as Ajax;
use Kyrst\Base\Helpers\Email as Email;

class HomeController extends ApplicationController
{
	public function index()
	{
		$this->load_lib('jquery-lazyload');
		$this->load_lib('jquery-transit');
		$this->load_lib('scrollorama');
		$this->load_lib('animateWithCSS');

		$this->display();
	}

	public function login()
	{
		if ( $this->user !== NULL )
		{
			return Redirect::route('dashboard');
		}

		$post = Input::all();

		if ( $post )
		{
			$validation = Validator::make
			(
				$post,
				array
				(
					'email' => array('required'),
					'password' => array('required')
				)
			);

			$ajax = new Ajax($this->ui);

			if ( $validation->fails() )
			{
				//$ajax->set_validation($validation);
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

				$this->user = Auth::user();

				if ( $this->user->num_logins === 1 )
				{
					$this->user->first_time = 'no';
				}

				$this->user->num_logins++;
				$this->user->save();

				return Redirect::route('dashboard');
				//$ajax->redirect('dashboard');
			}
			catch ( Exception $e )
			{
				//$ajax->output_with_error($e->getMessage());
				$this->ui->add_error($e->getMessage());
			}

			return Redirect::back();
		}

		$this->display(NULL, 'Login to Acting Bio', false);
	}

	public function log_out()
	{
		Auth::logout();

		return Redirect::route('home');
	}

	public function sign_up()
	{
		if ( $this->user !== NULL )
		{
			return Redirect::route('dashboard');
		}

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

			$result = Email::send
			(
				'welcome_beta',
				'Welcome to ActingBio!',
				$this->user->email,
				array
				(
					'email' => 'info@actingbio.com',
					'name' => 'ActingBio'
				),
				array
				(
					'code' => $this->user->code
				)
			);

			$ajax->redirect('dashboard');

			return $ajax->output();
		}

		$this->display(NULL, 'Sign Up for Acting Bio', false, array('bootstrap-datepicker'));
	}

	public function newsletter_submit()
	{
		global $env;

		if ( !$this->is_ajax || !($post = Input::all()) )
		{
			return;
		}

		$ajax = new Ajax($this->notice);

		// Check if e-mail is valid
		if ( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) )
		{
			return $ajax->output_with_error('Please enter a valid e-mail address.');
		}

		$email = trim($post['email']);

		// Only add if it hasn't been added already
		$result_user = User::where('email', '=', $email);

		if ( $result_user->count() === 0 )
		{
			$user = User::register($email, str_random(8), '', '');
		}
		else
		{
			$user = $result_user->firstOrFail();
		}

		// Send e-mail
		try
		{
			$result = Email::send
			(
				'welcome_beta',
				'Welcome to ActingBio!',
				$user->email,
				array
				(
					'email' => 'info@actingbio.com',
					'name' => 'ActingBio'
				),
				array
				(
					'code' => $user->code
				)
			);
		}
		catch ( Swift_TransportException $e )
		{
			$result = $e->getMessage();
		}

		error_log($email . ' signed up for BETA. Mail result: ' . ($result === 1 ? 'OK' : 'Fail') . ' (' . (string)$result . ')');

		return $ajax->output();
	}

	public function terms()
	{
		$this->display
		(
			NULL,
			'Terms & Conditions'
		);
	}

	public function privacy()
	{
		$this->display
		(
			NULL,
			'Privacy'
		);
	}
}