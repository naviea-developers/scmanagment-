

<table class="table table-border mt-4" style="border: 1px solid #e7e7e7;">
    <tr>
        <td>#</td>
        <td>Class</td>
        <td>Section</td>
        <td>Name</td>
        <td>Roll</td>
        <td>Father Name</td>
        <td>Amount</td>
    </tr>
    @foreach($students as $student)
        <tr>
            <td>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="f_students[]" value="{{$student->id}}" id="fee_list{{$student->id}}">
                </div>
            </td>
            <td>{{$student->class?->name}}</td>
            <td>{{$student->section?->name}}</td>
            <td>{{$student->student_name}}</td>
            <td>{{$student->roll_number}}</td>
            <td>{{$student->father_name}}</td>
            <td>
                <input class="fee_amount" type="text" disabled value="{{$total_fee}}">
            </td>
        </tr>
    @endforeach
<table>