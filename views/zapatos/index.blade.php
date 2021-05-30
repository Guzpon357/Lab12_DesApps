@extends('layouts.layout') @section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de zapatoss</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('zapatos.create') }}" class="btn btn-info" >Añadir Zapato</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <th>Calzado</th>
                                <th>Tipo</th>
                                <th>Color</th>
                                <th>Talla</th>
                                <th>Marca</th>
                                <th>Genero</th>
                                <th>Edades</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                        </thead>
                            <tbody>
                                @if($zapatos->count())
                                @foreach($zapatos as $zapato)  
                                <tr>
                                    <td>{{$zapato->calzado}}</td>
                                    <td>{{$zapato->tipo}}</td>
                                    <td>{{$zapato->color}}</td>
                                    <td>{{$zapato->talla}}</td>
                                    <td>{{$zapato->marca}}</td>
                                    <td>{{$zapato->genero}}</td>
                                    <td>{{$zapato->edades}}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('App\Http\Controllers\ZapatosController@edit', $zapato->idzapato)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <form action="{{action('App\Http\Controllers\ZapatosController@destroy', $zapato->idzapato)}}" method="post">
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
                {{ $zapatos->links() }}
            </div>
        </div>
    </section> 
@endsection