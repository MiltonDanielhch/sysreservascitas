<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Config::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        //validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'logo'=>'required'
        ]);
        $configuracion = new Config();

        $configuracion->nombre =$request->nombre;
        $configuracion->direccion =$request->direccion;
        $configuracion->telefono =$request->telefono;
        $configuracion->correo =$request->correo;
        $configuracion->logo =$request->file('logo')->store('logos', 'public');

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')->with('mensaje', 'se registro la configuracion de la manera correcta')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion =Config::find($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion =Config::find($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        // dd($request->all(), $request->file('logo'));

        //validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'direccion' =>'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);

        $configuracion = Config::find($id);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;

        if($request->hasFile('logo')){
            Storage::delete('public/'.$configuracion->logo);
            $configuracion->logo = $request->file('logo')->store('logos', 'public');
        }

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'se actualizo la configuraciones de la manera correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $configuracion =Config::find($id);
        return view('admin.configuraciones.delete', compact('configuracion'));
     }
    public function destroy($id)
    {
        $configuracion = Config::find($id);
        Storage::delete('public/'.$configuracion->logo);
        Config::destroy($id);

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'se elimino la configuracion de la manera correcta')
            ->with('icono', 'success');
    }
}
