<?php

namespace App\Http\Controllers;

use App\Models\Datoscliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $showincidente = \App\Models\Datosincidentes::all();
        $showcliente = \App\Models\Datoscliente::all();
        return view("ventanas.cliente", compact("showcliente", "showincidente"));
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
        //se crea un objeto que tenga el módelo de la base de datps
        $creacioncliente = new \App\Models\Datoscliente();
        //se asigna el nombre del usuario a la tabla
        $creacioncliente->cedula = $request->cedula;
        $consultacliente = DB::table('cliente')->select('cedula')->where('cedula', $creacioncliente->cedula)->value('cedula');
        echo $consultacliente;
        if (empty($consultacliente)) {
            $creacioncliente->nombres_cliente = $request->nombre;
            $creacioncliente->apellidos_cliente = $request->apellido;
            $creacioncliente->save();
            return redirect("/cliente");
            //header("refresh:3;url=http://prueba_php.test/ventanas");

        } else {
            return redirect("/cliente")->with('alert', 'El cliente ya existe.');
        }
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
        return view("ventanas.editcliente", compact("showcliente"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $showcliente = \App\Models\Datoscliente::findOrFail($id);
        return view("ventanas.editcliente", compact("showcliente"));
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
        $creacioncliente = \App\Models\Datoscliente::findOrFail($id);

        $CreacionUsuarios = new \App\Models\Datosincidentes();
        //se asigna el nombre del usuario a la tabla
        $CreacionUsuarios->id_cliente = $request->cedulac;
        //se realiza la consulta para saber si el usuario ya existe
        $creacioncliente->cedula = $request->cedulac;
        $creacioncliente->nombres_cliente = $request->nombre;
        $creacioncliente->apellidos_cliente = $request->apellido;
        $creacioncliente->update($request->all());
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
        $creacioncliente = \App\Models\Datoscliente::findOrFail($id);

        $consulta = DB::table('incidentes')->select('id_cliente')->where('id_cliente', $id)->value('id_cliente');
        if (empty($consulta)) {
            $creacioncliente->delete();
            return redirect("/cliente")->with('alert', 'El cliente fue borrado con exito');
        } else {
            return redirect("/cliente")->with('alert', 'El cliente que desea borrar tiene uno o más incidentes asignados');
        }
    }
}
