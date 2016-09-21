<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        return view('admin.index', compact('userCount'));
    }
}
