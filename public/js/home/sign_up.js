$(function()
{
	$('#birthdate').datepicker(
	{
		viewMode: 'years'
	})
	.on('changeDate', function(e)
	{
		if ( e.viewMode === 'days' )
		{
			$(this).datepicker('hide');

			$('#alias').focus();
		}
	});

	$('#terms').uniform();
});