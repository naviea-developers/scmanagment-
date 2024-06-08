@if (@$students->count() > 0)
<div class="container">
  <div class="class-routine">
    <h2 class="my-4">Add Results</h2>
    <form action="{{ route('instructor.student_result_store') }}" method="POST">
      @csrf
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
              <th scope="col">Sl</th>
              <th scope="col">Roll</th>
              <th scope="col">Student Name</th>
              <th scope="col">Class</th>
              <th scope="col">Subject</th>
              <th scope="col">Session</th>
              {{-- <th scope="col">Academic Year</th> --}}
              <th scope="col">Section</th>
              <th scope="col">Mark</th>
              <th scope="col">Pass Mark</th>
              <th scope="col">Obtained Mark</th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1; @endphp
          @foreach ($students as $student)
              @php
                  $examResult = $examResults[$student->id] ?? null;
                  $obtainedMarke = $examResult ? $examResult->obtained_marke : '';
              @endphp
              <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ @$student->roll_number }}</td> 
                  <td>{{ @$student->student_name }}</td>          
                  <td>{{ @$student->class->name }}</td>  
                  <td>{{ @$Examclass->subject->name }}</td>                    
                  <td>{{ @$student->session->start_year }}-{{ $student->session->end_year }}</td>
                  {{-- <td>{{ @$student->academic_year->year }}</td>     --}}
                  <td>{{ @$student->section->name }}</td>                   
                  <td>{{ @$Examclass->marke }}</td>                    
                  <td>{{ @$Examclass->pass_marke }}</td>
                  <td>
                      <input type="number" value="{{ $obtainedMarke }}" name="obtained_marke[{{ $student->id }}]" class="form-control">
                      <input type='hidden' name='roll_number[{{ $student->id }}]' value="{{ $student->roll_number }}">
                      <input type='hidden' name='class_id[{{ $student->id }}]' value="{{ $student->class->id }}">
                      <input type='hidden' name='session_id[{{ $student->id }}]' value="{{ $student->session->id }}">
                      <input type='hidden' name='section_id[{{ $student->id }}]' value="{{ $student->section->id }}">
                      <input type='hidden' name='academic_year_id[{{ $student->id }}]' value="{{ @$student->academic_year->id }}">
                      <input type='hidden' name='subject_id[{{ $student->id }}]' value="{{ $Examclass->subject_id }}">
                      <input type='hidden' name='marke[{{ $student->id }}]' value="{{ $Examclass->marke }}">
                      <input type='hidden' name='pass_marke[{{ $student->id }}]' value="{{ $Examclass->pass_marke }}">
                      <input type='hidden' name='examination_id[{{ $student->id }}]' value="{{ $Examclass->examination_id }}">
                      <input type='hidden' name='exam_class_id[{{ $student->id }}]' value="{{ $Examclass->id }}">
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
  </div>
</div>
@else
  <div class="text-center">
    <h2>Data Not Found!</h2>
  </div>
@endif