
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



        @php
        $admissions = \App\Models\Admission::where('is_new', 1)->get();
        $updateStudentInfoRequest = \App\Models\StudentInfoUpdate::where('status', 0)->get();
        $requestedAlumni = \App\Models\User::where('is_alumni', 0)->where('type', 9)->get();
        @endphp

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">School Management</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.class.create') ||  Route::is('admin.class.index') || Route::is('admin.class.edit')
            || Route::is('admin.subject.create') ||  Route::is('admin.subject.index') || Route::is('admin.subject.edit')
            || Route::is('admin.lession.create') ||  Route::is('admin.lession.index') || Route::is('admin.lession.edit')
            || Route::is('admin.syllabus.create') ||  Route::is('admin.syllabus.index') || Route::is('admin.syllabus.edit')
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
            || Route::is('admin.notice_type.create') ||  Route::is('admin.notice_type.index') || Route::is('admin.notice_type.edit')
            || Route::is('admin.notice.create') ||  Route::is('admin.notice.index') || Route::is('admin.notice.edit')
            || Route::is('admin.gallery.create') ||  Route::is('admin.gallery.index') || Route::is('admin.gallery.edit')
            || Route::is('admin.fee.create') ||  Route::is('admin.fee.index') || Route::is('admin.fee.edit')
            || Route::is('admin.fee_management.create') ||  Route::is('admin.fee_management.index') || Route::is('admin.fee_management.edit')
            || Route::is('admin.admission.create') ||  Route::is('admin.admission.index') || Route::is('admin.admission.edit')
            || Route::is('admin.admit.create') ||  Route::is('admin.admit.index') || Route::is('admin.admit.edit')
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
                <li class="sub-item"><a href="{{ route('admin.lession.index') }}" class="sub-link {{(Route::is('admin.lession.index') || Route::is('admin.lession.edit') || Route::is('admin.lession.create')) ?'active':''}}">Manage Lession</a></li>
                <li class="sub-item"><a href="{{ route('admin.syllabus.index') }}" class="sub-link {{(Route::is('admin.syllabus.index') || Route::is('admin.syllabus.edit') || Route::is('admin.syllabus.create')) ?'active':''}}">Manage Syllabus</a></li>
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
                <li class="sub-item"><a href="{{ route('admin.notice_type.index') }}" class="sub-link {{(Route::is('admin.notice_type.index') || Route::is('admin.notice_type.edit') || Route::is('admin.notice_type.create')) ?'active':''}}">Manage Notice Type</a></li>
                <li class="sub-item"><a href="{{ route('admin.notice.index') }}" class="sub-link {{(Route::is('admin.notice.index') || Route::is('admin.notice.edit') || Route::is('admin.notice.create')) ?'active':''}}">Manage Notice</a></li>
                <li class="sub-item"><a href="{{ route('admin.id_card.create') }}" class="sub-link {{(Route::is('admin.id_card.create')) ?'active':''}}">ID Card</a></li>
                <li class="sub-item"><a href="{{ route('admin.admit.create') }}" class="sub-link {{(Route::is('admin.admit.create')) ?'active':''}}">Admit Card</a></li>
                <li class="sub-item"><a href="{{ route('admin.marksheet.create') }}" class="sub-link {{(Route::is('admin.marksheet.create')) ?'active':''}}">Marksheet</a></li>
                <li class="sub-item"><a href="{{ route('admin.admission.index') }}" class="sub-link {{(Route::is('admin.admission.index') || Route::is('admin.admission.edit')) ?'active':''}}">Manage Admission ({{ $admissions->count() }})</a></li>
               
            </ul>
        </li><!-- br-Speakers-item -->
         <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">HR & PAYROLL</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = (Route::is('report.attendance') || Route::is('report.salary_sheet') || Route::is('report.emp_leave') || Route::is('report.emp_bonus') || Route::is('manageAttendance') || Route::is('allEmployee') || Route::is('monthManage.view') || Route::is('holiday.view') || Route::is('manageSalary') || Route::is('addSalary') || Route::is('editSalary') || Route::is('bonuspay.view') || Route::is('bonuspay.search') || Route::is('emploan.view') || Route::is('shiftManage.view') || Route::is('leaveApplication.view') || Route::is('leaveType.view') || Route::is('leavePart.view') || Route::is('leaveTagline.view') || Route::is('managePayroll') || Route::is('addPayroll') || Route::is('editPayroll') || Route::is('manageAbsent') || Route::is('addAbsent') || Route::is('editAbsent') || Route::is('manageLateRoll') || Route::is('addLateRoll') || Route::is('editLateRoll') || Route::is('manageOvertime') || Route::is('addOvertime') || Route::is('editOvertime') || Route::is('managePaymentRange') );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('manageAttendance') }}" class="sub-link {{(Route::is('manageAttendance') ) ?'active':''}}">Manage Attendance</a></li>
                <li class="sub-item"><a href="{{ route('manageSalary') }}" class="sub-link {{(Route::is('manageSalary') || Route::is('addSalary') || Route::is('editSalary')) ?'active':''}}">Manage Salary</a></li>


                <li class="sub-item"><a href="{{ route('bonuspay.view') }}" class="sub-link {{(Route::is('bonuspay.view') || Route::is('bonuspay.search') ) ?'active':''}}">Manage Bounus</a></li>

                {{-- <li class="sub-item"><a href="{{ route('emploan.view') }}" class="sub-link {{(Route::is('emploan.view')) ?'active':''}}">Manage Loan</a></li> --}}

                <li class="sub-item"><a href="{{ route('shiftManage.view') }}" class="sub-link {{(Route::is('shiftManage.view')) ?'active':''}}">Manage Shift</a></li>
                
                <li class="sub-item"><a href="{{ route('leaveApplication.view') }}" class="sub-link {{(Route::is('leaveApplication.view')) ?'active':''}}">Manage Leave</a></li>
                
                <li class="sub-item"><a href="{{ route('leaveType.view') }}" class="sub-link {{(Route::is('leaveType.view')) ?'active':''}}">Manage Leave Type</a></li>
                
                <li class="sub-item"><a href="{{ route('leavePart.view') }}" class="sub-link {{(Route::is('leavePart.view')) ?'active':''}}">Manage Leave Part</a></li>
                
                <li class="sub-item"><a href="{{ route('leaveTagline.view') }}" class="sub-link {{(Route::is('leaveTagline.view')) ?'active':''}}">Manage Leave Tagline</a></li>
                
                <li class="sub-item"><a href="{{ route('managePayroll') }}" class="sub-link {{(Route::is('managePayroll') || Route::is('addPayroll') || Route::is('editPayroll')) ?'active':''}}">Payroll Settings</a></li>
                
                <li class="sub-item"><a href="{{ route('manageAbsent') }}" class="sub-link {{(Route::is('manageAbsent') || Route::is('addAbsent') || Route::is('editAbsent')) ?'active':''}}">Absent Settings</a></li>
                
                <li class="sub-item"><a href="{{ route('manageLateRoll') }}" class="sub-link {{(Route::is('manageLateRoll') || Route::is('addLateRoll') || Route::is('editLateRoll')) ?'active':''}}">Late Roll Settings</a></li>

                <li class="sub-item"><a href="{{ route('manageOvertime') }}" class="sub-link {{(Route::is('manageOvertime') || Route::is('addOvertime') || Route::is('editOvertime')) ?'active':''}}">Overtime Settings</a></li>

                <li class="sub-item"><a href="{{ route('managePaymentRange') }}" class="sub-link {{(Route::is('managePaymentRange')) ?'active':''}}">Manage Payment Range</a></li>

                <li class="sub-item"><a href="{{ route('monthManage.view') }}" class="sub-link {{(Route::is('monthManage.view') ) ?'active':''}}">Manage Month</a></li>

                <li class="sub-item"><a href="{{ route('holiday.view') }}" class="sub-link {{(Route::is('holiday.view') ) ?'active':''}}">Manage Holiday</a></li>
                
                <li class="sub-item">
                    @php
                        $r_check = ( Route::is('report.attendance') || Route::is('report.salary_sheet') || Route::is('report.emp_leave') || Route::is('report.emp_bonus') ) ?'active':'';
                    @endphp
                    <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                        <span class="menu-item-label">Reports</span>
                    </a>
                    <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                        <li class="sub-item"><a href="{{ Route('report.attendance') }}" class="sub-link {{ (Route::is('report.attendance'))? 'active':'' }}">Attendance Report</a></li>
                        <li class="sub-item"><a href="{{ Route('report.salary_sheet') }}" class="sub-link {{ (Route::is('report.salary_sheet'))? 'active':'' }}">Sallary Report</a></li>
                        <li class="sub-item"><a href="{{ Route('report.emp_leave') }}" class="sub-link {{ (Route::is('report.emp_leave'))? 'active':'' }}">Leave Report</a></li>
                        <li class="sub-item"><a href="{{ Route('report.emp_bonus') }}" class="sub-link {{ (Route::is('report.emp_bonus'))? 'active':'' }}">Bonus Report</a></li>
                    </ul>
                </li>

            </ul>
        </li><!-- br-hr-payroll -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Accounts</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('fee_collection.index') || Route::is('balance_sheet') || Route::is('trail_balance') || Route::is('ledger_summary') || Route::is('profit_loss') || Route::is('account_head.index') || Route::is('balance_account.index') || Route::is('payment_method.index') || Route::is('expense.index') || Route::is('expense_category.index'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('account_head.index') }}" class="sub-link {{(Route::is('account_head.index')) ?'active':''}}">Account Head</a></li>

                <li class="sub-item"><a href="{{ route('balance_account.index') }}" class="sub-link {{(Route::is('balance_account.index')) ?'active':''}}">Bank Account</a></li>

                <li class="sub-item"><a href="{{ route('payment_method.index') }}" class="sub-link {{(Route::is('payment_method.index')) ?'active':''}}">Payment Method</a></li>

                <li class="sub-item"><a href="{{ route('fee_collection.index') }}" class="sub-link {{(Route::is('fee_collection.index')) ?'active':''}}">Manage Fee Collection</a></li>
                <li class="sub-item"><a href="{{ route('expense.index') }}" class="sub-link {{(Route::is('expense.index')) ?'active':''}}">Manage Expense</a></li>

                <li class="sub-item"><a href="{{ route('expense_category.index') }}" class="sub-link {{(Route::is('expense_category.index')) ?'active':''}}">Expense Category</a></li>
                <li class="sub-item">
                    @php
                        $r_check = ( Route::is('balance_sheet') || Route::is('trail_balance') || Route::is('ledger_summary') || Route::is('profit_loss') ) ?'active':'';
                    @endphp
                    <a href="#" class="br-menu-sub-link with-sub {{ $r_check ?'show-sub':''}}">
                        <span class="menu-item-label">Reports</span>
                    </a>
                    <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                        <li class="sub-item"><a href="{{ Route('balance_sheet') }}" class="sub-link {{ (Route::is('balance_sheet'))? 'active':'' }}">Balance Sheet</a></li>
                        <li class="sub-item"><a href="{{ Route('trail_balance') }}" class="sub-link {{ (Route::is('trail_balance'))? 'active':'' }}">Trail Balance</a></li>
                        <li class="sub-item"><a href="{{ Route('ledger_summary') }}" class="sub-link {{ (Route::is('ledger_summary'))? 'active':'' }}">Ledger Summary</a></li>
                        <li class="sub-item"><a href="{{ Route('profit_loss') }}" class="sub-link {{ (Route::is('profit_loss'))? 'active':'' }}">Profit & Loss</a></li>
                    </ul>
                </li>
            </ul>
        </li><!-- br-account -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Library Management</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.direction.create') ||  Route::is('admin.direction.index') || Route::is('admin.direction.edit')
            || Route::is('admin.shelf.create') ||  Route::is('admin.shelf.index') || Route::is('admin.shelf.edit')
            || Route::is('admin.book.create') ||  Route::is('admin.book.index') || Route::is('admin.book.edit')
            || Route::is('admin.book_delivery.create') ||  Route::is('admin.book_delivery.index') || Route::is('admin.book_delivery.edit')
            );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.direction.index') }}" class="sub-link {{(Route::is('admin.direction.index') || Route::is('admin.direction.edit') || Route::is('admin.direction.create')) ?'active':''}}">Manage Direction</a></li>
                <li class="sub-item"><a href="{{ route('admin.shelf.index') }}" class="sub-link {{(Route::is('admin.shelf.index') || Route::is('admin.shelf.edit') || Route::is('admin.shelf.create')) ?'active':''}}">Manage shelf</a></li>
                <li class="sub-item"><a href="{{ route('admin.book.index') }}" class="sub-link {{(Route::is('admin.book.index') || Route::is('admin.book.edit') || Route::is('admin.book.create')) ?'active':''}}">Manage Book</a></li>
                <li class="sub-item"><a href="{{ route('admin.book_delivery.index') }}" class="sub-link {{(Route::is('admin.book_delivery.index') || Route::is('admin.book_delivery.edit') || Route::is('admin.book_delivery.create')) ?'active':''}}">Manage Book Delivery</a></li>
            </ul>
        </li><!-- br-Speakers-item -->





        <li class="br-menu-item">
            <a href="{{ route('admin.daily_class.index') }}" class="br-menu-link {{ Route::is('admin.daily_class.index') ? "active" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Daily CLass</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->





        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'daily_class')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Daily CLass</span>
            </a>
            @php
            $r_check = ( Route::is('admin.daily_class.create') ||  Route::is('admin.daily_class.index') || Route::is('admin.daily_class.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.daily_class.create') }}" class="sub-link {{( Route::is('admin.daily_class.create') ) ?'active':''}}">Add Daily Class</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.daily_class.index') }}" class="sub-link {{(Route::is('admin.daily_class.index') || Route::is('admin.daily_class.edit')) ?'active':''}}">Manage Daily Class</a>
                </li>
            </ul>
        </li> --}}



        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Teacher</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('Manage Designation') || Route::is('admin.teacher.index') || Route::is('admin.teacher.edit') || Route::is('admin.designation.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                {{-- <li class="sub-item"><a href="{{ route('admin.teacher.create') }}" class="sub-link {{( Route::is('admin.teacher.create') ) ?'active':''}}">Add New Teacher</a>
                </li> --}}
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
            $r_check = ( Route::is('admin.school_student.create') ||  Route::is('admin.school_student.index') 
            || Route::is('admin.school_student.edit') || Route::is('admin.student_info_update.index')
            || Route::is('admin.student_info_update.edit')
            );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.school_student.create') }}" class="sub-link {{( Route::is('admin.school_student.create') ) ?'active':''}}">Add New Student</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.school_student.index') }}" class="sub-link {{(Route::is('admin.school_student.index') || Route::is('admin.school_student.edit')) ?'active':''}}">Manage Student</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.student_info_update.index') }}" class="sub-link {{(Route::is('admin.student_info_update.index') || Route::is('admin.student_info_update.edit')) ?'active':''}}">Student Update Request ({{ $updateStudentInfoRequest->count() }})</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item -->




        <li class="br-menu-item">
            <a href="{{ route('admin.topper_student.index') }}" class="br-menu-link {{ Route::is('admin.topper_student.index') ? "active" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Topper Student</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->


{{-- 
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'topper-student')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Topper Student</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('admin.topper_student.create') ||  Route::is('admin.topper_student.index') 
            || Route::is('admin.topper_student.edit') 
            );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.topper_student.create') }}" class="sub-link {{( Route::is('admin.topper_student.create') ) ?'active':''}}">Add New Topper</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.topper_student.index') }}" class="sub-link {{(Route::is('admin.topper_student.index') || Route::is('admin.topper_student.edit')) ?'active':''}}">Manage Topper</a>
                </li>
            </ul>
        </li><!-- br-Speakers-item --> --}}



        <li class="br-menu-item">
            <a href="{{ route('admin.staff.index') }}" class="br-menu-link {{ Route::is('admin.staff.index') ? "active" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Staff</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->



        {{-- <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Staff</span>
            </a>
            @php
            $r_check = ( Route::is('admin.staff.create') ||  Route::is('admin.staff.index') || Route::is('admin.staff.edit'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('admin.staff.create') }}" class="sub-link {{( Route::is('admin.staff.create') ) ?'active':''}}">Add New Staff</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.staff.index') }}" class="sub-link {{(Route::is('admin.staff.index') || Route::is('admin.staff.edit')) ?'active':''}}">Manage Staff</a>
                </li>
            </ul>
        </li> --}}


        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'active':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Alumni</span>
            </a>
            @php
            $r_check = ( Route::is('admin.alumni.create') ||  Route::is('admin.alumni.index') || Route::is('admin.alumni.edit') || Route::is('admin.requested_alumni.index'));
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                {{-- <li class="sub-item"><a href="{{ route('admin.alumni.create') }}" class="sub-link {{( Route::is('admin.alumni.create') ) ?'active':''}}">Add New Alumni</a>
                </li> --}}
                <li class="sub-item"><a href="{{ route('admin.alumni.index') }}" class="sub-link {{(Route::is('admin.alumni.index') || Route::is('admin.alumni.edit')) ?'active':''}}">Manage Alumni</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.requested_alumni.index') }}" class="sub-link {{(Route::is('admin.requested_alumni.index') || Route::is('admin.alumni.edit')) ?'active':''}}">Requested Alumni ({{ $requestedAlumni->count() }})</a>
                </li>
            </ul>
        </li>







        <li class="br-menu-item">
            <a href="{{ route('admin.ebook.index') }}" class="br-menu-link {{ Route::is('admin.ebook.index') ? "active" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">E-Book</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->






{{-- 
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
                        <span class="menu-item-label">City</span>
                    </a>
                    <ul class="br-menu-sub br-menu-sub-sub" @if($r_check) style="display: block"@endif>
                        <li class="sub-item"><a href="{{ route('city.create') }}" class="sub-link {{( Route::is('city.create') ) ?'active':''}}">Add New City</a>
                        </li>
                        <li class="sub-item"><a href="{{ route('city.index') }}" class="sub-link {{(Route::is('city.index') || Route::is('city.edit')) ?'active':''}}">Manage Cities</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li><!-- medical-torism-menu-item -->


        {{-- <li class="br-menu-item">
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
        </li><!-- br-Coupon-item --> --}}


        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{($prefix == 'admin')?'show-sub':''}} ">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">All User</span>
            </a><!-- br-menu-link -->
            @php
            $r_check = ( Route::is('backend.create_admin') ||  Route::is('backend.manage_admin') || Route::is('backendog.edit_admin')
           
            );
            @endphp
            <ul class="br-menu-sub" @if($r_check) style="display: block"@endif>
                <li class="sub-item"><a href="{{ route('backend.create_admin') }}" class="sub-link {{( Route::is('backend.create_admin') ) ?'active':''}}">Add New Admin</a>
                </li>
                <li class="sub-item"><a href="{{ route('backend.manage_admin') }}" class="sub-link {{(Route::is('backend.manage_admin') || Route::is('backendog.edit_admin')) ?'active':''}}">Manage Admins</a>
                </li>

                {{-- <li class="sub-item"><a href="{{ route('admin.teacher.create') }}" class="sub-link {{( Route::is('admin.teacher.create') ) ?'active':''}}">Add New Teacher</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.teacher.index') }}" class="sub-link {{(Route::is('admin.teacher.index') || Route::is('admin.teacher.edit')) ?'active':''}}">Manage Teacher</a>
                </li> --}}

                

                <li class="sub-item"><a href="{{ route('admin.student.create') }}" class="sub-link {{( Route::is('admin.student.create') ) ?'active':''}}">Add New User</a>
                </li>
                <li class="sub-item"><a href="{{ route('admin.student.index') }}" class="sub-link {{(Route::is('admin.student.index') || Route::is('admin.student.edit')) ?'active':''}}">Manage User</a>
                </li>
            </ul>
        </li><!-- br-Teacher-item -->






        <li class="br-menu-item">
            <a href="{{ route('admin.manage_testimonial') }}" class="br-menu-link {{ Route::is('admin.manage_testimonial') ? "active" :""}}">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-26"></i>
                <span class="menu-item-label">Testimonials & Review</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->




        {{-- <li class="br-menu-item">
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
            </ul>
        </li><!-- br-Teacher-item --> --}}



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
            </ul>

        </li><!-- package-menu-item --> --}}



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
            </ul>
        </li><!-- package-menu-item -->

       

        <li class="br-menu-item">
            <a href="{{ route('admin.subscriber.index') }}" class="br-menu-link {{ Route::is('admin.subscriber.index') ? "show-sub" :""}}">
                <i class="menu-item-icon icon ion-heart tx-26"></i>
                <span class="menu-item-label">Subscribers</span>
            </a><!-- br-menu-link -->
        </li><!-- br-Review-item -->

        

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
