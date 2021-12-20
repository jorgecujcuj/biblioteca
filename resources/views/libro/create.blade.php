@extends('layouts.app')

@section('template_title')
    Create Libro
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="container">
            <div class="row justify-content-center">

                <div class="form-group row">
                    <label  class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <span class="login100-form-title p-b-70" style="font-family: Poppins-Bold; font-size: 39px;">
                            {{ __('Crear Libro:') }}
                            </span>
                        </div>
                </div>  

                @includeif('partials.errors')

                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <!-- Inicio -->

                                    <div class="form-group">
                                        <input type="hidden" name="iduser" class="form-control" value="{{ Auth::user()->id }}">
                                    </div>

                                    <div class="form-group row">
                                        <label for="idcategoria" class="col-md-4 col-form-label text-md-right">{{ __("Categoria") }}</label>

                                        <div class="col-md-6">
                                            <select id="idcategoria" class="form-control @error('idcategoria') is-invalid @enderror" name="idcategoria" autofocus>
                                                <option value="" selected disabled> - Selecciona una categoria - </option>
                                                    @foreach ($categoria as $cat)
                                                    <option value="{{ $cat->idcategoria }}" {{$cat->idcategoria == $libro->idcategoria ? 'selected' : ''}}>{{ $cat->nombrecategoria }}</option>
                                                    @endforeach
                                            </select>
                                            @error('idcategoria')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="idautor" class="col-md-4 col-form-label text-md-right">{{ __("Autor") }}</label>

                                        <div class="col-md-6">
                                            <select id="idautor" class="form-control @error('idautor') is-invalid @enderror" name="idautor" autofocus>
                                                <option value="" selected disabled> - Selecciona un autor - </option>
                                                @foreach ($autor as $aut)
                                                <option value="{{ $aut->idautor }}" {{$aut->idautor == $libro->idautor ? 'selected' : ''}}>{{ $aut->nombreautor }}</option>
                                                @endforeach
                                            </select>
                                            @error('idautor')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imglibro" class="col-md-4 col-form-label text-md-right">{{ __("Adjuntar imagen") }}</label>

                                        <div class="col-md-6">
                                            <input id="imglibro" type="file" accept="image/*" class="form-control-file @error('imglibro') is-invalid @enderror" name="imglibro" value="{{ old('imglibro',$libro->imglibro) }}" placeholder="img" autofocus>

                                            @error('imglibro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="titulolibro" class="col-md-4 col-form-label text-md-right">{{ __("Adjuntar libro") }}</label>

                                        <div class="col-md-6">
                                            <input id="titulolibro" type="file" accept="application/pdf" class="form-control-file @error('titulolibro') is-invalid @enderror" name="titulolibro" value="{{ old('titulolibro',$libro->titulolibro) }}" placeholder="Libro" autofocus>

                                            @error('titulolibro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="idiomalibro" class="col-md-4 col-form-label text-md-right">{{ __("Idioma") }}</label>

                                        <div class="col-md-6">
                                            <input id="idiomalibro" type="text" class="form-control @error('idiomalibro') is-invalid @enderror" name="idiomalibro" value="{{ old('idiomalibro',$libro->idiomalibro) }}" placeholder="Idioma" autofocus>

                                            @error('idiomalibro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="descripcionlibro" class="col-md-4 col-form-label text-md-right">{{ __("Descripción") }}</label>

                                        <div class="col-md-6">
                                            <input id="descripcionlibro" type="text" class="form-control @error('descripcionlibro') is-invalid @enderror" name="descripcionlibro" value="{{ old('descripcionlibro',$libro->descripcionlibro) }}" placeholder="Descripcion" autofocus>

                                            @error('descripcionlibro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a class="btn btn-danger" href="{{ route('libros.index') }}"> Regresar</a>
                                        </div>
                                    </div>
                                
                            <!-- Fin -->
                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
