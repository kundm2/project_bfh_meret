<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $services = Service::all();
        return view('services.serviceIndex', [
            'services' => $services
        ]);
    }

    public static function categoryList($categories) {
        $retVal = '';
        foreach ($categories as $category) {
            $retVal .= '<a href="' . $category['id'] . '">' . $category['name'] . '</a>, ';
        }
        return $retVal ;
    }

    public static function categoryClassList($categories) {
        $retVal = '';
        foreach ($categories as $category) {
            $retVal .=  ' cat-' . $category['id'];
        }
        return $retVal ;
    }
}
