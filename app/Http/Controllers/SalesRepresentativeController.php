<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesRepresentativeController extends Controller
{
    public function index()
    {
        return view('Sales.dashboard');
    }

    public function show()
    {
        return view('dashboard');
    }
}
