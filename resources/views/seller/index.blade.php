@extends('layouts.app')

@section('content')
    <h1 class="display-2 mx-4">Vendedores</h1>
    <hr>
    
    <div class="row justify-content-around">

        {{-- Form create seller --}}
        <div class="col-5">
            <h3 class="text-center">Crear Vendedor</h3>
            <form action=" {{ route('seller.store') }} " method="post">
                @csrf
                @include('person.form_base')
                @include('person.includes.form_seller')
            </form>
        </div>
        {{-- End Form create seller --}}

        {{-- List sellers --}}
        <div class="col-7">
            <h3 class="text-center">Lista de Vendedores</h3>
            <div class="text-left"><small>{{ $sellers->total() }} Vendedor(es)</small></div>
            
            {{-- message mepty data --}}
            @include('includes.empty_data_message', ['Entity' => $sellers])
            {{-- End message mepty data --}}
            
            <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellers as $seller)
                    <tr>
                        <th>{{ $seller->id }}</th>
                        <td>{{ $seller->username }} </td>
                        <td>{{ $seller->person->full_name }}</td>
                        <td>{{ $seller->person->phone }}</td>
                        <td width="200">
                            <a href="{{ route('seller.show', $seller->id) }}" class="btn btn-warning">Ver</a>
                            <a href="" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
        {{-- End list seller --}}
    </div>
    

@endsection