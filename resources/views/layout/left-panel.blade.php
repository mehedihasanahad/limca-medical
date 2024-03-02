    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>LIM<i>CA</i><span>]</span></a></div>
      <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
             @if (Auth::user()->is_admin != 0 && Auth::user()->role != 1)
             <li class="br-menu-item">
              <a href="{{url("user/home")}}" class="br-menu-link">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
              </a><!-- br-menu-link -->
            </li>
             @endif
              @if (Auth::user()->is_admin == 0)
              <li class="br-menu-item">
                <a href="{{url("/dashboard")}}" class="br-menu-link">
                  <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                  <span class="menu-item-label">Dashboard</span>
                </a><!-- br-menu-link -->
              </li>
              <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                  <span class="menu-item-label">Medical Center</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                  <li class="sub-item"><a href='{{url("/medicals/create")}}' class="sub-link">Add Medical Center</a></li>
                  <li class="sub-item"><a href='{{url("/medicals")}}' class="sub-link">Medical Center List</a></li>
                </ul>
              </li><!-- br-menu-item -->
              <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                  <span class="menu-item-label">User</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                  <li class="sub-item"><a href='{{url("/users/create")}}' class="sub-link">Add User</a></li>
                  <li class="sub-item"><a href='{{url("/users")}}' class="sub-link">User List</a></li>
                </ul>
              </li><!-- br-menu-item -->
              @endif
             @if (Auth::user()->is_admin == 1 && Auth::user()->role == 1)
                 @php
                    $medical_id = DB::table('user_medicals')->where('user_id', Auth::user()->id)->orderByDesc('id')->first()->medical_id;
                 @endphp
                <li class="br-menu-item">
                     <a href="#" class="br-menu-link with-sub">
                         <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                         <span class="menu-item-label">Appointments</span>
                     </a><!-- br-menu-link -->
                     <ul class="br-menu-sub">
                         <li class="sub-item"><a href='{{url("/appointment-list/".$medical_id)}}' class="sub-link">Appointment List</a></li>
                     </ul>
                </li>
                <li class="br-menu-item">
                 <a href="#" class="br-menu-link with-sub">
                     <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                     <span class="menu-item-label">Reports</span>
                 </a><!-- br-menu-link -->
                 <ul class="br-menu-sub">
                     <li class="sub-item"><a href='{{url("/reports/list")}}' class="sub-link">Report list</a></li>
                 </ul>
             </li>
             @endif
          {{-- @if (Auth::user()->user_type == 2)
            <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                <span class="menu-item-label">Patient</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                <li class="sub-item"><a href='{{asset("/patients/create")}}' class="sub-link">Add patient</a></li>
                <li class="sub-item"><a href='{{asset("/patients")}}' class="sub-link">Patient List</a></li>
              </ul>
            </li><!-- br-menu-item -->
          @endif
          @if (Auth::user()->user_type == 1)
          <li class="br-menu-item">
            <a href='{{asset("/doctor-home")}}' class="br-menu-link">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                  <span class="menu-item-label">Patient List By Center</span>
            </a>
          </li>

          @endif --}}
        </ul>
        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
