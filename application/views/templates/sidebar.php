<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">SETUP</li>

                <li>
                    <a href="<?= base_url('Dashboard') ?>">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Product') ?>">
                        <i class="mdi mdi-layers-outline"></i>
                        <span> Product </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Mitra') ?>">
                        <i class="mdi mdi-briefcase-check-outline"></i>
                        <span> Mitra </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Company') ?>">
                        <i class="mdi mdi-poll"></i>
                        <span> Company </span>
                    </a>
                </li>

                <li class="menu-title">INPUT</li>

                <li>
                    <a href="#sidebarCrm" data-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Contract </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?= base_url('Ltc') ?>">LTC</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Stc') ?>">STC</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Spot') ?>">SPOT</a>
                            </li>
                            <li>
                                <a href="<?= base_url('Adendum') ?>">ADENDUM</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?= base_url('Invoice') ?>">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> invoice </span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Report') ?>">
                        <i class="mdi mdi-book"></i>
                        <span> Report </span>
                    </a>
                </li>

                <!-- <li>
                    <a href="#">
                        <i class="mdi mdi-history"></i>
                        <span> History </span>
                    </a>
                </li> -->

                <li class="mb-2">
                    <a href="<?= base_url('Auth/logout') ?>">
                        <i class="mdi mdi-logout"></i>
                        <span> Logout </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->