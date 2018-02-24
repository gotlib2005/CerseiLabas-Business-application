<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Server extends Model {

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	protected $fillable = [
		'name',
		'server_ip',
		'ssh_user',
		'ssh_pass',
		'parent_id',
		'mysql_user',
		'mysql_pass',
		'mysql_db',
		'mysql_host',
		'ssh_port',
		'ftp_user',
		'ftp_pass',
		'ftp_dir',
		'ftp_port',
		'ssh_key',
		'wp_admin_url',
		'wp_admin_user',
		'wp_admin_pass',
		'wp_website_address',
		'server_technology'
	];

	public $timestamps = false;

	public function getAll() {

		$Servers = DB::table( 'servers' )->get();

		return $Servers;

	}

	public function client() {
		return $this->belongsTo( Client::class );
	}

	public static function getCurrentParentServer( $server ) {
		return Server::find( $server->parent_id );
	}

	function parent() {
		return $this->belongsTo( static::class, 'parent_id' );
	}

}