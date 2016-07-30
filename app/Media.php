<?php

namespace App;

use App\Media;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {
	protected $table = "media";

	public function post() {
		return $this->hasOne('App\Posts', 'media_id');
	}

}
