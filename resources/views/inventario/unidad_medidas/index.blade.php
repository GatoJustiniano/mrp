@extends('layouts.menu')

@section('title', 'Unidad de Medida')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        ul.pagination {
            justify-content: center;
        }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Unidad de Medida
                @can('unidad_medidas.create')
                    <a href="{{ route('unidad_medidas.create') }}"
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Unidad de Medida
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Abreviatura</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidad_medidas as $unidad_medida)
                            <tr>
                                <td>{{ $unidad_medida->id }}</td>
                                <td>{{ $unidad_medida->nombre }}</td>
                                <td>{{ $unidad_medida->abreviatura }}</td>
                                @can('unidad_medidas.show')
                                <td width="10px">
                                    <a href="{{ route('unidad_medidas.show', $unidad_medida->id) }}"
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('unidad_medidas.edit')
                                <td width="10px">
                                    <a href="{{ route('unidad_medidas.edit', $unidad_medida->id) }}"
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('unidad_medidas.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['unidad_medidas.destroy', $unidad_medida->id],
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
                        {{ $unidad_medidas->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
