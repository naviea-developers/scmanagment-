
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      {{-- <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div> --}}
      <ul class="app-menu">

        @if(session()->get('userRole') == 'student')
            <li class="app-menu-active-top"><a class="app-menu__item active" href="{{ route('student_profile') }}"><i class="app-menu__icon fa-duotone fa-user"></i><span class="app-menu__label">Profile</span></a></li>
        @endif
        
        @if(session()->get('userRole') == 'teacher')
            <li class="app-menu-active-top"><a class="app-menu__item active" href="{{ route('teacher_profile') }}"><i class="app-menu__icon fa-duotone fa-user"></i><span class="app-menu__label">Profile</span></a></li>
            
        @endif
{{--
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-list"></i><span class="app-menu__label">Course & Subject</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>Subject</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>Course</a></li>
          </ul>
        </li> --}}
        
        @if(session()->get('userRole') == 'student')
        
            <li class="treeview"><a class="app-menu__item" href="{{ route('viewCourse') }}"><i class="app-menu__icon fa-duotone fa-list"></i><span class="app-menu__label">Course</span></a>
        
        
            <li class="treeview">
                <a class="app-menu__item" href="{{ route('viewSubject') }}"><i class="app-menu__icon fa-duotone fa-bars"></i><span class="app-menu__label">Subject</span></a>
            </li>
            
        @endif
        
        @if(session()->get('userRole') == 'teacher')
        
        <li class="treeview">
                <a class="app-menu__item" href="{{ route('classesForThisTeacher') }}"><i class="app-menu__icon fa-duotone fa-bars"></i><span class="app-menu__label">Class</span></a>
        </li>
        
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('addHomeworkByTeacher') }}"><i class="app-menu__icon fa-duotone fa-bars"></i><span class="app-menu__label">Add Homework</span></a>
        </li>
        
        @endif
        
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-hexagon-check"></i><span class="app-menu__label">Exams</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="/exam/weekly Exam"><i class="icon fa fa-circle-o"></i>Weekly Exam</a></li>
                <li><a class="treeview-item" href="/exam/Monthly Exam"><i class="icon fa fa-circle-o"></i>Monthly Exam</a></li>
                <li><a class="treeview-item" href="/exam/First Periodic"><i class="icon fa fa-circle-o"></i>First Periodic</a></li>
                <li><a class="treeview-item" href="/exam/Second Periodic"><i class="icon fa fa-circle-o"></i>Second Periodic</a></li>
                <li><a class="treeview-item" href="/exam/Third Periodic"><i class="icon fa fa-circle-o"></i>Third Periodic</a></li>
                <li><a class="treeview-item" href="/exam/Semester Exam"><i class="icon fa fa-circle-o"></i>Semester Exam</a></li>
                <li><a class="treeview-item" href="/exam/Mid Term"><i class="icon fa fa-circle-o"></i>Mid Term</a></li>
                <li><a class="treeview-item" href="/exam/Yearly Exam"><i class="icon fa fa-circle-o"></i>Yearly Exam</a></li>
                <li><a class="treeview-item" href="/exam/Model Test"><i class="icon fa fa-circle-o"></i>Model Test</a></li>
                <li><a class="treeview-item" href="/exam/Final Test"><i class="icon fa fa-circle-o"></i>Final Test</a></li>
                <li><a class="treeview-item" href="/exam/Quiz"><i class="icon fa fa-circle-o"></i>Quiz</a></li>
                <li><a class="treeview-item dropdown" href="/exam/Lab"><i class="icon fa fa-circle-o"></i>Lab<i class="dropbtn fa fa-angle-right ml-auto"></i></a>
                </li>
            </ul>
          </li>
          <li class="treeview"><a  class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-file"></i><span class="app-menu__label">Result</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="/showStudentResult/Weekly-Exam"><i class="icon fa fa-circle-o"></i>Weekly Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Monthly-Exam"><i class="icon fa fa-circle-o"></i>Monthly Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/First-Periodic-Exam"><i class="icon fa fa-circle-o"></i>First Periodic Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Second-Periodic-Exam"><i class="icon fa fa-circle-o"></i>Second Periodic Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Third-Periodic-Exam"><i class="icon fa fa-circle-o"></i>Third Periodic Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Semester-Exam"><i class="icon fa fa-circle-o"></i>Semester Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Mid-Term-Exam<"><i class="icon fa fa-circle-o"></i>Mid Term Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Lab-Exam "><i class="icon fa fa-circle-o"></i>Lab Result </a></li>
                <li><a class="treeview-item" href="/showStudentResult/Yearly Exam"><i class="icon fa fa-circle-o"></i>Yearly Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Final Test Exam"><i class="icon fa fa-circle-o"></i>Final Test Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Model Test Exam"><i class="icon fa fa-circle-o"></i>Model Test Result</a></li>
                <li><a class="treeview-item" href="/showStudentResult/Quiz"><i class="icon fa fa-circle-o"></i>Quiz</a></li>

            </ul>
        </li>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-bell"></i><span class="app-menu__label">Notice</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="/showNoticeStudent/Daily-Notice"><i class="icon fa fa-circle-o"></i>Daily Notice </a></li>
                <li><a class="treeview-item" href="/showNoticeStudent/Monthly-Notice"><i class="icon fa fa-circle-o"></i>Monthly Notice </a></li>
                <li><a class="treeview-item" href="/showNoticeStudent/Yearly-Notice"><i class="icon fa fa-circle-o"></i>Yearly Notice</a></li>
                <li><a class="treeview-item" href="/showNoticeStudent/Instant-Notice"><i class="icon fa fa-circle-o"></i>Instant Notice</a></li>
            </ul>
        </li>

        <!--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-file"></i><span class="app-menu__label">IT Education</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Web Design"><i class="icon fa fa-circle-o"></i>Web Design</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Web Development"><i class="icon fa fa-circle-o"></i>Web Development</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/App Design"><i class="icon fa fa-circle-o"></i>App Design</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/App Development"><i class="icon fa fa-circle-o"></i>App Development</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Software Design"><i class="icon fa fa-circle-o"></i>Software Design</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Software Development"><i class="icon fa fa-circle-o"></i>Software Development</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Digital Marketing"><i class="icon fa fa-circle-o"></i>Digital Marketing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/SEO Marketing"><i class="icon fa fa-circle-o"></i>SEO Marketing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Video Editing"><i class="icon fa fa-circle-o"></i>Video Editing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Data Science Engineering"><i class="icon fa fa-circle-o"></i>Data Science Engineering</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Content Writing"><i class="icon fa fa-circle-o"></i>Content Writing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/CCN HACKING"><i class="icon fa fa-circle-o"></i>CCN HACKING</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Cyber Security"><i class="icon fa fa-circle-o"></i>Cyber Security</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-bell"></i><span class="app-menu__label">Proficiency Courses</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/IELTS"><i class="icon fa fa-circle-o"></i>IELTS</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/TOFFEL"><i class="icon fa fa-circle-o"></i>TOFFEL</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/English Spoken & Writing"><i class="icon fa fa-circle-o"></i>English Spoken & Writing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Travelling and Tourism Management"><i class="icon fa fa-circle-o"></i>Travelling and Tourism Management</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/University Admission Coaching"><i class="icon fa fa-circle-o"></i>University Admission Coaching</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <!--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-duotone fa-bell"></i><span class="app-menu__label">Foreign Education</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
        <!--    <ul class="treeview-menu">-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Student Visa Processing"><i class="icon fa fa-circle-o"></i>Student Visa Processing</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Educational Meditation"><i class="icon fa fa-circle-o"></i>Educational Meditation</a></li>-->
        <!--        <li><a class="treeview-item" href="/showTitlewiseCourse/Travelling and Tourism Management"><i class="icon fa fa-circle-o"></i>Travelling and Tourism Management</a></li>-->
        <!--    </ul>-->
        <!--</li>-->
        <li class="treeview"><a class="app-menu__item" href="{{ route('paymentDetails') }}"><i class="app-menu__icon fa-duotone fa-memo-circle-info"></i><span class="app-menu__label">Payment Details</span></a>
      </ul>
    </aside>

