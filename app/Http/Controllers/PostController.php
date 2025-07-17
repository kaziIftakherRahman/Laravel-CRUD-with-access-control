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
        if (isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null; // Handle case where no image is uploaded
        }


        //Add new post
        $post = new Post;

        $post->name = $request->name;

        $post->description = $request->description;

        $post->image = $imageName;

        $post->save();


        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function editData($id)
        {
            // Logic to show the edit post form
            $post = Post::findOrFail($id); 
            return view('edit', ['ourPost' => $post]);
        }

    public function updateData(Request $request, $id)
    {
        // Logic to handle post update
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg',
        ]);

        

        //Update the post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

        //Upload the image
        if (isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName; // Update the image if a new one is uploaded
        }

        $post->save();


        return redirect()->route('home')->with('success', 'Post updated successfully!');
        
    }

    public function deleteData($id)
    {
        // Logic to handle post deletion
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Post deleted successfully!');
    }
}
