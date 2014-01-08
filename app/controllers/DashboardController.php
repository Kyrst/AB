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

	public function work_experience()
	{
		$this->display
		(
			NULL,
			'Work Experience',
			true,
			array
			(
				'jquery-ui',
				'jquery-tagsinput',
				'bootstrap-wysiwyg'
			)
		);
	}

	public function save_personal_statement()
	{
		$ajax = new Ajax($this->notice);

		$input = Input::all();

		$this->user->personal_statement = $input['personal_statement'];
		$this->user->save();

		$ajax->output();
	}

	public function get_personal_statement()
	{
		$ajax = new Ajax($this->notice);

		$ajax->add_data('personal_statement', $this->user->print_personal_statement());

		$ajax->output();
	}

	public function get_autocomplete_languages()
	{
		$input = Input::all();

		$term = $input['term'];

		$result_languages = Language::where('name', 'LIKE', '%' . $term . '%');

		$langauges = array();

		foreach ( $result_languages->get() as $langauge )
		{
			$langauges[] = $langauge->name;
		}

		return Response::json($langauges);
	}

	public function save_autocomplete_language()
	{
		$result = array
		(
			'error' => '',
			'data' => array
			(
				'already_existed' => true
			)
		);

		$input = Input::all();

		$value = trim($input['value']);

		// Check if exists in database
		$exists = (Language::where('name', $value)->count() === 1);

		if ( !$exists )
		{
			$language = new Language();
			$language->name = $value;
			$language->save();

			$result['already_existed'] = false;
		}

		return Response::json(array());
	}
}