jQuery(document).ready(function($) {

	$('.menu-item-has-children').append('<span class="submenu-toggle">+</span>');

	$('.menu-item-has-children > .submenu-toggle').on('click', function(){
		if($('.sub-menu', $(this).parent()).is(':visible')){
			$('.sub-menu', $(this).parent()).slideUp();
			$(this).text('+');
		} else {
			$('.sub-menu', $(this).parent()).slideDown();
			$(this).text('-');
		}
	});

});