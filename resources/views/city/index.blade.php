@extends('layouts.app')

@section('title')
    City
@endsection

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">

                <h4 class="card-title">
                    <i class="fas fa-building nav-icon"></i>
                    Cities
                </h4>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        @can('create city')
                            <li class="nav-item mr-1">
                                <a class="btn btn-sm btn-primary" href="{{ route('city.create') }}" ><i class="fas fa-plus-circle"></i> Add New</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search by name">

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
                                            <th scope="col">City</th>
                                            <th scope="col">State</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cities as $city)
                                            <tr>
                                                <th scope="row">{{$city->id}}</th>
                                                <td>{{$city->name}}</td>
                                                <td>{{$city->state->name}}</td>
                                                <td>
                                                    @can('edit city')
                                                        <a class="btn btn-sm btn-warning" href="{{ route('city.edit',$city->id) }}"> <i class="fa fa-edit"></i> Edit</a>
                                                    @endcan
                                                    @can('delete city')
                                                        <a class="btn btn-sm btn-danger" href="{{ route('deleteCity',$city->id) }}"> <i class="fa fa-trash"></i> Delete </a>
                                                    @endcan
                                                </td>
                                                <td>{{$city->created_at}}</td>
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
