<?php
use Kyrst\Base\Controllers\BaseController as BaseController;

class ApplicationController extends BaseController
{
	protected $libs = array
	(
		'jquery' => array
		(
			'js' => 'libs/jquery/jquery.js'
		),
		'jquery-ui' => array
		(
			'css' => 'libs/jquery_ui/jquery-ui.css',
			'js' => 'libs/jquery_ui/jquery-ui.js'
		),
		'bootstrap' => array
		(
			'css' => 'libs/bootstrap/css/bootstrap.css',
			'js' => 'libs/bootstrap/js/bootstrap.js'
		),
		'bootstrap-datepicker' => array
		(
			'css' => 'libs/bootstrap-datepicker/css/datepicker.css',
			'js' => 'libs/bootstrap-datepicker/js/bootstrap-datepicker.js'
		),
		'bootbox' => array
		(
			'js' => 'libs/bootbox/bootbox.js'
		),
		'soundmanager2' => array
		(
			'js' => 'libs/soundmanager2/soundmanager2-jsmin.js'
			//'js' => 'libs/soundmanager2/ssoundmanager2-nodebug-jsmin.js'
		),
		'underscore' => array
		(
			'js' => 'libs/underscore/underscore.js'
		),
		'uniform' => array
		(
			'css' => 'libs/uniform/themes/default/css/uniform.default.min.css',
			//'css' => 'libs/uniform/themes/aristo/css/uniform.aristo.min.css',
			'js' => 'libs/uniform/jquery.uniform.min.js'
		),
		'mars-admin' => array
		(
			'css' => array
			(
				'libs/mars-admin/html/assets/css/app.css'
			)
		),
		'kyrst' => array
		(
			'js' => array
			(
				'packages/kyrst/base/ajax_request.js',
				'packages/kyrst/base/ajax.js',
				'packages/kyrst/base/ui.js',
				'packages/kyrst/base/kyrst.js'
			)
		)
	);

	function __construct()
	{
		parent::__construct();

		// Bootstrap
		$this->load_lib('jquery');

		// Bootstrap
		$this->load_lib('bootstrap');

		// Bootbox
		$this->load_lib('bootbox');

		// Underscore
		$this->load_lib('underscore');

		// Uniform
		$this->load_lib('uniform');

		// Kyrst
		$this->load_lib('kyrst');

		// Username sub-domain
		//$username = Session::get('username');
	}
}