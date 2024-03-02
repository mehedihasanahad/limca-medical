@extends('layout.app')
@push('css')
    <link href="{{asset('/lib/highlightjs/styles/github.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('upper-headline')
    HOME/Report LIST
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
                    <th>Gender</th>
                    <th>Passport Number</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
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
                    {data: 'id',name: 'id'},
                    {data: 'slip_no',name: 'slip_no'},
                    {data: 'first_name',name: 'first_name'} ,
                    {data: 'last_name',name: 'last_name'} ,
                    {data: 'gender',name: 'gender'},
                    {data: 'pass_number',name: 'pass_number'},
                    {data: 'email_id',name: 'email_id'},
                    {data: 'phone',name: 'phone'},
                    {data: 'actions',name: 'actions'}
                ]
            });

            $(".filter").click(function(){
                table.draw();
            });

        });

        // document.getElementsByTagName('select')[0].value=2;
    </script>
@endpush
