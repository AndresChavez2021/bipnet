@csrf
<div class="row">
    <div class="col-12">
        <h5>Trabajadores</h5>
        @if ((isset($detalleTurno->id) ? $detalleTurno->id : '') == '')
            <select name="idemp" class="form-control">
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->name }}
                    </option>
                @endforeach
                <option selected> Seleccione Un Trabajador... </option>
            </select>
        @else
            <select name="idemp" class="form-control">
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}" @if ($detalleTurno->idemp == $empleado->id) selected @endif>
                        {{ $empleado->name }}
                    </option>
                @endforeach
                <option> Seleccione Un Trabajador... </option>
            </select>
        @endif
    </div>
    <div class="col-12">
        <h5>Turnos</h5>
        @if ((isset($detalleTurno->id) ? $detalleTurno->id : '') == '')
            <select name="idturn" class="form-control">
                @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}">{{ $turno->name }} | {{$turno->horaini}} - {{$turno->horafin}}
                    </option>
                @endforeach
                <option selected> Seleccione Un Horario... </option>
            </select>
        @else
            <select name="idturn" class="form-control">
                @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}" @if ($detalleTurno->idturn == $turno->id) selected @endif>
                        {{ $turno->name }} | {{$turno->horaini}} - {{$turno->horafin}}
                    </option>
                @endforeach
                <option> Seleccione Un Horario... </option>
            </select>
        @endif
    </div>
</div>
