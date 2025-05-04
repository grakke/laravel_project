<?php

namespace App\Http\Controllers;

use App\Jobs\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
	public function Test()
	{

		$arr = array(
			'time' => time(),
			'title' => 'title',
			'author_id'=> 'author_id',
			'content'=> 'content',
			'description'=> 'description',
		);

		$this->dispatch(new Queue($arr));

		return response()->json(['code'=>0, 'msg'=>"success"]);
	}
}
