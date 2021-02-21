@extends('layouts.menu')

@section('title', 'Gestión Area | MRP')

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
            <h2 class="title text-center">Area
                @can('areas.create')
                    <a href="{{ route('areas.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Area
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Código</th>
                                <th>Nombre Area</th>
                                <th>Estado</th>
                                <th>Departamento</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                            <tr>
                                <td>{{ $area->id }}</td>
                                <td>{{ $area->codigo }}</td>
                                <td>{{ $area->nombre }}</td>
                                <td>
                                @if($area->estado == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                                </td>
                                <td>
                                {{ $area->departamento_id}}
                                </td>
                                @can('areas.show')
                                <td width="10px">
                                    <a href="{{ route('areas.show', $area->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('areas.edit')
                                <td width="10px">
                                    <a href="{{ route('areas.edit', $area->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('areas.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['areas.destroy', $area->id], 
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
                        {{ $areas->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
