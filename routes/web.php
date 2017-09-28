<?php

Route::pattern('slug','(.*)');
Route::pattern('id','[0-9]*');

Route::group(['namespace'=>'Admin','prefix' => 'admincp','middleware' => 'auth'],
	function(){
		Route::get('', [
			'uses' => 'IndexController@index',
			'as'   => 'admin.index.index'
		]);
		Route::group(['prefix'=>'users'],
		function(){
		//index
		Route::get('',[
			'uses' => 'UserController@index',
			'as' => 'admin.user.index'
		]);  
		//add
		Route::get('add',[
			'uses' => 'UserController@create',
			'as' => 'admin.user.create'
		]);
		Route::post('add',[
			'uses' => 'UserController@store',
			'as' => 'admin.user.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'UserController@destroy',
			'as' => 'admin.user.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'UserController@edit',
			'as' => 'admin.user.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'UserController@update',
			'as' => 'admin.user.edit'
		]);
		
	});
	Route::group(['prefix'=>'news'],
		function(){
		//index
		Route::get('',[
			'uses' => 'NewsController@index',
			'as' => 'admin.news.index'
		]);
		//add
		Route::get('add',[
			'uses' => 'NewsController@create',
			'as' => 'admin.news.create'
		]);
		Route::post('add',[
			'uses' => 'NewsController@store',
			'as' => 'admin.news.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'NewsController@destroy',
			'as' => 'admin.news.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'NewsController@edit',
			'as' => 'admin.news.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'NewsController@update',
			'as' => 'admin.news.edit'
		]);
		Route::get('ajax',[
			'uses' => 'NewsController@ajax',
			'as' => 'admin.news.ajax'
		]);
		
		Route::get('search', [
			'uses' => 'NewsController@search',
			'as'   => 'admin.news.search'
		]);
		//lietke
		Route::get('thongke',[
			'uses' => 'NewsController@lietke',
			'as' => 'admin.news.thongke'
		]);
		Route::get('thongke1',[
			'uses' => 'NewsController@thongke1	',
			'as' => 'admin.news.thongke1'
		]);
	});
	Route::group(['prefix'=>'news'],
		function(){
		//index
		Route::get('destroy/{id}',[
			'uses' => 'NewsController@abc',
			'as' => 'admin.comment.destroy'
		]);
	});
	Route::group(['prefix'=>'getnews'],
		function(){
		//index
		Route::get('',[
			'uses' => 'GetnewsController@index',
			'as' => 'admin.getnews.index'
		]);
		Route::post('',[
			'uses' => 'GetnewsController@getnews',
			'as' => 'admin.getnews.index'
		]);
		Route::get('change',[
			'uses' => 'GetnewsController@change',
			'as' => 'admin.getnews.change'
		]);

	});
	Route::group(['prefix'=>'dan-tri'],
		function(){
		//index
		Route::get('',[
			'uses' => 'DanTriController@index',
			'as' => 'admin.dantri.index'
		]);
		Route::post('',[
			'uses' => 'DanTriController@getnews',
			'as' => 'admin.dantri.index'
		]);
		Route::get('change',[
			'uses' => 'DanTriController@change',
			'as' => 'admin.dantri.change'
		]);

	});
	//cat group
	Route::group(['prefix' => 'cat','role'=>'admin'],
		function(){
		//index
		Route::get('',[
			'uses' => 'CatController@index',
			'as' => 'admin.cat.index'
		]);
		Route::get('add',[
			'uses' => 'CatController@create',
			'as' => 'admin.cat.create'
		]);
		Route::post('add',[
			'uses' => 'CatController@store',
			'as' => 'admin.cat.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'CatController@destroy',
			'as' => 'admin.cat.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'CatController@edit',
			'as' => 'admin.cat.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'CatController@update',
			'as' => 'admin.cat.update'
		]);
	});
	Route::group(['prefix' => 'catchild'],
		function(){
		//index
		Route::get('{id}',[
			'uses' => 'CatChildController@index',
			'as' => 'admin.catchild.index'
		]);
		Route::get('add',[
			'uses' => 'CatChildController@create',
			'as' => 'admin.catchild.create'
		]);
		Route::post('add',[
			'uses' => 'CatChildController@store',
			'as' => 'admin.catchild.store'
		]);

		//del
		Route::get('del/{id}',[
			'uses' => 'CatChildController@destroy',
			'as' => 'admin.catchild.destroy'
		]);
		//edit
		Route::get('edit/{id}',[
			'uses' => 'CatChildController@edit',
			'as' => 'admin.catchild.edit'
		]);
		Route::post('edit/{id}',[
			'uses' => 'CatChildController@update',
			'as' => 'admin.catchild.update'
		]);
	});
});
//group public
Route::group(['namespace'=>'Hotnew'],
	function(){
	Route::get('/', [
		'uses' => 'IndexController@index',
		'as'   => 'public.index.index'
	]);

	Route::get('danh-muc/{slug}-{id}', [
		'uses' => 'NewsController@cat',
		'as'   => 'public.hotnew.danhmuc'
	]);
	Route::get('danh-mucc/{slug}-{id}', [
		'uses' => 'NewsController@catchild',
		'as'   => 'public.hotnew.danhmuccon'
	]);
	Route::get('{slug}-{id}', [
		'uses' => 'NewsController@detail',
		'as'   => 'public.hotnew.detail'
	]);
	Route::get('tin-moi', [
		'uses' => 'NewsController@tinmoi',
		'as'   => 'public.hotnew.tinmoi'
	]);
	Route::get('tin-doc-nhieu-nhat', [
		'uses' => 'NewsController@read',
		'as'   => 'public.hotnew.read'
	]);
	Route::get('comment', [
		'uses' => 'NewsController@comment',
		'as'   => 'public.hotnew.comment'
	]);
	Route::post('search', [
		'uses' => 'NewsController@search',
		'as'   => 'public.hotnew.search'
	]);
});
Route::group(['namespace'=>'Auth'],
	function(){
		Route::get('login', [
			'uses' => 'AuthController@getLogin',
			'as'   => 'auth.auth.login'
		]);
		Route::post('login', [
			'uses' => 'AuthController@postLogin',
			'as'   => 'auth.auth.login'
		]);
		Route::get('logout', [
			'uses' => 'AuthController@logout',
			'as'   => 'auth.auth.logout'
		]);

});

Route::get('noaccess',function(){
	return view('auth.noaccess');
});