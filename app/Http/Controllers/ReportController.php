<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MedicalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    /**
     * reportView report view page rendering
     * @param appointmentId $id
     * @response redirect
     */
    public function reportView($id) {
        $appointmentData = Appointment::leftJoin('medicals', 'appointments.medical_id', '=', 'medicals.id')
            ->where('appointments.id', $id)
            ->first([
                'medicals.id as medical_data_id',
                'medicals.*',
                'appointments.*'
            ]);

        return view('report', compact('appointmentData'));
    }

    /**
     * reportStore store report data
     * @param Request $request
     * @param appointmentId $id
     * @response redirect
    */
    public function reportStore(Request $request, $id) {
        try {
            $medical_id = Appointment::where('id', $id)->select(['medical_id'])->first()->medical_id;
            if(gettype($request->profile_image) == 'object') {
                $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path('/images/reports'), $fileName);
            }

            #store medical report
            $medicalReport = new MedicalReport();
            $medicalReport->report_date = $request->report_date;
            $medicalReport->report_exp_date = $request->report_exp_date;
            $medicalReport->eye_rt_result = $request->eye_rt_result;
            $medicalReport->height = $request->height;
            $medicalReport->weight = $request->weight;
            $medicalReport->age = $request->age;
            $medicalReport->religion = $request->religion;
            $medicalReport->urine_sugar_result = $request->urine_sugar_result;
            $medicalReport->eye_lt_result = $request->eye_lt_result;
            $medicalReport->urine_albumin_result = $request->urine_albumin_result;
            $medicalReport->ear_rt_result = $request->ear_rt_result;
            $medicalReport->urine_bilharziasis_result = $request->urine_bilharziasis_result;
            $medicalReport->ear_lt_result = $request->ear_lt_result;
            $medicalReport->urine_pregnancy_result = $request->urine_pregnancy_result;
            $medicalReport->stool_helminthes_result = $request->stool_helminthes_result;
            $medicalReport->stool_giardia_result = $request->stool_giardia_result;
            $medicalReport->cardio_bp_result = $request->cardio_bp_result;
            $medicalReport->stool_bilharziasis_result = $request->stool_bilharziasis_result;
            $medicalReport->cardio_heart_result = $request->cardio_heart_result;
            $medicalReport->stool_salmonella_result = $request->stool_salmonella_result;
            $medicalReport->stool_cholera_result = $request->stool_cholera_result;
            $medicalReport->respiratory_lungs_result = $request->respiratory_lungs_result;
            $medicalReport->blood_group_result = $request->blood_group_result;
            $medicalReport->chest_xray_result = $request->chest_xray_result;
            $medicalReport->blood_haemoglobin_result = $request->blood_haemoglobin_result;
            $medicalReport->gastro_abdomen_result = $request->gastro_abdomen_result;
            $medicalReport->hernia_result = $request->hernia_result;
            $medicalReport->blood_malaria_result = $request->blood_malaria_result;
            $medicalReport->varicose_venis_result = $request->varicose_venis_result;
            $medicalReport->micro_filaria_result = $request->micro_filaria_result;
            $medicalReport->extremities_result = $request->extremities_result;
            $medicalReport->deformities_result = $request->deformities_result;
            $medicalReport->blood_RBS_result = $request->blood_RBS_result;
            $medicalReport->skin_result = $request->skin_result;
            $medicalReport->blood_LFT_sgot_result = $request->blood_LFT_sgot_result;
            $medicalReport->blood_LFT_sgpt_result = $request->blood_LFT_sgpt_result;
            $medicalReport->venereal_diseases_clinical_result = $request->venereal_diseases_clinical_result;
            $medicalReport->CNS_result = $request->CNS_result;
            $medicalReport->blood_LFT_Sbilirubin_result = $request->blood_LFT_Sbilirubin_result;
            $medicalReport->psychiatry_result = $request->psychiatry_result;
            $medicalReport->blood_creatinine_result = $request->blood_creatinine_result;
            $medicalReport->physical_condition = $request->physical_condition;
            $medicalReport->blood_hiv_result = $request->blood_hiv_result;
            $medicalReport->blood_hbsag_result = $request->blood_hbsag_result;
            $medicalReport->blood_antiHCV_result = $request->blood_antiHCV_result;
            $medicalReport->blood_vdrl_result = $request->blood_vdrl_result;
            $medicalReport->blood_tpha_result = $request->blood_tpha_result;
            $medicalReport->appointment_id = $id;
            if(gettype($request->profile_image) == 'object') {
                $medicalReport->profile_image = '/images/reports/'.$fileName;
            }
            $medicalReport->created_by = Auth::user()->id;

            if ($medicalReport->save()) {
                return redirect("/appointment-list/$medical_id")->with('status', 'Report Generated Successfully');
            }
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine(), $e->getFile());
        }
    }

    public function reportList() {
        return view('admin.report-list');
    }

    public function reportListAPI(Request $request) {
        $data = MedicalReport::leftJoin('appointments', 'appointments.id', '=', 'medical_reports.appointment_id')
            ->whereBetween(DB::raw('DATE(medical_reports.created_at)'), [$request->from_date, $request->end_date])
            ->get([
            'appointments.id as appointment_data_id',
            'appointments.*',
            'medical_reports.*',
            DB::raw('DATE(medical_reports.created_at) as report_date'),
            DB::raw("CONCAT_WS(' ', appointments.first_name, appointments.last_name) as full_name")
        ]);
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<a href="'.'/report-edit/'.$row->id.'"><button class="btn btn-primary mb-2">Edit</button></a> <a href="'.'/report-view/'.$row->id.'"><button class="btn btn-primary mb-2">View</button></a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function reportedit($id) {
        $reportData = MedicalReport::where('id', $id)->first();

        $appointmentData = Appointment::leftJoin('medicals', 'appointments.medical_id', '=', 'medicals.id')
            ->where('appointments.id', $reportData->appointment_id)
            ->first([
                'medicals.id as medical_data_id',
                'medicals.*',
                'appointments.*'
            ]);

        return view('report.report-edit', compact('appointmentData', 'reportData'));
    }

    public function reportUpdate(Request $request, $id) {
        try {
            $medicalReport = MedicalReport::findOrFail($id);

            $medical_id = Appointment::where('id', $medicalReport->appointment_id)->select(['medical_id'])->first()->medical_id;

            if($request->profile_image && gettype($request->profile_image) !== 'string') {
                $fileName = time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path('/images/reports'), $fileName);
            }

            #store medical report
            $medicalReport->report_date = $request->report_date;
            $medicalReport->report_exp_date = $request->report_exp_date;
            $medicalReport->eye_rt_result = $request->eye_rt_result;
            $medicalReport->height = $request->height;
            $medicalReport->weight = $request->weight;
            $medicalReport->age = $request->age;
            $medicalReport->religion = $request->religion;
            $medicalReport->urine_sugar_result = $request->urine_sugar_result;
            $medicalReport->eye_lt_result = $request->eye_lt_result;
            $medicalReport->urine_albumin_result = $request->urine_albumin_result;
            $medicalReport->ear_rt_result = $request->ear_rt_result;
            $medicalReport->urine_bilharziasis_result = $request->urine_bilharziasis_result;
            $medicalReport->ear_lt_result = $request->ear_lt_result;
            $medicalReport->urine_pregnancy_result = $request->urine_pregnancy_result;
            $medicalReport->stool_helminthes_result = $request->stool_helminthes_result;
            $medicalReport->stool_giardia_result = $request->stool_giardia_result;
            $medicalReport->cardio_bp_result = $request->cardio_bp_result;
            $medicalReport->stool_bilharziasis_result = $request->stool_bilharziasis_result;
            $medicalReport->cardio_heart_result = $request->cardio_heart_result;
            $medicalReport->stool_salmonella_result = $request->stool_salmonella_result;
            $medicalReport->stool_cholera_result = $request->stool_cholera_result;
            $medicalReport->respiratory_lungs_result = $request->respiratory_lungs_result;
            $medicalReport->blood_group_result = $request->blood_group_result;
            $medicalReport->chest_xray_result = $request->chest_xray_result;
            $medicalReport->blood_haemoglobin_result = $request->blood_haemoglobin_result;
            $medicalReport->gastro_abdomen_result = $request->gastro_abdomen_result;
            $medicalReport->hernia_result = $request->hernia_result;
            $medicalReport->blood_malaria_result = $request->blood_malaria_result;
            $medicalReport->varicose_venis_result = $request->varicose_venis_result;
            $medicalReport->micro_filaria_result = $request->micro_filaria_result;
            $medicalReport->extremities_result = $request->extremities_result;
            $medicalReport->deformities_result = $request->deformities_result;
            $medicalReport->blood_RBS_result = $request->blood_RBS_result;
            $medicalReport->skin_result = $request->skin_result;
            $medicalReport->blood_LFT_sgot_result = $request->blood_LFT_sgot_result;
            $medicalReport->blood_LFT_sgpt_result = $request->blood_LFT_sgpt_result;
            $medicalReport->venereal_diseases_clinical_result = $request->venereal_diseases_clinical_result;
            $medicalReport->CNS_result = $request->CNS_result;
            $medicalReport->blood_LFT_Sbilirubin_result = $request->blood_LFT_Sbilirubin_result;
            $medicalReport->psychiatry_result = $request->psychiatry_result;
            $medicalReport->blood_creatinine_result = $request->blood_creatinine_result;
            $medicalReport->physical_condition = $request->physical_condition;
            $medicalReport->blood_hiv_result = $request->blood_hiv_result;
            $medicalReport->blood_hbsag_result = $request->blood_hbsag_result;
            $medicalReport->blood_antiHCV_result = $request->blood_antiHCV_result;
            $medicalReport->blood_vdrl_result = $request->blood_vdrl_result;
            $medicalReport->blood_tpha_result = $request->blood_tpha_result;
            if($request->profile_image && gettype($request->profile_image) !== 'string') {
                $medicalReport->profile_image = '/images/reports/'.$fileName;
            }
            $medicalReport->created_by = Auth::user()->id;

            if ($medicalReport->save()) {
                return redirect("/reports/list")->with('status', 'Report Generated Successfully');
            }
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine(), $e->getFile());
        }
    }

    public function reportViewPage($id) {
        $reportData = MedicalReport::where('id', $id)->first();

        $appointmentData = Appointment::leftJoin('medicals', 'appointments.medical_id', '=', 'medicals.id')
            ->where('appointments.id', $reportData->appointment_id)
            ->first([
                'medicals.id as medical_data_id',
                'medicals.*',
                'appointments.*'
            ]);

        return view('report.report-view', compact('appointmentData', 'reportData'));
    }

    public function searchBySlipNo(Request $request) {

        $medical_data = MedicalReport::join('appointments', 'appointments.id', '=', 'medical_reports.appointment_id')
            ->where('appointments.slip_no', $request->slip_no)
            ->first([
                'appointments.id as appointment_id',
                'appointments.*',
                'medical_reports.id as medical_report_id',
                'medical_reports.*'
            ]);

        if(empty($medical_data)) {
            return back()->with('error', "Report Not Found By Slip NO: <strong>$request->slip_no</strong>");
        }

        return redirect("/medical-report/$request->slip_no");
    }

    public function medicalReportView($slip_no) {
        $medical_data = MedicalReport::leftJoin('appointments', 'appointments.id', '=', 'medical_reports.appointment_id')
            ->where('appointments.slip_no', $slip_no)
            ->first([
                'appointments.id as appointment_id',
                'appointments.*',
                'medical_reports.id as medical_report_id',
                'medical_reports.*'
            ]);

        $reportData = MedicalReport::where('id', $medical_data->medical_report_id)->first();

        $appointmentData = Appointment::leftJoin('medicals', 'appointments.medical_id', '=', 'medicals.id')
            ->where('appointments.id', $medical_data->appointment_id)
            ->first([
                'medicals.id as medical_data_id',
                'medicals.*',
                'appointments.*'
            ]);

        return view('report.searchedReportView', compact('appointmentData', 'reportData'));
    }

}
