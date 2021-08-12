<!-- .nk-sidebar-start -->

<div class="nk-sidebar-element nk-sidebar-head justify-content-center">
    <div class="nk-menu-trigger mr-n2">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                class="icon ni ni-arrow-left"></em></a>
    </div>
</div><!-- .nk-sidebar-element -->
<div class="nk-sidebar-element">
    <div class="nk-sidebar-body" data-simplebar>
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-widget d-none d-xl-block">
                <div class="user-card user-card-s2">
                    <?php if(Auth::user()->profile_path == ''): ?>
                    <div class="user-avatar xl bg-primary">
                        <img src="<?php echo e(asset_url('dashlite/images/avatar/blank.png')); ?>"/>
                        <div class="status dot dot-lg dot-success"></div>
                    </div>
                    <?php else: ?>
                    <div class="user-avatar xl bg-primary">
                        <img src="<?php echo e(profile_path(Auth::user()->profile_path)); ?>"/>
                        <div class="status dot dot-lg dot-success"></div>
                    </div>
                    <?php endif; ?>
                    <div class="user-info">
                        <div class="badge badge-outline-light badge-pill ucap">
                            <?php echo e(Auth()->user()->role); ?>

                        </div>
                        <h5><?php echo e(Auth::user()->name); ?></h5>
                        <span class="sub-text"><?php echo e(Auth::user()->email); ?></span>
                    </div>
                </div>
            </div><!-- .nk-sidebar-widget -->
            <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                    <div class="user-card-wrap">
                        <div class="user-card">
                            <?php if(Auth::user()->profile_path == ''): ?>
                            <div class="user-avatar lg bg-primary">
                                <img src="<?php echo e(asset_url('dashlite/images/avatar/blank.png')); ?>"/>
                                <div class="status dot dot-lg dot-success"></div>
                            </div>
                            <?php else: ?>
                            <div class="user-avatar lg bg-primary">
                                <img src="<?php echo e(profile_path(Auth::user()->profile_path)); ?>"/>
                                <div class="status dot dot-lg dot-success"></div>
                            </div>
                            <?php endif; ?>
                            <div class="user-info">
                                <div class="badge badge-outline-light badge-pill ucap">
                                    <?php echo e(Auth()->user()->role); ?>

                                </div>
                                <h5><?php echo e(Auth::user()->name); ?></h5>
                                <span class="sub-text"><?php echo e(Auth::user()->email); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- .nk-sidebar-widget -->

            <div class="nk-sidebar-menu pt-2">
                <!-- Menu -->
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title">Menu</h6>
                    </li>
                    <?php if(Auth()->user()->isUser()): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('wallet-index')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                            <span class="nk-menu-text">My Wallets</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('myaccount')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">My Account</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth()->user()->isAdmin()): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('admin_dashboard')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link dark-switch">
                            <span class="nk-menu-icon"><em class="icon ni ni-moon"></em></span>
                            <span class="nk-menu-text">Dark Mode</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                            <span class="nk-menu-text">Sign Out</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-body -->
</div><!-- .nk-sidebar-element -->
