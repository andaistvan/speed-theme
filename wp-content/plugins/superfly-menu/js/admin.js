jQuery(function($){

	var $win = $(window);
	var $body = $('body');

  // DOM manipulations

	$('#sf_font').after($('#sf_uppercase_chooser')).after($('#sf_font_weight_chooser')).after($('#sf_alignment_chooser')).after($('#sf_font_size'))

  $('#sf_c_fs').next().after($('#sf_c_trans_chooser')).after($('#sf_c_weight_chooser'))

	$('#sf_font_size').after('<span style="margin-left: 5px">px</span><br>');

	$('.sf_font').find('p:empty').remove();

	$('.switcher').each(function(){
		$(this).after('<div><div></div></div>')
	})

	$('.postbox select').each(function(){
		var id = this.id
		$(this).wrap('<div class="select-wrapper" id="'+id+'-wrapper"></div>')
	})

	$('[id*=sf_width_panel_]').each(function(){
		var ind = this.id.replace('sf_width_panel_', '');
		var cl = $('#sf_color_panel_' + ind);
		var scl = $('#sf_scolor_panel_' + ind);
		var bg = $('#sf_bg_color_panel_' + ind)
		$(this).parent().append(bg).append(cl).append(scl);
		bg.before('<span>Background</span>');
		cl.before('<span>Text color</span>');
		scl.before('<span>Subheader color</span>');
	})

  // Events

	$('#sf_sidebar_style').change(function(){
		var val = $(this).val();
		var $w = $(this).closest('.settings-form-row');

		$w.find('[data-notice]').hide().end().find('[data-notice='+val+']').show();
    if (val === 'static') {
      $('.sf_iconbar').show()
    } else {
      $('.sf_iconbar').hide()
    }

    if (val === 'full') {
      $('.sf_fade_content').hide();
      $('.sf_fade_full').show();
    } else {
      $('.sf_fade_content').show();
      $('.sf_fade_full').hide();
    }


	}).change()


	$('#sf-options-wrap form').on('submit', function(e){
		var p = $('.sf_display');
		var current = p.find('.loc_popup')
		var hidden = p.find('input:hidden');
		var user = current.find('select[id*=user_status]').val();
		var rule = current.find('select[id*=display_rule]').val();
		var desktop = current.find('select[id*=display_desktop]').val();
		var mobile = current.find('select[id*=display_mobile]').val();
		var ids = current.find('[id*=display_ids]').val();

		var resulted = {
			'user' : {
				'everyone' : user === 'everyone' ? 1 : 0,
				'loggedin' : user === 'loggedin' ? 1 : 0,
				'loggedout' : user === 'loggedout' ? 1 : 0
			},
			'desktop' : {
				'yes' : desktop === 'yes' ? 1 : 0,
				'no' : desktop === 'no' ? 1 : 0
			},
			'mobile' : {
				'yes' : mobile === 'yes' ? 1 : 0,
				'no' : mobile === 'no' ? 1 : 0
			},

			'rule' : {
				'include' : rule === 'include' ? 1 : 0,
				'exclude' : rule === 'exclude' ? 1 : 0
			},
			'location' : {
				'pages' : traversePages(current.find('input[id*=display_page]')),
				'cposts' : traversePages(current.find('input[id*=display_cpost]')),
				'cats' : traversePages(current.find('input[id*=display_cat]')),
				'taxes' : {},
				'langs' : traversePages(current.find('input[id*=display_lang]')),
				'wp_pages' : traversePages(current.find('input[id*=display_wp_page]')),
				'ids': ids.split(',')
			}
		};
		hidden.val(JSON.stringify(resulted));
		showLoadingView()
	})

	function traversePages(pages) {
		var res = {};

		pages.each(function(i, el){
			var t = $(el);
			var val = t.val();
			if (t.is(':checked')) res[val] = 1;
		});

		return res
	}

	function showLoadingView () {
		$('#fade-overlay').addClass('loading');
	}

	$body.addClass('page-loaded');

	function isScrolledIntoView($elem, elemTop, elemBottom, rule) {
		var docViewTop = $win.scrollTop();
		var docViewBottom = docViewTop + $win.height();

		return rule === 'after' ? docViewBottom > elemBottom + 50 : (elemBottom <= docViewBottom && elemTop >= docViewTop - 25) || (elemBottom > docViewBottom && elemTop < docViewTop - 25);
	}

	var state = 'in';
	var $tabs = $('#tabs-copy');
	var $or = $('#tabs');
	var $form = $('#sf-options-wrap form')

	$win.scroll(function(){

		var elemTop = $tabs.offset().top;
		var elemBottom = elemTop + $tabs.height();
		if (isScrolledIntoView($tabs,elemTop,elemBottom, 'in'))  {
			if (state !== 'in') {
				state = 'in';
				$or.removeClass('transition-in');
				setTimeout(function(){
					$body.removeClass('fixed-nav');
					$or.css({'width': '', left: ''});
				}, 50)
      }
		} else {
			if (state !== 'out') {
				state = 'out';
				$body.addClass('fixed-nav');
				$or.css({'width': $tabs.width(), left: $form.offset().left});
				setTimeout(function(){
					$or.addClass('transition-in');
				}, 100)
			}
		}

	});

	$win.resize(function(){
		if ($body.is('.fixed-nav')) {
			$or.css({'width': $tabs.width(), left: $form.offset().left})
		}
	})

	$or.find('li').not('#save-tab').click(function(){
		$('html,body').animate({
			scrollTop: 0
		}, 300);
	})

	$('#save-tab').click(function(){
		$(this).closest('form').submit();
	})

  $('#form-tab').click(function(){

	})

  var file_frame, attachment, $input = $('.sf_image_bg input');

  $('.sf-choose-image').click(function(){

    var $t = $(this);
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader

      attachment = file_frame.state().get('selection').first().toJSON();
      $('.image-preview').html( '<img src="' + attachment.url + '"/>' );
      if (!$('.sf-remove-image').length) $t.parent().after("<div><span class='sf-remove-image'>Remove Image</span></div>");
      $input.val(attachment.sizes.full.url);
      $input.closest('form').submit()
//      $currBtn = null;
    });

    // Finally, open the modal
    file_frame.open();
  })

  $(document).on('click', '.sf-remove-image', function(){
    debugger
    $input.val('');
    $(this).closest('form').submit()
  })

})