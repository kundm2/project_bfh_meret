<?php

namespace App\Http\Controllers;

class EventController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('events.eventsIndex');
    }
}
