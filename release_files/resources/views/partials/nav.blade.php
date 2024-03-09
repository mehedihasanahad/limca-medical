<style>
    .active {
        border-bottom: 1px solid red;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="#">Navbar w/ text</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    {{-- <a class="nav-link active" aria-current="page" href="#">Home</a> --}}
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('/assets/LIMCA-Logo.png')}}" alt="" width="130" height="30" style="object-fit: contain;">
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
                        <a class="nav-link font-weight-bold @if(Route::current()->uri == '/') active @endif" href="{{url('/')}}">Home</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link font-weight-bold @if(Route::current()->uri == 'appointment') active @endif" aria-current="page" href="{{url('/appointment')}}">Book an Appointment</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link font-weight-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">View Medical Reports</a>
                    </li>
                </ul>
            </span>
        </div>
    </div>
</nav>
