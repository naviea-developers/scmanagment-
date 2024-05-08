<tr>
    <th scope="col">SL</th>
    <th scope="col">Category</th>
    <th scope="col">Brand Name</th>
    <th scope="col">Brand Logo</th>
    <th scope="col">Action</th>
</tr>

@foreach ($brand as $i=>$b)
    <tr>
        <td>{{ $i+1 }}</td>

        <td>
            @foreach ($category as $Mcat)
                @if ($Mcat->id == $b->category)
                    {{ $Mcat->name }}
                @endif
            @endforeach
        </td>

        <td>{{ $b->name }}</td>
        <td>
            <img src="{{ $b->img }}" alt="" style="width:100px">
        </td>
        <td>
            <form action="/editBrand" method="post" style="float:left">
                @csrf
                <input type="hidden" name="catId" value="{{ $b->id }}">
                    <button class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
            </form>
            <form action="deleteBrand" method="post" style="float:left">
                @csrf
                <input type="hidden" name="catId" value="{{ $b->id }}">
                    <button class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
            </form>
        </td>
    </tr>
