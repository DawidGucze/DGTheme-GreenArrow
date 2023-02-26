jQuery(document).ready( function($) {

    var body_height = $( 'body' ).height(),
        window_height = $( window ).height(),
        container_height = $( '.dgt_container' ).height(),
        bars_height = body_height - container_height,
        min_height = window_height - bars_height,
        admin_min_height = min_height - 32;

    if ( window_height > body_height ) {
        $( '.dgt_container' ).css( 'min-height', min_height );
        $( '.single .dgt_content' ).css( 'min-height', min_height - 50 );
        $( '.admin-bar .dgt_container' ).css( 'min-height', admin_min_height );
        $( '.admin-bar.single .dgt_content' ).css( 'min-height', admin_min_height - 50 );
    }

	// scroll to top
	$('#dgt_go_top').on( 'click', function(event) {
	    $('html, body').animate({
	        scrollTop: 0
	    }, 1000);
	});

    var foot_wide = $('.dgt_foot_bar .dgt_wide'),
        foot_boxed = $('.dgt_foot_bar.boxed');

    if ( foot_wide.length !== 0 ) {

        var foot_wide_ofst = foot_wide.offset().left;
        var window_width = $( window ).width();

        if ( foot_wide_ofst > 0 && foot_wide_ofst < 60 )
            $( foot_wide ).css( 'padding-right', 75 - foot_wide_ofst );

        if ( window_width > 1320 )
            $( foot_wide ).css( 'padding-right', 15 );

    }

    if ( foot_boxed.length !== 0 ) {

        var foot_boxed_ofst = foot_boxed.offset().left,
            go_top_pos = $('#dgt_go_top');

        if ( foot_boxed_ofst > 0 && foot_boxed_ofst < 60 ) {
            $( foot_boxed ).css( 'padding-right', 75 );
            $( go_top_pos ).css( 'right', foot_boxed_ofst );
        } else {
            $( foot_boxed ).css( 'padding-right', 15 );
            $( go_top_pos ).css( 'right', 0 );
        }

    }

    if ( foot_boxed.length !== 0 ) {

        var foot_boxed_ofst = foot_boxed.offset().left,
            go_top_pos = jQuery('#dgt_go_top');

        if ( foot_boxed_ofst > 0 && foot_boxed_ofst < 60 ) {
            jQuery( foot_boxed ).css( 'padding-right', 75 );
            jQuery( go_top_pos ).css( 'right', foot_boxed_ofst );
        } else {
            jQuery( foot_boxed ).css( 'padding-right', 15 );
            jQuery( go_top_pos ).css( 'right', 0 );
        }

    }

	// search form
	$('.dgt_search').click( function(){
		$(this).addClass('dgt_search_open');
	});

	// menu
	$(".flexnav").flexNav({
		'buttonSelector' : '.dgt_responsive_menu_btn'
	});

    $(".dropdown-menu li").on('mouseenter mouseleave', function (e) {

        if ( $( 'ul', this ).length ) {
            var elm = $('ul:first', this);
            var off = elm.offset();
            var l = off.left;
            var w = elm.width();
            var docH = $(window).height();
            var docW = $(window).width();

            var isEntirelyVisible = (l + w <= docW);

            if (!isEntirelyVisible) {
                $('.dropdown-menu').addClass('edge');
            } else {
                $('.dropdown-menu').removeClass('edge');
            }
        }

    });

    // thumbnail height
    $('.dgt_post').each(function() {

        var thumbnail = $('.blog .dgt_post_thumbnail, .archive .dgt_post_thumbnail');
        height = $(this).find('img').height();
        
        thumbnail.css('min-height', height);

    });

});

jQuery(document).scroll( function() {

	if ( jQuery(document).scrollTop() >= 250 ) {
		jQuery('#dgt_go_top').css('display', 'block');
	} else {
		jQuery('#dgt_go_top').css('display', 'none');
	}

});

jQuery(document).click( function(event) {

    if( !jQuery(event.target).closest('.dgt_search').length ) {
        if( jQuery('.dgt_search').is(":visible") ) {
            jQuery('.dgt_search').removeClass('dgt_search_open');
        }
    }

});

jQuery( window ).resize( function() {

    var foot_wide = jQuery('.dgt_foot_bar .dgt_wide'),
        foot_boxed = jQuery('.dgt_foot_bar.boxed');

    if ( foot_wide.length !== 0 ) {

        var foot_wide_ofst = foot_wide.offset().left;
        var window_width = jQuery( window ).width();

        if ( foot_wide_ofst > 0 && foot_wide_ofst < 60 )
            jQuery( foot_wide ).css( 'padding-right', 75 - foot_wide_ofst );

        if ( window_width > 1320 )
            jQuery( foot_wide ).css( 'padding-right', 15 );

    }

    if ( foot_boxed.length !== 0 ) {

        var foot_boxed_ofst = foot_boxed.offset().left,
            go_top_pos = jQuery('#dgt_go_top');

        if ( foot_boxed_ofst > 0 && foot_boxed_ofst < 60 ) {
            jQuery( foot_boxed ).css( 'padding-right', 75 );
            jQuery( go_top_pos ).css( 'right', foot_boxed_ofst );
        } else {
            jQuery( foot_boxed ).css( 'padding-right', 15 );
            jQuery( go_top_pos ).css( 'right', 0 );
        }

    }

});