
        <div class="form-group row">
            <label for="nombrecategoria" class="col-md-4 col-form-label text-md-right">{{ __("Nombre") }}</label>

            <div class="col-md-6">
                <input id="nombrecategoria" type="text" class="form-control @error('nombrecategoria') is-invalid @enderror" name="nombrecategoria" value="{{ old('nombrecategoria',$categoria->nombrecategoria) }}" placeholder="Categoría" autofocus>

                 @error('nombrecategoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcioncategoria" class="col-md-4 col-form-label text-md-right">{{ __("Descripción") }}</label>

            <div class="col-md-6">
                <input id="descripcioncategoria" type="text" class="form-control @error('descripcioncategoria') is-invalid @enderror" name="descripcioncategoria" value="{{ old('descripcioncategoria',$categoria->descripcioncategoria) }}" placeholder="Descripción" autofocus>

                 @error('descripcioncategoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{ route('categorias.index') }}"> Regresar</a>
            </div>
        </div>

