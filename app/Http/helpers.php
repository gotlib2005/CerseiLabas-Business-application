<?php

/**
 * Return nav-here if current path begins with this path.
 *
 * @param string $path
 *
 * @return string
 */
function setActive( $path ) {
	return Request::path() == $path ? 'active' : '';
}


function printErrorText( $inputName, $errors, $message ) {

	return $errors->first( $inputName, $message );

}

function projectstatus( $status ) {
	switch ( $status ) {
		case 'Active':
			return 'active';
			break;
		case 'Completed':
			return 'completed';
			break;
		case 'Pending':
			return 'pending';
			break;
		default:
			return '';
	}
}