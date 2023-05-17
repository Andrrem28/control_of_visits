<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Institution, Unit, User, Visit, Visitor};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'users' => User::all()->count(),
            'visits' => Visit::all()->count(),
            'visitors' => Visitor::all()->count(),
            'units' => Unit::all()->count(),
            'institutions' => Institution::all()->count(),
        ]);
    }
}
