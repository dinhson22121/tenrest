@extends('admin.main')
@section("content")
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" class="form-control" id="menu" name="danhmuc">
            </div>
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="detail" class="form-control"></textarea>
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="exampleInputFile">File input</label>--}}
{{--                <div class="input-group">--}}
{{--                    <div class="custom-file">--}}
{{--                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
        @csrf
    </form>


@endsection
