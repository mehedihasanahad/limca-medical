@if (Auth::user()->is_admin == 0)
    <a href="{{ url("/medicals/$row->id/edit") }}" class="btn btn-primary">Edit</a>
    <a href="{{ url("appointment-list/$row->id") }}" class="btn btn-primary">Appointment List</a>
    <form action="{{ url("/medicals/$row->id") }}" method="POST"
        onsubmit="return confirm('Do you really want to delete the task?');">
        @csrf
        @method("delete")
        <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
    </form>
    @if ($row->is_active == 1)
    <form action="{{url("/medicals/$row->id")}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="is_active" value="0" hidden>
        <button type="submit" class="btn btn-warning">Make It Inactive</button>
    </form>
    @else
    <form action="{{url("/medicals/$row->id")}}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="is_active" value="1" hidden>
        <button type="submit" class="btn btn-success">Make It Active</button>
    </form>
    @endif
@else
    <a href="{{ url("appointment-list/$row->id") }}" class="btn btn-primary">Appointment And Report List</a>
@endif


