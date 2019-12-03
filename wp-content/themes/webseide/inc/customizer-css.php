<?php

function webseide_css() {
    ?>
    <style type="text/css">

		body {
			font-size: <?php echo ( '' != get_theme_mod( 'webseide_contentfont_desktop' ) ? get_theme_mod( 'webseide_contentfont_desktop') .'px' : '18px'); ?>;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background') : '#313131'); ?>;
			font-style: <?php echo ( '' != get_theme_mod( 'webseide_contentfontstyle' ) ? get_theme_mod( 'webseide_contentfontstyle') : 'sans-serif'); ?>;
		}

        <?php
		  $siteContentHeight = 0;
		  $siteContentHeight += ('' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height' ) : 80);
		  $siteContentHeight += ('' != get_theme_mod( 'webseide_headstrip_height' ) ? get_theme_mod( 'webseide_headstrip_height' ) : 0);
		?>

        <?php if ( is_active_sidebar( 'headstrip' ) ) : ?>

            .page-template-page-3_no-title_transparent-header .site-content,
            .page-template-page-3_no-title_transparent-header #overallfooter {
                margin-top: -<?php echo $siteContentHeight; ?>px;
            }

        <?php endif; ?>

        .site-content {
            position: relative;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
        }

		input,
		textarea {
			border-radius: <?php echo ( '' != get_theme_mod( 'webseide_input_borderradius' ) ? get_theme_mod( 'webseide_input_borderradius') .'px' : 'inherit'); ?>;
		}

		button,
        .button,
        .site-header a,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.wp-block-button .wp-block-button__link,
		.post-categories li a,
		.edit-link a,
		.woocommerce .quantity .qty,
		input#coupon_code,
		a.dpc-btn.btn-webseide-show-comment-form,
        .dl-pricechart tr:last-of-type a,
        .nav-next a,
        .nav-previous a,
        .webseide_comment_loadmore,
        a#reply-title,
        .webseide_loadmore_posts {
			border-radius: <?php echo ( '' != get_theme_mod( 'webseide_button_borderradius' ) ? get_theme_mod( 'webseide_button_borderradius') .'px' : 'inherit'); ?>;
		}
        
                
        .menus,
        .headstrip-inner,
        .above-footer,
		.site-footer {
            width: 100%;
			max-width: <?php echo ('' != get_theme_mod( 'webseide_frame_width' ) ? get_theme_mod( 'webseide_frame_width' ).'px' : '1200px'); ?>;
            margin-left: auto;
            margin-right: auto;
        }

        #headstrip {
			height: <?php echo ( '' != get_theme_mod( 'webseide_headstrip_height' ) ? get_theme_mod( 'webseide_headstrip_height') .'px' : '0px'); ?>;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_extra_header_background' ) ? get_theme_mod( 'webseide_color_extra_header_background') : '#cacaca'); ?>;
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_extra_header_font' ) ? get_theme_mod( 'webseide_color_extra_header_font') : '#000000'); ?>;
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_headstrip_font' ) ? get_theme_mod( 'webseide_headstrip_font').'px' : '14px'); ?>;
        }
        
        #headstrip .sub-menu {
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_extra_header_background' ) ? get_theme_mod( 'webseide_color_extra_header_background') : '#cacaca'); ?>;
        }

        .headstrip-inner {
            line-height: <?php echo ( '' != get_theme_mod( 'webseide_headstrip_height' ) ? get_theme_mod( 'webseide_headstrip_height') .'px' : '0px'); ?>;
            display: table;
        }

        .alignmiddle .headstrip-inner {
            width: auto;
        }

        .headstrip-inner a {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_extra_header_font' ) ? get_theme_mod( 'webseide_color_extra_header_font') : '#000000'); ?>;
        }

        .headstrip-inner a:hover {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_extra_header_font_hover' ) ? get_theme_mod( 'webseide_color_extra_header_font_hover') : '#333333'); ?>;
        }

       	#masthead.site-header {
			position: relative;
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_headerfontweight' ) ? get_theme_mod( 'webseide_headerfontweight') : 'normal'); ?>;
            font-family: <?php if(get_theme_mod('webseide_headerfontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} elseif(get_theme_mod('webseide_headerfontstyle')=='sans-serif') { echo 'Helvetica, Arial, sans-serif';}?>;
    	}

		#masthead.site-header a {
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_headerfontweight' ) ? get_theme_mod( 'webseide_headerfontweight') : 'normal'); ?>;
            font-family: <?php if(get_theme_mod('webseide_headerfontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} elseif(get_theme_mod('webseide_headerfontstyle')=='sans-serif') { echo 'Helvetica, Arial, sans-serif';}?>;
		}

        .page-template-page-3_no-title_transparent-header header.site-header.dl-scrolling {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?> !important;
    	}

		#logo {
			height: <?php echo ( '' != get_theme_mod( 'webseide_logo_height' ) ? get_theme_mod( 'webseide_logo_height') : '48'); ?>px;
		}

        @media (min-width: 37.5em){
            #masthead.site-header {
			     height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') .'px' : '80px'); ?>;
            }

            #header-image, #site-navigation, #header_right {
                line-height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') .'px' : '80px'); ?>;
            }

            span#page-name {
                line-height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') .'px' : '80px'); ?>;
            }

            #header_right .dashicons,
            #header_right a.wpml-ls-link {
                line-height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') .'px' : '80px'); ?> !important;
            }

        }

        @media (max-width:37.49em){
            #header_right {
                line-height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') .'px' : '80px'); ?>;
            }
        }

		#mobileMenuToggle {
			padding-top: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') * .5.'px' : '40px'); ?>;
			top: -<?php echo ( '' != get_theme_mod( 'webseide_headerfont_desktop' ) ? get_theme_mod( 'webseide_headerfont_desktop' ) * .25.'px' : '5px'); ?>;
		}

		#mobileMenuToggle input {
			margin-top: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? get_theme_mod( 'webseide_header_height') * .5.'px' : '40px'); ?>;
		}

		.main-navigation.toggled,
		.main-navigation ul ul {
			background-color:  <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? 'background-color: '.get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?>;
		}

		body #mobileMenuToggle #primary_menu {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_mobile_menu_background' ) ? get_theme_mod( 'webseide_color_mobile_menu_background') : '#313131'); ?>;
		}

        #masthead input:focus {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
        }

		body .webseide-cart-widget .cart-icon-holder, body .webseide-cart-widget .cart-icon-holder .cart-icon {
			font-size: <?php echo ( '' != get_theme_mod( 'webseide_headerfont_desktop' ) ? get_theme_mod( 'webseide_headerfont_desktop' ).'px' : '18px'); ?>;
			color:  <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
		}

		.site-header,
		.site-header a,
		.main-navigation li:hover > a,
		.main-navigation li.focus > a,
        .current_page_parent a,
		#header_right,
		#header_right a,
		.site-header .dpc-btn.dpc-btn-share .dpc-label,
		.site-header .dpc-seperator {
    		color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
    	}

		.site-header,
		.site-header a,
		#header_right,
		#header_right a,
		.site-header .dpc-btn.dpc-btn-share .dpc-label{
    		font-size: <?php echo ( '' != get_theme_mod( 'webseide_headerfont_desktop' ) ? get_theme_mod( 'webseide_headerfont_desktop' ).'px' : '18px'); ?>;
    	}

        @media (max-width: 37.49em){
            #header-image {
                line-height: <?php echo ( '' != get_theme_mod( 'webseide_header_height' ) ? ''.get_theme_mod( 'webseide_header_height') * .9.'px' : '72px'); ?>;
            }
        }

		.site-header ::placeholder {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
    		font-size: <?php echo ( '' != get_theme_mod( 'webseide_headerfont_desktop' ) ? get_theme_mod( 'webseide_headerfont_desktop' ).'px' : '18px'); ?>;
		}


    	body #mobileMenuToggle span, body .show-hamburger-desktop #mobileMenuToggle span {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_burger_color' ) ? get_theme_mod( 'webseide_burger_color') : '#e1e3ea'); ?>;
    	}

    	#masthead #mobileMenuToggle,
		#masthead #mobileMenuToggle a {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_mobile_menu_font' ) ? get_theme_mod( 'webseide_color_mobile_menu_font') : '#f4f3f2;'); ?>;

    	}

    	#masthead a:hover,
		.current-menu-item a,
		#masthead #mobileMenuToggle a:hover {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover') : '#8e8e8e;'); ?>;
    	}

		#primary-menu a:hover,
		.main-navigation ul ul {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_mobile_menu_background' ) ? get_theme_mod( 'webseide_color_mobile_menu_background') : '#313131'); ?>;
		}

		/*.main-navigation ul ul {
			margin-top: -<?php echo ( '' != get_theme_mod( 'webseide_headerfont_desktop' ) ? get_theme_mod( 'webseide_headerfont_desktop').'px' : '18px'); ?>;
		}*/

		.menu-toggle span, .menu-toggle span:before, .menu-toggle span:after {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
		}

		.scrolling .menu-toggle span, .scrolling .menu-toggle span:before, .scrolling .menu-toggle span:after, .toggled .menu-toggle span:before, .toggled .menu-toggle span:after {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover') : '#8e8e8e'); ?>;
		}
		
        .woocommerce-ordering,
        .woocommerce .product-type-simple,
        .woocommerce-page .woocommerce-ordering,
        .blog-grid,
        .wp-block-columns,
        #overallfooter .webseide-search-form-holder input.search-field,
        #above_blog,
        #above_blog .webseide-search-form-holder input.search-field,
        #above_blogpost .webseide-search-form-holder input.search-field,
        #below_blogpost .webseide-search-form-holder input.search-field,
        #above_woocommerce,
        #below_woocommerce,
        #above_woocommerce .webseide-search-form-holder input.search-field,
        #below_woocommerce .webseide-search-form-holder input.search-field,
        .comments-area,
        .dpc-comments-area,
        .site-content ul.products,
        .site-content ol.commentlist,
        .site-content .comments-area h2,
        .site-content .comments-area h3,
        .site-content .comments-area p,
        .comments-area .nav-links,
        .webseide-comments-block {
			max-width: <?php echo ('' != get_theme_mod( 'webseide_max_width' ) ? get_theme_mod( 'webseide_max_width' ).'px' : '960px'); ?>;
			margin-left: auto;
            margin-right: auto;
			width: inherit;
		}

        .wp-block-columns {
            padding-top: <?php echo ('' != get_theme_mod( 'webseide_vertical-padding_top' ) ? get_theme_mod( 'webseide_vertical-padding_top' ).'px' : '0'); ?>;
            padding-bottom: <?php echo ('' != get_theme_mod( 'webseide_vertical-padding_bottom' ) ? get_theme_mod( 'webseide_vertical-padding_bottom' ).'px' : '1em'); ?>;
        }

        @media (min-width: 37.5em){
            .fullthumbnail img,
            .youtube-player-wrapper,
            #content ul.wp-block-gallery,
            .wp-block-kadence-rowlayout {
                width: 100vw;
                max-width: none;
                margin-left: calc(50% - 50vw);
                margin-right: calc(50% - 50vw);
            }

            <?php if(get_theme_mod( 'webseide_limitmediawidth' )==1): ?>
                .fullthumbnail img,
                .youtube-player-wrapper,
                #content ul.wp-block-gallery,
                .wp-block-kadence-rowlayout {
                    width: 100%;
                    max-width: <?php echo ('' != get_theme_mod( 'webseide_max_width' ) ? get_theme_mod( 'webseide_max_width' ).'px' : '960px'); ?>;
                    margin-left:auto;
                    margin-right:auto;
                }
            <?php endif; ?>

        }

        .kt-row-column-wrap {
            max-width: <?php echo ('' != get_theme_mod( 'webseide_max_width' ) ? get_theme_mod( 'webseide_max_width' ).'px' : '960px'); ?>;
            padding-top: <?php echo ('' != get_theme_mod( 'webseide_vertical-padding_top' ) ? get_theme_mod( 'webseide_vertical-padding_top' ).'px' : '0px'); ?>;
            padding-bottom: <?php echo ('' != get_theme_mod( 'webseide_vertical-padding_bottom' ) ? get_theme_mod( 'webseide_vertical-padding_bottom' ).'px' : '0px'); ?>;
            margin-left:auto;
            margin-right:auto;
        }


		.site-content h1,
		.site-content h2,
		.site-content h3,
		.site-content h4,
		.site-content h5,
		.site-content h6,
		.site-content p,
		.site-content blockquote,
		.site-content ul,
		.site-content ol,
		.site-content table,
        .taxonomy-description h1,
		.taxonomy-description h2,
		.taxonomy-description h3,
		.taxonomy-description h4,
		.taxonomy-description h5,
		.taxonomy-description h6,
		.taxonomy-description p,
        .taxonomy-description strong,
		.taxonomy-description blockquote,
		.taxonomy-description ul,
		.taxonomy-description ol,
		.taxonomy-description table,
		.entry-meta,
		.wp-block-text-columns,
		.wp-block-latest-posts,
		.wp-block-button,
        .wp-block-code,
        .wp-block-image,
        .dpc-rating-wrap,
		.blogdetailcontent .entry-header,
		.blogdetailcontent .entry-content,
		.blogdetailcontent .entry-footer,
        .comment-form-rating,
        .delucks_mcfs_optin_field,
        .webseide_mcfs_optin_field,
		.nav-links,
		.search-results .site-main,
		.no-results .search-form,
        .wp-block-search,
		.wp-block-webseide-accordion,
		.error404 .search-form,
		.error404 .widget_archive,
        .woocommerce div.product .woocommerce-tabs ul.tabs,
        div#review_form,
        .wpcf7-response-output,
        .wp-block-kadence-accordion,
        .wp-block-kadence-infobox,
        .wp-block-kadence-tabs,
        .dl-singlewidth,
        #content .gform_wrapper ul.gform_fields,
        .gform_wrapper form,
        .gform_confirmation_wrapper, 
        .gform_wrapper .gform_heading,
        .gform_wrapper .gform_footer,
        .gform_confirmation_wrapper,
        .above_blogpost,
		.below_blogpost {
			max-width: <?php echo ('' != get_theme_mod( 'webseide_max-content_width' ) ? get_theme_mod( 'webseide_max-content_width' ).'px' : '960px'); ?>;
            margin-left: auto;
            margin-right: auto;
		}

        .wp-block-quote.is-large, .wp-block-quote.is-style-large {
            margin: 1em auto .5em;
        }

		/* --- Content --- */
		:target:before {
		  	content:"";
		  	display:block;
			height: <?php echo $siteContentHeight; ?>px;
			margin: -<?php echo $siteContentHeight; ?>px 0 0;
		}

        .site-content {
            background-image: url(<?php echo get_theme_mod( 'webseide_background_image' ) ; ?>);
            <?php if(get_theme_mod( 'webseide_background_image_style' )=='pattern'): ?>
                background-position: top left;
                background-repeat: repeat;
            <?php elseif(get_theme_mod('webseide_background_image_style')=='stretch'):?>
                background-position: top center;
                background-repeat: no-repeat;
                background-size: cover;
            <?php else: ?>
                background-position: top center;
                background-repeat: no-repeat;
            <?php endif; ?>
         }


        .site-content .content-area {
            width: 100%;
            max-width: <?php echo ('' != get_theme_mod( 'webseide_max_width' ) ? get_theme_mod( 'webseide_max_width' )+'30' : '990'); ?>px;
            margin-left: auto;
            margin-right: auto;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_contentfontweight' ) ? get_theme_mod( 'webseide_contentfontweight') : 'normal'); ?>;
            font-family: <?php if(get_theme_mod('webseide_contentfontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} elseif(get_theme_mod('webseide_contentfontstyle')=='sans-serif') { echo('Helvetica, Arial, sans-serif');}?>
        }

        h1 {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1') : '#000000'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_h1fontweight' ) ? get_theme_mod( 'webseide_h1fontweight') : 'bold'); ?>;
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_h1fontsize' ) ? get_theme_mod( 'webseide_h1fontsize') : '32'); ?>px;
            font-family: <?php if(get_theme_mod('webseide_h1fontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} else { echo('Helvetica, Arial, sans-serif');}?>;
        }

        .site-content .content-area h1 strong,
        .wp-block-button__link,
        .kt-btn-wrap .kt-button,
        .wp-block-search .wp-block-search__input,
        .site-content .kt-blocks-accordion-header {
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_contentfont_desktop' ) ? get_theme_mod( 'webseide_contentfont_desktop') .'px' : '18px'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_contentfontweight' ) ? get_theme_mod( 'webseide_contentfontweight') : 'normal'); ?>;
        }

        h2,
        h2 a {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2') : '#3399CC'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_h2fontweight' ) ? get_theme_mod( 'webseide_h2fontweight') : 'bold'); ?>;
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_h2fontsize' ) ? get_theme_mod( 'webseide_h2fontsize') : '24'); ?>px;
            font-family: <?php if(get_theme_mod('webseide_h2fontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} else { echo('Helvetica, Arial, sans-serif');}?>;
        }

        h3,
        h3 a {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3') : '#66CCCC'); ?>;
            font-weight: <?php echo ( '' != get_theme_mod( 'webseide_h3fontweight' ) ? get_theme_mod( 'webseide_h3fontweight') : 'normal'); ?>;
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_h3fontsize' ) ? get_theme_mod( 'webseide_h3fontsize') : '18.72'); ?>px;
            font-family: <?php if(get_theme_mod('webseide_h3fontstyle')=='serif') {echo 'Georgia, "Times New Roman", Times, serif';} else { echo('Helvetica, Arial, sans-serif');}?>;
        }

		.site-content,
		.site-content input,
		.site-content textarea,
        .gfield_select,
        .woocommerce ul.products li.product .price,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
		.comments-area,
        .comment-respond {
    		color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text') : '#3a3a3a'); ?>;
    	}

        .site-content a:hover {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
        }

        .site-content input[type="submit"]:hover,
        .wp-block-button a.wp-block-button__link:hover,
        .dl-pricechart tr:last-of-type a:hover,
   		.site-content  button .wp-block-button__link:hover {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover') : '#ABB8C3'); ?>;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
        }

        .site-content .wp-block-button.is-style-outline a.wp-block-button__link:hover {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
            border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
        }

    	.content-area a,
		.site-content .comments-area a,
        .site-content .comment-respond a,
        .gfield_required,
        span.op-open,
        .op-table tr.op-row.highlighted th,
        .op-table tr.op-row.highlighted td,
        .above-footer a {
    		color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
    	}

        .gform_body input[type="checkbox"]:checked,
        .gform_body input[type="radio"]:checked {
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
        }

		select:-internal-list-box option:checked {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}

		::-moz-selection {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}

		::selection {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}

		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
        .site-content .content-area input.gform_next_button.button,
		.wp-block-button .wp-block-button__link,
		.youtube-player .play:hover,
		.post-categories li a,
		.site-content .content-area .edit-link a,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.wp-block-button__link:not(.has-background),
		.wp-block-button__link:not(.has-background):active,
		.wp-block-button__link:not(.has-background):focus,
		.wp-block-button__link:not(.has-background):hover,
        a.dpc-btn.btn-webseide-show-comment-form,
        .webseide_comment_loadmore,
        .dl-pricechart tr:last-of-type a,
        .nav-next a,
        .site-content .comments-area .nav-next a,
        .site-content .comments-area .nav-previous a,
        .webseide_loadmore_posts,
        a.dpc-btn.btn-delucks-show-comment-form {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
    		background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
    	}

        .site-content .content-area input[type="submit"],
        .wp-block-button a.wp-block-button__link {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
        }

        .site-content .content-area .wp-block-button.is-style-outline a.wp-block-button__link {
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text') : '#3a3a3a'); ?>;
            background: none;
            border: 3px solid <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
        }

		.site-content button:hover,
        .site-content input.gform_next_button.button:hover,
		a.wp-block-button__link:hover,
        .woocommerce button.button.alt:hover,
        a.dpc-btn.btn-webseide-show-comment-form:hover,
        .webseide_comment_loadmore:hover,
        .webseide_loadmore_posts:hover,
        a.dpc-btn.btn-delucks-show-comment-form:hover {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover') : '#ABB8C3'); ?>;
            background: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
    	}

		.post-has-background-image h2.entry-title a,
		.post-has-background-image p.webseide-post-excerpt,
		.post-has-background-image .entry-meta {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
		}

		/* --- Colors --- */

		.has-color-one-color,
        .wp-block-button__link.has-text-color.has-color-one-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-one-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-one-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?>;
		}
        .has-color-one-background-color,
		.wp-block-button .wp-block-button__link.has-color-one-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_background' ) ? get_theme_mod( 'webseide_color_header_background') : '#f4f3f2'); ?>;
		}

		.has-color-two-color,
        .wp-block-button__link.has-text-color.has-color-two-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-two-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-two-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
		}
        .has-color-two-background-color,
		.wp-block-button .wp-block-button__link.has-color-two-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font' ) ? get_theme_mod( 'webseide_color_header_font') : '#000000'); ?>;
		}

		.has-color-three-color,
        .wp-block-button__link.has-text-color.has-color-three-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-three-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover') : '#8e8e8e'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-three-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover') : '#8e8e8e'); ?>;
		}
        .has-color-three-background-color,
		.wp-block-button .wp-block-button__link.has-color-three-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_header_font_hover' ) ? get_theme_mod( 'webseide_color_header_font_hover') : '#8e8e8e'); ?>;
		}

		.has-color-four-color,
        .wp-block-button__link.has-text-color.has-color-four-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-four-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-four-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
		}
        .has-color-four-background-color,
		.wp-block-button .wp-block-button__link.has-color-four-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_background' ) ? get_theme_mod( 'webseide_color_content_background') : '#ffffff'); ?>;
		}

		.has-color-five-color,
        .wp-block-button__link.has-text-color.has-color-five-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-five-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text') : '#3a3a3a'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-five-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text') : '#3a3a3a'); ?>;
		}
        .has-color-five-background-color,
		.wp-block-button .wp-block-button__link.has-color-five-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_text' ) ? get_theme_mod( 'webseide_color_content_text') : '#3a3a3a'); ?>;
		}

		.has-color-six-color,
        .wp-block-button__link.has-text-color.has-color-six-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-six-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1') : '#000000'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-six-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1') : '#000000'); ?>;
		}
        .has-color-six-background-color,
		.wp-block-button .wp-block-button__link.has-color-six-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h1' ) ? get_theme_mod( 'webseide_color_content_h1') : '#000000'); ?>;
		}

		.has-color-seven-color,
        .wp-block-button__link.has-text-color.has-color-seven-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-seven-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2') : '#3399CC'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-seven-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2') : '#3399CC'); ?>;
		}
        .has-color-seven-background-color,
		.wp-block-button .wp-block-button__link.has-color-seven-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h2' ) ? get_theme_mod( 'webseide_color_content_h2') : '#3399CC'); ?>;
		}

		.has-color-eight-color,
        .wp-block-button__link.has-text-color.has-color-eight-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-eight-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3') : '#66CCCC'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-eight-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3') : '#66CCCC'); ?>;
		}
        .has-color-eight-background-color,
		.wp-block-button .wp-block-button__link.has-color-eight-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_h3' ) ? get_theme_mod( 'webseide_color_content_h3') : '#66CCCC'); ?>;
		}

		.has-color-nine-color,
        .wp-block-button__link.has-text-color.has-color-nine-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-nine-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-nine-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}
        .has-color-nine-background-color,
		.wp-block-button .wp-block-button__link.has-color-nine-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links' ) ? get_theme_mod( 'webseide_color_content_links') : '#ff6d63'); ?>;
		}

		.has-color-ten-color,
        .wp-block-button__link.has-text-color.has-color-ten-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-ten-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-ten-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
		}
        .has-color-ten-background-color,
		.wp-block-button .wp-block-button__link.has-color-ten-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_links_hover' ) ? get_theme_mod( 'webseide_color_content_links_hover') : '#e72655'); ?>;
		}

		.has-color-eleven-color,
        .wp-block-button__link.has-text-color.has-color-eleven-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-eleven-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover') : '#ffffff'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-eleven-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover') : '#ffffff'); ?>;
		}
        .has-color-eleven-background-color,
		.wp-block-button .wp-block-button__link.has-color-eleven-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_content_buttons_hover' ) ? get_theme_mod( 'webseide_color_content_buttons_hover') : '#ffffff'); ?>;
		}

        .has-color-twelve-color,
        .wp-block-button__link.has-text-color.has-color-twelve-color,
        .wp-block-button.is-style-outline .has-text-color.has-color-twelve-color {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background') : '#313131'); ?>;
		}
        .wp-block-button.is-style-outline .has-text-color.has-color-twelve-color {
			border-color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background') : '#313131'); ?>;
		}
        .has-color-twelve-background-color,
		.wp-block-button .wp-block-button__link.has-color-twelve-background-color {
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background') : '#313131'); ?>;
		}

		@media (min-width: 37.5em) {
			.blog-grid {
				display: grid;
                grid-template-columns: repeat(<?php echo ('' != get_theme_mod( 'webseide_blogcolumns' ) ? get_theme_mod( 'webseide_blogcolumns' ) : 3); ?>, 1fr);
                column-gap: 30px;
			}

            <?php if(get_theme_mod('webseide_blogcolumns')==1&& get_theme_mod('webseide_thumbnailsonblogview')==1): ?>

                .blog-grid article {
                    display: table;
                    padding: 0;
                }

                .blog-grid .webseide_blogview_thumbnail,
                .blog-grid .thumbnailsactive {
                    display: table-cell;
                    vertical-align: middle;
                }

                .blog-grid .has-post-thumbnail .webseide_blogview_thumbnail {
                    width: <?php echo ('' != get_theme_mod( 'webseide_max_width' ) ? get_theme_mod( 'webseide_max_width' ).'px' : '960px') / 3; ?>px;
                }

                .blog-grid .webseide_blogview_thumbnail img {
                     margin-bottom: -5px;
                }

                .blog-grid .thumbnailsactive {
                    padding: 1em;
                }

            <?php else: ?>
                .blog-grid article {
                    padding: 0 1em;
                }

            <?php endif; ?>


            .footer-widgets {
				display: grid;
				grid-template-columns: repeat(<?php echo ('' != get_theme_mod( 'webseide_footer_columns' ) ? get_theme_mod( 'webseide_footer_columns' ) : 2); ?>, 1fr);
                column-gap: 30px;
                /*padding: 1vh 0;*/
			}

            .page .commentlist {
				display: grid;
                grid-template-columns: repeat(<?php echo ('' != get_theme_mod( 'webseide_commentpagecolumns' ) ? get_theme_mod( 'webseide_commentpagecolumns' ) : 3); ?>, 1fr);
                column-gap: 30px;
		    }

	    }

        <?php if(get_theme_mod('webseide_page_showcommentdates')==0):?>
            .page .comment-metadata {
                display: none;
            }
        <?php endif; ?>

        <?php if(get_theme_mod('webseide_linksnotunderlined')==1):?>

            a {
                text-decoration: none;
            }

        <?php endif; ?>

        <?php if(get_theme_mod('webseide_post_showdates')==0):?>
            .posted-on {
                display: none;
            }
        <?php endif; ?>

        <?php if(get_theme_mod( 'webseide_post_showauthor')== 0): ?>
            .byline {
                display: none;
            }
        <?php endif; ?>

		.comment-list li {
			padding-bottom: <?php echo ( '' != get_theme_mod( 'webseide_contentfont_desktop' ) ? get_theme_mod( 'webseide_contentfont_desktop') .'px' : 'inherit'); ?>;
		}

		/* --- Comments --- */
		.wp-block-latest-comments__comment,
		.wp-block-latest-comments__comment-excerpt p {
			font-size: <?php echo ( '' != get_theme_mod( 'webseide_contentfont_desktop' ) ? get_theme_mod( 'webseide_contentfont_desktop') .'px' : 'inherit'); ?>;;
		}


		/* --- Footer --- */
    	#overallfooter {
			/*top: <?php echo $siteContentHeight; ?>px;*/
            color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
            background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_background' ) ? get_theme_mod( 'webseide_color_footer_background') : '#313131'); ?>;
            font-size: <?php echo ( '' != get_theme_mod( 'webseide_footerfont_desktop' ) ? get_theme_mod( 'webseide_footerfont_desktop') .'px' : '18px'); ?>;
    	}

		#overallfooter,
		#overallfooter input {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
    	}

		#overallfooter ::-webkit-input-placeholder {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
		}
		#overallfooter ::-moz-placeholder {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
		}
		#overallfooter :-ms-input-placeholder {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
		}
		#overallfooter :-moz-placeholder {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
		}

		#overallfooter button {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?> !important;
			background-color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font_hover' ) ? get_theme_mod( 'webseide_color_footer_font_hover') : '#8e8e8e'); ?>;
    	}

        #overallfooter a,
		#overallfooter button:hover {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font' ) ? get_theme_mod( 'webseide_color_footer_font') : '#f4f3f2'); ?>;
    	}

        #overallfooter a:hover,
		#overallfooter button:hover {
			color: <?php echo ( '' != get_theme_mod( 'webseide_color_footer_font_hover' ) ? get_theme_mod( 'webseide_color_footer_font_hover') : '#8e8e8e'); ?>;
    	}

    </style>
    <?php
}
if(!is_admin()) {
	add_action( 'wp_head', 'webseide_css' );
}
?>