<div class="page-header">
	<h1><i class="icon-email"></i> Resume</h1>
</div>

<div class="main-content">
	<div class="widget">
		<ul class="nav nav-tabs">
			<li<?php if ( $default_tab === 'about_me' ): ?> class="active"<?php endif ?>><a href="#tab_about_me" data-toggle="tab"><i class="icon-bullseye"></i> About Me</a></li>
			<li<?php if ( $default_tab === 'sizes' ): ?> class="active"<?php endif ?>><a href="#my_sizes" data-toggle="tab"><i class="icon-bullseye"></i> Sizes</a></li>
			<?php /*<li<?php if ( $default_tab === 'photos' ): ?> class="active"<?php endif ?>><a href="#tab_email" data-toggle="tab"><i class="icon-table"></i> E-mail</a></li>
			<li<?php if ( $default_tab === 'videos' ): ?> class="active"<?php endif ?>><a href="#tab_email" data-toggle="tab"><i class="icon-table"></i> E-mail</a></li>*/ ?>
		</ul>

		<div class="tab-content bottom-margin">
			<!-- About Me -->
			<div id="tab_about_me" class="tab-pane<?php if ( $default_tab === 'about_me' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<?= $about_me_tab_html ?>
				</div>
			</div>

			<!-- Sizes -->
			<div id="my_sizes" class="tab-pane<?php if ( $default_tab === 'sizes' ): ?> active<?php endif ?>">
				<div class="shadowed-bottom">
					<?= $sizes_tab_html ?>
				</div>
			</div>
		</div>
	</div>
</div>