<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?= $page_title; ?></title>
		<meta name="description" content="">

		<?php foreach ( $assets['css'] as $css ): ?>
			<link href="<?= URL::route('home', array(), false) . $css['file'] ?>" rel="stylesheet">
		<?php endforeach; ?>
	</head>
	<body>
		<!-- Header -->
		<?= $header_html ?>

		<!-- Content -->
		<div id="content" class="container">
			<div id="content_inner">
				<?= $content ?>
			</div>
		</div>

		<?= $js_vars ?>

		<?php foreach ( $assets['js'] as $file ): ?>
			<script src="<?= URL::route('home', array(), false) . $file ?>"></script>
		<?php endforeach; ?>
	</body>
</html>