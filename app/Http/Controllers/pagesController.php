<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\applicatoin;
use Carbon\Carbon;
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
        $clients = client::orderby('id','desc')->get();
        return view('admin.customers.all',compact('clients'));
    }
    // for save customer 
    public function save(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|unique:clients',
            'wa' => 'required|unique:clients',
            'city' => 'required',
            'address' => 'required'
        ]);
        $client = new client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->wa = $request->wa;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->save();
        return redirect(route('admin.customers'))->with('message','Client Is Added Successfully');
    }
    public function salman($id){
        $client = client::find($id);
        $client->delete();  
        return redirect()->back()->with('delete','Client Deleted Succesfully');
    }
    //
    public function edit_salman($id){
        $client = client::find($id);
        return view('admin.customers.edit',compact('client'));
    }
    public function update_salman($id,Request $request){
        $client = client::find($id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->wa = $request->wa;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->save();
        return redirect()->back()->with('message','Client Updated Succesfully');
    }
    // applicatoins
    public function applications(){
        $applications = applicatoin::all();
        return view('admin.applications.applications',compact('applications'));
    }
    // create applications ..
    public function create_application(){
        $customers = client::all();
        return view('admin.applications.create',compact('customers'));
    }
    // settings 
    public function settings(){
        return view('admin.settings');
    }
    // sub application ..
    public function submit_applicaiton(Request $request){
        $validated = $request->validate([
            'destination' => 'required',
            'vt' => 'required',
            'application_charges' => 'required',
            'advance_money' => 'required',
            'customer' => 'required'
        ]);
        $application = new applicatoin;
        $application->destination = $request->destination;
        $application->visa_type = $request->vt;
        $application->total = $request->application_charges;
        $application->advance = $request->advance_money;
        $application->pending = $request->application_charges - $request->advance_money;
        $application->client_id = $request->customer;
        $application->save();
        $id    = $application->id;
        $month = Carbon::now()->format('m');
        $year  = Carbon::now()->format('y');
        $code  = "ERP/".$month.'/'.$year.'/'.$id;
        $app   = applicatoin::find($id);
        $app->application_id = $code;
        $app->save();
        return redirect()->back()->with('message','Application Create Successfully');
        
    }

}
