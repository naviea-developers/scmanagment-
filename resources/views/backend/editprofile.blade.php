@extends('backend.master')

@section('title', 'Manage Profile')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-user"></i>
        <div>
          <h4>Hello <span style="text-transform:capitalize;">{{ session()->get('userRole') }}</span> </h4>
          <p class="mg-b-0">Edit your profile information</p>
        </div>
      </div><!-- d-flex -->


        <div class="p-5">

            <div class="br-section-wrapper">

                <div class="row">

                    @foreach ($user as $ur)

                    <form action="{{ route('UpdateAdminPage') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-12">
                            <img src="{{ url('/backend/profile_picture') }}/@if (!empty($ur->img)){{ $ur->img }}@else
                            dft/user.png @endif" id="blah"
                            style="height:200px;width: 200px;
                            margin-bottom:10px;
                            object-fit:cover;border-radius:50%;
                            border:1px solid #000">
                                <br>
                                <input type="file" name="profilePicture"
                                onchange="document.getElementById('blah').src =
                                 window.URL.createObjectURL(this.files[0])"
                                 class="form-control" accept="image/*">
                            </div>
                        </div>
                            <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Name : </label>
                                <input type="text" name="username"
                                 class="form-control"
                                value="{{ $ur->name }}" required>
                            </div>

                            <div class="col-6">
                                <label for="">Email : </label>
                                <input type="text" name="email"
                                 class="form-control"
                                value="{{ $ur->email }}" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Address : </label>
                                <input type="text" name="address"
                                 class="form-control"
                                value="{{ $ur->addres }}" required>
                            </div>

                            <div class="col-6">
                                <label for="">Phone : </label>
                                <input type="text" name="phone"
                                 class="form-control"
                                value="{{ $ur->phone }}" required>
                            </div>
                        </div>
                        <br>
                        @if (session()->get('userRole') == 'teacher')

                        @php
                            $edu_deg = '';
                            $edu_cirti = '';
                            $exp = '';
                            $sub = '';
                        @endphp
                        @foreach ($teacher_info as $ti)
                            @php
                                $edu_deg = $ti->edu_deg;
                                $edu_cirti = $ti->edu_cirti;
                                $exp = $ti->exp;
                                $sub = $ti->sub;
                            @endphp
                        @endforeach

                        <div class="row">
                            <div class="col-6">
                                <label for="">Educational Degree : </label>
                                <input type="text" class="form-control"
                                required multiple name="degree"
                                value="{{ $edu_deg }}" >
                            </div>

                            <div class="col-6">
                                <label for="">Subject-matter
                                    expert : </label>
                                <input type="text" name="subject_exp" class="form-control"
                                value="{{ $sub }}" required>
                            </div>
                        </div>

                        <br>

                       <div class="row">
                            <div class="col-6">
                                <label for="">Education certificate : </label>
                                <input type="file"
                                    accept=".doc,.docx,.xml,application/msword,
                                    application/vnd.openxmlformats-
                                    officedocument.wordprocessingml.document,image/*"
                                     class="form-control" name="edu_certifi"
                                     @if (empty($edu_cirti))
                                        required
                                     @endif
                                     multiple>
                                     @if (!empty($edu_cirti))
                                     <a href="{{ url('/backend/education_certificate') }}/{{ $edu_cirti }}" target="_blank">view your certificate</a>
                                     @endif
                            </div>
                            <div class="col-6">
                                <label for="">Exprience : </label>
                                <input type="text" class="form-control"
                                name="exp" value="{{ $exp }}"
                                required>
                            </div>
                       </div>
                       @endif
                        
                        <div class="col-12 p-0">
                            <label for="">Password : </label>
                            <input type="text" class="form-control"
                                name="pass"
                                placeholder="******">
                        </div>
                       
                        <br>
                        <button class="btn btn-primary float-right">
                            Update
                        </button>

                    </form>

                    @endforeach

                </div>

            </div>


        </div>



</div>
@stop
