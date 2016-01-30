$('.nav-side .nav-toggle').on('click', function() {

	event.preventDefault();
	$(this).parent().toggleClass('nav-open');

});