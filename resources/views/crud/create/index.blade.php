@extends('crud.master')
@section('content')
<div class="row">
    <div class="col-sm text-center">
        <form method="POST" action="{{route("crud.store")}}">
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" name="nim" id="nim">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
