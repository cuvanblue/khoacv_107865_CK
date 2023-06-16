@extends('admin.main')
@section('content')
    <form action="/admin/tintuc/add" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã tin tức</label>
                <input type="text" name="matintuc" class="form-control" id="malop" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">tiêu đề</label>
                <input type="text" name="tieude" class="form-control" id="tenlop">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung</label>
                <input type="text" name="noidung" class="form-control" id="mota" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mã thể loại</label>
                <input type="text" name="matheloai" class="form-control" id="soluongsv">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
