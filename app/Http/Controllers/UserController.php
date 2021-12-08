<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('/bussinessinfo')->with('ps_stores', auth()->
            user()->
            playStations()->
            paginate(5)
        );
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function show()
    {
        return view('profile');
    }
}
