@extends('layouts.app')

@section('title')
    Cities
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Create city
                </h4>
            </div>
            <div class="card-body">
                <div>
                    <div>
                        <form class="form-horizontal" method="POST" action="{{ route('city.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cityName">City</label>
                                        <input type="text" class="form-control" name="city" id="cityName" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <label for="stateName">State</label>
                                        <select class="form-control selectpicker" name="state_id" id="state_id">
                                            <option value="">{{ "" }}</option>
                                            @if ($states->count())
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="store"><i class="fa fa-fw {{ trans('forms.create_order_icon_store') }}" aria-hidden="true"></i></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Save City</button>
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
