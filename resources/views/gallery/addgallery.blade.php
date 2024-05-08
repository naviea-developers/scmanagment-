@extends('backend.master')

@section('title', 'Add Images')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-person-chalkboard"></i>
        <div>
          <h4>Add Images</h4>
          <p class="mg-b-0">Add Images in Gallery</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">
                {{-- <h2>Find The Best Teacher </h2> --}}

               <form action="{{ route('storeImages') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Category : </label>
                            <select name="category" id="" class="form-select">
                                <option value="">--------------Select Category--------------</option>
                                @foreach ($category as $cate )
                                    <option value="{{ $cate->categoryName}}">{{ $cate->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Image Title: </label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Images: </label>
                            <input type="file" name="image[]" class="form-control" required multiple>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Add Images</button>
                    </div>

               </form>

            </div>

        </div>


<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
