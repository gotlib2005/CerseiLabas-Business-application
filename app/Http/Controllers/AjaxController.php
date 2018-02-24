<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AjaxController extends Controller {

	public function search( Request $request ) {

		if ( $request->ajax() ) {
			$servers  = DB::table( 'servers' )->where( 'name', 'LIKE', '%' . $request->search . "%" )->get();
			$projects = DB::table( 'projects' )->where( 'name', 'LIKE', '%' . $request->search . "%" )->get();
			$clients = DB::table( 'clients' )->where( 'name', 'LIKE', '%' . $request->search . "%" )->get();

			$output = '';
			if ( $servers != [] ) {

				foreach ( $servers as $server => $prop ) {
					$output .= '<a class="clients" href="' . URL::to( '/servers/' . $prop->id . '/edit' ) . '">' . $prop->name . ' (server)</a>';
				}
			}


			if($projects != []) {

				foreach ( $projects as $project => $prop ) {
					$output .= '<a class="clients" href="' . URL::to( '/projects/' . $prop->id . '/edit' ) . '">' . $prop->name . ' (project)</a>';
				}

			}

			if ( $clients != [] ) {

				foreach ( $clients as $client => $prop ) {
					$output .= '<a class="clients" href="' . URL::to( '/clients' ) . '">' . $prop->name . ' (client)</a>';
				}
			}

			return $output;

		}


	}
}