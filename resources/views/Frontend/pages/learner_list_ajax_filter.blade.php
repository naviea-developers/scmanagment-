
    {{-- @foreach ($students as $student)
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
    @endforeach --}}


@foreach ($students as $student)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="our-team">
        <div class="picture">
        <img class="img-fluid" src="{{ @$student->image_show }}">
        </div>
        <div class="team-content">
            <h3 class="name" style="color: var(--text_color)">{{ @$student->student_name }}</h3>
            <h4 class="title" style="color: var(--text_color)">{{ @$student->class->name }}</h4>
            <h4 class="title" style="color: var(--text_color)">Section: {{ @$student->section->name }}</h4>
            <h4 class="title" style="color: var(--text_color)">Group: {{ @$student->group->name }}</h4>
        </div>
    </div>
    </div>
@endforeach