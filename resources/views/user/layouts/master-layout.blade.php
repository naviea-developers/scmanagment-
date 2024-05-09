<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ------ bootstrap css link-------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('user.layouts.parts.header-link')
    @php
    // $site_setting = \App\Models\SiteSetting::first();
    $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
    @endphp
    <title> {{ $title->company_name }}  @yield('title')</title>

    @php
    $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
   $dataObj = json_decode($results->option_value);
  @endphp

  @if($dataObj)
  <style>
      :root {
        --seller_background_color: {{ $dataObj->seller_background_color }};
        --seller_frontend_color: {{ $dataObj->seller_frontend_color }};
        --seller_text_color: {{ $dataObj->seller_text_color }};

        --button2_color: {{ $dataObj->button2_color }};
        --button2_hover_color: {{ $dataObj->button2_hover_color }};
        --button2_text_color: {{ $dataObj->button2_text_color }};
      }
  </style>
  @endif

    @yield('head')
    <style>



    .contentElement {
        width: 100%;
    }

    .contentElementItem {
        text-decoration: none;
        width: 100%;
        float: left;
        background: var(--button2_color);
        margin: 5px 0;
        padding: 10px;
        color: #fff;
        border-radius: 5px;
    }
    .contentElementItem:hover{
        background: var(--button2_hover_color);
         color: #fff;
    }
    .contentElementItem i {
        width: 30px;
        text-align: center;
    }
</style>

<style>
    .right_section {
        display: flex;
        justify-content: space-between;
    }
    .right_section h3{
        font-family: "Nunito", sans-serif;
        color: var(--seller_text_color)!important;
        font-size: 28px;
        line-height: 33px;
        font-weight: 700;
    }
    .right_section p{
        color: #111 !important;
        font-family: "Nunito", sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 27px;
    }
    table tr {
        border-bottom: 1px solid #ccc;
        height: 50px;
        line-height: 2.5;
    }

    .edit_btn_view button {
        background: none;
        border: none;
        margin-right: -30px;
        margin-left: 20px;
    }

    .right_section img {
        height: 80px;
        width: 80px;
        border-radius: 50%;
        margin-right: 45px;
        border: 1px solid;
    }

    .imgBox{
        position: relative;
        height: 80px;
        width: 80px;
    }

    #ppBox {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 100%;
        background: #ffffffcf;
        border-radius: 50%;
        opacity: .7;
        transition: .3s linear;
    }

    .imgBox:hover #ppBox{
        opacity: 1;
        transition: .3s linear;
    }

    #ppBox i {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 25px;
    }


    @media only screen and (max-width: 500px) {
        tr {
            display: flex;
            flex-wrap: wrap;
            height: auto !important;
            position: relative;
        }

        td:first-child {
            width: 100%;
            margin-bottom: -25px;
            font-weight: bold;
        }

        td:last-child {
            position: absolute;
            right: 0;
            bottom: 0;
        }

       .edit_btn_view {
        	width: 120px;
        	margin-top: -40px;
        }

        .cancel__btn {
            width: 40px;
        }

    .edit_view input {
        width: calc(100% - 20px);
    }

    }

    .edit_btn_view{
        float: left;margin-top: 10px;
    }

    .edit_btn_view a {
        text-decoration: none;
    	background: #b9474c;
    	width: 60px;
    	padding: 5px;
    	color: #fff !important;
    	height: 30px;
    	line-height: 1.3;
    	margin-top: 0;
    	float: left;
    	border-radius: 50px;
    	margin-right: -10px;
    }

    .edit_btn_view button {
    	background: #1a6c60;
    	width: 60px;
    	padding: 5px;
    	color: #fff !important;
    	height: 30px;
    	line-height: 1.3;
    	margin-top: 0;
    	float: left;
    	border-radius: 50px;
    	margin-right: -10px;
    }


</style>
<style>

.passwodBox {
	background: #fff;
	padding: 20px;
	border-radius: 10px;
    margin-top: 30px;
}

.passwodBox label {
    width: 40%;
    font-weight: bold;
}

.passwodBox input {
	width: calc(60% - 10px);
	border: 1px solid #1a6c60;
	padding: 5px;
}

.form-group {
	margin-bottom: 20px;
}

.passwodBox button {
	margin: 0 auto;
	display: block;
	padding: 5px 30px;
	border: none;
	background: #1a6c60;
	color: #fff;
	border-radius: 5px;
}

@media screen and (max-width: 700px){
    .col-md-9 {
        width: calc(125% - 22px);
        padding: 10px;
    }
}


@media screen and (max-width: 450px){
    .passwodBox label {
        width: 100%;
    }

    .passwodBox input {
        width: calc(100% - 10px);
        border: 1px solid #1a6c60;
        padding: 5px;
        margin-top: 10px;
    }
}
</style>
  </head>
  <body>



<div class="dataDiv">
<br>
<br>
<br>

<section class="" id="secondSection" style="margin-top: 25px;">
    <div class="container">
        <div class="row" style="width: 105%;margin: 0;">
           @include("user.layouts.parts.user_sidebar")

            <div class="col-md-9">
                @yield('main_content')
                {{-- <div class="right_section" style="width: 95%;">
                    <div>
                        <h3>Personal Details</h3>
                        <p>Update your information.</p>
                    </div>
                    <div class="imgBox">

                        <img src="{{ asset('/public/frontend/images/No-image.jpg') }}" alt="">


                        <label for="pp" id="ppBox">
                            <i class="fa-solid fa-camera"></i>
                        </label>
                    </div>
                </div>

                <form action="/updateUserData" method="post" id="userForm" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="buNbT9HntbrJImnoyLAnztjrvA73dE209XvqzytT">                    <input type="file" name="photo" id="pp" style="display: none;" onchange=" $('#userForm').submit();">
                    <table class="table mt-1">
                        <tbody>
                          <tr>
                            <td scope="row">Name</td>
                            <td>
                                <div class="normal_view"><p>niaz ahmed</p></div>

                                <div class="edit_view d-none">
                                    <input type="text" name="username" class="form-control" value="niaz ahmed">
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="normal_btn_view">
                                    <a href="" class="btn-link edit_el">Edit</a>
                                </div>

                                <div class="edit_btn_view d-none">
                                    <a href="" class="btn-link  text-danger cancel__btn">Cancel</a>
                                   <button type="submit">Save</button>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">Email Address</td>
                            <td>
                                <div class="normal_view"><p>navieapc9@gmail.com</p></div>

                                <div class="edit_view d-none">
                                    <input type="text" name="email" class="form-control" value="navieapc9@gmail.com">
                                </div>
                            </td>
                            <td>
                                <div class="normal_btn_view">
                                    <a href="" class="btn-link edit_el">Edit</a>
                                </div>

                                <div class="edit_btn_view d-none">
                                    <a href="" class="btn-link  text-danger cancel__btn">Cancel</a>
                                    <button type="submit">Save</button>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td scope="row">Phone Number</td>
                            <td>
                                <div class="normal_view"><p>01311805398</p></div>

                                <div class="edit_view d-none">
                                    <input type="text" name="phone" class="form-control" value="01311805398">
                                </div>
                            </td>
                            <td class="text-right bg_red">
                                <div class="normal_btn_view">
                                    <a href="" class="btn-link edit_el">Edit</a>
                                </div>

                                <div class="edit_btn_view d-none">
                                    <a href="" class="btn-link  text-danger cancel__btn">Cancel</a>
                                    <button type="submit">Save</button>
                                </div>
                            </td>
                          </tr>


                          <tr>
                            <td scope="row">Address</td>
                            <td>
                                <div class="normal_view"><p>chittagong</p></div>

                                <div class="edit_view d-none">
                                    <input type="text" name="address" class="form-control" value="chittagong">
                                </div>
                            </td>
                            <td>
                                <div class="normal_btn_view">
                                    <a href="" class="btn-link edit_el">Edit</a>
                                </div>

                                <div class="edit_btn_view d-none">
                                    <a href="" class="btn-link  text-danger cancel__btn">Cancel</a>
                                    <button type="submit">Save</button>
                                </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </form> --}}

            </div>
        </div>
    </div>

</section>

</div>


    @include('Frontend.layouts.master-layout');

    <!-- --------------- script link ---------------->

    @include('user.layouts.parts.scripts')
    <script>
        $('.edit_el').on('click',function(e){
            event.preventDefault();
            $(this).parent().parent().find('.normal_btn_view').addClass('d-none');
            $(this).parent().parent().find('.edit_btn_view').removeClass('d-none');
            $(this).parent().parent().parent().find('.normal_view').addClass('d-none');
            $(this).parent().parent().parent().find('.edit_view').removeClass('d-none');
        });
    </script>
    {{-- @yield('script') --}}
  </body>
</html>
