<?php
namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentService {
//    public static function createComment(Request $request) {
//        //        $input = $request->all();
////        $input = $request->orderBy('id','DESC')->limit(10)->get();
//        $input = $request->except(['_token']);
//        $request->validate([
//            'body'=>'required',
//        ]);
//        $input['user_id'] = auth()->user()->id;
////        $set_order=$input->orderBy('created_at', 'DESC')->paginate(3);
//        Comment::create($input);
//    }

    public static function createComment(Request $request) {
        $comment = new Comment;

        $comment->body = $request->body;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);

        return back();
    }

    public static function replyStore(Request $request)
    {
        $reply = new Comment;

        $reply->body = $request->get('body');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('parent_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}
