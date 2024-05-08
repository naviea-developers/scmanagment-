@extends('backend.student.master')

@section('content')


<section style="">
  <div class="container mt-5">
      
      @foreach($user as $usr)
        @if($usr->role == 'student')
        <div class="row">
            <div class="col-12" style="position:relative">
                <img src="{{ asset('/backend/profile_picture/').'/'.$usr->coverimg }}" class="w-100" style="height:230px;object-fit:cover;">
                
                <img src="{{ asset('/backend/profile_picture/').'/'.$usr->img }}" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);background: #e5e5e5;padding: 5px;">
                   <a href="/editProfile/{{ $usr->id }}" class="btn btn-primary btn-sm" style="margin: 0 auto;position: absolute;right: 35px;bottom: 15px;"> 
                        <i class="fa-duotone fa-user-pen"></i>
                  Edit Profile
                  </a>
            </div>
        </div>
      
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $usr->name }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $usr->email }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $usr->phone }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Father Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->fatherName }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mother Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->motherName }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Gurdian Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->gurdian_phone }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                   <a href="/editProfile/{{ $usr->id }}" class="btn btn-primary"style="margin: 0 auto;" >Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        @else
        
        <div class="row">
            <div class="col-12" style="position:relative;margin-top: -20px;margin-bottom: 10px;">
                <img src="{{ asset('/backend/profile_picture/').'/'.$usr->coverimg }}" class="w-100" style="height:230px;object-fit:cover;">
                
                <img src="{{ asset('/backend/profile_picture/').'/'.$usr->img }}"
                  class="rounded-circle img-fluid" style="width: 150px;height: 150px;position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);background: #e5e5e5;padding: 5px;border:1px solid #000;">
                  <a href="/teacherEditProfile/{{ $usr->id }}" class="btn btn-primary btn-sm" style="margin: 0 auto;position: absolute;right: 35px;bottom: 15px;"> 
                        <i class="fa-duotone fa-user-pen"></i>
                  Edit Profile
                  </a>
            </div>
        </div>
      
      <style>
          .col-sm-3 {
              background : #fff;
              padding: 10px;
          }
          
         .col-sm-9 {
        	background: #fff;
        	padding: 10px;
        	border-left: 10px solid #e5e5e5;
        }
        
        .card{
            border: none !important;
        }
      </style>
      
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-4" style="background:none !important;">
              <div class="card-body">
                  
                  @php 
                        $name = explode(" " , $usr->name);
                  @endphp
                  
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">First Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $name[0] }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Last Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $name[1] }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $usr->email }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $usr->phone }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">NID Number</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->nid }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Education Degree</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->edu_deg }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Experience</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->exp }}</p>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Subject</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $userInfo->sub }}</p>
                  </div>
                </div>
                    
                <div class="row mt-3">
                   <a href="/teacherEditProfile/{{ $usr->id }}" class="btn btn-primary"style="margin: 0 auto;" >Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        @endif
        
        
        @endforeach
    </div>
</section>

@endsection
