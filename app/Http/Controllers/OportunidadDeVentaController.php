<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OportunidadDeVenta;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;

class OportunidadDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $oportunidadesQuery = OportunidadDeVenta::with(['cliente', 'empleado', 'estado']);

        if ($request->has('estado') && $request->estado !== '') {
            $oportunidadesQuery->where('id_estado', $request->estado);
        }
    
        $oportunidades = $oportunidadesQuery->get();
        $estados = Estado::pluck('nombre', 'id');
    
        return view('oportunidades.index', compact('oportunidades', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oportunidad = new OportunidadDeVenta();
        $estado = Estado::pluck('nombre', 'id');
        $cliente = Cliente::pluck('nombre', 'id');
        $empleado = auth()->user()->id;
        return view('oportunidades.create', compact('oportunidad','estado','cliente','empleado'));
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
            'fecha_inicio' => 'required',
            'monto_esperado' => 'required',
            'fecha_estimada_cierre' => 'required',
            'id_estado' => 'required',
            'id_empleado' => 'required',
            'id_cliente' => 'required',
        ]);

        OportunidadDeVenta::create($request->all());
        return redirect()->route('oportunidades.index')
            ->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OportunidadDeVenta  $oportunidadDeVenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oportunidad = OportunidadDeVenta::with(['cliente', 'empleado', 'estado'])->find($id);
        return view('oportunidades.show', compact('oportunidad'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OportunidadDeVenta  $oportunidadDeVenta
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       
        //$oportunidades = OportunidadDeVenta::find($id);
        $oportunidad = OportunidadDeVenta::with(['cliente', 'empleado', 'estado'])->find($id);
        $estado = Estado::pluck('nombre', 'id');
        $cliente = Cliente::pluck('nombre', 'id');
        $empleado = auth()->user()->id;
        return view('oportunidades.edit', compact('oportunidad','estado','cliente','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OportunidadDeVenta  $oportunidadDeVenta
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request, $id)
     {
         $request->validate([
             'nombre' => 'required',
             'fecha_inicio' => 'required',
             'monto_esperado' => 'required',
             'fecha_estimada_cierre' => 'required',
             'id_estado' => 'required',
             'id_empleado' => 'required',
             'id_cliente' => 'required',
         ]);
     
         $oportunidad = OportunidadDeVenta::findOrFail($id);
         $oportunidad->update($request->all());
     
         return redirect()->route('oportunidades.index')
             ->with('success', 'Actualizado exitosamente.');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OportunidadDeVenta  $oportunidadDeVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OportunidadDeVenta::find($id)->delete();
        return redirect()->route('oportunidades.index')
            ->with('success', 'deleted successfully.');
    }
}
