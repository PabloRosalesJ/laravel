@extends('layouts.app')

@section('content')
    <h1 class="display-2 mx-4">Clientes</h1>
    <hr>
    <div class="text-left"><small>{{ $buyers->total() }} Cliente(s)</small></div>

    {{-- message mepty data --}}
    @include('includes.empty_data_message', ['Entity' => $buyers])
    {{-- End message mepty data --}}
    
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th width="200">Direccion</th>
                <th>Teléfono</th>
                <th>No. Libreta</th>
                <th>No. Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>

        @if ($buyers->total() != 0)
            @foreach ($buyers as $buyer)
                {{-- {{ $buyer }} --}}
                <tr>
                    <th>{{ $buyer->id }}</th>
                    <td>{{ $buyer->person->full_name }}</td>
                    <td>{{ $buyer->person->address }}</td>
                    <td>{{ $buyer->person->phone }}</td>
                    <td>{{ $buyer->no_notebook }}</td>
                    <td>{{ $buyer->no_registry }}</td>
                    <td class="row" width="130">
                        <div class="col-6">
                            <a href="{{ route('buyer.show', $buyer->id) }}" class="btn btn-warning btn-sm">Ver</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('buyer.destroy', $buyer->id) }}" method="post" class="d-flex floar-right">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
                    <tbody>
                </tbody>
            </table>

    <div class="row justify-content-center">
        {{ $buyers->links() }}
    </div>
@endsection