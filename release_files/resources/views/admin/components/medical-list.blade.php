<div class="br-section-wrapper" style="overflow: auto;">
    <h1> Medical List</h1>
    <br/>
    <br/>
    @if (session('status'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">Well Done!</strong> {{ session('status') }}.
        </div>
    @endif
    <div class="table-wrapper">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>Action</th>
                <th>Medical Centre Name</th>
                <th>Medical Centre Email</th>
                <th>Medical Centre ID</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>Logo</th>
                <th>Created On</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div><!-- table-wrapper -->

</div>
