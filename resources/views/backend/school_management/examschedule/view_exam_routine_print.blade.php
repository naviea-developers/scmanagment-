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
    <h5>Class Name: {{ @$examRoutine->class->name }}</h5>
    <h5>Examination: {{@$examRoutine->examination->name}}</h5>
  </div>

  <div class="class-routine">
    <h2>Exam Routine</h2>
    <table>
      <thead>
        <tr>
            <th>Subject Name</th>
            <th>Bulding Name</th>
            <th>Floor Name</th>
            <th>Room Name</th>
            <th>Pass Marke</th>
            <th>Fail Marke</th>
            <th>Time</th>
        </tr>
      </thead>
      <tbody>
            @foreach ($examRoutine->exam_schedule_items as  $routine)
                <tr>
                <td>{{ $routine->subject->name }}</td>
                <td>{{ $routine->bulding->name }}</td>
                <td>{{ $routine->floor->name }}</td>
                <td>{{ $routine->room->name }}</td>
                <td>{{ $routine->pass_marke }}</td>
                <td>{{ $routine->fail_marke }}</td>
                <td>{{ $routine->start_time }} - {{ $routine->end_time }}</td>
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