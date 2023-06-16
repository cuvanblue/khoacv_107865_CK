<?php

namespace App\Http\Service;
use Illuminate\Support\Facades\Log;
use App\Models\TheLoai;
use PHPUnit\Exception;

class TheLoaiService
{
    public function create($request){
        try {
            TheLoai::create([
                'matheloai'=>$request->input('matheloai'),
                'tentheloai'=>$request->input('tentheloai'),
                'mota'=>$request->input('mota'),
            ]);
            Session()->flash('success','Thêm mới thể loại thành công');

        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
    public function getAll($number){
        return TheLoai::paginate((int)$number);
    }
    public function edit($theloai, $request){
        try {
//            $theloai->matheloai = $request->input('matheloai');
            $theloai->tentheloai = $request->input('tentheloai');
            $theloai->mota = $request->input('mota');
            $theloai->soluongsv = $request->input('soluongsv');
            $theloai->save();
            Session()->flash('success','Chỉnh sửa lớp học thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error','Chỉnh sửa lớp học KHÔNG thành công');
        }
        return false;
    }
    public function delete($request){
        $theloai = TheLoai::where('id',$request->input('id'))->first();
        if($theloai){
            return $theloai->delete();
        }
    }
    public function search($option, $keyword = ''){
        $theloais = TheLoai::where('matheloai', 'like', '%'.$option.'%')
                ->where(function($query) use($keyword) {
                    $query->where('tentheloai', 'like', '%'.$keyword.'%')
                          ->orwhere('mota', 'like', '%'.$keyword.'%')
                          ->orwhere('soluongsv', 'like', '%'.$keyword.'%');
                })
                ->paginate(20);
        return $theloais;
    }
}
