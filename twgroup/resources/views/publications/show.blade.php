@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Detalle de publicación') }}</div>
                <span class="text-right" style="text-align:center; text-align:center; margin-top: -30px !important; margin-right: 20px !important;"><a href="/index">Ir a Inicio</a></span>
                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12">

                            @if(Session::has('mensaje'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><div>{{Session::get('mensaje')}}</div></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                             @endif

                            <div style="padding: 0.9375rem 30px;" class="card">

                                <section id="publicacion">




                                    <div class="card-body table-responsive">


                                        <section class="box-common block-project">
                                            <div class="row is-flex-md-min column">
                                                <section class="col-md-8 col-lg-9 block-detail">
                                                    <article>
                                                        <div class="row">
                                                    <div class="col-xs-6">

                                                        <h2 class="hidden">{{ $publication->title}}</h2>
                                                    </div>

                                            </div>
                                                <p class="specification"></p>
                                                <div>{{ $publication->content}}</div>
                                        </section>


                                        <aside class="col-md-4 col-lg-3">



                                                <article>
                                                    <div class="wk-user-info">
                                                        <div class="profile-photo profile-photo-sm img img-circle">
                                                            <a href="">

                                                            </div>
                                                            <a href="#" class="h4 user-name"><span>{{ \App\Http\Controllers\PublicationController::quien($publication->user_id)->name }}</span>
                                                            </a>

                                                        </div>

                                                </article>

                                                <article>
                                                    <br>
                                                    <p class="h4 gray">Actividad de esta publicación</p>
                                                    <div class="row">
                                                        <div class="item-data col-md-12 col-xs-6">
                                                            <br>
                                                            <p class="h4">{{ \App\Http\Controllers\CommentController::cantidad($publication->id) }}
                                                                @if (\App\Http\Controllers\CommentController::cantidad($publication->id) == 1)
                                                                comentario
                                                                @else
                                                                comentarios
                                                                @endif


                                                            </p>

                                                        </div>

                                                    </div>

                                                </article>
                                        </aside>


                                    </div>

                                </section>

                                <section id="comentarios">
                                    <div class="card-body table-responsive">

                                        <section class="box-common block-project">
                                            <div class="row is-flex-md-min column">
                                                <section class="col-md-8 col-lg-9 block-detail">
                                                    <article>
                                                        <div class="row">


                                                <div class="col-xs-6">
                                                    <h5 class="h4">Envia un comentario</h5>

                                                </div>



                                                    <form action="{{ route('guardarComentario') }}" method="post">
                                                        @csrf

                                                        <div clas="bmd-form-group{{ $errors->has('content') ? ' has-danger' : '' }}">

                                                        <textarea name="content" id="comentario" cols="90" rows="5"></textarea>

                                                        </div>

                                                        @if ($errors->has('content'))
                                                        <div id="content-error" class="error text-danger pl-3" for="content" style="display: block;">
                                                        <strong>{{ $errors->first('content') }}</strong>
                                                        </div>
                                                         @endif

                                                        <input name="publication_id" type="text" hidden value="{{ $publication->id}}">

                                                        @foreach ($publication->comentarios as $item)
                                                            <hr>

                                                            {{ \App\Http\Controllers\PublicationController::quien($item->user_id)->name }} dice:<br>
                                                            {{ $item->content }} <br>

                                                        @endforeach



                                            </div>

                                        </section>


                                        <aside class="col-md-4 col-lg-3">

                                            @if ( \App\Http\Controllers\CommentController::comento(Auth::user()->id , $publication->id ) )

                                            <span >
                                                <button disabled style="margin-top: 30px;" type="submit" class="btn btn-block btn-lg btn-primary btn-xs-fixed"><span>Enviar comentario</span></button>
                                            </span>

                                            @elseif(Auth::user()->id == $publication->user_id)
                                            <span >
                                                <button disabled style="margin-top: 30px;" type="submit" class="btn btn-block btn-lg btn-primary btn-xs-fixed"><span>Enviar comentario</span></button>
                                            </span>

                                            @else
                                            <span >
                                                <button style="margin-top: 30px;" type="submit" class="btn btn-block btn-lg btn-primary btn-xs-fixed"><span>Enviar comentario</span></button>
                                            </span>

                                            @endif




                                        </aside>

                                                    </form>
                                    </div>

                                </section>


                            </div>

                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
