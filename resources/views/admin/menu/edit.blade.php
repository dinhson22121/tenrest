@extends('admin.main')
@section("content")
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" class="form-control" id="menu" name="danhmuc" value="{{$menu->name}}">
            </div>
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="detail" class="form-control">{{$menu->detail}}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>


@endsection
