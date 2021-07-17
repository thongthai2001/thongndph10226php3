@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" action="{{ route('admin.users.update', [ 'id' => $data->id ]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name }}" name="name" />
    </div>
    <div>
        <label>Email</label>
        <input class="mt-3 form-control" type="email" value="{{ $data->email }}" name="email" />
    </div>
    <div>
        <label>Address</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->address }}" name="address" />
    </div>
    <div>
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option value="1"
                {{ $data->gender == 1 ? "selected" : "" }}>Male</option>
            <option value="0"
            {{ $data->gender == 0 ? "selected" : "" }}>Male</option>>Female</option>
        </select>
    </div>
    <div>
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option value="0"  {{ $data->role == 0 ? "selected" : "" }}>User</option>
            <option value="1"  {{ $data->role == 1 ? "selected" : "" }}>Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection