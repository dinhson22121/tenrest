@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên món ăn</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key =>$product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->detail}}</td>
                    <td>{{$product->price}}</td>
                    <td><img style="width: 40px;height: 40px"  src="{{$product->image}}"></td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/product/edit/{{$product->id}}"><span class="material-icons"> mode_edit</span></a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$product->id}},'/admin/product/destroy/')"><span class="material-icons">
delete
</span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{--    {{!!$products->links()}}--}}
@endsection
