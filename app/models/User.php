<?php
use Kyrst\Base\Models\User as KyrstUser;

class User extends KyrstUser
{
	protected $table = 'users';

	protected $hidden = array('password');

	private static $profile_picture_sizes = array
	(
		'settings-page' => array
		(
			'width' => NULL,
			'height' => 200
		),
		'dashboard' => array
		(
			'width' => NULL,
			'height' => 40
			/*'canvas' => array
			(
				'width' => 150,
				'height' => NULL
			)*/
			/*'crop' => array
			(
				'width' => 50,
				'height' => 50,
				'x' => 20,
				'y' => 0
			)*/
		),
		'resume' => array
		(
			'width' => 215,
			'height' => 245,
			'canvas' => array
			(
				'width' => NULL,
				'height' => 245
			)
		)
	);

	public function hairType()
	{
		return $this->belongsTo('Hair_Type');
	}

	public function eyeColor()
	{
		return $this->belongsTo('Eye_Color');
	}

	public function get_resume_url()
	{
		return URL::to('resume/' . $this->username);
	}

	public static function get_profile_picture_dir($user_id)
	{
		return base_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $user_id . DIRECTORY_SEPARATOR . 'profile_picture' . DIRECTORY_SEPARATOR;
	}

	public static function get_profile_picture($user_id)
	{
		$dir = self::get_profile_picture_dir($user_id);

		$new_filename = 'original.jpg';
		$new_file = $dir . $new_filename;

		return $dir . (file_exists($new_file) ? $new_filename : 'original.jpg');
	}

	public static function upload_profile_picture($image, $user_id)
	{
		$dir = self::get_profile_picture_dir($user_id);

		// Delete new.jpg
		/*$new_jpg_path = $dir . 'new.jpg';

		if ( file_exists($new_jpg_path) )
		{
			unlink($new_jpg_path);
		}*/

		// Create dir if not exists
		if ( !file_exists($dir) )
		{
			mkdir($dir, 0775, true);
		}

		$img = Image::make($image->getRealPath())
			->resize(800, NULL, false, false)
			->save($dir . 'original.jpg');

		return $img;
	}

	public static function delete_profile_picture($user_id)
	{
		$profile_picture_path = self::get_profile_picture($user_id);

		if ( file_exists($profile_picture_path) )
		{
			if ( unlink($profile_picture_path) )
			{
				return true;
			}
		}

		return false;
	}

	public function get_profile_picture_image($size_name, $id = NULL)
	{
		if ( !array_key_exists($size_name, self::$profile_picture_sizes) )
		{
			throw new Exception('Size "' . $size_name . '" does not exist.');
		}

		$size = self::$profile_picture_sizes[$size_name];

		//$img_src = URL::to('profile-picture/' . $this->id . '/' . ($size['width'] !== NULL ? $size['width'] : '0') . '/' . ($size['height'] !== NULL ? $size['height'] : '0') . ($size['proportional'] === false ? '/1' : '')) . '"';
		$img_src = URL::to('profile-picture/' . $this->id . '/' . $size_name);

		$img_width = isset($size['canvas']) && $size['canvas']['width'] !== NULL ? ' width="' . $size['canvas']['width'] . '"' : ($size['width'] !== NULL && !isset($size['canvas']) ? ' width="' . $size['width'] . '"' : '');
		$img_height = isset($size['canvas']) && $size['canvas']['height'] !== NULL ? ' height="' . $size['canvas']['height'] . '"' : ($size['height'] !== NULL && !isset($size['canvas']) ? ' height="' . $size['height'] . '"' : '');
		$img_id = ($id !== NULL ? ' id="' . $id . '"' : '');

		$class = '';

		if ( isset($size['rounded']) && $size['rounded'] === TRUE )
		{
			$class .= 'img-rounded';
		}

		return '<img src="' . $img_src . '"' . $img_id . $img_width . $img_height . ' class="' . $class . '" alt="' . $this->get_name() . '">';
	}

	public static function get_profile_picture_size($size_name)
	{
		if ( !array_key_exists($size_name, self::$profile_picture_sizes) )
		{
			throw new Exception('Size "' . $size_name . '" does not exist.');
		}

		return self::$profile_picture_sizes[$size_name];
	}

	public function get_age()
	{
		$now = new DateTime();
		$birthday = new DateTime($this->birthdate);

		$interval = $now->diff($birthday);

		return $interval->format('%y');
	}

	public function get_birthdate()
	{
		$birthdate = new DateTime($this->birthdate);

		return $birthdate->format('m/d/Y');
	}

	public function get_height()
	{
		return $this->height_feet . '\'' . $this->height_inches;
	}

	public function get_weight($measurement = 'lbs')
	{
		return $this->weight;
	}

	public function print_personal_statement()
	{
		return nl2br(e($this->personal_statement));
	}

	public function is_admin()
	{
		return $this->is('Admin');
	}
}