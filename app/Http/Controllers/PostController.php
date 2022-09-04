<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index(){
        return view('index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'user']))
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function blog(){
        return view('blog', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'user']))
                ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post) {
        return view('post-page', [
            'post' => $post,
        ]);
    }

    public function category(Category $category) {
        $posts = $category->posts;
        return view('category-posts',compact('posts'));

//        return view('category-posts', [ // here we return the view blade file that the route will search for when the client requires a category
//            'posts' => Post::all(), // there the 'posts' equals $post in the corresponding view. That way we enable the use of Category Model
//            'category' => Category::all(),
//        ]);
    }

    public function user(User $user) {
        return view('user-posts', [
            'posts' => $user->posts,
        ]);
    }

    public function create() {
        return view('create')
            ->with(['categories' => Category::all()])
            ->with(['users' => User::all()]);
    }

    public function store(PostRequest $request){
        PostService::createPost($request);
        return redirect('/posts')->with('success', 'Successfully created post');
    }

    public function destroy(Post $post)
    {
        PostService::deletePost($post);
        // Will redirect to the index page
        return redirect('/')->with('success','Post deleted successfully!');
    }

    public function edit(Post $post)
    {
        return view('edit', compact('post'))->with(['categories' => Category::all()]);
    }

    public function update(PostRequest $request, Post $post)
    {
        PostService::updatePost($request, $post);
        return redirect()->back()->with('success','Post updated successfully!');
    }
}
