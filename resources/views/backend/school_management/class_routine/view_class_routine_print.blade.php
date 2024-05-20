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
    <h5>Class Name: {{ @$class_routine[0]->class->name }}</h5>
    <h5>Session: {{@$class_routine[0]->session->start_year}} - {{@$class_routine[0]->session->end_year}}</h5>
    <h5>Section : {{ @$class_routine[0]->schoolsection->name }}</h5>
  </div>

  <div class="class-routine">
    <h2>Class Routine</h2>
    
        
    <table>
        <thead>
            <tr>
                <th scope="col">Day</th>
                @php $prevDurations = []; @endphp
                @foreach ($class_routine as $data)
                    @if (!in_array($data->classDuration->name, $prevDurations))
                        <th scope="col">
                            {{ $data->classDuration->name }} 
                            {{ date('h:i A', strtotime($data->classDuration->start_time)) }} - 
                            {{ date('h:i A', strtotime($data->classDuration->end_time)) }}
                        </th>
                        @php $prevDurations[] = $data->classDuration->name; @endphp
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php $prevDay = null; @endphp
            @foreach ($class_routine as $data)
                @if ($prevDay != $data->day)
                    <tr>
                        <td>{{ $data->day }}</td>
                        @foreach ($class_routine as $routine)
                            @if ($routine->day == $data->day)
                                <td>{{ $routine->subject->name }} <br>
                                    {{ $routine->teacher->name }} <br>
                               Room-{{ $routine->room->name }}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                    @php $prevDay = $data->day; @endphp
                @endif
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