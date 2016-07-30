<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
	protected $table = "categories";

	public function posts() {
		return $this->belongsToMany('App\Posts', 'category_post', 'id_category', 'id_post');
	}

	public function parent() {
		return $this->belongsTo('App\Categories', 'parent_id');
	}

	public function media() {
		return $this->belongsTo('App\Media', 'media_id');
	}
}
