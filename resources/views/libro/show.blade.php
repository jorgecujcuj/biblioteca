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
                    <br>                                                              
                    <img type="image/*" class="img-fluid img-thumbnail"
                    src="/datalibros/{{ $libro->imglibro }}"
                    width="185px" alt="...">
                    <br>
                </h4>
                <p>
                    <strong>Idlibro:</strong>
                    {{ $libro->idlibro }}
                    <br>                      
                    <strong>Nombre:</strong> 
					{{ $libro->titulolibro }}
                    <br> 
				    <strong>Idcategoria:</strong> 
					{{ $libro->idcategoria }}
                    <br> 
                    <strong>Idautor:</strong>
					{{ $libro->idautor }}
                    <br> 
                    <strong>Idiomalibro:</strong>
                    {{ $libro->idiomalibro }}
                    <br> 
                    <strong>Descripcionlibro:</strong>
                    {{ $libro->descripcionlibro }}
                </p>
                <br>
                <div class="col-xs-1 center-block">
                    <a class="btn btn-primary" href="{{ route('libros.index') }}"> REGRESAR</a>
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
@endsection