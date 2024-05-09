<header>
    <nav>
      <div class="navbar-main-parent-container-wrapper">
        <div class="desktop-view-navbar">
          <div class="nav-left-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('public/frontend') }}/ASSETS/images/logo.png" alt="" /></a>
          </div>
          <div class="nav-middle-links">
            @php
                $categories = App\Models\Category::where('parent_id', 0)->orderBy('position', 'ASC')->get();
            @endphp
            @foreach ($categories as $category)
            @if($category->sub->count() > 0)
            <div class="dropdown-wrapper">
              <div class="dropdown">
                <a href="#" class="dropdown__button">
                  {{ $category->name }}<i class="fa-solid fa-angle-down"></i>
                </a>


                <ul class="dropdown-menus">
                    @foreach ($category->sub as $subCategory)
                    @if($subCategory->sub->count() > 0)
                    <li class="subdropdown-menus">
                        <a class="dropdown-item" href="{{url($subCategory->template)}}">{{ $subCategory->name }}</a>

                            <ul class="submeunus">
                                @foreach ($subCategory->sub as $childCategory)
                                <li>
                                    <a href="">{{ $childCategory->name }}</a>
                                </li>
                                @endforeach

                            </ul>

                    </li>
                    @else
                    <li class="subdropdown-menus">
                        <a class="dropdown-item" href="">{{ $subCategory->name }}</a>
                      </li>
                      @endif
                    @endforeach

                </ul>

              </div>
            </div>
            |@else
            <a href="{{url($category->template ?? '')}}">{{ $category->name }}</a>
            @endif
            @endforeach
            {{-- <div class="dropdown-wrapper">
              <div class="dropdown">
                <a href="" class="dropdown__button">
                  My Booking<i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-menus">
                  <li class="subdropdown-menus">
                    <a class="dropdown-item" href="">Book 1</a>
                  </li>
                  <li class="subdropdown-menus">
                    <a class="dropdown-item" href="">Book 2</a>
                  </li>
                  <li class="subdropdown-menus">
                    <a class="dropdown-item" href=""> Book 3</a>
                  </li>
                  <li class="subdropdown-menus">
                    <a class="dropdown-item" href="">Book 4</a>
                  </li>
                </ul>
              </div>
            </div> --}}
            {{-- <a href="">My Booking</a> --}}
            {{-- <a href="">Package & Offers</a>
            <a href="">Blog</a><a href="">About Us</a> --}}
            {{-- <a href="">More</a> --}}
          </div>
          <div class="nav-right-side">
           


            <div class="user-profile-page-navbar-user-image" style="position: relative">
                        <a class="show-profile-dropdown" href=""> 
                          {{-- {{ route('profile', auth()->user()->id) }} --}}
                        <img
                        style="height:40px;width:40px;border-radius: 50%;border: 1px solid #000;"
                            src="{{ auth()->user()->image_show }}"
                            alt=""
                        />
                        </a>
                        <div class="dropdown-wrap">
                            <div class="dropdown-inner">
                                {{-- =========================== Vendor Start ========================= --}}
                       
                                {{-- @if (auth()->user()->type == 2)
                                <a href="" class="dropdown-item">
                                  <i class="fa-solid fa-user"></i> Personal Details
                                </a>
                                <a href="{{ route('password', auth()->user()->id) }}" class="dropdown-item">
                                  <i class="fa-solid fa-shield"></i> Security
                                </a>

                                <a href="{{ route('privacy') }}" class="dropdown-item">
                                    <i class="fa-solid fa-user-check"></i></i> Privacy &amp; Policy
                                </a>

                                <a href="{{ route('notification') }}" class="dropdown-item">
                                    <i class="fa-solid fa-bell"></i></i> Notification
                                </a> --}}


                                {{-- <a href="{{ route('vendor.upload') }}" class="dropdown-item">
                                    <i class="fa-solid fa-upload"></i> Upload Product
                                </a>

                                <a href="{{ route('vendor.my_product') }}" class="dropdown-item">
                                    <i class="fa-solid fa-compass"></i> My Products
                                </a>

                                <a href="{{ route('vendor.manage_product') }}" class="dropdown-item">
                                    <i class="fa-solid fa-boxes-stacked"></i> Manage Product
                                </a>

                                <a href="{{ route('vendor.dashboard') }}" class="dropdown-item">
                                    <i class="fa-solid fa-table-columns"></i> Dashboard
                                </a> --}}



                                {{-- <a href="/user/earning" class="dropdown-item">
                                    <i class="fa-solid fa-dollar-sign"></i> Earning
                                </a>

                                <a href="/user/report" class="dropdown-item">
                                      <i class="fa-solid fa-magnifying-glass-chart"></i>
                                      Report
                                </a> --}}

                                {{-- <a href="{{ route('user.logout') }}" class="dropdown-item">
                                    <i class="fa-solid fa-right-from-bracket"></i> Log Out
                                </a>

                              @endif --}}


                            </div>
                        </div>
                    </div>



          </div>
        </div>
      </div>
    </nav>
  </header>
