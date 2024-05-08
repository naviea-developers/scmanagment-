    <tr>
        <th scope="col">SL</th>
        <th scope="col">Image</th>
        <th scope="col">Sub Category Name</th>
        <th scope="col">parent Category Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
    </tr>

    @foreach ($subcategory as $i=>$cat)
        <tr>
            <td>{{ $i+1+$loaded }}</td>
            <td>
                <img src="{{ $cat->img }}" alt="" style="width:100px">
            </td>
            <td>{{ $cat->name }}</td>
            <td>

                @foreach ($category as $Mcat)
                    @if ($Mcat->id == $cat->mainCategory)
                        {{ $Mcat->name }}
                    @endif
                @endforeach

            </td>
            <td>{{ substr_replace($cat->description, "...", 30)}}</td>
            <td>
                <form action="/editSubCategory" method="post" style="float:left">
                    @csrf
                    <input type="hidden" name="catId" value="{{ $cat->id }}">
                        <button class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
                </form>
                <form action="deleteSubCategory" method="post" style="float:left">
                    @csrf
                    <input type="hidden" name="catId" value="{{ $cat->id }}">
                        <button class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
