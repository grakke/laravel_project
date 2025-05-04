<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('welcome');
})->name('home');
// 路由视图
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
Route::get('foo', function (Request $request) {
    return 'Hello World';
});

Route::get('/demo/request', 'DemoController@request');
Route::get('/demo/view', 'DemoController@view');
Route::get('/demo/response', 'DemoController@response');
Route::post('/demo/response', function () {
    //验证请求

    return back()->withInput();
});
Route::get('/user', 'UserController@index');

Route::get('/queue/test', 'QueueController@test');
// 命名
//Route::get('user/profile', function () {
//	return 'User Profile';
//})->name('profile');
Route::get('user/{id}/profile', function ($id) {
    return 'User Profile ' . $id;
})->where('id', '[0-9]+')->name('profile_user');

// 必填参数
//Route::get('user/{id}', 'UserController@show')->where('id', '[0-9]+')->name('profile');
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    //
});
Route::match(['get', 'post', 'put'], 'user/update/{id}', 'UserController@update')->name('user_update');
Route::put('user/{id}', 'UserController@update');

Route::get('/user/check/{age}', 'UserController@check')->middleware('check')->where('id', '[0-9]+');

// 可选参数
Route::get('user/{name?}', function ($name = 'John') {

    return $name;
})->where('name', '[A-Za-z]+');
Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

# 重定向 默认302 自定义301
//Route::redirect('/redirect', '/user', 301);
Route::permanentRedirect('/redirect', '/user');

// 路由组 路由之间共享路由属性，例如中间件或命名空间
//Route::middleware(['first', 'second'])->group(function () {
//	Route::get('/', function () {
//		// // 使用 first 和 second 中间件
//	});
//

//	Route::get('user/profile', function () {
//		// // 使用 first 和 second 中间件
//	});
//});
//Route::namespace('Admin')->group(function () {
//	// 在 "App\Http\Controllers\Admin" 命名空间下的控制器
//});

//Route::prefix('admin')->group(function () {
//	Route::get('users', function () {
//		// 匹配包含 "/admin/users" 的 URL
//	});
//});
//Route::name('admin.')->group(function () {
//	Route::get('users', function () {
//		// 指定路由名为 "admin.users"...
//	})->name('users');
//});

// 路由模型绑定 :行为注入模型 ID 时，就需要查询这个 ID 对应的模型
// 隐式绑定
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});
// 显式绑定
Route::get('profile/{user}', function (App\User $user) {
    //
});

Route::get('photos/popular', 'PhotoController@method');
/*GET	/photos	index	photos.index
GET	/photos/create	create	photos.create
POST	/photos	store	photos.store
GET	/photos/{photo}	show	photos.show
GET	/photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
DELETE	/photos/{photo}	destroy	photos.destroy*/
Route::resource('photos', 'PhotoController')->names([
    'create' => 'photos.build'
])->parameters([
    'users' => 'admin_user'
])->only([
    'index', 'show'
])->except([
    'create', 'store', 'update', 'destroy'
]);

// 指定一个经过身份验证并且用户每分钟访问频率不超过 60 次的路由组
Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});
//  动态请求的最大值
Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {
    Route::get('/user', function () {
        //
    });
});

// 回退路由 没有其他路由匹配传入请求时执行的路由
// 是应用程序注册的最后一个路由
Route::fallback(function () {
//	redirect()->route('home');
//	die;
    echo 'Page not exist';
    sleep(3);
    echo redirect()->route('home');
});


Route::get('/home', 'HomeController@index')->name('home');

require __DIR__ . '/auth.php';
