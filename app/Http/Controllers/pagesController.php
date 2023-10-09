<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    // dashboard ..
    public function dashboard(){
        return view('admin.dashboard');
    }
    // create customer ..
    public function create_customer(){
        return view('admin.customers.create');
    }
    // all customers ..
    public function customers(){
        return view('admin.customers.all');
    }
    // applicatoins
    public function applications(){
        return view('admin.applications.applications');
    }
    // create applications ..
    public function create_application(){
        return view('admin.applications.create');
    }
    // settings 
    public function settings(){
        return view('admin.settings');
    }

}
