<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
	public function getUser() {
		$user = auth()->user();

		return view( 'show.user.index', compact( 'user' ) );

	}

	public function update( Request $request ) {

//		$this->validate( $request, [
//
//			'image_file' => 'image|1999'
//
//		] );


	return $request->file('image_file')->getClientOriginalName();


	}
}
