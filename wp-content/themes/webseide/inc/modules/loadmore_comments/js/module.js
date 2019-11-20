jQuery(document).ready(function($) {

	$('.webseide_comment_loadmore').click( function(){
		var button = $(this);
		loadmore_comments.cpage++;

		$.ajax({
			url : loadmore_comments.ajaxurl,
			data : {
				'action': 'loadmore_comments',
				'post_id': loadmore_comments.parent_post_id,
				'cpage' : loadmore_comments.cpage,
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text(loadmore_comments.comment_loading_text);
			},
			success : function( data ){
				if( data ) {
					$('ol.commentlist').append( data );
					button.text(loadmore_comments.comment_more_text);

					if(typeof(dpc_rating_settings) == 'object' && typeof(dpc_rating_settings.starRated) == 'string'){
						$('input.dpc-rating-input').rating();
						$(".rating-symbol-foreground > .dpc-unicode-icon").css("color", (dpc_rating_settings.starRated == '' ? '#f8d300' : dpc_rating_settings.starRated));
					}

					if ( loadmore_comments.cpage == (loadmore_comments.comment_max_page -1) )
						button.remove();
				} else {
					button.remove();
				}
			}
		});
		return false;
	});

});