<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Flag;
use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index($id)
    {
        $appointment = Appointment::where('id', $id)->first(['*', DB::raw('DATE(created_at) as appointment_date')]);
        $medical = Medical::find($appointment->medical_id);
        return view('appointmentpdf',compact('appointment','medical'));
    }
    public function store(Request $request)
    {
        $last_submited_appointment = Appointment::latest()->first();
        $next_medical_after_last_submitted_medical = Medical::where('is_active', 1)->first();
        if ($last_submited_appointment) {
            $next_medical_after_last_submitted_medical = Medical::where('id', '>', $last_submited_appointment->medical_id)->where('is_active', 1)->first();

            if(empty($next_medical_after_last_submitted_medical)) {
                $next_medical_after_last_submitted_medical = Medical::first();
            }
        }




//
//        $mediArray = [];
//        $flag = Flag::find(1);
//        $first = Medical::first()->id;
//        $mediList = Medical::all();

        // $medcal_id = key(Arr::sort($mediArray));


//        $medcal_id = $flag->key;
        $app = new Appointment();

        $app->medical_id = $next_medical_after_last_submitted_medical->id;

//        foreach ($mediList as $medical) {
//            $last_id =  $medical->id;
//        }
//        $next = Medical::where('id', '>', $flag->key)->min('id');
//
//        if ($flag->key ==  $last_id) {
//            $flag->key = $first;
//        }else{
//            $flag->key = $next;
//        }


        $app->slip_no = 'LIMCA-' . mt_rand(111111, 999999); // unique slip no
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
//        $flag->save();
        return redirect("/appointment-pdf/$app->id?before_route=appointment");

    }

    public function appointList($id)
    {
        return view('admin.appointment-list',compact('id'));
    }
}
