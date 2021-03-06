<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search.">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="{{url('/admin').'#/home'}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        <!-- <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>User Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/user/add')}}">Add User</a>
                </li>
                <li>
                    <a href="{{url('/user/manage')}}">Manage User</a>
                </li>
            </ul> -->
            <!-- /.nav-second-level -->
        <!-- </li> -->
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Category Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <router-link to="/category/add" class="nav-link"> Category Add</router-link>
                </li>
                <li>
                    <router-link to="/category/list" class="nav-link"> Category List</router-link>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Manufacturer info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <router-link to="/manufacturer/Add" class="nav-link"> manufacturer Add</router-link>
                </li>
                <li>
                    <router-link to="/manufacturer/list" class="nav-link"> manufacturer List</router-link>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Product info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <router-link to="/product/add" class="nav-link"> product Add</router-link>
                </li>
                <li>
                    <router-link to="/product/list" class="nav-link"> product List</router-link>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <!-- <li>
            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="panels-wells.html">Panels and Wells</a>
                </li>
                <li>
                    <a href="buttons.html">Buttons</a>
                </li>
                <li>
                    <a href="notifications.html">Notifications</a>
                </li>
                <li>
                    <a href="typography.html">Typography</a>
                </li>
                <li>
                    <a href="icons.html"> Icons</a>
                </li>
                <li>
                    <a href="grid.html">Grid</a>
                </li>
            </ul>
            /.nav-second-level -->
       <!--  </li>
        <li>
            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                    </ul> -->
                    <!-- /.nav-third-level -->
                <!-- </li>
            </ul> -->
            <!-- /.nav-second-level -->
        <!-- </li>
        <li>
            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="blank.html">Blank Page</a>
                </li>
                <li>
                    <a href="login.html">Login Page</a>
                </li>
            </ul> -->
            <!-- /.nav-second-level -->
        <!-- </li> -->
    </ul>
</div>
