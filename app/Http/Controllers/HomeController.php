<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return match (Auth::user()->role) {
            "user" => redirect('/user_dashboard'),
            "admin" => redirect('/admin_dashboard'),
            default => 403,
        };
    }
}
