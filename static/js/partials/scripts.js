$(document).ready(function(){
	$('.grex-entry img').each(function() {
		$(this).addClass('img-responsive');

		var attributes = [];
		if ($(this).attr('title')) {
			attributes.push($(this).attr('title'));
		}
		if ($(this).attr('alt')) {
			attributes.push($(this).attr('alt'));
		}

		if (attributes.length) {
			$(this).wrap('<div class="grex-image" data-caption="' + attributes.join(' &middot; ') + '"></div>');
		}
	});
});
