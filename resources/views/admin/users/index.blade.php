@extends("layout")

@section('thông thái')
    admin
@endsection
@section('contents')

@if (!empty($data))
<table class="table table-striped">
  
  <thead>
      <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Address</td>
          <td>Gender</td>
          <td>Role</td>

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
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h2>không có dữ liệu</h2>
@endif
@endsection