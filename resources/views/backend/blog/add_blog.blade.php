@extends('backend.master')

@section('title', 'Add Blog')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Add blog</h4>
                      <p class="mg-b-0">Add the information of blog</p>
                    </div>
                </div>

               <form action="{{ route('storeBlog') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            @php
                                $category = DB::table('category')->get()
                            @endphp
                            <label for="">Category :</label>
                            <select name="catId" class="form-select" id="categoryId">
                                <option value="">Select Category</option>
                                @foreach ($category as $cate )
                                   <option value="{{ $cate->catId }}">{{ $cate->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Sub Category :</label>
                            <select name="subcatId" class="form-select" id="subcategoryId">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Blog title : </label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Blog Video/Image : </label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="col-md-8">
                            <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Short Description : </label>
                            <textarea style="resize: none" rows="3" cols="2" name="short_descp" class="form-control" required></textarea>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-12">
                            <label for="">Long Description : </label>
                            <textarea style="resize: none" rows="10" cols="5" name="long_descp" class="form-control" required></textarea>
                    </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Add Blog</button>
                    </div>


               </form>



            </div>


        </div>


<script src="js/custom/addTeacherForClass.js"></script>
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
</div>
@stop
