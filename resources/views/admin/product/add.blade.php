@extends('admin.main')
@section("content")
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tên món ăn</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- select -->
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="custom-select" name="idCategory">
                           @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Giá tiền</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="detail" class="form-control">{{old('detail')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="menu">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="upload">
                        <label class="custom-file-label" for="upload">Choose file</label>
                    </div>
                </div>
                <div id="img_show">
                </div>
                <input id="image" name="image" type="hidden">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
        @csrf
    </form>
@endsection
