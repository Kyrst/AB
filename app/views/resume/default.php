<div class="clearfix">
	<div id="profile_picture_container">
		<?= $profile_user->get_profile_picture_image('resume') ?>
	</div>

	<div id="info_container">
		<h1><?= $profile_user->get_name() ?></h1>

		<div id="sub_header">Los Angeles</div>

		<table id="table_attributes">
			<tr class="heading-row first">
				<th style="width:100px">Height</th>
				<th>Weight</th>
			</tr>
			<tr>
				<td><?= $profile_user->get_height() ?></td>
				<td><?= $profile_user->get_weight('lbs') ?> lbs</td>
			</tr>
			<tr class="heading-row">
				<th>Hair</th>
				<th>Eyes</th>
				<th>Age</th>
			</tr>
			<tr>
				<td><?= $user->hairType->name ?></td>
				<td><?= $user->eyeColor->name ?></td>
				<td><?= $user->get_age() ?></td>
			</tr>
		</table>
	</div>
</div>

<div>
	<!-- Personal Statement -->
	<?php if ( $profile_user->personal_statement !== NULL ): ?>
		<h2>Personal Statement</h2>
		<p id="personal_statement"><?= $profile_user->print_personal_statement() ?></p>
	<?php endif ?>

	<!-- Skills -->
	<h2>Skills</h2>

	<!-- Languages -->
	<h3>Languages</h3>
</div>