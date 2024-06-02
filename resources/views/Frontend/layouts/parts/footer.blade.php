<!--Start Footer-->
@php
    $footer_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
    $social_url = \App\Models\Tp_option::where('option_name', 'theme_social_media')->first();
    $dataObj = json_decode($social_url->option_value);
    $footer_contents = \App\Models\Tp_option::where('option_name', 'theme_option_footer')->first();
    $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
    $school_info = json_decode($results->option_value);

@endphp

<div class="main-footer bg-prussian-blue text-white fw-medium ">
    <div class="container-lg">
        
        <div class="row">

            <div class="col-6 col-sm-6 col-md-3 mt-5 mt-md-0">
                <ul class="nav-list list-unstyled mb-0">
                    <li>
                        @if (@$school_info->eiin_number > 0 )
                            <a href="" class="text-decoration-none mb-3 d-inline-block" style="color: var(--footer_text_color)">Address</a>
                            <p> EIIN No. {{@$school_info->eiin_number}} <br>
                                Mobile : {{ @$school_info->phone1 }} <br>
                                Email : {{ @$school_info->email }} <br>
                                Website : {{ @$school_info->website }} 
                            </p>
                        @endif 
                    </li>
                </ul>
            </div>

            @php
                $menus_s = \App\Models\Menu::where('type','footer_menu')->where('column_num', 1)->where('status', 1)->orderBy('position')->get();
            @endphp
            <div class="col-6 col-sm-6 col-md-3 mt-5 mt-md-0">
                <ul class="nav-list list-unstyled mb-0">
                    @foreach ($menus_s as $menu_1)
                        <li>
                            <a href="{{ url($menu_1->url) }}" class="text-decoration-none mb-3 d-inline-block" style="color: var(--footer_text_color)">{{ $menu_1->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            @php
            $menus_ss = \App\Models\Menu::where('type','footer_menu')->where('column_num', 2)->where('status', 1)->orderBy('position')->get();
            @endphp

            <div class="col-6 col-sm-6 col-md-3 mt-5 mt-md-0">
                <ul class="nav-list list-unstyled mb-0">
                    @foreach ($menus_ss as $menu_2)
                        <li>
                            <a href="{{ url($menu_2->url) }}" class="text-decoration-none mb-3 d-inline-block" style="color: var(--footer_text_color)">{{ $menu_2->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>

            @php
                $menus_sss = \App\Models\Menu::where('type','footer_menu')->where('column_num', 3)->where('status', 1)->orderBy('position')->get();
            @endphp
            <div class="col-6 col-sm-6 col-md-3">
                <ul class="nav-list list-unstyled mb-0">
                    @foreach ($menus_sss as $menu_3)
                    <li>
                        <a href="{{ url($menu_3->url) }}" class="text-decoration-none mb-3 d-inline-block" style="color: var(--footer_text_color)">{{ $menu_3->name }}</a>
                    </li>
                @endforeach
                </ul>
            </div>
    </div>
</div>

<!--End Footer-->
<!--Start Sub Footer-->
<div class="sub-footer bg-prussian-blue text-white py-0">
    <div class="container-lg">
        <div class="align-items-center d-block d-sm-flex mt-1">
            <div class="d-block minw_65 text-center text-md-start">
                <h6 class="fs-12 me-2 text-capitalize" style="color: var(--footer_text_color)">pay with</h6>
            </div>
            <div class="d-flex flex-wrap logo_ssl-middle">
                @foreach (@$footer_contents->paywiths as $paywith)
                <a href="#" class="">
                    <img src="{{ $paywith->pay_image_show }}" class="img-fluid"
                        alt="{{ $paywith->pay_name }}" style="height: 50px; width:70px; padding: 2px;">
                </a>
                @endforeach

            </div>
            <div class="d-block maxw_75 ms-md-2 mt-4 mt-sm-0 mx-auto text-center">

                <ul class="footer-social list-unstyled mb-0 d-flex align-items-center justify-content-center mt-1 mt-sm-0">
                    {{-- <li class="me-3 d-none d-md-block" style="color: var(--footer_text_color)">Follow Us On : </li> --}}
                    <li class="mx-1">
                        <a href="{{ @$dataObj->facebook }}">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><linearGradient id="Ld6sqrtcxMyckEl6xeDdMa" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"/><stop offset="1" stop-color="#007ad9"/></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"/><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"/></svg>
                        </a>
                    </li>
                    <li class="mx-1">
                        <a href="{{@$dataObj->twitter}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><linearGradient id="MJy9k6AlNL0BTsRkEkukAa" x1="8.455" x2="40.88" y1="7.883" y2="41.5" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"/><stop offset="1" stop-color="#007ad9"/></linearGradient><path fill="url(#MJy9k6AlNL0BTsRkEkukAa)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"/><path d="M20,35c-3.24,0-6.351-0.794-8.535-2.178l-0.337-0.213l0.592-1.671l0.396,0.046	c0.149,0.018,0.266,0.021,0.385,0.021L12.995,31c0.997,0,2.452-0.16,3.846-0.577c-1.396-0.476-3.166-1.401-3.72-3.115L12.697,26	h1.027C12.625,24.997,12,23.602,12,22.057v-1.62l0.609,0.281c-0.395-0.765-0.604-1.537-0.604-2.262c0-1.049,0.278-2.075,0.806-2.966	l0.729-1.228l0.906,1.102c1.997,2.431,5.244,5.096,8.554,5.563V20c0-3.364,2.468-6,5.617-6c1.545,0,2.883,0.442,3.888,1.281	c1.039-0.261,2.308-0.743,2.989-1.144l2.264-1.332l-0.807,2.5c-0.038,0.12-0.086,0.24-0.144,0.362l1.939-0.859l-2.158,3.233	c-0.449,0.683-0.875,1.332-1.595,1.939C34.998,20.239,35,20.511,35,20.63C35,27.596,29.743,35,20,35z" opacity=".05"/><path d="M20,34.5c-3.147,0-6.161-0.766-8.268-2.101l0.325-0.919c0.172,0.02,0.306,0.025,0.442,0.025L13,31.5	c1.613,0,3.799-0.369,5.475-1.163c-2.026-0.377-4.306-1.415-4.878-3.184L13.385,26.5h0.688c0.476,0,0.855-0.025,1.165-0.065	c-1.703-0.855-2.737-2.454-2.737-4.378v-0.838l0.737,0.341c0.215,0.116,0.501,0.249,0.813,0.378c-0.88-1.01-1.545-2.255-1.545-3.481	c0-0.959,0.255-1.897,0.736-2.711l0.364-0.614l0.453,0.551c2.209,2.689,5.804,5.554,9.44,5.8V20c0-3.084,2.248-5.5,5.117-5.5	c1.529,0,2.819,0.458,3.751,1.328c1.124-0.252,2.585-0.792,3.379-1.259l1.132-0.666l-0.403,1.25	c-0.191,0.594-0.654,1.192-1.197,1.726c0.174-0.068,0.348-0.14,0.52-0.216l1.577-0.699l-1.202,1.801	c-0.483,0.736-0.906,1.38-1.683,1.981c0.006,0.303,0.01,0.727,0.01,0.883C34.5,27.354,29.418,34.5,20,34.5z" opacity=".07"/><path fill="#fff" d="M36,15c-0.951,0.559-2.671,1.156-3.793,1.372C31.311,15.422,30.033,15,28.617,15	C25.897,15,24,17.305,24,20v2c-4,0-7.9-3.047-10.327-6c-0.427,0.721-0.667,1.565-0.667,2.457c0,1.819,1.671,3.665,2.994,4.543	c-0.807-0.025-2.335-0.641-3-1v0.057c0,2.367,1.661,3.974,3.912,4.422C16.501,26.592,16,27,14.072,27	c0.626,1.935,3.773,2.958,5.928,3c-1.686,1.307-4.692,2-7,2c-0.399,0-0.615,0.022-1-0.023C14.178,33.357,17.22,34,20,34	c9.057,0,14-6.918,14-13.37c0-0.212-0.007-0.922-0.018-1.13c0.968-0.682,1.36-1.396,2.018-2.38c-0.882,0.391-1.999,0.758-3,0.88	C34.018,17.396,35.633,16.138,36,15z"/></svg>
                        </a>
                    </li>
                    <li class="mx-1">
                        <a href="{{@$dataObj->instagram}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"/><stop offset=".328" stop-color="#ff543f"/><stop offset=".348" stop-color="#fc5245"/><stop offset=".504" stop-color="#e64771"/><stop offset=".643" stop-color="#d53e91"/><stop offset=".761" stop-color="#cc39a4"/><stop offset=".841" stop-color="#c837ab"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"/><stop offset=".999" stop-color="#4168c9" stop-opacity="0"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"/><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"/><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"/><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"/></svg>
                        </a>
                    </li>
                    <li class="mx-1">
                        <a href="{{@$dataObj->youtube}}">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><linearGradient id="PgB_UHa29h0TpFV_moJI9a" x1="9.816" x2="41.246" y1="9.871" y2="41.301" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f44f5a"/><stop offset=".443" stop-color="#ee3d4a"/><stop offset="1" stop-color="#e52030"/></linearGradient><path fill="url(#PgB_UHa29h0TpFV_moJI9a)" d="M45.012,34.56c-0.439,2.24-2.304,3.947-4.608,4.267C36.783,39.36,30.748,40,23.945,40	c-6.693,0-12.728-0.64-16.459-1.173c-2.304-0.32-4.17-2.027-4.608-4.267C2.439,32.107,2,28.48,2,24s0.439-8.107,0.878-10.56	c0.439-2.24,2.304-3.947,4.608-4.267C11.107,8.64,17.142,8,23.945,8s12.728,0.64,16.459,1.173c2.304,0.32,4.17,2.027,4.608,4.267	C45.451,15.893,46,19.52,46,24C45.89,28.48,45.451,32.107,45.012,34.56z"/><path d="M32.352,22.44l-11.436-7.624c-0.577-0.385-1.314-0.421-1.925-0.093C18.38,15.05,18,15.683,18,16.376	v15.248c0,0.693,0.38,1.327,0.991,1.654c0.278,0.149,0.581,0.222,0.884,0.222c0.364,0,0.726-0.106,1.04-0.315l11.436-7.624	c0.523-0.349,0.835-0.932,0.835-1.56C33.187,23.372,32.874,22.789,32.352,22.44z" opacity=".05"/><path d="M20.681,15.237l10.79,7.194c0.689,0.495,1.153,0.938,1.153,1.513c0,0.575-0.224,0.976-0.715,1.334	c-0.371,0.27-11.045,7.364-11.045,7.364c-0.901,0.604-2.364,0.476-2.364-1.499V16.744C18.5,14.739,20.084,14.839,20.681,15.237z" opacity=".07"/><path fill="#fff" d="M19,31.568V16.433c0-0.743,0.828-1.187,1.447-0.774l11.352,7.568c0.553,0.368,0.553,1.18,0,1.549	l-11.352,7.568C19.828,32.755,19,32.312,19,31.568z"/></svg>
                        </a>
                    </li>

                </ul>
                <!--End Footer Social Icon-->
                {{-- <h6 class="fs-12">Verified by:</h6>
                <img src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/img/32.png" class="img-fluid" alt=""> --}}
            </div>
           
        </div>
        
    </div>
    <div class=" col-md-12  text-center">
        <p class="mt-4 py-0 mb-0" style="color: var(--footer_text_color)">{{@$footer_contents->copyright}}</p>
    </div>
</div>

<!--End Sub Footer-->
