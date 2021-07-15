@extends("layout")

@section('thông thái')
    admin
@endsection
@section('contents')
<div class="row mt-3">
    <div class="col-6">
        <a class="btn btn-success" href="{{ route('admin.users.create') }}">create</a>
    </div>
</div>
@if (!empty($data))
<table class="table table-striped mt-3">
  
  <thead>
      <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Address</td>
          <td>Gender</td>
          <td>Role</td>
          <td colspan="2">Action</td>
          

      </tr>
  </thead>
  <tbody>
      @foreach($data as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->gender}}</td>
        <td>{{$item->role}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.users.edit', [ 'id' => $item->id ]) }}">Update</a>
        </td>
        <td>
            <button class="btn btn-danger"  data-toggle="modal" data-target="#confirm_delete{{ $item->id }}" href="">Delete</button>

            <div class="modal fade"  id="confirm_delete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <form action="{{ route('admin.users.delete', ['id' => $item->id ]) }}" method="POST">
                @csrf

        
        <button type="button" class="btn btn-primary">Delete</button>
     </form>
      </div>
    </div>
  </div>
</div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h2>không có dữ liệu</h2>
@endif
@endsection