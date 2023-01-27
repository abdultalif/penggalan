<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('dashboard');
        }

        return view('dashboard2');
    }
}
