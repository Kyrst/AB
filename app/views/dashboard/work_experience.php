<div class="page-header">
	<h1><i class="icon-email"></i> Work Experience</h1>
</div>

<div class="main-content">
	<ul id="sortable" class="clearfix">
		<li id="personal_statement_container" class="first">
			<div id="personal_statement_box" class="box inner clearfix">
				<div class="controls">
					<span class="handle"></span>
					<a href="javascript:" class="active"></a>
				</div>

				<div class="subject">
					<h2>Personal Statement</h2>

					<p id="personal_statement">
						<?php if ( $user->personal_statement !== NULL ): ?>
							<?= $user->print_personal_statement() ?>
						<?php else: ?>
							You have not entered a personal statement yet.
						<?php endif ?>
					</p>
				</div>

				<div class="right">
					<a href="javascript:" id="open_personal_statement_dialog" class="btn btn-primary btn-sm">Change</a>
				</div>
			</div>
		</li>

		<li id="education_container">
			<div id="education_box" class="box inner">
				<div class="controls">
					<span class="handle"></span>
					<a href="javascript:" class="active"></a>
				</div>

				<div class="subject">
					<h2>Education</h2>

					<div class="school">
						<h3>IT-Gymnasiet</h3>
					</div>

					<div class="school">
						<h3>Stockholm University</h3>
					</div>
				</div>

				<div class="right">
					<a href="javascript:" id="open_education_dialog" class="btn btn-primary btn-sm" onclick="$kyrst.ui.show_alert('Coming Soon!')">Change</a>
				</div>
			</div>
		</li>

		<li id="languages_container">
			<div id="languages_box" class="box inner">
				<div class="controls">
					<span class="handle"></span>
					<a href="javascript:" class="active"></a>
				</div>

				<div class="subject">
					<h2>Languages</h2>

					<div class="language">
						English
					</div>

					<div class="language">
						Swedish
					</div>
				</div>

				<div class="right">
					<a href="javascript:" id="open_languages_dialog" class="btn btn-primary btn-sm">Change</a>
				</div>
			</div>
		</li>
	</ul>
</div>

<!-- Personal Statement Dialog -->
<div id="personal_statement_dialog" class="kyrst-dialog" title="Personal Statement">
	<form action="" method="post">
		<textarea name="personal_statement" id="personal_statement_dialog_textarea" class="form-control"><?php if ( $user->personal_statement !== NULL ): ?><?= $user->personal_statement ?><?php endif ?></textarea>
	</form>
</div>

<!-- Education Dialog -->
<div id="education_dialog" class="kyrst-dialog" title="Education">
</div>

<!-- Languages Dialog -->
<div id="languages_dialog" class="kyrst-dialog" title="Languages">
	<form action="" method="post">
		<input type="text" name="langauges" id="languages_dialog_input" value="">
	</form>
</div>