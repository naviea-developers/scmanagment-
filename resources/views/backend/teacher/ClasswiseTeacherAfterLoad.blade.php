<h2>{{ str_replace("."," ",$classData) }}</h2>
<table class="table">
<thead>
    <tr>
    <th scope="col">Subject Name</th>
    <th scope="col">Teacher Name</th>
    </tr>
</thead>
<tbody>

    @foreach ($users as $ud)
        <tr>
            <td>{{ $ud->subject }}</td>
            <td>
                @if (!empty($ud->img))
                    <img src="{{ url('/backend/profile_picture') }}/{{ $ud->img }}"
                    style="height: 30px;width: 30px;">

                    @else
                    <img src="{{ url('/backend/profile_picture') }}/dft/user.png"
                    style="height: 30px;width: 30px;">
                @endif
                {{ $ud->name }}
            </td>
        </tr>
    @endforeach


</tbody>
</table>

