<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LIMCA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        {{--body {--}}
        {{--  background-image: url("{{asset('/images/Front.png')}}");--}}
        {{--  background-repeat: no-repeat;--}}
        {{--  background-attachment: fixed;--}}
        {{--  background-size: cover;--}}
        {{--}--}}

        #mainContent {
            background-image: url("{{asset('/images/Front.png')}}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
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
    @stack('style')
</head>
<body>
    @includeIf('partials.nav')
    @yield('public-content')
    @includeIf('partials.footer')


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

{{--    scripts--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('script')
</body>
</html>

