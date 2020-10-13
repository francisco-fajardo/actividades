<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show dashboard.
     */
    public function showDashboard()
    {
        return view('user.dashboard');
    }
}
