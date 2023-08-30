<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="{{ asset('admin/assets/img/basic/logo.png') }}" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                aria-controls="userSettingsCollapse"
                class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="{{ asset('admin/assets/img/dummy/u2.png') }}" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Alexander Pierce</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        {{-- <a href="index.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Change Password</a> --}}
                        <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview"><a href="{{ route('dashboard') }}">
                    <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>SiteInfo</span>
                </a>
            </li>
            <li class="treeview {{ request()->segment(2) == 'courses' ? 'active' : '' }}"><a href="javascript:void(0)">
                    <i class="icon icon icon-package blue-text s-18"></i>
                    <span>Courses</span>

                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('courses.index') }}"><i class="icon icon-circle-o"></i>All Courses</a>
                    </li>
                    <li><a href="{{ route('courses.create') }}"><i class="icon icon-add"></i>Add
                            New </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ request()->segment(2) == 'categories' ? 'active' : '' }}"><a href="javascript:void(0)"><i class="icon icon-account_box light-green-text s-18"></i>Categories
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.index') }}"><i class="icon icon-circle-o"></i>All Categories</a>
                    </li>
                    <li><a href="{{ route('categories.create') }}"><i class="icon icon-add"></i>Add Category</a>
                    </li>
                   
                </ul>
            </li>
            {{-- <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Users<i
                        class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="panel-page-users.html"><i class="icon icon-circle-o"></i>All Users</a>
                    </li>
                    <li><a href="panel-page-users-create.html"><i class="icon icon-add"></i>Add User</a>
                    </li>
                    <li><a href="panel-page-profile.html"><i class="icon icon-user"></i>User Profile </a>
                    </li>
                </ul>
            </li>
            <li class="treeview no-b"><a href="#">
                    <i class="icon icon-package light-green-text s-18"></i>
                    <span>Inbox</span>
                    <span class="badge r-3 badge-success pull-right">20</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="panel-page-inbox.html"><i class="icon icon-circle-o"></i>All Messages</a>
                    </li>
                    <li><a href="panel7-inbox.html"><i class="icon icon-circle-o"></i>Panel7 - Inbox</a>
                    </li>
                    <li><a href="panel8-inbox.html"><i class="icon icon-circle-o"></i>Panel8 - Inbox</a>
                    </li>
                    <li><a href="panel-page-inbox-create.html"><i class="icon icon-add"></i>Compose</a>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </section>
</aside>
