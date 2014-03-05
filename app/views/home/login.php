<div id="main" class="container">
	<h1>Login</h1>

	<form action="<?= URL::route('login') ?>" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
			</div>
		</div>

		<div id="password_group" class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" id="password" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
</div>