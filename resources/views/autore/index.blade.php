@extends('layouts.app')

@section('template_title')
    Autore
@endsection

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')

    <div class="section-header">
        <h3 class="page__heading">Tabla de Autores</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Autores</h4>
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right bg-primary">
                                            <a href="{{ route('autores.create') }}" class="dropdown-item text-white bg-primary">{{ __('Crear Autor') }}</a>
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
                                            <th style="color:#fff;">Nombre</th>
                                            <th style="color:#fff;">Descripción</th>
                                            <th style="color:#fff;">Acciones</th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($autores as $autore)
                                            <tr>
                                                <td>{{ $autore->id }}</td>
                                                <td>{{ $autore->nombreautor }}</td>
                                                <td>{{ $autore->descripcionautor }}</td>

                                                <td>
                                                    <form action="{{ route('autores.destroy',$autore->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-success" href="{{ route('autores.edit',$autore->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-end">
                                {!! $autores->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
