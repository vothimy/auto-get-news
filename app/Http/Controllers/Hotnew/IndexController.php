<?php

namespace App\Http\Controllers\Hotnew;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class IndexController extends Controller
{
  public function index(){
    	//tin mới
   $arTinMoi = News::where('active','=','1')->orderBy('id_news','DESC')->limit(6)->get();
    	//tin hot left
   $arTinhot1 = News::where('active','=','1')->orderBy('read','DESC')->limit(1)->get();
    	//tin hot right
   $arTinhot2 = News::where('active','=','1')->orderBy('read','DESC')->offset(2)->limit(2)->get();
    	//tin thế giới
   $arItems1 = News::
   where([
    ['id_cat', '=', 3],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(4)->get();
   $arItems2 = News::
   where([
    ['id_cat', '=', 4],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(4)->get();
   $arItems31 = News::where([
    ['id_cat', '=', 5],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(1)->get();
   $arItems33 = News::where([
    ['id_cat', '=', 5],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->offset(1)->limit(8)->get();
   $arItems21 = News::where([
    ['id_cat', '=', 2],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(3)->get();
   $arItems23 = News::where([
    ['id_cat', '=', 2],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->offset(3)->limit(4)->get();
   $arItems61 = News::where([
    ['id_cat', '=', 6],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(1)->get();
   $arItems63 = News::where([
    ['id_cat', '=', 6],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->offset(1)->limit(2)->get();
   $arItems91 = News::where([
    ['id_cat', '=', 9],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(1)->get();
   $arItems93 = News::where([
    ['id_cat', '=', 9],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->offset(1)->limit(2)->get();
   $arItems41 = News::where([
    ['id_cat', '=', 4],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->limit(1)->get();
   $arItems43 = News::where([
    ['id_cat', '=', 4],
    ['active', '=', '1']
    ])->orderBy('id_news','DESC')->offset(1)->limit(2)->get();
   $arItems = News::where('active','=','1')->orderBy('id_news','DESC')->paginate(getenv('ROW_COUNT'));
   return view('hotnew.index.index',['arItems'=>$arItems,'arTinMoi'=>$arTinMoi,'arTinhot1'=>$arTinhot1,'arTinhot2'=>$arTinhot2,'arItems1'=>$arItems1,'arItems2'=>$arItems2,'arItems31'=>$arItems31,'arItems33'=>$arItems33,'arItems21'=>$arItems21,'arItems23'=>$arItems23,'arItems61'=>$arItems61,'arItems63'=>$arItems63,'arItems41'=>$arItems41,'arItems43'=>$arItems43,'arItems91'=>$arItems91,'arItems93'=>$arItems93]);
 }
}
