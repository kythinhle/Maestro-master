<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin_login',['as' => 'getAdmin_login', 'uses' => 'AdminController@getLogin']);
Route::post('admin_login',['as' => 'postAdmin_login', 'uses' => 'AdminController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AdminController@getlogout']);
/*Admin Area*/
Route::group(['prefix' => 'AdminTool', 'middleware'=>'adminLogin'], function(){
	Route::get('dashboard','AdminController@admintool')->name('dashboard');

	//Add banner
	Route::group(['prefix' => 'banner'], function(){
		Route::get('list',['as' => 'getListBanner', 'uses' => 'BannerController@getList']);

		Route::get('add',['as' => 'getBannerAdd', 'uses' => 'BannerController@getAdd']);
		Route::post('add',['as' => 'postBannerAdd', 'uses' => 'BannerController@postAdd']);

		Route::get('del/{id}',['as' => 'getBannerDel', 'uses' => 'BannerController@getDel'])->where('id','[0-9]+');

		Route::get('edit/{id}',['as' => 'getBannerEdit', 'uses' => 'BannerController@getEdit'])->where('id','[0-9]+');
		Route::post('edit/{id}',['as' => 'postBannerEdit', 'uses' => 'BannerController@postEdit'])->where('id','[0-9]+');

		Route::get('changeStatus/{id}', ['as' => 'ChangeStatus', 'uses' => 'BannerController@changeStatus']);
	});

	//Add content
	Route::group(['prefix' => 'content'], function(){
		Route::get('list',['as' => 'getListContent', 'uses' => 'ContentController@getList']);

		Route::get('add',['as' => 'getContentAdd', 'uses' => 'ContentController@getAdd']);
		Route::post('add',['as' => 'postContentAdd', 'uses' => 'ContentController@postAdd']);

		Route::get('del/{id}',['as' => 'getContentDel', 'uses' => 'ContentController@getDel'])->where('id','[0-9]+');

		Route::get('edit/{id}',['as' => 'getContentEdit', 'uses' => 'ContentController@getEdit'])->where('id','[0-9]+');
		Route::post('edit/{id}',['as' => 'postContentEdit', 'uses' => 'ContentController@postEdit'])->where('id','[0-9]+');
	});
});
/*End*/

/*Client Area*/
Route::get('/', function(){
	$data = DB::table('banners')->select('id','name','content','image','status')->where('status',1)->first();
	$content = DB::table('contents')->select('id','content','title','status','display_number')->orderBy('display_number','DESC')->get();
	return view('client.index',compact('data','content'));
});
Route::get('ajax',['as' => 'ajaxData', 'uses' => 'ClientController@ajaxData']);
Route::get('cap-nhat-hien-thi/{id}/{number}',['as' => 'getUpdate', 'uses' => 'ClientController@getUpdate']);
/*End*/
