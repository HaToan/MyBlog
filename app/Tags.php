<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model {
	public function posts() {
		return $this->belongsToMany('App\Posts', 'tag_post', 'id_tag', 'id_post');
	}
}
