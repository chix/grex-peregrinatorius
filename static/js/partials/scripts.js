$(document).ready(function(){
	$('.grex-entry img').each(function() {
		var newClass = 'grex-image ' + $(this).attr('class');

		$(this).addClass('img-responsive');

		var attributes = [];
		if ($(this).attr('title')) {
			attributes.push($(this).attr('title'));
		}
		if ($(this).attr('alt')) {
			attributes.push($(this).attr('alt'));
		}

		if (attributes.length) {
			$(this).wrap('<div class="' + newClass + '" data-caption="' + attributes.join(' &middot; ') + '"></div>');
		}
	});
});
