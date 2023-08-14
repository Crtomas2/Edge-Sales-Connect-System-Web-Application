<?php

namespace App\Http\Controllers;

use App\Models\StoreItem;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index () 
    {
        $stores = StoreItem::get();

        if (!auth()->check() || auth()->user()->UserRole !== 'Admin') {
            abort(403, 'Unauthorized Access to this page');
               
        }
        
        return view('store.index', compact('stores'));
    }

    public function edit (StoreItem $store)
    {
        return view('store.edit', compact('store'));
    }
    
}
