
<div class="box box-info padding-1">
    <div class="box-body">
        <hr>
        <div class="form-group">
        {{ Form::label('nombre', 'Referencia') }}
        {{ Form::text('nombre', $actividad->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una referencia para la actividad']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('fecha', 'Fecha') }}
            {{ Form::date('fecha', $actividad->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('detalles', 'Detalles') }}
            <textarea name="detalles" id="editor1" class="ckeditor custom-textarea form-control{{ $errors->has('detalles') ? ' is-invalid' : '' }}">{{ $actividad->detalles }}</textarea>
            {!! $errors->first('detalles', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
        <div class="form-group">
            {{ Form::label('id_oportunidad', 'oportunidad') }}
            {{ Form::select('id_oportunidad', $oportunidad, $actividad->id_oportunidad, ['class' => 'form-control' . ($errors->has('id_oportunidad') ? ' is-invalid' : '')]) }}
            {!! $errors->first('id_oportunidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <hr>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</div>
