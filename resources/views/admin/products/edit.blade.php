@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" action="{{ route('admin.products.update', [ 'id' => $data->id ]) }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->name }}" name="name" />
        
    </div>
    <div>
        <label>price</label>
        <input class="mt-3 form-control" type="number" value="{{ $data->price }}" name="price" />
    </div>
    <div>
        <label>quantity</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->quantity }}" name="quantity" />
    </div>
    <div>
        <label>category_id</label>
        <input class="mt-3 form-control" type="text" value="{{ $data->quantity }}" name="category_id" />
    </div>
    <div>
        <label>image</label>
        <input type="file" name="file_upload" value="{{asset('storage/' . $data->image)}}">   
    </div>
   

    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection