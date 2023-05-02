<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        return view('admin.visits.index', [
            'visits' => Visit::all()
        ]);
    }

    public function create()
    {
        return view('admin.visits.create', [
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        
    }
}
