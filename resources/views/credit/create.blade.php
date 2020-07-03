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
    <h1 class="display-2 mx-4">Agregar producto</h1>
    <hr>
    
    <div class="row">
        <credit-component></credit-component>
    </div>

@endsection