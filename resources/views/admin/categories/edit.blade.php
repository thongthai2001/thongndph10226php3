@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" action="{{ route('admin.categories.update', [ 'id' => $data->id ]) }}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name }}" name="name" />
    </div>

    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection