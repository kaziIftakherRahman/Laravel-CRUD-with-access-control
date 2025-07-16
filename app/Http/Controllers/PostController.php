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

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        //Upload the image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        //Add new post
        $post = new Post;

        $post->name = $request->name;

        $post->description = $request->description;

        $post->image = $imageName;

        $post->save();


        return redirect()->route('home')->with('success', 'Post created successfully!');
    }
}
