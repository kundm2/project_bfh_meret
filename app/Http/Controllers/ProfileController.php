<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pathology;
use App\PersonInNeed;
use Faker\Provider\es_ES\Person;

class ProfileController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile.profileIndex');
    }

    public function firstLogin() {
        $cities = City::all('postcode', 'city')->toJson(JSON_PRETTY_PRINT);
        $pathologies = Pathology::all();
        return view('profile.profileFirstLogin', [
            'cities' => $cities,
            'pathologies' => $pathologies
        ]);
    }

    public function firstLoginAdd(Request $request) {
        $this->validate($request, [
            'searchPostcode' => 'required|exists:city,postcode',
            //'birthdate' => 'required|before:tomorrow',
        ]);

        Auth::user()->postcode = $request->searchPostcode;
        Auth::user()->save();

        $user = User::find(Auth::user()->id);
        $user->postcode = $request->searchPostcode;
        $user->save();
        Auth::setUser($user);

        return redirect('firstlogin');
    }

    public function firstLoginAdd2(Request $request) {
        $this->validate($request, [
            'first_name' => 'required|alpha_dash',
            'name' => 'required|alpha_dash',
            //'birthdate' => 'required|before:tomorrow',
            'pathology' => 'required|exists:pathology,id',
        ]);

        $person = new PersonInNeed();
        $person->name = $request->name;
        $person->first_name = $request->first_name;
        //$person->birthdate = $request->birthdate;
        $person->pathology_id = $request->pathology;
        $person->user_id = Auth::user()->id;
        $person->save();

        $user = User::find(Auth::user()->id);
        $user->first_time_login = true;
        $user->save();
        Auth::setUser($user);

        return redirect('dashboard');
    }
}
