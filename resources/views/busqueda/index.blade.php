@extends('layouts.app')

@section('template_title')
    Buscar
@endsection

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')

        <div class="text-center">
            <h2 class="section-heading text-uppercase">Puede buscar por: nombre del libro, categoría o autor</h2>
            <h3 class="section-subheading text-muted">Ingrese el texto y clic en buscar</h3>
        </div>

        <div class="text-center">
            <div class="row">
                <h3 class="section-subheading text"><strong>Categorías disponibles:</strong></h3>
                @foreach ($categorias as $categoria)
                <div class="col-3">
                            {{ $categoria->nombrecategoria }}
                </div>
                @endforeach
            </div>
        </div>

        <!--
        <div class="text-left">
            <h3 class="section-subheading text-muted">Categorías disponibles:</h3>
            @foreach ($categorias as $categoria)
            <li>
                <a href="">
                    {{ $categoria->nombrecategoria }}
                </a>
            </li>
            @endforeach
        </div>-->

        <br>
    <div class="col-xl-6 mx-auto">
        <form action="{{ route('busquedas.index') }}" method="get">
            <div class="row">

                <div class="col">
                    <input class="form-control form-control-lg" type="search" placeholder="Nombre del libro, categoría o autor" aria-label="Search" id="name" name="name" value="{{ $name }}" autofocus>
                </div>


                <div class="col-auto">
                    <button class="btn btn-primary btn-lg" type="submit">Buscar</button>
                </div>

            </div>
        </form>
    </div>
    <br></br>

    <div class="row">
            <!--
            <div class="alert alert-success" style="color: black; background-color: rgba(28, 215, 255, .2); border:none;">
                <b><p></p></b>
            </div>
            -->
            <div class="row">
                @foreach ($libros as $libro)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card card-body text-center">

                            <img type="image/*" class="img-fluid img-thumbnail"
                            src="/datalibros/{{ $libro->imglibro }}"
                            width="auto" alt="...">

                            <h5 class="font-weight-bold mt-3">{{ $libro->titulolibro }}</h5>
                            <p>
                                <span>
                                    {{ $libro->autor }}
                                </span> <br>
                                <span>
                                    <i>{{ $libro->categoria }}</i>
                                </span>
                            </p>
                            <strong class="precio-libro">
                                <span><a class="btn btn-sm btn-primary " href="{{ route('busquedas.show',$libro->idlibro) }}"><i class="fa fa-fw fa-eye"></i> VER LIBRO</a>
                                    @csrf
                                </span>
                            </strong>
                        </div>
                    </div>
                @endforeach

            </div>
    </div>

    <div class="pagination justify-content-end">
        {!! $libros->links() !!}
    </div>

@endsection

@section('comentario')
<div class="text-white text-center">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <h2 class="mb-4">Deja un comentario:</h2>

                    <div class="row">

                        <div class="col">

                                <div class="row justify-content-center">

                                            @includeif('partials.errors')

                                            <div class="card-body">
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success" style="color: #FFFFFF; background-color: rgba(28, 215, 255, .5); border:none;">
                                                       <h3> <p>{{ $message }}</p></h3>
                                                    </div>
                                                @endif

                                                <form method="POST" action="{{ route('busquedas.store') }}"  role="form" enctype="multipart/form-data">
                                                    @csrf

                                                    @include('busqueda.form')
                                                </form>

                                            </div>


                                </div>

                        </div>
                    </div>
        </div>

</div>
@endsection

@section('css')
<style>
#contact:before {
  content: "";
  position: absolute;
  background-color: #1c375e;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.5;
}
</style>
@endsection
