@extends("layout")

@section('title', 'Create product')
@section('contents')
<form method="POST" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" />
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>price</label>
        <input class="mt-3 form-control" type="number" name="price" />
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>quantity</label>
        <input class="mt-3 form-control" type="text" name="quantity" />
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
   
    <div>
        <label for="">category_id</label>
    <select id="cars" class="form-select form-control-user" name="category_id" >
                    @foreach($data as $c)
                        <option  value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
     <div>
        <label>image</label>
        <input class="mt-3 form-control" type="file" name="file_upload" />
       
    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection