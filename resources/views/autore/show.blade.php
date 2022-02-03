@extends('layouts.app')

@section('template_title')
    {{ $autore->name ?? 'Show Autore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Autore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('autores.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idautor:</strong>
                            {{ $autore->id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombreautor:</strong>
                            {{ $autore->nombreautor }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcionautor:</strong>
                            {{ $autore->descripcionautor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
