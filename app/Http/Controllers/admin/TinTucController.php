<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\LopService;
use App\Models\tintuc;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest;
use App\Http\Service\TinTucService;

class TinTucController extends Controller
{
    //
    protected $tintucService;
    public function __construct(TinTucService $tintucService)
    {
        $this->tintucService = $tintucService;
    }

    public function create(){
        return view('admin.lop.add',[
            'title'=>'Thêm mới lớp học'
        ]);
    }
    public function postcreate(CreateFormRequest $request){
       //dd($request->input());
        $result = $this->tintucService->create($request);
        return redirect()->back();
    }
    public function list($number = 1){
        //dd($this->tintucService->getAll());
        return view('admin.tintuc.list',[
            'title'=>'Danh sách tin tức',
            'tintucs'=>$this->tintucService->getAll($number),
            'number' => $number
        ]);
    }
    public function getsearch(){
        return view('admin.lop.search',[
            'title' => 'Tìm kiếm lớp học',
            'lops'=>$this->tintucService->getAll(20),
        ]);
    }
    public function searchaction(Request $request){
        return view('admin.lop.search',[
            'title' => 'Tìm kiếm lớp học',
            'lops'=>$this->tintucService->search($request->input('option'),$request->input('keyword')),
        ]);
    }
    public function edit(tintuc $tintuc){
        return view('admin.tintuc.edit',[
            'title'=>'Chỉnh sửa thông tin lớp học',
            'tintuc'=>$tintuc
        ]);
    }
    public function postedit(tintuc $tintuc, Request $request){
        $result = $this->tintucService->edit($tintuc, $request);
        return redirect()->back();
    }
    public function delete(Request $request){
        $result = $this->tintucService->delete($request);
        if($result){
            return response()->json([
                'error'=>'false',
                'message'=>'Xóa lớp thành công'
            ]);
        }
        return response()->json([
            'error'=>'true',
            'message'=>'Xóa lớp KHÔNG thành công'

        ]);
    }
}
