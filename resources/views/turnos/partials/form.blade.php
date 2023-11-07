@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($turno) ? $turno->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="time" placeholder="horaini" class="form-control" name="horaini"
                value="{{ isset($turno) ? $turno->horaini : old('horaini') }}">
            <label >Hora De Inicio</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="time" placeholder="horafin" class="form-control" name="horafin"
                value="{{ isset($turno) ? $turno->horafin : old('horafin') }}">
            <label>Hora De Finalización</label>
        </div>
    </div>
</div>
