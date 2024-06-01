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
		border-left: 5px solid var(--header_color);
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
		border: 1px solid var(--header_color);
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
		background-color: var(--header_color);
		position: absolute;
		bottom: 135%;
		right: 0;
		left: 0;
		opacity: 0.9;
		transform: scale(3);
		transition: all 0.3s linear 0s;
		height: 100%;
	}

	.our-team .picture::after {
		content: "";
		width: 100%;
		height: 100%;
		border-radius: 50%;
		background-color: var(--header_color);
		position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
	}

	.our-team .picture img {
		width: 100%;
        height: 100%;
		border-radius: 50%;
		transform: scale(1);
		transition: all 0.9s ease 0s;
		box-shadow: 0 0 0 14px #f7f5ec;
		transform: scale(0.7);
	}

	.our-team .title {
		display: block;
		font-size: 13px;
		color: #4e5052;
		text-transform: capitalize;
	}


	/* Print styles */
	@media print {
		body * {
			visibility: hidden;
		}
		.printable, .printable * {
			visibility: visible;
		}
		.printable {
			position: absolute;
			left: 40%;
			top: 40%;
			transform: translate(-40%, -40%);
		}
	}
</style>

@php
	$student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
	$results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
	$school_info = json_decode($results->option_value);
@endphp


<div class="right_section" >
    <div>
        <h4 style="color: black">Student ID Card</h4>
    </div>
</div>
<div class="printable">
<div class="row" >
	<div class="col-md-5">
		<section class="ourteam-section">
		<div class="">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1">
				<div class="our-team">
					<div class="col-md-12" style="color: white">
						<div class="row">
							<div class="col-md-3 py-1">
								<img src="{{ asset('public/upload/school_logo/'.@$school_info->school_logo) }}" alt="school-logo" style="height: 100px; width:100px">
							</div>
							<div class="col-md-9 py-1">
								<div class="text-center" style="color: black">
									<h5><b>{{ @$school_info->school_name }}</b></h5>                       
									<p>Website : {{ @$school_info->website }}</p>
								</div>
							</div>
						</div>
						<hr style="margin-top: 0px">
					</div>

					<div class="picture">
					<img class="img-fluid" src="{{ $student->image_show }}" alt="{{ $student->name }}"/>
					</div>
					<div class="team-content">
					<h5 class="mt-3" style="text-transform: uppercase;"><b>{{ $student->student_name }}</b></h5>
						@if (auth()->user()->type == 2 || auth()->user()->type == 8)
						<p class="" style="color: var(--text_color); margin-bottom:0px">
							Designation: {{ auth()->user()->user_designation->name }}, 
							@if (auth()->user()->teacher_type == 'permanent')
								Permanent 
							@elseif (auth()->user()->teacher_type == 'guest') 
								Guest 
							@endif
						</p>
						@elseif (auth()->user()->type == 1)
						<h6><b>Designation: STUDENT</b></h6>
						
							@if ($student)
							<div class="mt-3">
								<h6><b>Student ID : {{ @$student->student_id_number }}</b></h6>
								<h6><b>Session : {{ @$student->session->start_year }}-{{ @$student->session->end_year }}</b></h6>
								<h6><b>Date of Birth : {{ @$student->dob }}</b></h6>
								<h6><b>Blood Group : 
									@if (@$student->blood_group == 'o+')
									O Positive (O+)
									@elseif (@$student->blood_group == 'o-')
									O Negative (O-)
									@elseif (@$student->blood_group == 'a+')
									A Positive (A+)
									@elseif (@$student->blood_group == 'a-')
									A Negative (A-)
									@elseif (@$student->blood_group == 'b+')
									B Positive (B+)
									@elseif (@$student->blood_group == 'b-')
									B Negative (B-)
									@elseif (@$student->blood_group == 'ab+')
									AB Positive (AB+)
									@elseif (@$student->blood_group == 'ab-')
									AB Negative (AB-)
									@endif
								</b></h6>
							</div>
							@endif
						@endif
					</div>
				</div>
				</div>
			</div>
			</div>
		</section>
	</div>

	<div class="col-md-5">
		<section class="ourteam-section">
			<div class="">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1">
					<div class="our-team">
					<div class="col-md-12">
						<br>
						<h4>{{ $school_info->school_name }}</h4>
						<h6><b> EIIN No.</b> {{@$school_info->eiin_number}}</h6>
						<h6><b> Phone:</b> {{ @$school_info->phone1 }}</h6>
						<h6><b> Phone:</b> {{ @$school_info->phone2 }}</h6>
						<h6><b> Email:</b> {{ @$school_info->email }}</h6>
						<h6><b> Website:</b> {{ @$school_info->website }}</h6>
						<h6><b> Address:</b> {{ @$school_info->address }}</h6>
					</div>
					<br>
					<br>
					<br>



					<div class="col-md-12">
						<img src="{{ asset('public/upload/school_logo/principal_signature/'.@$school_info->principal_signature) }}" alt="school-logo" style="height: 100px; width:100px">
						<p>__________________________<br>Principal Signature</p>
						<p></p>
					</div>
					</div>
				</div>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="row mt-3">
	<div class="col-sm-12 mg-t-10 mg-sm-t-0 text-center">
		<!-- Add ID attribute to the button -->
		<button id="printButton" class="btn btn-info">Print ID Card</button>
	</div>
</div>

</div>



<script>
    // JavaScript function to trigger printing
    function printIDCard() {
        window.print();
    }

    // Add event listener to the button
    document.getElementById('printButton').addEventListener('click', printIDCard);
</script>











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
