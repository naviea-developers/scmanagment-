<tr>
    <th scope="col">SL</th>
    <th scope="col">Image</th>
    <th scope="col">Category Name</th>
    <th scope="col">Priority</th>
    <th scope="col">Description</th>
    <th scope="col">Action</th>
</tr>
@foreach ($category as $i=>$cat)
    <tr>
        <td>{{ $i+1 + $loaded }}</td>
        <td>
            <img src="{{ $cat->img }}" alt="" style="width:50px">
        </td>
        <td>{{ $cat->name }}</td>
        <td>{{ $cat->Priority }}</td>
        <td>{{ substr_replace($cat->description, "...", 30)}}</td>
        <td>
            <form action="/editCategory" method="post" style="float:left">
                @csrf
                <input type="hidden" name="catId" value="{{ $cat->id }}">
                    <button class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
            </form>
            <form action="deleteCategory" method="post" style="float:left">
                @csrf
                <input type="hidden" name="catId" value="{{ $cat->id }}">
                    <button class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
            </form>
        </td>
    </tr>
@endforeach
