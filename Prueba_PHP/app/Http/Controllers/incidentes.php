<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class incidentes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showcliente = \App\Models\Datoscliente::all();
        $showincidente = \App\Models\Datosincidentes::all();
        return view("ventanas.cliente", compact("showincidente", "showcliente"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dato = DB::table('logeo')->select('idlogin')->latest('idlogin')
            ->first();
        $creacionincidentes = new \App\Models\Datosincidentes();
        $creacionincidentes->id_cliente = $request->cliente;
        $creacionincidentes->id_usuario = $dato->idlogin;
        $creacionincidentes->descripcion = $request->text;
        $creacionincidentes->reporte = $request->image;
        $creacionincidentes->save();

        $showcliente = \App\Models\Datoscliente::all();
        $showincidente = \App\Models\Datosincidentes::all();
        return view("ventanas.cliente", compact("showcliente", "showincidente"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $showcliente = \App\Models\Datoscliente::findOrFail($id);
        $showincidente = \App\Models\Datosincidentes::findOrFail($id);
        return view("ventana.editincidente", compact("showincidente", "showcliente"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showincidente = \App\Models\Datosincidentes::findOrFail($id);
        return view("ventanas.editincidente", compact('showincidente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $Creacionincidente = \App\Models\Datosincidentes::findOrFail($id);
        //se asigna el nombre del usuario a la tabla
        $Creacionincidente->id_usuario = 1;
        $Creacionincidente->descripcion = $request->text;
        $Creacionincidente->reporte = $request->image;
        $Creacionincidente->update($request->all());

        return redirect("/cliente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $eliminarincidente = \App\Models\Datosincidentes::findOrFail($id);
        $eliminarincidente->delete();
        return redirect("/cliente")->with('alert', 'El incidente fue borrado con exito');
    }
}
