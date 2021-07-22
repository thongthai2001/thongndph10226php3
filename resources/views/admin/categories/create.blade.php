@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" action="{{route('admin.categories.store')}}">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" />
    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection