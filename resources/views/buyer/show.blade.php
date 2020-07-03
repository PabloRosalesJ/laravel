@extends('layouts.app')

@section('content')

    {{-- Modal create Person --}}
    <div class="modal fade UpdateBuyer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <h3 class="text-center my-3">Actualizar datos del cliente</h3> 
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="comprador" role="tabpanel" aria-labelledby="comprador-tab">
                  <div class="container">
                      <div class="container shadow my-3">
                          <form action=" {{ route('buyer.update', $buyer->id) }}" method="post">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="name">Nombre</label>
                                  <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{$buyer->person->name}}">
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ap_pat">Ap. paterno</label>
                                      <input type="text" class="form-control" id="ap_pat" placeholder="Ap. paterno" name="ap_pat" value="{{$buyer->person->ap_pat}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ap_mat">Ap. materno</label>
                                      <input type="text" class="form-control" id="ap_mat" placeholder="Ap. materno" name="ap_mat" value="{{$buyer->person->ap_mat}}">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                <label for="phone">Teléfono</label>
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="{{$buyer->person->phone}}">
                                </div>
                            
                                <div class="form-group col-md-5">
                                <label for="address">Dirección</label>
                                  <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="{{$buyer->person->address}}">
                                </div>
                            </div>
                            <div class="form-row justify-content-around">
                              <div class="form-group col-md-4">
                                  <label for="no_notebook">No. de libreta</label>
                                    <input type="text" class="form-control" id="no_notebook" placeholder="No. de libreta" name="no_notebook" value="{{$buyer->no_notebook}}">
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="no_registry">No. de registro</label>
                                    <input type="text" class="form-control" id="no_registry" placeholder="No. de registro" name="no_registry" value="{{$buyer->no_registry}}">
                              </div>
                          </div>
                            <input class="btn btn-outline-secondary btn-block" type="submit" value="Registrar">
                          <br>

                          </form>
                      </div>
                  </div>
              </div>
          </div>

      </div>
      </div>
  </div>
  {{-- End modal create Person --}}

  <h1 class="display-2 mx-4">{{$buyer->person->full_name}}</h1>
  <hr>
  <div class="row">

      <div class="col-4">
          <h3 class="text-center">Detalles</h3>
          <div class="row">

            <table class="table">
              <tbody>
                <tr>
                  <td><p>Dirección</p></td>
                  <td><p>{{$buyer->person->address}}</p></td>
                </tr>
                <tr>
                  <td><p>Telefono</p></td>
                  <td><p>{{$buyer->person->phone}}</p></td>
                </tr>
                <tr>
                  <td><p>Libreta</p></td>
                  <td> <p>{{$buyer->no_notebook}}</p></td>
                </tr>
                <tr>
                  <td><p>No. registro</p></td>
                  <td><p>{{$buyer->no_registry}}</p></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target=".UpdateBuyer">Actualizar datos</button>
                    <br>
                    <a href="" class="btn btn-dark btn-block">Ver Crédito</a>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>

      <div class="col-8">
          <h3 class="text-center">Compras realizadas</h3>
              
          <table class="table table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
      </div>
  </div>
@endsection