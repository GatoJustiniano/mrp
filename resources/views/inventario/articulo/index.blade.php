@extends('layouts.menu')

@section('title', 'Gestión Articulo | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        ul.pagination {
            justify-content: center;
        }
        .section {
          padding: 5px !important; 
      }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Articulo
                @can('articulos.create')
                    <a href="{{ route('articulos.create') }}"
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Articulo
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>

                                <th>codigo</th>
                                <th>tipo</th>
                                <th>estado</th>
                                <th>sub_categoria_id</th>



                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $articulo)
                            <tr>
                                <td>{{ $articulo->id }}</td>
                                <td>{{ $articulo->nombre }}</td>

                                <td>{{ $articulo->codigo }}</td>
                                <td>{{ $articulo->tipo }}</td>
                                <td>{{ $articulo->estado }}</td>
                                <td>{{ $articulo->sub_categoria_id }}</td>



                                @can('articulos.show')
                                <td width="10px">
                                    <a href="{{ route('articulos.show', $articulo->id) }}"
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('articulos.edit')
                                <td width="10px">
                                    <a href="{{ route('articulos.edit', $articulo->id) }}"
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('articulos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['articulos.destroy', $articulo->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $articulos->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
