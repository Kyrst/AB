var $newsletter_email, $newsletter_email_button;

var emblem_offset_top;

var $body = $(document.body),
    body_height = $body.height();

var $start_here_button;

$(function()
{
	$newsletter_email = $('#newsletter_email');
	$newsletter_email_button = $('#newsletter_email_button');

	emblem_offset_top = $('#emblem').offset().top;

	$newsletter_email_button.on('click', function()
	{
		submit_newsletter();
	});

	$('#newsletter_form').on('submit', function()
	{
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

	//$('#step_1_image')
});

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

	$newsletter_email.prop('disabled', true);
	$newsletter_email_button.prop('disabled', true);

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

					$('#newsletter_container').fadeOut('slow', function()
					{
						$('#newsletter_submitted').fadeIn();
					});
				}
				else
				{
					$newsletter_email.prop('disabled', false);
					$newsletter_email_button.prop('disabled', false);
				}
			},
			complete: function()
			{
			}
		}
	);
}

function calculate_cog_scroll()
{
    return ($body.scrollTop() / body_height * 360);
}