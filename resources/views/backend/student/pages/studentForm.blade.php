@extends('backend.student.master')

@section('content')
    <div class="container py-4 mt-5">
        <div class="row" style="margin-top: 53px ">
            <div class="col-md-12">
                @foreach ($user as $user )

                @if($user->role == 'student')

                <form action="/updateProfile" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('backend/profile_picture')}}/@if(!empty($user->img)){{$user->img}}@else
                            dft/user.png @endif" id="stdImage" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height: 150px;margin: 0 auto;display: block;margin-bottom: 15px;border: 1px solid #000;padding:5px;margin-top: -85px;">
                        </div>
                    </div>
                    <div class="row bg-white p-2">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Photo :
                                </label>
                                <input type="file" accept="image/*" name="image" class="form-control" style="padding-bottom: 35px;"
                                onchange="document.getElementById('stdImage').src =
                                 window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Cover Photo :
                                </label>
                                <input type="file" accept="image/*" name="coverimg" class="form-control" style="padding-bottom: 35px;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-user"></i> Name :
                                </label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-user"></i>Institute Name :
                                </label>
                                <input type="text" name="institute" class="form-control" value="{{$user->institute}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> Roll Number :
                                </label>
                                <input type="text" name="roll" class="form-control" value="{{$user->roll}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> Email :
                                </label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Birth certificate : </label>

                            <input type="file"
                                accept=".doc,.docx,.xml,application/msword,
                                application/vnd.openxmlformats-
                                officedocument.wordprocessingml.document,image/*"
                                 class="form-control" name="birth_certificate"
                                 @if (empty($user->birth_certificate))
                                    required
                                 @endif
                                 multiple>
                                 @if (!empty($user->birth_certificate))
                                 <a href="{{ url('/backend/birth_certificate') }}/{{ $user->birth_certificate }}" target="_blank">view your certificate</a>
                                 @endif
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> Phone :
                                </label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}" required min="11" max="11">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Address :
                                </label>
                                <input type="text" name="addres" class="form-control" value="{{$user->addres}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Class :
                                </label>
                                <select name="class" id="" class="form-select form-control">
                                    @foreach($class as $cls)
                                    <option value="{{$cls->class_id}}">{{$cls->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Father Name :
                                </label>
                                <input type="text" name="fatherName" class="form-control" value="{{$user->fatherName}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Mother Name :
                                </label>
                                <input type="text" name="motherName" class="form-control" value="{{$user->motherName}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Gurdian Phone Number :
                                </label>
                                <input type="text" name="gurdian_phone" class="form-control" value="{{$user->gurdian_phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-user"></i> Gurdian Voter Id :
                                </label>
                                <input type="text" name="gurdian_voter_id" class="form-control" value="{{$user->gurdian_voter_id}}" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <center>
                                <button class="btn btn-success">
                                    Update <i class="fa-duotone fa-handshake"></i>
                                </button>
                            </center>
                        </div>

                    </div>
                </form>
                
                @else
                
                <form action="/updateProfileForTeacher" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('backend/profile_picture')}}/@if(!empty($user->img)){{$user->img}}@else
                            dft/user.png @endif" id="stdImage" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height: 150px;margin: 0 auto;display: block;margin-bottom: 15px;border: 1px solid #000;padding:5px;margin-top: -85px;">
                        </div>
                    </div>
                    <div class="row bg-white p-2">
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Photo :
                                </label>
                                <input type="file" accept="image/*" name="image" class="form-control" style="padding-bottom: 35px;"
                                onchange="document.getElementById('stdImage').src =
                                 window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-house"></i> Cover Photo :
                                </label>
                                <input type="file" accept="image/*" name="coverimg" class="form-control" style="padding-bottom: 35px;">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-user"></i> Name :
                                </label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> Email :
                                </label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> Phone :
                                </label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}" required min="11" max="11">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-at"></i> NID :
                                </label>
                                <input type="text" name="nid" class="form-control" value="{{ $userInfo->nid }}" required maxlength="10" size="10">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Address :
                                </label>
                                <input type="text" name="addres" class="form-control" value="{{$user->addres}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Degree :
                                </label>
                                <input type="text" name="deg" class="form-control" value="{{$userInfo->edu_deg}}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Degree Document :
                                </label>
                                <input type="file"
                                accept=".doc,.docx,.xml,application/msword,
                                application/vnd.openxmlformats-
                                officedocument.wordprocessingml.document,image/*"
                                 class="form-control" name="edu_cirti"
                                 
                                 multiple>
                                 @if (!empty($userInfo->edu_cirti))
                                 <a href="{{ url('/backend/birth_certificate') }}/{{ $userInfo->edu_cirti }}" target="_blank">view your certificate</a>
                                 @endif
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Exprience :
                                </label>
                                <input type="text" name="exp" class="form-control" value="{{ $userInfo->exp }}" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">
                                    <i class="fa-duotone fa-lock"></i> Subject :
                                </label>
                                <input type="text" name="sub" class="form-control" value="{{ $userInfo->sub }}" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <center>
                                <button class="btn btn-success">
                                    Update <i class="fa-duotone fa-handshake"></i>
                                </button>
                            </center>
                        </div>

                    </div>
                </form>
                
                @endif
                
                
                @endforeach
            </div>
        </div>
    </div>
@endsection
