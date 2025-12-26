<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(), 
            'total_items' => Item::count(),

        ];

        return view('LandingPage', compact('stats'));
    }
}