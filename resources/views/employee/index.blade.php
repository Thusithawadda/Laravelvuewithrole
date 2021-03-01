@extends('layouts.app')

@section('title')
    Employee
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Employee
                </h4>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        @can('create employee')
                            <li class="nav-item mr-1">
                                <a class="btn btn-sm btn-primary" href="{{ route('employee.create') }}" ><i class="fas fa-plus-circle"></i> Add New</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search by name and department">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Created Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            <tr>
                                                <th scope="row">{{$employee->id}}</th>
                                                <td>{{$employee->last_name}}</td>
                                                <td>{{$employee->address}}</td>
                                                <td>{{$employee->department->name}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('employee.show',$employee->id) }}">> <i class="fa fa-eye"></i> View</a>
                                                    @can('edit employee')
                                                    <a class="btn btn-sm btn-warning" href="{{ route('employee.edit',$employee->id) }}"> <i class="fa fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @can('delete employee')
                                                    <a class="btn btn-sm btn-danger" href="{{ route('deleteEmployee',$employee->id) }}"> <i class="fa fa-trash"></i> Delete </a>
                                                    @endcan
                                                </td>
                                                <td>{{$employee->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
