@extends('layout.app')
@push('css')
    <link href="{{asset('/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('upper-headline')
    @php
        $medical_id = DB::table('user_medicals')->where('user_id', Auth::user()->id)->value('medical_id');
        $medical_name = DB::table('medicals')->where('id', $medical_id)->value('medical_centre_name');
    @endphp
    HOME/Report LIST
    <h3>{{$medical_name}}</h3>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{asset('/lib/select2/js/select2.min.js')}}"></script>

    <script>
        $(function () {
            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/report-list') }}",
                    data:function (d) {
                    }
                },
                columns: [
                    {data: 'actions',name: 'actions'},
                    {data: 'report_date',name: 'report_date'},
                    {data: 'slip_no',name: 'slip_no'},
                    {data: 'full_name',name: 'full_name'} ,
                    {data: 'gender',name: 'gender'},
                    {data: 'pass_number',name: 'pass_number'},
                    {data: 'phone',name: 'phone'},
                ]
            });

            $(".filter").click(function(){
                table.draw();
            });

        });

        // document.getElementsByTagName('select')[0].value=2;
    </script>
@endpush
