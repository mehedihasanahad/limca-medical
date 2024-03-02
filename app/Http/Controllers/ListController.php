<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Medical;
use App\Models\User;
use Illuminate\Http\Request;
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
            $data = Appointment::where('medical_id',$request->medical_id)->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('nationality', function ($row) {
                return view("admin.nationality",compact("row"));
            })
            ->addColumn('position', function ($row) {
                return view("admin.position",compact("row"));
            })
            ->addColumn('other', function ($row) {
                return '<a href="'.'/report-entry/'.$row->id.'"><button class="btn btn-primary">Entry Report</button></a>';
            })
            ->rawColumns(['other'])
            ->make(true);
        }
    }
}
