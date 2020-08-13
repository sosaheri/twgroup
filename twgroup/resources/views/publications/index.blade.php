@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Publicaciones') }}</div>
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
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button onclick="window.location='{{ url("/verPublicacion/".$item->id) }}'"  type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">Ver</i>
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
