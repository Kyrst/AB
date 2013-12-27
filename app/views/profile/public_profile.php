<h1><?= $user->get_name() ?>, <?= $user->get_age() ?></h1>

<?php if ( $user->avatar === 'yes' ): ?>
	<?= $user->get_profile_picture_image('public-profile') ?>
<?php endif ?>