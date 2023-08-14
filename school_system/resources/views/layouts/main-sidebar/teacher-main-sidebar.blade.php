<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Program name </li>

        <li>
            {{-- {{route('sections')}} --}}
            <a href="{{ route('sections') }}"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">Sections</span></a>
        </li>

        <li>
            <a href="{{ route('student.index') }}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">Students</span></a>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">Quizzes</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('quizzes.index')}}">Quizzes</a></li>
                <li><a href="#">Questions</a></li>
            </ul>

        </li>


        <!-- Online classes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">Onlineclasses</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="#">حصص اونلاين مع زوم</a> </li>
                {{-- {{route('online_zoom_classes.index')}} --}}
            </ul>
        </li>



        <!-- sections-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu1">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span class="right-nav-text">Reports</span>
                </div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu1" class="collapse" data-parent="#sidebarnav">
                {{-- {{route('attendance.report')}} --}}
                <li><a href="{{route('attendance.report')}}">Attendance Report</a></li>
                <li><a href="#">Exams Report</a></li>
            </ul>

        </li>

        <!-- الملف الشخصي-->
        <li>
            {{-- {{route('profile.show')}} --}}
            <a href=""><i class="fas fa-id-card-alt"></i><span class="right-nav-text">Profile</span></a>
        </li>

    </ul>
</div>
