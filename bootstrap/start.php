<?php
$app = new Illuminate\Foundation\Application;

$app->redirectIfTrailingSlash();

$env = $app->detectEnvironment
(
	array
	(
		'local' => array('actingbio.loc'),
		'dev' => array('dev.actingbio.loc'),
		'live' => array('actingbio.com')
	)
);

$app->bindInstallPaths(require __DIR__ . '/paths.php');

$framework = $app['path.base'] . '/vendor/laravel/framework/src';

require $framework . '/Illuminate/Foundation/start.php';

include app_path() . '/settings.php';

return $app;