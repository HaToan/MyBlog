<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
	protected $table = 'posts';

	public function categories() {
		return $this->belongsToMany('App\Categories', 'category_post', 'id_post', 'id_category');
	}

	public function tags() {
		return $this->belongsToMany('App\Tags', 'tag_post', 'id_post', 'id_tag');
	}

	public function users() {
		return $this->belongsTo('App\Users', 'user_id', 'id');
	}

	public function comments() {
		return $this->hasMany('App\Comments', 'post_id');
	}

	public function media() {
		return $this->belongsTo('App\Media', 'media_id');
	}
}
