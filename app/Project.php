<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $fillable = [

		'name',
		'description',
		'client_id',
		'type',
		'status',
		'start_date',
		'end_date',
		'price'
	];

	public function client() {

		return $this->belongsTo( Client::class );

	}
}