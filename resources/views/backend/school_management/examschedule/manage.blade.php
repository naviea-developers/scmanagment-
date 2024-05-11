@extends('Backend.layouts.layouts')

@section('title', 'Manage Class')

<link rel="stylesheet" href="css/custom/eduStc.css">


@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>View All Class</h4>
                      <p class="mg-b-0">All Class Details Here</p>
                    </div>
                </div>

                    <a href="/addClass" class="btn btn-primary btn-sm addclassbtn">Add New Class</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class ID</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($class as $i=>$c)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $c->class_id }}</td>
                                <td>{{ $c->class_name }}</td>
                                <td>
                                    <form action="">
                                        <a href="{{ route('deleteClass',['id'=>$c->id]) }}" class="btn btn-light"><i class="fa-duotone fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>


        </div>



</div>
@stop
