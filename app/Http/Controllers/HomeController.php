<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {


		$Servers    = new Server;
		$allservers = $Servers->all();

		return view( 'show.server.allservers', compact( 'allservers' ) );
	}
}
