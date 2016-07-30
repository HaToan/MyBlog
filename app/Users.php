<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
	protected $table = 'users';

	public function posts() {
		return $this->hasMany('App\Posts', 'user_id');
	}

	public function comments() {
		return $this->hasMany('App\Comments', 'user_id');
	}

	public function media() {
		return $this->belongsTo('App\Media', 'media_id');
	}
}
