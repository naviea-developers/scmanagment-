<table class="table">
    <thead>
      <tr>
        <th scope="col">Session</th>
        <th scope="col">Class Name</th>
        <th scope="col">Sections</th>
        <th scope="col">Subject</th>
        <th scope="col">Teacher</th>
        <th scope="col">Day</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($allData as $data)

        <tr>
            <td>{{@$data->session->start_year->year}} - {{@$data->session->end_year->year}}</td>
            <td>{{@$data->class->name}}</td>
            <td>{{@$data->schoolsection->name}}</td>
            <td>{{@$data->subject->name}}</td>
            <td>{{@$data->teacher->name}}</td>
            <td>{{@$data->day}}</td>
            <td>
            
                {{-- <a href="{{ route('admin.routine.details',$data->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a> --}}
                {{-- <a href="{{ route('admin.routine.edit',$data->id) }}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a> --}}
                <a class="btn text-info" href="{{ route('admin.routine.edit',$data->id) }}"><i class="icon ion-compose tx-28"></i></a>
                <button class="btn text-danger bg-white"  value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>