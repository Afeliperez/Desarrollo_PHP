<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;
use phpDocumentor\Reflection\Location;

class usuarioscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //página principal
        $showcliente = \App\Models\Datoscliente::all();
        $showincidente = \App\Models\Datosincidentes::all();
        return view('ventanas.inicio', compact("showcliente", "showincidente"));
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
        //se crea un objeto que tenga el módelo de la base de datps
        $CreacionUsuarios = new \App\Models\usuario();
        //se asigna el nombre del usuario a la tabla
        $CreacionUsuarios->nombre = $request->usuario;
        //se realiza la consulta para saber si el usuario ya existe
        $consulta = DB::table('usuarios')->select('nombre')->where('nombre', $CreacionUsuarios->nombre)->value('nombre');
        // dd($consulta);
        //condicionales para la navegación
        if (isset($_POST['login'])) {
            if (empty($consulta)) {
                // echo "El usuario con el que desea ingresar no existe, por favor creelo y vuelva a intentar." . "<br>";
                // echo "En un momento será redireccionado a la página principal";
                return redirect()->back()->with('alert', 'El usuario con el que desea ingresar no existe, por favor creelo y vuelva a intentar.');
                //header("refresh:3;url=http://prueba_php.test/ventanas");
            } else {
                $showcliente = \App\Models\Datoscliente::all();
                $showincidente = \App\Models\Datosincidentes::all();
                $consultaid = DB::table('usuarios')->select('id')->where('nombre', $CreacionUsuarios->nombre)->value('id');
                DB::table('logeo')->insert(
                    ['idlogin' => $consultaid]
                );
                return view('ventanas.cliente', compact("showcliente", "showincidente"));
            }
        } else {
            if (empty($consulta)) {
                $CreacionUsuarios->save();
                return view('ventanas.inicio');
            } else {

                return redirect()->back()->with('alert', 'El usuario que desea ingresar ya existe');
            }
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
    }
}
