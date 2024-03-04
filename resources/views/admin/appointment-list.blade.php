@extends('layout.app')
@push('css')
    <link href="{{asset('/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('upper-headline')
HOME/MEDICAL APPOINTMENT LIST
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
              {data: 'other',name: 'other'},
              {data: 'appointment_date',name: 'appointment_date'},
              {data: 'slip_no',name: 'slip_no'},
              {data: 'full_name',name: 'full_name'} ,
              {data: 'pass_number',name: 'pass_number'},
              {data: 'phone',name: 'phone'},
              {data: 'gender',name: 'gender'},
      ]
  });

  $(".filter").click(function(){
      table.draw();
  });

});

</script>
@endpush
