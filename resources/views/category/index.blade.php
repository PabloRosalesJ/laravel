@extends('layouts.app')

{{-- Extra scripts --}}
@section('add_script')
    <script src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('script')
    <script>
        tinymce.init({  selector: '#description' });
    </script>
@endsection
{{-- End Extra scripts --}}

@section('content')
    <h1 class="display-2 mx-4">Categorias</h1>
    <hr>

    <div class="row justify-content-around">
        {{-- Create Category --}}
        <div class="col-4">
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del producto</label>
                    <input class="form-control" type="text" name="name" id="name">

                    <label for="description">Descripcion del producto</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="row-grup">
                    <input class="btn btn-primary btn-block" type="submit" value="Registrar">
                </div>
            </form>
        </div>
        {{-- End Create Category --}}

        {{-- Table Categories --}}
        <div class="col-8">

            {{-- message mepty data --}}
            @include('includes.empty_data_message', ['Entity' => $categories])
            {{-- End message mepty data --}}

            <div class="text-left"><small>{{ $categories->total() }} categoria(s)</small></div>
            <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{!! $category->description !!}</td>
                    </tr> 
                @endforeach            
            </tbody>
            </table>
            <div class="row justify-content-center">
                {{ $categories->links() }}
            </div>
        </div>
        {{-- End Table Categories --}}
    </div>

@endsection


