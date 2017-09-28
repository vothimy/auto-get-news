@extends('templates.admin.master')
@section('main-content')
<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="{{ route('admin.user.edit',['id'=>$arItem[0]->id]) }}" method="POST">
        {{ csrf_field() }}
         	<div class="vali-form">
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Username</label>
              <input readonly="readonly" type="text" placeholder="Email" value="{{$arItem[0]->username}}" >
            </div>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Fullname</label>
              <input type="text" placeholder="Fullname" name="fullname" value="{{$arItem[0]->fullname}}">
            </div>
             <div class="clearfix"> </div>
             <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Password</label>
              <input type="password" placeholder="Password"  name="password" >
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