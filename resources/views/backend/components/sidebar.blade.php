
<!--sidebar-wrapper-->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{asset('theme/backend/assets/images/logo-icon.png')}}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">HumayunK</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('dashboard')}}">
                <div class="parent-icon icon-color-5"> <i class="bx bxs-dashboard"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Students</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bx bx-circle"></i>Admition</a></li>
                <li> <a href="#"><i class="bx bx-circle"></i>Manage Student</a></li>
                <li> <a href="#"><i class="bx bx-cabinet"></i>Update</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Manage Setup</div>
            </a>
            <ul>
                <li> <a href="{{route('setup.student.class.view')}}"><i class="bx bx-circle"></i>Manage class</a></li>
                <li> <a href="{{route('setup.year.view')}}"><i class="bx bx-circle"></i>Manage year</a></li>
                <li> <a href="{{route('setup.student.group.view')}}"><i class="bx bx-circle"></i>Manage group</a></li>
                <li> <a href="{{route('setup.student.shift.view')}}"><i class="bx bx-circle"></i>Manage shift</a></li>
                <li> <a href="{{route('setup.fee.category.view')}}"><i class="bx bx-circle"></i>Manage fee type</a></li>
                <li> <a href="{{route('setup.fee.amount.view')}}"><i class="bx bx-circle"></i>Manage fee amount</a></li>
                <li> <a href="{{route('setup.exam.type.view')}}"><i class="bx bx-circle"></i>Manage exam type</a></li>
                <li> <a href="{{route('setup.subject.view')}}"><i class="bx bx-circle"></i>Manage subjects</a></li>
                <li> <a href="{{route('setup.subject.assign.view')}}"><i class="bx bx-circle"></i>Manage assign subject</a></li>
                <li> <a href="{{route('setup.designation.view')}}"><i class="bx bx-circle"></i>Manage designation</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Manage Student</div>
            </a>
            <ul>
                <li> <a href="{{route('student.registration.view')}}"><i class="bx bx-circle"></i>Registration</a></li>
                <li> <a href="{{route('student.roll.create')}}"><i class="bx bx-circle"></i>Student roll</a></li>
                <li> <a href="{{route('student.reg.fee')}}"><i class="bx bx-circle"></i>Registration fee</a></li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->
