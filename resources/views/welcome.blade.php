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
    <h1>Welcome to LIMCA</h1>
    <h3>We wish your good health and happiness</h3>
    <div class="div-style">
        <img style="margin-top:20px; margin-left:40%;" src="{{asset('/images/mc-test.png')}}" class="rounded-circle" alt="Cinque Terre" width="100" height="100">
        <h3 style="color: black; margin-top:10px; font-weight:100px;">Medical Examinations</h3>
        <p>Book your health check-up appointment or view your test results</p>
        <div class="div2">
            <a type="button" href="{{url('/appointment')}}" style="margin-righ:20px;" class="btn btn-outline-dark btn-lg">Book an Appointment</a>
            <button type="button" style="margin-left:20px;" class="btn btn-outline-dark btn-lg">View Medical Reports</button>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

