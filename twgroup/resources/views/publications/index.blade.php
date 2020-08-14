@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publications as $item)

                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ \App\Http\Controllers\PublicationController::quien($item->user_id)->name }}</td>
                                    <td>{{ \App\Http\Controllers\CommentController::cantidad($item->id) }}</td>
                                    <td>
                                        <button onclick="window.location='{{ url("/verPublicacion/".$item->id) }}'"  type="button" rel="tooltip" title="Editar" class="btn btn-block btn-primary btn-xs-fixed btn-sm">
                                             <span>Ver</span>
                                          </button>

                                    </td>

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
