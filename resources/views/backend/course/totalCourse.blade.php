@extends('backend.master')

@section('title', 'All Course')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">

            <div class="br-section-wrapper" style="overflow: hidden; overflow-x:auto">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Courses</h4>
                      <p class="mg-b-0">Manage all Course for student</p>
                    </div>
                  </div>

                <div class="col-md-12">
                    <div class="col-md-6">
                        <input type="text" class="form-control" onkeyup="myFunction()" id="myInput" placeholder="Search">
                    </div>
                </div>

                    <a href="{{ route('addCourse') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Course
                    </a>
                    <br>
                <table class="table" id="myTable">
                    <thead>
                      <tr>
                        <th scope="col">Course Sub Category</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course File</th>
                        <th scope="col">Image</th>
                        <th scope="col">Course Details</th>
                        <th scope="col">Course Price </th>
                        <th scope="col">Course Duration</th>
                        <th scope="col">Total Days</th>
                        {{-- <th scope="col">Features</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($totalcourse as $course)
                        <tr>
                            <td>{{$course->subcatId}}</td>
                            <td>{{$course->name}}</td>
                            {{-- <td><img src="{{ asset('video/'.$course->video)}}" height="100" width="100" alt=""></td> --}}
                            <td><video height="30"  width="30" controls>
                                <source src="{{ asset('video/'.$course->video)}}" type="video/mp4">
                            </video></td>
                            <td><img src="{{ asset('video/'.$course->image)}}" alt="" height="30" width="30"></td>
                            <td>{{ substr_replace($course->short_description, "...", 20) }}</td>
                            <td>{{$course->price}}</td>
                            <td>{{$course->course_hour}}</td>
                            <td>{{$course->total_days}}</td>
                            {{-- <td>{{$course->feature}}</td> --}}
                            <td>{{ $course->status }}</td>
                            <td style=" width: 83px; float: left;">
                                <a href="editCourse/{{$course->id}}" style="float: left;"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href="deleteCourse/{{ $course->id }}" style="float: left;"><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>

        </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>


    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    const listElement = $('.list-group');

    for (let i = 1; i <= 1500; i++) {
      listElement.append('<li class="list-group-item"> Item ' + i + '</li>');
    }

    listElement.paginathing({
      perPage: 5,
      limitPagination: 9,
      containerClass: 'panel-footer mt-4',
      pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center',
    })

    $('.table tbody').paginathing({
      perPage: 10,
      insertAfter: '.table',
    //   pageNumbers: true,
      ulClass: 'pagination flex-wrap justify-content-center'
    });
  });
</script>
@stop
