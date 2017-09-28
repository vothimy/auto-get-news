 <!-- Footer -->
 <footer id="footer">
    <div class="container">
     <div class="column-one-fourth">
        <h5 class="line"><span>Contact.</span></h5>
        <p class="a1">Facebook: <a href="https://www.facebook.com/doremon.vo.3">Đậu Vtm</a></p>
        <p class="a1" >Email:<a href="http://gmail.com/"> thimyvo18@gmail.com</a></p>
        <p class="a1">Phone:<a href=""> (+84)1265 603 286</a></p>
        <p class="a1">Địa chỉ:<a href=""> 02 Thanh Sơn, Hải Châu, Đà Nẵng</a></p>
    </div>
    <div class="column-one-fourth">
        <h5 class="line"><span>category.</span></h5>
        <ul class="footnav">
            @foreach($arCat as $item)
            <?php 
            $id = $item->id_cat;
            $name = $item->name;
            $slug = str_slug($name);
            $url = route('public.hotnew.danhmuc',['slug'=>$slug,'id'=>$id])
            ?>
            <li><a href="{{ $url }}"><i class="icon-right-open"></i> {{ $name }}.</a></li>
            @endforeach
        </ul>
    </div>
    <div class="column-one-fourth">
        <h5 class="line"><span>Flickr Stream.</span></h5>
        <div class="flickrfeed">
            <ul id="basicuse" class="thumbs"><li class="hide"></li></ul>
        </div>
    </div>
    <div class="column-one-fourth">
        <h5 class="line"><span>About.</span></h5>
        <p class="a1">Trang tin tức News hi vọng mang lại những thông tin bổ ích cho độc giả trong cuộc sống và thư giãn thỏai mái sau những giờ làm việc căng thẳng .</p>
    </div>
    <p class="copyright"><strong>By Code:<b>Võ Thị Mỹ</b> - Khóa: PHP28.Dự án cuối khóa Lập trình PHP từ A-Z tại Trung tâm đào tạo <a href="https://www.facebook.com/doremon.vo.3"></a></strong> VinaENTER.</p>
</div>
</footer>
<!-- / Footer -->

</div>
</div>
</div>
<!-- / Body Wrapper -->


<!-- SCRIPTS -->
<script type="text/javascript" src="{{ $publicUrl }}/js/jquery.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/easing.min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/1.8.2.min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/ui.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/carouFredSel.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/superfish.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/customM.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/flexslider-min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/jtwt.min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="{{ $publicUrl }}/js/mobilemenu.js"></script>

<!--[if lt IE 9]> <script type="text/javascript" src="js/html5.js"></script> <![endif]-->
<script type="text/javascript" src="{{ $publicUrl }}/js/mypassion.js"></script>
<script type="text/javascript">

    function load_ajax($id_new)
    {
        var name = $('#name').val();
        var email = $('#email').val();
        var content = $('#content1').val();
        if (name == ''){
            alert("Chưa nhập tên");
        }else if(email == ''){
            alert("Chưa nhập email");
        }else if(content == ''){
            alert("Chưa nhập nội dung");
        }
        $.ajax({
            url:'comment',
            type:'get',
            data:{id:$id_new,name:name,email:email,content:content},
            success:function(data){
                console.log(data);
                $('#id_catchild1').html(data);
                
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({ cache: true });
      $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
          appId: '{your-app-id}',
      version: 'v2.7' // or v2.1, v2.2, v2.3, ...
  });     
        $('#loginbutton,#feedbutton').removeAttr('disabled');
        FB.getLoginStatus(updateStatusCallback);
    });
  });
</script>
</body>
</html>
