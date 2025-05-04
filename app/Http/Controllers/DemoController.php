<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
	public function request(Request $request)
	{
		$validatedData = $request->validate([
			'title' => 'required|unique:posts|max:255',
			'body' => 'required',
		]);

		$uri = $request->path();
		$input = $request->all();
		$method = $request->method();
		// 不附带查询串...
		$url = $request->url();
// 附带查询串...
		$fullUrl = $request->fullUrl();

		$name = $request->input('name', 'Sally');
		$names = $request->input('products.*.name');
		$query = $request->query();
		$name = $request->query('name');
		$name = $request->name;
		$name = $request->input('user.name');
		$input = $request->only(['username', 'password']);
		$input = $request->only('username', 'password');
		$input = $request->except(['credit_card']);
		$input = $request->except('credit_card');

		$request->flash();
		$request->flashOnly(['username', 'email']);
		$request->flashExcept('password');

		$value = $request->cookie('name');
		Cookie::queue(Cookie::make('name', 'value', $minutes));
		$cookie = cookie('name', 'value', $minutes);

		$file = $request->file('photo');
		$file = $request->photo;
		$path = $request->photo->path();
		$extension = $request->photo->extension();
		$path = $request->photo->store('images', 's3');
		$path = $request->photo->storeAs('images', 'filename.jpg', 's3');
		if ($request->file('photo')->isValid()) {
			//
		}

		return redirect('form')->withInput(
			$request->except('password')
		);
		return response('Hello World')->cookie(
			'name', 'value', $minutes, $path, $domain, $secure, $httpOnly
		);
		$username = $request->old('username');
		if ($request->has(['name', 'email'])) {
			//
		}
	}

	public function response(\Closure $content)
	{


		return response($content)
			->header('Content-Type', $type)
			->header('X-Header-One', 'Header Value')
			->header('X-Header-Two', 'Header Value')->cookie('name', 'value', $minutes);

		return redirect()->route('profile', ['id' => 1]);
		return redirect()->action(
			'UserController@profile', ['id' => 1]
		);
		return redirect()->away('https://www.google.com');
		return response()
			->view('hello', $data, 200)
			->header('Content-Type', $type);
		return response()->json([
			'name' => 'Abigail',
			'state' => 'CA'
		]);
		// JSONP
		return response()
			->json(['name' => 'Abigail', 'state' => 'CA'])
			->withCallback($request->input('callback'));

		return response()->download($pathToFile);
		return response()->download($pathToFile, $name, $headers);
		return response()->download($pathToFile)->deleteFileAfterSend();

		return response()->streamDownload(function () {
			echo GitHub::api('repo')
				->contents()
				->readme('laravel', 'laravel')['contents'];
		}, 'laravel-readme.md');

		return response()->file($pathToFile, $headers);
		
	}

	public function view()
	{
		return view('child');
	}
}
