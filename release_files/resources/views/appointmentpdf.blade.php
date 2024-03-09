<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .div-style{
            border-style: solid;
            margin: 0 auto;
            width: 100%;
        }
        .span1{
            font-size: 20px;
            font-weight: bold;
        }
        .span2{
            margin:auto 0;
            font-weight: bold;
        }
        .para2{
            margin: 0 auto;
            text-align: center;
            font-weight: bold;
        }
        img{
            margin-top: 10px;
            display: inline-block;
        }
        table {
            width: 850px !important;
            color: black;
            margin-bottom: 30px;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: white;
            border-collapse: collapse;
        }
        @media print {
            #btnRow {
                display: none !important;
            }
            #wrapper {
                overflow: hidden !important;
            }
        }

        @page { size: landscape;  margin-top: 1mm; margin-bottom: 1mm;}
    </style>
</head>
<body>
    <div class="d-flex justify-content-between p-4" id="btnRow">
        @if(app('request')->input('before_route') === 'appointment')
            <a class="btn btn-primary" href="{{url('/appointment')}}"  id="backBtn">Back</a>
        @else
            <a class="btn btn-primary" href="#" onclick="window.history.back()" id="backBtn">Back</a>
        @endif
        <button class="btn btn-primary" id="printBtn" onclick="window.print()">Print</button>
    </div>
    <div class="div-style overflow-auto" id="wrapper" style="max-width: 850px;">
        <div style="display: flex; justify-content: space-between; padding: 0 22px; align-items: center;">
            <div>(LIMCA)</div>
            <h4><strong>Libya Approved Medical Centre's Association</strong></h4>
            <div><img src="{{asset('/images/Flag.png')}}" style="width: 100px; height:50px;" alt=""></div>
        </div>
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--                <td><span class="span1">(LIMCA)</span></td>--}}
{{--                <td><span>Libya Approved Medical Centre's Association</span></td>--}}
{{--                <td><img src="{{asset('/images/Flag.png')}}" style="width: 100px; height:50px;" alt=""></td>--}}
{{--            </tbody>--}}
{{--        </table>--}}

        <div class="">
            <div class="col-md-12 ms-auto para2">
                ---------------------------------------Medical Examination Appointment Slip---------------------------------------
            </div>
        </div>
        {{-- App\Enums\CountryType::getKey((int)$appointment->national_id) --}}
        <table class="table">
            <thead>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 0 7px;">LiMCA Slip No</td>
                    <td style="padding: 0 7px;">{{$appointment->slip_no == null ? '':$appointment->slip_no}}</td>
                    <td style="padding: 0 7px;"></td>
                    <td style="padding: 0 7px;"></td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">First name</td>
                    <td style="padding: 0 7px;">{{$appointment->first_name == null ? '':$appointment->first_name}}</td>
                    <td style="padding: 0 7px;">Nationality</td>
                    <td style="padding: 0 7px;">Bangladeshi</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Last name</td>
                    <td style="padding: 0 7px;">{{$appointment->last_name == null ? '':$appointment->last_name}}</td>
                    <td style="padding: 0 7px;">National ID</td>
                    <td style="padding: 0 7px;">{{$appointment->national_id == null ? '': $appointment->national_id}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Gender</td>
                    <td style="padding: 0 7px;">{{$appointment->gender == null ? '':$appointment->gender}}</td>
                    <td style="padding: 0 7px;">Marital status</td>
                    <td style="padding: 0 7px;">{{$appointment->marital_status == null ? '':$appointment->marital_status}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Country traveling to</td>
                    <td style="padding: 0 7px;">LIBIYA</td>
                    <td style="padding: 0 7px;">Date of Birth</td>
                    <td style="padding: 0 7px;">{{$appointment->dob == null ? '':$appointment->dob}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Passport No</td>
                    <td style="padding: 0 7px;">{{$appointment->pass_number == null ? '':$appointment->pass_number}}</td>
                    <td style="padding: 0 7px;">Passport Expiry Date</td>
                    <td style="padding: 0 7px;">{{$appointment->pass_expiry_date == null ? '':$appointment->pass_expiry_date}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Passport Issue place</td>
                    <td style="padding: 0 7px;">{{$appointment->first_name == null ? '':$appointment->first_name}}</td>
                    <td style="padding: 0 7px;">Passport issue date</td>
                    <td style="padding: 0 7px;">{{$appointment->pass_issue_place == null ? '':$appointment->pass_issue_place}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Position</td>
                    <td style="padding: 0 7px;">{{$appointment->position == null ? '' : App\Enums\PositionType::getKey((int)$appointment->position)}}</td>
                    <td style="padding: 0 7px;"></td>
                    <td style="padding: 0 7px;"></td>
                </tr>
            </tbody>
        </table>
        <div class="">
            <div class="col-md-12 ms-auto para2">
                ---------------------------------------Medical Center Information---------------------------------------
            </div>
        </div>
        <table class="table">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td style="padding: 0 7px;">Medical center name</td>
                    <td style="padding: 0 7px;">{{$medical->medical_centre_name == null ? '':$medical->medical_centre_name}}</td>

                </tr>
                <tr>
                    <td style="padding: 0 7px;">Medical center address</td>
                    <td style="padding: 0 7px;">{{$medical->medical_centre_address == null ? '':$medical->medical_centre_address}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Medical center phone number</td>
                    <td style="padding: 0 7px;">{{$medical->medical_centre_mobile == null ? '':$medical->medical_centre_mobile}}</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Medical center e-mail</td>
                    <td style="padding: 0 7px;">{{$medical->medical_centre_email == null ? '':$medical->medical_centre_email}}</td>

                </tr>
                <tr>
                    <td style="padding: 0 7px;">Medical center website</td>
                    <td style="padding: 0 7px;">{{$medical->website == null ? '':$medical->website}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td style="font-weight: bold;padding: 0 7px;">Working hours</td>
                    <td></td>

                </tr>
                <tr>
                    <td style="padding: 0 7px;">Monday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Tuesday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Wednesday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Thursday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Friday</td>
                    <td style="padding: 0 7px;">Closed</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Saturday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Sunday</td>
                    <td style="padding: 0 7px;">9:00 AM - 5:00PM</td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Barcode</td>
                    <td style="padding: 0 7px;">
                        <p>{!! DNS1D::getBarcodeHTML(($appointment->slip_no ?? ''), 'C128') !!}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 7px;">Generated date</td>
                    <td style="padding: 0 7px;">{{$appointment->appointment_date}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
