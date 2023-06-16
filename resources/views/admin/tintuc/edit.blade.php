@extends('admin.main')
@section('content')
    <form action="/admin/tintuc/edit/{{$tictuc->id}}" method="post">
        @include('share.error')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã tin tức</label>
                <input readonly type="text" value="{{$tintuc->matintuc}}" name="matintuc" class="form-control" id="malop" placeholder="Nhập mã lớp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tiêu</label>
                <input type="text" value="{{$tintuc->tieude}}" name="tieude" class="form-control" id="tenlop" placeholder="Nhập tên lớp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung</label>
                <input type="text" value="{{$tintuc->noidung}}" name="noidung" class="form-control" id="mota" placeholder="Nhập mô tả">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ma the loai</label>
                <input type="number" value="{{$tintuc->matheloai}}" name="matheloai" class="form-control" id="soluongsv" placeholder="Nhập số lượng sinh viên">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection
