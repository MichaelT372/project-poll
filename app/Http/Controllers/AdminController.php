<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Poll;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $pollCount = Poll::count();
        return view('admin.index', compact('userCount', 'pollCount'));
    }

    public function polls()
    {
        $polls = Poll::paginate(20);
        return view('admin.polls', compact('polls'));
    }

    public function poll($slug)
    {
        $poll = Poll::whereSlug($slug)->firstOrFail();
        return view('admin.poll', compact('poll'));
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }

    public function user($id)
    {
        $user = User::whereId($id)->firstOrFail();
        return view('admin.user', compact('user'));
    }
}
