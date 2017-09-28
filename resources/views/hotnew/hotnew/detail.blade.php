@extends('templates.public.master')
@section('main-content')
<section id="content">
  <div class="container">
   <div class="main-content">
    <div class="column-two-third single">
     <div class="flexslider">
       <?php 
       $name = $arDetail->name;
       $picture = $arDetail->picture;
       $read = $arDetail->read;
       $d = getdate(strtotime($arDetail->created_at));
        $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
       $detail = $arDetail->detail;
       ?>
       <ul class="slides">
        <li>
          <img src="{{ $adminfiles }}/{{ $picture }}" alt="MyPassion" />
        </li>
      </ul>
    </div>

    <h6 class="title">{{ $name }}.</h6>
    <span class="meta">{{ $create }}   |   <a href="">Lượt đọc: {{ $read }}</a>   |   <a href="">Bình luận: {{ $j }}.</a></span>
    <p>{!! $detail !!} </p>
   <!--  <ul class="sharebox">
      <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </ul> -->

    <div class="relatednews">
      <h5 class="line"><span>Tin tức liên quan.</span></h5>
      <ul>
        @foreach($arRelated as $item)
        <?php 
        $picture = $item->picture;
        $id = $item->id_news;
        $slug = str_slug($item->name);
        $d = getdate(strtotime($item->created_at));
        $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
        ?>
        <li>
          <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $item->name }}" /></a>
          <p>
            <span>{{ $create }}.</span>
            <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}">{{ $item->name }}.</a>
          </p>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="comments">
      <h5 class="line"><span>Bình luận.</span></h5>
      <ul id="id_catchild1">
        @if($i == 0)
        <p>Không có bình luận nào!</p>
        @endif
        @foreach($arComment as $item)
        <?php 
        $name = $item->name;
        $content = $item->content;
       $d = getdate(strtotime($item->created_at));
        $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
        ?>
        <li >
          <div>
            <div class="comment-avatar"><img src="{{ $publicUrl }}/img/avatar.png" alt="MyPassion" /></div>
            <div class="commment-text-wrap">
              <div class="comment-data">
                <p><a href="" class="url">{{ $name }}</a> <br /> <span>{{ $create }}</span></p>
              </div>
              <div class="comment-text">{{ $content }}.</div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="comment-form">
      <h5 class="line"><span>Gửi bình luận.</span></h5>
      @if(Session::has('msg'))
      <p class="category success">{{ Session::get('msg') }}</p>
      @endif
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
      <form >
        <div class="form">
          <label>Name*</label>
          <div class="input">
            <input type="text" name="name" id="name" required />
          </div>
        </div>
        <div class="form">
          <label>Email*</label>
          <div class="input">
            <input type="text" name="email" id="email" required />
          </div>
        </div>

        <div class="form">
          <label>Comment*</label>
          <textarea rows="10" name="content" id="content1" cols="150" required></textarea>
        </div>
        <div class="form">
          <a href="javascript:void(0)" name="clickme" id="clickme" onclick="load_ajax({{$arDetail->id_news}})" value="Click Me" >Gửi</a>
        </div>
      </form>
    </div>

  </div>
  <!-- /Single -->

</div>
<!-- /Main Content -->

<!-- Left Sidebar -->
<div class="column-one-third">
  <div class="sidebar">
   <h5 class="line"><span>Stay Connected.</span></h5>
   <ul class="social">
     <li>
       <a href="" class="facebook"><i class="icon-facebook"></i></a>
       <span>6,800 <br/> <i>fans</i></span>
     </li>
     <li>
       <a href="" class="twitter"><i class="icon-twitter"></i></a>
       <span>12,475 <br/> <i>followers</i></span>
     </li>
     <li>
       <a href="" class="rss"><i class="icon-rss"></i></a>
       <span><i>Subscribe via rss</i></span>
     </li>
   </ul>
 </div>

 <div class="sidebar">
   <h5 class="line"><span>Vimeo Video.</span></h5>
 <iframe src="http://player.vimeo.com/video/65110834?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="300px" height="170px" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
 </div>

 <div class="sidebar">
   <h5 class="line"><span>Ads Spot.</span></h5>
   <ul class="ads125">
     <li><a href=""><img src="{{ $publicUrl }}/img/banner/3.png" alt="MyPassion" /></a></li>
     <li><a href=""><img src="{{ $publicUrl }}/img/banner/1.png" alt="MyPassion" /></a></li>
     <li><a href=""><img src="{{ $publicUrl }}/img/banner/2.png" alt="MyPassion" /></a></li>
     <li><a href=""><img src="{{ $publicUrl }}/img/banner/4.png" alt="MyPassion" /></a></li>
   </ul>
 </div>

 <div class="sidebar">

 </div>
</div>

</div>    
</section>
<!-- / Content -->

@stop