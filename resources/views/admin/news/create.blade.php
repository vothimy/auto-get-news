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
  <form action="{{ route('admin.news.create') }}" method="POST">
    {{ csrf_field() }}
    <div class="vali-form">
      <div class="col-md-12 form-group1 group-mail">
        <label class="control-label">Tên tin</label>
        <input type="text" name="name" placeholder="Tên tin" value="" >
      </div>
      <div class="clearfix"> </div>

      <div class="col-md-12 form-group2 group-mail">
        <label class="control-label">Danh mục tin</label>
        <select name="id_cat">
          @foreach($arCat as $arcat)
          <option value="{{$arcat->id_cat}}">{{$arcat->name}}</option>
          @endforeach
        </select> 
      </div>
      <div class="clearfix"> </div>
      <div class="vali-form">
        <div class="col-md-6 form-group1">
        <label class="control-label">Chọn ảnh</label>
          <input type="file" id="exampleInputFile">
        </div>
      </div>
      <div class="col-md-12 form-group1 ">
        <label class="control-label">Mô tả</label>
        <textarea  placeholder="Your Comment..." name="preview"></textarea>
      </div>
      <div class="clearfix"> </div>

      <div class="col-md-12 form-group1 ">
        <label class="control-label ">Chi tiết</label>
        <textarea id="editor1" placeholder="Your Comment..." name="detail" class="ckeditor"></textarea>
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

</div>

@stop