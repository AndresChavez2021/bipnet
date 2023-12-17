<div class="box box-info padding-1">
    <div class="box-body">
        <hr>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{-- {{ Form::text('nombre', $categoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'ingrese un nombre para la categoria']) }} --}}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
