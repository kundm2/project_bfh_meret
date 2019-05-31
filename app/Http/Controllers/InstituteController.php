<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class InstituteController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $institutes = Institution::all( 'id', 'lon', 'lat', 'company', 'first_name', 'name', 'address', 'postcode', 'city', 'type' )->toJson(JSON_PRETTY_PRINT);
        return view('institutes.institutesIndex', [
            'institutes' => $institutes
        ]);
    }

    public function returnData() {
        return Institution::all( 'id', 'lon', 'lat', 'company', 'first_name', 'name', 'address', 'postcode', 'city' )->toJson(JSON_PRETTY_PRINT);
    }
}
