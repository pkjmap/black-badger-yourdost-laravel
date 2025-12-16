@foreach($expert->schedules as $day => $time)
<div class="schedule-row">
  <strong>{{ $time->day }}</strong>
  <span>: {{ $time->start_time }} to {{ $time->end_time }}</span>
</div>
@endforeach

@if($expert->leaves->count())
<div class="leave-box">
  <strong>On Leave</strong>
  @foreach($expert->leaves as $leave)
  <p>
    {{ $leave->leave_start->format('d M, h:i A') }}
    -
    {{ $leave->leave_end->format('d M, h:i A') }}
  </p>
  @endforeach
</div>
@endif

<p style="font-size:12px;margin-top:10px;color:#777">
  Note: All chat session requests are served on first come first served basis
</p>