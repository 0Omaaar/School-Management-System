<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/student/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard </span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Program name </li>
k

        <!-- الامتحانات-->
        <li>
            {{-- {{route('student_exams.index')}} --}}
            <a href="{{route('student_exams.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">Exams</span></a>
        </li>


        <!-- Settings-->
        <li>
            {{-- {{route('settings.index')}} --}}
            <a href="{{route('profile-student.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">Profile</span></a>
        </li>

    </ul>
</div>
