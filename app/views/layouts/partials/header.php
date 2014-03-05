<style>
	#header
	{
		height: 70px;
		background: #000 url('/images/layouts/resumes/default/header.png');
		margin-bottom: 30px;
	}

	#header li.current a
	{
		color: #F1F1F1
	}

	#header_user_profile_picture
	{
		margin-right: 6px;
	}

	#header_user_name
	{
		color: #EEE;
		font-size: .9em;
		text-decoration: none;
	}

	#header .navbar-nav
	{
		margin: 10px 0 0 40px;
	}

	#header .navbar-nav li
	{
		margin-right: 30px;
	}

	#header .navbar-nav a
	{
		padding: 0;
	}
</style>

<div id="header" class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="clearfix" style="margin-top:14px">
				<div style="float:left" class="">
					<a href="<?= URL::route('dashboard/settings') ?>" id="header_user_profile_picture"><?= $user->get_profile_picture_image('dashboard', 'dashboard_profile_picture') ?></a>

					<a href="<?= URL::route('dashboard') ?>" id="header_user_name"><?= $user->get_name() ?></a>
				</div>

				<div style="float:left" class="">
					<div class="row collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li<?php if ( $current_page === 'dashboard' ): ?> class="current"<?php endif ?>><a href="<?php echo URL::route('home') ?>">Home</a></li>
							<li<?php if ( $current_page === 'resume/resume' ): ?> class="current"<?php endif ?>><a href="<?= $user->get_resume_url() ?>">Resume</a></li>
							<li<?php if ( $current_page === 'dashboard/settings' ): ?> class="active"<?php endif ?>><a href="<?= URL::route('dashboard/settings') ?>">Settings</a></li>

							<?php if ( $user->is_admin() ): ?>
								<li<?php if ( $current_controller === 'admin' ): ?> class="active"<?php endif ?>><a href="<?= URL::route('admin') ?>">Admin</a></li>
							<?php endif ?>

							<li><a href="<?= URL::route('log-out') ?>">Log out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>