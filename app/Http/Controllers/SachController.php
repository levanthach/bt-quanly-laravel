<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TheLoai;
use Validator;
use App\Sach;
use Illuminate\Database\Eloquent\Model;
class SachController extends Controller

{
    // public function Test(Request $request) {
     
    //     $str = '1-Hình Sự dakdh';
    //     $iparr = explode("-", $str); 
    //     echo  $iparr[0].'<br>';
    //     echo $iparr[1];
       
    // }
    public function getAdd(){
        $theloai = TheLoai::all();
    	return view('admin.sach.add', ['theloai' => $theloai]);
    }

    public function postAdd(Request $request){
        $validatedData = Validator::make($request->all(), [ 
            'Ten' => 'required|unique:sach,Ten|min:3|max:100',
            'theloai' => 'required',
        ],
        [
        	'Ten.required' => 'Bạn phải nhập Tên Sách',
            'Ten.unique' => 'Tên sách đã trùng',
        	'Ten.min' => 'Tên tối thiểu phải là 3 ký tự',
        	'Ten.max' => 'Tên tối thiểu phải có từ 3 đến 100 ký tự',
            'theloai.required' => 'Bạn phải chọn thể loại',
        ]);
        if ($validatedData->fails()) {
            return redirect('admin/sach/add')
                        ->withErrors($validatedData)
                        ->withInput();
        }
        else {
            $sach = new Sach;
            $sach->Ten = $request->Ten;
            $sach->TenKhongDau = str_slug($request->Ten,'-');
            $str = $request->theloai;
            $iparr = explode("-", $str); 
            $sach->id_theloai = $iparr[0];
            $sach->TenTheLoai = $iparr[1];
            $sach->save();
            return redirect('admin/sach/add')->with('thongbao','Thêm Thành Công');
        }
	
    }

    public function getEdit($id){
        $theloai = TheLoai::all();
        $sach = Sach::find($id);
    	return view('admin.sach.edit',['sach' => $sach, 'theloai' => $theloai]);
    }

    public function postEdit(Request $request, $id){
        $sach = Sach::find($id);
        $validatedData = Validator::make($request->all(), [ 
            'Ten' => 'required|min:3|max:100',
            'theloai'=> 'required',
        ],
        [
            'Ten.required' => 'Bạn phải nhập Tên Thể Loại',
            'Ten.min' => 'Tên tối thiểu phải là 3 ký tự',
            'Ten.max' => 'Tên tối thiểu phải có từ 3 đến 100 ký tự',
            'theloai.required' => 'Bạn chưa chọn tên thể loại',
            'theloai.unique' => 'Tên thể loại đã trùng',
        ]);
        if ($validatedData->fails()) {
            return redirect('admin/sach/edit/'.$id)
                    ->withErrors($validatedData)
                    ->withInput();
        }
        else {
             $sach->Ten = $request->Ten;
            $sach->TenKhongDau = str_slug($request->Ten,'-');
            $str = $request->theloai;
            $iparr = explode("-", $str); 
            $sach->id_theloai = $iparr[0];
            $sach->TenTheLoai = $iparr[1];
            $sach->save();
            return redirect('admin/sach/edit/'.$id)->with('thongbao','Sửa Thành Công');
        }
    }   

   	public function getList(){
        $sach = Sach::select('sach.id','sach.Ten as Tens','sach.TenKhongDau','the_loai.Ten as TenTl')->join('the_loai', 'sach.id_theloai', '=', 'the_loai.id')->paginate(5);
    	return view('admin.sach.list', ['sach' => $sach]);
    }

    public function getDelete($id){
        $sach = Sach::find($id);
        $sach->delete();
        return redirect('admin/sach/list')->with('thongbao','Xóa Thành Công');
    }

    public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $sach2 = Sach::select('sach.Ten as TenSach','sach.TenKhongDau as TenKhongDauSach','the_loai.Ten as TenTL')->leftJoin('the_loai', 'sach.id_theloai', '=', 'the_loai.id')->where('sach.Ten' ,'like' ,"%$tukhoa%")->orWhere('sach.TenKhongDau' ,'like' ,"%$tukhoa%")->orwhere('the_loai.Ten' ,'like' ,"%$tukhoa%")->paginate(5);
        return view('admin.layouts.search',['sach' => $sach2 , 'tukhoa' => $tukhoa]);
    }

}
