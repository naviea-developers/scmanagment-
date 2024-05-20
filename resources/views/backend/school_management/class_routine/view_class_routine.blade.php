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


      {{-- @foreach (@$class_routine as $data)
        <table>
          <thead>
            <tr>
              <th scope="col">Day</th>
              <th scope="col">{{ @$data->classDuration->name }} ({{date('h:i:A',strtotime(@$data->classDuration->start_time))}} - {{date('h:i:A',strtotime(@$data->classDuration->end_time))}})</th>
            </tr>
          </thead>
      
          <tbody>
              <tr>
                <td>{{@$data->day}}</td>
                <td>{{@$data->subject->name}} {{@$data->teacher->name}}</td>
              </tr>
          </tbody>
        </table>
      @endforeach --}}

      {{-- <table>
        <thead>
          <tr>
            <th scope="col">Day</th>
            <th scope="col">Class Durations</th>
          </tr>
        </thead>
        <tbody>
          @php $prevDay = null; @endphp
          @foreach ($class_routine as $data)
            @if ($prevDay != $data->day)
              <tr>
                <td>{{ $data->day }}</td>
                <td>
                  @foreach ($class_routine as $routine)
                    @if ($routine->day == $data->day)
                      {{ $routine->subject->name }} {{ $routine->teacher->name }} ({{ date('h:i:A', strtotime($routine->classDuration->start_time)) }} - {{ date('h:i:A', strtotime($routine->classDuration->end_time)) }})<br>
                    @endif
                  @endforeach
                </td>
              </tr>
            @php $prevDay = $data->day; @endphp
            @endif
          @endforeach
        </tbody>
      </table> --}}

      {{-- <table>
        <thead>
          <tr>
            <th scope="col">Day</th>
            <th scope="col">Class Durations</th>
          </tr>
        </thead>
        <tbody>
          @php $prevDay = null; @endphp
          @foreach ($class_routine as $data)
            @if ($prevDay != $data->day)
              <tr>
                <td>{{ $data->day }}</td>
                <td>
                  @foreach ($class_routine as $routine)
                    @if ($routine->day == $data->day)
                      {{ $routine->subject->name }} {{ $routine->teacher->name }} ({{ date('h:i:A', strtotime($routine->classDuration->start_time)) }} - {{ date('h:i:A', strtotime($routine->classDuration->end_time)) }})<br>
                    @endif
                  @endforeach
                </td>
              </tr>
            @php $prevDay = $data->day; @endphp
            @endif
          @endforeach
        </tbody>
      </table> --}}

      {{-- <table>
        <thead>
            <tr>
                <th scope="col">Day</th>
                @php $prevDay = null; @endphp
                @foreach ($class_routine as $k=>$data)
                    @if ($prevDay != $data->classDuration->name)
                        <th scope="col">{{ $data->classDuration->name }}{{ date('h:i A', strtotime($data->classDuration->start_time)) }} - {{ date('h:i A', strtotime($data->classDuration->end_time)) }}</th>
                        @php $prevDay = $data->classDuration->name; @endphp
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
                                <td>{{ $routine->subject->name }} {{ $routine->teacher->name }}</td>
                            @endif
                        @endforeach
                    </tr>
                    @php $prevDay = $data->day; @endphp
                @endif
            @endforeach
        </tbody>
    </table> --}}
   
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
                                Room- {{ $routine->room->name }}
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
    
    @else
    <div class="text-center">
      <h2>Data Not Found !</h2>
  </div>
  @endif