<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        input {
            background: white;
            outline: none;
            border: none;
            width: 100%;
            pointer-events: none;
        }
        select {
            pointer-events: none;
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

        @media print {
            /* All your print styles go here */
            #printBtn, #backBtn {
                display: none !important;
            }
        }

        @page { size: auto;  margin-top: 1mm; margin-bottom: 1mm;}
    </style>

    <div class="d-flex justify-content-between p-4">
        <a class="btn btn-primary" href="{{url('/')}}" id="backBtn">Back</a>
        <button class="btn btn-primary" id="printBtn" onclick="window.print()">Print</button>
    </div>

    <form action="/report-update/{{$reportData['id']}}" method="post" enctype="multipart/form-data">
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
                <td colspan="2"><input type="date" name="report_date" value="{{$reportData['report_date']}}"/></td>
            </tr>

            <tr>
                <td>Report Expiry Date</td>
                <td colspan="2"><input type="date" name="report_exp_date" value="{{$reportData['report_exp_date']}}"/></td>
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
                        <label for="">
                            <img src="{{url($reportData['profile_image'] ?? 'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg')}}" id="image_place"
                                 style="height: 130px; width: 130px; object-fit: contain;" />
                            {{--                            <input type="file" id="profile_img" style="display: none;"--}}
                            {{--                                   onchange="placeImageFn(event)" name="profile_image"/>--}}
                        </label>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Height</td>
                <td><input type="text" name="height" value="{{$reportData['height']}}"/></td>
                <td>Weight </td>
                <td><input type="text" name="weight" value="{{$reportData['weight']}}"/></td>
                <td>Marital Status</td>
                @if($appointmentData['marital_status'] == 1)
                    <td>Married</td>
                @else
                    <td>Unmarried</td>
                @endif
                {{--                <td>{{$appointmentData['marital_status'] ?? ''}}</td>--}}
            </tr>

            <tr>
                {{--            @php--}}
                {{--                $date = DateTime::createFromFormat("Y-m-d", $appointmentData['dob']);--}}
                {{--                echo $date->format("Y");--}}
                {{--            @endphp--}}
                <td>Place of Issue</td>
                <td>{{$appointmentData['pass_issue_place'] ?? ''}}</td>
                <td>Age</td>
                <td><input type="text" name="age" value="{{$reportData['age']}}"/></td>
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
                <td colspan="2">Libia</td>
                <td>Religion</td>
                <td><input type="text" name="religion" value="{{$reportData['religion']}}"/></td>
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
                <td><input type="text" name="eye_rt_result" value="{{$reportData['eye_rt_result']}}"/></td>
                <td rowspan="4">URINE</td>
                <td colspan="2">Sugar </td>
                <td><input type="text" name="urine_sugar_result" value="{{$reportData['urine_sugar_result']}}"/></td>
            </tr>

            <tr>
                <td>Lt.</td>
                <td><input type="text" name="eye_lt_result" value="{{$reportData['eye_lt_result']}}"/></td>
                <td colspan="2">Albumin</td>
                <td><input type="text" name="urine_albumin_result" value="{{$reportData['urine_albumin_result']}}"/></td>
            </tr>

            <tr>
                <td rowspan="2">EAR</td>
                <td>Rt.</td>
                <td><input type="text" name="ear_rt_result" value="{{$reportData['ear_rt_result']}}"/></td>
                <td colspan="2">Bilharziasis (If endemic)</td>
                <td><input type="text" name="urine_bilharziasis_result" value="{{$reportData['urine_bilharziasis_result']}}"/></td>
            </tr>

            <tr>
                <td>Lt</td>
                <td><input type="text" name="ear_lt_result" value="{{$reportData['ear_lt_result']}}"/></td>
                <td colspan="2">Pregnancy Test</td>
                <td><input type="text" name="urine_pregnancy_result" value="{{$reportData['urine_pregnancy_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Systemic Examination:</td>
                <td></td>
                <td rowspan="5">STOOL</td>
                <td colspan="2">Helminthes</td>
                <td><input type="text" name="stool_helminthes_result" value="{{$reportData['stool_helminthes_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Cardio vascular</td>
                <td></td>
                <td colspan="2">Giardia</td>
                <td><input type="text" name="stool_giardia_result" value="{{$reportData['stool_giardia_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">B.P. </td>
                <td><input type="text" name="cardio_bp_result" value="{{$reportData['cardio_bp_result']}}"/></td>
                <td colspan="2">Bilharziasis (If endemic)</td>
                <td><input type="text" name="stool_bilharziasis_result" value="{{$reportData['stool_bilharziasis_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Heart</td>
                <td><input type="text" name="cardio_heart_result" value="{{$reportData['cardio_heart_result']}}"/></td>
                <td colspan="2">Salmonella/Shegella </td>
                <td><input type="text" name="stool_salmonella_result" value="{{$reportData['stool_salmonella_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Respiratory</td>
                <td></td>
                <td colspan="2">Cholera(If endemic) </td>
                <td><input type="text" name="stool_cholera_result" value="{{$reportData['stool_cholera_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Lungs</td>
                <td><input type="text" name="respiratory_lungs_result" value="{{$reportData['respiratory_lungs_result']}}"/></td>
                <td rowspan="17">BLOOD</td>
                <td colspan="2">Blood Group</td>
                <td><input type="text" name="blood_group_result" value="{{$reportData['blood_group_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Chest X-Ray</td>
                <td><input type="text" name="chest_xray_result" value="{{$reportData['chest_xray_result']}}"/></td>
                <td colspan="2">Haemoglobin </td>
                <td><input type="text" name="blood_haemoglobin_result" value="{{$reportData['blood_haemoglobin_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Gastro Intestinal : Abdomen</td>
                <td><input type="text" name="gastro_abdomen_result" value="{{$reportData['gastro_abdomen_result']}}"/></td>
                <td colspan="2">Thick Film for :</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">Others: Hernia </td>
                <td><input type="text" name="hernia_result" value="{{$reportData['hernia_result']}}"/></td>
                <td colspan="2">Malaria</td>
                <td><input type="text" name="blood_malaria_result" value="{{$reportData['blood_malaria_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Varicose Veins </td>
                <td><input type="text" name="varicose_venis_result" value="{{$reportData['varicose_venis_result']}}"/></td>
                <td colspan="2">Micro Filaria</td>
                <td><input type="text" name="micro_filaria_result" value="{{$reportData['micro_filaria_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Extremities</td>
                <td><input type="text" name="extremities_result" value="{{$reportData['extremities_result']}}"/></td>
                <td colspan="2">SEROLOGY</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">Deformities</td>
                <td><input type="text" name="deformities_result" value="{{$reportData['deformities_result']}}"/></td>
                <td colspan="2">R.B.S.</td>
                <td><input type="text" name="blood_RBS_result" value="{{$reportData['blood_RBS_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Skin</td>
                <td><input type="text" name="skin_result" value="{{$reportData['skin_result']}}"/></td>
                <td rowspan="3">L.F.T.</td>
                <td>SGPT</td>
                <td><input type="text" name="blood_LFT_sgpt_result" value="{{$reportData['blood_LFT_sgpt_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Venereal Diseases: Clinical</td>
                <td><input type="text" name="venereal_diseases_clinical_result" value="{{$reportData['venereal_diseases_clinical_result']}}"/></td>
                <td>SGOT</td>
                <td><input type="text" name="blood_LFT_sgot_result" value="{{$reportData['blood_LFT_sgot_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">C.N.S </td>
                <td><input type="text" name="CNS_result" value="{{$reportData['CNS_result']}}"/></td>
                <td>S.Bilirubin</td>
                <td><input type="text" name="blood_LFT_Sbilirubin_result" value="{{$reportData['blood_LFT_Sbilirubin_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Psychiatry</td>
                <td><input type="text" name="psychiatry_result" value="{{$reportData['psychiatry_result']}}"/></td>
                <td>Creatinine</td>
                <td></td>
                <td><input type="text" name="blood_creatinine_result" value="{{$reportData['blood_creatinine_result']}}"/></td>
            </tr>

            <tr>
                <td rowspan="6" colspan="3">
                    <h6>Remarks:</h6>
                    <br/>
                    <br/>
                    <p>
                        {{($appointmentData['first_name'] ?? '').' '.($appointmentData['last_name'] ?? '')}} who is
                        @if($reportData['physical_condition'] == 1)
                            FIT
                        @else
                            UNFIT
                        @endif
                        for the above
                        mentioned job.
                    </p>
                </td>
                <td colspan="2">ELISA</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">HIV I & II</td>
                <td><input type="text" name="blood_hiv_result" value="{{$reportData['blood_hiv_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">HBsAg</td>
                <td><input type="text" name="blood_hbsag_result" value="{{$reportData['blood_hbsag_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">Anti-HCV </td>
                <td><input type="text" name="blood_antiHCV_result" value="{{$reportData['blood_antiHCV_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">VDRL</td>
                <td><input type="text" name="blood_vdrl_result" value="{{$reportData['blood_vdrl_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="2">TPHA(If VDRL Reactive)</td>
                <td><input type="text" name="blood_tpha_result" value="{{$reportData['blood_tpha_result']}}"/></td>
            </tr>

            <tr>
                <td colspan="7">
                    <img src="{{asset('images/barcode.png')}}" style="height: 60px; width: 200px; object-fit: cover;" alt="" />
                    <h1 style="display: inline-block; margin-left: 270px;" id="physical_status">
                        @if($reportData['physical_condition'] == 1)
                            FIT
                        @else
                            UNFIT
                        @endif
                    </h1>
                </td>
            </tr>
        </table>
        {{--        <div class="d-flex justify-content-center"><button class="btn btn-primary"> Update</button></div>--}}
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function changePhysicalStatus(value) {
            document.getElementById('physical_status').textContent = (value === '1') ? 'FIT' : 'UNFIT';
        }
        function placeImageFn(event) {
            document.getElementById('image_place').src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

