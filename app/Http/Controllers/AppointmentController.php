<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Flag;
use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AppointmentController extends Controller
{
    public function index($id)
    {
        $appointment = Appointment::find($id);
        $medical = Medical::find($appointment->medical_id);
        return view('appointmentpdf',compact('appointment','medical'));
    }
    public function store(Request $request)
    {
        $mediArray = [];
        $flag = Flag::find(1);
        $first = Medical::first()->id;
        $mediList = Medical::all();

        // $medcal_id = key(Arr::sort($mediArray));


        $medcal_id = $flag->key;
        $app = new Appointment();
        
        $app->medical_id = $medcal_id;

        foreach ($mediList as $medical) {
            $last_id =  $medical->id;
        }
        $next = Medical::where('id', '>', $flag->key)->min('id');
        
        if ($flag->key ==  $last_id) {
            $flag->key = $first;
        }else{
            $flag->key = $next;
        }
        

        $app->slip_no = mt_rand(1000000000,9999999999);
        $app->first_name = $request->first_name;
        $app->last_name = $request->last_name;
        // $app->first_name = $request->first_name;
        $app->dob = $request->dob;
        $app->nationality = $request->nationality;
        $app->gender = $request->gender;
        $app->marital_status = $request->marital_status;
        $app->pass_number = $request->pass_number;
        $app->pass_issue_date = $request->pass_issue_date;
        $app->pass_issue_place = $request->pass_issue_place;
        $app->pass_expiry_date = $request->pass_expiry_date;
        $app->visa_type = $request->visa_type;
        $app->email_id = $request->email_id;
        $app->phone = $request->phone;
        $app->national_id = $request->national_id;
        $app->position = $request->position;
        $app->other = $request->other;

        $app->save();
        $flag->save();
        return redirect("/appointment-pdf/$app->id");

    }

    public function appointList($id)
    {
        return view('admin.appointment-list',compact('id'));
    }
}
