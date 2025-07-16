<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        // Logic to show the create post form
        return view('create');
    }

    public function ourFileStore(Request $request)
    {
        // Logic to handle file storage
        $post = new Post;

        $post->name = $request->name;

        $post->description = $request->description;

        $post->image = $request->image;

        $post->save();


        return redirect()->route('home')->with('success', 'Post created successfully!');
    }
}
