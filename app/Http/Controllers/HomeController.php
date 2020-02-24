<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empleados = \App\Empleado::all();

        return view('home', [
            'empleados' => $empleados,
        ]);
    }

    public function activar(Request $request, $id)
    {
        $empleado = \App\Empleado::find($id);

        $fields = request()->validate([
            'activo'     => ['required'],
        ]);

        $updated = $empleado->update($fields);

        if ($updated) {
            return redirect()->route('home');
        }
        else {
            return redirect()->back();
        }
    }
}
