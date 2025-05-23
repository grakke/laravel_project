<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 2018/4/10
 * Time: 8:59 PM
 */

namespace App\Http\Controllers;


class ExtendController extends Controller
{
	public function guzzle()
	{
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
		echo $res->getStatusCode();
// 200
		echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
		echo $res->getBody();
// '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.
		$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
		$promise = $client->sendAsync($request)->then(function ($response) {
			echo 'I completed! ' . $response->getBody();
		});
		$promise->wait();
	}
}