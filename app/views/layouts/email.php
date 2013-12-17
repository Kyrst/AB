<?php
$font_family = 'Helvetica, Arial, sans-serif';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<style>
			body, #body_style
			{
				background: <?= $background_color ?>;
				color: <?= $fore_color ?>;
				min-height: 1000px;
				font-family: <?= $font_family ?>;
				font-size: 12px;
				margin: 0;
				padding: 0;
			}
		</style>
	</head>
	<body bgcolor="<?= $background_color ?>" alink="<?= $fore_color ?>" link="<?= $fore_color ?>" text="<?= $fore_color ?>" style="background:<?= $background_color ?>;min-height:1000px;color:<?= $fore_color ?>;font-family:<?= $font_family ?>;font-size:12px;">
		<span id="body_style" style="display:block;padding:15px;background:<?= $background_color ?>">
			<?= $content ?>
		</span>
	</body>
</html>