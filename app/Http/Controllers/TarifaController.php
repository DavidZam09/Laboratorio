<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifaFormRequest;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Tarifa;
use Illuminate\Support\Facades\DB;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $tarifa = DB::table('tarifas as tv')
                ->where('tv.estado', 'Activo')
                ->paginate(5);

            //$tarifa =Tarifa::all();
            return view('Tarifa.index', ["tarifa" => $tarifa, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_vehiculo = DB::table('tipo_vehiculos')
            ->select('tipo_vehiculos.nombre', 'tipo_vehiculos.id')
            ->get();
        return view('tarifa.create')->with('tipo_vehiculo', $tipo_vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifaFormRequest $request)
    {
        $tarifa = new Tarifa;
        $tarifa->tipo_vehiculo_id = $request->get('tipo_vehiculo_id');
        $tarifa->valor = $request->get('valor');
        $tarifa->estado = $request->get('estado');
        $tarifa->save();
        return Redirect::to('tarifa');
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
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');

        $tarifa = Tarifa::findOrFail($id);
        $tarifa->estado = 'Inactivo';
        $tarifa->update();
    }
}
