<div id="main" class="container">
	<h1>Login</h1>

	<form action="<?= URL::route('login') ?>" method="post" class="form-horizontal kyrst-auto-submit" role="form" data-submit_button_loading_text="Logging In...">
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" id="email" placeholder="E-mail" class="form-control">
			</div>
		</div>

		<div id="password_group" class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" id="password" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div id="password_checkbox" class="checkbox">
					<label>
						<input name="persistent" id="persistent" type="checkbox"> Remember me
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
</div>