@extends('templates.admin.master')
@section('main-content')
<div class="validation-system">
 <div class="validation-form">
 @if (count($errors) > 0)
 <div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
  <form action="{{ route('admin.news.edit',[$arItem->id_news]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="vali-form">
      <div class="col-md-12 form-group1 group-mail">
        <label class="control-label">Tên tin</label>
        <input type="text" name="name" placeholder="Tên tin" value="{{$arItem->name}}" >
      </div>
      <div class="clearfix"> </div>

      <div class="col-md-12 form-group2 group-mail">
        <label class="control-label">Danh mục tin</label>
        <select name="id_cat">
          @foreach($arCat as $arcat)
            @if($arcat->id_cat == $arItem->id_cat)
            <option value="{{$arcat->id_cat}}" selected>{{$arcat->name}}</option>
            @else
            <option value="{{$arcat->id_cat}}">{{$arcat->name}}</option>
            @endif
          @endforeach
        </select> 
      </div>
      <div class="clearfix"> </div>
     <div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Thay ảnh</label>
              <input type="file" name="picture" id="exampleInputFile">
            </div>
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Ảnh cũ</label>
              @if($arItem->picture != '')
              <img src="{{ $adminfiles }}/{{$arItem->picture}}" style="width:70px;height: 70px;border:1px solid #555;padding: 2px;">
              <label class="control-label">Xóa</label>
              <input type="checkbox" name="xoa" value="1" />
              @else
              <span>không có ảnh cũ</span>
              @endif
            </div>
            <div class="clearfix"> </div>
            </div>
      <div class="col-md-12 form-group1 ">
        <label class="control-label">Mô tả</label>
        <textarea  placeholder="Your Comment..." name="preview">{!! $arItem->preview !!}</textarea>
      </div>
      <div class="clearfix"> </div>

      <div class="col-md-12 form-group1 ">
        <label class="control-label ">Chi tiết</label>
        <textarea id="editor1" placeholder="Your Comment..." name="detail" class="ckeditor">{!! $arItem->detail !!}</textarea>
        <script type="text/javascript">
          CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '{{ $adminUrl }}/js/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{ $adminUrl }}/js/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '{{ $adminUrl }}/js/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: '{{ $adminUrl }}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{ $adminUrl }}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '{{ $adminUrl }}/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        } );
        </script>
      </div>
      <div class="clearfix"> </div>
      <div class="col-md-12 form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <!-- <button type="reset" class="btn btn-default">Reset</button> -->
      </div>
      <div class="clearfix"> </div>
    </form>
    
    <!---->
  </div>

  <!-- Comment -->
  <h2>Danh sách bình luận</h2>
      <div class="title">
        @if(Session::has('msg'))
        <p class="category success">{{ Session::get('msg') }}</p>
        @endif
      </div>
      <table id="table">
        <thead>
          <tr>
            <th>Tên người cmt</th>
            <th style="width:20%">Email</th>
            <th style="width:20%">Nội dung</th>
            <th style="width:10%">Ngày cmt</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($arComment as $item)
          <?php 
          $id = $item->id;
          $name = $item->name;
          $email = $item->email;
          $content = $item->content;
          $created_at = $item->created_at;
          $urlDel = route('admin.comment.destroy',['id'=>$id]);
          ?>
          <tr>
            <td>{{ $name }}</td>
            <td>{{ $content }}</td>
            <td>{{ $email }}</td>
            <td>{{ $created_at }}</td>
            <td><a href="{{ $urlDel }}" onclick="return xacNhanXoa()"><i class="fa fa-times-circle-o"></i> Xóa</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
</div>

@stop