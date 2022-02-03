@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="card-body">
            <h1 class="card-title"><strong>Bienvenido</strong></h1>
            <h4 class="card-title"><strong>Usuario:</strong> {{ Auth::user()->name }}</h4>
             <a href="{{ url('DBLibros') }}" class="btn btn-primary">{{ __('Administrar libros') }}</a> 
         </div>
    </div>
</div>
@endsection
