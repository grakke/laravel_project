<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * @SWG\Swagger(
 *   schemes={"http"},
 *   host="api.my_project.com",
 *   consumes={"multipart/form-data"},
 *   produces={"application/json"},
 *
 *   @SWG\Tag(
 *     name="User",
 *     description="用户操作",
 *   ),
 *
 *   @SWG\Tag(
 *     name="MainPage",
 *     description="首页模块",
 *   ),
 *
 *   @SWG\Tag(
 *     name="News",
 *     description="新闻资讯",
 *   ),
 *
 *   @SWG\Tag(
 *     name="Misc",
 *     description="其他接口",
 *   ),
 * )
 */
class SwaggerController extends Controller
{
	/**
	 * 返回JSON格式的Swagger定义
	 *
	 * @SWG\Swagger(
	 *   @SWG\Info(
	 *     title="我的`Swagger`API文档",
	 *     version="1.0.0"
	 *   ),
	 * )
	 */
	public function getJSON()
	{
		$swagger = \Swagger\scan(app_path('Http/Controllers/'));

		return response()->json($swagger, 200);
	}

	/**
	 * 假设是项目中的一个API
	 *
	 * @SWG\Get(path="/swagger/my-data",
	 * tags={"project"},
	 * summary="拿一些神秘的数据",
	 * description="请求该接口需要先登录。",
	 * operationId="getMyData",
	 * produces={"application/json"},
	 * @SWG\Parameter(
	 * in="formData",
	 * name="reason",
	 * type="string",
	 * description="拿数据的理由",
	 * required=true,
	 * ),
	 * @SWG\Response(response="default", description="操作成功")
	 * )
	 */
	public function getMyData()
	{
		$swagger = \Swagger\scan(app_path('Http/Controllers/'));

		return response()->json($swagger, 200);
	}

	/**
	 * @SWG\Post(path="/user/login", tags={"User"},
	 *   summary="登录接口(用户名+密码)",
	 *   description="用户登录接口,账号可为 用户名 或 手机号. 参考(这个会在页面产生一个可跳转的链接: [用户登录注意事项](http://blog.csdn.net/liuxu0703/)",
	 *   @SWG\Parameter(name="userName", type="string", required=true, in="formData",
	 *     description="登录用户名/手机号"
	 *   ),
	 *   @SWG\Parameter(name="password", type="string", required=true, in="formData",
	 *     description="登录密码"
	 *   ),
	 *   @SWG\Parameter(name="image_list", type="string", required=true, in="formData",
	 *     @SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Image")),
	 *     description="用户相册. 好吧,没人会在登录时要求填一堆图片信息.这里是为了示例 带结构的数据, @SWG\Schema ,这个结构需要另行定义,下面会讲."
	 *   ),
	 *   @SWG\Parameter(name="video", type="string", required=true, in="formData",
	 *     @SWG\Schema(ref="#/definitions/Video"),
	 *     description="用户 呃... 视频? 同上,为了示例 @SWG\Schema ."
	 *   ),
	 *   @SWG\Parameter(name="client_type", type="integer", required=false, in="formData",
	 *     description="调用此接口的客户端类型: 1-Android, 2-IOS. 非必填,所以 required 写了 false"
	 *   ),
	 *   @SWG\Parameter(name="gender", type="integer", required=false, in="formData",
	 *     default="1",
	 *     description="性别: 1-男; 2-女. 注意这个参数的default上写的不是参数默认值,而是默认会被填写在swagger页面上的值,为的是方便用swagger就地访问该接口."
	 *   ),
	 * )
	 */
	public function loginAction()
	{
		// php code
	}

	/**
	 * @SWG\Get(path="/User/myWebPage", tags={"User"},
	 *   produces={"text/html"},
	 *   summary="用户的个人网页",
	 *   description="这不是个api接口,这个返回一个页面,所以 produces 写了 text/html",
	 *   @SWG\Parameter(name="userId", type="integer", required=true, in="query"),
	 *   @SWG\Parameter(name="userToken", type="string", required=true, in="query",
	 *     description="用户令牌",
	 *   ),
	 * )
	 */
	public function myWebPageAction()
	{
		// php code
	}
}