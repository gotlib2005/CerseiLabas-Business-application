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

	return  $errors->first( $inputName, $message ) ;

}


