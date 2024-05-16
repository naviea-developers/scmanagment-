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
    <h3>School Name</h3>
    <h6>Class Name: {{ $admission->class->name ?? '' }}</h6>
    <h6>Session: {{ $admission->session->start_year->year ?? '' }} - {{ $admission->session->end_year->year ?? '' }}</h6>
  
    @foreach ($examRoutine as $routine)
        <h5>Examination: {{ $routine->examination ? $routine->examination->name : 'N/A' }}</h5>
    @endforeach
    <h2>Exam Routine</h2>
  </div>

  <div class="class-routine">
    <table>
      <thead>
        <tr>
            <th>Date</th>
            <th>Subject</th>
            <th>Bulding</th>
            <th>Floor</th>
            <th>Room</th>
            {{-- <th>Pass Marke</th>
            <th>Fail Marke</th> --}}
            <th>Time</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($examRoutine as $routine)
        @foreach ($routine->exam_schedule_items as $item)
            <tr>
                <td>{{ @$item->date }}</td>
                <td>{{ @$item->subject->name }}</td>
                <td>{{ @$item->bulding->name }}</td>
                <td>{{ @$item->floor->name }}</td>
                <td>{{ @$item->room->name }}</td>
                {{-- <td>{{ $item->pass_marke }}</td>
                <td>{{ $item->fail_marke }}</td> --}}
                <td>{{ \Carbon\Carbon::parse($item->start_time)->format('h:iA') }} - {{ \Carbon\Carbon::parse($item->end_time)->format('h:iA') }}</td>
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