@extends('backend.master')

@section('title', 'Add Brand')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Add Brand</h4>
                      <p class="mg-b-0">Add Brand Details Here</p>
                    </div>
                  </div>


                <form action="insertBrand" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @php
                            $category = DB::table('category')->get()
                        @endphp
                        <select name="catId" class="form-select" id="categoryId">
                            <option value="">--Select Category--</option>
                            @foreach ($category as $cate )
                               <option value="{{ $cate->catId }}">{{ $cate->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select name="subcatId" class="form-select" id="subcategoryId">
                            <option value="">----Select Here------</option>
                        </select>
                    </div>
                <div class="col-12">
                    <img src="https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=" id="blah" alt="" style="height:200px;width:200px;object-fit:cover;">
                </div>
                <div class="col-md-6">
                    <label for="">Choose Brand Logo : </label>
                    <input type="file" name="logo" class="form-control" required onchange="document.getElementById('blah').src =
                     window.URL.createObjectURL(this.files[0])"
                     class="form-control" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label for="">Brand Name : </label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                    </div>

                        <br><br>
                    <center>
                        <button class="btn btn-primary">
                            <i class="fa-regular fa-plus"></i>
                             Add Brand
                        </button>
                    </center>
                </form>


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
