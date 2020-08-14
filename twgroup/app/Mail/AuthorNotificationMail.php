<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Publication;
use DB;

class AuthorNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        $datos = DB::table('users')
            ->select('users.email as email', 'publications.title' )
            ->join('publications', 'users.id', '=', 'publications.user_id' )
            ->where( 'publications.id', '=', $this->email->publication_id )
            ->first();



        return $this->subject('Has recibido un comentario en tu publicación')
                    ->to($datos->email)
                    ->view('mails.authornotification', ['title' => $datos->title]);
    }
}