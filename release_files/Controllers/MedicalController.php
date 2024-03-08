<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.medical.medical-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medical.add-medical');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medical_centre_name' =>  'required|string|max:255|unique:'.Medical::class,
            'medical_centre_email' =>  'required|string|email|unique:'.Medical::class,
            // 'medical_centre_id' => 'required|string|max:255|unique:'.Medical::class,
            'medical_centre_address' => 'required',
            'medical_centre_mobile' => 'required',
            'medical_centre_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
//        $logo_path = null;
        $medical_centre_id = 'M-'.time();
//        if($request->hasFile('medical_centre_logo'))
//        {
//            $imageName = $medical_centre_id . '.' . $request->medical_centre_logo->extension();
//            $path = '/images/';
//            $imageName = strtr($imageName, '/', '-');
//            move_uploaded_file($request->medical_centre_logo,$path.$imageName);
//        }

        if($request->medical_centre_logo && gettype($request->medical_centre_logo) != 'string') {
            $fileName = time().'.'.$request->medical_centre_logo->getClientOriginalExtension();
            $request->medical_centre_logo->move(public_path('/images/medicals'), $fileName);
        }

        $medical_center = new Medical();
        $medical_center->medical_centre_name = $request->medical_centre_name;
        $medical_center->medical_centre_email = $request->medical_centre_email;
        $medical_center->medical_centre_id = $medical_centre_id;
        $medical_center->medical_centre_address = $request->medical_centre_address;
        $medical_center->medical_centre_mobile = $request->medical_centre_mobile;
        $medical_center->website = $request->website;
        $medical_center->is_active = 1;
        if($request->medical_centre_logo && gettype($request->medical_centre_logo) != 'string') {
            $medical_center->medical_centre_logo = '/public/images/medicals/'.$fileName;
        }
        $medical_center->save();

        return redirect()->back()->with('status', 'Successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medical = Medical::find($id);
        return view('admin.medical.medical-edit',compact('medical'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medical_center = Medical::find($id);
        if ($request->has('is_active')) {
            $medical_center->is_active = $request->is_active;
            $medical_center->save();
            return redirect()->back()->with('status', 'Successfully Updated!');
        }

        if($request->medical_centre_logo && gettype($request->medical_centre_logo) != 'string') {
            $fileName = time().'.'.$request->medical_centre_logo->getClientOriginalExtension();
            $request->medical_centre_logo->move(public_path('/images/medicals'), $fileName);
        }

        $medical_center->medical_centre_name = $request->medical_centre_name;
        $medical_center->medical_centre_email = $request->medical_centre_email;
        $medical_center->website = $request->website;
        $medical_center->medical_centre_address = $request->medical_centre_address;
        $medical_center->medical_centre_mobile = $request->medical_centre_mobile;
        if($request->medical_centre_logo && gettype($request->medical_centre_logo) != 'string') {
            $medical_center->medical_centre_logo = '/public/images/medicals/'.$fileName;
        }
        $medical_center->save();

        return redirect()->back()->with('status', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medical_center = Medical::find($id);

        foreach ($medical_center->users as $user)
        {
            if ($user->is_admin == 1) {
                $medical_center->users()->detach($user->id);

                $user->delete();
            }
            // elseif($user->user_type == 1) {
            //     $medical_center->users()->detach($user->id);
            // }
        }
        foreach ($medical_center->appointments as $value) {
            $value->delete();
        }
        // $medical_center_patients = Patient::where('medical_centre_id',$medical_center->medical_centre_id)->get();
        // foreach ($medical_center_patients as  $patient) {
        //     $file = base_path() . '/editpatient/public/decomfiles/'.$patient->patient_id.'.dcm';
        //     if (file_exists($file)) {
        //         unlink($file);
        //     }
        //     $patient->delete();
        // }
        // if (file_exists($medical_center->medical_centre_logo)) {
        //     unlink($medical_center->medical_centre_logo);
        // }
        $medical_center->delete();
        return redirect()->back()->with('status', 'Successfully Deleted!');
    }
}
