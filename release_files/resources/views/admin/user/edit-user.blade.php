@php
  use App\Models\Medical;
@endphp
@extends('layout.app')
@section('upper-headline')
HOME/EDIT USERS
@endsection
@section('content')
    <div class="br-section-wrapper">
        <h6 class="br-section-label" style="text-align:center;">Add User</h6>
        @if (session('status'))
          <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
          </div>
        @endif
        <form action="{{url("/users/$user->id")}}" method="POST">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-xl-12">
              <div class="form-layout form-layout-4">
                <h6 class="br-section-label">User Info</h6>
                <div class="row">
                  @if (empty($user->medicals[0]) == false)
                  <label class="col-sm-4 form-control-label" id="medical_label">Medical Center: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2 @error('medical_center_id') is-invalid @enderror" id="medical_center_id" name="medical_center_id" data-placeholder="Select Medical Center" @if ($user->role == 1)  required @endif>
                      <option selected="" disabled="">--Choose One--</option>
                        @foreach (Medical::List() as $item)
                          <option @if ($item->id == $user->medicals[0]->id) selected @endif value="{{$item->id}}">{{$item->medical_centre_name}}</option>
                        @endforeach
                    </select>
                    @error('medical_center_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  @else
                    <label class="col-sm-4 form-control-label" id="medical_label">Medical Center: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <select class="form-control select2 @error('medical_center_id') is-invalid @enderror" id="medical_center_id" name="medical_center_id" data-placeholder="Select Medical Center" @if ($user->role == 1)  required @endif>
                        <option selected="" disabled="">--Choose One--</option>
                          @foreach (Medical::List() as $item)
                          <option value="{{$item->id}}">{{$item->medical_centre_name}}</option>
                          @endforeach
                      </select>
                      @error('medical_center_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  @endif
                </div><!-- row -->
                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Username: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="Enter Username" required>
                      @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Role: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <select class="form-control select2 @error('role') is-invalid @enderror" name="role" data-placeholder="Select User Role" required>
                      <option selected="" disabled="">--Choose One--</option>
                      <option @if ($user->role == 1) selected @endif value="1">Medical</option>
                      <option @if ($user->role == 2) selected @endif value="2">Association</option>
                      <option @if ($user->role == 3) selected @endif value="3">Embassy</option>
                      <option @if ($user->role == 4) selected @endif value="4">Immigration</option>
                  </select>
                  @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
                <div class="row mg-t-20">
                  <label class="col-sm-4 form-control-label">Password: <span class="tx-danger">*</span></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                    @error('password')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-layout-footer mg-t-30">
                  <button class="btn btn-info">Submit Form</button>
                  <a class="btn btn-secondary" href='{{asset("/users")}}' style="color:white;">Cancel</a>
                </div><!-- form-layout-footer -->
              </div><!-- form-layout -->
            </div><!-- col-6 -->
          </div> 
        </form>  
    </div>
@endsection

@push('script')
<script>
var user_role = {!! json_encode($user->role) !!};
console.log(user_role);
      if (user_role != 1) {
        $("#medical_label").hide();
        $("#medical_center_id").hide();
      }


      $('select[name="role"]').on('change', function(){
        if ($(this).val() === '1') {
          $("#medical_label").show();
          $("#medical_center_id").show();
          document.getElementById("medical_center_id").required = true;
        } else {
          $("#medical_label").hide();
          $("#medical_center_id").hide();
          document.getElementById("medical_center_id").required = false;
        } 
      });

      
  </script>
@endpush