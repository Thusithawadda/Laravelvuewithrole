@extends('layouts.app')

@section('title')
    Countries
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Update Country
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal" method="POST" action="{{ route('updateCountry',$country->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="countryName">Country Name</label>
                                        <input type="text" class="form-control" name="country_name" value="{{ $country->name }}" id="countryName" placeholder="Country Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="countryCode">Country Code</label>
                                        <input type="text" class="form-control" name="country_code" value="{{ $country->country_code }}" id="countryCode" placeholder="Country Code">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save Country</button>
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
