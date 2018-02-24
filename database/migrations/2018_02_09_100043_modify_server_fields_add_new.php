<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyServerFieldsAddNew extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'servers', function ( Blueprint $table ) {

			$table->string( 'mysql_user' );
			$table->string( 'mysql_pass' );
			$table->string( 'mysql_db' );
			$table->string( 'mysql_host' )->default( 'localhost' );

			$table->renameColumn( 'username', 'ssh_user' );
			$table->renameColumn( 'password', 'ssh_pass' );

			$table->text( 'ssh_key' );
			$table->integer( 'ssh_port' );

			$table->string( 'ftp_user' );
			$table->string( 'ftp_pass' );
			$table->string( 'ftp_dir' );
			$table->integer( 'ftp_port' );


			$table->string( 'wp_admin_url' );
			$table->string( 'wp_admin_user' );
			$table->string( 'wp_admin_pass' );
			$table->string( 'wp_website_address' );

			$table->string( 'server_technology' );


		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'servers', function ( Blueprint $table ) {
			$table->dropColumn( 'mysql_user' );
			$table->dropColumn( 'mysql_pass' );
			$table->dropColumn( 'mysql_db' );
			$table->dropColumn( 'mysql_host' )->default( 'localhost' );

			$table->renameColumn( 'ssh_user', 'username' );
			$table->renameColumn( 'ssh_pass', 'password' );


			$table->dropColumn( 'ssh_port' );
			$table->dropColumn( 'ftp_user' );
			$table->dropColumn( 'ftp_pass' );
			$table->dropColumn( 'ftp_dir' );
			$table->dropColumn( 'ftp_port' );
			$table->dropColumn( 'ssh_key' );
			$table->dropColumn( 'wp_admin_url' );
			$table->dropColumn( 'wp_admin_user' );
			$table->dropColumn( 'wp_admin_pass' );
			$table->dropColumn( 'wp_website_address' );
			$table->dropColumn( 'server_technology' );

		} );
	}
}
