var shipsJson = '';

(function($) {

	// load json data to variable only if it exists
	if($('#shipsJson').length > 0) {
		shipsJson = JSON.parse($('#shipsJson').val());
	}

	// call more info modal
	$('.more_info').click(function(e){
		e.preventDefault();
		var keyValue = $(this).attr('rel');
		var selectedShip = shipsJson[keyValue];

		$('#default_modal_title').text(selectedShip.name);
		$('#manufacturer_span').text(selectedShip.manufacturer);
		$('#starship_class_span').text(selectedShip.starship_class);
		$('#hyperdrive_rating_span').text(selectedShip.hyperdrive_rating);
		$('#cargo_capacity_span').text(selectedShip.cargo_capacity);
		$('#cost_in_credits_span').text(selectedShip.cost_in_credits);
		$('#max_atmosphering_speed_span').text(selectedShip.max_atmosphering_speed);
		$('#mglt_span').text(selectedShip.MGLT);

		$('#default_modal').modal();
	});

	// lazy loading images
	$('.lazy_load_image').each(function(){
		lazy_load_image($(this));
	});

	$(window).scroll(function () {
		$('.lazy_load_image').each(function(){
			lazy_load_image($(this));
		});
	});

	// show loading graphics on pagination click
	$('.pagination a').click(function(){
		$('.loading-container').show();
	});
	
	// hide loading when everything is ready
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
