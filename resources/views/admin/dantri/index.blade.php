@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids"> 
    <div class="agile-tables"> 
        <div class="container-fluid">
            <div class="col-md-7">
                <h4>Lấy bài viết từ DANTRI.COM.VN</h4>
                <form action="{{ route('admin.dantri.index') }}" method="POST">
                {{ csrf_field() }}
                @if(Session::has('msg'))
                <p class="category success">{{ Session::get('msg') }}</p>
                @endif
                    <div class="col-md-12 form-group1 group-mail">
                        <label class="control-label">Nhập link bài viết</label>
                        <input type="text" name="linkname" placeholder="Link bài viết" value="" >
                    </div>
                    <div  class="row " style="margin-left:0px;">
                        <div class="col-md-5 form-group1 group-mail">
                            <label class="control-label">Chọn danh mục:</label>
                            <select name="id_cat" id="id_cat">
                                @foreach($arCats as $arcat)
                                    <option value="{{$arcat->id_cat}}">{{$arcat->name}}</option>
                                @endforeach
                          </select>                  
                        </div>
                        <div class="col-md-7 form-group1 group-mail">
                            <label class="control-label">Chọn danh mục con:</label>
                            <select name="id_catchild" style="width:260px;" id="id_catchild"> 
                                @foreach($arCatChilds as $archild)
                                    <option value="{{$archild->id}}">{{$archild->loai}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3 form-group1 group-mail">
                            <label class="control-label">Chọn trạng thái:</label>
                            <select name="status"  style="width:150px;">
                                <option value="0">Xét duyệt</option>
                                <option value="1">Đăng bài</option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary">Nhập bài viết</button>
                        <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                    </div>
                </form>
            </div>
           
        <div class="col-md-5">
            <h4>HƯỚNG DẪN SỬ DỤNG</h4>
            <p><b>Bước 1: </b>Nhập link bài viết từ VNEXPRESS.NET.( <a href="http://vnexpress.net/rss">http://dantri.com.vn/rss.htm</a>)</p>
            <p><b>Bước 2: </b>Chọn chuyên mục chứa bài viết. Lưu ý: Bạn có thể chọn danh mục con (nếu có).</p>
            <p><b>Bước 3: </b>Chọn trạng thái của bài viết là  <b>Xét duyệt</b> hoặc <b>Đăng bài.</b></p>
            <p><b>Bước 4: </b>Ấn "nhập bài viết" và chờ trong giây lát, bài viết sẽ được lấy về.</p>
        </div>
    </div>
</div>

</div>
@stop