@extends('layout.app')
@push('css')
    <link href="{{asset('/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('upper-headline')
    HOME/MEDICAL CENTRE LIST
@endsection
@section('content')
    <style>
        input {
            background: #E9ECEF;
            outline: 1px solid black;
            border: none;
            width: 100%;
        }
        table {
            width: 900px;
            color: black;
            margin-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            padding: 4px;
        }
        .text-center {
            text-align: center;
        }
        form {
            margin-bottom: 50px;
        }
    </style>

    <form action="/report-store/{{$appointmentData['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td colspan="4">DETAILED CANDIDATE REPORT</td>
                <td>LIMCA Slip No. </td>
                <td colspan="2">{{$appointmentData['slip_no'] ?? ''}}</td>
            </tr>

            <tr>
                <td rowspan="3">
                    <img src="{{url(ltrim($appointmentData['medical_centre_logo'] ?? '', 'public'))}}"
                         style="height: 90px; width: 130px; object-fit: contain;" alt="Medical center image"/>
                </td>
                <td rowspan="3" colspan="3">
                    <h5>{{$appointmentData['medical_centre_name'] ?? ''}}</h5>
                    <p>{{$appointmentData['medical_centre_address'] ?? ''}}</p>
                </td>
                <td>Date Examined </td>
                <td colspan="2"><input type="date" name="report_date" required/></td>
            </tr>

            <tr>
                <td>Report Expiry Date</td>
                <td colspan="2"><input type="date" name="report_exp_date" required/></td>
            </tr>

            <tr>
                <td>
                    <h6>Reg. ID </h6>
                </td>
                <td colspan="2">
                    <h6>LB-24-02-1</h6>
                </td>
            </tr>

            <tr>
                <td colspan="4" class="text-center"><h6>CANDIDATE INFORMATION</h6></td>
                <td>Passport No. </td>
                <td colspan="2" class="font-weight-bold">{{$appointmentData['pass_number'] ?? ''}}</td>
            </tr>

            <tr>
                <td>Name</td>
                <td colspan="3"><h6>{{($appointmentData['first_name'] ?? '').' '.($appointmentData['last_name'] ?? '')}}</h6></td>
                <td>Issue Date</td>
                <td class="font-weight-bold">{{$appointmentData['pass_issue_date']}}</td>
                <td rowspan="3">
{{--                    <img src="" alt="Patient image"/>--}}
                    <div style="margin-left: 25px; margin-top: 5px;">
                        <label for="profile_img">
                            <img src="https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg" id="image_place"
                                 style="cursor:pointer; height: 130px; width: 130px; object-fit: contain;" />
                            <input type="file" id="profile_img" style="width: 150px;"
                                   onchange="placeImageFn(event)" name="profile_image"/>
                        </label>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Height</td>
                <td><input type="text" name="height" required/></td>
                <td>Weight </td>
                <td><input type="text" name="weight" required/></td>
                <td>Marital Status</td>
                @if($appointmentData['marital_status'] == 1)
                    <td>Married</td>
                @else
                    <td>Unmarried</td>
                @endif
            </tr>

            <tr>
                {{--            @php--}}
                {{--                $date = DateTime::createFromFormat("Y-m-d", $appointmentData['dob']);--}}
                {{--                echo $date->format("Y");--}}
                {{--            @endphp--}}
                <td>Place of Issue</td>
                <td>{{$appointmentData['pass_issue_place'] ?? ''}}</td>
                <td>Age</td>
                <td><input type="number" name="age" required/></td>
                <td>Nationality</td>
{{--                <td>{{$appointmentData['nationality'] ?? ''}}</td>--}}
                <td>Bangladesh</td>
            </tr>

{{--            <tr>--}}
{{--                <td>Profession </td>--}}
{{--                <td></td>--}}
{{--                <td>Visa No. </td>--}}
{{--                <td></td>--}}
{{--                <td>Visa date </td>--}}
{{--                <td></td>--}}
{{--            </tr>--}}

            <tr>
                <td>Gender</td>
                <td>{{$appointmentData['gender']}}</td>
                <td>Traveling To</td>
                <td colspan="2">LIBIYA</td>
                <td>Religion</td>
                <td><input type="text" name="religion" required/></td>
            </tr>

            <tr>
                <td colspan="3" class="text-center"><h6>MEDICAL EXAMINATION</h6></td>
                <td colspan="4" class="text-center"><h6>LABORATORY INVESTIGATION</h6></td>
            </tr>

            <tr>
                <td colspan="2"><h6>Type of Examination </h6></td>
                <td><h6>Results</h6></td>
                <td colspan="3" class="text-center"><h6>Type of Lab Investigation </h6></td>
                <td><h6>Results </h6></td>
            </tr>

            <tr>
                <td rowspan="2">EYE</td>
                <td>Rt.</td>
                <td><input type="text" name="eye_rt_result" required/></td>
                <td rowspan="4">URINE</td>
                <td colspan="2">Sugar </td>
                <td><input type="text" name="urine_sugar_result" required/></td>
            </tr>

            <tr>
                <td>Lt.</td>
                <td><input type="text" name="eye_lt_result" required/></td>
                <td colspan="2">Albumin</td>
                <td><input type="text" name="urine_albumin_result" required/></td>
            </tr>

            <tr>
                <td rowspan="2">EAR</td>
                <td>Rt.</td>
                <td><input type="text" name="ear_rt_result" required/></td>
                <td colspan="2">Bilharziasis (If endemic)</td>
                <td><input type="text" name="urine_bilharziasis_result" required/></td>
            </tr>

            <tr>
                <td>Lt</td>
                <td><input type="text" name="ear_lt_result" required/></td>
                <td colspan="2">Pregnancy Test</td>
                <td><input type="text" name="urine_pregnancy_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Systemic Examination:</td>
                <td></td>
                <td rowspan="5">STOOL</td>
                <td colspan="2">Helminthes</td>
                <td><input type="text" name="stool_helminthes_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Cardio vascular</td>
                <td></td>
                <td colspan="2">Giardia</td>
                <td><input type="text" name="stool_giardia_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">B.P. </td>
                <td><input type="text" name="cardio_bp_result" required/></td>
                <td colspan="2">Bilharziasis (If endemic)</td>
                <td><input type="text" name="stool_bilharziasis_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Heart</td>
                <td><input type="text" name="cardio_heart_result" required/></td>
                <td colspan="2">Salmonella/Shegella </td>
                <td><input type="text" name="stool_salmonella_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Respiratory</td>
                <td></td>
                <td colspan="2">Cholera(If endemic) </td>
                <td><input type="text" name="stool_cholera_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Lungs</td>
                <td><input type="text" name="respiratory_lungs_result" required/></td>
                <td rowspan="17">BLOOD</td>
                <td colspan="2">Blood Group</td>
                <td><input type="text" name="blood_group_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Chest X-Ray</td>
                <td><input type="text" name="chest_xray_result" required/></td>
                <td colspan="2">Haemoglobin </td>
                <td><input type="text" name="blood_haemoglobin_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Gastro Intestinal : Abdomen</td>
                <td><input type="text" name="gastro_abdomen_result" required/></td>
                <td colspan="2">Thick Film for :</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">Others: Hernia </td>
                <td><input type="text" name="hernia_result" required/></td>
                <td colspan="2">Malaria</td>
                <td><input type="text" name="blood_malaria_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Varicose Veins </td>
                <td><input type="text" name="varicose_venis_result" required/></td>
                <td colspan="2">Micro Filaria</td>
                <td><input type="text" name="micro_filaria_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Extremities</td>
                <td><input type="text" name="extremities_result" required/></td>
                <td colspan="2">SEROLOGY</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">Deformities</td>
                <td><input type="text" name="deformities_result" required/></td>
                <td colspan="2">R.B.S.</td>
                <td><input type="text" name="blood_RBS_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Skin</td>
                <td><input type="text" name="skin_result" required/></td>
                <td rowspan="3">L.F.T.</td>
                <td>SGPT</td>
                <td><input type="text" name="blood_LFT_sgpt_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Venereal Diseases: Clinical</td>
                <td><input type="text" name="venereal_diseases_clinical_result" required/></td>
                <td>SGOT</td>
                <td><input type="text" name="blood_LFT_sgot_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">C.N.S </td>
                <td><input type="text" name="CNS_result" required/></td>
                <td>S.Bilirubin</td>
                <td><input type="text" name="blood_LFT_Sbilirubin_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Psychiatry</td>
                <td><input type="text" name="psychiatry_result" required/></td>
                <td>Creatinine</td>
                <td></td>
                <td><input type="text" name="blood_creatinine_result" required/></td>
            </tr>

            <tr>
                <td rowspan="6" colspan="3">
                    <h6>Remarks:</h6>
                    <br/>
                    <br/>
                    <p>
                        {{($appointmentData['first_name'] ?? '').' '.($appointmentData['last_name'] ?? '')}} who is
                        <select name="physical_condition" onchange="changePhysicalStatus(this.value)">
                            <option value="1">FIT</option>
                            <option value="2">UNFIT</option>
                        </select>
                        for the above
                        mentioned job.
                    </p>
                </td>
                <td colspan="2">ELISA</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">HIV I & II</td>
                <td><input type="text" name="blood_hiv_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">HBsAg</td>
                <td><input type="text" name="blood_hbsag_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">Anti-HCV </td>
                <td><input type="text" name="blood_antiHCV_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">VDRL</td>
                <td><input type="text" name="blood_vdrl_result" required/></td>
            </tr>

            <tr>
                <td colspan="2">TPHA(If VDRL Reactive)</td>
                <td><input type="text" name="blood_tpha_result" required/></td>
            </tr>

            <tr>
                <td colspan="7">
{{--                    <img src="{{asset('images/barcode.png')}}" style="height: 60px; width: 200px; object-fit: cover;" alt="" />--}}
                    <div class="d-flex">
                        <p>{!! DNS1D::getBarcodeHTML(($appointmentData['slip_no'] ?? ''), 'C128') !!}</p>
                        <h1 style="display: inline-block; margin-left: 270px;" id="physical_status">FIT</h1>
                    </div>
                </td>
            </tr>
        </table>
        <div class="d-flex justify-content-center"><button class="btn btn-primary"> Submit</button></div>
    </form>
@endsection

@push('script')
    <script>
        function changePhysicalStatus(value) {
            document.getElementById('physical_status').textContent = (value === '1') ? 'FIT' : 'UNFIT';
        }
        function placeImageFn(event) {
            document.getElementById('image_place').src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush
