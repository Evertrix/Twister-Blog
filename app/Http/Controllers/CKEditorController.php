<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
//    public function upload(Request $request)
//    {

//        $post = new Post();
//        $post->id = 0;
//        $post->exists = true;
//        $image = $post->addMediaFromRequest('upload')->toMediaCollection('images');
//        return response()->json([
//            'url' => $image->getUrl()
//        ]);




//                if($request->hasFile('upload')) {
//            //get filename with extension
//            $filenamewithextension = $request->file('upload')->getClientOriginalName();
//
//            //get filename without extension
//            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
//
//            //get file extension
//            $extension = $request->file('upload')->getClientOriginalExtension();
//
//            //filename to store
//            $filenametostore = $filename.'_'.time().'.'.$extension;
//
//            //Upload File
//            $request->file('upload')->storeAs('public/uploads', $filenametostore);
//
//            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
//            $url = asset('storage/uploads/'.$filenametostore);
//            $msg = 'Image successfully uploaded';
//            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
//
//            // Render HTML output
//            @header('Content-type: text/html; charset=utf-8');
//            echo $re;
//        }


//    }

    public function store(Request $request)
    {
        $path_url = 'storage/' . Auth::id();

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path($path_url), $fileName);
            $url = asset($path_url . '/' . $fileName);
        }

        return response()->json(['url' => $url]);
    }
}
