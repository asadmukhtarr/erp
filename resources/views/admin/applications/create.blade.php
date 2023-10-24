@extends('layouts.header')
@section('title','Dashbaord')
@section('content')
<div class="container">
    <br />
    @include('includes.flash')
    <br />
    <div class="card">
        <div class="card-header">
            <i class="fa fa-envelope"></i> Create Application 
        </div>
        <div class="card-body">
            <form action="{{ route('submit.application') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Destination</label>
                        <input type="text" class="form-control" @error('destination') style="border:1px solid red;" @enderror name="destination" />
                    </div>
                    <div class="col-lg-6">
                        <label for="">Visa Type</label>
                        <select name="vt" @error('vt') style="border:1px solid red;" @enderror class="form-control" id="">
                            <option>Select Visa</optoin>
                            <option value="student visa">Student Visa</option>
                            <option value="Family Imigration">Family Imigration</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Application Charges</label>
                        <input type="number" @error('application_charges') style="border:1px solid red;" @enderror class="form-control" name="application_charges" />
                    </div>
                    <div class="col-lg-6">
                        <label for="">Advance money</label>
                        <input type="number" @error('advance_money') style="border:1px solid red;" @enderror class="form-control" name="advance_money" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Select Customer</label>
                        <select name="customer" class="form-control" @error('customer') style="border:1px solid red;" @enderror id="">
                            <option>Select Customer</optoin>
                            @foreach($customers as $customer)
                            <option value="{{  $customer->id }}">{{  $customer->name }}</optoin>
                            @endforeach
                        </select>
                    </div>
                </div> <br />
                <div class="form-group">
                    <label for="">Upload File</label>
                    <input type="file" name="pdffile"> <br />
                    @error('pdffile')
                    <font color="red"><b>
                        {{ $message }}
                    </b></font>
                    @enderror
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-danger float-right">Procceed</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection