<?php

namespace App\Http\Controllers;

use App\Comments;

class CommentsController extends Controller {
	public function delete($id, $id_post) {
		Comments::find($id)->delete();
		return redirect('admin/post/edit/'.$id_post)->with('messages', "Delete Comments Complete!");
	}
}
