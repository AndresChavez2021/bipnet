<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Database\QueryException;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;

class ClienteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cliente|crear-cliente|editar-cliente|borrar-cliente', ['only' => 'index']);
        $this->middleware('permission:ver-cliente', ['only' => 'show']);
        $this->middleware('permission:crear-cliente', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cliente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cliente', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$clientes = Cliente::select('*')->orderBy('id','ASC');
        $clientes = Cliente::all();

        //return view('clientes.index', compact('clientes'))
           // ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
        // $clientes = Cliente::paginate();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $cliente = new Cliente();
        return view('clientes.create',compact('cliente'));
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
            'info_contacto' => 'required',
            'correo' => 'required',
            'phone' => 'required',
        ]);
        
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'cliente agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
      
       // $cliente = User::where('id', '=', $id)->firstOrFail();
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
       //$cliente = User::where('id', '=', $id)->firstOrFail();
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre' => 'required',
            'info_contacto' => 'required',
            'correo' => 'required',
            'phone' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        try{
            $cliente->delete();
            return redirect()->route('clientes.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('clientes.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
