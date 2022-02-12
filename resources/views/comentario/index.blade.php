@extends('layouts.app')

@section('template_title')
    Comentario
@endsection

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')
    <div class="section-header">
        <h3 class="page__heading">Tabla de Comentarios</h3>
    </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped mt-2">
                                    <thead style="background-color:#515151">
                                        <tr>
                                            <th style="color:#fff;">Id</th>
                                            <th style="color:#fff;">Comentario</th>
                                            <th style="color:#fff;">Nombre</th>
                                            <th style="color:#fff;">Email</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comentarios as $comentario)
                                            <tr>

                                                <td>{{ $comentario->id }}</td>
                                                <td>{{ $comentario->comentario }}</td>
                                                <td>{{ $comentario->nombreautor }}</td>
                                                <td>{{ $comentario->email }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-end">
                                {!! $comentarios->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
