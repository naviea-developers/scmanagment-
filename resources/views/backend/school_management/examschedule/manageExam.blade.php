@extends('Backend.layouts.layouts')

@section('title','All Exam')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Notices</h4>
                      <p class="mg-b-0">Manage all Exam</p>
                    </div>
                  </div>

                    <a href="{{ route('addExam') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Exam
                    </a>
                    <br>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($allData as $data)

                        <tr>
                            <td>{{@$data->examination->name}}</td>
                            <td>{{@$data->class->name}}</td>
                           
                            <td>
                                <form action="{{ route('examDetails') }}" method="POST" style="float: left;margin-right:5px;">
                                    @csrf
                                    <input type="hidden" name="examschedule_id" value="{{ $data->id }}">
                                    {{-- <input type="hidden" name="className" value="{{ $data->className }}"> --}}
                                <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
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
