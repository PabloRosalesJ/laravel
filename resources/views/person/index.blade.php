@extends('layouts.app')

@section('content')

    {{-- Modal create Person --}}
    <div class="modal fade CreatePerson" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h3 class="text-center my-3">Selecciona el tipo de usuario a crear</h3> 
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="comprador-tab" data-toggle="tab" href="#comprador" role="tab" aria-controls="comprador" aria-selected="true">Comprador</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="vendedor-tab" data-toggle="tab" href="#vendedor" role="tab" aria-controls="vendedor" aria-selected="false">Vendedor</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="comprador" role="tabpanel" aria-labelledby="comprador-tab">
                    <div class="container">
                        <div class="container shadow my-3">
                            <form action=" {{ route('buyer.store') }}" method="post">
                                @csrf
                                @include('person.form_base')
                                @include('person.includes.form_buyer')
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="vendedor" role="tabpanel" aria-labelledby="vendedor-tab">
                    <div class="container">
                        <div class="container shadow my-3">
                            <form action="{{ route('seller.store') }}" method="post">
                                @csrf
                                @include('person.form_base')
                                @include('person.includes.form_seller')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
    {{-- End modal create Person --}}

    <div class="row justify-content-between">
        <div class="col-8">
            <h1 class="display-2 mx-4">Todos</h1>
        </div>
        <div class="col-4 align-self-center">
            <button class="btn btn-primary" data-toggle="modal" data-target=".CreatePerson">Nueva persona</button>
        </div>
        
    </div>

    {{-- message mepty data --}}
    @include('includes.empty_data_message', ['Entity' => $people])
    {{-- End message mepty data --}}

    <div class="text-left"><small>{{ $people->total() }} Persona(s)</small></div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Teléfono</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($people as $person)   
            <tr>
                <td> {{$person->id}} </td>
                
                <td> {{$person->full_name}} </td>

                <td> {{$person->address}} </td>

                <td> {{$person->phone}} </td>

                <td> {{$person->created_at->format('d-m-Y')}} </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        {{ $people->links() }}
    </div>

@endsection