@extends('templates.public.master')
@section('main-content')
<section id="slider">
    <div class="container">
        <div class="main-slider">
         <div class="badg">
             <p><a href="{{ route('public.hotnew.tinmoi') }}">Tin mới.</a></p>
         </div>
         <div class="flexslider">
            <ul class="slides">
                @foreach($arTinMoi as $item)               
                <?php 
                $id = $item->id_news;
                $name = $item->name;
                $picture = $item->picture;
                $preview = $item->preview;
                $slug = str_slug($name);
                $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
                ?>
                <li>
                    <img src="{{ $adminfiles }}/{{ $picture }}" alt="MyPassion" style="width:540px;height:370px;" />
                    <p class="flex-caption"><a href="{{ $urlDt }}">{{ $name }}.</a> {{ $preview }}. </p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="slider2">
     <div class="badg">
         <p><a href="{{ route('public.hotnew.read') }}">Tin đọc nhiều nhất.</a></p>
     </div>
     @foreach($arTinhot1 as $item)
     <?php 
     $id = $item->id_news;
     $name = $item->name;
     $picture = $item->picture;
     $preview = $item->preview;
     $slug = str_slug($name);
     $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
     ?>
     <a href="#"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" style="width:380px;height:216px;" /></a>
     <p class="caption"><a href="">{{ $name }}.</a> {!! $preview !!}. </p>
     @endforeach
 </div>
 @foreach($arTinhot2 as $item)
 <?php 
 $id = $item->id_news;
 $name = $item->name;
 $preview = $item->preview;
 $picture = $item->picture;
 $slug = str_slug($name);
 $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
 ?>
 <div class="slider3">
     <a<a href="#"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" style="width:200px;height:136px;" /></a>
     <p class="caption"><a href="{{ $urlDt }}">{{ $name }} </a></p>
 </div>
 @endforeach
</div>    
</section>

<!-- Content -->
<section id="content">
    <div class="container">
     <!-- Main Content -->
     <div class="main-content">

        <!-- Popular News -->
        <div class="column-one-third">
         <h5 class="line"><span>Tin thế giới.</span></h5>
         <div class="outertight">
             <ul class="block">
                 @foreach($arItems1 as $item)
                 <?php 
                 $id = $item->id_news;
                 $name = $item->name;
                 $preview = $item->preview;
                 $picture = $item->picture;
                 $slug = str_slug($name);
                $d = getdate(strtotime($item->created_at));
            $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
                 $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
                 ?>
                 <li>
                    <a href="{{ $urlDt }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" class="alignleft" style="width:150px;height:120px;" /></a>
                    <p>
                        <span>{{ $create }}.</span>
                        <a href="{{ $urlDt }}">{{ $name }}.</a>
                    </p>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
    <!-- /Popular News -->

    <!-- Hot News -->
    <div class="column-one-third">
     <h5 class="line"><span>Tin kinh tế.</span></h5>
     <div class="outertight m-r-no">
         <ul class="block">
         @foreach($arItems2 as $item)
             <?php 
             $id = $item->id_news;
             $name = $item->name;
             $preview = $item->preview;
             $picture = $item->picture;
             $slug = str_slug($name);
             $d = getdate(strtotime($item->created_at));
            $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
             $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
             ?>
             <li>
                <a href="{{ $urlDt }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" class="alignleft" style="width:150px;height:120px;" /></a>
                <p>
                    <span>{{ $create }}.</span>
                    <a href="{{ $urlDt }}">{{ $name }}.</a>
                </p>
            </li>
            @endforeach
        </ul>
    </div>

</div>
<!-- /Hot News -->

<!-- Life Style -->
<div class="column-two-third">
 <h5 class="line">
     <span>Tin đời sống.</span>
     <div class="navbar">
        <a id="next1" class="next" href="#"><span></span></a>	
        <a id="prev1" class="prev" href="#"><span></span></a>
    </div>
</h5>


 @foreach($arItems31 as $item)
 <?php 
 $id = $item->id_news;
 $name1 = $item->name;
 $preview = $item->preview;
 $read = $item->read;
 $picture1 = $item->picture;
 $slug = str_slug($name1);
 $d = getdate(strtotime($item->created_at));
 $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
 $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
?>
@endforeach
<div class="outertight">
 <img src="{{ $adminfiles }}/{{ $picture1}}" alt="{{ $name1 }}" style="width:280px;height:180px;" />
 <h6 class="regular"><a href="{{ $urlDt }}">{{ $name1 }}.</a></h6>
    <span class="meta">{{ $create }}.   |   <a href="">Lượt đọc: {{ $read }}.</a> </span>
    <p>{!! $preview !!}...</p>
    </div>

    <div class="outertight m-r-no">
     <ul class="block" id="carousel">
        @foreach($arItems33 as $item)
         <?php 
             $id = $item->id_news;
             $name = $item->name;
             $preview = $item->preview;
             $picture = $item->picture;
             $slug = str_slug($name);
             $d = getdate(strtotime($item->created_at));
            $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];

             $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
        ?>
        <li>
            <a href="{{ $urlDt }}"><img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" class="alignleft" /></a>
            <p>
                <span>{{ $create }}.</span>
                <a href="{{ $urlDt }}">{{ $name }}.</a>
            </p>
        </li>
        @endforeach
    </ul>
</div>
</div>
<!-- /Life Style -->

<!-- World News -->
<div class="column-two-third">
 <h5 class="line">
     <span>Tin pháp luật.</span>
     <div class="navbar">
        <a id="next2" class="next" href="#"><span></span></a>	
        <a id="prev2" class="prev" href="#"><span></span></a>
    </div>
</h5>

<div class="outerwide" >
 <ul class="wnews" id="carousel2">
     @foreach($arItems21 as $item)
         <?php 
             $id = $item->id_news;
             $name = $item->name;
             $read = $item->read;
             $preview = $item->preview;
             $picture = $item->picture;
             $slug = str_slug($name);
            $d = getdate(strtotime($item->created_at));
            $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
             $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
        ?>
     <li>
         <img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" class="alignleft" />
         <h6 class="regular"><a href="{{ $urlDt }}">{{ $name }}.</a></h6>
         <span class="meta">{{ $create }}.   |   <a href="">Lượt đọc : {{ $read }}.</a></span>
         <p>{!! $preview !!}...</p>
     </li>
     @endforeach
 </ul>
</div>

<div class="outerwide">
 <ul class="block2">
 @foreach($arItems23 as $item)
 <?php 
     $id = $item->id_news;
     $name = $item->name;
     $read = $item->read;
     $preview = $item->preview;
     $picture = $item->picture;
     $slug = str_slug($name);
     $d = getdate(strtotime($item->created_at));
    $create = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
     $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id]);
?>
    <li>
        <img src="{{ $adminfiles }}/{{ $picture }}" alt="{{ $name }}" class="alignleft" />
        <p>
            <span>{{ $create }}.</span>
            <a href="{{ $urlDt }}">{{ $name }}.</a>
        </p>
    </li>
@endforeach 
</ul>
</div>
</div>
<!-- /World News -->

<!-- Popular News -->
<div class="column-two-third">
 <div class="outertight">
     <h5 class="line"><span>Tin khoa học - đời sống.</span></h5>
     @foreach($arItems61 as $item)
         <?php 
             $id61 = $item->id_news;
             $name61 = $item->name;
             $read61 = $item->read;
             $preview61 = $item->preview;
             $picture61 = $item->picture;
             $slug = str_slug($name61);
             $d = getdate(strtotime($item->created_at));
            $create61 = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
             $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id61]);
        ?>
    @endforeach
     <div class="outertight m-r-no">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="{{ $adminfiles }}/{{ $picture61 }}" alt="{{ $name61 }}" style="height:160px;" />
                </li>
            </ul>
        </div>

        <h6 class="regular"><a href="{{ $urlDt }}">{{ $name61 }}.</a></h6>
            <span class="meta">{{ $create61 }}.   |   <a href="">Lượt đọc : {{ $read61 }}.</a>  </span>
            <p>{!! $preview !!}...</p>
            </div>

            <ul class="block">
             @foreach($arItems63 as $item)
             <?php 
                 $id63 = $item->id_news;
                 $name63 = $item->name;
                 $read63 = $item->read;
                 $preview63 = $item->preview;
                 $picture63 = $item->picture;
                 $slug63 = str_slug($name);
                 $d = getdate(strtotime($item->created_at));
                $create63 = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
                 $urlDt = route('public.hotnew.detail',['slug'=>$slug63,'id'=>$id63]);
            ?>
                <li>
                    <a href="{{ $urlDt }}"><img src="{{ $adminfiles }}/{{ $picture63 }}" alt="{{ $name63 }}" class="alignleft" /></a>
                    <p>
                        <span>{{ $create63 }}.</span>
                        <a href="{{ $urlDt }}">{{ $name63 }}.</a>
                    </p>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="outertight m-r-no">
         <h5 class="line"><span>Tin thể thao.</span></h5>
         @foreach($arItems91 as $item)
         <?php 
             $id91 = $item->id_news;
             $name91 = $item->name;
             $read91 = $item->read;
             $preview91 = $item->preview;
             $picture91 = $item->picture;
             $slug = str_slug($name91);
            $d = getdate(strtotime($item->created_at));
            $create91 = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
             $urlDt = route('public.hotnew.detail',['slug'=>$slug,'id'=>$id91]);
        ?>
    @endforeach
    <div class="outertight m-r-no">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="{{ $adminfiles }}/{{ $picture91 }}" alt="{{ $name91 }}" style="height:160px;" />
                </li>
            </ul>
        </div>

        <h6 class="regular"><a href="{{ $urlDt }}">{{ $name91 }}.</a></h6>
            <span class="meta">{{ $create91 }}.   |   <a href="">Lượt đọc : {{ $read91 }}.</a>   </span>
            <p>{!! $preview !!}...</p>
            </div>

            <ul class="block">
             @foreach($arItems93 as $item)
             <?php 
                 $id93 = $item->id_news;
                 $name93 = $item->name;
                 $read93 = $item->read;
                 $preview93 = $item->preview;
                 $picture93 = $item->picture;
                 $slug93 = str_slug($name);
                 $d = getdate(strtotime($item->created_at));
            $create93 = $d['mday'].'/'.$d['mon'].'/'.$d['year'];
                 $urlDt = route('public.hotnew.detail',['slug'=>$slug93,'id'=>$id93]);
            ?>
                <li>
                    <a href="{{ $urlDt }}"><img src="{{ $adminfiles }}/{{ $picture93 }}" alt="{{ $name93 }}" class="alignleft" /></a>
                    <p>
                        <span>{{ $create93 }}.</span>
                        <a href="{{ $urlDt }}">{{ $name93 }}.</a>
                    </p>
                </li>
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
                     <span class="meta">26 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                     <span class="rating"><span style="width:70%;"></span></span>
                 </li>
                 <li>
                     <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
                     <span class="meta">26 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                     <span class="rating"><span style="width:70%;"></span></span>
                 </li>
                 <li>
                     <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
                     <span class="meta">26 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                     <span class="rating"><span style="width:70%;"></span></span>
                 </li>
                 <li>
                     <a href="#" class="title">Blandit Rutrum, Erat et Sagittis Adipcising Elit.</a>
                     <span class="meta">26 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                     <span class="rating"><span style="width:70%;"></span></span>
                 </li>
             </ul>
         </div>
         <div id="tabs2">
            <ul>
             <li>
                 <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
                 <span class="meta">27 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                 <span class="rating"><span style="width:70%;"></span></span>
             </li>
             <li>
                 <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
                 <span class="meta">27 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                 <span class="rating"><span style="width:70%;"></span></span>
             </li>
             <li>
                 <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
                 <span class="meta">27 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
                 <span class="rating"><span style="width:70%;"></span></span>
             </li>
             <li>
                 <a href="#" class="title">Mauris eleifend est et turpis. Duis id erat.</a>
                 <span class="meta">27 May, 2013.   |   <a href="#">World News.</a>   |   <a href="#">No Coments.</a></span>
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

<div class="sidebar">
 <h5 class="line"><span>Accordion.</span></h5>
 <div id="accordion">

    <h3>Poserue Clubre.</h3>
    <div>
        <p>Vestibulum tempor feugiat est in posuere. Sed auctor libero augue, a faucibus turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. posuere.</p>
    </div>

    <h3>Lubelia Mest.</h3>
    <div>
        <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna.</p>
    </div>

    <h3>Tincidunt Massa.</h3>
    <div>
        <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac liberoac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.</p>
    </div>

    <h3>Quisque lobortis.</h3>
    <div>
        <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netuset malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est.</p>
    </div>

</div>
</div>

<div class="sidebar">
 <h5 class="line"><span>Ads Spot.</span></h5>
 <a href="#"><img src="{{ $publicUrl }}/img/tf_300x250_v1.gif" alt="MyPassion" /></a>     
</div>

<div class="sidebar">
 <h5 class="line"><span>Facebook.</span></h5>
 <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=298&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23BCBCBC&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:298px; height:258px;" allowTransparency="true"></iframe>
</div>
</div>
<!-- /Left Sidebar -->

</div>    
</section>
<!-- / Content -->

@stop