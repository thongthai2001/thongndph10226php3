@extends("layout")

@section('title')
    quản lí
@endsection

@section('contents')
<div class="mb-3" >
    <form action="{{ route('admin.users.index') }}" method="get">
        <input class="form-control col-4" type="text" name="keyword" value="{{ old('keyword') }}">
        <button class="btn btn-primary mt-3">Tìm Kiếm</button>
    </form>
</div>

<div class="col-6">
        {{-- <div class="col-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Creat</a>
        </div> --}}
        <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Create</button>

        <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="mt-3">
                                <label>Name</label>
                                <input class="mt-3 form-control" type="text" name="name" }}" />
                            </div>
                            <div class="mt-3">
                                <label>Email</label>
                                <input class="mt-3 form-control" type="email" name="email" />
                            </div>
                            <div class="mt-3">
                                <label>Address</label>
                                <input class="mt-3 form-control" type="text" name="address" />
                            </div>
                            <div class="mt-3">
                                <label>Password</label>
                                <input class="mt-3 form-control" type="password" name="password" />
                            </div>
                            <div class="mt-3">
                                <label>Gender</label>
                                <select class="mt-3 form-control" name="gender">
                                    <option value="{{ config('common.user.gender.male') }}">
                                        Male
                                    </option>
                                    <option value="{{ config('common.user.gender.female') }}">
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label>Role</label>
                                <select class="mt-3 form-control" name="role">
                                    <option value="{{ config('common.user.role.user') }}">
                                        User
                                    </option>
                                    <option value="{{ config('common.user.role.admin') }}">
                                        Admin
                                    </option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button class="mt-3 btn btn-primary">Create</button>
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
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
          <td>Invoice</td>
          <td>Gender</td>
          <td>Role</td>
          <td colspan="2">Action</td>
          

      </tr>
  </thead>
  <tbody>
      @foreach($data as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>
          <a href="{{ route('admin.users.show', [ 'id' => $user->id ] )}}">
           {{ $user->name}}
          </a>
        </td>
        <td>{{$user->email}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->invoices->count()}}</td>
        <td>{{$user->gender  == config('common.item.gender.male') ? "Nam" : "Nữ" }}</td>
        <td>{{$user->role == config('common.user.role.user') ? "user" : "admin"}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.users.edit', [ 'id' => $user->id ]) }}">Update</a>
        </td>
        <td>
            <button class="btn btn-danger"  data-toggle="modal" data-target="#confirm_delete{{ $user->id }}" href="">Delete</button>

            <div class="modal fade"  id="confirm_delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('admin.users.delete', ['id' => $user->id ]) }}" method="POST">
                @csrf
        <button type="submit" class="btn btn-primary">Delete</button>
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

@section('pagescript')

<script>
        $('#form_create').on('submit', function(event) { 
          event.preventDefault();
          
          const url = "{{ route('admin.users.store') }}";

          let name = $("#form_create input[name='name']").val();
          let email = $("#form_create input[name='email']").val();
          let password = $("#form_create input[name='password']").val();
          let address = $("#form_create input[name='address']").val();
          let gender = $("#form_create select[name='gender']").val();
          let role = $("#form_create select[name='role']").val();
          let _token = $("#form_create input[name='_token']").val();

          const data ={
            _token,
            name,
            email,
            password,
            address,
            gender,
            role,
          };

            fetch(url, {
              method:'POST',
              body: JSON.stringify(data),
              headers: {
                "X-CSRF-Token": _token,
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requestd-With": "XMLHttpRequest"
              },
            })
            .then(reponse => reponse.json())
            .then(data => {
              console.log(data);
              if(data.status == 200){
                window.location.reload();
              }
            })
          
        });
</script>

@endsection