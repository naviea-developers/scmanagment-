<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Class Routine</title> --}}
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-v8FpMN7PZIWiDRfM7czPpOVCKaHcJK4jO3kI+KTO9vMjCExH0EeZ3rAaxiylpDcT" crossorigin="anonymous">
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
</head>
<body>

<div class="container">
    @php
      $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
      $school_info = json_decode($results->option_value);
    @endphp
    <div class="school-name">
        <h3>{{ @$school_info->school_name }}</h3>
        {{-- <h5>Examination: {{ $examSchedules[0]->examination->name }}</h5> --}}
        @php
            $examinationNames = [];
            foreach ($examSchedules as $examSchedule) {
                $examinationName = $examSchedule->examination->name ?? 'N/A';
                if (!in_array($examinationName, $examinationNames)) {
                    $examinationNames[] = $examinationName;
                }
            }
            $examinationName = implode(', ', $examinationNames);
        @endphp
        <h5>Examination: {{ $examinationName }}</h5>
        <h2>Exam Routine</h2>
    </div>

  <div class="class-routine">
    <table>
      <thead>
        <tr>
            <th>Date</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach ($examRoutine as $routine)
        <tr>
            <td>{{ @$routine->examClass->date }}</td>
            <td>{{ @$routine->examClass->subject->name }}</td>
            <td>{{ @$routine->bulding->name }}</td>
            <td>{{ @$routine->floor->name }}</td>
            <td>{{ @$routine->room->name }}</td>
            <td>{{ \Carbon\Carbon::parse(@$routine->examClass->start_time)->format('h:iA') }} - {{ \Carbon\Carbon::parse(@$routine->examClass->end_time)->format('h:iA') }}</td>
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
                          Class :{{ @$routine->examClass->class->name }},
                          Subject : {{ @$routine->examClass->subject->name }},
                          Bulding :{{ @$routine->bulding->name }},
                          Floor :{{ @$routine->floor->name }},
                          Room :{{ @$routine->room->name }},
                          Time :{{ date('h:i A', strtotime(@$routine->examClass->start_time)) }} - {{ date('h:i A', strtotime(@$routine->examClass->end_time)) }}
                      </td>
                  </tr>
              @endforeach
          @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-k3A1LmfFiBCL0h9pzyvLWNs/zFwMIGg/2IQXO48JAU0MTrvYV4R8aG3g7AgL73n9" crossorigin="anonymous"></script>
<script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
        window.history.back();
    }
</script>
</body>
</html>