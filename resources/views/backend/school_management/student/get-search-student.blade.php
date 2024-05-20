<table id="datatable1" class="table display responsive nowrap">
    <thead>
      <tr>
        <th class="wd-10p">Id</th>
        <th class="wd-15p">Student Image</th>
        <th class="wd-15p">Student Name</th>
        <th class="wd-15p">Class</th>
        <th class="wd-15p">Academic Year</th>
        <th class="wd-15p">Session</th>
        <th class="wd-15p">Section</th>
        <th class="wd-15p">Group</th>
        <th class="wd-10p">Status</th>
        <th class="wd-10p">Action</th>
      </tr>
    </thead>
    <tbody id="admission-list">
        @php
            $i = 1;
        @endphp
      @if (count($admissions) > 0)
        @foreach ($admissions as $admission)
          <tr>
              <td>{{ $i++ }}</td>
              <td>
                <img src="{{$admission->image_show}}" alt="" width="60px" height="40px" srcset="">
              </td>
              
              <td>{{ $admission->student_name }}</td>
              <td>{{ @$admission->class->name }}</td>
              <td>{{ @$admission->academic_year->year }}</td>
              <td>{{ @$admission->session->start_year }} - {{ @$admission->session->end_year }}</td>
              <td>{{ @$admission->section->name }}</td>
              <td>{{ @$admission->group->name }}</td>
              <td>
                @if($admission->status == 0)
                <a href="{{ route('admin.school_student.status',$admission->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                @elseif($admission->status == 1)
                <a href="{{ route('admin.school_student.status',$admission->id) }}" class="btn btn-sm btn-success">Active</a>
                @endif
              </td>
              <td>
                {{-- <a class="btn text-info" href="{{ route('admin.admission.details', $admission->id) }}"><i class="icon ion-eye tx-28"></i></i></a> --}}
                <a class="btn text-info" href="{{ route('admin.school_student.edit', $admission->id) }}"><i class="icon ion-compose tx-28"></i></a>
                <button class="btn text-danger bg-white"  value="{{$admission->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
              </td>
          </tr>
        @endforeach
      @endif

    </tbody>
  </table>