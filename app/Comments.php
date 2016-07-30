<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
	protected $table = "comments";

	public function posts() {
		return $this->belongsTo('App\posts', 'post_id', 'id');
	}

	public function users() {
		return $this->belongsTo('App\users', 'user_id', 'id');
	}
}
