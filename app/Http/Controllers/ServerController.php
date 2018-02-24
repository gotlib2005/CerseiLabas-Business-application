<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServerController extends Controller {

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {

		$allservers = Server::all();

		return view( 'show.server.allservers', compact( 'allservers' ) );
	}

	/**
	 * @param Server $server
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
//	public function show( Server $server ) {
//
//		$currentParentServer = Server::getCurrentParentServer( $server );
//
//		return view( 'show.server.single', [
//			'server'              => $server,
//			'currentParentServer' => $currentParentServer
//		] );
//	}

	/**
	 * @param Server $server
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function editServer( Server $server ) {

		/**
		 * TODO promeniti kad se izabere server da bude null nece da ga izbaci na front jer ne postoji
		 */


		if ( $server->parent == null ) {
			$allParentServers = Server::whereNotIn( 'id', [  $server->id ] )->get();
		} else {
			$allParentServers = Server::whereNotIn( 'id', [ $server->parent->id, $server->id ] )->get();
		}

		return view( 'show.server.edit', compact( [ 'server', 'allParentServers' ] ) );
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {

		$allServers = Server::all();

		return view( 'show.server.add-server', compact( 'allServers' ) );

	}

	/**0
	 * @param $server
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function update( $server, Request $request ) {

		$data = request()->all();
		unset( $data['_token'] );
		unset( $data['q'] );
		if ( $data['mysql_host'] == '' ) {
			$data['mysql_host'] = 'localhost';
		}

		DB::table( 'servers' )
		  ->where( 'id', $server )
		  ->update( $data );

		$server              = Server::find( $server );
		$currentParentServer = Server::getCurrentParentServer( $server );


		return Redirect::route( 'edit_server', [ 'id' => $server->id ] );

	}

	/**
	 * @param $server
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function destroy( $server ) {

		DB::table( 'servers' )
		  ->where( 'id', $server )
		  ->delete();

		return redirect( '/' );

	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store( Request $request ) {


		$data = $request->all();


		if ( $data['mysql_host'] == '' ) {
			$data['mysql_host'] = 'localhost';
		}


		$server = new Server( $data );
		$server->save();

		$serverParent = Server::find( $data['parent_id'] );

		try {

			$server->parent_id = $serverParent->id;
			$server->save();

		} catch ( \Exception $e ) {
			print_r( $e->getMessage() );
		}

		return Redirect::route( 'edit_server', [ 'id' => $server->id ] );
	}
}