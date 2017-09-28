@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids">	
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h2>Danh sách Users</h2>
			@if(Session::has('msg'))
            <p class="category success">{{ Session::get('msg') }}</p>
            @endif
			<ul class="bt-list">
			<li><a href="{{ route('admin.user.create') }}" class="hvr-icon-float-away col-24">Thêm</a></li>
			</ul>
			<table id="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Fullname</th>
						<th>Vai trò</th>
						<th>Chức năng</th>
					</tr>
				</thead>
				<tbody>
				@foreach($arItems as $item)
				<?php 
					$id = $item->id;
					$username = $item->username;
					$fullname = $item->fullname;
					$role = $item->role;
					$urlEdit = route('admin.user.edit',['id'=>$id]);
					$urlDel = route('admin.user.destroy',['id'=>$id]);
				?>
					<tr>
						<td>{{ $id }}</td>
						<td>{{ $username }}</td>
						<td>{{ $fullname }}</td>
						@if($role == 1)
						<td>Admin</td>
						@elseif($role == 2)
						<td>Mod</td>
						@else
						<td>Thành viên</td>
						@endif
						<?php 
							$arUser = Auth::user();
							$id2 = $arUser->id;
							$username2 = $arUser->username;
						?>
						@if($username2 == 'admin' || $username == $username2)
						<td><a href="{{ $urlEdit }}"><i class="fa fa-edit"></i> Sửa</a>
							| <a href="{{ $urlDel }}"><i class="fa fa-times-circle-o"></i> Xóa</a>
						</td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@stop