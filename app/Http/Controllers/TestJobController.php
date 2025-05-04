<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use Carbon\Carbon;
use App\Jobs\InsertJob;

class TestJobController extends Controller
{
	public function test()
	{
		// 表示一分钟后执行任务
		$job = (new InsertJob())->delay(Carbon::now()->addMinute(1));
		dispatch($job);
	}

	public function test2()
	{
		echo CommonHelper::test();
	}
}
