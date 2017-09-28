<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\CatChild;
use App\News;
use Illuminate\Support\Facades\Auth;
use App\Library\simple_html_dom_node;
use App\Library\simple_html_dom;
use App\Library\Simple_html_func;

class DanTriController extends Controller
{
    public function index(){
    	$arCats = Cat::orderBy('id_cat','DESC')->get();
    	$arCatChilds = CatChild::all();
    	return view('admin.dantri.index',['arCats'=>$arCats,'arCatChilds'=>$arCatChilds]);
    }
    public function change(Request $request){
		if($request->ajax()){
			$id = $request->id;
			$arCatChilds = CatChild::where('id_cat','=',$id)->get();
			$tmp = null;
			foreach($arCatChilds as $item){
				$tmp .= '<option value="'.$item['id'].'">'.$item['name'].'</option>';
			}
			echo $tmp;
		}
	}
	public function getnews(Request $request){
		$id_catchild = $request->id_catchild;
		$id_cat = $request->id_cat;
		$status = $request->status;
		$arUser = Auth::user();
		//lấy tin
		$obj = new Simple_html_func();
		$linkname = $request->linkname;
		$html = $obj->file_get_html($linkname);
		foreach($html->find('link') as $element) {
      		// echo $element->plaintext . '<br>';
      		$html = $obj->file_get_html($element->plaintext);
      		$title = 'h1';
      		$preview = 'h3';
      		$detail = 'div.fck_detail';
      		foreach($html->find($title) as $element)
			{	
				echo $item['title'] = $element->innertext;//lấy title
			}
			$item['preview'] = '';
			foreach($html->find($preview) as $element)
			{	
				$item['preview'] = $element->innertext; // Lấy toàn bộ phần html
			}
			foreach($html->find($detail) as $element)
			{	
				$item['detail'] = $element->innertext; // Lấy toàn bộ phần html
			}
			// foreach($html->find('img') as $element){
   //     			echo $element->src . '<br>';	
			// }
			$arItem = array(
				'name' => $item['title'],
				'preview' => $item['preview'],
				'detail' => $item['detail'],
				'id_cat' => $id_cat,
				'id_catchild' => $id_catchild,
				'active' => $status,
				'id_user' => $arUser->id,
				'read' => 0
			);
			if(News::insert($arItem)){
	    		$request->session()->flash('msg','Thêm thành công');
	    	}else{
	    		$request->session()->flash('msg','Có lỗi khi thêm');
	    		return redirect()->route('admin.dantri.index');
	    	}
		}
		$request->session()->flash('msg','Bạn đã lấy tin thành công!');
		return redirect()->route('admin.dantri.index');
		
	}
}
