<h1><?= $profile_user->get_name() ?>, <?= $profile_user->get_age() ?></h1>

<?php if ( $user !== NULL ): ?>
	<div style="margin-bottom:10px">
		<a href="<?= URL::route('dashboard') ?>" class="btn btn-xs btn-default">Back to Dashboard</a>
	</div>
<?php endif ?>

<div>
	<?php if ( $profile_user->avatar === 'yes' ): ?>
		<?= $profile_user->get_profile_picture_image('public-profile') ?>
	<?php endif ?>
</div>

<!-- Personal Statement -->
<?php if ( $profile_user->personal_statement !== NULL ): ?>
	<h2>Personal Statement</h2>
	<p id="personal_statement"><?= $profile_user->print_personal_statement() ?></p>
<?php endif ?>