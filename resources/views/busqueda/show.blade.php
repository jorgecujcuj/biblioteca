@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'Show Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">...</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('busquedas.index') }}"> REGRESAR</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $libro->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $libro->autor }}
                        </div>
                        <div class="form-group">
                            <strong>Libro:</strong>
                            {{ $libro->titulolibro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">....</span>
                        </div>
                    </div>

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
    </section>
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