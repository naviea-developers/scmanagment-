<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="/"><span>[</span> @include('inc.sitename') <span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="/deshboard" class="br-menu-link active">
                <i class="fa-duotone fa-chalkboard"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        {{-- Home Section Sidebar --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub
          @if (Request::segment(1) == 'viewCategory' or
                Request::segment(1) == 'addCategory' or
                Request::segment(1) == 'viewSubCategory' or
                Request::segment(1) == 'addSubCategory' or
                Request::segment(1) == 'viewBrand' or
                Request::segment(1) == 'addBrand' or
                Request::segment(1) == 'viewBanner' or
                Request::segment(1) == 'addBanner' or
                Request::segment(1) == 'allBlog' or
                Request::segment(1) == 'addBlog' or
                Request::segment(1) == 'viewCart' or
                Request::segment(1) == 'totalCoupon' or
           Request::segment(1) == 'addCoupon') show-sub @endif">

                <i class="fa-duotone fa-house"></i>
                <span class="menu-item-label">Home</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="display:@if (Request::segment(1) == 'viewCategory' or
            Request::segment(1) == 'addCategory' or
            Request::segment(1) == 'viewSubCategory' or
            Request::segment(1) == 'addSubCategory' or
            Request::segment(1) == 'viewBrand' or
            Request::segment(1) == 'addBrand' or
            Request::segment(1) == 'viewBanner' or
            Request::segment(1) == 'addBanner' or
            Request::segment(1) == 'allBlog' or
            Request::segment(1) == 'addBlog' or
            Request::segment(1) == 'viewCart' or
            Request::segment(1) == 'totalCoupon' or
       Request::segment(1) == 'addCoupon') block @endif">

                @if (Session::get('userRole') == 'admin')
                {{-- Category sidebar --}}
                <li class="sub-item"><a href="{{ route('viewCategory') }}"
                    class="sub-link @if (Request::segment(1) == 'viewCategory' or Request::segment(1) == 'addCategory') active_sidebar @endif">Category</a></li>
                    </li>
                    {{-- subcategory sidebar --}}
                    <li class="sub-item"><a href="{{ route('viewSubCategory') }}"
                        class="sub-link @if (Request::segment(1) == 'viewSubCategory' or
                                Request::segment(1) == 'viewSubCategory' or
                                Request::segment(1) == 'addSubCategory') active_sidebar @endif">Sub Category</a></li>
                    </li>
                        {{-- Brand sidebar --}}
                    <li class="sub-item"><a href="{{ route('viewBrand') }}"
                        class="sub-link @if (Request::segment(1) == 'viewBrand' or Request::segment(1) == 'addBrand') active_sidebar @endif">Brand</a></li>

                        {{-- Banner Sidebar --}}
                        <li class="sub-item"><a href="{{ route('viewBanner') }}"
                            class="sub-link @if (Request::segment(1) == 'viewBanner' or Request::segment(1) == 'addBanner') active_sidebar @endif">Banner</a></li>
                        {{-- Gallery Sidebar --}}
                        <li class="sub-item"><a href="/showImages"
                            class="sub-link @if (Request::segment(1) == 'galleryIndex' or Request::segment(1) == 'showImages') active_sidebar @endif">Gallery</a></li>
                        {{-- Blog Sidebar --}}
                        <li class="sub-item"><a href="/allBlog"
                            class="sub-link @if (Request::segment(1) == 'allBlog' or Request::segment(1) == 'addBlog') active_sidebar @endif">Blog</a></li>
                        {{-- Cart Sidebar --}}
                        <li class="sub-item"><a href="/viewCart"
                            class="sub-link @if (Request::segment(1) == 'viewCart') active_sidebar @endif">Cart</a></li>
                        {{-- Coupon Sidebar --}}
                        <li class="sub-item"><a href="/totalCoupon"
                            class="sub-link @if (Request::segment(1) == 'totalCoupon' or Request::segment(1) == 'addCoupon') active_sidebar @endif">Coupon</a></li>
                @endif
            </ul>
        </li>

        {{-- Class Section Sidebar --}}
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub
          @if (Request::segment(1) == 'viewAllClass' or Request::segment(1) == 'addNewClass') show-sub @endif">

                <i class="fa-duotone fa-screen-users"></i>
                <span class="menu-item-label">Class</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'viewAllClass' or
                    Request::segment(1) == 'addNewBatch' or
                    Request::segment(1) == 'addRoutine' or
                    Request::segment(1) == 'getHomework' or
                    Request::segment(1) == 'addHomework') block @endif">

                @if (Session::get('userRole') == 'admin')
                    <li class="sub-item"><a href="/viewAllClass"
                            class="sub-link
                {{ Request::segment(1) === 'viewAllClass' ? 'active_sidebar' : null }}">
                            View All Batch</a>
                    </li>
                    <li class="sub-item"><a href="/addNewBatch"
                            class="sub-link
                {{ Request::segment(1) === 'addNewBatch' ? 'active_sidebar' : null }}">
                            Add new Batch</a>
                    </li>

                    <li class="sub-item">
                        <a href="/addRoutine"
                            class="sub-link
                {{ Request::segment(1) === 'addRoutine' ? 'active_sidebar' : null }}">
                            Add class routine
                        </a>
                    </li>
                @endif


                @if (Session::get('userRole') == 'admin')
                    <li class="sub-item"><a href="{{ route('getHomework') }}"
                            class="sub-link
                {{ Request::segment(1) === 'getHomework' ? 'active_sidebar' : null }}">Homework
                        </a>
                    </li>
                @endif


                @if (Session::get('userRole') == 'teacher')
                    <li class="sub-item"><a href="{{ route('addHomework') }}"
                            class="sub-link
                {{ Request::segment(1) === 'addHomework' ? 'active_sidebar' : null }}">Add
                            Homework
                        </a>
                    </li>
                    <li class="sub-item"><a href="{{ route('addResult') }}"
                        class="sub-link
            {{ Request::segment(1) === 'addResult' ? 'active_sidebar' : null }}">
                        Add Score</a></li>
                <li class="sub-item"><a href="{{ route('addClassTest') }}" class="sub-link">Class Test</a></li>
                @endif
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub @if (Request::segment(1) == 'viewClassWiseTeacher' or Request::segment(1) == 'addTeacherForClass') show-sub @endif">
                <i class="fa-duotone fa-person-chalkboard"></i>
                <span class="menu-item-label">Teacher</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'viewAllTeacher' or
                    Request::segment(1) == 'teacherInfo' or
                    Request::segment(1) == 'addTeacherForClass' or
                    Request::segment(1) == 'viewClassWiseTeacher') block @endif">

                @if (Session::get('userRole') == 'admin')
                    <li class="sub-item"><a href="{{ route('viewAllTeacher') }}"
                            class="sub-link
                {{ Request::segment(1) === 'viewAllTeacher' ? 'active_sidebar' : null }}{{ Request::segment(1) === 'teacherInfo' ? 'active_sidebar' : null }}">View
                            All Teachers</a></li>
                    <li class="sub-item"><a href="/viewClassWiseTeacher"
                            class="sub-link  {{ Request::segment(1) === 'viewClassWiseTeacher' ? 'active_sidebar' : null }}">Class
                            wise Teacher</a></li>
                    <li class="sub-item"><a href="{{ route('addTeacherForClass') }}"
                            class="sub-link
                {{ Request::segment(1) === 'addTeacherForClass' ? 'active_sidebar' : null }}">Add
                            Teacher For Class</a></li>

                @endif


            </ul>
        </li><!-- br-menu-item -->


        <!----------- Student Section -------------->
        @if (Session::get('userRole') == 'admin')
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub @if (Request::segment(1) == 'getTotalStudent' or
                        Request::segment(1) == 'studentInfo' or
                        Request::segment(1) == 'addNewStudent') show-sub @endif">
                    <i class="fa-duotone fa-book-open-reader"></i>
                    <span class="menu-item-label">Students</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'getTotalStudent' or
                        Request::segment(1) == 'studentInfo' or
                        Request::segment(1) == 'addNewStudent') block @endif">
                    <li class="sub-item">
                        <a href="{{ route('getTotalStudent') }}"
                            class="sub-link
                {{ Request::segment(1) === 'getTotalStudent' ? 'active_sidebar' : null }}{{ Request::segment(1) === 'studentInfo' ? 'active_sidebar' : null }}">
                            Total Student
                        </a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('viewClassWiseStudent') }}" class="sub-link">
                            Class wise Student
                        </a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('addNewStudent') }}"
                            class="sub-link
                {{ Request::segment(1) === 'addNewStudent' ? 'active_sidebar' : null }}">
                            Add New Student
                        </a>
                    </li>
                </ul>
            </li><!-- br-menu-item -->


            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub  @if (Request::segment(1) == 'totalCourse' or
                Request::segment(1) == 'addCourse') show-sub @endif ">
                    <i class="fa-duotone fa-list-check"></i>
                    <span class="menu-item-label">Courses</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'totalCourse' or
                Request::segment(1) == 'addCourse') block @endif">
                    <li class="sub-item {{ Request::segment(1) === 'totalCourse' ? 'active_sidebar' : null }}{{ Request::segment(1) === 'studentInfo' ? 'active_sidebar' : null }}">
                        <a href="{{ route('totalCourse') }}" class="sub-link">
                            Total Course</a>
                    </li>
                    <li class="sub-item {{ Request::segment(1) === 'addCourse' ? 'active_sidebar' : null }}{{ Request::segment(1) === 'studentInfo' ? 'active_sidebar' : null }}">
                        <a href="{{ route('addCourse') }}" class="sub-link">
                            Add New Course
                        </a>
                    </li>
                </ul>
            </li>
    </ul>
    </li><!-- br-menu-item -->
    <!-- Education Structure Section-->
    <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub

        @if (Request::segment(1) == 'manageClasses' or
                Request::segment(1) == 'addClass' or
                Request::segment(1) == 'manageSubject' or
                Request::segment(1) == 'allExam' or
                Request::segment(1) == 'viewResult' or
                Request::segment(1) == 'viewNotice' or
                Request::segment(1) == 'addSubject')

        show-sub @endif">
            <i class="fa-duotone fa-chalkboard-user"></i>
            <span class="menu-item-label">Education Structure</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'manageClasses' or
                Request::segment(1) == 'addClass' or
                Request::segment(1) == 'manageSubject' or
                Request::segment(1) == 'allExam' or
                Request::segment(1) == 'viewResult' or
                Request::segment(1) == 'viewNotice' or
                Request::segment(1) == 'addSubject') block @endif">
            <li class="sub-item"><a href="{{ route('manageSubject') }}"
                    class="sub-link @if (Request::segment(1) == 'manageSubject' or Request::segment(1) == 'addSubject') active_sidebar @endif">All Subject's</a></li>
            <li class="sub-item"><a href="{{ route('manageClasses') }}"
                    class="sub-link   @if (Request::segment(1) == 'manageClasses' or Request::segment(1) == 'addClass') active_sidebar @endif">All Classes</a></li>
            <li class="sub-item @if (Request::segment(1) == 'allExam') active_sidebar @endif"><a href="{{ route('allExam') }}" class="sub-link">Exam Schedule </a></li>

            <li class="sub-item @if (Request::segment(1) == 'viewResult') active_sidebar @endif"><a href="{{ route('viewResult') }}" class="sub-link">Exam Result</a></li>

            <li class="sub-item @if (Request::segment(1) == 'viewNotice') active_sidebar @endif" ><a
                    href="{{ route('viewNotice') }}  @if (Request::segment(1) == 'viewNotice') active_sidebar @endif"
                    class="sub-link">Manage Notice</a></li>

            {{-- <li class="sub-item"><a href="" class="sub-link"></a></li> --}}
        </ul>
    </li><!-- br-menu-item -->

            {{-- -------------------- report Section ---------------- --}}

    <!-- br-sideleft-menu -->
    <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub">
           <i class="menu-item-icon icon ion-ios-list-outline tx-20"></i>
           <span class="menu-item-label">Report</span>
        </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{ route('allStudentReport') }}" class="sub-link ">Student Report</a></li>

                <li class="sub-item"><a href="{{ route('teacherReport') }}" class="sub-link ">Teacher Report</a></li>

                <li class="sub-item"><a href="{{ route('classReport') }}" class="sub-link ">Class Report</a></li>

                <li class="sub-item"><a href="{{ route('cartReport') }}" class="sub-link ">Sale Report</a></li>
            </ul>
      </li>


    <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub @if (Request::segment(1) == 'addNewUser' or Request::segment(1) == 'editUser' or Request::segment(1) == 'manageUser') show-sub @endif">
            <i class="fa-duotone fa-user"></i>
            <span class="menu-item-label">User Role</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'addNewUser' or Request::segment(1) == 'manageUser' or Request::segment(1) == 'editUser') block @endif">
            <li class="sub-item">
                <a href="{{ route('addNewUser') }}"
                    class="sub-link  @if (Request::segment(1) == 'addNewUser') active_sidebar @endif">
                    Add New user</a>
            </li>
            <li class="sub-item">
                <a href="{{ route('manageUser') }}"
                    class="sub-link  @if (Request::segment(1) == 'manageUser' or Request::segment(1) == 'editUser') active_sidebar @endif">
                    Manage User
                </a>
            </li>
        </ul>
    </li><!-- br-menu-item -->

    <!------------- Settings Section ------------------->

    <li class="br-menu-item">
        <a href="#" class="br-menu-link with-sub @if (Request::segment(1) == 'addCategory' or
                Request::segment(1) == 'viewCategory' or
                Request::segment(1) == 'viewSubCategory' or
                Request::segment(1) == 'addSubCategory' or
                Request::segment(1) == 'viewBrand' or
                Request::segment(1) == 'addBrand' or
                Request::segment(1) == 'viewAbout' or
                Request::segment(1) == 'viewPolicy' or
                Request::segment(1) == 'editPolicy' or
                Request::segment(1) == 'editAbout' or
                Request::segment(1) == 'terms' or
                Request::segment(1) == 'editTerms') show-sub @endif">
            <i class="fa-duotone fa-gear"></i>
            <span class="menu-item-label">Settings</span>
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'manageClasses' or
                Request::segment(1) == 'addClass' or
                Request::segment(1) == 'viewCategory' or
                Request::segment(1) == 'addCategory' or
                Request::segment(1) == 'viewSubCategory' or
                Request::segment(1) == 'addSubCategory' or
                Request::segment(1) == 'viewBrand' or
                Request::segment(1) == 'addBrand' or
                Request::segment(1) == 'viewAbout' or
                Request::segment(1) == 'addBrand' or
                Request::segment(1) == 'viewPolicy' or
                Request::segment(1) == 'editPolicy' or
                Request::segment(1) == 'editAbout' or
                Request::segment(1) == 'terms' or
                Request::segment(1) == 'addAddress' or
                Request::segment(1) == 'address' or
                Request::segment(1) == 'editTerms') block @endif">

            <li class="sub-item"><a href="{{ route('viewAbout') }}"
                    class="sub-link @if (Request::segment(1) == 'viewAbout' or Request::segment(1) == 'editAbout') active_sidebar @endif">About</a></li>

            <li class="sub-item"><a href="{{ route('viewPolicy') }}"
                    class="sub-link @if (Request::segment(1) == 'viewPolicy' or Request::segment(1) == 'editPolicy') active_sidebar @endif">Privacy Policy</a></li>

            <li class="sub-item"><a href="{{ route('terms') }}"
                    class="sub-link @if (Request::segment(1) == 'terms' or Request::segment(1) == 'addSubject' or Request::segment(1) == 'editTerms') active_sidebar @endif">Terms of Service</a>
            </li>

            <li class="sub-item"><a href="{{ route('address') }}"
                class="sub-link @if (Request::segment(1) == 'address') active_sidebar @endif">Our Address</a>

            <li class="sub-item"><a href="{{ route('paymentAccept') }}"
                class="sub-link @if (Request::segment(1) == 'paymentAccept') active_sidebar @endif">We Accept</a>
        </li>

        </ul>
    </li><!-- br-menu-item -->
    @endif
    </ul><!-- br-sideleft-menu -->

    <label style="padding-left: 10px;font-size: 14px;padding-top: 5px;">
        <a href="/reboot" style="color: #bbbbe2;">
            <i class="fa-solid fa-rotate"></i> Clear Cache
        </a>
    </label>

    <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info tx-center">
        Developed by <a href="https://navieasoft.com/" target="_blank">Navieasoft</a></label>

</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
