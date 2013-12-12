<!-- Splash -->
<div id="splash">
	<div class="container"></div>
</div>

<div id="index_content" class="container">
	<!-- Steps -->
	<div id="steps_container">
		<div id="steps_middle_bar" class="steps-item"></div>

		<img src="<?= asset('images/home/index/circle_start.png') ?>" id="circle_start" class="steps-item">

		<!-- Step 1 -->
		<img src="<?= asset('images/home/index/step_1.png') ?>" id="step_1_image" class="steps-item">

		<div id="step_1_text" class="steps-item">
			<span class="heading"><span class="number">1.</span> Set up Acting Bio in minutes</span>

			<p>Creating your account its very easy, type your name, your stats as height, age range, hair color, eyes color, etc. Then move onto placing your education/training, then add your work/experience and we will chronologically set up to display it on your actingbio resume. Press save and share it with the world.</p>
		</div>

		<!-- Step 2 -->
		<div id="step_2_text" class="steps-item">
			<span class="heading"><span class="number">2.</span> Focus on your craft</span>

			<p>The technical aspect should get in your path to become the great actor that you want, that’s why we made it easy to update and upload photos, videos and new content to enhance your bio. From desktop to mobile, updating your actingbio should be a matter of minutes, so that you can share your most up-to-date and acurate data ever.</p>
		</div>

		<img src="<?= asset('images/home/index/step_2.png') ?>" id="step_2_image" class="steps-item">

		<!-- Step 3 -->
		<img src="<?= asset('images/home/index/step_3.png') ?>" id="step_3_image" class="steps-item">

		<div id="step_3_text" class="steps-item">
			<span class="heading"><span class="number">3.</span> Analyze and track your progress</span>

			<p>After you set up your bio, we configure a way for you to easily see visitors stats so that you can be aware of potential visitors that can lead to role or a new working experience. We got you covered, the more gigs you book the happier we  are for you!</p>
		</div>

		<!-- Start Here -->
		<div id="start_here" class="steps-item">
			<span class="heading">Spend more time to work on new projects</span>

			<p>Actingbio.com its setup so that the user can get the most out of his time working on his/hers career. We believe that success its comes from hard and dedication, that’s why our focus revolves on your own success. The tools we provide are here to ease the administration task of managing your career to get new gigs as an actor.</p>
		</div>
	</div>
</div>

<!-- About -->
<div id="about_container">
	<div id="emblem"></div>

	<div id="newsletter_container">
		<h3>Get Discovered</h3>

		<p id="newsletter_info">We are working diligently on a new platform. Professional features will be integrated seamlessly into the Acting Bio framework.</p>

		<form action="<?= URL::route('home') ?>" method="post" id="newsletter_form">
			<div id="newsletter_email_container" class="row">
				<div class="col-lg-6">
					<input type="text" name="email" id="newsletter_email" placeholder="Enter your e-mail..." class="form-control">
				</div>
			</div>

			<p id="sign_up_description" style="margin: 0 auto;text-align: center">ENTER YOUR E-MAIL TO SECURE YOUR BETA ACCOUNT NOW</p>

			<div class="row">
				<div class="col-lg-6">
					<a href="javascript:" id="newsletter_submit" class="btn btn-default">Sign Up</a>
				</div>
			</div>
		</form>
	</div>

	<div id="newsletter_submitted">
		<p>Thank you for signing up for our BETA.</p>
	</div>
</div>