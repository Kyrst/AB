<div class="page-header">
	<h1><i class="icon-bar-chart"></i> Dashboard</h1>
</div>

<div class="main-content">
	<?php if ( $user->first_time === 'yes' ): ?>
		<div class="widget">
			<div class="alert alert-warning">
				<h2>Hello <?= $user->first_name ?>, Welcome to Acting Bio!</h2>

				<p style="margin-bottom:10px">To get you started, go through these quick steps to setup your public profile.</p>

				<p><a href="javascript:" class="btn btn-primary">Continue</a></p>
			</div>
		</div>
	<?php else: ?>
		Yo yo...

		<?php /*<div class="widget">
			<div class="widget-controls pull-right">
				<a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
				<a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
			</div>
			<h3 class="section-title first-title"><i class="icon-tasks"></i> Statistics</h3>
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div class="widget-content-blue-wrapper changed-up">
						<div class="widget-content-blue-inner padded">
							<div class="pre-value-block"><i class="icon-dashboard"></i> Total Visits</div>
							<div class="value-block">
								<div class="value-self">10,520</div>
								<div class="value-sub">This Week</div>
							</div>
							<span class="dynamicsparkline"><canvas width="84" height="19" style="display: inline-block; width: 84px; height: 19px; vertical-align: top;"></canvas></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div class="widget-content-blue-wrapper changed-up">
						<div class="widget-content-blue-inner padded">
							<div class="pre-value-block"><i class="icon-user"></i> New Users</div>
							<div class="value-block">
								<div class="value-self">1,120</div>
								<div class="value-sub">This Month</div>
							</div>
							<span class="dynamicsparkline"><canvas width="84" height="19" style="display: inline-block; width: 84px; height: 19px; vertical-align: top;"></canvas></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 text-center hidden-md">
					<div class="widget-content-blue-wrapper changed-up">
						<div class="widget-content-blue-inner padded">
							<div class="pre-value-block"><i class="icon-signin"></i> Sold Items</div>
							<div class="value-block">
								<div class="value-self">275</div>
								<div class="value-sub">This Week</div>
							</div>
							<span class="dynamicsparkline"><canvas width="84" height="19" style="display: inline-block; width: 84px; height: 19px; vertical-align: top;"></canvas></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div class="widget-content-blue-wrapper changed-up">
						<div class="widget-content-blue-inner padded">
							<div class="pre-value-block"><i class="icon-money"></i> Net Profit</div>
							<div class="value-block">
								<div class="value-self">$9,240</div>
								<div class="value-sub">Yesterday</div>
							</div>
							<span class="dynamicbars"><canvas width="79" height="19" style="display: inline-block; width: 79px; height: 19px; vertical-align: top;"></canvas></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="widget-controls pull-right">
				<a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
				<a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
			</div>
			<h3 class="section-title"><i class="icon-bar-chart"></i> Profit Chart</h3>
			<ul class="nav nav-pills">
				<li class="active"><a href="#">Hour</a></li>
				<li><a href="#">Day</a></li>
				<li><a href="#">Month</a></li>
				<li class="hidden-xs"><a href="#">Year</a></li>
			</ul>
			<div class="widget-content-white">
				<div class="shadowed-bottom bottom-margin">
					<div class="row">
						<div class="col-lg-4 col-md-5 col-sm-6 bordered">
							<div class="value-block value-bigger changed-up some-left-padding">
								<div class="value-self">
									$5,450
									<span class="changed-icon"><i class="icon-caret-up"></i></span>
									<span class="changed-value">+5.00%</span>
								</div>
								<div class="value-sub">Average of $450.35 Per Day</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 visible-md visible-lg bordered">
							<div class="value-block text-center">
								<div class="value-self">520</div>
								<div class="value-sub">Total Sales</div>
							</div>
						</div>
						<div class="col-lg-2 bordered visible-lg">
							<div class="value-block text-center">
								<div class="value-self">1,120</div>
								<div class="value-sub">Total Visitors</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<form class="form-inline form-period-selector">
								<label class="control-label">Time Period:</label><br>
								<input type="text" placeholder="01/12/2011" class="form-control input-sm">
								<input type="text" placeholder="01/12/2011" class="form-control input-sm">
							</form>
						</div>
					</div>
				</div>
				<div class="padded">
					<div id="areachart" style="height: 250px; position: relative;"><svg height="250" version="1.1" width="1198" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.25px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="26.5" y="210" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M39,210H1173" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="163.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">10</tspan></text><path fill="none" stroke="#aaaaaa" d="M39,163.75H1173" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="117.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">20</tspan></text><path fill="none" stroke="#aaaaaa" d="M39,117.5H1173" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="71.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">30</tspan></text><path fill="none" stroke="#aaaaaa" d="M39,71.25H1173" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="26.5" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">40</tspan></text><path fill="none" stroke="#aaaaaa" d="M39,25H1173" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="1173" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-12</tspan></text><text x="1071.002245508982" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-11</tspan></text><text x="965.750748502994" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-10</tspan></text><text x="863.8944610778443" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-09</tspan></text><text x="758.6429640718563" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-08</tspan></text><text x="653.3914670658683" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-07</tspan></text><text x="551.5351796407185" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-06</tspan></text><text x="446.28368263473055" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-05</tspan></text><text x="344.4273952095808" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-04</tspan></text><text x="239.31736526946108" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-03</tspan></text><text x="144.25149700598803" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-02</tspan></text><text x="39" y="222.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5">2011-01</tspan></text><path fill="#fdf6f6" stroke="#000000" d="M39,140.625C65.312874251497,127.90625,117.93862275449102,93.39512711864407,144.25149700598803,89.75C168.01796407185628,86.45762711864407,215.55089820359282,116.16969964664311,239.31736526946108,112.875C265.594872754491,109.23219964664311,318.14988772455087,58.476717361585784,344.4273952095808,62C369.89146706586826,65.41421736158578,420.8196107784431,137.21311475409837,446.28368263473055,140.625C472.5965568862275,144.15061475409837,525.2223053892216,91.51280737704919,551.5351796407185,89.75C576.999251497006,88.04405737704919,627.9273952095808,132.43647540983608,653.3914670658683,126.75C679.7043413173653,120.87397540983606,732.3300898203593,41.765625,758.6429640718563,43.5C784.9558383233533,45.234375,837.5815868263473,134.74897540983608,863.8944610778443,140.625C889.3585329341317,146.31147540983608,940.2866766467066,97.14241803278689,965.750748502994,89.75C992.063622754491,82.11116803278689,1044.689371257485,86.37201365187713,1071.002245508982,80.5C1096.5016841317365,74.80951365187713,1147.5005613772455,52.75,1173,43.5L1173,210L39,210Z" fill-opacity="0.8" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#f9c1c1" d="M39,140.625C65.312874251497,127.90625,117.93862275449102,93.39512711864407,144.25149700598803,89.75C168.01796407185628,86.45762711864407,215.55089820359282,116.16969964664311,239.31736526946108,112.875C265.594872754491,109.23219964664311,318.14988772455087,58.476717361585784,344.4273952095808,62C369.89146706586826,65.41421736158578,420.8196107784431,137.21311475409837,446.28368263473055,140.625C472.5965568862275,144.15061475409837,525.2223053892216,91.51280737704919,551.5351796407185,89.75C576.999251497006,88.04405737704919,627.9273952095808,132.43647540983608,653.3914670658683,126.75C679.7043413173653,120.87397540983606,732.3300898203593,41.765625,758.6429640718563,43.5C784.9558383233533,45.234375,837.5815868263473,134.74897540983608,863.8944610778443,140.625C889.3585329341317,146.31147540983608,940.2866766467066,97.14241803278689,965.750748502994,89.75C992.063622754491,82.11116803278689,1044.689371257485,86.37201365187713,1071.002245508982,80.5C1096.5016841317365,74.80951365187713,1147.5005613772455,52.75,1173,43.5" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="39" cy="140.625" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="144.25149700598803" cy="89.75" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="239.31736526946108" cy="112.875" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="344.4273952095808" cy="62" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="446.28368263473055" cy="140.625" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="551.5351796407185" cy="89.75" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="653.3914670658683" cy="126.75" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="758.6429640718563" cy="43.5" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="863.8944610778443" cy="140.625" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="965.750748502994" cy="89.75" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1071.002245508982" cy="80.5" r="4" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1173" cy="43.5" r="7" fill="#f9c1c1" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#f6f9fd" stroke="#000000" d="M39,177.625C65.312874251497,181.09375,117.93862275449102,198.18273305084745,144.25149700598803,191.5C168.01796407185628,185.46398305084745,215.55089820359282,134.43763250883393,239.31736526946108,126.75C265.594872754491,118.25013250883393,318.14988772455087,120.2906484962406,344.4273952095808,126.75C369.89146706586826,133.0093984962406,420.8196107784431,169.6639344262295,446.28368263473055,177.625C472.5965568862275,185.8514344262295,525.2223053892216,195.61321721311475,551.5351796407185,191.5C576.999251497006,187.51946721311475,627.9273952095808,149.23053278688525,653.3914670658683,145.25C679.7043413173653,141.13678278688525,732.3300898203593,157.96875,758.6429640718563,159.125C784.9558383233533,160.28125,837.5815868263473,150.38678278688525,863.8944610778443,154.5C889.3585329341317,158.48053278688525,940.2866766467066,190.93135245901638,965.750748502994,191.5C992.063622754491,192.08760245901638,1044.689371257485,164.99701365187713,1071.002245508982,159.125C1096.5016841317365,153.43451365187713,1147.5005613772455,148.71875,1173,145.25L1173,210L39,210Z" fill-opacity="0.8" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#c1daf9" d="M39,177.625C65.312874251497,181.09375,117.93862275449102,198.18273305084745,144.25149700598803,191.5C168.01796407185628,185.46398305084745,215.55089820359282,134.43763250883393,239.31736526946108,126.75C265.594872754491,118.25013250883393,318.14988772455087,120.2906484962406,344.4273952095808,126.75C369.89146706586826,133.0093984962406,420.8196107784431,169.6639344262295,446.28368263473055,177.625C472.5965568862275,185.8514344262295,525.2223053892216,195.61321721311475,551.5351796407185,191.5C576.999251497006,187.51946721311475,627.9273952095808,149.23053278688525,653.3914670658683,145.25C679.7043413173653,141.13678278688525,732.3300898203593,157.96875,758.6429640718563,159.125C784.9558383233533,160.28125,837.5815868263473,150.38678278688525,863.8944610778443,154.5C889.3585329341317,158.48053278688525,940.2866766467066,190.93135245901638,965.750748502994,191.5C992.063622754491,192.08760245901638,1044.689371257485,164.99701365187713,1071.002245508982,159.125C1096.5016841317365,153.43451365187713,1147.5005613772455,148.71875,1173,145.25" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="39" cy="177.625" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="144.25149700598803" cy="191.5" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="239.31736526946108" cy="126.75" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="344.4273952095808" cy="126.75" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="446.28368263473055" cy="177.625" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="551.5351796407185" cy="191.5" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="653.3914670658683" cy="145.25" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="758.6429640718563" cy="159.125" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="863.8944610778443" cy="154.5" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="965.750748502994" cy="191.5" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1071.002245508982" cy="159.125" r="4" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1173" cy="145.25" r="7" fill="#c1daf9" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 1136px; top: 60px;"><div class="morris-hover-row-label">2011-12</div><div class="morris-hover-point" style="color: #f9c1c1">
								Y:
								36
							</div><div class="morris-hover-point" style="color: #c1daf9">
								Z:
								14
							</div></div></div>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="widget-controls pull-right">
				<a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
				<a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
			</div>
			<h3 class="section-title bottom-margin"><i class="icon-bullseye"></i> Circular Charts</h3>
			<div class="row bottom-margin">
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div style="display:inline;width:150px;height:200px;"><canvas width="150" height="200"></canvas><input type="text" value="75" class="knob" data-fgcolor="#df6064" data-linecap="round" data-width="150" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 30px; line-height: normal; font-family: 'Open Sans'; text-align: center; color: rgb(223, 96, 100); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
				</div>
				<div class="col-lg-3 hidden-md col-sm-6 text-center">
					<div style="display:inline;width:150px;height:200px;"><canvas width="150" height="200"></canvas><input type="text" value="65" class="knob" data-fgcolor="#8963ac" data-linecap="round" data-width="150" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 30px; line-height: normal; font-family: 'Open Sans'; text-align: center; color: rgb(137, 99, 172); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div style="display:inline;width:150px;height:200px;"><canvas width="150" height="200"></canvas><input type="text" value="85" class="knob" data-fgcolor="#61a9dc" data-linecap="round" data-width="150" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 30px; line-height: normal; font-family: 'Open Sans'; text-align: center; color: rgb(97, 169, 220); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 text-center">
					<div style="display:inline;width:150px;height:200px;"><canvas width="150" height="200"></canvas><input type="text" value="68" class="knob" data-fgcolor="#71c280" data-linecap="round" data-width="150" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; margin-left: -114px; border: 0px; background-image: none; font-weight: bold; font-style: normal; font-variant: normal; font-size: 30px; line-height: normal; font-family: 'Open Sans'; text-align: center; color: rgb(113, 194, 128); padding: 0px; -webkit-appearance: none; background-position: initial initial; background-repeat: initial initial;"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_pie_chart" data-toggle="tab"><i class="icon-bullseye"></i> Pie Chart</a></li>
					<li><a href="#tab_bar_chart" data-toggle="tab"><i class="icon-bar-chart"></i> Bar Alert</a></li>
					<li class="hidden-md hidden-xs"><a href="#tab_table" data-toggle="tab"><i class="icon-table"></i> Table</a></li>
				</ul>
				<div class="tab-content bottom-margin">
					<div class="tab-pane active" id="tab_pie_chart">
						<div class="shadowed-bottom">
							<div class="row">
								<div class="col-lg-3 col-md-4 col-sm-3 bordered">
									<div class="value-block padded-left text-center">
										<div class="value-self">520</div>
										<div class="value-sub">Total Sales</div>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 bordered hidden-md">
									<div class="value-block text-center">
										<div class="value-self">1,120</div>
										<div class="value-sub">Total Visitors</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-8 col-sm-6">
									<form class="form-inline form-period-selector">
										<label class="control-label">Time Period:</label><br>
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
									</form>
								</div>
							</div>
						</div>
						<div class="padded">
							<div id="piechart" style=""><svg height="342" version="1.1" width="775" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.25px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#3498db" d="M387.5,282.5A109,109,0,0,0,496.4999996638166,173.50856083997223" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3498db" stroke="#ffffff" d="M387.5,285.5A112,112,0,0,0,499.49999965456385,173.508796459421L545.9999995111461,173.51244856087703A158.5,158.5,0,0,1,387.5,332Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#34495e" d="M496.4999996638166,173.50856083997223A109,109,0,0,0,301.12725385519667,107.01128875210951" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#34495e" stroke="#ffffff" d="M499.49999965456385,173.508796459421A112,112,0,0,0,298.75002230992686,105.18132422235105L257.94088078279503,73.76693312816425A163.5,163.5,0,0,1,550.9999994957249,173.51284125995835Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#1abc9c" d="M301.12725385519667,107.01128875210951A109,109,0,0,0,321.0045052575654,259.8675238672434" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#1abc9c" stroke="#ffffff" d="M298.75002230992686,105.18132422235105A112,112,0,0,0,319.1743540261223,262.2446116801033L290.80700993875337,299.0894727794319A158.5,158.5,0,0,1,261.9029333582447,76.81687401109501Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#34495e" d="M321.0045052575654,259.8675238672434A109,109,0,0,0,387.46575664063926,282.49999462106564" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#34495e" stroke="#ffffff" d="M319.1743540261223,262.2446116801033A112,112,0,0,0,387.4648141628587,285.4999944730216L387.4502057572598,331.9999921783386A158.5,158.5,0,0,1,290.80700993875337,299.0894727794319Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="387.5" y="163.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-size: 15px; line-height: normal; font-family: Arial;" font-size="15px" font-weight="800" transform="matrix(3.0278,0,0,3.0278,-785.7639,-349.7917)" stroke-width="0.3302752293577982"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5">Frosted</tspan></text><text x="387.5" y="183.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-family: Arial;" font-size="14px" transform="matrix(2.2708,0,0,2.2708,-492.4479,-223.0313)" stroke-width="0.4403669724770642"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5">40%</tspan></text></svg></div>
						</div>
					</div>
					<div class="tab-pane" id="tab_bar_chart">
						<div class="shadowed-bottom">
							<div class="row">
								<div class="col-md-3 bordered">
									<div class="value-block padded-left text-center">
										<div class="value-self">256</div>
										<div class="value-sub">Total Sales</div>
									</div>
								</div>
								<div class="col-lg-3 bordered hidden-md">
									<div class="value-block text-center">
										<div class="value-self">3,420</div>
										<div class="value-sub">Total Visitors</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-9">
									<form class="form-inline form-period-selector">
										<label class="control-label">Time Period:</label><br>
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
									</form>
								</div>
							</div>
						</div>
						<div class="padded">
							<div class="alert alert-warning">
								<i class="icon-exclamation-sign"></i> <strong>Message example!</strong> This is an example of how to handle a case when there is no data to load for a chart.</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_table">
						<div class="shadowed-bottom">
							<div class="row">
								<div class="col-md-3 bordered">
									<div class="value-block padded-left text-center">
										<div class="value-self">112</div>
										<div class="value-sub">Total Sales</div>
									</div>
								</div>
								<div class="col-lg-3 bordered hidden-md">
									<div class="value-block text-center">
										<div class="value-self">2,340</div>
										<div class="value-sub">Total Visitors</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-9">
									<form class="form-inline form-period-selector">
										<label class="control-label">Time Period:</label><br>
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
										<input type="text" placeholder="01/12/2011" class="form-control input-sm">
									</form>
								</div>
							</div>
						</div>
						<div class="padded">
							<table class="table">
								<thead>
								<tr>
									<th>Product</th>
									<th>Qty</th>
									<th>Price</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>Floor Lamp</td>
									<td>2</td>
									<td>3</td>
								</tr>
								<tr>
									<td>Coffee Mug</td>
									<td>4</td>
									<td>7</td>
								</tr>
								<tr>
									<td>Television</td>
									<td>1</td>
									<td>3</td>
								</tr>
								<tr>
									<td>Red Carpet</td>
									<td>6</td>
									<td>5</td>
								</tr>
								<tr>
									<td>Laptop</td>
									<td>3</td>
									<td>6</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="widget">
					<div class="widget-controls pull-right hidden-md">
						<a href="#" class="widget-link-remove"><i class="icon-minus-sign"></i></a>
						<a href="#" class="widget-link-remove"><i class="icon-remove-sign"></i></a>
					</div>
					<h3 class="section-title first-title"><i class="icon-table"></i> Top Sellers</h3>
					<div class="widget-content-white padded glossed">
						<div id="topsellers_barchart" style="position: relative;"><svg height="342" version="1.1" width="351" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.75px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="43.5" y="278.16601536" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,278.16601536H326" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="214.87451152000003" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.507324020000027">500</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,214.87451152000003H326" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="151.58300768000004" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.497070180000037">1,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,151.58300768000004H326" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="88.29150384000002" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.5024413400000185">1,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,88.29150384000002H326" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="43.5" y="25.00000000000003" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.500000000000028">2,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M56,25.00000000000003H326" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="299" y="290.66601536" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-115.5116,232.2229)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">5</tspan></text><text x="245" y="290.66601536" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-128.5539,203.5441)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">4S</tspan></text><text x="191" y="290.66601536" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-135.0431,170.2767)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">4</tspan></text><text x="137" y="290.66601536" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-151.7717,144.1789)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">3GS</tspan></text><text x="83" y="290.66601536" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(0.8192,-0.5736,0.5736,0.8192,-158.2609,110.9115)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.501952860000017">3G</tspan></text><rect x="62.75" y="260.82414330784" width="40.5" height="17.34187205216" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></rect><rect x="116.75" y="243.35568824800004" width="40.5" height="34.81032711199998" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></rect><rect x="170.75" y="230.0644724416" width="40.5" height="48.101542918400014" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></rect><rect x="224.75" y="195.25414532960002" width="40.5" height="82.9118700304" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></rect><rect x="278.75" y="79.30411029472003" width="40.5" height="198.86190506527998" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></rect></svg><div class="morris-hover morris-default-style" style="display: none;"></div></div>
						<table class="table" id="topsellers_table">
							<thead>
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Floor Lamp</td>
								<td>2</td>
								<td>3</td>
							</tr>
							<tr>
								<td>Coffee Mug</td>
								<td>4</td>
								<td>7</td>
							</tr>
							<tr>
								<td>Television</td>
								<td>1</td>
								<td>3</td>
							</tr>
							<tr>
								<td>Red Carpet</td>
								<td>6</td>
								<td>5</td>
							</tr>
							<tr>
								<td>Laptop</td>
								<td>3</td>
								<td>6</td>
							</tr>
							</tbody>
						</table>
						<a href="#" class="btn btn-sm btn-default">view more</a>
					</div>
				</div>
			</div>
		</div>*/ ?>
	<?php endif ?>
</div>