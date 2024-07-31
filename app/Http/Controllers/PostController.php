<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function create(Request $request){

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
        ]);
        
        return redirect()->route('home');
    }

    function show($id){
        $post = Post::where('id', $id)->first();

        return view('show', compact('post'));
    }

    function delete($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('home');
    }
}
