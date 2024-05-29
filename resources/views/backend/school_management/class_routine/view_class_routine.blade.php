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

@if (@$class_routine->count() > 0)
    <div class="float-end">
      {{-- <a href="{{ route('admin.routine.print',$class_routine->id) }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a> --}}
      <a href="{{ route('admin.routine.print') }}?class_id={{ @$class_routine[0]->class_id }}&session_id={{ @$class_routine[0]->session_id }}&section_id={{ @$class_routine[0]->section_id }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
    </div>

    <div class="school-name">
      <h1 style="margin-left: 80px;">School Name</h1>
      <h5>Class Name: {{ @$class_routine[0]->class->name }}</h5>
      <h5>Session: {{@$class_routine[0]->session->start_year}} - {{@$class_routine[0]->session->end_year}}</h5>
      <h5>Section : {{ @$class_routine[0]->schoolsection->name }}</h5>
    </div>
  
    <div class="class-routine">
      <h2>Class Routine</h2>

      {{-- @php
        $classRoutinesByDay = [];
        $classDurations = [];

        foreach ($class_routine as $data) {
            $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
            if (!in_array($data->classDuration->name, $classDurations)) {
                $classDurations[] = $data->classDuration->name;
            }
        }
      @endphp

      <table>
          <thead>
              <tr>
                  <th scope="col">Day</th>
                  @foreach ($classDurations as $duration)
                      <th scope="col">
                          {{ $duration }} <br>
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
                                  Room- {{ @$routines[$duration]->room->name }}
                              @else
                                  
                              @endisset
                          </td>
                      @endforeach
                  </tr>
              @endforeach
          </tbody>
      </table> --}}

     {{-- @php
      $classRoutinesByDay = [];
      $classDurations = [];

      // Sort class routines by day
      $class_routine_sorted = $class_routine->sortBy('day_id');

      foreach ($class_routine_sorted as $data) {
          $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
          if (!in_array($data->classDuration->name, $classDurations)) {
              $classDurations[] = $data->classDuration->name;
          }
      }
    
     @endphp

    <table>
        <thead>
            <tr>
                <th scope="col">Day</th>
                @foreach ($classDurations as $duration)
                    <th scope="col">
                        {{ $duration }} <br>
                        @php
                          $durationData = $class_routine->firstWhere('classDuration.name', $duration)->classDuration;
                        @endphp
                        {{ date('h:i A', strtotime($durationData->start_time)) }} - 
                        {{ date('h:i A', strtotime($durationData->end_time)) }}
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
                                {{ $routines[$duration]->subject->name }} <br>
                                {{ $routines[$duration]->teacher->name }} <br>
                                Room- {{ $routines[$duration]->room->name }}
                            @else
                                
                            @endisset
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    @php
        $classRoutinesByDay = [];
        $classDurations = [];

        foreach ($class_routine as $data) {
            $classRoutinesByDay[$data->day][$data->classDuration->name] = $data;
            if (!in_array($data->classDuration->name, $classDurations)) {
                $classDurations[] = $data->classDuration->name;
            }
        }

        // Sort class durations
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
    
    @else
    <div class="text-center">
      <h2>Data Not Found !</h2>
  </div>
  @endif