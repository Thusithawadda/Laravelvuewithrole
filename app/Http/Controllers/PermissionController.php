<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);

    }

    public function index()
    {
        $permissions = $this->permission::all();

        return view("permission.index", ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("permission.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ],
        [
            'name.required' => trans('validation.permission-name')
        ]);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        } else {

            $permission =  Permission::create([
                'name'  => $request->input('name')
            ]);

            $permission->save();

            return redirect()->route('permission.index')->with('success', trans('validation.permission-create-success'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function getAll(){
        $permissions = $this->permission->all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllPermissions(){
        $permissions = Permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }
}
