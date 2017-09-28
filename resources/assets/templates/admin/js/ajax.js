$(document).ready(function(){
	$("#id_cat").change(function(){
		var id = $(this).val();
		$.ajax({
			url:'getnews/change',
			type:'get',
			data:{'id':id},
			success:function(data){
				console.log(data);
				$('#id_catchild').html(data);
			}
		});
	})
})