@extends('layouts.menu')

@section('title', 'Listamaterials')

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
            <h2 class="title text-center">Listamaterials
                @can('listamaterials.create')
                    <a href="{{ route('listamaterials.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva listamaterial
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Componente</th>
                                <th>Cantidad</th>
                                <th>Unidadmedida</th>
                               
                            
                                <th>Costounistario</th>
                                <th>Subtotal</th>
                           
                              
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listamaterials as $listamaterial)
                            <tr>
                                <td>{{ $listamaterial->id }}</td>
                                <td>{{ $listamaterial->componente }}</td>
                                 
                                <td>{{ $listamaterial->cantidad }}</td>
                                <td>{{ $listamaterial->unidadmedida }}</td>
                                <td>{{ $listamaterial->costounitario }}</td>
                                <td>{{ $listamaterial->subtotal }}</td>
                               
                                
                              
                                @can('listamaterials.show')
                                <td width="10px">
                                    <a href="{{ route('listamaterials.show', $listamaterial->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('listamaterials.edit')
                                <td width="10px">
                                    <a href="{{ route('listamaterials.edit', $listamaterial->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('listamaterials.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['listamaterials.destroy', $listamaterial->id], 
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
                        {{ $listamaterials->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
