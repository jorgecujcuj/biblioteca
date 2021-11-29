<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombreautor') }}
            {{ Form::text('nombreautor', $autore->nombreautor, ['class' => 'form-control' . ($errors->has('nombreautor') ? ' is-invalid' : ''), 'placeholder' => 'Nombreautor']) }}
            {!! $errors->first('nombreautor', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcionautor') }}
            {{ Form::text('descripcionautor', $autore->descripcionautor, ['class' => 'form-control' . ($errors->has('descripcionautor') ? ' is-invalid' : ''), 'placeholder' => 'Descripcionautor']) }}
            {!! $errors->first('descripcionautor', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>