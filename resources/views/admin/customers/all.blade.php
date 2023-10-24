@extends('layouts.header')
@section('title','All Customers')
@section('content')
@include('includes.flash')
<div class="card">
    <div class="card-header"><i class="fa fa-users"></i> All Clients</div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Applications</th>
                <th>What's App</th>
                <th>Actoins</th>
            </tr>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->applications->count() }}</td>
                <td>{{ $client->wa }}</td>
                <td>
                    <a href="{{ route('delete.customer',$client->id) }}">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </a>
                    <a href="{{ route('customer.applications',$client->id) }}">
                        <button class="btn btn-info"><i class="fa fa-arrow-right"></i></button>
                    </a>
                    <a href="{{ route('edit.customer',$client->id) }}">
                        <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection