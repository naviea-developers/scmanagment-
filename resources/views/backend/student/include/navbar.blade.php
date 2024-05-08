
<header>
<nav class="app-header"><a class="app-header__logo " href="/">TechknowSity</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item nav-item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="/setting"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            
            @if(session()->get('userRole') == 'student')
                <li><a class="dropdown-item" href="{{ route('student_profile') }}"><i class="app-menu__icon fa-duotone fa-user"></i><span class="app-menu__label">Profile</span></a></li>
            @endif
            
            @if(session()->get('userRole') == 'teacher')
                <li><a class="dropdown-item" href="{{ route('teacher_profile') }}"><i class="app-menu__icon fa-duotone fa-user"></i><span class="app-menu__label">Profile</span></a></li>
            @endif            
            
            <li><a class="dropdown-item" href="{{ route('stdLogout') }}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
</nav>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light nav-custom mt-5">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="margin: 0 auto;margin-left:230px;">
        
         @if(session()->get('userRole') == 'student')
         
         <li class="nav-item">
          <a class="text-white nav-link" href="{{ route('student_profile') }}"><span class="font-weight-bold pl-2">Profile</span></a>
        </li>
         
        <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link " href="{{ route('viewCourse') }}" aria-haspopup="true" aria-expanded="false">
            Course
          </a>
        </li>
        <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  " href="{{ route('viewSubject') }}" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Subject</span>
          </a>
        </li>
        
        @endif
        
         @if(session()->get('userRole') == 'teacher')
         
         <li class="nav-item">
          <a class="text-white nav-link" href="{{ route('teacher_profile') }}"><span class="font-weight-bold pl-2">Profile</span></a>
        </li>
         
         <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  " href="{{ route('classesForThisTeacher') }}" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Class</span>
          </a>
         </li>
         
         <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  " href="{{ route('addHomeworkByTeacher') }}" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Homework</span>
          </a>
         </li>
        
         @endif
         
         <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Exam</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/exam/weekly-Exam">Weekly exam</a>
            <a class="dropdown-item" href="/exam/Monthly-Exam">Monthly Exam</a>
            <a class="dropdown-item" href="/exam/First-Periodic">First periodic</a>
            <a class="dropdown-item" href="/exam/Second-Periodic">Second periodic</a>
            <a class="dropdown-item" href="/exam/Third-Periodic">Third periodic</a>
            <a class="dropdown-item" href="/exam/Semester-Exam">Mid Term</a>
            <a class="dropdown-item" href="/exam/Mid-Term">Semester Exam</a>
            <a class="dropdown-item" href="/exam/Yearly-Exam">Lab</a>
            <a class="dropdown-item" href="/exam/Model-Test">Yearly Exam</a>
            <a class="dropdown-item" href="/exam/Final-Test">Test</a>
            <a class="dropdown-item" href="/exam/Lab">Quiz</a>
          </div>
        </li>
        <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Result</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/showStudentResult/Weekly-Exam">Weekly Result</a>
            <a class="dropdown-item" href="/showStudentResult/Monthly-Exam">Monthly Result</a>
            <a class="dropdown-item" href="/showStudentResult/First-Periodic-Exam">First Periodic Result</a>
            <a class="dropdown-item" href="/showStudentResult/Second-Periodic-Exam">Second Periodic Result</a>
            <a class="dropdown-item" href="/showStudentResult/Third-Periodic-Exam">Third Periodic Result</a>
            <a class="dropdown-item" href="/showStudentResult/Semester-Exam">Semester Result</a>
            <a class="dropdown-item" href="/showStudentResult/Mid-Term-Exam">Mid Term Result</a>
            <a class="dropdown-item" href="/showStudentResult/Lab-Exam">Lab Result</a>
            <a class="dropdown-item" href="/showStudentResult/Yearly-Exam">Yearly Result</a>
            <a class="dropdown-item" href="/showStudentResult/Final-Test-Exam">Final Test Result</a>
            <a class="dropdown-item" href="/showStudentResult/Model-Test-Exam">Model Test Result</a>
            <a class="dropdown-item" href="/showStudentResult/Quiz">Quiz</a>
          </div>
        </li>
        <li class="nav-item dropdown ml-2">
          <a class="text-white nav-link  dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">
            Notice</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/showNoticeStudent/Daily-Notice">Daily Notice</a>
            <a class="dropdown-item" href="/showNoticeStudent/Monthly-Notice">Monthly Notice </a>
            <a class="dropdown-item" href="/showNoticeStudent/Yearly-Notice">Yearly Notice </a>
            <a class="dropdown-item" href="/showNoticeStudent/Instant-Notice">Instant Notice</a>
          </div>
        </li>

    
          <!--<li class="nav-item dropdown ml-2">-->
          <!--  <a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">-->
          <!--    IT Education</span>-->
          <!--  </a>-->
          <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
          <!--    <a class="dropdown-item" href="#">Web Design</a>-->
          <!--    <a class="dropdown-item" href="#">Web Development</a>-->
          <!--    <a class="dropdown-item" href="#">App Design</a>-->
          <!--    <a class="dropdown-item" href="#">App Development</a>-->
          <!--    <a class="dropdown-item" href="#">Software Design</a>-->
          <!--    <a class="dropdown-item" href="#">Software Development</a>-->
          <!--    <a class="dropdown-item" href="#">Digital Marketing</a>-->
          <!--    <a class="dropdown-item" href="#">SEO Marketing</a>-->
          <!--    <a class="dropdown-item" href="#">Video Editing</a>-->
          <!--    <a class="dropdown-item" href="#">Data Science Engineering</a>-->
          <!--    <a class="dropdown-item" href="#">Content Writing</a>-->
          <!--    <a class="dropdown-item" href="#">CCN HACKING</a>-->
          <!--    <a class="dropdown-item" href="#">Cyber Security</a>-->
          <!--  </div>-->
          <!--</li>-->
          <!--<li class="nav-item dropdown ml-2">-->
          <!--  <a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">-->
          <!--    Proficiency Courses</span>-->
          <!--  </a>-->
          <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/IELTS">IELTS</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/TOFFEL">TOFFEL</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/English Spoken & Writing">English Spoken & Writing</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/Travelling and Tourism Management">Travelling and Tourism Management</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/University Admission Coaching">University Admission Coaching</a>-->
          <!--  </div>-->
          <!--</li>-->
          <!--<li class="nav-item dropdown ml-2">-->
          <!--  <a class="text-white nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="font-weight-bold pl-2">-->
          <!--      Foreign Education</span>-->
          <!--  </a>-->
          <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/Student Visa Processing">Student Visa Processing</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/Educational Meditation">Educational Meditation</a>-->
          <!--    <a class="dropdown-item" href="/showTitlewiseCourse/Travelling and Tourism Management">Travelling and Tourism Management</a>-->
          <!--</li>-->

      </ul>
    </div>
  </nav>


