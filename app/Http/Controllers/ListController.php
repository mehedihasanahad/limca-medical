<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medical;
use App\Models\MedicalReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\Report;
use Yajra\DataTables\Facades\DataTables;

class ListController extends Controller
{
    public function medicalList(Request $request)
    {
        if ($request->ajax()) {
            $data = Medical::select("*")->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('id', function ($row) {
                    return view("admin.medical-table.medical-action",compact("row"));
                })
            ->addColumn('medical_centre_logo', function ($row) {
                return view("admin.medical-table.medical-logo",compact("row"));
            })
             ->addColumn('created_at', function ($row) {
                return view("admin.medical-table.medical-created",compact("row"));
            })
            ->make(true);
        }
    }

    public function userlist(Request $request)
    {
      if ($request->ajax()) {
            $data = User::select("*")->where('is_admin',1)->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('id', function ($row) {
                    return view("admin.user-table.user-action",compact("row"));
                })
            ->addColumn('role', function ($row) {
                return view("admin.user-table.user-role",compact("row"));
            })
             ->addColumn('created_at', function ($row) {
                return view("admin.user-table.user-created",compact("row"));
            })
            ->addColumn('medical_center_id', function ($row) {
                return view("admin.user-table.medical-name",compact("row"));
            })
            ->make(true);
        }
    }

    public function appointmenlist(Request $request)
    {
        if ($request->ajax()) {
            $data = Appointment::where('medical_id',$request->medical_id)->get([
                '*',
                DB::raw('DATE(created_at) as appointment_date'),
                DB::raw("CONCAT_WS(' ', first_name, last_name) as full_name")
            ]);
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('nationality', function ($row) {
                return view("admin.nationality",compact("row"));
            })
            ->addColumn('position', function ($row) {
                return view("admin.position",compact("row"));
            })
            ->addColumn('other', function ($row) {
                $reportData = MedicalReport::where('appointment_id', $row->id)->first();
                if(Auth::user()->role == 1 && empty($reportData)) {
                    return '<a href="'.'/report-entry/'.$row->id.'"><button class="btn btn-primary mr-2 mb-2">Entry Report</button></a><a href="'.'/appointment-pdf/'.$row->id.'"><button class="btn btn-primary">View Appointment</button></a>';
                }
                if (!empty($reportData)) {
                    return '<a href="'.'/report-view/'.$reportData->id.'"><button class="btn btn-primary mr-2 mb-2">View Report</button></a><a href="'.'/appointment-pdf/'.$row->id.'"><button class="btn btn-primary">View Appointment</button></a>';
                }
                return '<a href="'.'/appointment-pdf/'.$row->id.'"><button class="btn btn-primary">View Appointment</button></a>';
            })
            ->rawColumns(['other'])
            ->make(true);
        }
    }

    public function appointmenlistAll()
    {
        $data = Appointment::leftJoin('medicals', 'appointments.medical_id', '=', 'medicals.id')
            ->select('medicals.medical_centre_name as medical_name', 'appointments.*')
            ->orderBy('appointments.id', 'desc')
            ->get();

        return DataTables::of($data)
            ->addColumn('nationality', function ($row) {
                return view("admin.nationality",compact("row"));
            })
            ->addColumn('position', function ($row) {
                return view("admin.position",compact("row"));
            })
            ->make(true);
    }
}
