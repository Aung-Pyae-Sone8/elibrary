<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //admin home page
    public function index(){
        dd(Auth::user()->role);
        return redirect()->route('admin#home');
    }
}
