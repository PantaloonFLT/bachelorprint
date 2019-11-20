jQuery(document).ready(function($,wrapper) {

	setTimeout(function(){
		$('.youtube-player').each(function(item){
			jQuery(this).wrapAll('<div class="youtube-player-wrapper" />');
		});
	}, 50);

	/**
	 * Comments
	 */
	//if(document.getElementsByClassName('webseide-comments-block')){
		$('.btn-webseide-show-comment-form').bind('click', function(ev){
			if($(this).hasClass('goto-comment-form')){
				if(typeof($("#respond")) !== 'undefinded'){
					$(document).scrollTop( $(".comment-respond").last().offset().top );
				}
			} else {
				ev.preventDefault();
				var toggle		= $(this).attr('data-toggle');

				$('#'+ toggle + '.webseide-comments-wrapper').show();
				$(this).hide();
				return false;
			}
		});
	//}

/*
    jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() > 30) {
        	jQuery('.site-header').addClass('dl-scrolling');
            jQuery('#headstrip').addClass('dl-scrolling');
        } else {
        	jQuery('.site-header').removeClass('dl-scrolling');
            jQuery('#headstrip').removeClass('dl-scrolling');
        }

        if(jQuery(window).scrollTop() > 30) {
        	jQuery('.site-header').addClass('dl-scrolling');
            jQuery('#headstrip').addClass('dl-scrolling');
        } else {
        	jQuery('.site-header').removeClass('dl-scrolling');
            jQuery('#headstrip').removeClass('dl-scrolling');
        }
    });
    */

	if(typeof(webseide_header) == 'object'){
		header 				= jQuery('.site-header');
		siteContent 		= jQuery('.site-content');
		adminBarHeight 		= (jQuery('#wpadminbar').length ? jQuery('#wpadminbar').height() : 0);
		offsetHeader 		= header.offset().top;
		transtparentHeader 	= (jQuery('body.page-template-page-3_no-title_transparent-header').length ? true : false);

		if(jQuery('#headstrip').length){
			headerstrip 		= jQuery('#headstrip');
			offsetHeaderstrip 	= headerstrip.offset().top;
		}

		jQuery(window).scroll(function(){
			var scrollTop = jQuery(window).scrollTop();

			if(webseide_header.headstrip_position == 'aboveheader'){
				/****** HEADER: start */
				if(webseide_header.header_fixed == true){
					offsetToClip 	= offsetHeader;
					newOffsetHeader	= 0;

					if(webseide_header.headstrip_fixed == true){
						offsetToClip 	= 0;
						newOffsetHeader	= offsetHeader;
					}

					if(scrollTop > offsetToClip){
						header.css({ 'height': webseide_header.header_height + 'px', 'position': 'fixed', 'top': newOffsetHeader + 'px'});
						if(webseide_header.headstrip_fixed == false){
							siteContent.css({ 'margin-top': parseInt(newOffsetHeader) + parseInt(webseide_header.header_height) - parseInt(adminBarHeight) + 'px' });
						}
					} else {
						header.css({ 'height': webseide_header.header_height + 'px', 'position': 'relative', 'top': 'auto'});
						if(webseide_header.headstrip_fixed == false){
							siteContent.css({ 'margin-top': '0px' });
						}
					}
				}
				/****** HEADER: end */

				/****** HEADSTRIP: start */
				if(webseide_header.headstrip_fixed == true){
					offsetToClip 	= 0;
					newOffsetHeadstrip	= offsetHeaderstrip;

					if(scrollTop > offsetToClip){
						headerstrip.css({ 'height': webseide_header.headstrip_height + 'px', 'position': 'fixed', 'top': newOffsetHeadstrip + 'px'});
						if(webseide_header.header_fixed == true){
							siteContent.css({ 'margin-top': parseInt(newOffsetHeadstrip) + parseInt(webseide_header.headstrip_height) - parseInt(adminBarHeight) + 'px' });
						} else {
							header.css({ 'margin-top': parseInt(newOffsetHeadstrip) + parseInt(webseide_header.headstrip_height) - parseInt(adminBarHeight) + 'px' });
						}
					} else {
						headerstrip.css({ 'height': webseide_header.headstrip_height + 'px', 'position': 'relative', 'top': 'auto'});
						if(webseide_header.header_fixed == true){
							siteContent.css({ 'margin-top': '0px' });
						} else {
							header.css({ 'margin-top': '0px' });
						}
					}
				}

				/****** HEADSTRIP: end */

				/****** SITE ALIGNMENT: start */
				if(webseide_header.header_fixed == true && webseide_header.headstrip_fixed == true){
					offsetToClip 	= 0
					newMarginSite 	= parseInt(webseide_header.header_height) + parseInt(webseide_header.headstrip_height);

					if(scrollTop > offsetToClip){
						siteContent.css({ 'margin-top': newMarginSite + 'px' });
					} else {
						siteContent.css({ 'margin-top': '0px' });
					}
				}
				/****** SITE ALIGNMENT: end */
			} else if(webseide_header.headstrip_position == 'belowheader'){
				/****** HEADSTRIP: start */
				if(webseide_header.headstrip_fixed == true){
					offsetToClip 			= webseide_header.header_height;
					newOffsetHeaderstrip	= adminBarHeight;

					if(webseide_header.header_fixed == true){
						offsetToClip 			= 0;
						newOffsetHeaderstrip	= offsetHeaderstrip;
					}

					if(scrollTop > offsetToClip){
						headerstrip.css({ 'height': webseide_header.headstrip_height + 'px', 'position': 'fixed', 'top': newOffsetHeaderstrip + 'px'});
						if(webseide_header.header_fixed == false){
							siteContent.css({ 'margin-top': webseide_header.headstrip_height + 'px' });
						}
					} else {
						headerstrip.css({ 'height': webseide_header.headstrip_height + 'px', 'position': 'relative', 'top': 'auto'});
						if(webseide_header.header_fixed == false){
							siteContent.css({ 'margin-top': '0px' });
						}
					}
				}
				/****** HEADSTRIP: end */

				/****** HEADER: start */
				if(webseide_header.header_fixed == true){
					offsetToClip 	= 0;
					newOffsetHeader	= offsetHeader;

					if(scrollTop > offsetToClip){
						header.css({ 'height': webseide_header.header_height + 'px', 'position': 'fixed', 'top': newOffsetHeader + 'px'});
						if(webseide_header.headstrip_fixed == true){
							siteContent.css({ 'margin-top': parseInt(newOffsetHeader) + parseInt(webseide_header.header_height) - parseInt(adminBarHeight) + 'px' });
						} else {
							headerstrip.css({ 'margin-top': parseInt(newOffsetHeader) + parseInt(webseide_header.header_height) - parseInt(adminBarHeight) + 'px' });
						}
					} else {
						header.css({ 'height': webseide_header.header_height + 'px', 'position': 'relative', 'top': 'auto'});
						if(webseide_header.headstrip_fixed == true){
							siteContent.css({ 'margin-top': '0px' });
						} else {
							headerstrip.css({ 'margin-top': '0px' });
						}

					}
				}

				/****** HEADER: end */

				/****** SITE ALIGNMENT: start */
				if(webseide_header.header_fixed == true && webseide_header.headstrip_fixed == true){
					offsetToClip 	= 0
					newMarginSite 	= parseInt(webseide_header.header_height) + parseInt(webseide_header.headstrip_height);

					if(scrollTop > offsetToClip){
						siteContent.css({ 'margin-top': newMarginSite + 'px' });
					} else {
						siteContent.css({ 'margin-top': '0px' });
					}
				}
				/****** SITE ALIGNMENT: end */
			}
		});
	}

   /**
    * Header search
    */
   if(document.getElementsByClassName('webseide-search-form-holder')){
		$('#masthead .webseide-search-trigger-holder > .webseide-search-trigger').bind('click', function(ev){
			ev.preventDefault();
			$(this).parents().find('#masthead .webseide-search-trigger-holder').addClass('search-active');
			// $(this).parents().find('.webseide-search-trigger-holder .dashicons.dashicons-search').removeClass('dashicons-search').addClass('dashicons-no');
			$('#masthead .webseide-search-trigger-holder .search-field').focus();
		});
		$('#masthead .webseide-search-trigger-holder .search-field').bind('blur', function(ev){
			$(this).parents().find('#masthead .webseide-search-trigger-holder').removeClass('search-active');
			// $(this).parents().find('.webseide-search-trigger-holder .dashicons.dashicons-no').removeClass('dashicons-no').addClass('dashicons-search');
		});

		// $('.webseide-search-trigger-holder.search-active .webseide-search-trigger').bind('blur', function(ev){
			// $(this).parents().find('.webseide-search-trigger-holder').removeClass('search-active');
			// $(this).parents().find('.webseide-search-trigger-holder .dashicons.dashicons-no').removeClass('dashicons-no').addClass('dashicons-search');
		// });
	}


	jQuery('h2 > span').each(function(i, elem){
		new Waypoint({
			element: elem,
			handler: function(direction) {
				jQuery('#toc_container .toc_list li').removeClass('active');
				jQuery('#toc_container .toc_list').find('a[href$="#'+jQuery(elem).attr('id')+'"]').parent().addClass('active');
			},
			offset: 'bottom-in-view'
		});
	});

	jQuery('.toggleButton').on('click', function(e){
		button = jQuery(this);
		var container = jQuery(this).attr('data-toggle');
		if(jQuery('.toggleContent#'+container).is(':visible')){
			jQuery('.toggleContent#'+container).slideUp();
			button.removeClass('open');
		} else {
			jQuery('.toggleContent#'+container).slideDown();
			button.addClass('open');
		}
	});

	jQuery('.tabTrigger').on('click', function(e){
		button			= jQuery(this);
		contentClass	= button.parents('.tabTriggerWrapper').attr('id');
		index			= button.index();

		var container = jQuery('.'+contentClass+' > div:eq('+index+')');
		container.animate({ opacity: '1' }, 500).siblings().animate({ opacity: '0' }, 500);

		button.addClass('active').siblings().removeClass('active');

	});


	singleTitle = jQuery('.menus .single-title');
	jQuery('.menus #primary-menu').after(singleTitle);


	if(typeof(Draggable) !== 'undefined'){
		Draggable.create(".rotate-circle", {type: "rotation", throwProps: true});
	}


	if(window.addEventListener){
	    window.addEventListener('scroll',scroll)
	}else if(window.attachEvent){
	    window.attachEvent('onscroll',scroll);
	}

	function scroll(ev){
	    var st = Math.max(document.documentElement.scrollTop,document.body.scrollTop);
	    if(!st){
	    	jQuery('.dpc-sharing').removeClass('hide-mobile');
	    }else if((st+document.documentElement.clientHeight)>=(document.documentElement.scrollHeight -200) ){
	    	jQuery('.dpc-sharing').addClass('hide-mobile');
	    }else{
	    	jQuery('.dpc-sharing').removeClass('hide-mobile');
	    }
	}

	jQuery(document).ready(function(){
		jQuery('.dl-invisible').viewportChecker({
		    classToAdd: 'dl-visible', // Class to add to the elements when they are visible,
		    classToAddForFullView: 'dl-full-visible', // Class to add when an item is completely visible in the viewport
		    classToRemove: 'dl-invisible' // Class to remove before adding 'classToAdd' to the elements
		});
    });




});




/* Light YouTube Embeds by @labnol */
/* Web: http://labnol.org/?p=27941 */

document.addEventListener("DOMContentLoaded",
    function() {
        var div, n, url, id, video,
            v = jQuery(".wp-block-embed-youtube");

        for (n = 0; n < v.length; n++) {
            div = document.createElement("div");

            url		= jQuery(".wp-block-embed-youtube iframe").attr('src');
			id 		= url.substring(url.lastIndexOf("/")+1, url.lastIndexOf("?"));

			jQuery(".wp-block-embed-youtube iframe").remove();

            div.setAttribute("data-id", id);
            div.innerHTML = labnolThumb( id );
            div.onclick = labnolIframe;
            v[n].setAttribute("class", 'youtube-player')
            v[n].appendChild(div);
        }
    }
);

function labnolThumb(id) {
    var thumb 	= '<img src="https://img.youtube.com/vi/ID/maxresdefault.jpg">',
        play 	= '<div class="play"></div>';
    return thumb.replace("ID", id) + play;
}

function labnolIframe() {
    var iframe 	= document.createElement("iframe");
    var embed 	= "https://www.youtube-nocookie.com/embed/ID?&vq=hd720&autoplay=1&rel=0&controls=1&showinfo=0"; // Edited by Fex 05.01.2018
    iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "1");
    this.parentNode.replaceChild(iframe, this);
}