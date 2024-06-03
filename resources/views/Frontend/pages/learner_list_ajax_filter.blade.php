{{-- @if (@$students->count() > 0) --}}
    @foreach ($students as $student)
        <div class="col-md-3 mb-3">
            <div class="card card-body shadow">
                <img style="height: 150px; width:100%" src="{{ $student->image_show }}" alt="student-image"/>
                <p class="text-center mt-2"><b>{{ $student->student_name }}</b></p>
                    <p class="text-center"> Session: {{ @$student->session->start_year }} - {{ @$student->session->end_year }}
                        <br>{{ @$student->class->name }} 
                       <br> Section: {{ @$student->section->name }}
                       <br> Group: {{ @$student->group->name }}
                    </p>
            </div>
        </div>
    @endforeach
{{-- @elseif ($students->count() < 0)
    <div class="text-center">
        <h1 style="font-size: 25px">No More Student..</h1>
    </div>
@endif  --}}