<?php
class EmailController extends ApplicationController
{
	public $layout = 'layouts.email';

	private $background_color = '#DEDEDE';
	private $fore_color = '#111';

	public function view($name)
	{
		$this->display('emails.' . $name);
	}

	public function display($view_file = NULL, $page_title = '', $page_title_appendix = true, $libs_to_load = array())
	{
		$this->assign('background_color', $this->background_color, array('layout'));
		$this->assign('fore_color', $this->fore_color, array('layout'));

		parent::display($view_file, $page_title, $page_title_appendix, $libs_to_load);
	}
}