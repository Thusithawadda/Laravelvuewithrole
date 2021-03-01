@extends('layouts.app')

@section('title')
    States
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Update state
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal" method="PUT" action="{{ route('updateState',$state->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="stateName">State</label>
                                        <input type="text" class="form-control" name="state" value="{{$state->name}}" id="stateName" placeholder="State">
                                    </div>
                                    <div class="form-group">
                                        <label for="contryName">Country</label>
                                        <select class="form-control" name="country_id" id="country_id" >
                                            <option value="">{{ trans('forms.create_order_ph_store') }}</option>
                                            @if ($countries->count())
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected="selected"' : '' }}>{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="store"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save State</button>
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
