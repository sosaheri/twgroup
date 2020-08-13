<?php

namespace App\Http\Controllers;

use App\Publication;
use App\Comment;
use App\User;
use View;
use Redirect;

use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Publication $model){
      //  $item = $model->where('id', '=', 1)->first();
      //  dd($item->usuario()->name());

        return view('publications.index', ['publications' => $model->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('publications.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $publication = new \App\Publication;

                $publication->title = $request->title;
                $publication->content = $request->content;
                $publication->user_id = auth()->user()->id;
                $publication->save();

                return redirect('index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show( $id){

        $publication = Publication::find($id);
        //dd($publication);

        return view('publications.show', ['publication' => $publication]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }

    public function guardarComentario(Request $request){

         $comment = new \App\Comment;

         $comment->publication_id = $request->publication_id;
         $comment->content = $request->content;
         $comment->status = 'comento';
         $comment->user_id = auth()->user()->id;

         $comment->save();

         return Redirect::back();


      }
}
