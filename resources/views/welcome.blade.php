<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIMCA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
        body {
          background-image: url("{{asset('/images/Front.png')}}");
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
        }

        h1{
            font-family: "Roboto", sans-serif;
            font-style: normal;
            font-weight: bold;
            color: white;
            text-align: center;
            margin-top: 60px;
        }

        h3{
            font-family: "Roboto", sans-serif;
            font-style: normal;
            /* font-weight: bold; */
            color:gainsboro;
            text-align: center;
            /* margin-top: 10px; */
        }
        .div-style{
            margin: 40px auto;
            height: 300px;
            width: 500px;
            background-color: white;
            /* z-index: 1; */
        }
        p{
            font-family: "Roboto", sans-serif;
            font-style: normal;
            font-size: 15px;
            text-align: center;
            color:gray;
        }
        .div2{
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          {{-- <a class="navbar-brand" href="#">Navbar w/ text</a> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                {{-- <a class="nav-link active" aria-current="page" href="#">Home</a> --}}
                <a class="navbar-brand" href="#">
                    <img src="{{asset('/images/lim.jpg')}}" alt="" width="100" height="24">
                  </a>
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link" href="#">Features</a> --}}
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link" href="#">Pricing</a> --}}
              </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="color: red; font-weight:bold;" href="{{url('/')}}">Home</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link active" style="color: red; font-weight:bold;" aria-current="page" href="{{url('/appointment')}}">Book an Appointment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" style="color: red; font-weight:bold;" href="#">View Medical Reports</a>
                    </li>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

{{--    <div class="alert alert-danger d-flex align-items-center" role="alert">--}}
{{--        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>--}}
{{--        <div>--}}
{{--            An example danger alert with an icon--}}
{{--        </div>--}}
{{--    </div>--}}
    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
            <div>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="d-inline-block">
                    {{ session('error') }}
                </div>
            </div>
{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true" style="font-weight: 700;">×</span>--}}
{{--            </button>--}}
        </div>
    @endif
    <h1>Welcome to LIMCA</h1>
    <h3>We wish your good health and happiness</h3>
    <div class="div-style">
        <img style="margin-top:20px; margin-left:40%;" src="{{asset('/images/mc-test.png')}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100">
        <h3 style="color: black; margin-top:10px; font-weight:100px;">Medical Examinations</h3>
        <p>Book your health check-up appointment or view your test results</p>
        <div class="div2">
            <a type="button" href="{{url('/appointment')}}" style="margin-righ:20px;" class="btn btn-outline-dark btn-lg">Book an Appointment</a>
{{--            <button type="button" style="margin-left:20px;" class="btn btn-outline-dark btn-lg">View Medical Reports</button>--}}

            <button type="button" class="btn btn-outline-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                View Medical Reports
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <form class="d-flex" method="post" action="{{url('/search-report')}}">
                        @csrf
                        <input class="form-control me-2" name="slip_no" type="search" placeholder="Type Your Slip No" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

