<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function __construct(State $state)
    {
        $this->state = $state;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state= State::all();
        return view('state.index',['states' => $state]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        return view('state.create',['countries'=>$country]);
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
            'state' => 'required|string|max:60',
            'country_id' => 'required'
        ]);
        $state = new State();
        $state->name = $request->state;
        $state->country_id = $request->country_id;
        $state->save();

        return redirect()->route('state.index')->with('success', 'State has been Created Successfully');

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
        $state = State::findOrFail($id);
        $country = Country::all();

        $data = [
            'state'          => $state,
            'countries'         => $country,
        ];

        return view('state.update')->with($data);
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
            'state' => 'required|string|max:60',
            'country_id' => 'required'
        ]);
        $states = State::findOrFail($id);
        $states->name = $request->state;
        $states->country_id = $request->country_id;
        $states->save();

        return redirect()->route('state.index')->with('success', 'State has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::findOrFail($id);

        $state->delete();

        return redirect()->route('state.index')->with('success', 'State has been Deleted Successfully');
    }
}
