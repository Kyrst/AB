var $newsletter_email, $newsletter_email_button;

var emblem_offset_top;

var $body = $(document.body),
    body_height = $body.height();

var $start_here_button, submit_button_just_clicked = false, is_pre_register_open = false;

$(function()
{
	$newsletter_email = $('#newsletter_email');
	$newsletter_email_button = $('#newsletter_email_button');

	emblem_offset_top = $('#emblem').offset().top;

	$('#newsletter_form').on('submit', function()
	{
		submit_button_just_clicked = true;

		submit_newsletter();

		return false;
	});

	$start_here_button = $('#start_here_button');
	$start_here_button.on('click', function()
	{
		$('html, body').animate(
		{
			scrollTop: emblem_offset_top
		},
		1000,
		function()
		{
			$newsletter_email.focus();
		});
	});

	$('#content').find('img.lazy').lazyload();

    /*$('#test').on('mouseover', function()
    {
        $('#step_1_image').transition({ rotate: '45deg' });
    }).on('mouseout', function()
    {
        $('#step_1_image').transition({ rotate: '0deg' });
    });*/

	/*var scrollorama = $.scrollorama(
	{
		blocks: '.scrollblock'
	});*/

	//scrollorama.animate('#step_1_image',{ duration:500, property:'padding-top', start:100, pin:true })

	//$('#i_want_to_pre_register').css('cursor', 'text');

	$('#i_want_to_pre_register').on('mouseover', function()
	{
		if ( is_pre_register_open || submit_button_just_clicked )
		{
			return;
		}

		$(this).stop().animate(
		{
			opacity: 0
		}, 250);

		$('#newsletter_form').stop().animate(
		{
			opacity: 1
		}, 250, function()
		{
			$(this).css('z-index' , '99999');

			is_pre_register_open = true;
		});
	});

	$('#i_want_to_pre_register').on('mouseout', function()
	{
		if ( is_pre_register_open || submit_button_just_clicked )
		{
			return;
		}

		if ( !$('#newsletter_email').is(':focus') || submit_button_just_clicked )
		{
			animate_out();
		}
	});

	$('#newsletter_email').on('blur', function()
	{
		animate_out();
	});

	$('#newsletter_form').on('mouseleave', function()
	{
		if ( is_pre_register_open && $('#newsletter_email').val().length === 0 && !submit_button_just_clicked )
		{
			animate_out();
		}
	});
});

function animate_out()
{
	//$('#i_want_to_pre_register').css('cursor', 'pointer');

	$('#newsletter_form').stop().animate(
	{
		opacity: 0
	}, 250, function()
	{
		$(this).css('z-index' , '0');

		is_pre_register_open = false;
	});

	$('#i_want_to_pre_register').stop().animate(
	{
		opacity: 1
	}, 250);
}

$(window).scroll(function()
{
	//$('#step_1_image').transition({ rotate: calculate_cog_scroll() + 'deg' });
});

function submit_newsletter()
{
	if ( $kyrst.is_empty($newsletter_email.val()) )
	{
		$newsletter_email.focus();

		return;
	}

	$('#i_want_to_pre_register').hide();

	$newsletter_email.prop('disabled', true);
	$newsletter_email_button.prop('disabled', true);

	$('#i_want_to_pre_register_container').fadeOut('slow', function()
	{
		$('#newsletter_submitted').fadeIn();
	});

	$kyrst.ajax.post
	(
		BASE_URL + 'newsletter-submit',
		{
			email: $newsletter_email.val()
		},
		{
			success: function(result)
			{
				if ( result.errors.length === 0 )
				{
					$newsletter_email.val('');
				}
				else
				{
					$newsletter_email.prop('disabled', false);
					$newsletter_email_button.prop('disabled', false);
				}
			},
			complete: function()
			{
				submit_button_just_clicked = false;
			}
		}
	);
}

function calculate_cog_scroll()
{
    return ($body.scrollTop() / body_height * 360);
}