

(function($) {

	$('.pagination a').click(function(){
		$('.loading-container').show();
	});
	
	$('.loading-container').fadeOut(1000, function () {
        $(this).hide();
    });	
})(jQuery);
