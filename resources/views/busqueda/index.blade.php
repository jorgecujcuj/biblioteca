@extends('layouts.app')

@section('template_title')
    Buscar
@endsection

@section('content')
    <div class="text-center">
        <h2 class="section-heading text-uppercase">Ingresar el nombre del libro que deseas buscar:</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
    </div>

    
    <div class="col-xl-6">    
    <form action="{{ route('busquedas.index') }}" method="get">    
        <div class="row">

            <div class="col">
                <input class="form-control form-control-lg" type="search" placeholder="Ingrese una palabra" aria-label="Search" id="texto" name="texto" value="{{ $texto }}" autofocus>
            </div>

            
            <div class="col-auto">
                <button class="btn btn-primary btn-lg" type="submit">Buscar</button>
            </div>
        
        </div>
    </form>
    </div>
    <br>
    <div class="row">                           
                   
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

            <div class="row"> 
                @foreach ($libros as $libro)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card card-body text-center">

                            <embed type="application/pdf"
                            src="/datalibros/{{ $libro->titulolibro }}"
                            width="auto"
                            height="auto">

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

@section('css')
<style>


</style>
@endsection