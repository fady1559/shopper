<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>{{ __('dashboard/includes/side-bar.dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-globe"></i>
                <span>{{ __('dashboard/includes/side-bar.website') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="fas fa-users"></i><span>{{ __('dashboard/includes/side-bar.users') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ route('show.admins') }}">
                        <i class="fa-solid fa-user-tie fs-5"></i><span>{{ __('dashboard/includes/side-bar.admin') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.moderators') }}">
                        <i class="fa-solid fa-m fs-5"></i><span>{{ __('dashboard/includes/side-bar.moderator') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.customers') }}">
                        <i class="fa-solid fa-c fs-5"></i><span>{{ __('dashboard/includes/side-bar.customer') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fa-solid fa-i fs-5"></i> <span>{{ __('dashboard/includes/side-bar.index') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}">
                        <i class="fa-solid fa-plus fs-5"></i><span>{{ __('dashboard/includes/side-bar.create') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.delete') }}">
                        <i class="fa-solid fa-plus fs-5"></i><span>{{ __('dashboard/includes/side-bar.trashed') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories" data-bs-toggle="collapse" href="#">
                <i class="fas fa-th-list"></i><span>{{ __('dashboard/includes/side-bar.categories') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categories" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('categories.index') }}">
                        <i class="fa-solid fa-i fs-5"></i> <span>{{ __('dashboard/includes/side-bar.index') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.create') }}">
                        <i class="fa-solid fa-plus fs-5"></i><span>{{ __('dashboard/includes/side-bar.create') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#subcategory" data-bs-toggle="collapse" href="#">
                <i class="fas fa-th-list"></i><span>{{ __('dashboard/includes/side-bar.subcategory') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="subcategory" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('subcategories.index') }}">
                        <i class="fa-solid fa-i fs-5"></i> <span>{{ __('dashboard/includes/side-bar.index') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('subcategories.create') }}">
                        <i class="fa-solid fa-plus fs-5"></i><span>{{ __('dashboard/includes/side-bar.create') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#product" data-bs-toggle="collapse" href="#">
                <i class="fas fa-box"></i><span>{{ __('dashboard/includes/side-bar.products') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="product" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="fa-solid fa-i fs-5"></i> <span>{{ __('dashboard/includes/side-bar.index') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.create') }}">
                        <i class="fa-solid fa-plus fs-5"></i><span>{{ __('dashboard/includes/side-bar.create') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item" style="margin-top:30px;  width: 100%;">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="color: white; background-color: black; transition: color 0.3s ease, background-color 0.3s ease; text-align: center;"
               onmouseover="this.style.color='white'; this.style.backgroundColor='#dc3545';"
               onmouseout="this.style.color='white'; this.style.backgroundColor='black';">
                <i class="fas fa-sign-out-alt"></i>
                <span>{{ __('dashboard/includes/side-bar.logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</aside>
