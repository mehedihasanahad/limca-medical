@extends('layout.app')
@push('css')
    <link href="{{asset('/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('upper-headline')
@php
    $medical_name = DB::table('medicals')->where('id', request()->route()->parameters['id'])->value('medical_centre_name');
@endphp
HOME/MEDICAL APPOINTMENT LIST
<h3>{{$medical_name}}</h3>
@endsection
@section('content')
    @if(Auth::user()->is_admin == 1 && Auth::user()->role == 1 && Auth::user()->is_active)
        <div class="br-section-wrapper">
      @if (session('status'))
        <div class="alert alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
        </div>
      @endif
      <div class="d-flex justify-content-end">
          <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; max-width: 350px;">
              <i class="fa fa-calendar"></i>&nbsp;
              <span></span> <i class="fa fa-caret-down"></i>
          </div>
      </div>
      <br/>
        <div class="table-wrapper" style="overflow-x:auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ACTION</th>
                  <th>DATE</th>
                  <th>Slip no</th>
                  <th>Name</th>
                  <th>Passport</th>
                  <th>Phone</th>
                  <th>Gender</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div><!-- table-wrapper -->

    </div>
    @else
        <h3 class="text-center">{{env('INACTIVE_MEDICAL_USER_MESSAGE', 'You are inactive, please contact with system admin')}}</h3>
    @endif
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{asset('/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('/lib/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}


<script>
  $(function () {
      let start = moment().subtract(29, 'days');
      let end = moment();
      let selectedStartDate = start.format('Y-MM-DD');
      let selectedEndDate = end.format('Y-MM-DD');

      let table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url: "{{ route('appointment.list') }}",
          data:function (data) {
              data.medical_id = {!! json_encode($id) !!};
              data.from_date = selectedStartDate;
              data.end_date = selectedEndDate;
          }
      },
      order: [
          [1, 'desc']
      ],
      columns: [
              {data: 'other',name: 'other'},
              {data: 'appointment_date',name: 'appointment_date'},
              {data: 'slip_no',name: 'slip_no'},
              {data: 'full_name',name: 'full_name'} ,
              {data: 'pass_number',name: 'pass_number'},
              {data: 'phone',name: 'phone'},
              {data: 'gender',name: 'gender'},
      ]
  });


      // date range
      function cb(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          selectedStartDate = start.format('Y-MM-DD');
          selectedEndDate = end.format('Y-MM-DD');
          table.draw();
      }

      $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
      }, cb);

      cb(start, end);
      // date range

});

</script>
@endpush
