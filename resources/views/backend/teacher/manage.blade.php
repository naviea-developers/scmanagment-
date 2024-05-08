@extends('backend.master')

@section('title', 'Manage Teacher')


<link rel="stylesheet" href="{{ URL::asset('css/custom/teacher.css') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>Manage Teacher</h4>
          <p class="mg-b-0">Teacher All information Here</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">

                <div class="row">
                    @foreach ($user as $ui)
                        <div class="col-md-12">
                            <img src="{{ url('/backend/profile_picture') }}/@if(!empty($ui->img)){{ $ui->img }}@else
                            dft/user.png @endif" alt="" class="teacherPp">
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b>Name :</b> {{ $ui->name }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b>Phone :</b> {{ $ui->phone }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b>Address :</b> {{ $ui->addres }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                               <b> Email :</b> {{ $ui->email }}
                            </div>
                        </div>
                    @endforeach

                    @foreach ($teacher as $ti)
                        <div class="col-md-6">
                            <div class="manageData">
                                <b> Education :</b> {{ $ti->edu_deg }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b> Education : </b>
                                <a href="{{ url('/backend/education_certificate') }}/{{ $ti->edu_cirti }}" target="_blank">View Document</a>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b> Experience :</b> {{ $ti->exp }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="manageData">
                                <b> Subject :</b> {{ $ti->sub }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>



</div>
@stop
