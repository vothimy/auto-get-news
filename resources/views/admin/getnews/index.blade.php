@extends('templates.admin.master')
@section('main-content')
<div class="agile-grids"> 
    <div class="agile-tables"> 

        <div class="container-fluid">

            <div class="col-md-7">
                <h4>Lấy bài viết từ VNEXPRESS.NET</h4>
                <form action="{{ route('admin.getnews.index') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="col-md-12 form-group1 group-mail">
                        <label class="control-label">Chọn link RSS:</label>
                        <select name="name">
                            @foreach($arlinkRSS as $rss)
                            <option value="{{$rss->name}}">{{$rss->name}}</option>
                            @endforeach
                        </select> 
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
                <p><b>Bước 1: </b>Chọn link bài viết từ VNEXPRESS.NET.( <a href="http://vnexpress.net/rss">http://vnexpress.net/rss</a>)</p>
                <p><b>Bước 2: </b>Chọn chuyên mục chứa bài viết. Lưu ý: Bạn có thể chọn danh mục con (nếu có).</p>
                <p><b>Bước 3: </b>Chọn trạng thái của bài viết là  <b>Xét duyệt</b> hoặc <b>Đăng bài.</b></p>
                <p><b>Bước 4: </b>Ấn "nhập bài viết" và chờ trong giây lát, bài viết sẽ được lấy về.</p>
            </div>
        </div>
        @if(Session::has('msg'))
        <div>
            <h3 class="category success" style="color:green">{{ Session::get('msg') }}</h3>
        </div>
        @endif
    </div>

</div>

@stop