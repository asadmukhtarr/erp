@extends('layouts.header')
@section('title','Edit Customer')
@section('content')
<div class="container">
    <br />
    @include('includes.flash')
    <br />
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user-circle"></i> Edit Customer
        </div>
        <div class="card-body">
            <form action="{{ route('update.customer',$client->id) }}" method="get">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" value="{{ $client->name }}" class="form-control" name="name">
                    @error('name')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" value="{{ $client->email }}" class="form-control" name="email">
                    @error('email')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Whats'App</label>
                    <input type="text" value="{{ $client->wa }}" class="form-control" name="wa">
                    @error('wa')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" value="{{ $client->city }}" class="form-control" name="city">
                    @error('city')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" value="{{ $client->address }}" class="form-control" name="address">
                    @error('address')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success"> <i class="fa fa-save"></i> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection