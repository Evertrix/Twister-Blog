<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller {

    public function storeComment(Request $request) {
        CommentService::createComment($request);
        return back();
    }

    public function storeReply(Request $request) {
        CommentService::replyStore($request);
        return back();
    }
}
