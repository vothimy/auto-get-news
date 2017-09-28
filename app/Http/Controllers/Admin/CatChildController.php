<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CatRequest;
use App\Http\Requests\CatChildRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\CatChild;
use App\Cat;
use App\News;

class CatChildController extends Controller
{
    public function index($id){
    	$arChild = CatChild::where('id_cat','=',$id)->get();
        $arCat = Cat::where('id_cat','=',$id)->get();
    	return view('admin.catchild.index',['arChild'=>$arChild,'arCat'=>$arCat]);
    }

    public function create(){
        $arCat = Cat::all();
    	return view('admin.catchild.create',['arCat'=>$arCat]);
    }
    public function store(CatChildRequest $request){
        $arCats = CatChild::all();
       foreach($arCats as $arCats){
          if($arCats->name == $request->name){
            $request->session()->flash('msg','Tên danh mục đã có');
            return redirect()->route('admin.catchild.index',['id'=>$request->id_cat]);
          }
       }
    	$arItem = array(
            'name' => trim($request->name),
    		'id_cat' => $request->id_cat,
    	);
    	if(CatChild::insert($arItem)){
    		$request->session()->flash('msg','Thêm thành công');
    		return redirect()->route('admin.catchild.index',['id'=>$request->id_cat]);
    	}else{
    		$request->session()->flash('msg','Có lỗi khi thêm');
    		return redirect()->route('admin.catchild.index',['id'=>$arItem->id_cat]);
    	}
    }
    public function destroy($id, Request $request){
    	$arItem = CatChild::find($id);
        $arNews = News::where('id_catchild', '=' , $id)->get();
        foreach($arNews as $arNew){
            $picture = $arNew->picture;
            if($picture != ''){
                Storage::delete('files/' . $picture);
            }
            $arNew->delete();
        }
        
    	if($arItem->delete()){
    		$request->session()->flash('msg','Xóa thành công');
    		return redirect()->route('admin.catchild.index',['id'=>$arItem->id_cat]);
    	}else{
    		$request->session()->flash('msg','Có lỗi khi xóa');
    		return redirect()->route('admin.catchild.index',['id'=>$arItem->id_cat]);
    	}
    }
    public function edit($id){
    	$arItem = CatChild::find($id);
    	return view('admin.catchild.edit',['arItem' =>$arItem]);
    }
    public function update($id,CatChildRequest $request){
    	$name = $request->name;
    	$arItem = CatChild::find($id);
    	$arItem->name = $name;
    	if($arItem->update()){
    		$request->session()->flash('msg','Sửa thành công');
    		return redirect()->route('admin.catchild.index',['id'=>$arItem->id_cat]);
    	}else{
    		$request->session()->flash('msg','Có lỗi khi sửa');
    		return redirect()->route('admin.catchild.index',['id'=>$arItem->id_cat]);
    	}
    }
}
