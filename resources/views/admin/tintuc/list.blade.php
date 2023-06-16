@extends('admin.main')
@section('content')
    <div style="float: left; margin: 10px 0px 10px 10px">
    <span>Số lượng hiển thị:</span>
    <select class="paginateNumber" onchange="window.location.href='/admin/tintuc/list/'+ this.value" >
        <option value=3 @selected(3 == $number)>3</option>
        <option value=5 @selected(5 == $number)>5</option>
        <option value=10 @selected(10 == $number)>10</option>
        <option value=15 @selected(15 == $number)>15</option>
    </select>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã tin tức</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Tên thể loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tintucs as $tintuc)
                <tr>
                    <td>{{$tintuc->id}}</td>
                    <td>{{$tintuc->matintuc}}</td>
                    <td>{{$tintuc->tieude}}</td>
                    <td>{{$tintuc->noidung}}</td>
                    <td>{{$tintuc->tentheloai}}</td>
                    <td>
                        <a href="/admin/tintuc/edit/{{$tintuc->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$tintuc->id}},'/admin/tintuc/delete')" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tintucs->links() }}
@endsection
