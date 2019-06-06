<?php

namespace App\Http\Controllers;

use App\Institution;

class InstituteController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $institutes = Institution::all( 'id', 'lon', 'lat', 'company', 'first_name', 'name', 'address', 'postcode', 'city', 'type' )->take(99)->toJson(JSON_PRETTY_PRINT);

        return view('institutes.institutesIndex', [
            'institutes' => $institutes
        ]);
    }

    public function returnData() {
        return Institution::all( 'id', 'lon', 'lat', 'company', 'first_name', 'name', 'address', 'postcode', 'city' )->toJson(JSON_PRETTY_PRINT);
    }

    public function singleInstitute($id) {
        $institution = Institution::findOrFail($id);
        return view('institutes.single', [
            'institution' => $institution
        ]);
    }
}
