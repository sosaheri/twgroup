@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Detalle de publicación') }}</div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12">

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
                                                            <a href="/e/445a737a9305db0dc6bf270f78924e58">
                                                                <img src="#" alt=""></a>
                                                            </div>
                                                            <a href="#" class="h4 user-name"><span>Autor</span>
                                                            </a>

                                                        </div>

                                                </article>

                                                <article>
                                                    <p class="h4 gray">Actividad de esta publicación</p>
                                                    <div class="row">
                                                        <div class="item-data col-md-12 col-xs-6">
                                                            <p class="h4">18</p>
                                                            <p>comentarios</p>
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
                                                        <textarea name="content" id="comentario" cols="90" rows="5"></textarea>
                                                        <input name="publication_id" type="text" hidden value="{{ $publication->id}}">

                                                        @foreach ($publication->comentarios as $item)
                                                            <hr>

                                                            {{ $item->content }} <br>


                                                        @endforeach



                                            </div>

                                        </section>


                                        <aside class="col-md-4 col-lg-3">
                                            <span >
                                                <button style="margin-top: 30px;" type="submit" class="btn btn-block btn-lg btn-primary btn-xs-fixed"><span>Enviar mensaje</span></button>
                                            </span>


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
