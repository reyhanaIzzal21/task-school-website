<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.pages.dashboard.index');
        } elseif (auth()->user()->hasRole('redaksi')) {
            return view('user.pages.dashboard.profile.edit');
        } elseif (auth()->user()->hasRole('user')) {
            return view('user.pages.dashboard.profile.edit');
        }
    }

    public function majors()
    {
        return view('user.pages.majors.index');
    }

    public function dashboardUser()
    {
        $articles = Article::with(['category', 'user'])->latest()->paginate(6);

        if (auth()->user()->hasRole('admin')) {
            return view('admin.pages.dashboard.index');
        } elseif (auth()->user()->hasRole('redaksi')) {
            return view('user.pages.dashboard.dashboard', compact('articles'));
        } else {
            return view('user.pages.dashboard.dashboard', compact('articles'));
        }
    }
}
