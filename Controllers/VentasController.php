<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
 
use App\Models\Ventas;

class VentasController extends Controller
{
    //
    public function index()
    {
    //
    $ventas=ventas::orderBy('idventa','DESC')->paginate(3);
    return view('ventas.index',compact('ventas'));
    }
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
    {
    //
    return view('ventas.create');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
public function store(Request $request)
    {
    //
    $this->validate($request,[ 'fecha'=>'required', 'Tipo'=>'required',
    'monto'=>'required', 'zapato'=>'required']);
    ventas::create($request->all());
    return redirect()->route('ventas.index')->with('success','Registro creado satisfactoriamente');
    }
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
public function show($idventa)
    {
    $ventas=ventas::find($idventa);
    return view('ventas.show',compact('ventas'));
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
public function edit($idventa)
    {
    //
    $ventas=ventas::find($idventa);
    return view('ventas.edit',compact('ventas'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $idzapato
    * @return \Illuminate\Http\Response
    */
public function update(Request $request, $idventa) {
    //
    $this->validate($request,[ 'fecha'=>'required', 'Tipo'=>'required',
    'monto'=>'required', 'zapato'=>'required']);
    ventas::find($idventa)->update($request->all());
    return redirect()->route('ventas.index')->with('success','Registro actualizado
    satisfactoriamente');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $idzapato
    * @return \Illuminate\Http\Response
    */
public function destroy($idventa)
    {
    //
    ventas::find($idventa)->delete();
    return redirect()->route('ventas.index')->with('success','Registro eliminado satisfactoriamente');
    }
    /**
    * Ejemplo de método REST
    *
    * @return \Illuminate\Http\Response
    */
public function getVentas(){
    $ventas=ventas::all();
    return response()->json($ventas);
}
}
