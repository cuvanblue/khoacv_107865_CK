@extends('admin.main')
@section('content')
    <style>
        .search-box{
            border-radius: 5px;
            height: 60px;
            display: flex;
            flex-direction: row;
            justify-items: center;
            padding: 10px;
        }
        .search-box select{
            border-radius: 5px;
            width: 200px;
            height: 100%;
            margin: auto 1% auto 1%;
        }
        .search-box button{
            width: 80px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }
        .search-box input{
            width: calc(98% - 180px);
        }
    </style>
    <form id="search-box" class="search-box" action="/admin/lop/search-action" method="get">
        <input id="search-input" type="text" name="keyword" placeholder="Tìm lớp học" />
        <select id="search-select" name="option">
            <option value="">All</option>
            <option value="64">K64</option>
            <option value="65">K65</option>
            <option value="66">K66</option>
            <option value="IT">Khoa Công Nghệ Thông Tin</option>  
            <option value="TH">Khoa Khoa Học Máy Tính</option>   
            <option value="XD">Khoa Xây Dựng Dân Dụng</option>  
            <option value="CD">Khoa Cầu Đường</option>                   
        </select>
        <button type="submit">Tìm Lớp</button>
        @csrf
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Số lượng sv</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lops as $lop)
                <tr>
                    <td>{{$lop->id}}</td>
                    <td>{{$lop->malop}}</td>
                    <td>{{$lop->tenlop}}</td>
                    <td>{{$lop->mota}}</td>
                    <td>{{$lop->soluongsv}}</td>
                    <td>
                        <a href="/admin/lop/edit/{{$lop->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$lop->id}},'/admin/lop/delete')" ><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $lops->links() }}
@endsection