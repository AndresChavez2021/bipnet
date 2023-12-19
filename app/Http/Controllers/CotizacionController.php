<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\OportunidadDeVenta;
use App\Models\Estado;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //dd( $request);
        $idOportunidad = $request->input('idOportunidad');
        if ($idOportunidad === null) {
            // Obtener todas las actividades
            $cotizaciones = Cotizacion::all();
        } else {
            // Obtener la oportunidad con sus cotizaciones relacionadas
            $oportunidad = OportunidadDeVenta::with('cotizaciones')->find($idOportunidad);
    
            // Obtener las actividades de la oportunidad
            $cotizaciones = $oportunidad->cotizaciones;
        }
        $estado = Estado::pluck('nombre', 'id');
        //dd( $actividades);
        return view('cotizaciones.index', compact('cotizaciones','estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idOportunidad = $request->input('idOportunidad');
        $estadoId = $request->input('estadoId');
        //dd($estadoId);
        $cotizacion = new Cotizacion();
        $oportunidad = OportunidadDeVenta::where('id', $idOportunidad)->pluck('nombre', 'id');
        $estado = Estado::where('id', $estadoId)->pluck('nombre', 'id');
        //$estado = Estado::pluck('nombre', 'id');
        //dd($estado);
        return view('cotizaciones.create', compact('cotizacion', 'oportunidad', 'estado'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idOportunidad = $request->input('idOportunidad');
        if ($idOportunidad === null) {
            // Obtener todas las actividades
            $cotizaciones = Cotizacion::all();
        } else {
            // Obtener la oportunidad con sus cotizaciones relacionadas
            $oportunidad = OportunidadDeVenta::with('cotizaciones')->find($idOportunidad);
    
            // Obtener las actividades de la oportunidad
            $cotizaciones = $oportunidad->cotizaciones;
        }
        $estado = Estado::pluck('nombre', 'id');
        //dd( $actividades);
        return view('cotizaciones.index', compact('cotizaciones','estado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
