@extends('layouts.menu')

@section('title', 'Departamentos')

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
            <h2 class="title text-center">Departamentos
                @can('departamentos.create')
                    <a href="{{ route('departamentos.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Departamento
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departamentos as $departamento)
                            <tr>
                                <td>{{ $departamento->id }}</td>
                                <td>{{ $departamento->nombre }}</td>
                                <td>{{ $departamento->codigo }}</td>
                                <td>
                                @if($departamento->estado == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                                </td>
                                @can('departamentos.show')
                                <td width="10px">
                                    <a href="{{ route('departamentos.show', $departamento->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('departamentos.edit')
                                <td width="10px">
                                    <a href="{{ route('departamentos.edit', $departamento->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('departamentos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['departamentos.destroy', $departamento->id],
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
                        {{ $departamentos->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
