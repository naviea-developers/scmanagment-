<h2>{{ str_replace("."," ",$classData) }}</h2>
<table class="table">
<thead>
    <tr>
    <th scope="col">Class Name</th>
    <th scope="col">Student Name</th>
    <th scope="col">Student Image</th>
    </tr>
</thead>
<tbody>

    @foreach ($students as $student)
        <tr>
            <td>{{ $student->class }}</td>
            <td>{{ $student->name }}</td>
            <td>
                @if (!empty($student->img))
                    <img src="{{ url('/backend/profile_picture') }}/{{ $student->img }}"
                    style="height: 30px;width: 30px;">

                    @else
                    <img src="{{ url('/backend/profile_picture') }}/dft/user.png"
                    style="height: 30px;width: 30px;">
                @endif
            </td>
        </tr>
    @endforeach


</tbody>
</table>

