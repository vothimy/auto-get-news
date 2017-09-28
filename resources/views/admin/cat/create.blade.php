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
  <form action="{{ route('admin.cat.create') }}" method="POST">
      {{ csrf_field() }}
      <div class="vali-form">
        <div class="col-md-12 form-group1 group-mail">
          <label class="control-label">Tên danh mục</label>
          <input type="text" name="name" placeholder="Tên danh mục" value="" >
        </div>
        <div class="clearfix"> </div>
        <div class="col-md-12 form-group">
          <button type="submit" class="btn btn-primary">Thêm</button>
          <!-- <button type="reset" class="btn btn-default">Reset</button> -->
        </div>
        <div class="clearfix"> </div>
      </form>
      <!---->
    </div>

  </div>

  @stop