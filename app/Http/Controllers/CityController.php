<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city= City::all();
        return view('city.index',['cities' => $city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::all();
        return view('city.create',['states'=>$state]);
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
            'city' => 'required|string|max:60',
            'state_id' => 'required'
        ]);

        $city = new City();
        $city->name = $request->city;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->route('city.index')->with('success', 'City has been Created Successfully');
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
        $city = City::findOrFail($id);
        $state = State::all();

        $data = [
            'states'       => $state,
            'city'         => $city,
        ];

        return view('city.update')->with($data);
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
            'city' => 'required|string|max:60',
            'state_id' => 'required'
        ]);

        $city = City::findOrFail($id);
        $city->name = $request->city;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->route('city.index')->with('success', 'City has been Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('city.index')->with('success', 'City has been Deleted Successfully');
    }
}
