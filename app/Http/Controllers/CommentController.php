<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use DB;
use App\post;
use Illuminate\Notifications\Notifiable;
use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Auth;

class CommentController extends Controller
{
    use Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($post);
        $post = Post::find($request->post_id);

        // return $request;
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();
        $comment->comment_text = $request->comment;
        $comment->save();

//        $publisher = Post::select('publisher_id')->where('id',$request->post_id);
        $publisher_id = $comment->post->publisher_id;
        $user =User::find(Auth::id());
//        dd($publisher);
        User::find($publisher_id)->notify(new RepliedToThread($post, $user));


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
