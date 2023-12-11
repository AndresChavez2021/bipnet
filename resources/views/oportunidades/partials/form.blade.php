
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="nombre">Empleado:</label>
            <input type="text" name="nombre" value="{{ old('nombre', auth()->user()->name ?? '') }}" class="form-control" readonly>
            <input type="hidden" name="id_empleado" value="{{ auth()->user()->id }}">
        </div>

        <hr>

        <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', $oportunidad->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio', 'Fecha Inicio') }}
            {{ Form::date('fecha_inicio', $oportunidad->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('monto_esperado', 'Monto Esperado') }}
            {{ Form::number('monto_esperado', $oportunidad->monto_esperado, ['class' => 'form-control' . ($errors->has('monto_esperado') ? ' is-invalid' : ''), 'step' => '0.01']) }}
            {!! $errors->first('monto_esperado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('fecha_estimada_cierre', 'Fecha Estimada de Cierre') }}
            {{ Form::date('fecha_estimada_cierre', $oportunidad->fecha_estimada_cierre, ['class' => 'form-control' . ($errors->has('fecha_estimada_cierre') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_estimada_cierre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('id_estado', 'Estado') }}
            {{ Form::select('id_estado', $estado, $oportunidad->id_estado, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('id_cliente', 'Cliente') }}
            {{ Form::select('id_cliente', $cliente, $oportunidad->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
<hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
