@extends('templates.admin.master')
@section('main-content')
<div class="main">
  <div class="container">
    <div class="agile">

      <div class="w3l-txt">
        <div class="text">
          <h1>PAGE NOT FOUND</h1> 
          
          <p>You have been tricked into click on a link that can not be found. Please check the url or go to <a href="{{ route('admin.index.index') }}">main page</a> and see if you can locate what you are looking for</p>
        </div>
        <div class="image">
          <img src="{{$adminUrl}}/images/smile.png">
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="back">
        <a href="index.html">Back to home</a>
      </div>
    </div>
  </div>
</div>
@stop