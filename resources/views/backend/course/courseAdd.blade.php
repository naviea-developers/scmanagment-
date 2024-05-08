@extends('backend.master')

@section('title', 'Add Courses')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Add Courses</h4>
                      <p class="mg-b-0">Add the information of Course</p>
                    </div>
                  </div>

               <form action="{{ route('manageCourse') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <select name="catId" class="form-select" id="cateId">
                                <option value="">--Select Category--</option>
                                @foreach ($category as $cate )
                                   <option value="{{ $cate->catId }}">{{ $cate->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="subcatId" class="form-select" id="subcateId">
                                <option value="">----Select Here------</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Course Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="">Course Video File </label>
                            <input type="file" name="video" class="form-control" required multiple>
                        </div>
                        <div class="col-md-4">
                            <label for="">Course image File </label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" >
                        </div>
                        <div class="col-md-6">
                        <label for="">Course Duration</label>
                        <input type="datetime" name="course_hour" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Total Days</label>
                            <input type="text" name="total_days" class="form-control" >
                        </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-select">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    </div>
                    <button type="button" class=" mt-3 btn btn-primary btn-add" id="addFeature">Add</button>
                    <div class="row">
                        <div class="col-md-12 col-feature">
                            <label for="">Features</label>
                            <input type="text" name="feature[]" class="form-control">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Short Description </label>
                            <textarea style="resize: none" rows="3" cols="2" name="short_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label for="">Long Description</label>
                                <textarea style="resize: none" rows="10" cols="5" name="long_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label for="">Course routine</label>
                                <textarea style="resize: none" rows="10" cols="5" id="editor" name="course_routine" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Add Course</button>
                    </div>


               </form>



            </div>


        </div>

        <style>
            .btn{

            }
        </style>


<script>
    $('#cateId').change(function(){

    $.ajax({
        type: 'get',
        url: "/getSubcategory",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        data: {
            id: $(this).val(),
        },
        success: function(response) {
            $('#subcateId').html(response);
            console.log(response);
        }
    });

});

$(document).ready(function(){
    $('#addFeature').click(function(){
        $('.col-feature').append("<div class='col-md-12' style='padding:0'><input type='text' name='feature[]' class='mt-2 form-control'></div>")
    })
});
</script>
</div>
@stop
