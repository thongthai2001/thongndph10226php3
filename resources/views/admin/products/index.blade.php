@extends("layout")

@section('thông thái')
    admin
@endsection
@section('contents')
<div class="row mt-3">
    <div class="col-6">
        <a class="btn btn-success" href="{{ route('admin.products.create') }}">create</a>
    </div>
</div>

<form action="" method="get">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tên sp:</label>
                <input type="text" name="keyword" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Danh mục:</label>
                <select name="category_id" class="form-control">
                    <option value="">Tất cả</option>
                    @foreach($cates as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>    
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Sắp xếp theo</label>
                <select name="order_by" class="form-control">
                    <option value="">Mặc định</option>
                    @foreach(config('common.product_order_by') as $k => $val)
                    <option value="{{$k}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
        </div>    
    </div>
</form>
@if (!empty($data))
<table class="table table-striped mt-3">
  
  <thead>
      <tr>
          <td>ID</td>
          <td>Name</td>
          <td>price</td>
          <td>quantity</td>
          <td>category_id</td>
          <td>image</td>
          <td colspan="2">Action</td>
          

      </tr>
  </thead>
  <tbody>
      @foreach($data as $pro)
    <tr>
        <td>{{$pro->id}}</td>
        <td>{{$pro->name}}</td>
        <td>{{$pro->price}}</td>
        <td>{{$pro->quantity}}</td>
        <td>{{$pro->category_id}}</td>
        <td>
                <img src="{{asset('storage/' . $pro->image)}}" width="70">
            </td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.products.edit', [ 'id' => $pro->id ]) }}">Update</a>
        </td>
        <td>
            <button class="btn btn-danger"  data-toggle="modal" data-target="#confirm_delete{{ $pro->id }}" href="">Delete</button>

            <div class="modal fade"  id="confirm_delete{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('admin.products.delete', ['id' => $pro->id ]) }}" method="POST">
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