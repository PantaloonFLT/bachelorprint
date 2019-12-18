jQuery(document).ready(function($,wrapper) {

	/* start at top on reload */
	$(window).scrollTop(0);

	/* to-top-button display */
	jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() > 30) {
        	$('.scroll-to-top').fadeIn();
        } else {
        	$('.scroll-to-top').fadeOut();
        }
    });

	/* to-top-button click */
    $('.scroll-to-top').click(function(ev){
    	ev.preventDefault();
    	$('body, html').stop().animate({scrollTop:0}, 500, 'swing');
    });

	/* footnotes toggle */
	$('.footnotes .handle').click(function() {
		if($('#footnotes_content').is(':visible')){
			$('> span', this).removeClass('lnr-chevron-up').addClass('lnr-chevron-down');
			$('#footnotes_content').slideUp();
		} else {
			$('> span', this).removeClass('lnr-chevron-down').addClass('lnr-chevron-up');
			$('#footnotes_content').slideDown();
		}
	});

	/* add container div to menu items */
	$(".bp-primary-nav > li.menu-item-has-children").each(function(){
		$("> ul > li", this ).wrapAll( "<div class='container'></div>")
	});

});