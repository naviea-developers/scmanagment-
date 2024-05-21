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


<div class="container">
  {{-- <div class="school-name">
    <h1>School Name</h1>
  </div> --}}

  <div class="class-routine">
    <h2>Result Add</h2>
    <table>
      <thead>
        <tr>
            <th>Sl</th>
            <th>Roll</th>
            <th>Student Name</th>
            <th>Student Father</th>
            <th>Class</th>
            <th>Session</th>
            <th>Academic year</th>
            <th>Section</th>
            <th>Mark</th>
            <th>Pass Mark</th>
            <th>Obtained Marke</th>
        </tr>
      </thead>
      <tbody>
        @php
            $i = 1;
        @endphp
        @if (count($students) > 0)
            @foreach ($students as $student)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ @$student->roll_number }}</td> 
                    <td>{{ @$student->student_name }}</td>          
                    <td>{{ @$student->father_name }}</td>                     
                    <td>{{ @$student->class->name }}</td>                    
                    <td>{{ @$student->session->start_year }}-{{ $student->session->end_year }}</td>
                    <td>{{ @$student->academic_year->year }}</td>    
                    <td>{{ @$student->section->name }}</td>                   
                    <td>{{ @$Examclass->marke }}</td>                    
                    <td>{{ @$Examclass->pass_marke }}</td>
                    
                    <td>
                        {{-- <input type="number" class=""> --}}
                        <input type="number" name="obtained_marke[{{ $student->id }}]" class="form-control">
                        <input type='hidden' name='roll_number[{{ $student->id }}]' value="{{ $student->roll_number }}">
                        {{-- <input type='hidden' name='student_name[{{ $student->id }}]' value="{{ $student->student_name }}"> --}}
                        {{-- <input type='hidden' name='father_name[{{ $student->id }}]' value="{{ $student->father_name }}"> --}}
                        <input type='hidden' name='class_id[{{ $student->id }}]' value="{{ $student->class->id }}">
                        <input type='hidden' name='session_id[{{ $student->id }}]' value="{{ $student->session->id }}">
                        <input type='hidden' name='section_id[{{ $student->id }}]' value="{{  $student->section->id }}">
                        <input type='hidden' name='academic_year_id[{{ $student->id }}]' value="{{ @$student->academic_year->id  }}">
                        
                        <input type='hidden' name='subject_id[{{ $student->id }}]' value="{{ $Examclass->subject_id }}">
                        <input type='hidden' name='marke[{{ $student->id }}]' value="{{ $Examclass->marke }}">
                        <input type='hidden' name='pass_marke[{{ $student->id }}]' value="{{ $Examclass->pass_marke }}">
                        <input type='hidden' name='examination_id[{{ $student->id }}]' value="{{ $Examclass->examination_id }}">
                        <input type='hidden' name='exam_class_id[{{ $student->id }}]' value="{{ $Examclass->id }}">
                        
                        
                    </td>
                   
                </tr>
            @endforeach
        @endif

      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-k3A1LmfFiBCL0h9pzyvLWNs/zFwMIGg/2IQXO48JAU0MTrvYV4R8aG3g7AgL73n9" crossorigin="anonymous"></script>
