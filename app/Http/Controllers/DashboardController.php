<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::user()->first_time_login) {
            return view('dashboard.dashboardIndex');
        } else {
            return redirect('/firstlogin');
        }
    }

    public function toIndex() {
        return redirect('/');
    }
}
