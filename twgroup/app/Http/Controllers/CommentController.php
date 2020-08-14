<?php

namespace App\Http\Controllers;

use App\Comment;
use Redirect;
use Illuminate\Http\Request;
use App\Mail\AuthorNotificationMail;
use Illuminate\Support\Facades\Mail;

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

    public function guardarComentario(Request $request,  SessionManager $sessionManager){

        $request->validate([
            'content' => 'required',
          ]);

        $comment = new \App\Comment;

        $comment->publication_id = $request->publication_id;
        $comment->content = $request->content;
        $comment->status = 'comento';
        $comment->user_id = auth()->user()->id;

        $comment->save();

        Mail::send(new AuthorNotificationMail($request));

        $sessionManager->flash('mensaje', 'Comentario Creado');

        return Redirect::back();



     }



}
