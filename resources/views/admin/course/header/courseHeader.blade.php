<header class="blue accent-3 relative">
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    <i class="icon-package"></i>
                    Courses
                </h4>
            </div>
        </div>
        <div class="row">
            <ul class="nav responsive-tab nav-material nav-material-white">
                <li>
                    <a class="nav-link {{ request()->segment(3) == 'index' ? 'active' : '' }}" href="{{ route('courses.index') }}"><i class="icon icon-list"></i>All
                        Courses</a>
                </li>
                <li>
                    <a class="nav-link {{ request()->segment(3) == 'create' ? 'active' : '' }}" href="{{ route('courses.create') }}"><i class="icon icon-plus-circle"></i> Add
                        New Course</a>
                </li>
                
            </ul>
        </div>
    </div>
</header>