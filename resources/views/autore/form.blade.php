        <div class="form-group row">
            <label for="nombreautor" class="col-md-4 col-form-label text-md-right">{{ __("Nombre") }}</label>

            <div class="col-md-6">
                <input id="nombreautor" type="text" class="form-control @error('nombreautor') is-invalid @enderror" name="nombreautor" value="{{ old('nombreautor',$autore->nombreautor) }}" placeholder="Autor" autofocus>

                 @error('nombreautor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcionautor" class="col-md-4 col-form-label text-md-right">{{ __("Descripción") }}</label>

            <div class="col-md-6">
                <textarea id="descripcionautor" class="form-control @error('descripcionautor') is-invalid @enderror" name="descripcionautor" placeholder="Descripción" autofocus>{{ old('descripcionautor',$autore->descripcionautor) }}</textarea>
                 @error('descripcionautor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{ route('autores.index') }}"> Cancelar</a>
            </div>
        </div>
