@extends('layouts.menu')

@section('title', 'Contactos | MRP')

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
            <h2 class="title text-center">Contactos
                @can('contactos.create')
                    <a href="{{ route('contactos.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Contacto
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre </th>
                                <th>Cargo</th>
                                <th>Correo</th>
                                <th>Proveedor</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactos as $contacto)
                            <tr>
                                <td>{{ $contacto->id }}</td>
                                <td>{{ $contacto->nombre }}</td>
                                <td>{{ $contacto->cargo }}</td>
                                <td>{{ $contacto->correo}}</td>
                                <td>{{ $contacto->proveedor}}</td>
                                <td>
                                    @if($contacto->estado == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>

                                @can('contactos.show')
                                <td width="10px">
                                    <a href="{{ route('contactos.show', $contacto->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('contactos.edit')
                                <td width="10px">
                                    <a href="{{ route('contactos.edit', $contacto->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('contactos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['contactos.destroy', $contacto->id], 
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
                        {{ $contactos->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
