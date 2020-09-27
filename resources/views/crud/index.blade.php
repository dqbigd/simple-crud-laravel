@extends('crud.master')
@section('content')
<a href="{{route("crud.create")}}" type="button" class="btn btn-success">Create</a>
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
                    <a href="{{route("crud.edit", [$row->id])}}" type="button" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger delete" data-id="{{$row->id}}">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delete').on('click', function(){
            var id = $(this).data('id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'/admin/crud/'+id,
                    method:'DELETE',
                    success:function(data){
                        window.setTimeout(function(){location.href="/admin/crud"}, 1500)
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                    }
                })


            } else {
                swal("Your imaginary file is safe!");
            }
            });
        })
    })
</script>
@endsection
