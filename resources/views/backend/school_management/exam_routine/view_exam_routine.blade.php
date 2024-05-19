<style>
  /* Additional custom styles */
  .school-name {
    text-align: center;
    margin-bottom: 30px;
  }
  .class-routine {
    margin-bottom: 50px;
  }
  .class-routine table {
    width: 100%;
    border-collapse: collapse;
  }
  .class-routine th, .class-routine td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
  }
  .class-routine th {
    background-color: #f2f2f2;
  }
</style>


<div class="container">

    <div class="float-end">
      <a href="" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
    </div>

    <div class="school-name">
      <h1 style="margin-left: 80px;">School Name</h1>
      <h5>Examination: {{ $examSchedules[0]->examination->name }}</h5>
    </div>
  
    <div class="class-routine">
      <h2>Exam Routine</h2>
      <table>

        <thead>
          <tr>
            <th>Date</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          {{-- @foreach ($examSchedules as  $routine)
            <tr>
              <td>{{date('d,F,Y',strtotime(@$routine->examClass->date))}}</td>
              <td>{{ $routine->examClass->class->name }},
                 {{ $routine->examClass->subject->name }},
                 {{ $routine->bulding->name }},
                 {{ $routine->floor->name }},
                 {{ date('h:i A', strtotime($routine->examClass->start_time)) }} - {{ date('h:i A', strtotime($routine->examClass->end_time)) }}
              </td>
            </tr>
          @endforeach --}}

          @php
    $shownDates = [];
@endphp

@php
    $groupedSchedules = [];
    foreach ($examSchedules as $routine) {
        $examDate = date('d,F,Y', strtotime(@$routine->examClass->date));
        $groupedSchedules[$examDate][] = $routine;
    }
@endphp

@foreach ($groupedSchedules as $date => $schedules)
    @php
        $rowspan = count($schedules);
    @endphp
    @foreach ($schedules as $index => $routine)
        <tr>
            @if ($index == 0)
                <td rowspan="{{ $rowspan }}">{{ $date }}</td>
            @endif
            <td>
                {{ $routine->examClass->class->name }},
                {{ $routine->examClass->subject->name }},
                {{ $routine->bulding->name }},
                {{ $routine->floor->name }},
                {{ date('h:i A', strtotime($routine->examClass->start_time)) }} - {{ date('h:i A', strtotime($routine->examClass->end_time)) }}
            </td>
        </tr>
    @endforeach
@endforeach

        
        </tbody>
      </table>
    </div>
</div>














