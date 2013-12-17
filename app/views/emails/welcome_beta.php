<table bgcolor="<?= $background_color ?>" width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 0 35px;height:800px">
	<tr>
		<td align="center">
			<table width="600" border="0" cellspacing="0" cellpadding="0" style="text-align:center;background:#FFF;border:1px solid #CDCDCD;margin-top:20px;height:780px">
				<tr>
					<td style="font-size:13px;vertical-align:top;box-shadow:0 0 8px rgba(0, 0, 0, .15);padding-top:15px" valign="top">
						<img src="<?= asset('images/logo.png') ?>" width="149" height="102" alt="">

						<br>

						<img src="<?= asset('images/emails/header.png') ?>" width="600" height="98" alt="">

						<h1 style="font:normal 17px Arial;color:#A37E2C;margin-top:25px;letter-spacing:1px">WELCOME!</h1>

						<h2 style="font:normal 15px Arial;color:#3D3D3D;letter-spacing:1px">THANK YOU FOR SIGNING UP FOR ACTINGBIO</h2>

						<div style="margin-top:35px;text-align:left;padding:0 36px">
							<p style="color:#84949F;font-size:15px;line-height:32px;font-family:Times new roman">
								ActingBio is still in BETA (in its early stages of development), which means that as a thank you for being an early adopter, we’ve assigned you a unique ID <span style="color:#A37E2C;font-weight:bold;font-family:Arial;font-size:14px">#<?= $code ?></span> for you to set up your account before anyone else.
								<br>
								Once we release the full version you’ll get access to try out new features, insight acting information, promo codes as well as discounts on all of our pricing plans.
							</p>

							<p style="color:#586670;font:bold 15px Arial;margin-top:25px">
								Your ActingBio ID: <span style="color:#A37E2C">#<?= $code ?></span>
							</p>
						</div>

						<div style="margin:25px 35px 100px 0;font:normal 16px Times new roman;color:#84949F;text-align:right">
							Sincerely,
							<br>
							<br>
							The ActingBio Team
						</div>

						<img src="<?= asset('images/emails/footer.png') ?>" width="600" height="54" alt="">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>