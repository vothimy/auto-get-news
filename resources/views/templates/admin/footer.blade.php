	  <!--//w3-agileits-pane-->	
	  <!-- script-for sticky-nav -->
	  <script>
	  	$(document).ready(function() {
	  		var navoffeset=$(".header-main").offset().top;
	  		$(window).scroll(function(){
	  			var scrollpos=$(window).scrollTop(); 
	  			if(scrollpos >=navoffeset){
	  				$(".header-main").addClass("fixed");
	  			}else{
	  				$(".header-main").removeClass("fixed");
	  			}
	  		});

	  	});
	  </script>
	  <script type="text/javascript">
	  function thongke1()
	  	{
	  		$.ajax({
	  			url:'thongke1',
	  			type:'get',
	  			data:{},
	  			success:function(data){
	  				console.log(data);
	  				$('#table1').html(data);

	  			}
	  		});
	  	}
	  </script>
	  <div class="inner-block">

	  </div>
	  <div class="copyrights">
	  	<p><strong>By Code: Võ Thị Mỹ - Khóa: PHP28.Dự án cuối khóa Lập trình PHP từ A-Z tại Trung tâm đào tạo <a href="https://www.facebook.com/vinaenter.edu"></a></strong>  <a href="http://vinaenter.edu.vn/" target="_blank">VinaENTER.</a> </p>
	  </div>	
	  <!--COPY rights end here-->
	</div>
</div>
<!--//content-inner-->
<!--/sidebar-menu-->
