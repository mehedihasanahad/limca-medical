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
    <div class="br-section-wrapper">
      @if (session('status'))
        <div class="alert alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
        </div>
      @endif
        <div class="table-wrapper" style="overflow-x:auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Slip no</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Date of Birth</th>
                  <th>Nationality</th>
                  <th>Gender</th>
                  <th>Passport Number</th>
                  <th>Passport Issue Date</th>
                  <th>Passport Issue Place</th>
                  <th>Passport Expiry Date</th>
                  <th>Visa Type</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>National ID</th>
                  <th>Position</th>
                  <th>Other</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div><!-- table-wrapper -->

    </div>
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{asset('/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/select2/js/select2.min.js')}}"></script>

{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}


<script>
  $(function () {

  // var medical_id = {!! json_encode(10) !!};
  var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route('appointment.list') }}",
          data:function (d) {
              d.medical_id = {!! json_encode($id) !!};
          }
      },
      columns: [
              {data: 'id',name: 'id'},
              {data: 'slip_no',name: 'slip_no'},
              {data: 'first_name',name: 'first_name'} ,
              {data: 'last_name',name: 'last_name'} ,
              {data: 'dob',name: 'dob'},
              {data: 'nationality',name: 'nationality'},
              {data: 'gender',name: 'gender'},
              {data: 'marital_status',name: 'marital_status'},
              {data: 'pass_number',name: 'pass_number'},
              {data: 'pass_issue_date',name: 'pass_issue_date'},
              {data: 'pass_expiry_date',name: 'pass_expiry_date'},
              {data: 'visa_type',name: 'visa_type'},
              {data: 'email_id',name: 'email_id'},
              {data: 'phone',name: 'phone'},
              {data: 'national_id',name: 'national_id'},
              {data: 'position',name: 'position'},
              {data: 'other',name: 'other'}
      ]
  });

  $(".filter").click(function(){
      table.draw();
  });

});

</script>
@endpush
