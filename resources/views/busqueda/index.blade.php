@extends('layouts.app')

@section('template_title')
    Buscar
@endsection

@section('content')
<section class="section">
        <div class="section-header">
            
            <h3 class="page__heading">Ingresa la palabra que deseas buscar:</h3>
            <font color="#099DFF">
                <b>
                    <p>Tz'utujil, Español o Ingles</p>
                </b>
            </font>
            <br>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                
                                <br>
                                <form action="{{ route('busquedas.index') }}" method="get">
                                    <div class="form-row">
                                        <div class="col-xs-6 col-md-1">     
                                            <input type="submit" class="btn btn-primary" Value="Buscar">
                                        </div>

                                            <div class="col-xs-12 col-md-4">
                                                <input type="text" class="form-control" placeholder="Ingrese una palabra" id="texto" name="texto" value="{{ $texto }}">
                                            </div>  
                                            
                                        </div>        
                                </form>
                                <br>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                <section class="container mt-4">

                                    <div class="row">

                                    @foreach ($libros as $libro)
                                        <div class="col-md-3 mb-4">
                                            <div class="card card-body text-center">

                                            <embed type="application/pdf"
                                            src="/datalibros/{{ $libro->titulolibro }}"
                                            width="auto"
                                            height="auto">

                                                <h5 class="font-weight-bold mt-3">{{ $libro->titulolibro }}</h5>
                                                <p>
                                                    <span>{{ $libro->autor }}</span> <br>
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
                                </section>
                

                            <div class="pagination justify-content-end">
                                {!! $libros->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
