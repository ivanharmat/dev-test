

(function($) {

	$('.lazy_load_image').each(function(){
		lazy_load_image($(this));
	});
	
	$(window).scroll(function () {
		$('.lazy_load_image').each(function(){
			lazy_load_image($(this));
		});
	});

	$('.pagination a').click(function(){
		$('.loading-container').show();
	});
	
	$('.loading-container').fadeOut(1000, function () {
        $(this).hide();
    });	
})(jQuery);


function lazy_load_image($this) {
    if($this.visible()){
        $this.removeClass('lazy_load_image');
        // load image now
        var imageSrc = $this.attr('data-src');
        $this.hide();
        $this.attr('src', imageSrc);
        // $this.show();
        $this.fadeIn(1000, function(){
            $this.show();
        });
    }
}
