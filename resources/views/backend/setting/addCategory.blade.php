@extends('backend.master')

@section('title', 'Manage Category')

<link rel="stylesheet" href="{{ URL::asset('css/custom/category.css') }}">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-gear"></i>
                    <div>
                      <h4>Add Category</h4>
                      <p class="mg-b-0">Add Category Details Here</p>
                    </div>
                </div>

                <form action="insertCategory" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 20px">
                            <label for="">Category Name : </label>
                            <input type="text" name="categoryName" id="" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Category position : </label>
                            <input type="number" name="categoryPosition" id="" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Category Status : </label>
                            <select name="status" id="" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
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
