@extends('crud.master')
@section('content')
<div class="row">
    <div class="col-sm text-center">
        <form method="POST" action="{{route("crud.update", [$student->id])}}">
            @csrf
            {{method_field("PUT")}}
            <div class="form-group">
              <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{$student->nama}}" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" name="nim" id="nim" value="{{$student->nim}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection
