jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.webseide_loadmore_posts').click(function(){

		var button = $(this),
		    data = {
			'action': 'loadmore_posts',
			'query': loadmore_posts.posts, // that's how we get params from wp_localize_script() function
			'page' : loadmore_posts.current_page
		};

		$.ajax({ // you can also use $.post here
			url : loadmore_posts.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text(loadmore_posts.loading_text); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) {
					button.text( loadmore_posts.loadmore_text ); // insert new posts
					$('.blog-grid', $(button).parents('#main')).append(data);
					loadmore_posts.current_page++;

					if ( loadmore_posts.current_page == loadmore_posts.max_page ){
						button.remove(); // if last page, remove the button
					}
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});