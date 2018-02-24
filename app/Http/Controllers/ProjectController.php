<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class ProjectController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$projects = Project::all();


		return view( 'show.project.index', compact( 'projects' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$clients = Client::all();

		$nowDate = Carbon::now();


		return view( 'show.project.create', compact( 'clients', 'nowDate' ) );


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {

		$data = $request->all();


		$projectExist = Project::where( 'name', '=', $request->name )->first();
		if ( $projectExist === null ) {
			$newProject = new Project( $data );
			$newProject->save();
		}
		Session::flash( 'new_project', 'New Project has been added!' );


		return Redirect::route( 'allprojects', [ 'id' => $newProject->id ] );

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Project $project ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Project $project ) {

		$project = Project::find( $project->id );
		$client  = Client::find( $project->client_id );
		$clients = Client::all();

		return view( 'show.project.edit', compact( 'project', 'client', 'clients' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Project $project
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $project ) {


		$data = request()->all();
		unset( $data['_token'] );
		unset( $data['q'] );

		\DB::table( 'projects' )
		   ->where( 'id', $project )
		   ->update( $data );


		return Redirect::route( 'editproject', [ 'id' => $project ] );


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $project ) {


		\DB::table( 'projects' )
		   ->where( 'id', $project )
		   ->delete();

		return Redirect::route( 'allprojects' );

	}
}
