@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><div>{{Session::get('mensaje')}}</div></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif

            <div class="card">
                <div class="card-header"><button onclick="window.location='{{ url("/crearPublicacion/") }}'"  type="button" rel="tooltip" title="Editar" class=" btn btn-primary btn-xs-fixed btn-sm">
                    <span>Crear publicación</span>
                 </button></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Comentarios</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications as $item)

                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ \App\Http\Controllers\PublicationController::quien($item->user_id)->name }}</td>
                                    <td>{{ \App\Http\Controllers\CommentController::cantidad($item->id) }}</td>
                                    <td> @if( $item->user_id == Auth::user()->id )
                                        <button onclick="window.location='{{ url("/editarPublicacion/".$item->id) }}'"  type="button" rel="tooltip" title="Editar" class="btn btn-block btn-primary btn-xs-fixed btn-sm">
                                            <span>Editar</span>
                                         </button>

                                        @else

                                        @endif</td>
                                    <td>

                                        <button onclick="window.location='{{ url("/verPublicacion/".$item->id) }}'"  type="button" rel="tooltip" title="Ver" class="btn btn-block btn-primary btn-xs-fixed btn-sm">
                                             <span>Ver</span>
                                          </button>

                                    </td>
                                    <td> @if( $item->user_id == Auth::user()->id )
                                        <button onclick="window.location='{{ url("/borrarPublicacion/".$item->id) }}'"  type="button" rel="tooltip" title="Eliminar" class="btn btn-block btn-primary btn-xs-fixed btn-sm">
                                            <span>Eliminar</span>
                                         </button>

                                        @else

                                        @endif</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
