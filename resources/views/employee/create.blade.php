@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Create Employee
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal" method="POST" action="{{ route('employee.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="firstName" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middleName" placeholder="Middle Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select class="form-control selectpicker" name="department_id" id="department">
                                            <option value="">{{ "" }}</option>
                                            @if ($departments->count())
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="department"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select class="form-control selectpicker" name="city_id" id="city">
                                            <option value="">{{ "" }}</option>
                                            @if ($cities->count())
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="department"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control selectpicker" name="state_id" id="state">
                                            <option value="">{{ "" }}</option>
                                            @if ($states->count())
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="department"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control selectpicker" name="country_id" id="country">
                                            <option value="">{{ "" }}</option>
                                            @if ($countries->count())
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="department"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthDate">Birth Date</label>
                                        <input type="date" name="birth_date" id="birthDate">
                                    </div>
                                    <div class="form-group">
                                        <label for="hireDate">Hire Date</label>
                                        <input type="date" name="hire_date" id="hireDate">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save Employee</button>
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
