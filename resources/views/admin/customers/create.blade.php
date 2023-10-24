@extends('layouts.header')
@section('title','Create New Customer')
@section('content')
<div class="container">
    <br />
    @include('includes.flash')
    <br />
    <div class="card">
        <div class="card-header">
            <i class="fa fa-user-circle"></i> Create Customer
        </div>
        <div class="card-body">
            <form action="{{ route('save.customer') }}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">
                    @error('email')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Whats'App</label>
                    <input type="text" class="form-control" name="wa">
                    @error('wa')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city">
                    @error('city')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address">
                    @error('address')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-danger"> <i class="fa fa-save"></i> Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection