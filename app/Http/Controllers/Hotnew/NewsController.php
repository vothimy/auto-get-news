<?php

namespace App\Http\Controllers\Hotnew;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\News;
use App\Cat;
use App\CatChild;
use App\Comment;


class NewsController extends Controller
{
  public function cat($slug,$id){

    $arItems1 = News::
    where([
      ['id_cat', '=', $id],
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->limit(1)->get();
    $j = 0;
    if(isset($arItems1[0])){
      $numberCmt1 = Comment::where('id_new','=',$arItems1[0]->id_news)->get();
      foreach ($numberCmt1 as $item) {
        $j++;
      }
    }

    $arItems2 = News::
    where([
      ['id_cat', '=', $id],
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->offset(1)->limit(1)->get();
    $i = 0;
    if(isset($arItems2[0])){
      $numberCmt2 = Comment::where('id_new','=',$arItems2[0]->id_news)->get();
      foreach ($numberCmt2 as $item) {
        $i++;
      }
    }
    $arItems3 = News::
    where([
      ['id_cat', '=', $id],
      ['active', '=', '1'],
      ['id_news', '<>', $arItems1[0]->id_news],
      ['id_news', '<>', $arItems2[0]->id_news]
      ])->orderBy('id_news','DESC')->paginate(4);
    $arTitle = Cat::find($id);
    $title = $arTitle->name;
    return view('hotnew.hotnew.cat',['arItems1'=>$arItems1,'arItems2'=>$arItems2,'arItems3'=>$arItems3,'i'=>$i,'j'=>$j,'title'=>$title]);
  }
  public function catchild($slug,$id){
    $arItems1 = News::
    where([
      ['id_catchild', '=', $id],
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->limit(1)->get();
    $j = 0;
    if(isset($arItems1[0])){
      $numberCmt1 = Comment::where('id_new','=',$arItems1[0]->id_news)->get();
      foreach ($numberCmt1 as $item) {
        $j++;
      }
    }

    $arItems2 = News::
    where([
      ['id_catchild', '=', $id],
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->offset(1)->limit(1)->get();
     $i = 0;
    if(isset($arItems2[0])){
      $numberCmt2 = Comment::where('id_new','=',$arItems2[0]->id_news)->get();
      foreach ($numberCmt2 as $item) {
        $i++;
      }
    }
    $arItems3 = News::where([
      ['id_catchild', '=', $id],
      ['active', '=', '1'],
      ['id_news', '<>', $arItems1[0]->id_news],
      ['id_news', '<>', $arItems2[0]->id_news]
      ])->orderBy('id_news','DESC')->paginate(4);
    $arTitle = CatChild::find($id);
    $title = $arTitle->name;
    return view('hotnew.hotnew.cat',['arItems1'=>$arItems1,'arItems2'=>$arItems2,'arItems3'=>$arItems3,'title'=>$title,'i'=>$i,'j'=>$j]);
  }
  public function detail($slug,$id){
    $arDetail = News::find($id);
    $numberCmt = Comment::where('id_new','=',$id)->get();
    $j = 0;
    foreach ($numberCmt as $item) {
      $j++;
    }
    $arDetail->read = $arDetail->read+1;
    if($arDetail->update()){
    }
    $id_cat = $arDetail->id_cat;
    $arRelated = News::where([
      ['id_news', '<>', $id],
      ['id_cat', '=', $id_cat],
      ['active', '=', '1']
      ])->limit(4)->get();
    $arComment = Comment::where('id_new','=',$id)->orderBy('id','DESC')->get();
    $i = 0;
    foreach ($arComment as $item) {
      $i++;
    }
    $arTitle = News::find($id);
    $title = $arTitle->name;
    return view('hotnew.hotnew.detail',['arDetail'=>$arDetail,'arRelated'=>$arRelated,'arComment'=>$arComment,'i'=>$i,'j'=>$j,'title'=>$title]);
  }
  public function tinmoi(){
    $arItems1 = News::
    where([
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->offset(0)->limit(1)->get();
    $j = 0;
    if(isset($arItems2[0])){
      $numberCmt1 = Comment::where('id_new','=',$arItems1[0]->id_news)->get();
      foreach ($numberCmt1 as $item) {
        $j++;
      }
    }
    $arItems2 = News::
    where([
      ['active', '=', '1']
      ])->orderBy('id_news','DESC')->offset(1)->limit(1)->get();
    $i = 0;
    if(isset($arItems2[0])){
      $numberCmt2 = Comment::where('id_new','=',$arItems2[0]->id_news)->get();
      foreach ($numberCmt2 as $item) {
        $i++;
      }
    }
    $arItems3 = News::
    where([
      ['active', '=', '1'],
      ['id_news', '<>', $arItems1[0]->id_news],
      ['id_news', '<>', $arItems2[0]->id_news]
      ])->orderBy('id_news','DESC')->paginate(4);
    $title = 'Tin mới';
    return view('hotnew.hotnew.cat',['arItems1'=>$arItems1,'arItems2'=>$arItems2,'arItems3'=>$arItems3,'i'=>$i,'j'=>$j,'title'=>$title]);
  }
  public function comment(Request $request){

   if($request->ajax()){
    $id = $request->id;
    $name = $request->name;
    $email = $request->email;
    $content = $request->content;
    $arComment = array(
      'name' => $name,
      'email' => $email,
      'content' => $content,
      'id_new' => $id
      );
    if(Comment::insert($arComment)){
    }
    $arComments = Comment::where('id_new','=',$id)->orderBy('id','DESC')->get();
    $tmp = null;
    foreach($arComments as $item){
      $tmp .= '<li>
      <div>
        <div class="comment-avatar"><img src="/resources/assets/templates/public/img/avatar.png" alt="MyPassion" /></div>
        <div class="commment-text-wrap">
          <div class="comment-data">
            <p><a href="" class="url">'. $item->name .'</a> <br /> <span>'.$item->created_at .'</span></p>
          </div>
          <div class="comment-text">'. $item->content . '.</div>
        </div>
      </div>
    </li>';
  }
  echo $tmp;
}
}
public function read(){

  $arItems1 = News::
  where([
    ['active', '=', '1']
    ])->orderBy('read','DESC')->limit(1)->get();
  $j = 0;
  if(isset($arItems2[0])){
    $numberCmt1 = Comment::where('id_new','=',$arItems1[0]->id_news)->get();
    foreach ($numberCmt1 as $item) {
      $j++;
    }
  }
  $arItems2 = News::
  where([
    ['active', '=', '1']
    ])->orderBy('read','DESC')->offset(1)->limit(1)->get();
  $i = 0;
  if(isset($arItems2[0])){
    $numberCmt2 = Comment::where('id_new','=',$arItems2[0]->id_news)->get();
    
    foreach ($numberCmt2 as $item) {
      $i++;
    }
  }
  $arItems3 = News::
  where([
    ['active', '=', '1'],
    ['id_news', '<>', $arItems1[0]->id_news],
    ['id_news', '<>', $arItems2[0]->id_news]    
    ])->orderBy('read','DESC')->paginate(4);
  $title = 'Tin đọc nhiều nhất';
  return view('hotnew.hotnew.cat',['arItems1'=>$arItems1,'arItems2'=>$arItems2,'arItems3'=>$arItems3,'i'=>$i,'j'=>$j,'title'=>$title]);
}
public function search(Request $request){
  $search = $request->namesearch;
  $arNews = News::where([
    ['active', '=', '1'],
    ['name', 'LIKE', "%$search%"]
    ])->orwhere([
    ['active', '=', '1'],
    ['preview', 'LIKE', "%$search%"]
    ])->orderBy('read','DESC')->paginate(20);
    $title = 'Kết quả tìm kiếm';
    return view('hotnew.hotnew.search',['arNews'=>$arNews,'title'=>$title]);
  }
}