<?php
namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentService {
    public static function createComment(Request $request) {
        //        $input = $request->all();
//        $input = $request->orderBy('id','DESC')->limit(10)->get();
        $input = $request->except(['_token']);
        $request->validate([
            'body'=>'required',
        ]);
        $input['user_id'] = auth()->user()->id;
//        $set_order=$input->orderBy('created_at', 'DESC')->paginate(3);
        Comment::create($input);
    }
}
