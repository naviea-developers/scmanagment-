@extends('Backend.layouts.layouts')

@section('title', 'All Homework')


{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">




        <div class="p-2">
            <div class="br-section-wrapper">


                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All HomeWork</h4>
                      <p class="mg-b-0">Manage Homework</p>
                    </div>
                  </div>

                  {{-- <input type="text" placeholder="Search Data" id="myInput"> --}}

                <a href="{{ url('addHomework') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Homework
                    </a>
                  <br>
                <table class="table" id="datatable1">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Homework Image</th>
                        <th scope="col">Details</th>
                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_homework as $homework)
                        <tr>
                            <td>{{$homework->id}}</td>
                            <td>{{$homework->classId}}</td>
                            <td>{{$homework->teacherId}}</td>
                            <td><img src="{{ asset('homework/'.$homework->image)}}" height="80" width="80" alt=""></td>
                            <td>{{$homework->details}}</td>
                            {{-- <td>
                                <a href=""><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>
                                <a href=""><i class="fa-solid fa-trash btn btn-sm  btn-danger"></i></a>
                            </td> --}}
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
