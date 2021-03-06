<?php
use Kyrst\Base\Helpers\Ajax as Ajax;

class ImageController extends ApplicationController
{
	private $id;

	private $width;
	private $height;
	private $proportional;
	private $crop;
	private $canvas;

	private $dir;

	private $image_to_render;
	private $image_not_found_filename;

	private function init($dir, $id, array $size, $image_not_found_filename)
	{
		$this->id = (int)$id;

		$this->width = $size['width'];
		$this->height = $size['height'];
		$this->proportional = isset($size['proportional']) ? $size['proportional'] : true;
		$this->crop = isset($size['crop']) ? $size['crop'] : false;
		$this->canvas = isset($size['canvas']) ? $size['canvas'] : NULL;

		// Create folder if not exists
		if ( !file_exists($dir) )
		{
			mkdir($dir, 0775, true);
		}

		$this->dir = $dir;

		$this->image_not_found_filename = $image_not_found_filename;
	}

	public function profile_picture($id, $size_name)
	{
		$this->init
		(
			User::get_profile_picture_dir($id),
			$id,
			User::get_profile_picture_size($size_name),
			'profile_picture_not_found.jpg'
		);

		$woa = $this->process(User::get_profile_picture($id));

		return $this->render();
	}

	private function process($image_path)
	{
		//$filename = sha1($this->id . '|' . $this->width . '|' . $this->height . '|' . $this->proportional);

		if ( !file_exists($image_path) )
		{
			return $this->render_image_not_found();
		}

		$this->image_to_render = Image::make($image_path);
		$this->image_to_render = $this->resize($this->image_to_render);

		if ( $this->crop )
		{
			$this->image_to_render->crop($this->crop['width'], $this->crop['height'], $this->crop['x'], $this->crop['y']);
		}

		return $this->image_to_render;
	}

	private function render_image_not_found()
	{
		$this->image_to_render = Image::make(public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->image_not_found_filename);
		$this->image_to_render = $this->resize($this->image_to_render);

		return $this->render();
	}

	private function render()
	{
		$response = Response::make($this->image_to_render->encode('jpg'));
		$response->header('Content-Type', 'image/png');

		return $response;
	}

	private function resize($image)
	{
		$image->resize($this->width > 0 ? $this->width : NULL, $this->height > 0 ? $this->height : NULL, $this->proportional);

		if ( $this->canvas !== NULL )
		{
			$image->resizeCanvas($this->canvas['width'], $this->canvas['height']);
		}

		return $image;
	}

	public function crop_profile_picture()
	{
		$post = Input::all();

		$user_id = $post['user_id'];

		$image_dir = User::get_profile_picture_dir($user_id);
		$image_path = User::get_profile_picture($user_id);

		/*$this->init
		(
			User::get_profile_picture_dir($user_id),
			$user_id,
			User::get_profile_picture_size('settings-page'),
			'profile_picture_not_found.jpg'
		);

		$image = $this->process($image_path);

		$image->crop($post['select']['w'], $post['select']['h'], $post['select']['x'], $post['select']['y']);

		// Instead of doing the init() thing where we crop the resized image, we have to crop the original image.
		// Calculate the difference between original image size with the resized one to get the ratio where we have to cut.

		$image->save($image_dir . 'new.jpg');*/

		$original_image = Image::make($image_path);

		$original_width = $original_image->width;
		$original_height = $original_image->height;

		$aspect_x = $post['smaller_width'] / $original_width;
		$aspect_y = $post['smaller_height'] / $original_height;

		$original_image->crop($post['select']['w'] / $aspect_x, $post['select']['h'] / $aspect_y, $post['select']['x'] / $aspect_x, $post['select']['y'] / $aspect_y);
		$original_image->save($image_dir . 'original.jpg');

		// Clear cache
		// ...

		Session::put('default_settings_tab', 'profile_picture');

		$ajax = new Ajax($this->ui);
		$ajax->redirect(URL::route('dashboard/settings'));

		return $ajax->output();
	}

	public function delete_profile_picture()
	{
		$post = Input::all();

		$user_id = (int)$post['user_id'];

		$ajax = new Ajax($this->ui);

		if ( !$this->user->is_admin() || $this->user->id !== $user_id )
		{
			return $ajax->output_with_error('NO_PERMISSIONS');
		}

		// Get user to delete profile picture from
		try
		{
			$user = User::find($user_id)->firstOrFail();
		}
		catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e )
		{
			return $ajax->output_with_error('USER_NOT_FOUND');
		}

		User::delete_profile_picture($user_id);

		$user->avatar = 'no';
		$user->save();

		Session::put('default_settings_tab', 'profile_picture');

		$ajax->redirect(URL::route('dashboard/settings'));

		return $ajax->output();
	}
}