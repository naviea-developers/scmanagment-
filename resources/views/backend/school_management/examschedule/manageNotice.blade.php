@extends('backend.master')

@section('title', 'All Notice')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">




        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Notices</h4>
                      <p class="mg-b-0">Manage all Notice</p>
                    </div>
                  </div>

                    <a href="{{ route('addNotice') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Notice
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Notice</th>
                        <th scope="col">Notice Name</th>
                        <th scope="col">Notice Details</th>
                        <th scope="col" >Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($notice as $notice)

                        <tr>
                            <td>{{$notice->id }}</td>
                            <td>{{$notice->notice}}</td>
                            <td>{{$notice->name}}</td>
                            <td>{{$notice->description}}</td>
                            <td>
                                <a href="editNotice/{{ $notice->id }}" class="btn btn-success btn-edit">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>


        </div>



</div>
@stop
