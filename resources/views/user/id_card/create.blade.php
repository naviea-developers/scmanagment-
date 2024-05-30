@extends('user.layouts.master-layout')
@section('head')
@section('title','- ID Card')


@endsection
@section('main_content')
<style>
		
	/* founder and co-funder section */
	.ourteam-section {
		padding-bottom: unset;
	}


	.our-team-title {
		margin-bottom: 15px;
	}
	.our-team-title h2 {
		padding: 0px;
		margin: 0px;
		font-weight: bold;
		border-left: 5px solid var(--header_color);;
		/* border-left: 5px solid #007bff; */
		padding-left: 5px;
		border-radius: 4px;
		font-size: 24px;
	}

	.our-team {
		padding: 30px 0 40px;
		margin-bottom: 30px;
		background-color: #f7f5ec;
		text-align: center;
		overflow: hidden;
		position: relative;
		border: 1px solid var(--header_color);;
		/* border: 1px solid #007bff; */
		border-radius: 8px;
		transition: all 0.4s ease-in 0s;
		cursor: pointer;
	}
	.our-team:hover {
		background: white;
	}
	.our-team .picture {
		display: inline-block;
		height: 130px;
		width: 130px;
		z-index: 1;
		position: relative;
	}

	.our-team .picture::before {
		content: "";
		width: 100%;
		height: 0;
		border-radius: 50%;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: 135%;
		right: 0;
		left: 0;
		opacity: 0.9;
		transform: scale(3);
		transition: all 0.3s linear 0s;
	}

	.our-team:hover .picture::before {
		height: 100%;
	}

	.our-team .picture::after {
		content: "";
		width: 100%;
		height: 100%;
		border-radius: 50%;
		background-color: var(--header_color);
		/* background-color: #1369ce; */
		position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
	}

	.our-team .picture img {
		width: 100%;
		height: auto;
		border-radius: 50%;
		transform: scale(1);
		transition: all 0.9s ease 0s;
	}

	.our-team:hover .picture img {
		box-shadow: 0 0 0 14px #f7f5ec;
		transform: scale(0.7);
	}

	.our-team .title {
		display: block;
		font-size: 13px;
		color: #4e5052;
		text-transform: capitalize;
	}

	.our-team .social {
		width: 100%;
		padding: 0;
		margin: 0;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: -100px;
		left: 0;
		transition: all 0.5s ease 0s;
	}

	.our-team:hover .social {
		bottom: 0;
	}

	.our-team .social li {
		display: inline-block;
	}

	.our-team .social li a {
		display: block;
		padding: 10px;
		font-size: 17px;
		color: white;
		transition: all 0.3s ease 0s;
		text-decoration: none;
	}

	.our-team .social li a:hover {
		color: var(--header_color);
		/* color: #1369ce; */
		background-color: #f7f5ec;
	}

	.team-content .name{
		font-size: 18px;
		color: black;
		margin-top: 30px;
	}
	.closeIcon button{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.closeIcon button span{
		background: #da0b0b;
		padding: 10px;
		border-radius: 50%;
		height: 35px;
		width: 35px;
		position: absolute;
		margin-top: 3px;
		color: white;
		display: flex;
		justify-content: center;
		align-items: center;
	}

</style>


<div class="right_section">
    <div>
        <h4 style="color: var(--seller_text_color)">Student ID Card</h4>
    </div>
</div>


<div class="col-md-4">
       
    @php
        $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
        $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
        $school_info = json_decode($results->option_value);
    @endphp

    <section class="ourteam-section">
      <!-- Founder and CEO -->
      <div class="">
          {{-- <div class="our-team-title mt-3">
              <h2 style="color: var(--text_color)">Your Consultant</h2>
          </div> --}}
          <div class="row">
              {{-- @foreach ($founders as $founder) --}}
  
             

              <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1">

                
    


              <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">

                <div class="col-md-12" style="color: white">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('public/upload/school_logo/'.@$school_info->school_logo) }}" alt="school-logo" style="height: 100px; width:100px">
                        </div>
                        <div class="col-md-9">
                            <div class="text-center">
                                <h5><b>{{ @$school_info->school_name }}</b></h5>                       
                                 Email : {{ @$school_info->email }} <br> Website : {{ @$school_info->website }} </p>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 0px">
                </div>


                <div class="picture">
                  <img class="img-fluid" src="{{ auth()->user()->image_show }}" alt="{{ auth()->user()->name }}"/>
                </div>
                <div class="team-content">
                  <h4 class="mt-3" style="text-transform: uppercase;">{{ auth()->user()->name }}</h4>
                    @if (auth()->user()->type == 2 || auth()->user()->type == 8)
                    <p class="" style="color: var(--text_color); margin-buttom:0px">
                        Designation: {{ auth()->user()->user_designation->name }}, 
                        @if (auth()->user()->teacher_type == 'permanent')
                            Permanent 
                        @elseif (auth()->user()->teacher_type == 'guest') 
                            Guest @endif
                    </p>

                    @elseif (auth()->user()->type == 1)
                    <h6><b>DASIGNATION: STUDENT</b></h6>
                       
                        @if ($student)
                        <div class="mt-3">
                            <h6><b>STUDENT ID : {{ @$student->student_id_number }}</b></h6>
                            <h6><b>SESSION : {{ @$student->session->start_year }}-{{ @$student->session->end_year }}</b></h6>
                            <h6><b>DATE OF BIRTH : {{ @$student->dob }}</b></h6>
                            <h6><b>BLOOD GROUP : B+</b></h6>
                        </div>
                        @endif
                    @endif
                 

                   

                    
                  {{-- <p class="" style="color: var(--text_color); "> {!! auth()->user()->description !!}</p> --}}
                </div>
                {{-- @if (auth()->user()->type == 2 || auth()->user()->type == 8)
                <ul class="social">
                  <li><a href="{{ auth()->user()->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                  <li><a href="{{ auth()->user()->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                  <li><a href="{{ auth()->user()->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                  <li><a href="{{ auth()->user()->instagram_id }}" target="_blank" class="fab fa-instagram" aria-hidden="true"></a></li>
                </ul>
                @endif --}}
              </div>
            </div>
            {{-- @endforeach --}}
            
          </div>
        </div>
  </section>
  
  

</div>







{{--    
    <div class="right_section">
        <div>
            <h4 style="color: var(--seller_text_color)">Student ID Card</h4>
        </div>
    </div>
    <div class="passwodBox mb-3" >
        <form action="" method="POST" style="margin-top: 0%">
            @csrf

            @php
                $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
                $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                $school_info = json_decode($results->option_value);
            @endphp

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6" style="height: 100%">
                        <div class="card card-body" style="width: 400px; border: 1px solid">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('public/upload/school_logo/'.@$school_info->school_logo) }}" alt="school-logo" style="height: 100px; width:100px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text-center">
                                            <h5><b>{{ @$school_info->school_name }}</b></h5>                       
                                             Email : {{ @$school_info->email }} <br> Website : {{ @$school_info->website }} </p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="margin-top: 0px">
                            </div>
                            <div class="text-center">
                                @if (auth()->user()->type == 1)
                                <h4 class="mt-2 mb-2"><span style="background: blueviolet; color: white">&nbsp;STUDENT&nbsp;</span></h4>
                                @endif
                                <div class="image-container" style="text-align: center;">
                                    <img src="{{ auth()->user()->image_show }}" alt="student-image" style="height: 150px; width: 150px;">
                                </div>
                                <h3 class="mt-3" style="text-transform: uppercase;">{{ auth()->user()->name }}</h3>
                            </div>
                            
                            <div class="mt-3">
                                <h6><b>STUDENT ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ @$student->student_id_number }}</b></h6>
                                <h6><b>SESSION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ @$student->session->start_year }}-{{ @$student->session->end_year }}</b></h6>
                                <h6><b>DATE OF BIRTH : {{ @$student->dob }}</b></h6>
                                <h6><b>BLOOD GROUP : B+</b></h6>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-6" style="height: 100%">
                        <div class="card card-body" style="width: 400px; border: 1px solid">

                        </div>
                    </div>
                </div>
            </div>

            

        </form>
    </div> --}}
@endsection
