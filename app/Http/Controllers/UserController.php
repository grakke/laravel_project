<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * 显示给定用户的个人资料。
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
//            'user' => user::findOrFail($id)
            'id' => $id,
            'message' => ' Do you believe the light?'
        ]);
    }
}
