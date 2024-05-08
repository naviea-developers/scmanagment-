@extends('backend.master')

@section('title', 'Add Sub Category')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Add Sub Category</h4>
                      <p class="mg-b-0">Add Category Details Here</p>
                    </div>
                  </div>

                <form action="insertSubCategory" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Select Category : </label>
                            <select name="category" id="" class="form-select" required><option value="" disabled selected>Select a Category</option>
                                @foreach ($category as $cats)

                                    <option value="{{ $cats->catId }}">
                                        {{ $cats->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Sub-Category Name : </label>
                            <input type="text" name="subcat" class="form-control" required>
                        </div>
                    </div>
                        <br><br>
                    <center>
                        <button class="btn btn-primary">
                            <i class="fa-regular fa-plus"></i>
                             Add Category
                        </button>
                    </center>

                </form>


            </div>


        </div>

</div>
@stop
