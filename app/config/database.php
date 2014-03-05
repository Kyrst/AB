<?php
// Tmp WTF!
return array
(
	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql',

	'connections' => array
	(
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => '127.0.0.1',
			'database'  => 'actingbio',
			'username'  => 'root',
			'password'  => 'p3edz9',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		)
	)
);

/*return array
(
	'fetch' => PDO::FETCH_CLASS,
	'default' => 'mysql',

	'connections' => array
	(
		'mysql' => array
		(
			'driver'    => 'mysql',
			'host'      => 'db.actingbio.com',
			'database'  => 'actingbio',
			'username'  => 'actingbio',
			'password'  => 'gasden87',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		)
	),

	'migrations' => 'migrations'
);*/