<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Program Name
                    </li>

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fa fa-school"></i><span
                                    class="right-nav-text">Grades</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Grades.index') }}">Grades List</a></li>

                        </ul>
                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Classerooms</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Classrooms.index') }}">Classerooms List</a>
                            </li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fa fa-chalkboard"></i><span
                                    class="right-nav-text">Sections</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Sections.index') }}">Sections List</a>
                            </li>
                        </ul>
                    </li>


                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                class="fa fa-user-graduate"></i>Students<div class="pull-right"><i class="ti-plus"></i>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Student_information">Students Informations
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li> <a href="{{ route('Students.create') }}">Add Student</a>
                                    </li>
                                    <li> <a href="{{ route('Students.index') }}">Students List</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Students_upgrade">Students Promotion<div class="pull-right"><i
                                            class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li> <a href="{{ route('Promotion.index') }}">Add Promotion</a>
                                    </li>
                                    <li> <a href="{{ route('Promotion.create') }}">Promotions List</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Graduate students">Graduate Students<div class="pull-right"><i
                                            class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Graduate students" class="collapse">
                                    <li> <a href="{{ route('Graduated.create') }}">Add Graduate</a>
                                    </li>
                                    <li> <a href="{{ route('Graduated.index') }}">Graduate List</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>



                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fa fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">Teachers</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Teachers.index') }}">Teachers List</a>
                            </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fa fa-user-tie"></i><span
                                    class="right-nav-text">Parents</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('/add_parent') }}">Parents List</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fa fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">Counts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Fees.index') }}">Scolar fees</a> </li>
                            <li> <a href="{{ route('Fees_Invoices.index') }}">Invoices</a> </li>
                            <li> <a href="{{ route('receipt_students.index') }}">Receipts Catched</a> </li>
                            <li> <a href="{{ route('ProcessingFee.index') }}">Fee excluded</a> </li>
                            <li> <a href="{{ route('Payment_students.index') }}">Payments Back</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fa fa-calendar-alt"></i><span
                                    class="right-nav-text">Attendace</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('Attendance.index') }}">Sections</a> </li>
                        </ul>
                    </li>
                    {{-- Subjects --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-icon">
                            <div class="pull-left"><i class="fa fa-calendar-alt"></i><span
                                    class="right-nav-text">Subjects</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="subject-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('subjects.index') }}">List Subjects</a> </li>
                            <li> <a href="{{ route('subjects.create') }}">Add Subject</a> </li>
                        </ul>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fa fa-question"></i><span
                                    class="right-nav-text">Quizzes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route("Quizzes.index")}}">List Quizzes</a> </li>
                            <li> <a href="{{route("Quizzes.create")}}">Add Quizze</a> </li>
                            <li> <a href="">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">Library</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">font Awesome</a> </li>
                            <li> <a href="">Themify icons</a> </li>
                            <li> <a href="">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Onlinec lasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fa fa-video-camera"></i><span class="right-nav-text">Online
                                    Classes</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">font Awesome</a> </li>
                            <li> <a href="">Themify icons</a> </li>
                            <li> <a href="">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                            <div class="pull-left"><i class="fa fa-cogs"></i><span
                                    class="right-nav-text">Settings</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">font Awesome</a> </li>
                            <li> <a href="">Themify icons</a> </li>
                            <li> <a href="">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fa fa-users"></i><span
                                    class="right-nav-text">Users</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">font Awesome</a> </li>
                            <li> <a href="">Themify icons</a> </li>
                            <li> <a href="">Weather icons</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->
