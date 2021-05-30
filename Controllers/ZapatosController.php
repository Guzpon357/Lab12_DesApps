<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
 
use App\Models\Zapatos;

class ZapatosController extends Controller
{
    public function index()
        {
        //
        $zapatos=zapatos::orderBy('idzapato','DESC')->paginate(3);
        return view('zapatos.index',compact('zapatos'));
        }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
        {
        //
        return view('zapatos.create');
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
        $this->validate($request,[ 'calzado'=>'required', 'tipo'=>'required',
        'tipo'=>'required', 'color'=>'required', 'talla'=>'required', 'marca'=>'required',
        'genero'=>'required','edades'=>'required']);
        zapatos::create($request->all());
        return redirect()->route('zapatos.index')->with('success','Registro creado satisfactoriamente');
        }
        /**
        * Display the specified resource.
        *
        * @param int $id
        * @return \Illuminate\Http\Response
        */
    public function show($idzapato)
        {
        $zapatos=Zapatos::find($idzapato);
        return view('zapatos.show',compact('zapatos'));
        }
        /**
        * Show the form for editing the specified resource.
        *
        * @param int $id
        * @return \Illuminate\Http\Response
        */
    public function edit($idzapato)
        {
        //
        $zapatos=zapatos::find($idzapato);
        return view('zapatos.edit',compact('zapatos'));
        }
        /**
        * Update the specified resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        * @param int $idzapato
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $idzapato) {
        //
        $this->validate($request,[ 'calzado'=>'required', 'tipo'=>'required',
        'tipo'=>'required', 'color'=>'required', 'talla'=>'required', 'marca'=>'required',
        'genero'=>'required','edades'=>'required']);
        zapatos::find($idzapato)->update($request->all());
        return redirect()->route('zapatos.index')->with('success','Registro actualizado
        satisfactoriamente');
        }
        /**
        * Remove the specified resource from storage.
        *
        * @param int $idzapato
        * @return \Illuminate\Http\Response
        */
    public function destroy($idzapato)
        {
        //
        Zapatos::find($idzapato)->delete();
        return redirect()->route('zapatos.index')->with('success','Registro eliminado satisfactoriamente');
        }
        /**
        * Ejemplo de método REST
        *
        * @return \Illuminate\Http\Response
        */
    public function getZapatos(){
        $zapatos=Zapatos::all();
        return response()->json($zapatos);
    }
}
