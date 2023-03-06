<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('comments')->get();
        foreach( $posts as $post){
            foreach( $post->comments as $comment){
                $comment->user = User::find($comment->user_id);
            }
        }
        return view ('ideas.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ideas.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $input = $request->all(); 
        // Post::create($input);
        

        $request->validate([
            'title' => 'required',
            'categorey' => 'required',
            'content' => 'required|mimes:jpg,jpeg,png|max:5048',
        ]);
        

        $newImageName = uniqid() .  '.' . $request->content->extension();
        $request->content->move(public_path('images'), $newImageName);
        
        Post::create([
            'title' => $request->input('title'),
            'category' => $request->input('categorey'),
            'content' => $newImageName,
            'user_id' => auth()->user()->id,

        ]);
        return redirect('ideas')->with('flash_message','Post added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $posts = Post::find($id);
        return view('posts.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $posts = Post::find($id);
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('content')) {
            $image = $request->file('content');
            $imagePath = $image->move(public_path('images'), $image->getClientOriginalName());
            $post->image_path = $image->getClientOriginalName();
            $posts->update([
                'title' => $request->input('title'),
                // 'content' => $imagePath

            ]);
        }else {
            $posts->update([
                'title' => $request->input('title'),
            ]);
        }
    
        
        
        return redirect('posts')->with('flash_message','Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::destroy($id);
        return redirect('posts')->with('flash_message', 'post deleted!');  
    }
}
