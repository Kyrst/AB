<form action="<?= URL::to('/dashboard/resume') ?>" method="post" class="kyrst-auto-submit" data-submit_button_loading_text="Saving..." data-success="aboue_me_tab_saved">
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