@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" action="{{route('admin.users.store')}}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}" />
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class=" form-control" type="email" name="email" value="{{old('email')}}" />
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>password</label>
        <input class=" form-control" type="text" name="password"  />
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class=" form-control" type="text" name="address" value="{{old('address')}}" />
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mt-3">
        <label>Gender</label>
        <select id="inputState" name="gender" class="form-control">
                    <option {{ old('gender',config('common.user.gender.male')) == config('common.user.gender.male') ? 'selected' : '' }}
                        value="{{ config('common.user.gender.male') }}">Nam</option>
                    <option {{ old('gender',config('common.user.gender.female')) == config('common.user.gender.female') ? 'selected' : '' }}
                        value="{{ config('common.user.gender.female') }}">Nữ</option>
                </select>
    </div>
    <div class="mt-3">
        <label>Role</label>
        <select id="inputState" name="role" class="form-control">
                    <option {{ old('role',config('common.user.role.user')) == config('common.user.role.user') ? 'selected' : '' }}
                        value="{{ config('common.user.role.user') }}">Khách hàng</option>
                    <option {{ old('role',config('common.user.role.admin')) == config('common.user.role.admin') ? 'selected' : '' }}
                        value="{{ config('common.user.role.admin') }}">Quản trị</option>
                </select>
    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection


