<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostService {

    /**
     * Return all exising posts.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getPosts()
    {
        return Post::all();
    }

    /**
     * Return selected if existing exising posts.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getPost($id) {
        return Post::find($id);
    }

    public static function createPost(PostRequest $request) {

        Post::create(array_merge($request->validated(), [
            'user_id' => Auth::id(),
            'image' => self::handleUploadedImage($request, 'image')
        ]));

    }

    public static function updatePost(PostRequest $request, Post $post) {
        // Check if user is the post author
        if(Auth::user()->id == $post->user_id) {

            if($request->hasFile('image')){
                $post->update(array_merge($request->validated(), [ 'image' => self::handleUploadedImage($request, 'image') ]));
            } else {
//                $post->update($request->except(['image', '_token', '_method']));
                $post->update($request->validated());
            }

        }
    }

    public static function deletePost(Post $post) {
        // If the delete function is triggered:
        // Will delete the current image from the Storage attached to the deleting post
        Storage::disk('public')->delete('images/'.$post->image);
        // Will delete the post
        $post->delete();
    }


    public static function handleUploadedImage($request, $image)
    {
        $imageName = '';
        if (!is_null($image)) {
            if($request->hasFile($image)){
                $imageName = Storage::putFile('public/images', $request->file($image));
            }
        }
        return str_replace('public/images/', '', $imageName);
    }


}
