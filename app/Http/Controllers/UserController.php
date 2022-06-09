<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function profile(): View|Factory|Application
    {
        return view('users.profile', ['user' => Auth::user()]);
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('avatars',$filename,'public');
            Auth()->user()->update(['avatar'=>$filename]);
        }

        return view('users.profile', ['user' => Auth::user()]);
    }
}
