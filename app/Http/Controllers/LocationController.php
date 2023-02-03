<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Place;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function viewCountry()
    {
        $countries =  Country::paginate(
            $perPage = 4, $columns = ['*'], $pageName = 'countries'
        );
        $cities =  City::paginate(
            $perPage = 4, $columns = ['*'], $pageName = 'cities'
        );
        foreach($cities as $city)
        {
            $country = Country::where('id' , $city->coid)->first();
            $city['country_name'] = $country['name'];
        }
        $places =  Place::paginate(
            $perPage = 4, $columns = ['*'], $pageName = 'places'
        );
        foreach($places as $place)
        {
            $cityy = City::where('id' , $place->ctid)->first();
            $place['city_name'] = $cityy['name'];
        }
        return view('location.locations', compact('cities','places'))->with('countries' , $countries);
    }
    public function editCountry(Request $rqst)
    {
        $id =  array_key_first($rqst->all());
        $country = Country::find($id);
        return view('location.countryEdit')->with('country' , $country) ;
    }

    public function posteditCountry(Request $rqst)
    {
        $country = Country::find($rqst->id);
        $country->name = $rqst->name;
        $country->update();
        return redirect('/locations');
    }

    public function deleteCountry(Request $rqst)
    {
        $id =  array_key_first($rqst->all());
        $country = Country::find($id);
        return view('location.countryDelete')->with('country' , $country) ;
    }

    public function postdeleteCountry(Request $rqst)
    {
        $country = Country::find($rqst->id);
        $cities = City::where('coid' , $country->id)->get();
        foreach($cities as $city)
        {
            $places = Place::where('ctid' , $city->id)->get();
            foreach($places as $place)
            {
                $place->delete();
            }
            $city->delete();
        }
        $country->name = $rqst->name;
        $country->delete();
        return redirect('/locations');
    }
    
    public function addCountry()
    {
        return view('location.countryAdd');
    }

    public function postaddCountry(Request $rqst)
    {
        $product = new Country;
        $product->name = $rqst->name;
        $product->save();
        return redirect('/locations');
    }

    public function addCity()
    {
        $countries = Country::all();
        return view('location.cityAdd')->with('countries',$countries);
    }

    public function postaddCity(Request $rqst)
    {
        $city = new City;
        $city->name = $rqst->name;
        $city->coid = $rqst->coid;
        $city->save();
        return redirect('/locations');
    }

    public function addPlace()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('location.placeAdd' , compact('cities'))->with('countries',$countries);
    }
   
    public function fetchCity(Request $request)
    {
        $city = City::where("coid",$request->coid)->get();
        return response()->json($city);
    }

    public function postaddPlace(Request $rqst)
    {
        //dd($rqst->all());
        $place = new Place;
        $place->name = $rqst->name;
        $place->ctid = $rqst->ctid;
        $place->save();
        return redirect('/locations');
    }
}
