@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'Show Libro' }}
@endsection

@section('portada')
        <div class="masthead-heading">Biblioteca Virtual</div>
        <div class="masthead-subheading">Santiago Atitlán, Sololá</div>
@endsection

@section('content')
        <div class="text-center">
            <div class="row align-items-center">
                <h4 style="font-family: Poppins-Bold; font-size: 29px;">
                    <strong>Libro</strong> 
                </h4>
                <p>
                    <strong>Nombre:</strong> 
					{{ $libro->titulolibro }}
                    <br> 
				    <strong>Categoria:</strong> 
					{{ $libro->categoria }}
                    <br> 
                    <strong>Autor:</strong>
					{{ $libro->autor }}
                </p>
                <br>
                <div class="col-xs-1 center-block">
                    <a class="btn btn-primary" href="{{ route('busquedas.index') }}"> REGRESAR</a>
                </div>
            </div>
        </div>
        <br></br>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary mb-3">
 
                    <div class="card-body">

                            <div class="container" id="pdf">
                                <iframe class="responsive-iframe" type="application/pdf" src="/datalibros/{{ $libro->titulolibro }}#toolbar=0&navpanes=0&scrollbar=0">
                                    <p>Su navegador no es compatible con iframes</p>
                                </iframe>
                            </div>
                    
                    </div>
                </div>
            </div>
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
                                                    <div class="alert alert-success" style="color: #FFFFFF; background-color: rgba(28, 215, 255, .2); border:none;">
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
#pdf {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 80%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Luego, diseñe el iframe para que quepa en el contenedor div con altura y ancho completos */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
</style>
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