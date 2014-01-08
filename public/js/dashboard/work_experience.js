var $sortable;

// Personal Statement
var personal_statement_dialog,
	$personal_statement;

// Languages
var languages_dialog;

$(function() {
	$sortable = $('#sortable');

	$('#sortable').sortable(
	{
		handle: '.handle',
		sort: function(event, ui)
		{
		}
	})

	$('#sortable').find('li').on('mouseover', function()
	{
		$(this).addClass('hover');
	}).on('mouseout', function()
	{
		$(this).removeClass('hover');
	});

	// Personal Statement
	$personal_statement = $('#personal_statement');

	init_personal_statement_dialog();

	// Education
	// ...

	// Languages
	init_languages_dialog();
});

function init_personal_statement_dialog()
{
	//$('#personal_statement_textarea').wysiwyg();

	personal_statement_dialog = $kyrst.ui.init_dialog_from_element
	(
		'#personal_statement_dialog',
		false,
		800,
		390,
		true,
		false,
		false,
		[
			{
				title: 'Save',
				click: function()
				{
					var $this = this;

					$this.set_title('Saving...', true);

					$kyrst.ajax.post
					(
						BASE_URL + 'dashboard/work-experience/save-personal-statement',
						{
							personal_statement: $('#personal_statement_dialog_textarea').val()
						},
						{
							success: function(result)
							{
								refresh_personal_statement();

								personal_statement_dialog.close();
							},
							error: function()
							{
							},
							complete: function()
							{
								$this.set_title('Save');
								$this.enable();
							}
						}
					);
				}
			},
			{
				title: 'Close',
				close_on_click: true
			}
		],
		{
			after_close: function()
			{
				$('#personal_statement_container').removeClass('open');
			}
		},
		{
			top: 150,
			mask:
			{
				color: '#000',
				opacity: .2
			}
		}
	);

	$('#open_personal_statement_dialog').on('click', function()
	{
		open_personal_statement_dialog();
	});
}

function open_personal_statement_dialog()
{
	$('#personal_statement_container').addClass('open');

	personal_statement_dialog.set_content($('#personal_statement_dialog').html());
	personal_statement_dialog.open();
}

function refresh_personal_statement()
{
	var original_height = $personal_statement.height();

	$personal_statement.html('<div id="personal_statement_loader" style="height:' + original_height + 'px">Loading...</div>');

	$kyrst.ajax.get
	(
		BASE_URL + 'dashboard/work-experience/get-personal-statement',
		{
		},
		{
			success: function(result)
			{
				if ( result.errors.length === 0 )
				{
					$('#personal_statement').html(result.data.personal_statement);
				}
			}
		}
	);
}

function init_languages_dialog()
{
	languages_dialog = $kyrst.ui.init_dialog_from_element
	(
		'#languages_dialog',
		false,
		800,
		260,
		true,
		false,
		false,
		[
			{
				title: 'Save',
				click: function()
				{
					var $this = this;

					$this.set_title('Saving...', true);

					$kyrst.ajax.post
					(
						BASE_URL + 'dashboard/work-experience/save-languages',
						{
							languages: $('#languages_dialog_input').val()
						},
						{
							success: function(result)
							{
								refresh_languages();

								languages_dialog.close();
							},
							error: function()
							{
							},
							complete: function()
							{
								$this.set_title('Save');
								$this.enable();
							}
						}
					);
				}
			},
			{
				title: 'Close',
				close_on_click: true
			}
		],
		{
			open: function()
			{
				$('#languages_dialog_input').tagsInput(
				{
					width: '760px',
					height: '120px',

					autocomplete_url: BASE_URL + 'dashboard/work-experience/get-autocomplete-languages',
					autocomplete:
					{
						selectFirst: true,
						width: '100px',
						autoFill: true,
						delay: 0
					},
					//add_new_callback: BASE_URL + 'dashboard/work-experience/save-autocomplete-language',
					defaultText: 'Add...',
					onAddTag: function(e)
					{
						console.log(e);
					},
					onRemoveTag: function(e)
					{
						console.log(e);
					},
					onChange : function(e)
					{
						console.log(e);
					}
				});
			},
			after_close: function()
			{
				$('#languages_container').removeClass('open');
			}
		},
		{
			top: 150,
			mask:
			{
				color: '#000',
				opacity: .2
			}
		}
	);

	$('#open_languages_dialog').on('click', function()
	{
		open_languages_dialog();
	});
}

function open_languages_dialog()
{
	$('#languages_container').addClass('open');

	languages_dialog.set_content($('#languages_dialog_dialog').html());
	languages_dialog.open();
}