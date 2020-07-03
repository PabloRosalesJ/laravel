@extends('layouts.app')

@section('content')

    {{-- Modal update Person --}}
    <div class="modal fade UpdateSeller" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h3 class="text-center my-3">Actualizar datos del vendedor</h3> 
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="comprador" role="tabpanel" aria-labelledby="comprador-tab">
                    <div class="container">
                        <div class="container shadow my-3">
                            <form action=" {{ route('seller.update', $seller->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ $seller->person->name }}">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ap_pat">Ap. paterno</label>
                                        <input type="text" class="form-control" id="ap_pat" placeholder="Ap. paterno" name="ap_pat" value="{{ $seller->person->ap_pat }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ap_mat">Ap. materno</label>
                                        <input type="text" class="form-control" id="ap_mat" placeholder="Ap. materno" name="ap_mat" value="{{ $seller->person->ap_mat }}">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{ $seller->person->phone }}">
                                    </div>
                                
                                    <div class="form-group col-md-5">
                                    <label for="address">Dirección</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="{{ $seller->person->address }}">
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-4">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ $seller->username }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="password_confirmation">Confrma el password</label>
                                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confrma el password" name="password_confirmation">
                                    </div>
                                </div>
                                <input class="btn btn-info btn-block" type="submit" value="Actualizar">
                                <br>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
    {{-- End modal update Person --}}

    <h1 class="display-2 mx-4">Vendedor: {{ $seller->username }}</h1>
    <hr>
    <div class="row">
        <div class="col-4">
            <h3 class="text-center">Detalles</h3>
            <table class="table">
                <tbody>
                    <tbody>

                        <tr>
                            <td><p>Username</p></td>
                            <td> <p>{{$seller->username}}</p></td>
                        </tr>

                        <tr>
                            <td><p>Nombre</p></td>
                            <td><p>{{$seller->person->full_name}}</p></td>
                        </tr>

                        <tr>
                          <td><p>Dirección</p></td>
                          <td><p>{{$seller->person->address}}</p></td>
                        </tr>

                        <tr>
                          <td><p>Telefono</p></td>
                          <td><p>{{$seller->person->phone}}</p></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target=".UpdateSeller">Actualizar datos</button>
                          </td>
                        </tr>

                      </tbody>
                </tbody>
            </table>
        </div>
        <div class="col-8">
            <h3 class="text-center">Ventas realizadas</h3>

        </div>
    </div>
@endsection