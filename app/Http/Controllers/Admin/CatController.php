<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CatRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Cat;
use App\CatChild;
use App\News;

class CatController extends Controller
{
    public function index(){
    	$arItems = Cat::all();
    	return view('admin.cat.index',['arItems' => $arItems]);
    }

    public function create(){
    	return view('admin.cat.create');
    }
    public function store(CatRequest $request){
        $arCats = Cat::all();
       foreach($arCats as $arCats){
          if($arCats->name == $request->name){
            $request->session()->flash('msg','Tên danh mục đã có');
            return redirect()->route('admin.cat.index');
          }
       }
    	$arItem = array(
    		'name' => trim($request->name),
    	);
    	if(Cat::insert($arItem)){
    		$request->session()->flash('msg','Thêm thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Có lỗi khi thêm');
    		return redirect()->route('admin.cat.index');
    	}
    }
    public function destroy($id, Request $request){
    	$arItem = Cat::find($id);
        $arNews = News::where('id_cat', '=' , $id)->get();
        $arChild = CatChild::where('id_cat', '=' , $id)->get();
        foreach($arNews as $arNew){
            $picture = $arNew->picture;
            if($picture != ''){
                Storage::delete('files/' . $picture);
            }
            $arNew->delete();
        }
        foreach($arChild as $arChild){
            $arChild->delete();
        }
    	if($arItem->delete()){
    		$request->session()->flash('msg','Xóa thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Có lỗi khi xóa');
    		return redirect()->route('admin.cat.index');
    	}
    }
    public function edit($id){
    	$arItem = Cat::find($id);
    	return view('admin.cat.edit',['arItem' =>$arItem]);
    }
    public function update($id,CatRequest $request){
    	$name = $request->name;
    	$arItem = Cat::find($id);
    	$arItem->name = $name;
    	if($arItem->update()){
    		$request->session()->flash('msg','Sửa thành công');
    		return redirect()->route('admin.cat.index');
    	}else{
    		$request->session()->flash('msg','Có lỗi khi sửa');
    		return redirect()->route('admin.cat.index');
    	}
    }
}
