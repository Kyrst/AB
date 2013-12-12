<div id="main" class="container">
	<h1>Sign Up</h1>

	<form action="<?= URL::route('sign-up') ?>" method="post" class="form-horizontal kyrst-auto-submit" role="form" data-submit_button_loading_text="Signing Up...">
		<!-- First Name -->
		<div class="form-group">
			<label for="first_name" class="col-sm-2 control-label">First Name</label>

			<div class="col-sm-4">
				<input type="text" name="first_name" id="first_name" class="form-control">
			</div>
		</div>

		<!-- Last Name -->
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Last Name</label>

			<div class="col-sm-4">
				<input type="text" name="last_name" id="last_name" class="form-control">
			</div>
		</div>

		<!-- Birthdate -->
		<div class="form-group">
			<label for="last_name" class="col-sm-2 control-label">Birthdate</label>

			<div class="col-sm-4">
				<input type="text" name="birthdate" id="birthdate" class="form-control">
			</div>
		</div>

		<!-- Alias -->
		<div class="form-group">
			<label for="alias" class="col-sm-2 control-label">Alias</label>

			<div class="col-sm-4">
				<div class="input-group">
					<input type="text" name="alias" id="alias" class="form-control">

					<span class="input-group-addon">
						.actingbio.com
					</span>
				</div>
			</div>
		</div>

		<!-- E-mail -->
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail</label>

			<div class="col-sm-4">
				<input type="email" name="email" id="email" class="form-control">
			</div>
		</div>

		<!-- Password -->
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>

			<div class="col-sm-4">
				<input type="password" name="password" id="password" class="form-control">
			</div>
		</div>

		<!-- Verify Password -->
		<div id="verify_password_group" class="form-group">
			<label for="password_verify" class="col-sm-2 control-label">Verify Password</label>

			<div class="col-sm-4">
				<input type="password" name="password_verify" id="password_verify" class="form-control">
			</div>
		</div>

		<!-- Terms & Conditions -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div id="terms_checkbox" class="checkbox">
					<label>
						<input name="terms" id="terms" type="checkbox"> Yes, I agree to the <a href="/">Terms &amp; Conditions</a>
					</label>
				</div>
			</div>
		</div>

		<!-- Submit -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Sign Up</button>
			</div>
		</div>
	</form>
</div>