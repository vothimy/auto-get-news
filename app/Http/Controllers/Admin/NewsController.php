<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\News;
use App\Cat;
use App\Comment;
use Auth;

class NewsController extends Controller
{
	public function index(){
		
		$arItems = DB::table('news')
		->join('category', 'news.id_cat', '=', 'category.id_cat')
		->select('news.*', 'category.name as cname')
		->orderBy('id_news',' DESC')
		->paginate(getenv('ROW_COUNT')); 
		$arUser = Auth::user();
		$arCat = Cat::all();
		$i = 0;
		$j = 0;
		$arAll = News::all();
		$arDD = News::where('active','=','1')->get();
		foreach($arAll as $item){
			$i ++;
		}
		foreach($arDD as $item){
			$j ++;
		}
		return view('admin.news.index',['arItems'=>$arItems,'arCat'=>$arCat,'arUser'=>$arUser,'i'=>$i,'j'=>$j]);
	}
	public function create(){
		$arCat = Cat::all();
		return view('admin.news.create',['arCat'=>$arCat]);
	}
	public function store(NewsRequest $request){
		$arUser = Auth::user();
		$id_user = $arUser->id;
		if($request->picture == ''){
			$request->picture = '';
		}else{
			$path = $request->file('picture')->store('files');
			$request->picture = explode('/', $path);
			$request->picture = end($request->picture);
		}
		$arItem = array(
			'name' => trim($request->name),
			'active' => 0,
			'preview' => trim($request->preview),
			'detail' => trim($request->detail),
			'id_cat' => trim($request->id_cat),
			'picture' => $request->picture,
			'id_user' => $id_user
			);
		
		if(News::insert($arItem)){
			$request->session()->flash('msg','Thêm thành công');
			return redirect()->route('admin.news.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi thêm');
			return redirect()->route('admin.news.index');
		}
	}
	public function destroy($id, Request $request){
		$arItem = News::find($id);
		$picture = $arItem->picture;
		if($arItem->delete()){
			if($picture != ''){
				Storage::delete('files/' . $picture);
			}
			$request->session()->flash('msg','Xóa thành công');
			return redirect()->route('admin.news.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi xóa');
			return redirect()->route('admin.news.index');
		}
	}
	public function edit($id){
		$arItem = News::find($id);
		$arCat = Cat::all();
		$arComment = Comment::where('id_new','=',$id)->get();
		return view('admin.news.edit',['arItem' =>$arItem,'arCat'=>$arCat,'arComment'=>$arComment]);
	}
	public function update($id,NewsRequest $request){
		$arItem = News::find($id);
		$arItem->name = $request->name;
		$arItem->id_cat = $request->id_cat;
		$arItem->preview = $request->preview;
		$arItem->detail = $request->detail;
		$arUser = Auth::user();
		$arItem->id_user = $arUser->id;
		if($request->picture != ''){
			if($arItem->picture != ''){
				Storage::delete('files/' . $arItem->picture);
			}
			$path = $request->file('picture')->store('files');
			$request->picture = explode("/", $path);
			$arItem->picture = end($request->picture);
		}else{
			if(isset($request->xoa)){
				if($arItem->picture != ''){
					Storage::delete('files/' . $arItem->picture);
					$arItem->picture = '';
				}
			}
		}
		
		if($arItem->update()){
			$request->session()->flash('msg','Sửa thành công');
			return redirect()->route('admin.news.index');
		}else{
			$request->session()->flash('msg','Có lỗi khi sửa');
			return redirect()->route('admin.news.index');
		}
	}
	public function search(Request $request){
		$name = $request->search;
		$arNews = News::where('name','LIKE',"%$name%")
						->orwhere('created_at','LIKE',"%$name%")->get();
		$arCat = Cat::all();
		$tmp = null;
		$arUser = Auth::user();
		foreach($arNews as $item){
				$urlEdit = route('admin.news.edit',['id'=>$item->id_news]);
				$urlDel = route('admin.news.destroy',['id'=>$item->id_news]);
			$tmp .= '<tr>
			<td>
				<div onclick="changeTT('. $item->id_news .')">';
					if($item->active == 1){
						$tmp .=	 '<input type="checkbox" checked="checked">';
					}
					else{
						$tmp .= '<input type="checkbox">';
					}
					$tmp .='</div>
				</td>
				<td>'. $item->name .'</td>';
				foreach($arCat as $arcat){
					if($arcat->id_cat == $item->id_cat){
						$tmp .= '<td>'. $arcat->name .'</td>';
					}
				}
				if($item->picture != ''){
					$tmp .= '<td><img src="/storage/app/files/'.$item->picture.'"'.' style="height:60px;width:60px;"></td>';
				}else{
					$tmp .= '<td>Không có ảnh</td>';
				}
				$tmp .= '<td>'.$item->created_at.'</td>';
				if($arUser->id == $item->id_user){
					$tmp .= '<td>'. $arUser->fullname .'</td>';
				}else if($item->id_user == 0){
					$tmp .= '<td>Không có người đăng</td>';
				}
				$tmp .= '<td><a href="'.$urlEdit.'"><i class="fa fa-edit"></i> Sửa</a>
				| <a href="'. $urlDel .'" onclick="return xacNhanXoa()"><i class="fa fa-times-circle-o"></i> Xóa</a>
			</td>
		</tr>';
	}
	echo $tmp;
}
public function ajax(Request $request){
	$id = $request->aid;
	$arItem = News::find($id);
	if($arItem->active == 0){
		$arItem->active = 1;
	}else{
		$arItem->active = 0;
	}
	$arItem->update();
	return response()->json($arItem);
}
    //xóa bình luận
public function abc($id, Request $request){
	$arComment = Comment::find($id);
	$arItem = News::find($arComment->id_new);
	if($arComment->delete()){
		$request->session()->flash('msg','Xóa thành công');
		return redirect()->route('admin.news.edit',['id'=>$arItem->id_news]);
	}else{
		$request->session()->flash('msg','Có lỗi khi xóa');
		return redirect()->route('admin.news.edit',['id'=>$arItem->id_news]);
	}
}
//liệt kê
	public function lietke(){
		return view('admin.news.lietke');
	}
	public function thongke1(){
		$date = date("d");
		$month = date("m");
		$year = date("Y");
		// dd($date);
		$created_at = $year . '-' . $month . '-' . $date;
		$arNews = News::all();
		$arCat = Cat::all();
		foreach($arNews as $item){
				$urlEdit = route('admin.news.edit',['id'=>$item->id_news]);
				$urlDel = route('admin.news.destroy',['id'=>$item->id_news]);
			$tmp .= '<thead>
					<tr>
						<th>Tác vụ</th>
						<th style="width:20%">Tên tin</th>
						<th style="width:10%">Danh mục</th>
						<th>Hình ảnh</th>
						<th>Ngày đăng</th>
						<th style="width:15%">Người đăng</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody id="resultSearch">
			<tr>
			<td>
				<div onclick="changeTT('. $item->id_news .')">';
					if($item->active == 1){
						$tmp .=	 '<input type="checkbox" checked="checked">';
					}
					else{
						$tmp .= '<input type="checkbox">';
					}
					$tmp .='</div>
				</td>
				<td>'. $item->name .'</td>';
				foreach($arCat as $arcat){
					if($arcat->id_cat == $item->id_cat){
						$tmp .= '<td>'. $arcat->name .'</td>';
					}
				}
				if($item->picture != ''){
					$tmp .= '<td><img src="/storage/app/files/'.$item->picture.'"'.' style="height:60px;width:60px;"></td>';
				}else{
					$tmp .= '<td>Không có ảnh</td>';
				}
				$tmp .= '<td>'.$item->created_at.'</td>';
				if($arUser->id == $item->id_user){
					$tmp .= '<td>'. $arUser->fullname .'</td>';
				}else if($item->id_user == 0){
					$tmp .= '<td>Không có người đăng</td>';
				}
				$tmp .= '<td><a href="'.$urlEdit.'"><i class="fa fa-edit"></i> Sửa</a>
				| <a href="'. $urlDel .'" onclick="return xacNhanXoa()"><i class="fa fa-times-circle-o"></i> Xóa</a>
			</td>
		</tr>
		</tbody>';
	}
	echo $tmp;
	}
} 
