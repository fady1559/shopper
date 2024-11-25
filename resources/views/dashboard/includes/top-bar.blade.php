<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('dashboard/assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">{{ __('dashboard/includes/top-bar.logo_text') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="GET" action="{{ route('dashboard.search.products') }}">
            <input type="text" name="query" placeholder="{{ __('dashboard/includes/top-bar.search_placeholder') }}" title="{{ __('dashboard/includes/top-bar.search_title') }}">
            <button type="submit" title="{{ __('dashboard/includes/top-bar.search_title') }}"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        {{ str_replace(':count', 4, __('dashboard/includes/top-bar.notification_header')) }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('dashboard/includes/top-bar.view_all') }}</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <!-- Notifications list -->
                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>{{ __('dashboard/includes/top-bar.notification_title_1') }}</h4>
                            <p>{{ __('dashboard/includes/top-bar.notification_description_1') }}</p>
                            <p>{{ __('dashboard/includes.top-bar.notification_time_1') }}</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <!-- Repeat similar blocks for other notifications -->

                    <li class="dropdown-footer">
                        <a href="#">{{ __('dashboard/includes/top-bar.view_all') }}</a>
                    </li>
                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        {{ str_replace(':count', 3, __('dashboard/includes/top-bar.messages_header')) }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('dashboard/includes/top-bar.view_all') }}</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <!-- Messages list -->
                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('dashboard/assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>{{ __('dashboard/includes/top-bar.message_sender_1') }}</h4>
                                <p>{{ __('dashboard/includes/top-bar.message_preview_1') }}</p>
                                <p>{{ __('dashboard/includes/top-bar.message_time_1') }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <!-- Repeat similar blocks for other messages -->

                    <li class="dropdown-footer">
                        <a href="#">{{ __('dashboard/includes/top-bar.view_all') }}</a>
                    </li>
                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Storage::url(auth()->user()->image) }}" alt="Profile Image" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ __('dashboard/includes/top-bar.profile_title') }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                            <i class="bi bi-person"></i>
                            <span>{{ __('dashboard/includes/top-bar.my_profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('users.edit', auth()->user()->id) }}">
                            <i class="bi bi-gear"></i>
                            <span>{{ __('dashboard/includes/top-bar.account_settings') }}</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>{{ __('dashboard/includes/top-bar.need_help') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>{{ __('dashboard/includes/top-bar.sign_out') }}</span>
                        </a>
                    </li>

                </ul>
                <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
