<?php
class ProfileController extends ApplicationController
{
	public $layout = 'layouts/public_profile';

	public function public_profile()
	{
		$this->display();
	}
}