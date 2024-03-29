<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            @if (auth('web')->check())
                @include('layouts.main-sidebar.admin-main-sidebar')
            @elseif (auth('student')->check())
                @include('layouts.main-sidebar.student-main-sidebar')
            @elseif (auth('teacher')->check())
                @include('layouts.main-sidebar.teacher-main-sidebar')
            @elseif (auth('parent')->check())
                @include('layouts.main-sidebar.parent-main-sidebar')
            @endif
        </div>
