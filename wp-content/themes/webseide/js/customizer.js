/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlerstomake Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    'use strict';

	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	// Logo alignment
	wp.customize.bind('ready', function () { // Ready?
	    var customize = this; // Customize object alias.
	    customize('display_blogname', function (value) {

	        var siteTitleInput = customize.control('webseide_logo_alignment').container.find('input'); // Site Title input.

	        /**
	         * Disable the Input element
	         */
	        // 1. On loading.
	        siteTitleInput.prop('disabled', !value.get()); // .get() value

	        // 2. Bindingtovalue change.
	        value.bind(function (to) {
                siteTitleInput.prop('disabled', !to);
	        });
	    });
	});
	wp.customize('webseide_logo_alignment', function (value) {
        value.bind(function (to) {
            jQuery('#header-image').addClass('float-left');
        });
    });

    // Header height.
	wp.customize('webseide_header_height', function (value) {
        value.bind(function (to) {
            jQuery('.site-header').css('height', to + 'px');
            jQuery('.content-area').css('margin-top', to + 'px');
        });
    });

	// Header font-size.
	wp.customize('webseide_headerfont_desktop', function (value) {
        value.bind(function (to) {
            jQuery('ul#primary-menu li a').css('font-size', to + 'px');
        });
    });

	// Header text color.
	wp.customize('webseide_headerfont_color', function (value) {
        value.bind(function (to) {
            jQuery('ul#primary-menu li a').css('color', to);
        });
    });

    // Header burgermenu webseide_burger_color.
	wp.customize('webseide_headerfont_color', function (value) {
        value.bind(function (to) {
            jQuery('body #mobileMenuToggle span').css('background', to);
        });
    });

    // Mobile menu background.
	wp.customize('webseide_mobilemenu_backgroundcolor', function (value) {
        value.bind(function (to) {
            jQuery('body #mobileMenuToggle #primary_menu').css('background', to);
        });
    });

    // Header mobile menu link color.
	wp.customize('webseide_mobile_link_color', function (value) {
        value.bind(function (to) {
            jQuery('#masthead #mobileMenuToggle a').css('color', to);
        });
    });

    // Header background-color.
	wp.customize('webseide_background_color', function (value) {
        value.bind(function (to) {
            jQuery('.site-header').css('background', to);
        });
    });

    // Search icon color.
	wp.customize('webseide_search_color', function (value) {
        value.bind(function (to) {
            jQuery('body .webseide-search-trigger-holder .webseide-search-trigger').css('color', to);
        });
    });

     // Woo Cart icon color.
	wp.customize('webseide_woo_cart_color', function (value) {
        value.bind(function (to) {
            jQuery('body .webseide-cart-widget .cart-icon-holder, body .webseide-cart-widget .cart-icon-holder .cart-icon').css('color', to);
        });
    });

    // Header font style
	wp.customize('webseide_headerfontstyle', function (control) {
		control.bind(function (value) {
			switch (value) {
                case 'sans-serif':
                    jQuery('#masthead').removeClass('sansserif' );
                    jQuery('#masthead').removeClass('serif').addClass(value);
					break;
				case 'serif':
                    jQuery('#masthead').removeClass('sansserif' );
                    jQuery('#masthead').removeClass('serif').addClass(value);
					break;
			}
		});
	});

   	// Content font-size.
	wp.customize('webseide_contentfont_desktop', function (value) {
        value.bind(function (to) {
            $('body #content, body #content p, body #content a, body #content *').css('font-size', to+ 'px' );
        });
    });
    // Content font color.
    wp.customize('webseide_contentfont_color', function (value) {
        value.bind(function (to) {
            jQuery('body #content, body #content.site-content .content-area').css('color', to);
        });
    });
    // Content link color.
    wp.customize('webseide_contentfont_linkcolor', function (value) {
        value.bind(function (to) {
            jQuery('body #content a').css('color', to);
        });
    });
    // Content font style
	wp.customize('webseide_contentfontstyle', function (control) {
		control.bind(function (value) {
			switch (value) {
				case 'sans-serif':
					jQuery('body #content.site-content').removeClass('sansserif' );
        			jQuery('body #content.site-content').removeClass('serif').addClass(value);
					break;
				case 'serif':
					jQuery('body #content.site-content').removeClass('sansserif' );
        			jQuery('body #content.site-content').removeClass('serif').addClass(value);
					break;
			}
		});
	});

	// Footer background.
	wp.customize('webseide_footerbackground_color', function (value) {
        value.bind(function (to) {
            $('body #overallfooter').css('background-color', to);
        });
    });
    // Footer font-size.
	wp.customize('webseide_footerfont_desktop', function (value) {
        value.bind(function (to) {
            $('body #overallfooter footer').css('font-size', to+ 'px' );
        });
    });
    // Footer font color.
    wp.customize('webseide_footerfont_color', function (value) {
        value.bind(function (to) {
            jQuery('body #overallfooter footer').css('color', to);
        });
    });
	// Footer link color.
	wp.customize('webseide_footerfont_linkcolor', function (value) {
        value.bind(function (to) {
            jQuery('body #overallfooter footer a').css('color', to);
        });
    });
    // Footer font style
	wp.customize('webseide_footerfontstyle', function (control) {
		control.bind(function (value) {
			switch (value) {
				case 'sans-serif':
					jQuery('body #overallfooter footer').removeClass('sansserif' );
        			jQuery('bbody #overallfooter footer').removeClass('serif').addClass(value);
					break;
				case 'serif':
					jQuery('body #overallfooter footer').removeClass('sansserif' );
        			jQuery('body #overallfooter footer').removeClass('serif').addClass(value);
					break;
			}
		});
	});

})(jQuery);
