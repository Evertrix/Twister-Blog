<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SessionsRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(PostService::getPosts());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostRequest $request)
    {
//        Post::create(array_merge($request->validated(), [
//            'id' => 10,
//            'user_id' => 22,
//            'image' => PostService::handleUploadedImage($request, 'image')
//        ]));
//        $users = User::with('posts')->where('id', $request->id)->get();
//        $posts = Post::whereHas('user', function ($query) {
//            $query->where('users.id', Auth::user()->id);
//        });
        $posts = Post::with('user')->get();
//        $posts = User::where('id', $request->user_id)->get();
        $api_post = '';
        foreach($posts as $post) {
            $api_post = Post::create([
                'user_id' => $post->id,
                'category_id' => request('category_id'),
                'slug'  => request('slug'),
                'title' => request('title'),
                'image' => request('image'),
                'excerpt' => request('excerpt'),
                'body' => request('body'),
            ]);
            break;
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
            'post' => $api_post,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PostService::getPost($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PostRequest $request, Post $post)
    {
//        PostService::updatePost($request, $post);
        $post->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'post' => $request->validated(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy(Post $post)
    {
        $success_delete = $post->delete();

        return [
            'success' => $success_delete,
            'post' => $success_delete
        ];
    }
}
