<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreTurnoRequest;
use App\Http\Requests\UpdateTurnoRequest;

class TurnoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-horario|crear-horario|editar-horario|borrar-horario', ['only' => 'index']);
        $this->middleware('permission:ver-horario', ['only' => 'show']);
        $this->middleware('permission:crear-horario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-horario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-horario', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $turnos = Turno::select('*')->orderBy('id','ASC');
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $turnos = $turnos->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('horaini','like','%'.$request->search.'%')
            ->orWhere('horafin','like','%'.$request->search.'%');
        }
        $turnos = $turnos->paginate($limit)->appends($request->all());
        return view('turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTurnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurnoRequest $request)
    {
        Turno::create($request->validated());
        return redirect()->route('turnos.index')->with('mensaje', 'Datos agregados Con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno = Turno::where('id', '=', $id)->firstOrFail();
        return view('turnos.show', compact('turno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turno = Turno::where('id', '=', $id)->firstOrFail();
        return view('turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTurnoRequest  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTurnoRequest $request, $id)
    {
        $turno = Turno::find($id);
        $turno->update($request->validated());
        return redirect()->route('turnos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        try{
            $turno->delete();
            return redirect()->route('turnos.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('turnos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
