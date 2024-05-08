@extends('backend.master')

@section('title', 'All Course')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Blog</h4>
                      <p class="mg-b-0">Manage all Blog</p>
                    </div>
                  </div>
                  <input type="text" placeholder="Search Data" id="myInput">

                    <a href="{{ route('addBlog') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Blog
                    </a>
                    <br>
                <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Blog Title</th>
                        <th scope="col">Blog File</th>
                        <th scope="col">Blog Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($blog as $data)
                        @php
                            $extension = strtolower(pathinfo($data->file,PATHINFO_EXTENSION));
                        @endphp
                        <tr>
                            <td>{{$data->bid}}</td>
                            <td>{{$data->categoryName}}</td>
                            <td>{{$data->title}}</td>
                            @if($extension == 'png'|| $extension == 'jpg'||$extension == 'jpeg'||$extension == 'gif'||$extension == 'tiff'
                            ||$extension == 'psd '||$extension == '.pdf'||$extension == '.raw'||$extension == '.ai')
                            <td><img src="{{ asset('video/'.$data->file)}}" height="50" width="50" alt=""></td>
                            @else
                             <td><video height="100"  width="100" controls>
                                <source src="{{ asset('video/'.$data->file)}}" type="video/mp4">
                            </video></td>
                            @endif
                            <td>{{$data->short_descp}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <a href="editBlog/{{ $data->bid }}"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href="{{ route('deleteBlog',['id'=>$data->bid]) }}"><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
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
