{{-- @if (@$students->count() > 0) --}}
    @foreach ($students as $student)
        <div class="col-md-3 mb-3">
            <div class="card card-body shadow">
                <img style="height: 150px; width:100%" src="{{ $student->image_show }}" alt="student-image"/>
                <p class="text-center">{{ $student->student_name }}</p>
                <p class="text-center">{{ @$student->class->name }}</p>
            </div>
        </div>
    @endforeach
{{-- @elseif ($students->count() < 0)
    <div class="text-center">
        <h1 style="font-size: 25px">No More Student..</h1>
    </div>
@endif  --}}