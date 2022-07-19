<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function store(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $masuk['avatar'] = $request->file('avatar')->getClientOriginalName();
            //simpan file avatar
            $request->file("avatar")->move("img/users/", $masuk['avatar']);
        }

        $masuk['email'] = $request->email;
        $masuk['password'] = Hash::make($request->password);
        $masuk['name'] = $request->name;

        User::create($masuk);
    }

    function dologin(Request $request)
    {
        $cek = User::where("email", $request->email)->first();

        if (empty($cek)) {
            return array();
        } else {
            if (Hash::check($request->password, $cek->password)) {
                return $cek;
            } else {
                return array();
            }
        }
        // return $cek;
    }

    function email(Request $request)
    {
        return User::where("email", $request->email)->first();
    }

    function update($id, Request $request)
    {
        $masuk['avatar'] = $request->file('avatar')->getClientOriginalName();
        $request->file("avatar")->move("img/users/", $masuk['avatar']);

        User::find($id)->update($masuk);
    }
}
