<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'projects', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->text( 'description' );
			$table->integer( 'client_id' )->unsigned()->nullable();
			$table->foreign( 'client_id' )->references( 'id' )->on( 'clients' )->onDelete( 'cascade' );
			$table->string( 'type' );
			$table->string( 'status' );
			$table->date( 'start_date' );
			$table->date( 'end_date' );
			$table->integer( 'price' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'projects' );
	}
}
