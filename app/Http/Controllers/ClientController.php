<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\Server;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$allClients = Client::all();

		return view( 'show.client.all', compact( 'allClients' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {


		$servers = Server::all();

		return view( 'show.client.add', compact( 'servers' ) );

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store() {


		$this->validate( \request(), [

			'name'      => 'required',
			'email'     => 'required'

		] );
		Client::create( request( [ 'name', 'server_id', 'email' ] ) );


		return redirect( 'clients');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Client $client
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $client ) {

		$getclient = Client::getClient( $client );
		$server    = Server::find( $getclient->server_id );


		return view( 'show.client.client', [
			'server'    => $server,
			'getclient' => $getclient
		] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Client $client
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Client $client ) {



		$servers = Server::where( 'id', '!=',  $client->server_id  )->get();




		return view( 'show.client.edit',['client' => $client, 'servers' => $servers] );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Client $client
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Client $client ) {

		$this->validate( \request(), [

			'name'      => 'required',
			'email'     => 'required'


		] );

		$data = request()->all();
		unset( $data['_token'] );
		unset( $data['q'] );


		\DB::table( 'clients' )
		   ->where( 'id', $client->id )
		   ->update( $data );

		return Redirect::route( 'allclient' );



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Client $client
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Client $client ) {



		DB::table( 'clients' )
		  ->where( 'id', $client->id )
		  ->delete();

		return redirect( '/clients' );




	}
}
