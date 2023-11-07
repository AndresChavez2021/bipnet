<?php

namespace App\Http\Controllers;

use App\Models\DetalleTurno;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreDetalleTurnoRequest;
use App\Http\Requests\UpdateDetalleTurnoRequest;
use App\Models\Turno;
use App\Models\User;

class DetalleTurnoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-asignar-horario|crear-asignar-horario|editar-asignar-horario|borrar-asignar-horario', ['only' => 'index']);
        $this->middleware('permission:ver-asignar-horario', ['only' => 'show']);
        $this->middleware('permission:crear-asignar-horario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-asignar-horario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-asignar-horario', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $detalleTurnos = DetalleTurno::select('*')->orderBy('id','ASC');
        $limit = (isset($request->limit)) ? $request->limit:10;
        $empleados = User::get()->where('tipoe', 1);
        $turnos = Turno::get();
        if(isset($request->search)){
            $detalleTurnos = $detalleTurnos->where('id','like','%'.$request->search.'%')
            ->orWhere('idemp','like','%'.$request->search.'%')
            ->orWhere('idturn','like','%'.$request->search.'%');
        }
        $detalleTurnos = $detalleTurnos->paginate($limit)->appends($request->all());
        return view('detalleTurnos.index', compact('detalleTurnos', 'empleados', 'turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = User::get()->where('tipoe', 1);
        $turnos = Turno::get();
        return view('detalleTurnos.create', compact('empleados', 'turnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetalleTurnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetalleTurnoRequest $request)
    {
        DetalleTurno::create($request->validated());
        return redirect()->route('detalleTurnos.index')->with('mensaje', 'Datos agregados Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleTurno  $detalleTurno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleTurno = DetalleTurno::where('id', '=', $id)->firstOrFail();
        $empleados = User::get()->where('tipoe', 1);
        $turnos = Turno::get();
        return view('detalleTurnos.show', compact('detalleTurno', 'empleados', 'turnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleTurno  $detalleTurno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleTurno = DetalleTurno::where('id', '=', $id)->firstOrFail();
        return view('detalleTurnos.edit', compact('detalleTurno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetalleTurnoRequest  $request
     * @param  \App\Models\DetalleTurno  $detalleTurno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetalleTurnoRequest $request, $id)
    {
        $detalleTurno = DetalleTurno::find($id);
        $detalleTurno->update($request->validated());
        return redirect()->route('detalleTurnos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleTurno  $detalleTurno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleTurno = DetalleTurno::findOrFail($id);
        try{
            $detalleTurno->delete();
            return redirect()->route('detalleTurnos.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('detalleTurnos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
