@extends('backend.master')

@section('title', 'Edit Blog')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Edit blog</h4>
                      <p class="mg-b-0">Update the information of blog</p>
                    </div>
                </div>

                @foreach ($editData as $data)

                <form action="{{ route('updateBlog',['id'=> $data->bid]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            @php
                                $category = DB::table('category')->get()
                            @endphp
                            <label for="">Category :</label>
                            <select name="catId" class="form-select" id="categoryId">
                                <option value="" disabled selected>{{ $data->categoryName }}</option>
                                @foreach ($category as $cate )
                                   <option value="{{ $cate->catId }}">{{ $cate->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Subcategory :</label>
                            <select name="subcatId" class="form-select" id="subcategoryId">
                                <option value="" disabled selected>{{ $data->subcateId }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Blog title : </label>
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="">Blog Video/Image : </label>
                            <input type="hidden" name="prev_file" value="{{ $data->file }}">
                            <input type="file" name="file" class="form-control"  multiple>
                            @if (!empty($data->video))
                            <a href="{{ url('/video') }}/{{ $data->video }}" target="_blank">view previous</a>
                            @endif
                        </div>
                        <div class="col-md-8 mb-2">
                            <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">-----Select Status-------</option>
                                <option value="1" @if($data->status==1) selected @endif >Active</option>
                                <option value="0" @if($data->status==0) selected @endif >Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Short Description : </label>
                            <textarea style="resize: none" rows="3" cols="2" name="short_descp" class="form-control" required>{{ $data->short_descp }}</textarea>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-12">
                            <label for="">Long Description : </label>
                            <textarea id="editor" style="resize: none" rows="10" cols="5" name="long_descp" class="form-control" required>{{ $data->long_descp }}</textarea>
                    </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Add Blog</button>
                    </div>
               </form>
               @endforeach
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
