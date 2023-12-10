<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $estado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'ingrese un nombre para la etiqueta']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <hr>

        <div class="form-group">
            {{ Form::label('tipo_O', 'Tipo Oportunidad') }}
            {{ Form::checkbox('tipo_O', 1, $estado->tipo_O, ['class' => 'form-check-input']) }}
        </div>
           <hr>
        <div class="form-group">
            {{ Form::label('tipo_C', 'Tipo Cotización') }}
            {{ Form::checkbox('tipo_C', 1, $estado->tipo_C, ['class' => 'form-check-input']) }}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('tipo_V', 'Tipo Venta') }}
            {{ Form::checkbox('tipo_V', 1, $estado->tipo_V, ['class' => 'form-check-input']) }}
        </div>
        <hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
