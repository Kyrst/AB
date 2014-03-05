<h1>Users</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Alias</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Birthdate</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ( $users as $user ): ?>
			<tr>
				<td><?= $user->id ?></td>
				<td><?= $user->username ?></td>
				<td><?= $user->first_name ?></td>
				<td><?= $user->last_name ?></td>
				<td><?= $user->birthdate ?> (<?php echo $user->get_age() ?>)</td>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							Action <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">View Profile</a></li>
							<li class="divider"></li>
							<li><a href="#">Edit</a></li>
							<li><a href="#">Delete</a></li>
						</ul>
					</div>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>