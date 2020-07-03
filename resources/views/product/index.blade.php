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
    {{-- Modal create Person --}}
    <div class="modal fade CreateProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h3 class="text-center my-3">Crear un producto</h3>

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-row container">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Nombre">
                        </div>
                        <div class="form-row m-0">
                            <div class="col-4 form-group">
                                <label for="p_compra">P. Compra</label>
                                <input class="form-control" type="text" name="p_compra" id="p_compra" placeholder="P. Compra" min="0">
                            </div>
                            <div class="col-4 form-group">
                                <label for="p_menudeo">P. Menudeo</label>
                                <input class="form-control" type="text" name="p_menudeo" id="p_menudeo" placeholder="P. Menudeo" min="0">
                            </div>
                            <div class="col-4 form-group">
                                <label for="p_mayoreo">P. Mayoreo</label>
                                <input class="form-control" type="text" name="p_mayoreo" id="p_mayoreo" placeholder="P. Mayoreo" min="0">
                            </div>
                        </div>
                        <div class="form-row justify-content-around">
                            <div class="col-5 form-group">
                                <label for="stock">Stock</label>
                                <input class="form-control" type="text" name="stock" id="stock" placeholder="Stock" min="0">
                            </div>
                            <div class="col-5 form-group">
                                <label for="stock_min">Stock min</label>
                                <input class="form-control" type="text" name="stock_min" id="stock_min" placeholder="Stock min" min="0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="photo">
                                <label class="custom-file-label" for="customFile">Seleciona una foto</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <label for="category_id">Categorias</label>
                            <select class="custom-select my-1 mr-sm-2" name="category_id" id="category_id">
                                <option value="null">Selecciona una caregoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="">Descripción</label>
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Registrar Producto" class="btn btn-primary" {{($categories->isEmpty()) ? "disabled" : "" }}>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
    </div>
    {{-- End modal create Person --}}

    <div class="row justify-content-between">
        <div class="col-8">
            <h1 class="display-2 mx-4">Productos</h1>
        </div>
        <div class="col-4 align-self-center">
            <button class="btn btn-primary" data-toggle="modal" data-target=".CreateProduct">Nuevo producto</button>
        </div>
        
    </div>
    <hr>

    {{-- message mepty data --}}
    @include('includes.empty_data_message', ['Entity' => $products])
    {{-- End message mepty data --}}

    <div class="container">

        <div class="text-left"><small>{{ $products->total() }} productos(s)</small></div>
        
        @foreach ($products as $product)
            <div class="row shadow-sm my-4">
                <div class="col-4">
                    <a href="{{ Storage::url($product->photo) }}" target="_blank">
                        <img src="{{ Storage::url($product->photo) }}" class="product_img" alt="img-thumbnail" width="300">
                    </a>
                </div>
                <div class="col-8">

                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="card-title">{{ $product->name }}</h3>
                        </div>
                        <small class="badge badge-info shadow m-0">
                            Categoria: {{ $product->category->name }}
                        </small>
                    </div>

                    <p class="card-text m-0 p-0">{!! $product->description !!}</p>
                    
                    <div class="row mb-3">
                        
                        <div class="col-4">
                            <p class="col m-0">Precio de compra:</p>
                            <p class="col m-0">Precio de menudeo:</p>
                            <p class="col m-0">Precio de mayoreo:</p>
                        </div>

                        <div class="col-4">
                            <p class="col m-0">${{ $product->p_compra }}.00</p>
                            <p class="col m-0">${{ $product->p_menudeo }}.00</p>
                            <p class="col m-0">${{ $product->p_mayoreo }}.00</p>
                        </div>

                        <div class="col-4">
                            <a href="" class="btn btn-secondary">Ver</a>
                            <a href="/" class="btn btn-danger" onclick="return confirm('¿Borrar?')">Eliminar</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
@endsection