<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $estados = Estado::paginate();

        return view('estado.index', compact('estados'))
            ->with('i', (request()->input('page', 1) - 1) * $estados->perPage());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = new Estado();
        return view('estado.create',compact('estado'));
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
           // 'tipo_O' => 'required|numeric',
            //'tipo_C' => 'required|numeric',
            //'tipo_V' => 'required|numeric',
        ]);
        
        Estado::create($request->all());
        return redirect()->route('estados.index')->with('success', 'Estado creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre' => 'required',
            //'tipo_O' => 'required|numeric',
            //'tipo_C' => 'required|numeric',
            //'tipo_V' => 'required|numeric',
        ]);

        $estado = Estado::findOrFail($id);
        $estado->update($request->all());

        return redirect()->route('estados.index')->with('success', 'Estado actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        return redirect()->route('estados.index')->with('success', 'Estado eliminado exitosamente');
    }
}
