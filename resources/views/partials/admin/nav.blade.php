<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div style="text-align: center;
                width: 205px;">
            <img src="{{ asset('assets/images/png-trans1.png') }}" class="logo-icon" alt="logo icon" style="width: 94px;">
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        @can('view dashboard')
            <li>
                <a href="{{ route('admin.home') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endcan
        @can('read roles')
            <li>
                <a href="{{ route('admin.roles') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Roles</div>
                </a>
            </li>
        @endcan
        @can('read permissions')
            <li>
                <a href="{{ route('admin.permissions') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Permissions</div>
                </a>
            </li>
        @endcan
        @can('read users')
            <li>
                <a href="{{ route('admin.users') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Users</div>
                </a>
            </li>
        @endcan
        @can('read vendors')
            <li>
                <a href="{{ route('admin.vendors') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Vendors</div>
                </a>
            </li>
        @endcan

        @can('read products')
            <li>
                <a href="{{ route('admin.products') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Products</div>
                </a>
            </li>
        @endcan
        @can('read categories')
            <li>
                <a href="{{ route('admin.categories') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Categories</div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subcategories') }}">
                    <div class="parent-icon"><i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Sub Categories</div>
                </a>
            </li>
        @endcan

    </ul>
    <!--end navigation-->
</div>
