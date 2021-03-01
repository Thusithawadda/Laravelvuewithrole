<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
    public function __construct(Country $country)
    {
        $this->country = $country;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries= Country::all();
        return view('country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_name' => 'required|string|max:60',
            'country_code' => 'required|string|max:3'
        ]);

        $country = new Country();
        $country->name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();

        return redirect()->route('country.index')->with('success', 'Department has been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('country.update',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country_name' => 'required|string|max:60',
            'country_code' => 'required|string|max:3'
        ]);

        $country = Country::findOrFail($id);
        $country->name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();

        return redirect()->route('country.index')->with('success', 'Country has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        $country->delete();

        return redirect()->route('country.index')->with('success', 'Country has been Deleted Successfully');
    }


}
