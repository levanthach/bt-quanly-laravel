<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TheLoai;
use Validator;
class TheLoaiController extends Controller
{

    public function getAdd(){
    	return view('admin.theloai.add');
    }

    public function postAdd(Request $request){
        $validatedData = Validator::make($request->all(), [ 
            'Ten' => 'required|unique:the_loai,Ten|min:3|max:100',
        ],
        [
        	'Ten.required' => 'Bạn phải nhập Tên Thể Loại',
            'Ten.unique' => 'Tên thể loại đã trùng',
        	'Ten.min' => 'Tên tối thiểu phải là 3 ký tự',
        	'Ten.max' => 'Tên tối thiểu phải có từ 3 đến 100 ký tự',
        ]);
        if ($validatedData->fails()) {
            return redirect('admin/theloai/add')
                    ->withErrors($validatedData)
                    ->withInput();
        }
        else {
    		$theloai = new TheLoai;
        	$theloai->Ten = $request->Ten;
        	$theloai->TenKhongDau = str_slug($request->Ten,'-');
        	$theloai->save();
        	return redirect('admin/theloai/add')->with('thongbao','Thêm Thành Công');
        }
    }

    public function getEdit($id){
        $theloai = TheLoai::find($id);
    	return view('admin.theloai.edit',['theloai' => $theloai]);
    }

    public function postEdit(Request $request, $id){
        $theloai = TheLoai::find($id);
        $validatedData = Validator::make($request->all(), [ 
        // $validatedData = $request->validate([
            'Ten' => 'required|unique:the_loai,Ten|min:3|max:100',
        ],
        [
            'Ten.required' => 'Bạn phải nhập Tên Thể Loại',
            'Ten.unique' => 'Tên thể loại đã trùng',
            'Ten.min' => 'Tên tối thiểu phải là 3 ký tự',
            'Ten.max' => 'Tên tối thiểu phải có từ 3 đến 100 ký tự',
        ]);
        if ($validatedData->fails()) {
            return redirect('admin/theloai/add')
                    ->withErrors($validatedData)
                    ->withInput();
        }
        else {
            $theloai->Ten = $request->Ten;
            $theloai->TenKhongDau = str_slug($request->Ten,'-');
            $theloai->save();
            return redirect('admin/theloai/edit/'.$id)->with('thongbao','Sửa Thành Công');
        }
    }   

   	public function getList(){
   		$theloai = TheLoai::paginate(5);
    	return view('admin.theloai.list', ['the_loai' => $theloai]);
    }

    public function getDelete($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/list')->with('thongbao','Xóa Thành Công');
    }

}
