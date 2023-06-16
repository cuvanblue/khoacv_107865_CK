<?php

namespace App\Http\Service;
use Illuminate\Support\Facades\Log;
use App\Models\TinTuc;
use PHPUnit\Exception;

class TinTucService
{
    public function create($request){
        try {
            TinTuc::create([
                'matintuc'=>$request->input('matintuc'),
                'tieude'=>$request->input('tieude'),
                'noidung'=>$request->input('noidung'),
                'matheloai'=>$request->input('matheloai'),
            ]);
            Session()->flash('success','Thêm mới tin tức thành công');

        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
    public function getAll($number){
        return TinTuc::paginate((int)$number);
    }
    public function edit($tintuc, $request){
        try {
            $tintuc->tieude = $request->input('tieude');
            $tintuc->noidung = $request->input('noidung');
            $tintuc->matheloai = $request->input('matheloai');
            $tintuc->save();
            Session()->flash('success','Chỉnh sửa tin tức thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error','Chỉnh sửa tin tức KHÔNG thành công');
        }
        return false;
    }
    public function delete($request){
        $tintuc = TinTuc::where('id',$request->input('id'))->first();
        if($tintuc){
            return $tintuc->delete();
        }
    }
    public function search($option, $keyword = ''){
        $tintucs = TinTuc::where('matintuc', 'like', '%'.$option.'%')
                ->where(function($query) use($keyword) {
                    $query->where('tentintuc', 'like', '%'.$keyword.'%')
                          ->orwhere('mota', 'like', '%'.$keyword.'%')
                          ->orwhere('soluongsv', 'like', '%'.$keyword.'%');
                })
                ->paginate(20);
        return $tintucs;
    }
}
