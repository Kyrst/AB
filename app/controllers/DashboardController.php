<?php
use Kyrst\Base\Helpers\Ajax as Ajax;

class DashboardController extends ApplicationController
{
	public $layout = 'layouts/dashboard';

	function __construct()
	{
		parent::__construct();

		if ( $this->user === NULL )
		{
			header('Location: /');
			exit;

			return Redirect::to('home');
		}

		// Mars Admin
		$this->load_lib('mars-admin', true);
	}

	public function index()
	{
		$this->display();
	}

	public function settings()
	{
		$post = Input::all();

		if ( count($post) > 0 )
		{
			if ( $this->is_ajax )
			{
				$validation = Validator::make
				(
					$post,
					array
					(
						'first_name' => array('required'),
						'last_name' => array('required')
					)
				);

				$ajax = new Ajax($this->notice);

				if ( $validation->fails() )
				{
					$ajax->set_validation($validation);
				}
				else
				{
					// Save settings
					$this->user->first_name = trim($post['first_name']);
					$this->user->last_name = trim($post['last_name']);
					$this->user->birthdate = date('Y-m-d', strtotime(trim($post['birthdate'])));
					$this->user->save();
				}

				$ajax->add_action('#user_name', 'html', $this->user->get_name());

				$ajax->output();
			}
			else
			{
				// Upload profile picture
				User::upload_profile_picture(Input::file('profile_picture'), $this->user->id);

				$this->user->avatar = 'yes';
				$this->user->save();

				return Redirect::route('dashboard/settings')
					->with('default_tab', 'profile_picture');
			}
		}

		$default_tab = Session::has('default_tab') ? Session::get('default_tab') : 'general';

		$this->assign('default_tab', $default_tab);

		$this->assign('user_id', $this->user->id, 'js');

		$this->display
		(
			NULL,
			'',
			true,
			array
			(
				'bootstrap-datepicker',
				'jcrop'
			)
		);
	}

	public function inbox()
	{
		$this->display();
	}
}