 $(document).ready( function() {
	$( "#slider-range" ).slider({
		range: true,
		min: 10,
		max: 1000,
		values: [ 10, 1000 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$( "#minp" ).val(ui.values[ 0 ]);
			$( "#maxp" ).val(ui.values[ 1 ]);
		}
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	$( "#minp" ).val($( "#slider-range" ).slider( "values", 0 ));
	$( "#maxp" ).val($( "#slider-range" ).slider( "values", 1 ));
});