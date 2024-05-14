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
  <div class="school-name">
    <h1>School Name</h1>
    <h5>Class Name: {{ @$class_routine->class->name }}</h5>
    <h5>Session: {{@$class_routine->session->start_year->year}} - {{@$class_routine->session->end_year->year}}</h5>
    <h5>Class Type: 
        @if (@$class_routine->class_type=='1')
          Online
        @elseif (@$class_routine->class_type=='2')
          Offline
        @endif
    </h5>
  </div>

  <div class="class-routine">
    <h2>Class Routine</h2>
    <table>
      <thead>
        <tr>
            <th>Day</th>
            <th>Teacher Name</th>
            <th>Subject Name</th>
            <th>Bulding Name</th>
            <th>Floor Name</th>
            <th>Room Name</th>
            <th>Time</th>
        </tr>
      </thead>
      <tbody>
        @php
            $dayCounts = $class_routine->class_routine_items->groupBy('day')->map->count();
        @endphp

        @foreach ($class_routine->class_routine_items as $key => $item)
            <tr>
                @if ($key === 0 || $item->day !== $class_routine->class_routine_items[$key - 1]->day)
                    <td rowspan="{{ $dayCounts[$item->day] }}">{{ $item->day }}</td>
                @endif
                <td>{{ $item->Teacher->name }}</td>
                <td>{{ $item->subject->name }}</td>
                <td>{{ $item->bulding->name }}</td>
                <td>{{ $item->floor->name }}</td>
                <td>{{ $item->room->name }}</td>
                <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
            </tr>
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