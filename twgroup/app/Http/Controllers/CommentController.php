<?php

namespace App\Http\Controllers;

use App\Comment;
use Redirect;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public static function cantidad($id){

        $cantidad = Comment::where('publication_id', '=', $id)->get();

        return count($cantidad);

    }

    public static function comento($user, $publication){



        $cantidad = count(Comment::where('user_id', '=', $user)->where('publication_id', '=', $publication)->get());

        if($cantidad){
            return true;
        }else{
            return false;
        }



    }

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
        //
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
     * Show; the form for editing the specified resource.
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

    public function guardarComentario(Request $request){

        $request->validate([
            'content' => 'required',
          ]);

        $comment = new \App\Comment;

        $comment->publication_id = $request->publication_id;
        $comment->content = $request->content;
        $comment->status = 'comento';
        $comment->user_id = auth()->user()->id;

        $comment->save();

        return Redirect::back();


     }
}
