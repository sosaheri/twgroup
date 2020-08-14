@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{ __('Crear publicación') }}</div>
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('guardarPublicacion') }}">

                        @csrf
                                    @isset( $error)
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $error }}</strong>
                                    </div>
                                    @endisset

                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-12 bmd-form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                    <div class="input-group">

                                                        <input id="title" type="text" name="title" class="form-control" placeholder="{{ __('Titulo') }}" value="{{ old('title', '') }}" >
                                                    </div>

                                                    @if ($errors->has('title'))
                                                        <div id="web-error" class="error text-danger pl-3" for="title" style="display: block;">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                        </div>
                                                    @endif

                                                </div>

                                            </div>

                                            <div class="row mt-1">
                                                <div class="col-md-12 bmd-form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <textarea class="form-control" name="content" id="content" cols="90" rows="5" placeholder="Descripción"></textarea>

                                                        </div>


                                                    </div>

                                                    @if ($errors->has('content'))
                                                        <div id="content-error" class="error text-danger pl-3" for="content" style="display: block;">
                                                        <strong>{{ $errors->first('content') }}</strong>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="text-right mt-2">
                                                <button type="submit" class="btn btn-primary btn-sm">{{ __('Guardar') }}</button>

                                            </div>


                        </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
