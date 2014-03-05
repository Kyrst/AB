<div class="page-header">
	<h1><i class="icon-bar-chart"></i> Settings</h1>
</div>

<div class="main-content">
	<div id="settings_tabs" class="widget">
		<ul class="nav nav-tabs">
			<li<?php if ( $default_tab === 'general' ): ?> class="active"<?php endif ?>><a href="#tab_general" data-toggle="tab"><i class="icon-bullseye"></i> General</a></li>
			<li<?php if ( $default_tab === 'physical_attributes' ): ?> class="active"<?php endif ?>><a href="#tab_physical_attributes" data-toggle="tab"><i class="icon-bullseye"></i> Physical Attributes</a></li>
			<li<?php if ( $default_tab === 'profile_picture' ): ?> class="active"<?php endif ?>><a href="#tab_profile_picture" data-toggle="tab"><i class="icon-bullseye"></i> Profile Picture</a></li>
			<li<?php if ( $default_tab === 'email' ): ?> class="active"<?php endif ?>><a href="#tab_email" data-toggle="tab"><i class="icon-table"></i> E-mail</a></li>
			<li<?php if ( $default_tab === 'password' ): ?> class="active"<?php endif ?>><a href="#tab_password" data-toggle="tab"><i class="icon-table"></i> Password</a></li>
		</ul>

		<div class="tab-content bottom-margin">
			<div id="tab_general" class="tab-pane<?php if ( $default_tab === 'general' ): ?> active<?php endif ?>">
				<form action="<?= URL::route('dashboard/settings') ?>" method="post" id="general_form" class="kyrst-auto-submit" data-submit_button_loading_text="Saving...">
					<input type="hidden" name="type" value="general">

					<div class="row">
						<!-- First Name -->
						<div class="col-sm-4">
							<div class="form-group">
								<label for="first_name" class="required">First Name</label>
								<input type="text" name="first_name" id="first_name" value="<?= e($user->first_name) ?>" class="form-control">
							</div>
						</div>

						<!-- Middle Name -->
						<div class="col-sm-4">
							<div class="form-group">
								<label for="middle_name" class="required">Middle Name</label>
								<input type="text" name="middle_name" id="middle_name" value="<?= e($user->middle_name) ?>" class="form-control">
							</div>
						</div>

						<!-- Last Name -->
						<div class="col-sm-4">
							<div class="form-group">
								<label for="last_name" class="required">Last Name</label>
								<input type="text" name="last_name" id="last_name" value="<?= e($user->last_name) ?>" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<!-- Birthdate -->
						<div class="col-sm-4">
							<div class="form-group">
								<label for="birthdate">Birthdate</label>
								<input type="text" name="birthdate" id="birthdate" value="<?= e($user->get_birthdate()) ?>" class="form-control">
							</div>
						</div>

						<!-- Gender -->
						<div class="col-sm-4">
							<div class="form-group">
								<label for="gender">Gender</label>

								<select name="gender" id="gender" class="form-control">
									<option value="">-</option>
									<option value="male"<?php if ( $user->gender === 'male' ): ?> selected<?php endif ?>>Male</option>
									<option value="female"<?php if ( $user->gender === 'female' ): ?> selected<?php endif ?>>Female</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" name="save_general" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>

			<div id="tab_physical_attributes" class="tab-pane<?php if ( $default_tab === 'physical_attributes' ): ?> active<?php endif ?>">
				<form action="<?= URL::route('dashboard/settings') ?>" method="post" id="physical_attributes_form" class="kyrst-auto-submit" data-submit_button_loading_text="Saving...">
					<input type="hidden" name="type" value="physical_attributes">

					<div class="row">
						<!-- Height -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="height">Height</label>

								<select name="height" id="height" class="form-control">
									<option value="">-</option>

									<?php for ( $foot = 2; $foot <= 8; ++$foot ): ?>
										<?php for ( $inches = 0; $inches <= ($foot === 8 ? 0 : 11); ++$inches ): ?>
											<option value="<?= $foot . ',' . $inches ?>"<?php if ( $user->height_feet === $foot && $user->height_inches === $inches ): ?> selected<?php endif ?>><?= $foot . '\'' . $inches ?></option>
										<?php endfor ?>
									<?php endfor ?>
								</select>
							</div>
						</div>

						<!-- Weight -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="weight">Weight</label>

								<div class="input-group">
									<input type="text" name="weight" id="weight" class="form-control" value="<?= $user->weight ?>">

									<div class="input-group-btn" data-toggle="buttons">
										<label class="btn btn-default<?php if ( $user->weight_measurement === 'lbs' ): ?> active<?php endif ?>">
											<input type="radio" name="weight_measurement" value="lbs"<?php if ( $user->weight_measurement === 'lbs' ): ?> checked<?php endif ?>>lbs
										</label>
										<label class="btn btn-default<?php if ( $user->weight_measurement === 'kg' ): ?> checked<?php endif ?>">
											<input type="radio" name="weight_measurement" value="kg"<?php if ( $user->weight_measurement === 'kg' ): ?> checked<?php endif ?>>kg
										</label>
									</div>
								</div>
							</div>
						</div>

						<!-- Hair Type -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="hair_type">Hair</label>

								<select name="hair_type" id="hair_type" class="form-control">
									<option value="">-</option>

									<?php foreach ( $hair_types as $hair_type ): ?>
										<option value="<?= $hair_type->id ?>"<?php if ( $user->hair_type_id === $hair_type->id ): ?> selected<?php endif ?>><?= e($hair_type->name) ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<!-- Hair Length -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="hair_length">Hair Length</label>

								<select name="hair_length" id="hair_length" class="form-control">
									<option value="">-</option>

									<?php foreach ( $hair_lengths  as $hair_length ): ?>
										<option value="<?= $hair_length->id ?>"<?php if ( $user->hair_length_id === $hair_length->id ): ?> selected<?php endif ?>><?= e($hair_length->name) ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<!-- Eye Color -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="eye_color">Eye Color</label>

								<select name="eye_color" id="eye_color" class="form-control">
									<option value="">-</option>

									<?php foreach ( $eye_colors as $eye_color ): ?>
										<option value="<?= $eye_color->id ?>"<?php if ( $user->eye_color_id === $eye_color->id ): ?> selected<?php endif ?>><?= e($eye_color->name) ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>

						<!-- Ethnicity -->
						<div class="col-sm-3">
							<div class="form-group">
								<label for="ethnic_appearance">Ethnic Appearance</label>

								<select name="ethnic_appearance" id="ethnic_appearance" class="form-control">
									<option value="">-</option>

									<?php foreach ( $ethnic_groups as $ethnic_group ): ?>
										<option value="<?= $ethnic_group->id ?>"<?php if ( $user->ethnic_group_id === $ethnic_group->id ): ?> selected<?php endif ?>><?= e($ethnic_group->name) ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>

			<div id="tab_profile_picture" class="tab-pane<?php if ( $default_tab === 'profile_picture' ): ?> active<?php endif ?>">
				<form action="<?= URL::route('dashboard/settings') ?>" method="post" enctype="multipart/form-data" id="profile_picture_form">
					<!-- Current -->
					<h3 class="section-title first-title"><i class="icon-tasks"></i> Current</h3>
					<?php if ( $user->avatar === 'yes' ): ?>
						<div class="clearfix">
							<?= $user->get_profile_picture_image('settings-page', 'settings_page_profile_picture') ?>

							<div style="overflow:hidden;width:100px;height:100px">
								<?= $user->get_profile_picture_image('settings-page', 'profile_picture_crop_preview') ?>
							</div>
						</div>

						<div id="current_profile_picture_button_container" class="clearfix">
							<a href="javascript:" id="delete_picture_profile_button" class="btn btn-primary">Delete</a>
							<a href="javascript:" id="crop_button" class="btn btn-primary">Crop</a>
							<a href="javascript:" id="cancel_crop_button" class="btn btn-default">Cancel</a>
						</div>
					<?php else: ?>
						No profile picture.
					<?php endif ?>

					<!-- Upload -->
					<h3 class="section-title"><i class="icon-tasks"></i> Upload</h3>

					<input type="file" name="profile_picture" id="profile_picture">

					<?php /*<div id="profile_picture_upload_buttons_container">
						<button id="profile_picture_upload_button" class="btn btn-primary" disabled>Upload</button>
						<a href="javascript:" id="cancel_upload" class="btn btn-default">Cancel</a>
					</div>*/ ?>
				</form>
			</div>

			<div id="tab_email" class="tab-pane<?php if ( $default_tab === 'email' ): ?> active<?php endif ?>">
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

			<div id="tab_password" class="tab-pane<?php if ( $default_tab === 'password' ): ?> active<?php endif ?>">
				<form action="<?= URL::route('dashboard/settings') ?>" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
						</div>
					</div>

					<button name="change" class="btn btn-primary">Change</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Profile Picture Preview Dialog -->
<div id="profile_picture_upload_preview_dialog" class="kyrst-dialog">
	<div id="profile_picture_upload_preview"></div>
</div>