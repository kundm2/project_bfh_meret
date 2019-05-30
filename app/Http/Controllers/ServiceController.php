<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;
use App\SSCategory;

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

    public function overview() {
        $services = Service::all()->sortBy('name');
        $categories = ServiceCategory::where('parent', null)->get();
        $usedCategories = ServiceCategory::where('parent', '!=' , null)->orWhere('id', 1)->get();
        return view('services.servicesOverview', [
            'services' => $services,
            'categories' => $categories,
            'usedCategories' => $usedCategories,
        ]);
    }

    public static function categoryList($categories) {
        $retVal = '';
        foreach ($categories as $category) {
            $retVal .= '<a href="' . $category['id'] . '">' . $category['name'] . '</a>, ';
        }
        return substr($retVal, 0, -2);
    }

    public static function categoryClassList($categories) {
        $retVal = '';
        foreach ($categories as $category) {
            $retVal .=  ' cat-' . $category['id'];
        }
        return $retVal ;
    }

    public static function getChilds($id) {
        return ServiceCategory::where('parent', $id)->get();
    }

    public static function getChildCount($id) {
        return ServiceCategory::where('parent', $id)->count();
    }

    public function new() {
        $categories = ServiceCategory::where('parent', '!=' , null)->orWhere('id', 1)->get();
        return view('services.serviceNew', [
            'categories' => $categories
        ]);
    }

    public function addNew(Request $request) {
        $this->validate($request, [
            '*' => 'required'
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->website = $request->url;
        $service->phone  = $request->phone;
        $service->save();

        foreach ($request->categories as $category) {
            $sscategory = new SSCategory();
            $sscategory->service_id = $service->id;
            $sscategory->category_id = $category;
            $sscategory->save();
        }

        return redirect('/services/add');
    }
}
