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
    <h1>{{ @$tpOption->company_name }}</h1>
    <h5>Class Name: {{ @$class_routine[0]->class->name }}</h5>
    <h5>Session: {{@$class_routine[0]->session->start_year}} - {{@$class_routine[0]->session->end_year}}</h5>
    <h5>Section : {{ @$class_routine[0]->schoolsection->name }}</h5>
  </div>

  <div class="class-routine">
    <h2>Class Routine</h2>
  
    @php
        $classRoutinesByDay = [];
        $classDurations = [];

        foreach ($class_routine as $data) {
            $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
            if (!in_array($data->classDuration->name, $classDurations)) {
                $classDurations[] = $data->classDuration->name;
            }
        }
        sort($classDurations);
    @endphp

    <table>
        <thead>
            <tr>
                <th scope="col">Day</th>
                @foreach ($classDurations as $duration)
                    <th scope="col">
                        {{ @$duration }} <br>
                        @php
                            $durationData = $class_routine->firstWhere('classDuration.name', $duration)->classDuration;
                        @endphp
                        {{ date('h:i A', strtotime(@$durationData->start_time)) }} - 
                        {{ date('h:i A', strtotime(@$durationData->end_time)) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($classRoutinesByDay as $day => $routines)
                <tr>
                    <td>{{ $day }}</td>
                    @foreach ($classDurations as $duration)
                        <td>
                            @isset($routines[$duration])
                                {{ @$routines[$duration]->subject->name }} <br>
                                {{ @$routines[$duration]->teacher->name }} <br>
                                {{ @$routines[$duration]->room->name }}
                            @else
                                -
                            @endisset
                        </td>
                    @endforeach
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