@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids">	
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h2>Thống kê số lượng tin trong ngày</h2>
			<ul class="bt-list">
				<li><a href="javascript:void(0)" onclick="thongke1()" class="hvr-icon-float-away col-24" >Xem </a></li>
			</ul>
			<table id="table1">
				
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

@stop