/*like文章点赞*/
jQuery.fn.postLike = function() {
	if ($(this).hasClass('done')) {
	 	return false;
	} else {
	 	$(this).addClass('done');
	 	var id = $(this).data("id"),
	 	action = $(this).data('action'),
	 	rateHolder = $(this).children('.count');
	 	var ajax_data = {
	 		action: "zti_like",
	 		um_id: id,
	 		um_action: action,
	 	};
	 	$.post( ajaxcomment.ajax_url, ajax_data, /*通用ajax路径*/
	 	function(data) {
	 		$(rateHolder).html(data);
	 	});
	 	return false;
	}
};
jQuery(document).on("click", ".favorite",
	function() {
		$(this).postLike();
});