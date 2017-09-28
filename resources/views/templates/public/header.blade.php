<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="News - Clean HTML5 and CSS3 responsive template">
  <meta name="author" content="MyPassion">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <title>
    <?php 
      if(isset($title)){
        echo 'Hotnews -'.$title;
      }else{
        echo ' Tin tức Hotnews';
      }
    ?>
  </title>

  <link rel="shortcut icon" href="{{ $publicUrl }}/img/sms-4.ico" />

  <!-- STYLES -->
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/superfish.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/fontello/fontello.css" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/flexslider.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/ui.css" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/base.css" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/style.css" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/960.css" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/devices/1000.css" media="only screen and (min-width: 768px) and (max-width: 1000px)" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/devices/767.css" media="only screen and (min-width: 480px) and (max-width: 767px)" />
  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/devices/479.css" media="only screen and (min-width: 200px) and (max-width: 479px)" />
  <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]> <script type="text/javascript" src="{{ $publicUrl }}/js/customM.js"></script> <![endif]-->

</head>
<body>
  <!-- Body Wrapper -->
  <div class="body-wrapper">
   <div class="controller">
    <div class="controller2">
      <!-- Header -->
      <header id="header">
        <div class="container">
          <div class="column">
            <div class="logo">
              <a href="/"><img src="{{ $publicUrl }}/img/logo.png" alt="Trang chủ tin tức" /></a>
            </div>
            <div class="search">
              <form action="{{ route('public.hotnew.search') }}" method="post">
              {{ csrf_field() }}
                <input type="text" name="namesearch" placeholder="Search."  class="ft"/>
                <input type="submit" value="" class="fs">
              </form>
            </div>
            <!-- Nav -->
            <nav id="nav">
              <ul class="sf-menu">
                <li class="current"><a href="/">Trang chủ </a></li>
                @foreach($arCat as $arcat)
                <?php 
                $id = $arcat->id_cat;
                $name = $arcat->name;
                $slug = str_slug($name);
                ?>
                <li>
                 <a href="{{ route('public.hotnew.danhmuc',['slug'=>$slug,'id'=>$id]) }}">{{ $name }} </a>
                 <ul>
                   @foreach($arCatChild as $arcatchild)
                   <?php 
                   $idcatchild = $arcatchild->id;
                   $idcat = $arcatchild->id_cat;
                   $name = $arcatchild->name;
                   $slug = str_slug($name);
                   ?>
                   @if($id == $idcat)
                   <li><i class="icon-right-open"></i><a href="{{ route('public.hotnew.danhmuccon',['slug'=>$slug,'id'=>$idcatchild]) }}" class="child">{{ $name }} </a></li>
                   @endif
                   @endforeach
                 </ul>   
               </li>
               @endforeach                            
             </ul>
             
           </nav>
           <!-- /Nav -->
         </div>
       </div>
     </header>
        <!-- /Header -->