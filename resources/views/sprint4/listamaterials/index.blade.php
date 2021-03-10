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
            <h2 class="title text-center">Lista de materiales
                @can('listamaterials.create')
                    <a href="{{ route('listamaterials.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                       Agregar Componente
                    </a>
                @endcan
            </h2>

       
            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                            
                                <th>Componente</th>
                                <th>Cantidad</th>
                                <th>Unidad medida</th>
                               
                            
                                <th>Costo unitario</th>
                                <th>Subtotal</th>
                           
                              
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listamaterials as $listamaterial)
                            <tr>
                               
                                <td>{{ $listamaterial->componente }}</td>
                                 
                                <td>{{ $listamaterial->cantidad }}</td>
                                <td>{{ $listamaterial->unidadmedida }}</td>
                                <td>{{ $listamaterial->costounitario }}</td>
                                <td>{{ $listamaterial->subtotal }}</td>
                               
                                
                              



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
