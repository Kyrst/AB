<form action="<?= URL::to('/dashboard/resume') ?>" method="post" class="kyrst-auto-submit" data-submit_button_loading_text="Saving..." data-success="sizes_tab_saved">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Height</label>
				<input type="text" name="height" id="height" class="form-control" value="">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Weight</label>
				<input type="text" name="weight" id="weight" class="form-control" value="">
			</div>
		</div>
	</div>
</form>