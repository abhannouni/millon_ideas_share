<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
// use App\Http\Controllers\Post;


class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     return view('ideas.index');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('ideas.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'comment' => 'required',
    //         'post_id' => 'required',
    //     ]);
    //     $comment = Comment::create([
    //         'content' => $request->input('comment'),
    //         'post_id' => $request->input('post_id'),
    //         'user_id' => auth()->user()->id,
    //     ]);
    //     return response()->json($comment);
    // }
    public function store(Request $request)
{
    // $comment = new Comment;
    // $comment->comment = $request->input('comment');
    // $comment->post_id = $request->input('post_id');
    // $comment->save();
    $request->validate([
                'comment' => 'required',
                'post_id' => 'required',
            ]);
    Comment::create([
                'content' => $request->comment,
                'post_id' => $request->post_id,
                'user_id' => auth()->user()->id,
            ]);
    
    $latestRecord = Comment::latest()->first();

    
    // $last_id = $comment->lastInsertId();

    return response()->json([
        'status' => 'success',
        'message' => 'Comment added successfully', 
        'last_id' => $latestRecord->id,
        'last_comment' => $latestRecord->content,
        'last_id_post' => $latestRecord->ipost_id,
        'last_name' => $latestRecord->user->name,
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
