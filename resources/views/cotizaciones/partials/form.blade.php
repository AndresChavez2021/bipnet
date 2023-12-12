
<div class="box box-info padding-1">
    <div class="box-body">
        <hr>
        <div class="form-group">
        {{ Form::label('Codigo', 'Codigo') }}
        {{ Form::text('Codigo', $cotizacion->Codigo, ['class' => 'form-control' . ($errors->has('Codigo') ? ' is-invalid' : ''), 'placeholder' => 'Cod #']) }}
        {!! $errors->first('Codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('fecha', 'Fecha') }}
            {{ Form::date('fecha', $cotizacion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('monto_total', 'Monto') }}
            {{ Form::number('monto_total', $cotizacion->monto_total, ['class' => 'form-control' . ($errors->has('monto_total') ? ' is-invalid' : ''), 'step' => '0.01']) }}
            {!! $errors->first('monto_total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('id_oportunidad', 'oportunidad') }}
            {{ Form::select('id_oportunidad', $oportunidad, $cotizacion->id_oportunidad, ['class' => 'form-control' . ($errors->has('id_oportunidad') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_oportunidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('id_estado', 'estado') }}
            {{ Form::select('id_estado', $estado, $cotizacion->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</div>
