@extends('backend.master')

@section('title', 'Add Banner')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Add banner</h4>
                      <p class="mg-b-0">Add the information of banner</p>
                    </div>
                  </div>

               <form action="{{ route('storeBanner') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Category Name : </label>
                            <input type="text" name="categoryId" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">Banner title : </label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="">Banner Image : </label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">-----Select Status-------</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
</div>
@stop
