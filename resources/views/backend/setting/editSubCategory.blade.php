@extends('backend.master')

@section('title', 'Edit Sub Category')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Edit Sub Category</h4>
                      <p class="mg-b-0">Edit Category Details Here</p>
                    </div>
                  </div>

                @foreach ($editsubCategory as $edit)

                <form action="/updatesubCategory/{{ $edit->id }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Select Category : </label>
                            <select name="category" id="" class="form-select" required>
                                @foreach ($category as $cats)
                                    <option value="{{ $cats->catId }}">
                                        {{ $cats->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="">Sub-Category Name : </label>
                            <input type="text" name="subcat" value="{{ $edit->subCategoryName }}" class="form-control" required>
                        </div>
                    </div>
                        <br><br>
                    <center>
                        <button class="btn btn-primary">
                            <i class="fa-regular fa-plus"></i>
                             Update Category
                        </button>
                    </center>

                </form>
                @endforeach


            </div>


        </div>

</div>
@stop
