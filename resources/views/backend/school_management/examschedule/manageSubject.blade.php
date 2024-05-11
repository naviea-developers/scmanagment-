@extends('Backend.layouts.layouts')

@section('title', 'Manage Subject')


<link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}">

@section('content')

<div class="br-mainpanel">


        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Subject</h4>
                      <p class="mg-b-0">Manage all subject for student</p>
                    </div>
                  </div>

                    <a href="/addSubject"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add subject
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($subj as $i=>$sub)

                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $sub->class_name }}</td>
                            <td>{{ $sub->subject }}</td>
                            <td><img src="{{ asset('backend/subject/'.$sub->iamge) }}" width="50" height="50"
                                 alt=""></td>
                            <td>
                                <a href="{{ route('editSubject',['id'=>$sub->id]) }}"><i class="fa-solid fa-edit btn btn-sm btn-success"></i></a>

                                    <a href="{{ route('deleteSubj',['id'=>$sub->id]) }}" class="btn"
                                    style="margin-left:5px;">
                                        <i class="fa-duotone
                                        fa-trash-can btn-danger btn-sm"></i>
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
