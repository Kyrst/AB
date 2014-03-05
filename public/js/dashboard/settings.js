var $settings_saved_message,
	jcrop_api,
	bounds, bound_x, bound_y;

var $profile_picture_crop_preview;

var profile_picture_upload_preview_dialog,
	$profile_picture;

$(function()
{
	$settings_saved_message = $('#settings_saved_message');

	$profile_picture_crop_preview = $('#profile_picture_crop_preview');

	$profile_picture = $('#profile_picture');

	profile_picture_upload_preview_dialog = $kyrst.ui.init_dialog_from_element
	(
		'#profile_picture_upload_preview_dialog',
		false,
		550,
		490,
		true,
		false,
		false,
		[
			{
				title: 'Use',
				on_click: function()
				{
					// Upload
					$('#profile_picture_form').submit();

					profile_picture_upload_preview_dialog.close();
				}
			},
			{
				title: 'Close',
				on_click: function()
				{
					// Clear file input
					$profile_picture.val('');

					profile_picture_upload_preview_dialog.close();
				}
			}
		],
		{
		}
	);

	$('#settings_page_profile_picture').Jcrop(
	{
		aspectRatio: 10 / 11,
		onSelect: function(coords)
		{
			refresh_crop_preview(coords);
			show_crop_buttons();
		},
		onChange: function(coords)
		{
			refresh_crop_preview(coords);
		},
		onRelease: function()
		{
			hide_crop_buttons();
		}
	}, function(){
		jcrop_api = this;

		bounds = jcrop_api.getBounds();
		bound_x = bounds[0];
		bound_y = bounds[1];
	});

	$('#birthdate').datepicker(
	{
		format: 'mm/dd/yyyy'
	});

	$profile_picture.on('change', function()
	{
		if ( this.files && this.files[0] )
		{
			//$profile_picture.hide();

			//$('#profile_picture_upload_buttons_container').show();
			//$('#profile_picture_upload_preview').html('Loading...');

			var reader = new FileReader();

			reader.onload = function(e)
			{
				//$('#profile_picture_upload_button').prop('disabled', false);

				// Open preview dialog
				$('#profile_picture_upload_preview').html('<img src="' + e.target.result + '" height="350" alt="">');

				profile_picture_upload_preview_dialog.open();
			}

			reader.readAsDataURL(this.files[0]);
		}
	});

	$('#delete_picture_profile_button').on('click', function()
	{
		$kyrst.ui.show_confirm
		(
			'Are you sure you want to delete your profile picture?',
			function()
			{
				$kyrst.ajax.post(
					BASE_URL + 'delete-profile-picture',
					{
						user_id: user_id
					}
				);
			}
		);
	});
});

function show_crop_buttons()
{
	// Crop
	$('#crop_button').css('display', 'block')
	.on('click', function()
	{
		$kyrst.ajax.post
		(
			BASE_URL + 'crop-profile-picture',
			{
				user_id: user_id,
				select: jcrop_api.tellSelect(),
				scale: jcrop_api.tellScaled(),
				smaller_width: $('#settings_page_profile_picture').width(),
				smaller_height: $('#settings_page_profile_picture').height()
			}
		);
	});

	// Cancel crop
	$('#cancel_crop_button').css('display', 'block')
		.on('click', function()
		{
			jcrop_api.release();

			hide_crop_buttons();
		});

	$('#profile_picture_crop_preview').show();
}

function hide_crop_buttons()
{
	$('#crop_button, #cancel_crop_button').css('display', 'none');

	$('#profile_picture_crop_preview').hide();
}

function refresh_crop_preview(coords)
{
	if ( parseInt(coords.w) > 0 )
	{
		var rx = 100 / coords.w;
		var ry = 100 / coords.h;

		$profile_picture_crop_preview.css(
		{
			width: Math.round(rx * bound_x) + 'px',
			height: Math.round(ry * bound_y) + 'px',
			marginLeft: '-' + Math.round(rx * coords.x) + 'px',
			marginTop: '-' + Math.round(ry * coords.y) + 'px'
		});
	}
}