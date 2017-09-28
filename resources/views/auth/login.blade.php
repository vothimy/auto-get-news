@extends('templates.admin.master')
@section('main-content')
<div class="main-wthree">
  <div class="container">
  <div class="sin-w3-agile">
    <h2>Sign In</h2>
    <form action="{{ route('auth.auth.login') }}" method="post">
    {{ csrf_field() }}
      <div class="username">
        <span class="username">Username:</span>
        <input type="text" name="username" class="name" placeholder="Username" required="">
        <div class="clearfix"></div>
      </div>
      <div class="password-agileits">
        <span class="username">Password:</span>
        <input type="password" name="password" class="password" placeholder="Password" required="">
        <div class="clearfix"></div>
      </div>
      <div class="rem-for-agile">
        <input type="checkbox" name="remember" class="remember">Remember me<br>
        <a href="#">Forgot Password</a><br>
      </div>
      <div class="login-w3">
          <input type="submit" class="login" value="Sign In">
      </div>
      <div class="clearfix"></div>
    </form>
        <div class="back">
          <a href="/">Back to home</a>
        </div>
  </div>
  </div>
  </div>

    @stop