@extends('layout.public')
@section('title', 'Register for an Appointment')
@section('public-content')
    <div class="container pb-4">
        <h5 class="modal-title text-center my-4">Book a medical examination appointment</h5>
        <form action="{{url('/take-appointment')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="exampleFormControlInput1" placeholder="First Name" required>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="exampleFormControlInput1" placeholder="Last Name" required>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                    <input id="startDate" class="form-control" name="dob" type="date" required />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Nationality</label>
                    <select class="form-select" name="nationality" aria-label="Default select example" required>
                        <option selected value="">Select Nationality</option>

                        <option value="1">Afghan</option>

                        <option value="2">Algeria</option>

                        <option value="3">Argentinian</option>

                        <option value="4">Armenian</option>

                        <option value="5">Australian</option>

                        <option value="6">Austrian</option>

                        <option value="7">Azerbaijani</option>

                        <option value="8">Bahraini</option>

                        <option value="9">Bangladeshi</option>

                        <option value="10">Belarusian</option>

                        <option value="11">Belgian</option>

                        <option value="12">Belizean</option>

                        <option value="13">Bhutanese</option>

                        <option value="14">Bosnian</option>

                        <option value="15">Brazilian</option>

                        <option value="16">Britain</option>

                        <option value="17">Burkinabe</option>

                        <option value="18">Burundian</option>

                        <option value="19">Cameroonian</option>

                        <option value="20">Canadian</option>

                        <option value="21">Chinese</option>

                        <option value="22">Colombian</option>

                        <option value="23">Cypriot</option>

                        <option value="24">Czech</option>

                        <option value="25">Danish</option>

                        <option value="26">Djibouti</option>

                        <option value="27">Dominica</option>

                        <option value="28">Dutch</option>

                        <option value="29">Ecuadorean</option>

                        <option data-required="True" value="30">Egyptian</option>

                        <option value="31">Eritrean</option>

                        <option value="32">Ethiopian</option>

                        <option value="33">Filipino</option>

                        <option value="34">Finnish</option>

                        <option value="35">French</option>

                        <option value="36">German</option>

                        <option value="37">Ghanaian</option>

                        <option value="38">Greek</option>

                        <option value="39">GuineanGuyanese</option>

                        <option value="40">Guineense</option>

                        <option value="41">Indian</option>

                        <option value="42">Indonesian</option>

                        <option value="43">Iranian</option>

                        <option value="44">Iraqi</option>

                        <option value="45">Irish</option>

                        <option value="46">Italian</option>

                        <option value="47">Ivorian</option>

                        <option value="48">Jamaican</option>

                        <option value="49">Japanese</option>

                        <option value="50">Jordanian</option>

                        <option value="51">Kazakhstani</option>

                        <option value="52">Kenyan</option>

                        <option value="53">Kuwaiti</option>

                        <option value="54">Lebanese</option>

                        <option value="56">Libyan</option>

                        <option value="57">Malagasy</option>

                        <option value="58">Malaysia</option>

                        <option value="59">Maldivian</option>

                        <option value="60">Malian</option>

                        <option value="61">Maltese</option>

                        <option value="62">Mexican</option>

                        <option value="63">Montenegrin</option>

                        <option value="64">Moroccan</option>

                        <option value="65">Myanmar</option>

                        <option value="66">Nepalese</option>

                        <option value="67">New Zealander</option>

                        <option value="68">Nigerian</option>

                        <option value="69">Norwegian</option>

                        <option value="70">Omani</option>

                        <option value="71">Pakistani</option>

                        <option value="72">palestine</option>

                        <option value="73">Peruvian</option>

                        <option value="74">Portuguese</option>

                        <option value="75">Qatari</option>

                        <option value="76">Romanian</option>

                        <option value="77">Russian</option>

                        <option value="78">Saint Kitts and Nevis</option>

                        <option value="79">Saudi</option>

                        <option value="80">Serbian</option>

                        <option value="81">Sierra Leonean</option>

                        <option value="82">Somali</option>

                        <option value="83">South Africa</option>

                        <option value="84">South Korean</option>

                        <option value="85">Sri Lankan</option>

                        <option value="86">Sudanese</option>

                        <option value="87">Swedish</option>

                        <option value="88">Swiss</option>

                        <option value="89">Syrian</option>

                        <option value="90">Tajik</option>

                        <option value="91">Tanzanian</option>

                        <option value="92">Thai</option>

                        <option value="93">Togolese</option>

                        <option value="94">TUNISIAN</option>

                        <option value="95">Turkish</option>

                        <option value="96">Turkmen</option>

                        <option value="97">Ugandan</option>

                        <option value="98">Ukrainian</option>

                        <option value="99">United states of America</option>

                        <option value="100">Uzbekistani</option>

                        <option value="101">Vanuatu</option>

                        <option value="102">Venezuelan</option>

                        <option value="103">Vietnamese</option>

                        <option value="104">YEMENI</option>
                    </select>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label="Default select example" required>
                        <option selected value="">--------</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Marital Status</label>
                    <select class="form-select" name="marital_status" aria-label="Default select example" required>
                        <option selected value="">--------</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Passport Number</label>
                    <input type="text" class="form-control" name="pass_number" id="exampleFormControlInput1" required>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Confirm Passport</label>
                    <input type="text" class="form-control" name="confirm_passport" id="exampleFormControlInput1" required>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Passport Issue Date</label>
                    <input id="startDate" class="form-control" name="pass_issue_date" type="date" required />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Passport Issue Place</label>
                    <input type="text" class="form-control" name="pass_issue_place" id="exampleFormControlInput1" required>
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Passport Expiry Date</label>
                    <input id="startDate" class="form-control" name="pass_expiry_date" type="date" required />
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Visa Type</label>
                    <select class="form-select" name="visa_type" aria-label="Default select example" required>
                        <option selected value="">Select Visa Type</option>
                        <option value="Work Visa">Work Visa</option>
                        <option value="Family Visa">Family Visa</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Email ID</label>
                    <input type="email" class="form-control" name="email_id" id="exampleFormControlInput1" placeholder="Your@mail.com">
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Phone N</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1">
                </div>
                <div class="col-md-4 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">National ID <span style="color:lightblue; font-weight:10px;">optional</span></label>
                    <input type="text" class="form-control" name="national_id" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Position Applied For</label>
                    <select class="form-select" name="position" aria-label="Default select example" required>
                        <option selected value="">--------</option>

                        <option value="1">Banking &amp; Finance</option>

                        <option value="2">Carpenter</option>

                        <option value="3">Cashier</option>

                        <option value="4">Electrician</option>

                        <option value="5">Engineer</option>

                        <option value="6">General Secretory</option>

                        <option value="7">Health &amp; Medicine &amp; Nursing</option>

                        <option value="8">Heavy Driver</option>

                        <option value="9">IT &amp; Internet Engineer</option>

                        <option value="10">Leisure &amp; Tourism</option>

                        <option value="11">Light Driver</option>

                        <option value="12">Mason</option>

                        <option value="13">President</option>

                        <option value="14">Labour</option>

                        <option value="15">Plumber</option>

                        <option value="16">Doctor</option>

                        <option value="17">Family</option>

                        <option value="18">Steel Fixer</option>

                        <option value="19">Aluminum Technician</option>

                        <option value="20">Nurse</option>

                        <option value="21">Male Nurse</option>

                        <option value="22">Ward Boy</option>

                        <option value="23">Shovel Operator</option>

                        <option value="24">Dozer Operator</option>

                        <option value="25">Car Mechanic</option>

                        <option value="26">Petrol Mechanic</option>

                        <option value="27">Diesel Mechanic</option>

                        <option value="28">Student</option>

                        <option value="29">Accountant</option>

                        <option value="30">Lab Technician</option>

                        <option value="31">Drafts man</option>

                        <option value="32">Auto-Cad Operator</option>

                        <option value="33">Painter</option>

                        <option value="34">Tailor</option>

                        <option value="35">Welder</option>

                        <option value="36">X-ray Technician</option>

                        <option value="37">Lecturer</option>

                        <option value="38">A.C Technician</option>

                        <option value="39">Business</option>

                        <option value="40">Cleaner</option>

                        <option value="41">Security Guard</option>

                        <option value="42">House Maid</option>

                        <option value="43">Manager</option>

                        <option value="44">Hospital Cleaning</option>

                        <option value="45">Mechanic</option>

                        <option value="46">Computer Operator</option>

                        <option value="47">House Driver</option>

                        <option value="48">Driver</option>

                        <option value="49">Cleaning Labour</option>

                        <option value="50">Building Electrician</option>

                        <option value="51">Salesman</option>

                        <option value="52">Plastermason</option>

                        <option value="53">Servant</option>

                        <option value="54">Barber</option>

                        <option value="55">Residence</option>

                        <option value="56">Shepherds</option>

                        <option value="57">Employment</option>

                        <option value="58">Fuel Filler</option>

                        <option value="59">Worker</option>

                        <option value="60">House Boy</option>

                        <option value="61">House Wife</option>

                        <option value="62">RCC Fitter</option>

                        <option value="63">Clerk</option>

                        <option value="64">Microbiologist</option>

                        <option value="65">Teacher</option>

                        <option value="66">Helper</option>

                        <option value="67">Hajj Duty</option>

                        <option value="68">Shuttering</option>

                        <option value="69">Supervisor</option>

                        <option value="70">Medical Specialist</option>

                        <option value="71">Office Secretary</option>

                        <option value="72">Technician</option>

                        <option value="73">Butcher</option>

                        <option value="74">Arabic Food Cook</option>

                        <option value="75">Agricultural Worker</option>

                        <option value="76">Service</option>

                        <option value="77">Studio CAD Designer</option>

                        <option value="78">Financial Analyst</option>

                        <option value="79">Cabin Appearance (AIR LINES)</option>

                        <option value="80">Car Washer</option>

                        <option value="81">Surveyor</option>

                        <option value="82">Electrical Technician</option>

                        <option value="83">Waiter</option>

                        <option value="84">Nursing helper</option>

                        <option value="85">Anesthesia technician</option>

                        <option value="86">&lt;s&gt;Marvel</option>

                        <option value="87">Marvel</option>

                        <option value="88">Construction worker</option>
                    </select>
                </div>
                <div class="col-md-1 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label">Other</label><br>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">                    </div>
                <div class="col-md-5 ms-auto">
                    <label for="exampleFormControlInput1" class="form-label" style="color:white;">Someting</label>
                    <input type="text" class="form-control" name="other" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="row mt-3">
                <button type="submit" class="btn btn-outline-dark btn-lg">Save & Continue</button>
                <a href="{{url('/')}}" class="btn btn-outline-dark btn-lg mt-2">Close</a>
            </div>
        </form>
    </div>
@endsection
