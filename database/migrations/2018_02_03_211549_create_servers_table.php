<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'servers', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->ipAddress( 'server_ip' );
			$table->string( 'username' );
			$table->string( 'server_parent' )->nullable();
			$table->string( 'password' );
			$table->timestamp( 'created_at' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {



		Schema::dropIfExists( 'servers' );
	}
}
