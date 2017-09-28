@extends('templates.public.master')
@section('main-content')
<section id="content">
  <div class="container">
    <div class="main-content">
      
      <div class="outerwide">
        <ul class="block2">
          @foreach($arNews as $item)
          <?php 
            $id = $item->id_news;
            $name1 = $item->name;
            $preview = $item->preview;
            $picture = $item->picture;
           $d = getdate(strtotime($item->created_at));
           $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
            $slug = str_slug($name1);
            $i = 0;

          ?>
          @if($i % 2 == 0)
          <li>
            <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="MyPassion" class="alignleft" /></a>
            <p>
            <span>{{ $create }}.</span>
              <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}">{{ $name1 }}.</a>
            </p>
            <span class="rating"><span style="width:100%;"></span></span>
          </li>
          @else
          <li class="m-r-no">
            <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="MyPassion" class="alignleft" /></a>
            <p>
            <span>{{ $create }}.</span>
              <a href="{{ route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]) }}">{{ $name1 }}.</a>
            </p>
            <span class="rating"><span style="width:100%;"></span></span>
          </li>
          @endif
          <?php 
            $i++;
          ?>
          @endforeach
        </ul>
      </div>

    </div>
    <!-- /Popular News -->

  </div>
  <!-- /Main Content -->

  <!-- Left Sidebar -->
  <div class="column-one-third">
    <div class="sidebar">
      <h5 class="line"><span>Stay Connected.</span></h5>
      <ul class="social">
        <li>
          <a href="#" class="facebook"><i class="icon-facebook"></i></a>
          <span>6,800 <br/> <i>fans</i></span>
        </li>
        <li>
          <a href="#" class="twitter"><i class="icon-twitter"></i></a>
          <span>12,475 <br/> <i>followers</i></span>
        </li>
        <li>
          <a href="#" class="rss"><i class="icon-rss"></i></a>
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
        <li><a href="#"><img src="{{ $publicUrl }}/img/banner/3.png" alt="MyPassion" /></a></li>
        <li><a href="#"><img src="{{ $publicUrl }}/img/banner/1.png" alt="MyPassion" /></a></li>
        <li><a href="#"><img src="{{ $publicUrl }}/img/banner/2.png" alt="MyPassion" /></a></li>
        <li><a href="#"><img src="{{ $publicUrl }}/img/banner/4.png" alt="MyPassion" /></a></li>
      </ul>
    </div>

    <div class="sidebar">
      <div id="tabs">
        <ul>
          <li><a href="#tabs1">Recent.</a></li>
          <li><a href="#tabs2">Popular.</a></li>
          <li><a href="#tabs3">Comments.</a></li>
        </ul>
        <div id="tabs1">
          <ul>
            <li>
              <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
              <span class="meta">26 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
              <span class="meta">26 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
              <span class="meta">26 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
              <span class="meta">26 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
          </ul>
        </div>
        <div id="tabs2">
          <ul>
            <li>
              <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
              <span class="meta">27 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
              <span class="meta">27 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
              <span class="meta">27 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
            <li>
              <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
              <span class="meta">27 May, 2013.   \\   <a href="#">World News.</a>   \\   <a href="#">No Coments.</a></span>
              <span class="rating"><span style="width:70%;"></span></span>
            </li>
          </ul>
        </div>
        <div id="tabs3">
          <ul>
            <li>
              <a href="#" class="title"><strong>Someone:</strong> eleifend est et turpis. Duis id erat.Mauris eleifend est et turpis. Duis id erat.</a>
            </li>
            <li>
              <a href="#" class="title"><strong>Someone:</strong> eleifend est et turpis. Duis id erat.Mauris eleifend est et turpis. Duis id erat.</a>
            </li>
            <li>
              <a href="#" class="title"><strong>Someone:</strong> eleifend est et turpis. Duis id erat.Mauris eleifend est et turpis. Duis id erat.</a>
            </li>
            <li>
              <a href="#" class="title"><strong>Someone:</strong> eleifend est et turpis. Duis id erat.Mauris eleifend est et turpis. Duis id erat.</a>
            </li>
            <li>
              <a href="#" class="title"><strong>Someone:</strong> eleifend est et turpis. Duis id erat.Mauris eleifend est et turpis. Duis id erat.</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    
  <!-- /Left Sidebar -->

</div>    
</section>
<!-- / Content -->

@stop