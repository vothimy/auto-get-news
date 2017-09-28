@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids">	
	<div class="agile-tables">
		<div class="w3l-table-info">
			<div class="w3-search-box">
			<form action="" method="post">
			{{ csrf_field() }}
					<input type="text" name="name" id="nameSearch" placeholder="Search..." required="">	
					<input type="submit" value="">					
				</form>
				<div class="clr"></div>
			</div>

			<h2>Danh sách tin tức</h2>
			<ul class="bt-list">
				<li><a href="{{ route('admin.news.create') }}" class="hvr-icon-float-away col-24">Thêm</a></li>
			</ul>
			@if(Session::has('msg'))
			<p class="category success">{{ Session::get('msg') }}</p>
			@endif
			<div class="title">
				<div class="col-md-7">
					<p><b>Tất cả</b> ({{$i}}) || <b>Đã đăng</b> ({{$j}}) || <b>Chờ xét duyệt</b> ({{$i-$j}})</p>
				</div>
				<div class="col-md-5" id="pagination">
					<ul class="pagination">
						<li>{{$arItems->links()}}</li>
					</ul>
				</div>
			</div>

			<table id="table">
				<thead>
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
					@foreach($arItems as $item)
					<?php 
					$id = $item->id_news;
					$name = $item->name;
					$picture = $item->picture;
					$id_user = $item->id_user;
					$created_at = $item->created_at;
					$create = explode(' ', $created_at);
					$urlEdit = route('admin.news.edit',['id'=>$id]);
					$urlDel = route('admin.news.destroy',['id'=>$id]);
					?>
					<tr >
						<td>
							<div onclick="changeTT({{ $id }})">
								@if($item->active == 1)	
								<input type="checkbox" checked="checked">
								@else
								<input type="checkbox">
								@endif
							</div>
						</td>
						<td>{{ $name }}</td>
						@foreach($arCat as $arcat)
						@if($arcat->id_cat == $item->id_cat)
						<td>{{ $arcat->name }}</td>
						@endif
						@endforeach
						@if($picture != '')
						<td><img src="{{$adminfiles}}/{{ $picture }}" style="height:60px;width:60px;"></td>
						@else
						<td>Không có ảnh</td>
						@endif
						<td>{{ $create[0] }}</td>
						@if($arUser->id == $id_user)
						<td>{{ $arUser->fullname }}</td>
						@else
						<td>...</td>
						@endif

						<td><a href="{{ $urlEdit }}"><i class="fa fa-edit"></i> Sửa</a>
							| <a href="{{ $urlDel }}" onclick="return xacNhanXoa()"><i class="fa fa-times-circle-o"></i> Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	function changeTT(id){
		$.ajax({
			url: '{{ route("admin.news.ajax") }}',  
			type: 'get',
			cache: false,
			data: {
				aid : id
			},
			success: function(result){
				if(result.active == 1){
					alert('đăng bài');
				}else{
					alert('hủy đăng bài');
				}						
			}
		});     
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#nameSearch').keyup(function(){
			var txt = $(this).val();
			if(txt == ''){
				
			}else{
				 // $('#resultSearch').html('');
				$.ajax({
					url:'news/search',
					method:'get',
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#resultSearch').html(data);
					}
				});
			}
		});
	});
</script>
@stop