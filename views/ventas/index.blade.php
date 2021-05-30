@extends('layouts.layout') @section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de zapatoss</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('ventas.create') }}" class="btn btn-info" >Añadir Zapato</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>Fecha</th>
                                <th>Tipo de Pago</th>
                                <th>Monto</th>
                                <th>Zapato</th>
                        </thead>
                            <tbody>
                                @if($ventas->count())
                                @foreach($ventas as $venta)  
                                <tr>
                                    <td>{{$venta->fecha}}</td>
                                    <td>{{$venta->Tipo}}</td>
                                    <td>{{$venta->monto}}</td>
                                    <td>{{$venta->zapato}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\VentasController@edit', $venta->idventa)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <form action="{{action('App\Http\Controllers\VentasController@destroy', $venta->idventa)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr> @endforeach @else
                                <tr>
                                    <td colspan="8">No hay registro !!</td>
                                </tr> @endif
                            </tbody>

                        </table>
    
                    </div>
                </div>
                {{ $ventas->links() }}
            </div>
        </div>
    </section> 
@endsection