@if (session('status'))
  <div class="row m-0">
    <div class="col-8"></div>
      <div class="col-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 20rem; float-right">
          <strong>{{ session('status') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
  </div>
@endif