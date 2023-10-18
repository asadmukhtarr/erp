@extends('layouts.header')
@section('title','Dashbaord')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            All Applications
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th>ID</th>
                    <th>Client</th>
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
                    <td>{{ $application->client_id }}</td>
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
</div>
@endsection