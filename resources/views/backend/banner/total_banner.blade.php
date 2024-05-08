@extends('backend.master')

@section('title', 'All Banner')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">
            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Courses</h4>
                      <p class="mg-b-0">Manage all Banner for student</p>
                    </div>
                  </div>

                    <a href="{{ route('addBanner') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Banner
                    </a>
                    <br>


                <input type="text" placeholder="Search Data" id="myInput">

                <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Banner Title</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($bannerData as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->categoryId}}</td>
                            <td>{{$data->title}}</td>
                            <td><img src="{{ asset('backend/banner/'.$data->image)}}" height="50" width="50" alt=""></td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a href="{{ route('editBanner',['id'=>$data->id]) }}"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href="{{ route('deleteBanner',['id'=>$data->id]) }}"><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
</div>


<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@stop
