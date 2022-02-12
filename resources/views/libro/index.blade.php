@extends('layouts.app')

@section('template_title')
    Libro
@endsection

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')
    <div class="section-header">
        <h3 class="page__heading">Tabla de DB libros</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-xl-6 mx-auto">
                                <form action="{{ route('libros.index') }}" method="get">
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

                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Libros</h4>
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right bg-primary">
                                            <a href="{{ route('libros.create') }}" class="dropdown-item text-white bg-primary">{{ __('Crear Libro') }}</a>
                                        </div>
                                    </div>

                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" style="color: #000000; background-color: rgba(28, 215, 255, .2); border:none;">
                                    <h3> <p>{{ $message }}</p></h3>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color:#515151">
                                        <tr>
                                            <th style="color:#fff;">Id</th>
                                            <th style="color:#fff;">idUsuario</th>
                                            <th style="color:#fff;">idCategoria</th>
                                            <th style="color:#fff;">idAutor</th>
                                            <th style="color:#fff;">Libro</th>
                                            <th style="color:#fff;">link</th>
                                            <th style="color:#fff;">Idioma</th>
                                            <th style="color:#fff;">Descripción</th>
                                            <th style="color:#fff;">Fecha</th>
                                            <th style="color:#fff;">Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($libros as $libro)
                                            <tr>
                                                <td>{{ $libro->id }}</td>
                                                <td>{{ $libro->usuario }}</td>
                                                <td>{{ $libro->categoria }}</td>
                                                <td>{{ $libro->autor }}</td>
                                                <td>{{ $libro->titulolibro }}</td>
                                                <td><a href="datalibros/{{ $libro->titulolibro }}" target="blank_" >Ver Libro</a></td>
                                                <td>{{ $libro->idioma }}</td>
                                                <td>{{ $libro->descripcionlibro }}</td>
                                                <td>{{ $libro->fecha }}</td>

                                                <td>
                                                    <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-end">
                                {!! $libros->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
