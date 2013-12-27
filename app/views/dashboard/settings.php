<div class="page-header">
	<h1><i class="icon-bar-chart"></i> Settings</h1>
</div>

<ol class="breadcrumb">
	<li><a href="<?= URL::route('dashboard' ) ?>">Dashboard</a></li>
	<li class="active">Settings</li>
</ol>

<div class="main-content">
	<div id="settings_saved_message" class="alert alert-success alert-dismissable">
		<i class="icon-check-sign"></i> <strong>Congratulations!</strong> You settings has been successfully saved.
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	</div>

	<div class="widget">
		<ul class="nav nav-tabs">
			<li<?php if ( $default_tab === 'general' ): ?> class="active"<?php endif ?>><a href="#tab_general" data-toggle="tab"><i class="icon-bullseye"></i> General</a></li>
			<li<?php if ( $default_tab === 'profile_picture' ): ?> class="active"<?php endif ?>><a href="#tab_profile_picture" data-toggle="tab"><i class="icon-bullseye"></i> Profile Picture</a></li>
			<li<?php if ( $default_tab === 'public_profile' ): ?> class="active"<?php endif ?>><a href="#tab_public_profile" data-toggle="tab"><i class="icon-bullseye"></i> Public Profile</a></li>
			<li<?php if ( $default_tab === 'email' ): ?> class="active"<?php endif ?>><a href="#tab_email" data-toggle="tab"><i class="icon-table"></i> E-mail</a></li>
		</ul>

		<div class="tab-content bottom-margin">
			<div id="tab_general" class="tab-pane<?php if ( $default_tab === 'general' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<form action="<?= URL::to('/dashboard/settings') ?>" method="post" class="kyrst-auto-submit" data-submit_button_loading_text="Saving..." data-success="settings_saved">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user->first_name ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user->last_name ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Birthdate</label>
									<input type="text" name="birthdate" id="birthdate" class="form-control" value="<?= date('m/d/Y', strtotime($user->birthdate)) ?>">
								</div>
							</div>
						</div>

						<button name="save" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>

			<div id="tab_profile_picture" class="tab-pane<?php if ( $default_tab === 'profile_picture' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<form action="<?= URL::route('dashboard/settings') ?>" method="post" enctype="multipart/form-data">
						<!-- Current -->
						<h3 class="section-title first-title"><i class="icon-tasks"></i> Current</h3>
						<?php if ( $user->avatar === 'yes' ): ?>
							<?= $user->get_profile_picture_image('settings-page', 'settings_page_profile_picture') ?>

							<div class="clearfix">
								<a href="javascript:" id="crop_button" class="btn btn-primary">Crop</a>
								<a href="javascript:" id="cancel_crop_button" class="btn btn-default">Cancel</a>
							</div>
						<?php else: ?>
							No profile picture.
						<?php endif ?>

						<!-- Upload -->
						<h3 class="section-title"><i class="icon-tasks"></i> Upload</h3>

						<div id="profile_picture_upload_preview"></div>

						<input type="file" name="profile_picture" id="profile_picture">

						<div id="profile_picture_upload_buttons_container">
							<button id="profile_picture_upload_button" class="btn btn-primary" disabled>Upload</button>
							<a href="javascript:" id="cancel_upload" class="btn btn-default">Cancel</a>
						</div>
					</form>
				</div>
			</div>

			<div id="tab_public_profile" class="tab-pane<?php if ( $default_tab === 'public_profile' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<form action="<?= URL::to('/dashboard/settings') ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="checkbox-inline">
										<input type="checkbox" id="show_age" value="1"> Show Age
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div id="tab_email" class="tab-pane<?php if ( $default_tab === 'email' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<form action="<?= URL::route('dashboard/settings') ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>E-mail</label>
									<input type="text" name="email" id="email" class="form-control" value="<?= $user->email ?>">
								</div>
							</div>
						</div>

						<button name="save" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>