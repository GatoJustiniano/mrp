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
            @php
                $suma=0;
            @endphp
       
            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                               
                                <th>Componente</th>
                                <th>Cantidad</th>
                                <th>Unidadmedida</th>
                               
                            
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
                               
                                
                              

                                @php
          $suma+=$listamaterial->subtotal;
        @endphp
    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $listamaterials->links() }}
                    </div>
                   
                </div>

        </div>

        <div class="form-group">
<h2 class="title text-center">
           
                    <a href=""
                    class="btn btn-sm btn-info pull-right">
                       monto total {{$suma}}
                    </a>
                    
            </h2>
            
</div>

    </div>
        
</div>
@endsection
