<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee   = Employee::all();

        return view('employee.index',['employees'=>$employee ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city= City::all();
        $state = State::all();
        $country = Country::all();
        $department = Department::all();
        $data = [
            'states'       => $state,
            'cities'         => $city,
            'countries'     => $country,
            'departments'    => $department,
        ];
        return view('employee.create')->with($data);
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
            'last_name' => 'required|string|max:60',
            'first_name' => 'required|string|max:60',
            'address' => 'required|string|max:60',
            'department_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'zip'   =>  'required'
        ]);

        $employee = new Employee();
        $employee->last_name = $request->last_name;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->city_id = $request->city_id;
        $employee->state_id = $request->state_id;
        $employee->country_id = $request->country_id;
        $employee->zip = $request->zip;
        $employee->date_hired = $request->hire_date;
        $employee->birth_date = $request->birth_date;

        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee has been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $city= City::all();
        $state = State::all();
        $country = Country::all();
        $department = Department::all();

        $data = [
            'states'          => $state,
            'countries'         => $country,
            'cities'        => $city,
            'departments'   => $department,
            'employee'      => $employee
        ];

        return view('employee.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $city= City::all();
        $state = State::all();
        $country = Country::all();
        $department = Department::all();

        $data = [
            'states'          => $state,
            'countries'         => $country,
            'cities'        => $city,
            'departments'   => $department,
            'employee'      => $employee
        ];

        return view('employee.update')->with($data);
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
            'last_name' => 'required|string|max:60',
            'first_name' => 'required|string|max:60',
            'address' => 'required|string|max:60',
            'department_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'zip'   =>  'required'
        ]);

        $employee = Employee::findOrFail($id);

        $employee->last_name = $request->last_name;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->city_id = $request->city_id;
        $employee->state_id = $request->state_id;
        $employee->country_id = $request->country_id;
        $employee->zip = $request->zip;
        $employee->birth_date = $request->birth_date;
        $employee->date_hired = $request->hire_date;
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee has been Deleted Successfully');
    }
}
