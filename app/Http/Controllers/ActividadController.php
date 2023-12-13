<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Actividad;
use App\Models\OportunidadDeVenta;


class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd( $request);
        $idOportunidad = $request->input('idOportunidad');

        // Verificar si el ID de la oportunidad es null
        if ($idOportunidad === null) {
            // Obtener todas las actividades
            $actividades = Actividad::all();
        } else {
            // Obtener la oportunidad con sus actividades relacionadas
            $oportunidad = OportunidadDeVenta::with('actividades')->find($idOportunidad);
    
            // Obtener las actividades de la oportunidad
            $actividades = $oportunidad->actividades;
        }

        //dd( $actividades);
        return view('actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idoportunidad = $request->input('idOportunidad');
        $actividad = new Actividad();
        $oportunidad = OportunidadDeVenta::where('id', $idoportunidad)->pluck('nombre', 'id');
    
        return view('actividades.create', compact('actividad', 'oportunidad'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'detalles' => 'required',
            'id_oportunidad' => 'required',
        ]);
    
        Actividad::create($request->all());
        return redirect()->route('oportunidades.index')
            ->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::with(['oportunidadDeVenta'])->find($id);
        return view('actividades.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $actividad = Actividad::with(['oportunidadDeVenta'])->find($id);
         $oportunidad = OportunidadDeVenta::pluck('nombre', 'id');
         return view('actividades.edit', compact('actividad','oportunidad'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
            'detalles' => 'required',
            'id_oportunidad' => 'required',
        ]);
       
        //$id_oportunidad = $request->input('id_oportunidad');
        //$id_oportunidad = $request->input('id_oportunidad');
        //$arreglo = ['idOportunidad' => $id_oportunidad];
        
        //dd($id_oportunidad);
        $actividad = Actividad::findOrFail($id);
        $actividad->update($request->all());
        return redirect()->route('oportunidades.index')
            ->with('success', 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actividad::find($id)->delete();
        return redirect()->route('actividades.index')
            ->with('success', 'deleted successfully.');
    }
}
