<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModyfyProjectsTable extends Migration {
	public function up() {
		Schema::table( 'projects', function ( Blueprint $table ) {


			$table->dropForeign( [ 'client_id' ] );
			$table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'set null' );

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'projects', function ( Blueprint $table ) {
			$table->dropForeign( 'client_id' );
			$table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'cascade' );
		} );
	}
}
