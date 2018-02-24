<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $fillable = [ 'name', 'server_id', 'email' ];

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public static function getClient( $id ) {
		return Client::find( $id );
	}

	public function server() {
		return $this->belongsTo( Server::class, 'server_id' );
	}

	public function projects() {
		return $this->hasMany( Project::class );
	}
}