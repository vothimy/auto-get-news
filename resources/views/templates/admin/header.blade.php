
<!DOCTYPE HTML>
<html>
<head>
	<title>Trang quản lý</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link rel="shortcut icon" href="{{ $publicUrl }}/img/sms-4.ico" />
	<link href="{{$adminUrl}}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="{{$adminUrl}}/css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{$adminUrl}}/css/morris.css" type="text/css"/>
	<!-- Graph CSS -->
	<link href="{{$adminUrl}}/css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<script src="{{$adminUrl}}/js/jquery-2.1.4.min.js"></script>
	<script src="{{$adminUrl}}/js/ajax.js"></script>
	<script src="{{$adminUrl}}/js/ckeditor/ckeditor.js"></script>
	<script src="{{$adminUrl}}/js/ckfinder/ckfinder.js"></script>
	<link rel="stylesheet" type="text/css" href="{{$adminUrl}}/css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="{{$adminUrl}}/css/basictable.css" />
	<script type="text/javascript" src="{{$adminUrl}}/js/jquery.basictable.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#table').basictable();

			$('#table-breakpoint').basictable({
				breakpoint: 768
			});

			$('#table-swap-axis').basictable({
				swapAxis: true
			});

			$('#table-force-off').basictable({
				forceResponsive: false
			});

			$('#table-no-resize').basictable({
				noResize: true
			});

			$('#table-two-axis').basictable();

			$('#table-max-height').basictable({
				tableWrapper: true
			});
		});
	</script>
	<script type="text/javascript">
		function xacNhanXoa(){
			var x = confirm('Bạn có chắc muốn xóa');
			if(x){
				return true;
			}else{
				return false;
			}
		}
	</script>
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="{{$adminUrl}}/css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<div class="header-main">
					<ul>
						<?php 
						$arUser = Auth::user();
						if(isset($arUser)){
							$role = $arUser->role;
							$username = $arUser->username;
							$fullname = $arUser->fullname;
							?>
							@if($role == 1)
							<span class="fullname"><i class="fa fa-user"></i> {{ $fullname }}</span>
							@else
							<span>{{ $fullname }}</span>
							@endif
							<div class="clearfix"></div>
							<li> <a href="{{ route('auth.auth.logout') }}"><i class="fa fa-sign-out"></i> Logout</a> </li>	
							<?php } ?>
						</div>
					</ul>
					
					<div class="clearfix"> </div>	
				</div>
<!--four-grids here-->