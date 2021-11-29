@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'Show Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idlibro:</strong>
                            {{ $libro->idlibro }}
                        </div>
                        <div class="form-group">
                            <strong>Iduser:</strong>
                            {{ $libro->iduser }}
                        </div>
                        <div class="form-group">
                            <strong>Idcategoria:</strong>
                            {{ $libro->idcategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Idautor:</strong>
                            {{ $libro->idautor }}
                        </div>
                        <div class="form-group">
                            <strong>Titulolibro:</strong>
                            {{ $libro->titulolibro }}
                        </div>
                        <div class="form-group">
                            <strong>Idiomalibro:</strong>
                            {{ $libro->idiomalibro }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcionlibro:</strong>
                            {{ $libro->descripcionlibro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
