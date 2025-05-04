<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 7/27/19
 * Time: 2:36 AM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
	/**
	 * 启动所有的应用服务。
	 *
	 * @return void
	 */
	public function boot(ResponseFactory $response)
	{
		view()->composer('view', function () {
			//
		});

		$response->macro('caps', function ($value) {
			//
		});
	}
}