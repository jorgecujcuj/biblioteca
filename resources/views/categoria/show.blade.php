@extends('layouts.app')

@section('template_title')
    {{ $categoria->name ?? 'Show Categoria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcategoria:</strong>
                            {{ $categoria->idcategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrecategoria:</strong>
                            {{ $categoria->nombrecategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcioncategoria:</strong>
                            {{ $categoria->descripcioncategoria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
