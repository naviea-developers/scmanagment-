@extends('user.layouts.master-layout')
@section('head')
@section('title','- Dashboard')
<style>

    .tigger {
        width: 100%;
        background: var(--seller_frontend_color);
        margin-top: 10px;
        padding: 10px;
        text-align: right;
        border-radius: 5px;
    }

    .tigger button {
        background: var(--button2_color);
        border: none;
        color: #fff;
        padding: 0px 10px;
        border-radius: 5px;
    }


    .daily{
        display: block;
    }

    .monthly , .yearly {
        display: none;
    }

    .item {
        height: 126px;
        width: calc(25% - 20px);
        background: var(--seller_frontend_color);
        margin: 10px;
        float: left;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }

    .item i {
        font-size: 40px;
        display: block;
        text-align: center;
        color: #fff;
    }


    .item span {
        width: 100%;
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
        color: #fff;
    }


    @media only screen and (max-width: 960px) {
        .item {
            width: calc(33% - 20px);
        }
    }

    @media only screen and (max-width: 850px) {
        .item {
            width: calc(50% - 20px);
        }
    }

    @media only screen and (max-width: 700px) {
        .item {
            width: calc(33% - 20px);
        }
        .tigger {
            text-align: center;
        }
    }

    @media only screen and (max-width: 550px) {
        .item {
            width: calc(50% - 20px);
        }
    }

    /* ----------------------------consulltant---------------------- */



    .coll_text {
        padding-top: 50px;
        font-family: 'Times New Roman', Times, serif;
    }

    #counter .logo-holder {
        width: 100%;
        display: block;
    }

    #counter .logo-holder img {
        height: 40px;
        max-width: inherit;
        width: auto;
        float: left;
        margin-right: 15px;
    }

    #counter .logo-holder h3 {
        display: inline-block;
        background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-emphasis-color: transparent;
        font-weight: 600;
        padding-top: 15px;
    }

    #counter .logo-holder .justify-content-center {
        display: inline-flex;
        margin-bottom: 5px;
        margin-top: 10px;
    }

    .logo-container ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: inline-block;
    }

    .logo-container {
        padding: 0px 50px;
    }

    .logo-container .logo-holder {
        background: #fff;
        border-radius: 10px;
        margin: 20px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        display: flex;
        height: 120px;
    }

    .logo-container .logo-holder img {
        max-height: 60px;
        max-width: 50%;
        width: auto;
        margin: auto;
    }

    .owl-dots {
        position: absolute;
        bottom: -30px;
        left: 50%;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }

    .owl-dots .owl-dot {
        background: #C4C4C4;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        float: left;
        margin-right: 10px;
    }

    .owl-dots .owl-dot.active {
        background: #494CA2;
    }

    .s_img1,
    .s_img2,
    .s_img3,
    .s_img4 {
        width: 30%;
    }

    .s_text1 {
        background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-emphasis-color: transparent;
        font-weight: 600;
    }


    /* Collabration Text */

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
        height:100%;
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
@endsection
@section('main_content')


<div class="row">
    <div class="col-md-8">
        <div class="dashboard">


            <div class="tigger card card-body shadow">
                <div class="row">
    
                    <div class="col-md-6">
                        <form>
                        <div class="d-flex mb-2">
                            <div class="px-2">
                                {{-- <input type="date" onclick="this.showPicker()" id="startDate" class="dateWise form-control" value="{{ $startDate }}" name="start_date"> --}}
                            </div>
                            <div class="">
                                {{-- <input type="date" onclick="this.showPicker()" id="endDate" class="dateWise form-control" value="{{ $endDate }}" name="end_date"> --}}
                            </div>
    
                            <button type="submit" id="search" style="display: none;"></button>
    
                        </div>
                        </form>
                    </div>
    
                    <div class="col-md-6">
                        {{-- <form> --}}
                            {{-- test --}}
                        <div class="d-flex " style="float:right;">
    
                            <div class="mx-1">
                                <form>
                                <input type="hidden" class="form-control" name="filter" value="daily">
                                <button>Daily</button>
                                </form>
                            </div>
                            {{-- <div class="" style="margin-top: -3px"> --}}
                            <div class="mx-1">
                                <form>
                                <input type="hidden" class="form-control" name="filter" value="monthly">
                                <button>Monthly</button>
                                </form>
                            </div>
                            <div class="mx-1">
                                <form>
                                <input type="hidden" class="form-control" name="filter" value="yearly">
                                <button>Yearly</button>
                                </form>
                            </div>
    
                        </div>
                        {{-- <div class="">
                            <button id="day">Daily</button>
                            <button id="month">Monthly</button>
                            <button id="year">Yearly</button>
                        </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        
            <div class="">
                @if (auth()->user()->type == 1)
                <div class="daily mt-2 text-center">
                    <div class="item">
                        <i class="fa-solid fa-layer-group"></i>
                        <span >{{ $order->count() }} <br> My Orders</span>
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-layer-group"></i>
                        <span >{{ $event->count() }} <br> My Events</span>
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-layer-group"></i>
                        <span >{{ $event->count() }} <br> My Events</span>
                    </div>
                </div>
                
        
                @elseif (auth()->user()->type == 2)
                <div class="daily mt-2 text-center">
                    <div class="item" style="height: 100%">
                        <i class="fa-solid fa-user-plus"></i>
                        <span >{{ $students->count() }} <br> Total Students</span>
                    </div>
                    <div class="item" style="height: 100%">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>{{ $course->count() }} <br> My Courses <br> </span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    
    </div>

    {{-- @if (auth()->user()->type == 1) --}}
        
    <div class="col-md-4">
       
    

        <section class="ourteam-section">
          <!-- Founder and CEO -->
          <div class="">
              {{-- <div class="our-team-title mt-3">
                  <h2 style="color: var(--text_color)">Your Consultant</h2>
              </div> --}}
              <div class="row">
                  {{-- @foreach ($founders as $founder) --}}
      
                    @php
                    $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
                    @endphp

                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                  <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">
                    <div class="picture">
                        @if (auth()->user()->type == 1)
                            <img class="img-fluid" src="{{ $student->image_show }}" alt="{{ $student->name }}"/>
                        @else
                            <img class="img-fluid" src="{{ auth()->user()->image_show }}" alt="{{ auth()->user()->name }}"/>
                        @endif

                    </div>
                    <div class="team-content">
                      <h3 class="name" style="color: var(--text_color)"><b>{{ auth()->user()->name }}</b></h3>
                        @if (auth()->user()->type == 2 || auth()->user()->type == 8)
                        <p class="" style="color: var(--text_color); margin-buttom:0px">
                            Designation: {{ auth()->user()->user_designation->name }}, 
                            @if (auth()->user()->teacher_type == 'permanent')
                                Permanent 
                            @elseif (auth()->user()->teacher_type == 'guest') 
                                Guest @endif
                        </p>

                        @elseif (auth()->user()->type == 1)
                        <p class="" style="color: var(--text_color)">Designation: Student</p>
                            @php
                                $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
                            @endphp
                            @if ($student)
                                <p class="" style="color: var(--text_color)">Student ID: {{ $student->student_id_number }}</p>
                            @endif
                        @endif
                     

                      {{-- <h6 class="" style="color: var(--text_color)"><i class="fa-solid fa-phone-volume"></i> {{ @$consultant->mobile }}</h6>
                      <h6 class="" style="color: var(--text_color)"><i class="fa-solid fa-envelope"></i> {{ @$consultant->email }}</h6> --}}
                      <p class="" style="color: var(--text_color); "> {!! auth()->user()->description !!}</p>
                    </div>
                    @if (auth()->user()->type == 2 || auth()->user()->type == 8)
                    <ul class="social">
                      <li><a href="{{ auth()->user()->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                      <li><a href="{{ auth()->user()->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                      <li><a href="{{ auth()->user()->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                      <li><a href="{{ auth()->user()->instagram_id }}" target="_blank" class="fab fa-instagram" aria-hidden="true"></a></li>
                    </ul>
                    @endif
                  </div>
                </div>
                {{-- @endforeach --}}
                
              </div>
            </div>
      </section>
      
      
    
    </div>

    {{-- @endif --}}

</div>

<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js"></script>


@endsection
@section('script')
 <script>
        $('#day').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#month').css('font-weight' , 'normal');
            $('#year').css('font-weight' , 'normal');


            $('.daily').css('display' , 'block');
            $('.monthly').css('display' , 'none');
            $('.yearly').css('display' , 'none');
        });
        $('#month').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#day').css('font-weight' , 'normal');
            $('#year').css('font-weight' , 'normal');

            $('.daily').css('display' , 'none');
            $('.monthly').css('display' , 'block');
            $('.yearly').css('display' , 'none');
        });
        $('#year').on('click' ,  function(){

            $(this).css('font-weight' , 'bold');
            $('#day').css('font-weight' , 'normal');
            $('#month').css('font-weight' , 'normal');


            $('.daily').css('display' , 'none');
            $('.monthly').css('display' , 'none');
            $('.yearly').css('display' , 'block');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dateWise').on('change', function() {
                console.log(this);
                if ($('#startDate').val() !== '' && $('#endDate').val() !== '') {
                    console.log(this);
                    $('#search').click();
                }
            });
        });
    </script>
@endsection
