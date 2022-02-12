<!--
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <input type="hidden" name="iduser" class="form-control" value="{{ Auth::user()->id }}">
        </div>

        <div class="form-group">
            {{ Form::label('idcategoria') }}
            <select class="form-control" name="idcategoria">
                    <option value="" selected disabled> - Selecciona una categoria - </option>
                    @foreach ($categoria as $cat)
                    <option value="{{ $cat->id}}" {{$cat->id == $libro->idcategoria ? 'selected' : ''}}>{{ $cat->nombrecategoria }}</option>
                    @endforeach
            </select>
            @error('idcategoria')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('idautor') }}
            <select class="form-control" name="idautor">
                    <option value="" selected disabled> - Selecciona una categoria - </option>
                    @foreach ($autor as $aut)
                    <option value="{{ $aut->id }}" {{$aut->id == $libro->idautor ? 'selected' : ''}}>{{ $aut->nombreautor }}</option>
                    @endforeach
            </select>
            @error('idautor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="titulolibro">Adjuntar Libro</label>
            <input class="form-control" type="file" accept="image/*, application/pdf" name="titulolibro" id="titulolibro" class="form-control-file" onchange="return cambiarFile();">
            @error('titulolibro')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('idiomalibro') }}
            {{ Form::text('idiomalibro', $libro->idiomalibro, ['class' => 'form-control' . ($errors->has('idiomalibro') ? ' is-invalid' : ''), 'placeholder' => 'Idiomalibro']) }}
            {!! $errors->first('idiomalibro', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcionlibro') }}
            {{ Form::text('descripcionlibro', $libro->descripcionlibro, ['class' => 'form-control' . ($errors->has('descripcionlibro') ? ' is-invalid' : ''), 'placeholder' => 'Descripcionlibro']) }}
            {!! $errors->first('descripcionlibro', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('js')
<script type="text/javascript">
function cambiarFile(){

    const input = document.getElementById('titulolibro');
    if (input.file  && input.files[0]){
        console.log("File Seleccionado : ", input.files[0]);
    }else{
    console.log("Sin Archivo Seleccionado " + document.getElementById('titulolibro').files[0]);
    }
}
</script>
@endsection
-->
