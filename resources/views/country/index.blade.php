@extends('layouts.app')

@section('title')
    Countries
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-flag nav-icon"></i>
                    Countries
                </h4>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        @can('create country')
                            <li class="nav-item mr-1">
                                <a class="btn btn-sm btn-primary" href="{{ route('country.create') }}" ><i class="fas fa-plus-circle"></i> Add New</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search by name, Country code">

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
                                    <table id="country" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Country Code</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($countries as $country)
                                            <tr>
                                                <th scope="row">{{$country->id}}</th>
                                                <td>{{$country->name}}</td>
                                                <td>{{$country->country_code}}</td>
                                                <td>
                                                    @can('edit country')
                                                        <a class="btn btn-sm btn-warning" href="{{ route('country.edit',$country->id) }}"> <i class="fa fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @can('delete country')
                                                        <a class="btn btn-sm btn-danger" href="{{ route('deleteCountry',$country->id) }}"> <i class="fa fa-trash"></i> Delete </a>
                                                    @endcan
                                                </td>
                                                <td>{{$country->created_at}}</td>
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
@section('footer')

    <script>
        $(document).ready(function() {
            $('#country').DataTable();
        } );
    </script>
@endsection

