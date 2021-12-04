@extends('layouts.app')

@section('template_title')
    Create Libro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Libro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <!-- Inicio -->
                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <input type="hidden" name="iduser" class="form-control" value="{{ Auth::user()->id }}">
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('idcategoria') }}
                                        <select class="form-control" name="idcategoria">
                                                <option value="" selected disabled> - Selecciona una categoria - </option>
                                                @foreach ($categoria as $cat)
                                                <option value="{{ $cat->idcategoria }}" {{$cat->idcategoria == $libro->idcategoria ? 'selected' : ''}}>{{ $cat->nombrecategoria }}</option>
                                                @endforeach
                                        </select>
                                        @error('idcategoria')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('idautor') }}
                                        <select class="form-control" name="idautor">
                                                <option value="" selected disabled> - Selecciona una categoria - </option>
                                                @foreach ($autor as $aut)
                                                <option value="{{ $aut->idautor }}" {{$aut->idautor == $libro->idautor ? 'selected' : ''}}>{{ $aut->nombreautor }}</option>
                                                @endforeach
                                        </select>
                                        @error('idautor')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="titulolibro">Adjuntar Libro</label>
                                        <input id="titulolibro" type="file" accept="application/pdf" name="titulolibro" class="form-control-file">
                                        @error('titulolibro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('idiomalibro') }}
                                        {{ Form::text('idiomalibro', $libro->idiomalibro, ['class' => 'form-control' . ($errors->has('idiomalibro') ? ' is-invalid' : ''), 'placeholder' => 'Idiomalibro']) }}
                                        {!! $errors->first('idiomalibro', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('descripcionlibro') }}
                                        {{ Form::text('descripcionlibro', $libro->descripcionlibro, ['class' => 'form-control' . ($errors->has('descripcionlibro') ? ' is-invalid' : ''), 'placeholder' => 'Descripcionlibro']) }}
                                        {!! $errors->first('descripcionlibro', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- Fin -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
