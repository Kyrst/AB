<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?= $page_title; ?></title>
		<meta name="description" content="">

		<?php foreach ( $assets['css'] as $css ): ?>
			<link href="<?= URL::route('home', array(), false) . $css['file'] ?>" rel="stylesheet">
		<?php endforeach; ?>
	</head>
	<body>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-42863888-3', 'pinsupreme.com');
			ga('send', 'pageview');

		</script>

		<div class="all-wrapper">
		<div class="row">
		<div class="col-md-3">
			<div class="text-center">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">
				<a href="#" class="logo hidden-sm hidden-xs">
					<i class="icon-cloud-download"></i>
					<span><?= $user->get_name() ?></span>
				</a>

				<?php /*<div class="search-box">
					<input type="text" placeholder="SEARCH" class="form-control">
				</div>*/ ?>

				<?php /*<ul class="side-menu">
					<li>
						<a href="notifications.html">
							<span class="badge badge-notifications pull-right alert-animated">5</span>
							<i class="icon-flag"></i> Notifications
						</a>
					</li>
				</ul>*/ ?>

				<div class="relative-w">
					<ul class="side-menu">
						<!-- Dashboard -->
						<li class="current">
							<a class="current" href="index.html">
								<span class="badge pull-right">17</span>
								<i class="icon-dashboard"></i> Dashboard
							</a>
						</li>

						<!-- Profile -->
						<li>
							<a href="/">
								<i class="icon-terminal"></i> Profile
							</a>
						</li>

						<!-- Profile -->
						<li>
							<a href="/">
								<i class="icon-cog"></i> Settings
							</a>
						</li>

						<!-- Settings -->
						<li>
							<a href="/">
								<i class="icon-terminal"></i> Log Out
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">

		<div class="content-wrapper wood-wrapper">
			<div class="content-inner">
				<div class="page-header">
					<h1><i class="icon-bar-chart"></i> Dashboard</h1>
				</div>

				<?= $content ?>
			</div>
		</div>

		</div>
		</div>
		</div>


		<?php /*<div class="color_settings_box hidden-xs active" style="right: 0px;">
			<h3>Color Settings</h3>
			<label for="wood-wrapper-checkbox" class="checkbox-w">
				<input type="checkbox" id="wood-wrapper-checkbox">
				<span class="wood-checkbox"></span> Wrap in Wood
			</label>
			<h3>Background</h3>
			<div class="color-settings-w" data-replace-element="body" data-leave-class="">
				<div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="body-dark-blue" data-original-title="Solid Dark Blue"></div>
				<div class="color-box color-box-light-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="body-blue" data-original-title="Solid Light Blue"></div>
				<div class="color-box color-box-grey color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="body-grey" data-original-title="Solid Grey"></div>
				<div class="color-box color-box-linen-dark color-tooltip active" data-toggle="tooltip" data-placement="top" title="" data-replace-with="body-dark-linen" data-original-title="Dark Linen"></div>
				<div class="color-box color-box-linen-light color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="body-light-linen" data-original-title="Light Linen"></div>
			</div>
			<h3>Header</h3>
			<div class="color-settings-w" data-replace-element=".page-header" data-leave-class="page-header">
				<div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-dark-blue" data-original-title="Dark Blue"></div>
				<div class="color-box color-box-red active color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-red" data-original-title="Red"></div>
				<div class="color-box color-box-green color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-green" data-original-title="Green"></div>
				<div class="color-box color-box-green-sea color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-green-sea" data-original-title="Green Sea"></div>
				<div class="color-box color-box-orange color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-orange" data-original-title="Emerald"></div>
				<div class="color-box color-box-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="page-header-blue" data-original-title="Blue"></div>
			</div>
			<h3>Active Menu</h3>
			<div class="color-settings-w" data-replace-element=".side-menu" data-leave-class="side-menu">
				<div class="color-box color-box-dark-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-dark-blue" data-original-title="Dark Blue"></div>
				<div class="color-box color-box-red active color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-red" data-original-title="Red (Default)"></div>
				<div class="color-box color-box-green color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-green" data-original-title="Green"></div>
				<div class="color-box color-box-green-sea color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-green-sea" data-original-title="Green Sea"></div>
				<div class="color-box color-box-orange color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-orange" data-original-title="Orange"></div>
				<div class="color-box color-box-blue color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="side-menu-blue" data-original-title="Blue"></div>
			</div>
			<h3>Content</h3>
			<div class="color-settings-w" data-replace-element=".content-inner" data-leave-class="content-inner">
				<div class="color-box color-box-white color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="content-inner-white" data-original-title="White"></div>
				<div class="color-box color-box-grey color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="content-inner-grey" data-original-title="Grey"></div>
				<div class="color-box color-box-beige active color-tooltip" data-toggle="tooltip" data-placement="top" title="" data-replace-with="content-inner-beige" data-original-title="Beige"></div>
			</div>
			<div class="toggle-color-settings">
				<i class="icon-cog"></i>
				<span>hide</span>
			</div>
		</div>*/ ?>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/bootstrap/tab.js"></script>
		<script src="assets/js/bootstrap/dropdown.js"></script>
		<script src="assets/js/bootstrap/collapse.js"></script>
		<script src="assets/js/bootstrap/transition.js"></script>
		<script src="assets/js/bootstrap/tooltip.js"></script>
		<script src="assets/js/jquery.knob.js"></script>
		<script src="assets/js/fullcalendar.min.js"></script>
		<script src="assets/js/datatables/datatables.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/datatables/bootstrap.datatables.js"></script>
		<script src="assets/js/raphael-min.js"></script>
		<script src="assets/js/morris-0.4.3.min.js"></script>
		<script src="assets/js/for_pages/color_settings.js"></script>
		<script src="assets/js/application.js"></script>

		<script src="assets/js/for_pages/dashboard.js"></script>
	</body>
</html>