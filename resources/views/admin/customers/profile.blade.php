@extends('layouts.header')
@section('title','All Customers')
@section('content')
@include('includes.flash')
<div class="card">
    <div class="card-header">
        <i class="fa fa-book"></i> {{ $client->name }} Applications
    </div>
    <div class="card-body">
    <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>ID</th>
                    <th>Destination</th>
                    <th>Visa Type</th>
                    <th>Total</th>
                    <th>Advance</th>
                    <th>Pending</th>
                    <th>Actions</th>
                </tr>
                @foreach($applications as $application)
                <tr>
                    <td>{{ $application->application_id }}</td>
                    <td>{{ $application->destination }}</td>
                    <td>{{ $application->visa_type }}</td>
                    <td>{{ $application->total }} pkr</td>
                    <td>{{ $application->advance }} pkr</td>
                    <td>{{ $application->pending }} pkr</td>
                    <td>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </table>
    </div>
</div>
@endsection