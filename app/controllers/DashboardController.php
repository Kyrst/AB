<?php
class DashboardController extends ApplicationController
{
	public $layout = 'layouts/dashboard';

	function __construct()
	{
		parent::__construct();

		if ( $this->user === null )
		{
			header('Location: /');
			exit;

			return Redirect::to('home');
		}

		// Mars Admin
		//$this->load_lib('mars-admin', true);
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

	public function settings()
	{
		$post = Input::all();

		if ( count($post) > 0 )
		{
			if ( $this->is_ajax )
			{
				$ajax = new \Kyrst\Base\Helpers\Ajax($this->ui);

				// Save general tab
				if ( $post['type'] === 'general' )
				{
					$first_name = trim($post['first_name']);
					$middle_name = trim($post['middle_name']);
					$last_name = trim($post['last_name']);
					$birthdate = trim($post['birthdate']);
					$gender = $post['gender'];

					$this->user->first_name = $first_name;
					$this->user->middle_name = $middle_name !== '' ? $middle_name : NULL;
					$this->user->last_name = $last_name;
					$this->user->birthdate = $birthdate !== '' ? trim(date('Y-m-d', strtotime($birthdate))) : NULL;
					$this->user->gender = $gender !== '' ? $gender : NULL;
					$this->user->save();

					return $ajax->output();
				}
				elseif ( $post['type'] === 'physical_attributes' )
				{
					list($height_feet, $height_inches) = $post['height'] !== '' ? explode(',', $post['height']) : NULL;

					$weight = trim($post['weight']);
					$weight_measurement = $post['weight_measurement'];
					$hair_type_id = $post['hair_type'];
					$hair_length_id = trim($post['hair_length']);
					$eye_color_id = $post['eye_color'];
					$ethnic_group_id = $post['ethnic_appearance'];

					$this->user->height_feet = $height_feet !== '' ? $height_feet : NULL;
					$this->user->height_inches = $height_inches !== '' ? $height_inches : NULL;
					$this->user->weight = $weight !== '' ? $weight : NULL;
					$this->user->weight_measurement = $weight_measurement;
					$this->user->hair_type_id = $hair_type_id !== '' ? $hair_type_id : NULL;
					$this->user->hair_length_id = $hair_length_id !== '' ? $hair_length_id : NULL;
					$this->user->eye_color_id = $eye_color_id !== '' ? $eye_color_id : NULL;
					$this->user->ethnic_group_id = $ethnic_group_id !== '' ? $ethnic_group_id : NULL;
					$this->user->save();

					return $ajax->output();
				}
				else
				{
					die('nothing save far, save general here');
				}
			}
			else
			{
				// Upload profile picture
				User::upload_profile_picture(Input::file('profile_picture'), $this->user->id);

				$this->user->avatar = 'yes';
				$this->user->save();

				return Redirect::route('dashboard/settings')
					->with('default_settings_tab', 'profile_picture');
			}
		}

		// Default tab
		$default_tab = Session::has('default_settings_tab') ? Session::get('default_settings_tab') : 'general';
		$this->assign('default_tab', $default_tab);

		// Clear default settings tab session
		Session::remove('default_settings_tab');

		$this->assign('user_id', $this->user->id, 'js');

		// Hair colors
		$hair_types = Hair_Type::all();
		$this->assign('hair_types', $hair_types);

		// Hair lengths
		$hair_lengths = Hair_Length::all();
		$this->assign('hair_lengths', $hair_lengths);

		// Eye colors
		$eye_colors = Eye_Color::all();
		$this->assign('eye_colors', $eye_colors);

		// Ethnic appearances
		$ethnic_groups = Ethnic_Group::all();
		$this->assign('ethnic_groups', $ethnic_groups);

		$this->display
		(
			null,
			null,
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
			null,
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
		$input = Input::all();

		$this->user->personal_statement = $input['personal_statement'];
		$this->user->save();

		$this->ajax->output();
	}

	public function get_personal_statement()
	{
		$this->ajax->add_data('personal_statement', $this->user->print_personal_statement());

		$this->ajax->output();
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

	public function resume()
	{
		$post = Input::all();

		if ( count($post) > 0 && $this->is_ajax )
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

			if ( $validation->fails() )
			{
				$this->ajax->set_validation($validation);
			}
			else
			{
				// Save settings
				$this->user->first_name = trim($post['first_name']);
				$this->user->last_name = trim($post['last_name']);
				$this->user->birthdate = date('Y-m-d', strtotime(trim($post['birthdate'])));
				$this->user->save();
			}

			$this->ajax->add_action('#header_user_name', 'html', $this->user->get_name());

			$this->ajax->output();
		}

		// Tabs
		// "About Me" tab
		$about_me_view = View::make('dashboard/resume/tabs/about_me');
		$about_me_view->user = $this->user;
		$about_me_view_html = $about_me_view->render();
		$this->assign('about_me_tab_html', $about_me_view_html);

		// "Sizes" tab
		$sizes_tab_view = View::make('dashboard/resume/tabs/sizes');
		$sizes_tab_view->user = $this->user;
		$sizes_tab_html = $sizes_tab_view->render();
		$this->assign('sizes_tab_html', $sizes_tab_html);

		// Default tab
		$default_tab = Session::has('default_resume_tab') ? Session::get('default_resume_tab') : 'about_me';
		$this->assign('default_tab', $default_tab);

		$this->display();
	}
}