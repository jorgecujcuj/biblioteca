@extends('layouts.app')

@section('template_title')
    Create Categoria
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="container">
            <div class="row justify-content-center">

                <div class="form-group row">
                    <label  class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <span class="login100-form-title p-b-70" style="font-family: Poppins-Bold; font-size: 39px;">
                            {{ __('Crear categoría:') }}
                            </span>
                        </div>
                </div>  

                @includeif('partials.errors')

                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('categoria.form')

                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
