<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Producto_Servicio;

class ProductoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Producto_Servicio::with(['categoria'])->get();

        return view('Servicios.index', compact('servicios'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicio = new Producto_Servicio();
        $categorias = Categoria::pluck('nombre', 'id');
        return view('servicios.create', compact('servicio', 'categorias'));
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
            'descripcion' => 'required',
            'precio' => 'required',
            'id_categoria' => 'required',
        ]);

        Producto_Servicio::create($request->all());
        return redirect()->route('servicios.index')
            ->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto_Servicio  $producto_Servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Producto_Servicio::find($id);

        return view('servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto_Servicio  $producto_Servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Producto_Servicio::find($id);
        $categorias = Categoria::pluck('nombre', 'id');
        return view('servicios.edit', compact('servicio','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto_Servicio  $producto_Servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto_Servicio $servicio)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'id_categoria' => 'required',
        ]);

        $servicio->update($request->all());
        return redirect()->route('servicios.index')
            ->with('success', 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto_Servicio  $producto_Servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Producto_Servicio::find($id)->delete();
        return redirect()->route('servicios.index')
            ->with('success', 'deleted successfully.');
    }
}
