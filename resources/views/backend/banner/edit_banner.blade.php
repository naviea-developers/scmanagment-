@extends('backend.master')

@section('title', 'Edit Banner')


<link rel="stylesheet" href="#">

@section('content')

<div class="br-mainpanel">




        <div class="p-5">

            <div class="br-section-wrapper">


                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Edit banner</h4>
                      <p class="mg-b-0">Update the information of banner</p>
                    </div>
                </div>

                @foreach ($editBanner as $banner)

               <form action="{{ route('updateBanner',['id'=>$banner->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Category Name : </label>
                            <input type="text" name="categoryId" value="{{ $banner->categoryId }}" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Banner title : </label>
                            <input type="text" name="title" value="{{ $banner->title }}" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label for="">Banner Image : </label>
                            <input type="hidden" name="prev_pic" value="{{$banner->image}}">
                            <input type="file" name="image" class="form-control"  @if (empty($banner->image))
                            required
                            @endif
                            >
                         @if (!empty($banner->image))
                         <a href="{{ url('/backend/banner') }}/{{ $banner->image }}" target="_blank">view your Banner</a>
                         @endif
                        </div>
                        <div class="col-md-12">
                            <label for="">Status : </label>
                            <select name="status" id="" class="form-select">
                                <option value="">-----Select Status-------</option>
                                <option value="1" @if($banner->status==1) selected @endif>Active</option>
                                <option value="0" @if($banner->status==0) selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Update Banner</button>
                    </div>

               </form>

               @endforeach

            </div>

        </div>


<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
