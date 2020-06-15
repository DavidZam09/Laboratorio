<?php

namespace App\Http\Controllers;

use App\Ingreso_vehiculo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Ingreso_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingreso = Ingreso_vehiculo::all();
        return view('IngresoV.index')->with('ingreso', $ingreso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->user()->authorizeRoles(['operario', 'admin']);

        $vehiculo = DB::table('vehiculos as v')
            ->whereNotIn('v.id', function ($query) {
                $query->select('ingreso_vehiculos.vehiculo_id')
                    ->from('ingreso_vehiculos')
                    ->where('ingreso_vehiculos.estado', '=', 'Activo');
            })
            ->get();

        $idingreso = DB::table('ingreso_vehiculos')->max('id_ingreso');
        if ($idingreso == 0) {
            $idingreso = 1;
        } else {
            $idingreso = $idingreso + 1;
        }

        return view('ingresoV.create', ["vehiculo" => $vehiculo, "idingreso" => $idingreso]);
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
