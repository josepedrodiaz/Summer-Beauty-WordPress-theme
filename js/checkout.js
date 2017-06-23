$(document).ready(function() {

	$( '.payment_methods' ).on( 'click', 'input.input-radio', function(event) {

		if ( $( '.payment_methods input.input-radio' ).length > 1 ) {
			var target_payment_box = $( 'div.payment_box.' + $( this ).attr( 'ID' ) );

			if ( $( this ).is( ':checked' ) && ! target_payment_box.is( ':visible' ) ) {
				$( 'div.payment_box' ).filter( ':visible' ).slideUp( 250 );

				if ( $( this ).is( ':checked' ) ) {
					$( 'div.payment_box.' + $( this ).attr( 'ID' ) ).slideDown( 250 );
				}
			}
		} else {
			$( 'div.payment_box' ).show();
		}

		if ( $( this ).data( 'order_button_text' ) ) {
			$( '#place_order' ).val( $( this ).data( 'order_button_text' ) );
		} else {
			$( '#place_order' ).val( $( '#place_order' ).data( 'value' ) );
		}

	});
	
});