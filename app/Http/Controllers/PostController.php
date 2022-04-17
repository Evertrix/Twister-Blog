<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;


class PostController extends Controller
{
    public function index(){
//        $user = User::all();
        return view('index', [
//            'posts' => Post::paginate(6)->withQueryString(),
//            'users' => User::all(),
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
//            'category' => Category::all(),
        ]);
    }

    public function category(Category $category) {
        return view('category-posts', [ // here we return the view blade file that the route will search for when the client requires a category
            'posts' => Post::all(), // there the 'posts' equals $post in the corresponding view. That way we enable the use of Category Model
            'category' => Category::all(),
        ]);
    }

    public function user(User $user) {
//        return view('components.posts', [
        return view('user-posts', [
            'posts' => $user->posts,
//            'users' => User::with('posts')->get(),
//            'category' => Category::all(),
        ]);
    }

    public function create() {
//        $categories = Category::all();
        return view('create')
            ->with(['categories' => Category::all()])
            ->with(['users' => User::all()]);
    }

    public function store(Request $request){
        $post = new Post;
        $request->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->image) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public/images', $imageName);
            $image = $imageName;
            $post->image = $image;
        }

//        $name = !is_null($imageName) ? $imageName : Str::random(25);

        // Catch the requests that are expected from HTML Blade by the tags' "name" field
        $title = $request->get('title');
        $author = Auth::id();
//        dd($author);
//        $image = $imageName;
        $slug = $request->get('slug');
        $excerpt = $request->get('excerpt');
        $body = $request->get('body');
//        $published_at = $request->get('published_at');
//        $category_id = $request->get('category_id');
//        $user = $request->get('user_foreign');
//        $category_id = $request->get('category_id');

        // Setting the inserted from Blade values equal to what is expected to get inside 'db' as $post
        $post->title = $title;
//        $post->image = $image;
        $post->slug = $slug;
        $post->excerpt = $excerpt;
        $post->body = $body;
//        $post->published_at = $published_at;
//        $post->user_id = $request->user_id;
        $post->user_id = $author;
        $post->category_id = $request->category_id;

        $post->save();
        return redirect('/posts')->with('success', 'Successfully created post');
    }

    public function destroy(Post $post)
    {
        // If the delete function is triggered:
        // Will delete the current image from the Storage attached to the deleting post
        Storage::disk('public')->delete('images/'.$post->image);
        // Will delete the post
        $post->delete();
        // Will redirect to the index page
        return redirect('/')->with('success','Post deleted successfully!');
    }

    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        // Validation for requiring a certain fields to be changed before submitting the update
//        $request->validate([
//            'title' => 'required',
//            'body' => 'required',
//        ]);

        // Checking if the image upload field has been changed.
        // If changed, delete the current image from Storage and upload the new selected.

        // Check if user is the post author
        if(Auth::user()->id == $post->user_id) {
            if($request->has('image')){
                Storage::disk('public')->delete('images/'.$post->image);
                $imageName = time().'.'.$request->file('image')->extension();
                $request->file('image')->storeAs('public/images', $imageName);
                $post->image = $imageName;
            }

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->excerpt = $request->excerpt;
            $post->body = $request->body;
//        $post->image = $path;
            $post->published_at = $request->published_at;
        }


//        $post->update($request->all());
        $post->save();
        return redirect()->back()->with('success','Post updated successfully!');
    }
}
