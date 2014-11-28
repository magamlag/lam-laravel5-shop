<?php

class Availability {

	public static function display( $availability ) {
		if ( $availability == 0 ):
			echo "Out of Stock";
		else:
			echo "In Stock";
		endif;
	}

	public static function displayClass( $availability ) {
		if ( $availability == 0 ):
			echo "outofstork";
		else:
			echo "instock";
		endif;
	}
}