<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombrecategoria') }}
            {{ Form::text('nombrecategoria', $categoria->nombrecategoria, ['class' => 'form-control' . ($errors->has('nombrecategoria') ? ' is-invalid' : ''), 'placeholder' => 'Nombrecategoria']) }}
            {!! $errors->first('nombrecategoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcioncategoria') }}
            {{ Form::text('descripcioncategoria', $categoria->descripcioncategoria, ['class' => 'form-control' . ($errors->has('descripcioncategoria') ? ' is-invalid' : ''), 'placeholder' => 'Descripcioncategoria']) }}
            {!! $errors->first('descripcioncategoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>