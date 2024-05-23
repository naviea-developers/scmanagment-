
@php
   $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
@endphp
<div class="br-logo" style="background-color:var(--theme_color)"><a href="{{ route('admin.dashboard') }}" style="color: var(--theme_text_color)">{{  @$title->company_name   }}</a></div>
    <div class="br-sideleft sideleft-scrollbar">
    {{-- <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label> --}}
    <br/>
    <ul class="br-sideleft-menu">

        <li class="br-menu-item">
            <a href="{{ url('admin/dashboard') }}" class="br-menu-link {{ Route::is('admin.dashboard') ? "active" :""}}">
                <i class="menu-item-icon fa fa-tasks tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix=='admin/home')?'show-sub':''}}">
            <i class="menu-item-icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Home
            </span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub"  @if($prefix=='admin/home')style="display:block;"@endif>

            {{-- <li class="sub-item">
                @php
                    $r_check = ( Route::is('home-category.create') ||  Route::is('home-category.index') || Route::is('home-category.edit'));
                @endphp
                 <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                    <span class="menu-item-label">Category</span>
                </a>
                <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                    <li class="sub-item"><a href="{{ route('home-category.create') }}" class="sub-link {{( Route::is('home-category.create') ) ?'active':''}}">Add New Category</a>
                    </li>
                    <li class="sub-item"><a href="{{ route('home-category.index') }}" class="sub-link {{(Route::is('home-category.index') || Route::is('home-category.edit')) ?'active':''}}">Manage Category</a>
                    </li>
                </ul>
            </li> --}}

            {{-- Menu --}}
            <li class="sub-item"><a href="{{ route('admin.create_menu') }}" class="sub-link {{( Route::is('admin.create_menu') ) ?'active':''}}">Add New Menu</a>
            </li>
            <li class="sub-item"><a href="{{ route('admin.manage_menu') }}" class="sub-link {{(Route::is('admin.manage_menu') || Route::is('admin.edit_menu')) ?'active':''}}">Manage Menu</a>
            </li>
            {{-- Category --}}
            <li class="sub-item"><a href="{{ route('home-category.create') }}" class="sub-link {{( Route::is('home-category.create') ) ?'active':''}}">Add New Category</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-category.index') }}" class="sub-link {{(Route::is('home-category.index') || Route::is('home-category.edit')) ?'active':''}}">Manage Category</a>
            </li>
            {{-- Sub Category --}}
            <li class="sub-item"><a href="{{ route('home-sub-category.create') }}" class="sub-link {{(Route::is('home-sub-category.create') ) ?'active':''}}">Add New Sub Category</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-sub-category.index') }}" class="sub-link {{(Route::is('home-sub-category.index') || Route::is('home-sub-category.edit')) ?'active':''}}">Manage Sub Category</a>
            </li>
            {{-- Child Category --}}
            <li class="sub-item"><a href="{{ route('home-child-category.create') }}" class="sub-link {{(Route::is('home-child-category.create') ) ?'active':''}}">Add New Child Category</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-child-category.index') }}" class="sub-link {{(Route::is('home-child-category.index') || Route::is('home-child-category.edit')) ?'active':''}}">Manage Child Category</a>
            </li>
            {{-- Pro Cgild Category --}}
            <li class="sub-item"><a href="{{ route('home-pro-child-category.create') }}" class="sub-link {{(Route::is('home-pro-child-category.create') ) ?'active':''}}">Add New Pro Child Category</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-pro-child-category.index') }}" class="sub-link {{(Route::is('home-pro-child-category.index') || Route::is('home-pro-child-category.edit')) ?'active':''}}">Manage Pro Child Category</a>
            </li>
            {{-- Partner --}}
            <li class="sub-item"><a href="{{ route('home-partner.create') }}" class="sub-link {{( Route::is('home-partner.create') ) ?'active':''}}">Add New partner</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-partner.index') }}" class="sub-link {{(Route::is('home-partner.index') || Route::is('home-partner.edit')) ?'active':''}}">Manage partner</a>
            </li>

            {{-- <li class="sub-item"><a href="{{ route('home-banner.create') }}" class="sub-link {{( Route::is('home-banner.create') ) ?'active':''}}">Add New Banner</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-banner.index') }}" class="sub-link {{(Route::is('home-banner.index') || Route::is('home-banner.edit')) ?'active':''}}">Manage Banner</a>
            </li> --}}

            {{-- Media Partner --}}
            <li class="sub-item"><a href="{{ route('home-client.create') }}" class="sub-link {{( Route::is('home-client.create') ) ?'active':''}}">Add New Media Partner</a>
            </li>
            <li class="sub-item"><a href="{{ route('home-client.index') }}" class="sub-link {{(Route::is('home-client.index') || Route::is('home-client.edit')) ?'active':''}}">Manage Media Partner</a>
            </li>
            {{-- <li class="sub-item"><a href="{{ route('backend.home_content') }}" class="sub-link {{(Route::is('backend.home_content') ) ?'active':''}}">Home Content Setup</a>
            </li> --}}



          

            </ul>
        </li>

         {{-- Class Section Sidebar --}}
         {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub
          @if (Request::segment(1) == 'viewAllClass' or Request::segment(1) == 'addNewClass') show-sub @endif">

                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Class</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub" style="display:  @if (Request::segment(1) == 'viewAllClass' or
                    Request::segment(1) == 'addNewBatch' or
                    Request::segment(1) == 'addRoutine' or
                    Request::segment(1) == 'getHomework' or
                    Request::segment(1) == 'addHomework') block @endif">

                @if (Session::get('userRole') == 'admin')
                    <li class="sub-item"><a href="{{ url('viewAllClass') }}"
                            class="sub-link
                {{ Request::segment(1) === 'viewAllClass' ? 'active_sidebar' : null }}">
                            View All Batch</a>
                    </li>
                    <li class="sub-item"><a href="{{ url('addNewBatch') }}"
                            class="sub-link
                {{ Request::segment(1) === 'addNewBatch' ? 'active_sidebar' : null }}">
                            Add new Batch</a>
                    </li>

                    <li class="sub-item">
                        <a href="{{ url('addRoutine') }}"
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
        </li> --}}

        
        @php
        $admissions = \App\Models\Admission::where('is_new', 1)->get();
        @endphp

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">School Management</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.class.create') ||  Route::is('admin.class.index') || Route::is('admin.class.edit')
            || Route::is('admin.subject.create') ||  Route::is('admin.subject.index') || Route::is('admin.subject.edit')
            || Route::is('admin.subject_teacher_assent.create') ||  Route::is('admin.subject_teacher_assent.index') || Route::is('admin.subject_teacher_assent.edit')
            || Route::is('admin.group.create') ||  Route::is('admin.group.index') || Route::is('admin.group.edit')
            || Route::is('admin.class_duration.create') ||  Route::is('admin.class_duration.index') || Route::is('admin.class_duration.edit')
            || Route::is('admin.academic_year.create') ||  Route::is('admin.academic_year.index') || Route::is('admin.academic_year.edit')
            || Route::is('admin.session.create') ||  Route::is('admin.session.index') || Route::is('admin.session.edit')
            || Route::is('admin.bulding.create') ||  Route::is('admin.bulding.index') || Route::is('admin.bulding.edit')
            || Route::is('admin.floor.create') ||  Route::is('admin.floor.index') || Route::is('admin.floor.edit')
            || Route::is('admin.room.create') ||  Route::is('admin.room.index') || Route::is('admin.room.edit')
            || Route::is('admin.school_section.create') ||  Route::is('admin.school_section.index') || Route::is('admin.school_section.edit')
            || Route::is('admin.examination.create') ||  Route::is('admin.examination.index') || Route::is('admin.examination.edit')
            || Route::is('admin.examtype.create') ||  Route::is('admin.examtype.index') || Route::is('admin.examtype.edit')
            || Route::is('admin.examclass.create') ||  Route::is('admin.examclass.index') || Route::is('admin.examclass.edit')
            || Route::is('admin.examschedule.create') ||  Route::is('admin.examschedule.index') || Route::is('admin.examschedule.edit')
            || Route::is('admin.examroutine.create') ||  Route::is('admin.examroutine.index') || Route::is('admin.examroutine.edit')
            || Route::is('admin.exam_result.index') || Route::is('admin.exam_result.edit')
            || Route::is('admin.routine.create') ||  Route::is('admin.routine.index') || Route::is('admin.routine.edit')
            || Route::is('admin.notice.create') ||  Route::is('admin.notice.index') || Route::is('admin.notice.edit')
            || Route::is('admin.gallery.create') ||  Route::is('admin.gallery.index') || Route::is('admin.gallery.edit')
            || Route::is('admin.fee.create') ||  Route::is('admin.fee.index') || Route::is('admin.fee.edit')
            || Route::is('admin.fee_management.create') ||  Route::is('admin.fee_management.index') || Route::is('admin.fee_management.edit')
            || Route::is('admin.admission.create') ||  Route::is('admin.admission.index') || Route::is('admin.admission.edit')
            );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.bulding.index') }}" class="sub-link {{(Route::is('admin.bulding.index') || Route::is('admin.bulding.edit') || Route::is('admin.bulding.create')) ?'active':''}}">Manage Bulding</a></li>
                <li class="sub-item"><a href="{{ route('admin.floor.index') }}" class="sub-link {{(Route::is('admin.floor.index') || Route::is('admin.floor.edit') || Route::is('admin.floor.create')) ?'active':''}}">Manage Floor</a></li>
                <li class="sub-item"><a href="{{ route('admin.room.index') }}" class="sub-link {{(Route::is('admin.room.index') || Route::is('admin.room.edit') || Route::is('admin.room.create')) ?'active':''}}">Manage Rooms</a></li>
                <li class="sub-item"><a href="{{ route('admin.academic_year.index') }}" class="sub-link {{(Route::is('admin.academic_year.index') || Route::is('admin.academic_year.edit') || Route::is('admin.academic_year.create')) ?'active':''}}">Manage Academic Year</a></li>
                <li class="sub-item"><a href="{{ route('admin.session.index') }}" class="sub-link {{(Route::is('admin.session.index') || Route::is('admin.session.edit') || Route::is('admin.session.create')) ?'active':''}}">Manage Session</a></li>
                <li class="sub-item"><a href="{{ route('admin.class.index') }}" class="sub-link {{(Route::is('admin.class.index') || Route::is('admin.class.edit') || Route::is('admin.class.create')) ?'active':''}}">Manage Class</a></li>
                <li class="sub-item"><a href="{{ route('admin.subject_teacher_assent.index') }}" class="sub-link {{(Route::is('admin.subject_teacher_assent.index') || Route::is('admin.subject_teacher_assent.edit') || Route::is('admin.subject_teacher_assent.create')) ?'active':''}}">Manage Teacher Assent</a></li>
                <li class="sub-item"><a href="{{ route('admin.class_duration.index') }}" class="sub-link {{(Route::is('admin.class_duration.index') || Route::is('admin.class_duration.edit') || Route::is('admin.class_duration.create')) ?'active':''}}">Manage Class Duration</a></li>
                <li class="sub-item"><a href="{{ route('admin.group.index') }}" class="sub-link {{(Route::is('admin.group.index') || Route::is('admin.group.edit') || Route::is('admin.group.create')) ?'active':''}}">Manage Group</a></li>
                <li class="sub-item"><a href="{{ route('admin.school_section.index') }}" class="sub-link {{(Route::is('admin.school_section.index') || Route::is('admin.school_section.edit') || Route::is('admin.school_section.create')) ?'active':''}}">Manage Section</a></li>
                <li class="sub-item"><a href="{{ route('admin.subject.index') }}" class="sub-link {{(Route::is('admin.subject.index') || Route::is('admin.subject.edit') || Route::is('admin.subject.create')) ?'active':''}}">Manage Subject</a></li>
                <li class="sub-item"><a href="{{ route('admin.fee.index') }}" class="sub-link {{(Route::is('admin.fee.index') || Route::is('admin.fee.edit') || Route::is('admin.fee.create')) ?'active':''}}">Manage Fees Name</a></li>
                <li class="sub-item"><a href="{{ route('admin.fee_management.index') }}" class="sub-link {{(Route::is('admin.fee_management.index') || Route::is('admin.fee_management.edit') || Route::is('admin.subject.create')) ?'active':''}}">Fees Management</a></li>
                <li class="sub-item"><a href="{{ route('admin.examination.index') }}" class="sub-link {{(Route::is('admin.examination.index') || Route::is('admin.examination.edit') || Route::is('admin.examination.create')) ?'active':''}}">Manage Examination</a></li>
                <li class="sub-item"><a href="{{ route('admin.examtype.index') }}" class="sub-link {{(Route::is('admin.examtype.index') || Route::is('admin.examtype.edit') || Route::is('admin.examtype.create')) ?'active':''}}">Manage Exam Type</a></li>
                <li class="sub-item"><a href="{{ route('admin.examclass.index') }}" class="sub-link {{(Route::is('admin.examclass.index') || Route::is('admin.examclass.edit') || Route::is('admin.examclass.create')) ?'active':''}}">Manage Exam Subject</a></li>
                <li class="sub-item"><a href="{{ route('admin.examschedule.index') }}" class="sub-link {{(Route::is('admin.examschedule.index') || Route::is('admin.examschedule.edit') || Route::is('admin.examschedule.create')) ?'active':''}}">Manage Exam Schedule</a></li>
                <li class="sub-item"><a href="{{ route('admin.examroutine.index') }}" class="sub-link {{(Route::is('admin.examroutine.index') || Route::is('admin.examroutine.edit') || Route::is('admin.examroutine.create')) ?'active':''}}">Manage Exam Routine</a></li>
                <li class="sub-item"><a href="{{ route('admin.exam_result.index') }}" class="sub-link {{(Route::is('admin.exam_result.edit') || Route::is('admin.exam_result.index')) ?'active':''}}">Manage Exam Result</a></li>
                <li class="sub-item"><a href="{{ route('admin.routine.index') }}" class="sub-link {{( Route::is('admin.routine.index') ) ?'active':''}}">Manage Class Routine</a></li>
                <li class="sub-item"><a href="{{ route('admin.gallery.index') }}" class="sub-link {{(Route::is('admin.gallery.index') || Route::is('admin.gallery.edit') || Route::is('admin.gallery.create')) ?'active':''}}">Manage Gallery</a></li>
                <li class="sub-item"><a href="{{ route('admin.notice.index') }}" class="sub-link {{(Route::is('admin.notice.index') || Route::is('admin.notice.edit') || Route::is('admin.notice.create')) ?'active':''}}">Manage Notice</a></li>
                {{-- <li class="sub-item"><a href="{{ route('admin.admission.create') }}" class="sub-link {{(Route::is('admin.admission.create')) ?'active':''}}">Add New Admission</a></li> --}}
                <li class="sub-item"><a href="{{ route('admin.admission.index') }}" class="sub-link {{(Route::is('admin.admission.index') || Route::is('admin.admission.edit')) ?'active':''}}">Manage Admission ({{ $admissions->count() }})</a></li>
               
            </ul>
        </li><!-- br-Speakers-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == '')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Class</span>
            </a>
            @php
            $r_check = ( Route::is('admin.batch.index') ||  Route::is('admin.batch.create') ||  Route::is('addRoutine') || Route::is('getHomework') || Route::is('addHomework') || Route::is('addResult') || Route::is('addClassTest'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.batch.index') }}" class="sub-link {{( Route::is('admin.batch.index') ) ?'active':''}}">View All Batch</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.batch.create') }}" class="sub-link {{(Route::is('admin.batch.create')) ?'active':''}}">Add new Batch</a>
                </li>
                <li class="sub-item"><a href="{{ route('addRoutine') }}" class="sub-link {{(Route::is('addRoutine') ) ?'active':''}}">Add class routine</a>
                </li>
                <li class="sub-item"><a href="{{ route('getHomework') }}" class="sub-link {{(Route::is('getHomework')) ?'active':''}}">Homework</a>
                </li>
                {{-- @if (auth()->user()->type == 2 )
                <li class="sub-item"><a href="{{ route('addHomework') }}" class="sub-link {{(Route::is('addHomework')) ?'active':''}}">Add Homework</a>
                </li>
                <li class="sub-item"><a href="{{ route('addResult') }}" class="sub-link {{(Route::is('addResult')) ?'active':''}}">Add Score</a>
                </li>
                <li class="sub-item"><a href="{{ route('addClassTest') }}" class="sub-link {{(Route::is('addClassTest')) ?'active':''}}">Class Test</a>
                </li>
                @endif --}}
            </ul>
        </li>

        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == '')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Exam Schedule</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('allExam') );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('allExam') }}" class="sub-link {{( Route::is('allExam') ) ?'active':''}}">Exam Routine</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item --> --}}


        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Teacher</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('Manage Designation') || Route::is('admin.teacher.index') || Route::is('admin.teacher.edit') || Route::is('admin.designation.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.teacher.create') }}" class="sub-link {{( Route::is('admin.teacher.create') ) ?'active':''}}">Add New Teacher</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.teacher.index') }}" class="sub-link {{(Route::is('admin.teacher.index') || Route::is('admin.teacher.edit')) ?'active':''}}">Manage Teacher</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.designation.index') }}" class="sub-link {{(Route::is('admin.designation.index') ) ?'active':''}}">Manage Designation</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'school_student')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Student</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.school_student.create') ||  Route::is('admin.school_student.index') || Route::is('admin.school_student.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.school_student.create') }}" class="sub-link {{( Route::is('admin.school_student.create') ) ?'active':''}}">Add New Student</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.school_student.index') }}" class="sub-link {{(Route::is('admin.school_student.index') || Route::is('admin.school_student.edit')) ?'active':''}}">Manage Student</a>
                </li>
                {{-- <li class="sub-item"><a href="{{ route('admin.course.order.manage') }}" class="sub-link {{(Route::is('admin.course.order.manage') ) ?'active':''}}">Manage Course & Ebook Order</a>
                </li> --}}
            </ul>
        </li><!-- br-Speakers-item -->


        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'courses')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Course</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.course.create') ||  Route::is('admin.course.index') || Route::is('admin.course.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.course.create') }}" class="sub-link {{( Route::is('admin.course.create') ) ?'active':''}}">Add New Course</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.course.index') }}" class="sub-link {{(Route::is('admin.course.index') || Route::is('admin.course.edit')) ?'active':''}}">Manage Course</a>
                </li>
                {{-- <li class="sub-item"><a href="{{ route('admin.course.order.manage') }}" class="sub-link {{(Route::is('admin.course.order.manage') ) ?'active':''}}">Manage Course & Ebook Order</a>
                </li> --}}
            </ul>
        </li><!-- br-Speakers-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'ebook')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">E-Book</span>
            </a>
            @php
            $r_check = ( Route::is('admin.ebook.create') ||  Route::is('admin.ebook.index') ||  Route::is('admin.ebook.order.manage') || Route::is('admin.ebook.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.ebook.create') }}" class="sub-link {{( Route::is('admin.ebook.create') ) ?'active':''}}">Add New E-Book</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.ebook.index') }}" class="sub-link {{(Route::is('admin.ebook.index') || Route::is('admin.ebook.edit')) ?'active':''}}">Manage E-Book</a>
                </li>
                </li>
            </ul>
        </li>

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'ebookaudio')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">E-Book Audio</span>
            </a>
            @php
            $r_check = ( Route::is('admin.ebookaudio.create') ||  Route::is('admin.ebookaudio.index') || Route::is('admin.ebookaudio.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.ebookaudio.create') }}" class="sub-link {{( Route::is('admin.ebookaudio.create') ) ?'active':''}}">Add New Audio E-Book</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.ebookaudio.index') }}" class="sub-link {{(Route::is('admin.ebookaudio.index') || Route::is('admin.ebookaudio.edit')) ?'active':''}}">Manage Audio E-Book</a>
                </li>
                </li>
            </ul>
        </li>

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'ebookvideo')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">E-Book Video</span>
            </a>
            @php
            $r_check = ( Route::is('admin.ebookvideo.create') ||  Route::is('admin.ebookvideo.index') || Route::is('admin.ebookvideo.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.ebookvideo.create') }}" class="sub-link {{( Route::is('admin.ebookvideo.create') ) ?'active':''}}">Add New Video E-Book</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.ebookvideo.index') }}" class="sub-link {{(Route::is('admin.ebookvideo.index') || Route::is('admin.ebookvideo.edit')) ?'active':''}}">Manage Video E-Book</a>
                </li>
                </li>
            </ul>
        </li>


        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'u_course')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Programs</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.u_course.create') ||  Route::is('admin.u_course.index') || Route::is('admin.u_course.edit') 
            || Route::is('admin.department.index') || Route::is('admin.department.edit') || Route::is('admin.department.create')
            || Route::is('admin.degree.index') || Route::is('admin.degree.edit') || Route::is('admin.degree.create')
            || Route::is('admin.section.index') || Route::is('admin.section.edit') || Route::is('admin.section.create')
            || Route::is('admin.language.index') || Route::is('admin.language.edit') || Route::is('admin.language.create')
        );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.u_course.create') }}" class="sub-link {{( Route::is('admin.u_course.create') ) ?'active':''}}">Add New Program</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.u_course.index') }}" class="sub-link {{(Route::is('admin.u_course.index') || Route::is('admin.u_course.edit')) ?'active':''}}">Manage Programs</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.department.create') }}" class="sub-link {{( Route::is('admin.department.create') ) ?'active':''}}">Add Department</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.department.index') }}" class="sub-link {{(Route::is('admin.department.index') || Route::is('admin.department.edit')) ?'active':''}}">Manage Department</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.degree.create') }}" class="sub-link {{( Route::is('admin.degree.create') ) ?'active':''}}">Add Degree</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.degree.index') }}" class="sub-link {{(Route::is('admin.degree.index') || Route::is('admin.degree.edit')) ?'active':''}}">Manage Degree</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.section.create') }}" class="sub-link {{( Route::is('admin.section.create') ) ?'active':''}}">Add Section</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.section.index') }}" class="sub-link {{(Route::is('admin.section.index') || Route::is('admin.section.edit')) ?'active':''}}">Manage Section</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.language.create') }}" class="sub-link {{( Route::is('admin.language.create') ) ?'active':''}}">Add Language</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.language.index') }}" class="sub-link {{(Route::is('admin.language.index') || Route::is('admin.language.edit')) ?'active':''}}">Manage Language</a>
                </li>
            </ul>
        </li>

        <li class="br-menu-item">
            <a href="{{ route('admin.student_appliction_list') }}" class="br-menu-link {{ Route::is('admin.student_appliction_list') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Program Applictions</span>
            </a><!-- br-menu-link -->
        </li> --}}



        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'university')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">University</span>
            </a>
            @php
            $r_check = ( Route::is('admin.university.create') ||  Route::is('admin.university.index') || Route::is('admin.university.edit') || Route::is('admin.university_faq_manage'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.university.create') }}" class="sub-link {{( Route::is('admin.university.create') ) ?'active':''}}">Add New University</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.university.index') }}" class="sub-link {{(Route::is('admin.university.index') || Route::is('admin.ebookvideo.edit')) ?'active':''}}">Manage University</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.university_faq_manage') }}" class="sub-link {{(Route::is('admin.university_faq_manage') ) ?'active':''}}">University FAQ</a>
                </li>
                </li>
            </ul>
        </li> --}}



        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == "/popular-location" || Route::is('country.create') ||  Route::is('country.index') ||  Route::is('continent.index') ||  Route::is('continent.create') ||  Route::is('state.index') ||  Route::is('state.create') ||  Route::is('city.index') ||  Route::is('city.create') ||  Route::is('thana.index') ||  Route::is('thana.create') ||  Route::is('union.index') ||  Route::is('union.create') ||  Route::is('word.index') ||  Route::is('word.create') || Route::is('tourism-package.create') ||  Route::is('tourism-package.index') || Route::is('tourism-hotel-package.create') ||  Route::is('tourism-hotel-package.index'))?'show-sub':''}}">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Location</span>
            </a><!-- br-menu-link -->
                <ul class="br-menu-sub" @if($prefix == "/popular-location" || Route::is('country.create') ||  Route::is('country.index') ||  Route::is('continent.index') ||  Route::is('continent.create') ||  Route::is('state.index') ||  Route::is('state.create') ||  Route::is('city.index') ||  Route::is('city.create') ||  Route::is('thana.index') ||  Route::is('thana.create') ||  Route::is('union.index') ||  Route::is('union.create') ||  Route::is('word.index') ||  Route::is('word.create') || Route::is('tourism-package.create') ||  Route::is('tourism-package.index') || Route::is('tourism-hotel-package.create') ||  Route::is('tourism-hotel-package.index')) style="display:block;"@endif>

            {{-- Continent --}}
                    <li class="sub-item">
                        @php
                            $r_check = (Route::is('continent.create') ||  Route::is('continent.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                                {{-- <i class="menu-item-icon ion-ios-home-outline tx-24"></i> --}}
                            <span class="menu-item-label">Continent</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('continent.create') }}" class="sub-link {{( Route::is('continent.create') ) ?'active':''}}">Add New Continent</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('continent.index') }}" class="sub-link {{(Route::is('continent.index') || Route::is('continent.edit')) ?'active':''}}">Manage Continents</a>
                            </li>
                        </ul>
                    </li>

            {{-- Country --}}
                    <li class="sub-item">
                        @php
                            $r_check = (Route::is('country.create') ||  Route::is('country.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                                {{-- <i class="menu-item-icon ion-ios-home-outline tx-24"></i> --}}
                            <span class="menu-item-label">Country</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('country.create') }}" class="sub-link {{( Route::is('country.create') ) ?'active':''}}">Add New Country</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('country.index') }}" class="sub-link {{(Route::is('country.index') || Route::is('country.edit')) ?'active':''}}">Manage Countries</a>
                            </li>
                        </ul>
                    </li>



                    {{-- State --}}
                    <li class="sub-item">
                        @php
                            $r_check = (Route::is('state.create') ||  Route::is('state.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                                {{-- <i class="menu-item-icon ion-ios-home-outline tx-24"></i> --}}
                            <span class="menu-item-label">State</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('state.create') }}" class="sub-link {{( Route::is('state.create') ) ?'active':''}}">Add New State</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('state.index') }}" class="sub-link {{(Route::is('state.index') || Route::is('state.edit')) ?'active':''}}">Manage States</a>
                            </li>
                        </ul>
                    </li>


                    {{-- City --}}
                    <li class="sub-item">
                        @php
                            $r_check = (Route::is('city.create') ||  Route::is('city.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                                {{-- <i class="menu-item-icon ion-ios-home-outline tx-24"></i> --}}
                            <span class="menu-item-label">City</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('city.create') }}" class="sub-link {{( Route::is('city.create') ) ?'active':''}}">Add New City</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('city.index') }}" class="sub-link {{(Route::is('city.index') || Route::is('city.edit')) ?'active':''}}">Manage Cities</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Thana --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('thana.create') ||  Route::is('thana.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Post</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('thana.create') }}" class="sub-link {{( Route::is('thana.create') ) ?'active':''}}">Add New Post</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('thana.index') }}" class="sub-link {{(Route::is('thana.index') || Route::is('thana.edit')) ?'active':''}}">Manage Posts</a>
                            </li>
                        </ul>
                    </li> --}}


                    {{-- Union --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('union.create') ||  Route::is('union.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Union</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('union.create') }}" class="sub-link {{( Route::is('union.create') ) ?'active':''}}">Add New Union</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('union.index') }}" class="sub-link {{(Route::is('union.index') || Route::is('union.edit')) ?'active':''}}">Manage Unions</a>
                            </li>
                        </ul>
                    </li> --}}


                    {{-- Word --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('word.create') ||  Route::is('word.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Word</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('word.create') }}" class="sub-link {{( Route::is('word.create') ) ?'active':''}}">Add New Word</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('word.index') }}" class="sub-link {{(Route::is('word.index') || Route::is('word.edit')) ?'active':''}}">Manage Words</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- Popular Location --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('admin.popular_location.index') ||  Route::is('admin.popular_location.create') || Route::is('admin.popular_location.edit'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Popular Location</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('admin.popular_location.create') }}" class="sub-link {{( Route::is('admin.popular_location.create') ) ?'active':''}}">Add New Popular Location</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('admin.popular_location.index') }}" class="sub-link {{(Route::is('admin.popular_location.index') || Route::is('admin.popular_location.edit')) ?'active':''}}">Manage Popular Location</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- Package --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('tourism-package.create') ||  Route::is('tourism-package.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Package</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('tourism-package.create') }}" class="sub-link {{( Route::is('tourism-package.create') ) ?'active':''}}">Add New Package</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('tourism-package.index') }}" class="sub-link {{(Route::is('tourism-package.index') || Route::is('tourism-package.edit')) ?'active':''}}">Manage Packages</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- Hotel --}}
                    {{-- <li class="sub-item">
                        @php
                            $r_check = (Route::is('tourism-hotel-package.create') ||  Route::is('tourism-hotel-package.index'));
                        @endphp
                        <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                            <span class="menu-item-label">Hotel</span>
                        </a>
                        <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                            <li class="sub-item"><a href="{{ route('tourism-hotel-package.create') }}" class="sub-link {{( Route::is('tourism-hotel-package.create') ) ?'active':''}}">Add New Hotel</a>
                            </li>
                            <li class="sub-item"><a href="{{ route('tourism-hotel-package.index') }}" class="sub-link {{(Route::is('tourism-hotel-package.index') || Route::is('tourism-hotel-package.edit')) ?'active':''}}">Manage Hotels</a>
                            </li>
                        </ul>
                    </li> --}}






                </ul>










        </li><!-- medical-torism-menu-item -->



        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'master-courses')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Master Courses</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.master_course.create') ||  Route::is('admin.master_course.index') || Route::is('admin.master_course.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.master_course.create') }}" class="sub-link {{( Route::is('admin.master_course.create') ) ?'active':''}}">Add Master Course</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.master_course.index') }}" class="sub-link {{(Route::is('admin.master_course.index') || Route::is('admin.master_course.edit')) ?'active':''}}">Manage Course</a>
                </li>
            </ul>
        </li><!-- br-Event-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'event')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Event</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.event.create') ||  Route::is('admin.event.index') || Route::is('admin.event.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.event.create') }}" class="sub-link {{( Route::is('admin.event.create') ) ?'active':''}}">Add New Event</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.event.index') }}" class="sub-link {{(Route::is('admin.event.index') || Route::is('admin.event.edit')) ?'active':''}}">Manage Event</a>
                </li>
            </ul>
        </li><!-- br-Event-item --> --}}

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'coupon')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Coupon</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.coupon.create') ||  Route::is('admin.coupon.index') || Route::is('admin.coupon.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.coupon.create') }}" class="sub-link {{( Route::is('admin.coupon.create') ) ?'active':''}}">Add New coupon</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.coupon.index') }}" class="sub-link {{(Route::is('admin.coupon.index') || Route::is('admin.coupon.edit')) ?'active':''}}">Manage Coupon</a>
                </li>
            </ul>
        </li><!-- br-Coupon-item -->


        <li class="br-menu-item">
            <a href="{{ route('admin.course.order.manage') }}" class="br-menu-link {{(Route::is('admin.course.order.manage')) ?'show-sub':'' }}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Orders</span>
            </a><!-- br-menu-link -->
        </li>


        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">All User</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.host.create') || Route::is('admin.selery.create')
            || Route::is('admin.selery.index') || Route::is('admin.selery.edit')  ||  Route::is('admin.host.index')
            || Route::is('admin.host.edit') || Route::is('admin.instrutor.create') ||  Route::is('admin.instrutor.index')
            || Route::is('admin.instrutor.edit') ||  Route::is('admin.student.create')
            || Route::is('admin.student.index') ||  Route::is('admin.student.edit')
            || Route::is('admin.affiliate.index') ||  Route::is('admin.affiliate.create') || Route::is('admin.affiliate.edit')
            || Route::is('backend.create_admin') ||  Route::is('backend.manage_admin') || Route::is('backendog.edit_admin')
            || Route::is('admin.consultant.create') ||  Route::is('admin.consultant.index') || Route::is('admin.consultant.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('backend.create_admin') }}" class="sub-link {{( Route::is('backend.create_admin') ) ?'active':''}}">Add New Admin</a>
                </li>
                <li class="sub-item"><a href="{{ route('backend.manage_admin') }}" class="sub-link {{(Route::is('backend.manage_admin') || Route::is('backendog.edit_admin')) ?'active':''}}">Manage Admins</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.teacher.create') }}" class="sub-link {{( Route::is('admin.teacher.create') ) ?'active':''}}">Add New Teacher</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.teacher.index') }}" class="sub-link {{(Route::is('admin.teacher.index') || Route::is('admin.teacher.edit')) ?'active':''}}">Manage Teacher</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.student.create') }}" class="sub-link {{( Route::is('admin.student.create') ) ?'active':''}}">Add New User</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.student.index') }}" class="sub-link {{(Route::is('admin.student.index') || Route::is('admin.student.edit')) ?'active':''}}">Manage User</a>
                </li>

                {{-- <li class="sub-item"><a href="{{ route('admin.instrutor.create') }}" class="sub-link {{( Route::is('admin.instrutor.create') ) ?'active':''}}">Add New Speakers</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.instrutor.index') }}" class="sub-link {{(Route::is('admin.instrutor.index') || Route::is('admin.instrutor.edit')) ?'active':''}}">Manage Speakers</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.host.create') }}" class="sub-link {{( Route::is('admin.host.create') ) ?'active':''}}">Add New Host</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.host.index') }}" class="sub-link {{(Route::is('admin.host.index') || Route::is('admin.host.edit')) ?'active':''}}">Manage Host</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.selery.create') }}" class="sub-link {{( Route::is('admin.selery.create') ) ?'active':''}}">Add New Seller</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.selery.index') }}" class="sub-link {{(Route::is('admin.selery.index') || Route::is('admin.selery.edit')) ?'active':''}}">Manage Seller</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.affiliate.create') }}" class="sub-link {{( Route::is('admin.affiliate.create') ) ?'active':''}}">Add New Affiliate</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.affiliate.index') }}" class="sub-link {{(Route::is('admin.affiliate.index') || Route::is('admin.affiliate.edit')) ?'active':''}}">Manage Affiliate</a>
                </li>

                <li class="sub-item"><a href="{{ route('admin.consultant.create') }}" class="sub-link {{( Route::is('admin.consultant.create') ) ?'active':''}}">Add New Consultant</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.consultant.index') }}" class="sub-link {{(Route::is('admin.consultant.index') || Route::is('admin.consultant.edit')) ?'active':''}}">Manage Consultant</a>
                </li> --}}

            </ul>
        </li><!-- br-Teacher-item -->


        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Student</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.student.create') ||  Route::is('admin.student.index') || Route::is('admin.student.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.student.create') }}" class="sub-link {{( Route::is('admin.student.create') ) ?'active':''}}">Add New Student</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.student.index') }}" class="sub-link {{(Route::is('admin.student.index') || Route::is('admin.student.edit')) ?'active':''}}">Manage Student</a>
                </li>
            </ul>
        </li><!-- br-Teacher-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'instrutor')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Speakers</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.instrutor.create') ||  Route::is('admin.instrutor.index') || Route::is('admin.instrutor.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.instrutor.create') }}" class="sub-link {{( Route::is('admin.instrutor.create') ) ?'active':''}}">Add New Speakers</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.instrutor.index') }}" class="sub-link {{(Route::is('admin.instrutor.index') || Route::is('admin.instrutor.edit')) ?'active':''}}">Manage Speakers</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'host')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Host</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.host.create') ||  Route::is('admin.host.index') || Route::is('admin.host.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.host.create') }}" class="sub-link {{( Route::is('admin.host.create') ) ?'active':''}}">Add New Host</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.host.index') }}" class="sub-link {{(Route::is('admin.host.index') || Route::is('admin.host.edit')) ?'active':''}}">Manage Host</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.order.index') }}" class="br-menu-link">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Course Order</span>
            </a><!-- br-menu-link -->
        </li><!-- br-order-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.course.order.manage') }}" class="br-menu-link {{ Route::is('admin.course.order.manage') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Manage Course Orders</span>
            </a><!-- br-menu-link -->
        </li> --}}

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.event.order.manage') }}" class="br-menu-link {{ Route::is('admin.event.order.manage') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Manage Event Participant</span>
            </a><!-- br-menu-link -->
        </li> --}}


        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.review.index') }}" class="br-menu-link ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Manage Review</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item --> --}}

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.event.contact.index') }}" class="br-menu-link {{(Route::is('admin.event.contact.index')) ?'show-sub':'' }}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Manage Event Comment</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Event Contact -item --> --}}

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Testimonials & Review</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.add_new_testimonial')  ||  Route::is('admin.manage_testimonial') || Route::is('admin.edit_testimonial') || Route::is('admin.review.index') || Route::is('admin.review.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.add_new_testimonial') }}" class="sub-link {{( Route::is('admin.add_new_testimonial') ) ?'active':''}}">Add New Testimonial</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.manage_testimonial') }}" class="sub-link {{(Route::is('admin.manage_testimonial') || Route::is('admin.edit_testimonial')) ?'active':''}}">Manage Testimonials</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.review.index') }}" class="sub-link {{(Route::is('admin.review.index') || Route::is('admin.review.edit')) ?'active':''}}">Manage Review</a>
                </li>

            </ul>
        </li><!-- br-Teacher-item -->



        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Event & Blog</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = (Route::is('blog.create_topic') || Route::is('admin.event.order.manage') || Route::is('admin.event.contact.index') || Route::is('event.order.details') || Route::is('admin.event.contact.edit') || Route::is('admin.event.create')  || Route::is('admin.event.index')  || Route::is('admin.event.edit')   || Route::is('blog.manage_topic') || Route::is('blog.edit_topic') || Route::is('blog.comments') || Route::is('blog.comment_edit') || Route::is('blog.create') ||  Route::is('blog.index') || Route::is('blog.edit') || Route::is('blog.edit_topic') || Route::is('blog.create_topic') || Route::is('blog.manage_topic') || Route::is('phar-sub-category.create') || Route::is('phar-sub-category.edit') || Route::is('phar-sub-category.index') || Route::is('phar-category.edit') ||  Route::is('phar-category.index')  ||  Route::is('phar-category.create'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.event.create') }}" class="sub-link {{( Route::is('admin.event.create') ) ?'active':''}}">Add New Event</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.event.index') }}" class="sub-link {{(Route::is('admin.event.index') || Route::is('admin.event.edit')) ?'active':''}}">Manage Event</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.event.order.manage') }}" class="sub-link {{(Route::is('admin.event.order.manage') || Route::is('event.order.details')) ?'active':''}}">Event Participant</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.event.contact.index') }}" class="sub-link {{(Route::is('admin.event.contact.index') || Route::is('admin.event.contact.edit')) ?'active':''}}">Event Comment</a>
                </li>

                <li class="sub-item"><a href="{{ route('blog.create_topic') }}" class="sub-link {{(Route::is('blog.create_topic') )? 'active':''}}">Add New Topic</a>
                </li>
                <li class="sub-item"><a href="{{ route('blog.manage_topic') }}" class="sub-link {{(Route::is('blog.manage_topic') || Route::is('blog.edit_topic') )? 'active':''}}">Manage Topic</a>
                </li>

                <li class="sub-item"><a href="{{ route('blog.create') }}" class="sub-link {{( Route::is('blog.create') ) ?'active':''}}">Add New Blog</a>
                </li>
                <li class="sub-item"><a href="{{ route('blog.index') }}" class="sub-link {{(Route::is('blog.index') || Route::is('blog.edit')) ?'active':''}}">Manage BLog</a>
                </li>
                <li class="sub-item"><a href="{{ route('blog.comments') }}" class="sub-link {{(Route::is('blog.comments') || Route::is('blog.comment_edit')) ?'active':''}}">Manage BLog Comments</a>
                </li>

            </ul>
        </li><!-- br-blog-item -->

        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Packages</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.all_package') ||  Route::is('package.order.details') ||  Route::is('admin.all_year_package') || Route::is('admin.package.order.manage') || Route::is('admin.edit_package') || Route::is('admin.edit_year_package'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.all_package') }}" class="sub-link {{( Route::is('admin.all_package') || Route::is('admin.edit_package')) ?'active':''}}">Manage Packages</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.package.order.manage') }}" class="sub-link {{( Route::is('admin.package.order.manage') || Route::is('package.order.details') ) ?'active':''}}">Package Subscription</a>
                </li>
            </ul>
        </li> --}}



        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Currency</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.manage_currency') ||  Route::is('admin.create_currency') ||  Route::is('admin.edit_currency'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>

                <li class="sub-item"><a href="{{ route('admin.create_currency') }}" class="sub-link {{( Route::is('admin.create_currency')) ?'active':''}}">Add New Currency</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.manage_currency') }}" class="sub-link {{( Route::is('admin.manage_currency') || Route::is('admin.edit_currency') ) ?'active':''}}">Manage Currency</a>
                </li>
                {{-- <li class="sub-item"><a href="{{ route('admin.all_year_package') }}" class="sub-link {{(Route::is('admin.all_year_package') || Route::is('admin.edit_year_package')) ?'active':''}}">Yearly Package</a>
                </li>
                <li class="sub-item"><a href="{{ route('package.index') }}" class="sub-link {{(Route::is('package.index') || Route::is('package.edit')) ?'active':''}}">All Package</a>
                </li> --}}


            </ul>

        </li><!-- package-menu-item -->



        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Withdrawal Request</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('backend.manage_withdrawal_request') );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>

                <li class="sub-item"><a href="{{ route('backend.manage_withdrawal_request') }}" class="sub-link {{( Route::is('backend.manage_withdrawal_request')) ?'active':''}}">Manage Withdrawal</a>
                </li>
                {{-- <li class="sub-item"><a href="{{ route('admin.manage_currency') }}" class="sub-link {{( Route::is('admin.manage_currency') || Route::is('admin.edit_currency') ) ?'active':''}}">Manage Currency</a>
                </li> --}}



            </ul>

        </li><!-- package-menu-item -->

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.package.order.manage') }}" class="br-menu-link {{ Route::is('admin.package.order.manage') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Package Subscription</span>
            </a><!-- br-menu-link -->
        </li> --}}

        <li class="br-menu-item">
            <a href="{{ route('admin.subscriber.index') }}" class="br-menu-link {{ Route::is('admin.subscriber.index') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-heart tx-26"></i>
                <span class="menu-item-label">Subscribers</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->

         {{-- <li class="br-menu-item">
            <a href="{{ route('blog.comments') }}" class="br-menu-link {{(Route::is('blog.comments')) ?'show-sub':'' }}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Blog Comments</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Event Contact -item --> --}}

        <li class="br-menu-item">
            <a href="{{ route('user.contact.index') }}" class="br-menu-link {{(Route::is('user.contact.index')) ?'show-sub':'' }}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">User Contact Massage</span>
            </a><!-- br-menu-link -->
        </li><!-- br-User Contact-item -->

        <li class="br-menu-item">
            <a href="{{ route('admin.all.notification.index') }}" class="br-menu-link">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">All Notification</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->

        {{-- <li class="br-menu-item">
            <a href="{{ route('backend.home_content') }}" class="br-menu-link {{(Route::is('backend.home_content')) ?'show-sub':'' }}">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Landing Page Setup</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item --> --}}




        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin/role')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Role Management</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.role.index') || Route::is('admin.role.create') || Route::is('admin.role.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif >

                <li class="sub-item"><a href="{{ route('admin.role.create') }}" class="sub-link {{( Route::is('admin.role.create')) ?'active':''}}">Add New Role</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.role.index') }}" class="sub-link {{( Route::is('admin.role.index') || Route::is('admin.role.edit') ) ?'active':''}}">Manage Role</a>
                </li>
            </ul>

        </li> --}}




        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Appearance</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('backend.theme-options') || Route::is('backend.home_content') || Route::is('admin.about_page') || Route::is('all-pages.index') || Route::is('admin.learner') || Route::is('admin.instructor') || Route::is('admin.library') || Route::is('admin.maestor_class') || Route::is('admin.manage_faq') ||Route::is('home-banner.create') || Route::is('home-banner.index') || Route::is('home-banner.edit') ) ?'active':'';
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('backend.theme-options') }}" class="sub-link {{( Route::is('backend.theme-options')) ?'active':''}}">Theme option</a>
                </li>
                {{-- <li class="sub-item"><a href="{{ route('admin.coupon.index') }}" class="sub-link {{(Route::is('admin.coupon.index') || Route::is('admin.coupon.edit')) ?'active':''}}">Manage Coupon</a>
                </li> --}}
                <li class="sub-item"><a href="{{ route('backend.home_content') }}" class="sub-link {{(Route::is('backend.home_content') ) ?'active':''}}">Home Content Setup</a>

                <li class="sub-item"><a href="{{ route('home-banner.create') }}" class="sub-link {{( Route::is('home-banner.create') ) ?'active':''}}">Add New Banner</a>
                </li>
                <li class="sub-item"><a href="{{ route('home-banner.index') }}" class="sub-link {{(Route::is('home-banner.index') || Route::is('home-banner.edit')) ?'active':''}}">Manage Banner</a>
                </li>

                {{-- <li class="sub-item">
                    @php
                        $r_check = ( Route::is('admin.event.banner.create') || Route::is('admin.event.banner.index') || Route::is('admin.event.banner.edit') ) ?'active':'';
                    @endphp
                     <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                        <span class="menu-item-label">Add</span>
                    </a>
                    <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                        <li class="sub-item"><a href="{{ route('admin.event.banner.create') }}" class="sub-link {{( Route::is('admin.event.banner.create') ) ?'active':''}}">Add New Event Banner</a>
                        </li>
                        <li class="sub-item"><a href="{{ route('admin.event.banner.index') }}" class="sub-link {{(Route::is('admin.event.banner.index') || Route::is('admin.event.banner.edit')) ?'active':''}}">Manage Event Banner</a>
                        </li>
                    </ul>
                </li> --}}


            <li class="sub-item">
                @php
                    $r_check = ( Route::is('admin.about_page') || Route::is('admin.learner') || Route::is('all-pages.index') || Route::is('admin.instructor') || Route::is('admin.library') || Route::is('admin.maestor_class') || Route::is('admin.manage_faq') ) ?'active':'';
                @endphp
                 <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                    <span class="menu-item-label">Page Setup</span>
                </a>
                <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                    <li class="sub-item"><a href="{{ Route('admin.about_page') }}" class="sub-link {{ (Route::is('admin.about_page'))? 'active':'' }}">About Page</a></li>
                    <li class="sub-item"><a href="{{ Route('admin.learner') }}" class="sub-link {{ (Route::is('admin.learner'))? 'active':'' }}">Learner Page</a></li>
                    <li class="sub-item"><a href="{{ Route('admin.instructor') }}" class="sub-link {{ (Route::is('admin.instructor'))? 'active':'' }}">Instructor Page</a></li>
                    <li class="sub-item"><a href="{{ Route('admin.library') }}" class="sub-link {{ (Route::is('admin.library'))? 'active':'' }}">Library Page</a></li>
                    <li class="sub-item"><a href="{{ Route('admin.maestor_class') }}" class="sub-link {{ (Route::is('admin.maestor_class'))? 'active':'' }}">Maestor Class Page</a></li>
                    <li class="sub-item"><a href="{{ Route('admin.manage_faq') }}" class="sub-link {{ (Route::is('admin.manage_faq'))? 'active':'' }}">FAQ Page</a></li>
                    <li class="sub-item"><a href="{{ Route('all-pages.index') }}" class="sub-link {{ (Route::is('all-pages.index'))? 'active':'' }}">Others Page Manage</a></li>
                </ul>
            </li>





            </ul>
        </li><!-- br-Coupon-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Founder & Co-Founder</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.founder.create') || Route::is('admin.founder.index') || Route::is('admin.founder.edit') );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.founder.create') }}" class="sub-link {{( Route::is('admin.founder.create') ) ?'active':''}}">Add Founder or Co-Founder</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.founder.index') }}" class="sub-link {{(Route::is('admin.founder.index') || Route::is('admin.founder.edit')) ?'active':''}}">Manage Founder Co-Founder</a>
                </li>
            </ul>
        </li><!-- br-Coupon-item -->





















    </ul><!-- br-sideleft-menu -->

    {{-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label> --}}

  <br>
</div><!-- br-sideleft -->
