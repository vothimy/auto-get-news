<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(){
    	$arItems = User::all();
    	return view('admin.user.index',['arItems'=>$arItems]);
    }
    public function edit($id){
    	$arItem = User::where('id','=',$id)->get();
    	return view('admin.user.edit',['arItem'=>$arItem]);
    }
   	public function update($id,Request $request){
		$arItem = User::find($id);
		// $arUser = Auth::user();
		// if($arItem->username != $arUser->username && $arUser->username != 'admin'){
		// 	$request->session()->flash('msg','Bạn không thể sửa thông tin của người khác');
		// 	return redirect()->route('admin.user.index');
		// }
		$password = $request->password;
		$fullname = $request->fullname;
		$arItem->fullname = $fullname;
		if($password != ''){
			$password = bcrypt(trim($request->password));
			$arItem->password = $password;
		}
		if($arItem->update()){
			$request->session()->flash('msg','Sửa thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi sửa');
			return redirect()->route('admin.user.index');
		}
	}
	public function destroy($id, Request $request){
		$arItem = User::find($id);
		if($arItem->id == 1){
			$request->session()->flash('msg','Bạn không thể xóa admin');
			return redirect()->route('admin.user.index');
		}
		if($arItem->delete()){
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi xóa');
			return redirect()->route('admin.user.index');
		}
		
	}
	public function create(){
		return view('admin.user.create');
	}
	public function store(Request $request){
		$arItem = array(
			'username' => trim($request->username),
			'password' => bcrypt(trim($request->password)),
			'fullname' => $request->fullname,
			'role' => 2
			);
		if(User::insert($arItem)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.user.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi thêm');
			return redirect()->route('admin.user.index');
		}
	}
}
