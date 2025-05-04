<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
//		$this->middleware('auth');
//		$this->middleware('log')->only('index');
//		$this->middleware('subscribed')->except('store');
        $this->middleware(function ($request, $next) {
            // ...

            return $next($request);
        });
    }

    public function index()
    {
        return "UserController@index";
    }

    /**
     * 显示给定用户的信息。
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $user = Cache::get('user:' . $id);
        if (!$user) {
            $user = User::findOrFail($id);

            Cache::set($id, $user);
        }

        return view('user.profile', ['user' => $user]);
    }

    public function redirect()
    {

    }

    public function profile()
    {
        echo route('profile') . '<br>';
        return redirect()->route('profile');

        echo route('profile', ['id' => 1]) . '<br>';
        echo Route::currentRouteAction() . '<br>';
        echo Route::currentRouteName() . '<br>';

//		print_r(Route::current());
    }

    /**
     * Update the given user.
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        return view('user.update', ['id' => $id]);
    }

    public function check(Request $request)
    {
        return $request->path() . "<br>" . $request->url() . "<br>" . $request->fullUrl() . "<br>" . 'UserController@check';
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $uri = $request->path();
        echo $uri;
    }

    /**
     * Store a secret message for the user.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function storeSecret(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill([
            'secret' => Crypt::encryptString($request->secret),
        ])->save();
    }
}
