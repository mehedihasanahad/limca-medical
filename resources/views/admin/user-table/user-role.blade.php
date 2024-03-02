@if ($row->role == 1)
    Medical
@elseif($row->role == 2)
    Association
@elseif($row->role == 3)
    Embassy
@else
    Immigration
@endif