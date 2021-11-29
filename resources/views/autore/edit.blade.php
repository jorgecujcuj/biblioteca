@extends('layouts.app')

@section('template_title')
    Update Autore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Autore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('autores.update', $autore->idautor) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('autore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
