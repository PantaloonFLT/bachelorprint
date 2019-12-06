jQuery(document).ready(function($,wrapper) {

	$(window).scrollTop(0);

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


	/*$(".bp-primary-nav > li.menu-item-has-children > ul > li" ).wrapAll( "<div class='container'></div>");*/


	$(".bp-primary-nav > li.menu-item-has-children").each(function(){
		$("> ul > li", this ).wrapAll( "<div class='container'></div>")
	});




});