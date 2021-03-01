@extends('layouts.app')

@section('title')
    Departments
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Create Department
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal" method="POST" action="{{ route('department.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="departmentName">Department Name</label>
                                        <input type="text" class="form-control" name="department_name" id="departmentName" placeholder="Department Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save Department</button>
                                    <a class="btn btn-danger float-left" href="{{ URL::previous() }}">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
