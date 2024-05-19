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

    <div class="float-end">
      <a href="" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
    </div>

    <div class="school-name">
      <h1 style="margin-left: 80px;">School Name</h1>
      <h5>Class Name: </h5>
      <h5>Examination: </h5>
    </div>
  
    <div class="class-routine">
      <h2>Exam Routine</h2>
      <table>

        <thead>
          <tr>
            <th>Class Name</th>
            <th>Subject Name</th>
            <th>Bulding Name</th>
            <th>Floor Name</th>
            <th>Room Name</th>
            <th>Marke</th>
            <th>Pass Marke</th>
            <th>Date</th>
            <th>Time</th>
            
          </tr>
        </thead>

        <tbody>
          @foreach ($examSchedules as  $routine)
            <tr>
              <td>{{ $routine->examClass->class->name }}</td>
              <td>{{ $routine->examClass->subject->name }}</td>
              <td>{{ $routine->bulding->name }}</td>
              <td>{{ $routine->floor->name }}</td>
              <td>{{ $routine->room->name }}</td>
              <td>{{ $routine->examClass->marke }}</td>
              <td>{{ $routine->examClass->pass_marke }}</td>
              {{-- <td>{{ $routine->pass_marke }}</td> --}}
              <td>{{date('d,F,Y',strtotime(@$routine->examClass->date))}}</td>
              <td>{{ date('h:i A', strtotime($routine->examClass->start_time)) }} - {{ date('h:i A', strtotime($routine->examClass->end_time)) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>














