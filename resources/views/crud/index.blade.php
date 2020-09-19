@extends('crud.master')
@section('content')
<div class="row">
    <div class="col-sm text-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($student as $row)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->nim}}</td>
                <td>{{$row->nama}}</td>
                <td>
                    <a href="{{route("crud.edit", [$row->id])}}" type="button" class="btn btn-success">Edit</a>
                    <form action="{{route("crud.destroy", [$row->id])}}" method="post">
                        {{method_field("DELETE")}}
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
