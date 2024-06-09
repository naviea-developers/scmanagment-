    <!--Start Navbar -->
                <!-- <nav class="navbar navbar-expand-lg navbar-light navbar-shadow header-sticky navbar-dark-cerulean" id="navbarSticky"> -->
    @php
        $header_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
        $name = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
    @endphp
    <nav style="z-index:11" class="position-fixed end-0 start-0 top-0  navbar navbar-expand-lg navbar-light navbar-shadow header-sticky navbar-dark-cerulean" id="navbarSticky">
        <div>
            <a href="#menu" class="navbar-toggler me-2">
                <span class="navbar-toggler-icon"></span>
            </a>
            <a class="navbar-brand ms-0 ms-md-2" href="{{ route('home') }}">
                <img src="{{ @$header_logo->header_image == '' ? @$header_logo->no_image : @$header_logo->header_image_show }}" class="img-fluid" alt="Logo-{{  @$name->company_name }}">
            </a>                   
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--mobile nav and category nav-->
            {{-- <div class="main-nav-wrap me-auto me-xl-0 mobileMenu" id="menu">
                <ul class="mobile-main-nav">
                    <li>
                        <a href="{{ route('frontend.all.course.show') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="103.609px" viewBox="0 0 122.879 103.609" enable-background="new 0 0 122.879 103.609" xml:space="preserve">
                                <g>
                                    <path fill="#ffffff" fill-rule="evenodd" clip-rule="evenodd" d="M10.368,0h102.144c5.703,0,10.367,4.665,10.367,10.367v0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,20.735,0,16.07,0,10.368v0C0,4.665,4.666,0,10.368,0L10.368,0z M10.368,82.875 h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0c0,5.702-4.664,10.367-10.367,10.367H10.368C4.666,103.609,0,98.944,0,93.242l0,0 C0,87.54,4.666,82.875,10.368,82.875L10.368,82.875z M10.368,41.438h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,62.173,0,57.507,0,51.805l0,0C0,46.103,4.666,41.438,10.368,41.438 L10.368,41.438z"></path>
                                </g>
                            </svg>
                            <span class="text-uppercase"> &nbsp; COURSES <i class="fa-chevron-down fas fs-14 ms-2 text-white"> </i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('frontend.all.course.show') }}" class="text-dark-cerulean Selected p-1">
                                    <div class="icon"><i class=""></i></div>
                                    <div id="all_courses">All Courses</div>
                                </a>

                            </li>
                            @php
                                $categories=\App\Models\Category::where('parent_id', '=' ,0)->where('type','home')->where('status',1)->get();
                            @endphp
                            @foreach ($categories as $k=>$category)
                            @if ($category->sub->count()>0)
                                <li>
                                    <a href='{{ route('courses.category',$category->id) }}' class="Selected">
                                                    <div>{{ $category->name }}</div>
                                                    <div class="has-sub-category"><i class="fas fa-angle-right"></i></div>
                                    </a>

                                    <ul>
                                        @foreach ($category->sub as $sub_category)
                                        <li>
                                            <a href={{ route('courses.subcategory',$sub_category->id) }}> {{ $sub_category->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div> --}}

            <div class="main-nav-wrap me-auto me-xl-0 mobileMenu" id="menu">
                <ul class="mobile-main-nav">
                    <li>
                        <a href="{{ route('frontend.all.course.show') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="103.609px" viewBox="0 0 122.879 103.609" enable-background="new 0 0 122.879 103.609" xml:space="preserve">
                                <g>
                                    <path fill="#ffffff" fill-rule="evenodd" clip-rule="evenodd" d="M10.368,0h102.144c5.703,0,10.367,4.665,10.367,10.367v0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,20.735,0,16.07,0,10.368v0C0,4.665,4.666,0,10.368,0L10.368,0z M10.368,82.875 h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0c0,5.702-4.664,10.367-10.367,10.367H10.368C4.666,103.609,0,98.944,0,93.242l0,0 C0,87.54,4.666,82.875,10.368,82.875L10.368,82.875z M10.368,41.438h102.144c5.703,0,10.367,4.665,10.367,10.367l0,0 c0,5.702-4.664,10.368-10.367,10.368H10.368C4.666,62.173,0,57.507,0,51.805l0,0C0,46.103,4.666,41.438,10.368,41.438 L10.368,41.438z"></path>
                                </g>
                            </svg>
                            <span class="text-uppercase"> &nbsp; CLASS List<i class="fa-chevron-down fas fs-14 ms-2 text-white"> </i></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('frontend.all.class.class_list_show') }}" class="text-dark-cerulean Selected p-1">
                                    <div class="icon"><i class=""></i></div>
                                    <div id="all_courses">All Class</div>
                                </a>

                            </li>
                            @php
                                // $categories=\App\Models\Category::where('parent_id', '=' ,0)->where('type','home')->where('status',1)->get();
                                $classes=\App\Models\Classe::orderBY('id','asc')->where('status',1)->get();
                            @endphp
                            @foreach ($classes as $k=>$class)
                            @if ($class->count()>0)
                                <li>
                                    <a href='{{ route('frontend.class_details',@$class->id) }}' class="Selected">
                                        <div>{{ $class->name }}</div>
                                    </a>
                                </li>
                                @endif
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
            <!--Navbar search boxdd-->

            <form action="{{ route('home.head_search') }}">
                <div class="input-group  ms-3 me-auto d-none d-xl-flex">
                        <input type="search" class="form-control "
                        placeholder="What do you want to learn?"
                        name="search" id="search_input">

                        <button class="btn btn-header-search" type="submit">
                            <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg"
                                width="22.734" height="22.734" viewBox="0 0 22.734 22.734">
                                <g id="Group_16" data-name="Group 16" transform="translate(3.418 4.928)">
                                    <g id="Group_15" data-name="Group 15">
                                        <path id="Path_5" data-name="Path 5"
                                            d="M79.837,111.222a.84.84,0,0,0-1.188,0,5.74,5.74,0,0,0-1.642,4.653.84.84,0,0,0,.835.756c.028,0,.056,0,.084,0a.84.84,0,0,0,.752-.919,4.067,4.067,0,0,1,1.158-3.3A.839.839,0,0,0,79.837,111.222Z"
                                            transform="translate(-76.978 -110.975)" fill="#808080" />
                                    </g>
                                </g>
                                <g id="Group_18" data-name="Group 18">
                                    <g id="Group_17" data-name="Group 17">
                                        <path id="Path_6" data-name="Path 6"
                                            d="M9.6,0a9.6,9.6,0,1,0,9.6,9.6A9.614,9.614,0,0,0,9.6,0Zm0,17.526A7.923,7.923,0,1,1,17.526,9.6,7.932,7.932,0,0,1,9.6,17.526Z"
                                            fill="#808080" />
                                    </g>
                                </g>
                                <g id="Group_20" data-name="Group 20" transform="translate(14.951 14.951)">
                                    <g id="Group_19" data-name="Group 19">
                                        <path id="Path_7" data-name="Path 7"
                                            d="M344.246,343.059l-6.1-6.1a.84.84,0,1,0-1.188,1.188l6.1,6.1a.84.84,0,0,0,1.188-1.188Z"
                                            transform="translate(-336.708 -336.71)" fill="#808080" />
                                    </g>
                                </g>
                            </svg>
                    </button>
                </div>
            </form>
        </div>

        <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item m-1">
                <form action="#">
                    <input type="hidden" id="set_language" value="en">
                        <a id="google_translate_element" href="javascript:void(0)" class=" btn fw-bold me-2 text-uppercase text-black p-0 d-flex align-items-center">
                        </a>
                    </form>
            </li>

            <li class="currency-menu">
                <a class="currency-dropdown-active" href="#">
                    {{ getApplicationCurrency()->currency_name }}  <i class="fi-rs-angle-small-down"></i></a>
                <ul class="currency-dropdown">
                    @php
                        $currrencies = \App\Models\Currency::get();
                    @endphp
                    @foreach ($currrencies as $currency)
                    <li><a style="color: var(--button2_text_color)" href="{{ route('frontend.change_currency',$currency->currency_name) }}">{{ $currency->currency_name }}</a></li>
                    @endforeach
                </ul>
            </li>

            <div class="card_add"></div>
            @if(session('cart'))
            @php $total=0;  $i=0;@endphp
            @foreach(session('cart') as $id => $details)
            @php
            $total =$total+ $details['fee']

            @endphp
            @endforeach
            @endif

            <li class="nav-item me-2 dropdown dmenu dropdown-cart" id="cardbody">
                @if(session()->has('cart'))
                <a class="nav-link dropdown-toggle" href="#" id="cart" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="shopping-cart" class="navbar-icon"></i>
                    <span class="badge">{{ count(session()->get('cart')) }} </span>
                </a>
                @endif
                <div class="dropdown-menu  dropdown-menu-right sm-menu animate slideIn"
                    aria-labelledby="cart">
                    <div class="notifications-scroll">
                        <div
                            class="shopping-cart-header d-flex align-items-center justify-content-between">
                            <div class="position-relative">
                                <i data-feather="shopping-cart"></i>
                                <span class=""></span>
                            </div>


                            <div class="shopping-cart-total">
                                <span class="text-muted">Total: </span>
                                <span class="main-color-text"> {{ format_price(@$total) }}</span>
                            </div>
                        </div>
                        @if(session('cart')!=null)
                        @if(session('cart'))

                        @php $total=0; @endphp
                        @foreach(session('cart') as $id => $details)
                        @php
                        $total =$total+ $details['fee']
                        @endphp
                        @endforeach

                        @foreach(session('cart') as $id => $details)
                        <div class="media dropdown-course-grid" id="">
                            <!-- <a href="https://lead.academy/course-details/CO27SASTO98"> -->
                            <img src="{{ @$details['image'] }}"
                                width="30%" class="me-3" alt="...">
                            <!-- </a> -->
                            <div class="media-body">
                                @if (@$details['order_type']=='course')
                                <a href="{{ route('frontend.course.details',$id) }}">
                                @elseif (@$details['order_type']=='ebook')
                                <a href="{{ route('frontend.ebook_details',$id) }}">
                                @endif
                                {{-- <a href="{{ route('frontend.course.details',$id) }}"> --}}
                                    <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1 text-dark"> {{ $details['name'] }} Comprehensive GRE Prep (Quant &amp; Verbal)</h5>
                                </a>
                                <div class="course-pricing d-flex align-items-center font-weight-bold">

                                <div class="price-original fs-12 text-dark m-sm-1"> {{ format_price(@$details['fee']) }} </div>
                                <div class="price-discount text-danger  fs-12"> <del>{{ format_price(@$details['preprice']) }}</del></div>

                                {{-- <div class="price-original fs-12 text-dark m-sm-1">BDT {{ @$details['discount'] }} </div>
                                <div class="price-discount text-danger  fs-12"> <del>{{ @$details['fee'] }}</del></div> --}}

                                </div>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt cartremove" CarId="{{ $id }}"></i>
                                </button>
                                <div class="btn  btn-sm"></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @else
                        <p class="emptycart_msg emptycart_msg w-75 text-center mx-auto mt-3">
                        <tr><td colspan="4"><p class="emptycart_msg">Your cart is empty</p></td></tr>
                        </p>
                        @endif
                    </div>
                    <div class="dropdown-footer d-block text-center font-weight-600 bg-gray border-top">
                        <a href="{{ route('cart') }}" class="btn btn-dark-cerulean d-block">Go to cart</a>
                    </div>
                </div>
            </li>
            @php
            $notifications=\App\Models\Notification::where('user_id',auth()->user()?->id)->orderBy('id', 'DESC')->take(6)->get();
            @endphp
            <!-- student notification  -->
            <li class="nav-item dropdown dmenu dropdown-bell notificationLi" id="notification_load">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="navbar-icon"></i>
                </a>
                <div class="dropdown-menu  dropdown-menu-right sm-menu animate slideIn">

                    <div class="notifications-scroll" id="notifications">
                        <div
                            class="shopping-cart-header d-flex align-items-center justify-content-between">
                            <div class="position-relative">
                                <i class="far fa-bell me-1"></i>
                                <span class=""></span>
                            </div>

                            <div class="shopping-cart-total">
                                <span class="text-muted">Total Notification:</span>
                                <span class="main-color-text">@if(Auth::check()) {{ @$notifications->count() }} @endif</span>
                            </div>
                        </div>
                    @foreach ($notifications as $notification)

                        @if($notification->type == "course")
                            <a href="{{ route('frontend.course.details',@$notification->cart->course->id) }}" class="media dropdown-course-grid">
                            <input type="hidden" id="typ" value="1">
                            <img src="{{ @$notification?->cart?->course?->teacher?->image_show }}"
                                style="width: 60px;" class="me-3" alt="...">
                            <div class="media-body">
                                <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1"> {{ @$notification->text }}</h5>
                                <div class="course-des fs-12 mb-0"><p> <strong> {{ @$notification->cart->course->name}}</strong></p></div>
                            </div>
                        </a>
                        @elseif ($notification->type == "university")
                            @foreach (@$notification->application->carts  as $cart)                                          
                                <a href="{{ route('frontend.application-details', @$notification->application->id) }}" class="media dropdown-course-grid">
                                <input type="hidden" id="typ" value="1">
                                <img src="{{ @$cart->course->university->image_show }}"
                                    style="width: 60px;" class="me-3" alt="...">
                                <div class="media-body">
                                    <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1"> {{ @$notification->text }}</h5>
                                    <div class="course-des fs-12 mb-0"><p> <strong> {{ @$cart->course->name }}</strong></p></div>
                                </div>
                                </a>
                            @endforeach
                        @elseif ($notification->type == "event")
                            <a href="{{ route('frontend.event.details',$notification->event_cart->event->id) }}" class="media dropdown-course-grid">
                            <input type="hidden" id="typ" value="1">
                            <img src="{{ @$notification->event_cart->event->host->image_show }}"
                                style="width: 60px;" class="me-3" alt="...">
                            <div class="media-body">
                                <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1"> {{ @$notification->text }}</h5>
                                <div class="course-des fs-12 mb-0"><p><strong>{{ @$notification->event_cart->event->name}}</strong></p></div>
                            </div>
                            </a>
                        @elseif ($notification->type == "package")
                            <a href="{{ route('frontend.subscribe_details') }}" class="media dropdown-course-grid">
                            <input type="hidden" id="typ" value="1">
                            <img src="{{ @$notification->image_show }}"
                                style="width: 60px;" class="me-3" alt="...">
                            <div class="media-body">
                                <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1"> {{ @$notification->text }}</h5>
                                <div class="course-des fs-12 mb-0"><p><strong>{{ @$notification->cart->package->name}}</strong></p></div>
                            </div>
                            </a>
                        @elseif ($notification->type == "ebook")
                            <a href="{{ route('frontend.ebook_details',@$notification->cart->ebook->id) }}" class="media dropdown-course-grid">
                            <input type="hidden" id="typ" value="1">
                            <img src="{{ @$notification?->cart?->ebook?->user?->image_show }}"
                                style="width: 60px;" class="me-3" alt="...">
                            <div class="media-body">
                                <h5 class="course-title overflow-hidden font-weight-bold fs-14 mb-1"> {{ @$notification->text }}</h5>
                                <div class="course-des fs-12 mb-0"><p><strong>{{ @$notification->cart->ebook->title}}</strong></p></div>
                            </div>
                            </a>
                        @endif
                    @endforeach

                    </div>
                    <div class="dropdown-footer d-block text-center font-weight-600 bg-gray border-top">
                        <a href="{{ route('user.notification') }}" class="btn btn-dark-cerulean d-block">See all</a>
                    </div>
                </div>
            </li>
            <!-- student notification end -->

            {{-- <li class="nav-item m-1 signin-li">
                <a href="{{ route('frontend.alumni_reg') }}" class="btn me-2 text-uppercase fw-bold py-1 px-2 d-flex align-items-center" style="background-color: red ; color:var(--button2_text_color)">
                    Alumni
                </a>
            </li> --}}
            <li class="nav-item m-1 signin-li">
                <a href="{{ route('frontend.student_admission') }}" class="btn me-2 text-uppercase fw-bold py-1 px-2 d-flex align-items-center" style="background-color: red ; color:var(--button2_text_color)">
                    Admission
                </a>
            </li>


           



            @if (Auth::check())
            @php
            $student = App\Models\Admission::where('user_id', auth()->user()->id)->first();
            @endphp

            <li class="nav-item dropdown dmenu dropdown-user">
                <a class="nav-link dropdown-toggle" href="#" id="user" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{-- <img class="user-avatar"
                        src="{{ auth()->user()->image_show }}" alt=""> --}}


                        @if (auth()->user()->type == 1)
                            <img style="height:40px;width:40px;border-radius: 50%;border: 1px solid #000;"
                                src="{{   $student->image_show }}"
                                alt="image" />
                        @else
                            <img style="height:40px;width:40px;border-radius: 50%;border: 1px solid #000;"
                                src="{{  auth()->user()->image_show }}"
                                alt="image" />
                        @endif

                </a>
                <div class="dropdown-menu  dropdown-menu-right sm-menu animate slideIn"
                    aria-labelledby="user" style="background-color:#333;color:#fff;">
                    <div class="user-holder">
                        <div class="user-header">
                            <div class="align-items-center d-flex mb-3">


                                @if (auth()->user()->type == 1)
                                    <img src="{{ $student->image_show }}"
                                    alt="" class="img-user rounded-circle mb-0">
                                @else
                                    <img src="{{ auth()->user()->image_show }}"
                                    alt="" class="img-user rounded-circle mb-0">
                                @endif


                                <div class="p_info ms-3">
                                    <h6 class="mb-2 text-white">{{ auth()->user()->name }}                                                  </h6>
                                    <p class="mb-0">
                                        @if (auth()->user()->type=='0')
                                        Admin
                                    @elseif (auth()->user()->type=='1')
                                        Student
                                    @elseif (auth()->user()->type=='2')
                                        Teacher
                                    @elseif (auth()->user()->type=='3')
                                        Speakers
                                    @elseif (auth()->user()->type=='4')
                                        Host
                                    @elseif (auth()->user()->type=='5')
                                        Seller
                                    @elseif (auth()->user()->type=='6')
                                        Affiliate 
                                    @elseif (auth()->user()->type=='7')
                                        Consultant
                                    @elseif (auth()->user()->type=='8')
                                        Staff
                                    @elseif (auth()->user()->type=='9')
                                        Alumni
                                    @endif
                                        {{-- Student Account --}}
                                    </p>
                                </div>
                            </div><!-- img-user -->
                        </div><!-- user-header -->
                        <a href="{{ route('user.dashboard', auth()->user()->id) }}"
                            class="dropdown-item"><i class="fas fa-building"></i> Dashboard</a>
                        <a href="{{ route('user.profile', auth()->user()->id) }}"
                            class="dropdown-item"><i class="far fa-user"></i>Profile</a>
                        <a href="{{ route('user.notification', auth()->user()->id) }}"
                            class="dropdown-item"><i class="fas fa-clipboard-list"></i>Notifications</a>
                        <a href="{{ route('user.logout') }}"
                            class="dropdown-item"><i class="typcn typcn-key-outline"></i> Sign Out</a>
                        <!-- // #8a8a8a -->
                    </div>
                </div>
            </li>
            @else
                <li class="nav-item m-1 signin-li">
                    <a class="btn me-2 text-uppercase fw-bold py-1 px-2 d-flex align-items-center" style="background-color: var(--button2_color)!important ; color:var(--button2_text_color)" href="{{ route('frontend.signin') }}">
                        SIGN IN
                    </a>
                </li>

                <li class="nav-item ml-md-3 signup-li">
                    <a href="{{ route('frontend.alumni_register') }}" class="btn-join btn-join-alabin btn fw-bold text-dark-cerulean text-uppercase d-flex align-items-center" style="background-color:var(--button2_color)!important ; color:var(--button2_text_color)">
                        ALUMNI SIGN UP
                    </a>
                </li>
            @endif

        </ul>
    </nav>


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="script.js"></script>

<script>

$("#setlanguage").change(function(e){
  e.preventDefault();
  let id = $(this).val();
console.log(id);

});




// $(document).ready(function() {

// $('.setlanguage').on('click',function(){
// var id=$(this).val();
// console.log(id);

// });

// });


$(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#car_id").val($(this).attr('CarId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
});



$('.cartremove').on('click',function(){
    var id=$(this).attr('CarId');
    Swal.fire({
        title: "Do you Want to delete ?",
        icon: "error",
        showCancelButton: true,
        confirmButtonText: "Yes !",
        cancelButtonText: "No !",
        reverseButtons: true
        }).then((result) => {
    if (result.isConfirmed) {
        window.location ="{{ url('/remove-from-cart') }}/"+id
    }
    });
});

</script>
@endsection

