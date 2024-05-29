 <div class="col-md-3">
    <div class="contentElement">
        <div class="container">

{{-- ================================== All User ================================== --}}
        <a href="{{ route('user.dashboard', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-user"></i> Dashboard
        </a>
        <a href="{{ route('user.profile', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-user"></i> Personal Details
        </a>
        <a href="{{ route('user.password', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-shield"></i>
            <span> Security </span>
        </a>
        <a href="{{ route('notice') }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-user-check"></i>
            <span>  Notice </span>
        </a>
        {{-- <a href="{{ route('privacy') }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-user-check"></i>
            <span>  Privacy & Policy </span>
        </a> --}}

        <a href="{{ route('user.notification', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
            <i class="fa-solid fa-bell"></i>
            <span> Notification </span>
        </a>


{{-- ================================== Customer/Student ================================== --}}
        @if (auth()->user()->type == 1)

           

            <a href="{{ route('student.homework', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-calendar-days"></i>
                <span> Home work </span>
            </a>

            <a href="{{ route('class_routine', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-calendar-days"></i>
                <span> Class Routine </span>
            </a>

            <a href="{{ route('exam_routine', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-calendar-days"></i>
                <span> Exam Routine </span>
            </a>

            <a href="{{ route('student.exam_result', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-calendar-days"></i>
                <span> Exam Result </span>
            </a>

            <a href="{{ route('user.application_order_list', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-cart-shopping"></i>
                <span> My Application List </span>
            </a>

            <a href="{{ route('user.my_order', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-book"></i>
                <span> My Course List </span>
            </a>
            <a href="{{ route('user.order_list', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-cart-shopping"></i>
                <span> My Order List </span>
            </a>
            {{-- <a href="{{ route('user.my_course', auth()->user()->id) }}" class="contentElementItem">
                <i class="fa-solid fa-heart-circle-plus"></i>
                <span> My Courses </span>
            </a> --}}
            <a href="{{ route('user.my_event', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-calendar-days"></i>
                <span> My Events </span>
            </a>

            {{-- <a href="{{ route('user.my_package', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-cube"></i>
                <span> My Package </span>
            </a> --}}
            <a href="{{ route('user.wishlist', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-heart-circle-plus"></i>
                <span> Saved </span>
            </a>
            {{-- <a href="{{ route('user.logout') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span> Logout </span>
            </a> --}}

            {{-- ================================== End Customer/Student ================================== --}}


            {{-- ================================== Teacher ================================== --}}
            @elseif (auth()->user()->type == 2)

                {{-- <a href="{{ route('user.dashboard', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-user"></i> Dashboard
                </a>

                <a href="{{ route('user.profile', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-user"></i> Personal Details
                </a>
                <a href="{{ route('user.password', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-shield"></i>
                    <span> Security </span>
                </a>
                <a href="{{ route('notice') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-user-check"></i>
                    <span>  Notice </span>
                </a>
                <a href="{{ route('privacy') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-user-check"></i>
                    <span>  Privacy & Policy </span>
                </a>

                <a href="{{ route('user.notification', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-bell"></i>
                    <span> Notification </span>
                </a> --}}

                <a href="{{ route('instructor.add_course', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Add New Course </span>
                </a>
                <a href="{{ route('instructor.manage_course', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-bars-progress"></i>
                    <span> Manage Courses </span>
                </a>

                <a href="{{ route('user.my_order', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-book"></i>
                    <span> My Course List </span>
                </a>


                @if (auth()->user()->is_librarian == 1)
                <a href="{{ route('teacher.library', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-book"></i>
                    <span> Library </span>
                </a>
                <a href="{{ route('teacher.library_index', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-book"></i>
                    <span> Borrow </span>
                </a>
                <a href="{{ route('teacher.library_borrow.manage', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-book"></i>
                    <span> Manage Borrow </span>
                </a>
                @endif



                <a href="{{ route('teacher.class_routine', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span> Class Routine </span>
                </a>

                <a href="{{ route('teacher.exam_routine', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span> Exam Routine </span>
                </a>

                <a href="{{ route('instructor.homework.create', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Add Homework </span>
                </a>

                <a href="{{ route('instructor.homework.index', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Manage Homework </span>
                </a>

                <a href="{{ route('instructor.class_exam.create', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Add class Exam </span>
                </a>

                <a href="{{ route('instructor.class_exam.index', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Manage class Exam </span>
                </a>

                <a href="{{ route('instructor.exam_result.create', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Add Exam Result </span>
                </a>

                <a href="{{ route('instructor.exam_result.index', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-upload"></i>
                    <span> Manage Exam Result </span>
                </a>

                <a href="{{ route('user.order_list', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span> My Order List </span>
                </a>

                <a href="{{ route('user.wishlist', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-heart-circle-plus"></i>
                    <span> Saved </span>
                </a>
                <a href="{{ route('frontend.manage_withdrawal', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                     <span> Withdrawal </span>
                 </a>
                {{-- <a href="{{ route('user.logout') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span> Logout </span>
                </a> --}}

            {{-- ================================== End Instructor ================================== --}}

             {{-- ================================== Seller Start ================================== --}}
             @elseif (auth()->user()->type == 5)

             {{-- <a href="{{ route('user.dashboard', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-user"></i> Dashboard
             </a>

             <a href="{{ route('user.profile', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-user"></i> Personal Details
             </a>
             <a href="{{ route('user.password', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-shield"></i>
                 <span> Security </span>
             </a>
             <a href="{{ route('privacy') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-user-check"></i>
                 <span>  Privacy & Policy </span>
             </a>

             <a href="{{ route('user.notification', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-bell"></i>
                 <span> Notification </span>
             </a> --}}

             <a href="{{ route('user.my_order', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-cart-shopping"></i>
                <span> My Orders </span>
            </a>

             <a href="{{ route('frontend.add_ebook', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-upload"></i>
                 <span> Add New E-Book </span>
             </a>
             <a href="{{ route('frontend.manage_ebook', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bars-progress"></i>
                 <span> Manage E-Book </span>
             </a>
             <a href="{{ route('frontend.manage_withdrawal', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-money-bill-transfer"></i>
                 <span> Withdrawal </span>
             </a>

             <a href="{{ route('frontend.add_ebook_audio', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-upload"></i>
                 <span> Add New E-Audio </span>
             </a>
             <a href="{{ route('frontend.manage_ebook_audio', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bars-progress"></i>
                 <span> Manage E-Audio </span>
             </a>

             <a href="{{ route('frontend.add_ebook_video', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-upload"></i>
                 <span> Add New E-Video </span>
             </a>
             <a href="{{ route('frontend.manage_ebook_video', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bars-progress"></i>
                 <span> Manage E-Video </span>
             </a>

             {{-- <a href="{{ route('user.wishlist', auth()->user()->id) }}" class="contentElementItem">
                 <i class="fa-solid fa-heart-circle-plus"></i>
                 <span> Saved </span>
             </a> --}}
             {{-- <a href="{{ route('user.logout') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                 <i class="fa-solid fa-right-from-bracket"></i>
                 <span> Logout </span>
             </a> --}}

            {{-- ================================== End seller ================================== --}}

            {{-- ================================== Affiliate Start ================================== --}}
            @elseif (auth()->user()->type == 6)

            {{-- <a href="{{ route('user.dashboard', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user"></i> Dashboard
            </a>

            <a href="{{ route('user.profile', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user"></i> Personal Details
            </a>
            <a href="{{ route('user.password', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-shield"></i>
                <span> Security </span>
            </a>
            <a href="{{ route('privacy') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user-check"></i>
                <span>  Privacy & Policy </span>
            </a>

            <a href="{{ route('user.notification', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bell"></i>
                <span> Notification </span>
            </a> --}}

            {{-- <a href="{{ route('frontend.add_ebook', auth()->user()->id) }}" class="contentElementItem">
                <i class="fa-solid fa-bell"></i>
                <span> Add New E-Book </span>
            </a>
            <a href="{{ route('frontend.manage_ebook', auth()->user()->id) }}" class="contentElementItem">
                <i class="fa-solid fa-bell"></i>
                <span> Manage E-Book </span>
            </a> --}}

            {{-- <a href="{{ route('user.wishlist', auth()->user()->id) }}" class="contentElementItem">
                <i class="fa-solid fa-heart-circle-plus"></i>
                <span> Saved </span>
            </a> --}}
            {{-- <a href="{{ route('user.logout') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span> Logout </span>
            </a> --}}

            {{-- ================================== End Affiliate ================================== --}}

            {{-- ================================== Contultant Start ================================== --}}
            @elseif (auth()->user()->type == 7)

            {{-- <a href="{{ route('user.dashboard', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user"></i> Dashboard
            </a>
        
            <a href="{{ route('user.profile', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user"></i> Personal Details
            </a>
            <a href="{{ route('user.password', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-shield"></i>
                <span> Security </span>
            </a>
            <a href="{{ route('privacy') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-user-check"></i>
                <span>  Privacy & Policy </span>
            </a>
        
            <a href="{{ route('user.notification', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bell"></i>
                <span> Notification </span>
            </a> --}}

            @if (auth()->user()->status == 0)
            <a href="{{ route('frontend.consultant_student_details_blank', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-bell"></i>
                <span> All Application </span>
            </a>
        
            @elseif (auth()->user()->status == 1)
                <a href="{{ route('frontend.manage_consultant_application', auth()->user()->id) }}" class="contentElementItem" style="color: var(--button2_text_color)">
                    <i class="fa-solid fa-bell"></i>
                    <span> All Application </span>
                </a>
            @endif

            
            {{-- ================================== Contultant End ================================== --}}

           @endif

            <a href="{{ route('user.logout') }}" class="contentElementItem" style="color: var(--button2_text_color)">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span> Logout </span>
            </a>

        </div>
    </div>
</div>
