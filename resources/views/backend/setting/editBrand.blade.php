@extends('backend.master')

@section('title', 'Edit Brand')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Edit Brand</h4>
                      <p class="mg-b-0">Edit Brand Details Here</p>
                    </div>
                  </div>

                @foreach ($editbrand as $edit )

                <form action="/updateBrand/{{ $edit->bid }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @php
                            $category = DB::table('category')->get()
                        @endphp
                        <select name="catId" class="form-select" id="categoryId">
                            <option value="" disabled selected>{{ $edit->categoryName }}</option>
                            @foreach ($category as $cate )
                               <option value="{{ $cate->catId }}">{{ $cate->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select name="subcatId" class="form-select" id="subcategoryId">
                            <option value="" disabled selected>{{ $edit->subcatId }}</option>
                        </select>
                    </div>
                <div class="col-md-6">
                    <label for="">Brand Name : </label>
                    <input type="hidden" name="prev_file" value="{{ $edit->logo }}">
                    <input type="file" name="logo" class="form-control"  >
                    @if (!empty($edit->logo))
                    <a href="{{ url('/backend/brand') }}/{{ $edit->logo }}" target="_blank">view previous</a>
                    @endif>
                </div>
                <div class="col-md-6">
                    <label for="">Brand Name : </label>
                    <input type="text" name="name" class="form-control" value="{{ $edit->brandName }}" required>
                </div>

                    </div>

                        <br><br>
                    <center>
                        <button class="btn btn-primary">
                            <i class="fa-regular fa-plus"></i>
                             Update Brand
                        </button>
                    </center>
                </form>

                @endforeach
            </div>


        </div>

</div>

<script>
      $('#categoryId').change(function(){
    $.ajax({
    type: 'get',
    url: "/getBrandsubCategory",
    headers: {
        'X-CSRF-Token': '{{ csrf_token() }}',
    },
    data: {
        id: $(this).val(),
    },
    success: function(response) {
        $('#subcategoryId').html(response);
        console.log(response);
    }
});

});
</script>
@stop
