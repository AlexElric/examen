<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            // 'info' => $info,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'codigo'         => ['required', 'unique:empleados,codigo'],
            'nombre'         => ['required', 'alpha_spaces'],
            'salarioDolares' => ['required', 'numeric', 'min:1'],
            'salarioPesos'   => [],
            'direccion'      => ['required'],
            'estado'         => ['required'],
            'ciudad'         => ['required'],
            'telefono'       => ['required'],
            'correo'         => ['required', 'email'],
            'activo'         => [],
        ]);

        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET', 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/2020-02-24/2020-02-24', [
            'query' => ['token' => 'a7d3d8465014cd9e9b0b45584a496a305820a13e6fbf94bb1f60d72654c4cc57']
        ]);
        $info = json_decode($result->getBody()->getContents(),true);
        if (!$info) {
            return redirect()->back();
        }
        $valor = $info['bmx']['series'][0]['datos'][0]['dato'];

        $fields['salarioPesos'] = (float)$valor * $fields['salarioDolares'];

        $created = Empleado::create($fields);

        if ($created) {
            return redirect()->route('home');
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET', 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/2020-02-24/2020-02-24', [
            'query' => ['token' => 'a7d3d8465014cd9e9b0b45584a496a305820a13e6fbf94bb1f60d72654c4cc57']
        ]);
        $info = json_decode($result->getBody()->getContents(),true);
        if (!$info) {
            return redirect()->back();
        }

        $valor = $info['bmx']['series'][0]['datos'][0]['dato'];
        $proyeccion = array();
        $sp = 0;
        $sd = $empleado->salarioDolares;
        for ($i=1; $i <=6 ; $i++) { 
            $sd = $sd * 1.05;
            $sp = ($valor * $sd);
            $obj['sp'] = $sp;
            $obj['sd'] = $sd;
            array_push($proyeccion, $obj);
        }
        
        return view('show', [
            'empleado' => $empleado,
            'proyeccion' => $proyeccion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('edit', [
            'empleado' => $empleado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $fields = request()->validate([
            'codigo'         => [],
            'nombre'         => ['required', 'alpha_spaces'],
            'salarioDolares' => ['required', 'numeric', 'min:1'],
            'salarioPesos'   => [],
            'direccion'      => ['required'],
            'estado'         => ['required'],
            'ciudad'         => ['required'],
            'telefono'       => ['required'],
            'correo'         => ['required', 'email'],
            'activo'         => [],
        ]);
        if (isset($fields['activo'])) {
            $fields['activo'] = 1;
        }
        else {
            $fields['activo'] = 0;
        }

        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('GET', 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/2020-02-24/2020-02-24', [
            'query' => ['token' => 'a7d3d8465014cd9e9b0b45584a496a305820a13e6fbf94bb1f60d72654c4cc57']
        ]);
        $info = json_decode($result->getBody()->getContents(),true);
        if (!$info) {
            return redirect()->back();
        }
        $valor = $info['bmx']['series'][0]['datos'][0]['dato'];

        $fields['salarioPesos'] = (float)$valor * $fields['salarioDolares'];

        $updated = $empleado->update($fields);

        if ($updated) {
            return redirect()->route('home');
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $deleted = $empleado->delete();

        if($deleted) {
            return redirect()->route('home');
        }
        else {
            return redirect()->back();
        }
    }
}
