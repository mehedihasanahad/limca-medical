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
    <div class="pb-5">
        <div class="row">
            <div class="col-lg-6">
                @includeIf('admin.components.medical-list')
            </div>
            <div class="col-lg-6">
                @includeIf('admin.components.user-list')
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-12">
                @includeIf('admin.components.appointment-list')
            </div>
        </div>
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
                    url: "{{ route('medical.list') }}",
                },
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'medical_centre_name',name: 'medical_centre_name'},
                    {data: 'medical_centre_email',name: 'medical_centre_email'},
                    {data: 'medical_centre_id',name: 'medical_centre_id'} ,
                    {data: 'medical_centre_address',name: 'medical_centre_address'} ,
                    {data: 'medical_centre_mobile',name: 'medical_centre_mobile'},
                    {data: 'medical_centre_logo',name: 'medical_centre_logo'},
                    {data: 'created_at',name: 'created_at'}
                ]
            });

            $(".filter").click(function(){
                table.draw();
            });

        });

        $(function () {
            var table = $('.user-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('user.list') }}",
                },
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'name',name: 'name'},
                    {data: 'role',name: 'role'} ,
                    {data: 'created_at',name: 'created_at'} ,
                    {data: 'medical_center_id',name: 'medical_center_id'}
                ]
            });

            $(".filter").click(function(){
                table.draw();
            });

        });

        $(function () {

            var table = $('.appointment-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('appointment.listAll') }}"
                },
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'slip_no',name: 'slip_no'},
                    {data: 'medical_name',name: 'medical_name'},
                    {data: 'first_name',name: 'first_name'} ,
                    {data: 'last_name',name: 'last_name'} ,
                    {data: 'dob',name: 'dob'},
                    {data: 'nationality',name: 'nationality'},
                    {data: 'gender',name: 'gender'},
                    {data: 'pass_number',name: 'pass_number'},
                    {data: 'email_id',name: 'email_id'}
                ]
            });

            $(".filter").click(function(){
                table.draw();
            });

        });
    </script>
@endpush
