var $settings_saved_message,
	jcrop_api;

$(function()
{
	$settings_saved_message = $('#settings_saved_message');

	$('#settings_page_profile_picture').Jcrop(
	{
		aspectRatio: 10 / 11,
		onSelect: function()
		{
			show_crop_buttons();
		}
	}, function(){
		jcrop_api = this;
	});

	$('#birthdate').datepicker(
	{
		format: 'mm/dd/yyyy'
	});

	$('#profile_picture').on('change', function()
	{
		if ( this.files && this.files[0] )
		{
			$(this).hide();
			$('#profile_picture_upload_buttons_container').show();
			$('#profile_picture_upload_preview').html('Loading...');

			var reader = new FileReader();

			reader.onload = function(e)
			{
				$('#profile_picture_upload_button').prop('disabled', false);
				$('#profile_picture_upload_preview').html('<img src="' + e.target.result + '" height="100" alt="">');
			}

			reader.readAsDataURL(this.files[0]);
		}
	});

	$('#delete_picture_profile_button').on('click', function()
	{
		$kyrst.ui.show_confirm(
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

function settings_saved(e)
{
	if ( e.errors.length === 0 && e.validation.length === 0 )
	{
		$settings_saved_message.show();
	}
}

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
					scale: jcrop_api.tellScaled()
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
}

function hide_crop_buttons()
{
	$('#crop_button, #cancel_crop_button').css('display', 'none');
}