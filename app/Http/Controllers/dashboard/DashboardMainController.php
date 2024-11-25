<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMainController extends Controller
{
    public function home(){
        return view('dashboard.pages.home');
    }
}
