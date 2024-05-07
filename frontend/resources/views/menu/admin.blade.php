<ul class="menu-inner py-1">

    <!-- Dashboards -->
    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/home') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div>Dashboard</div>
        </a>
    </li>

    <!-- Users -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Users</span>
    </li>
    <li
        class="menu-item
        {{ Request::is('user') ? 'active open' : '' }}
        {{ Request::is('user/*') ? 'active open' : '' }}
        {{ Request::is('education') ? 'active open' : '' }}
        {{ Request::is('education/*') ? 'active open' : '' }}
        {{ Request::is('skill') ? 'active open' : '' }}
        {{ Request::is('skill/*') ? 'active open' : '' }}
        {{ Request::is('project') ? 'active open' : '' }}
        {{ Request::is('project/*') ? 'active open' : '' }}
        {{ Request::is('additionalinformation') ? 'active open' : '' }}
        {{ Request::is('additionalinformation/*') ? 'active open' : '' }}
        {{ Request::is('workhistory') ? 'active open' : '' }}
        {{ Request::is('workhistory/*') ? 'active open' : '' }}
    ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-users'></i>
            <div>User</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('user') ? 'active' : '' }} ">
                <a href="{{ url('/user') }}" class="menu-link">
                    <div>User</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('education') ? 'active' : '' }} ">
                <a href="{{ url('/education') }}" class="menu-link">
                    <div>Education</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('skill') ? 'active' : '' }} ">
                <a href="{{ url('/skill') }}" class="menu-link">
                    <div>skill</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('project') ? 'active' : '' }} ">
                <a href="{{ url('/project') }}" class="menu-link">
                    <div>Project</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('additionalinformation') ? 'active' : '' }} ">
                <a href="{{ url('/additionalinformation') }}" class="menu-link">
                    <div>Additional Information</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('workhistory') ? 'active' : '' }} ">
                <a href="{{ url('/workhistory') }}" class="menu-link">
                    <div>Work History</div>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="menu-item
    {{ Request::is('role') ? 'active open' : '' }}
    {{ Request::is('position') ? 'active open' : '' }}
    {{ Request::is('position/*') ? 'active open' : '' }}
    {{ Request::is('department') ? 'active open' : '' }}
    {{ Request::is('department/*') ? 'active open' : '' }}
    {{ Request::is('division') ? 'active open' : '' }}
    {{ Request::is('division/*') ? 'active open' : '' }}
    ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-settings'></i>
            <div>User Configuration</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item
            {{ Request::is('role') ? 'active' : '' }}
            ">
                <a href="{{ url('/role') }}" class="menu-link">
                    <div>Role</div>
                </a>
            </li>
            <li
                class="menu-item
            {{ Request::is('position') ? 'active' : '' }}
            {{ Request::is('position/*') ? 'active' : '' }}
            ">
                <a href="{{ url('/position') }}" class="menu-link">
                    <div>Position</div>
                </a>
            </li>
            <li
                class="menu-item
            {{ Request::is('department') ? 'active' : '' }}
            {{ Request::is('department/*') ? 'active' : '' }}
            ">
                <a href="{{ url('/department') }}" class="menu-link">
                    <div>Department</div>
                </a>
            </li>
            <li
                class="menu-item
            {{ Request::is('division') ? 'active' : '' }}
            {{ Request::is('division/*') ? 'active' : '' }}">
                <a href="{{ url('/division') }}" class="menu-link">
                    <div>Division</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Modules -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Modules</span>
    </li>
    <li
        class="menu-item
    {{ Request::is('attendance') ? 'active' : '' }}
            {{ Request::is('attendance/*') ? 'active' : '' }}
            ">
        <a href="{{ url('/attendance') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-check"></i>
            <div>Attendance</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar"></i>
            <div>Event</div>
        </a>
    </li>
    <li
        class="menu-item
    {{ Request::is('product-tag') ? 'active open' : '' }}
    {{ Request::is('product-tag/*') ? 'active open' : '' }}
    {{ Request::is('product') ? 'active open' : '' }}
    {{ Request::is('product/*') ? 'active open' : '' }}
    ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-clipboard-list'></i>
            <div>Product</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item
            {{ Request::is('product-tag') ? 'active' : '' }}
            ">
                <a href="{{ url('/product-tag') }}" class="menu-link">
                    <div>Product Tag</div>
                </a>
            </li>
            <li
                class="menu-item
            {{ Request::is('product') ? 'active' : '' }}
            {{ Request::is('product/*') ? 'active' : '' }}
            ">
                <a href="{{ url('/product') }}" class="menu-link">
                    <div>Product</div>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="menu-item
{{ Request::is('inventory') ? 'active open' : '' }}
{{ Request::is('inventory/*') ? 'active open' : '' }}

{{ Request::is('damage-history') ? 'active open' : '' }}
{{ Request::is('damage-history/*') ? 'active open' : '' }}

{{ Request::is('room') ? 'active open' : '' }}
{{ Request::is('room/*') ? 'active open' : '' }}

{{ Request::is('category') ? 'active open' : '' }}
{{ Request::is('category/*') ? 'active open' : '' }}

{{ Request::is('office') ? 'active open' : '' }}
{{ Request::is('office/*') ? 'active open' : '' }}

{{ Request::is('all_usage_history') ? 'active open' : '' }}
{{ Request::is('all_usage_history/*') ? 'active open' : '' }}

{{ Request::is('all_damage_history') ? 'active open' : '' }}
{{ Request::is('all_damage_history/*') ? 'active open' : '' }}

{{ Request::is('dashboard_inventory') ? 'active open' : '' }}
{{ Request::is('dashboard_inventory/*') ? 'active open' : '' }}
">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-package'></i>
            <div>Inventory</div>
        </a>
        <ul class="menu-sub">
            <li
                class="menu-item
        {{ Request::is('dashboard_inventory') ? 'active' : '' }}
        {{ Request::is('dashboard_inventory/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/dashboard_inventory') }}" class="menu-link">
                    <div>Dashboard</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('inventory') ? 'active' : '' }}
        {{ Request::is('inventory/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/inventory') }}" class="menu-link">
                    <div>Item</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('room') ? 'active' : '' }}
        {{ Request::is('room/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/room') }}" class="menu-link">
                    <div>Room</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('category') ? 'active' : '' }}
        {{ Request::is('category/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/category') }}" class="menu-link">
                    <div>Category</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('office') ? 'active' : '' }}
        {{ Request::is('office/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/office') }}" class="menu-link">
                    <div>Office</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('all_usage_history') ? 'active' : '' }}
        {{ Request::is('all_usage_history/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/all_usage_history') }}" class="menu-link">
                    <div>Usage History</div>
                </a>
            </li>
            <li
                class="menu-item
        {{ Request::is('all_damage_history') ? 'active' : '' }}
        {{ Request::is('all_damage_history/*') ? 'active' : '' }}
        ">
                <a href="{{ url('/all_damage_history') }}" class="menu-link">
                    <div>Damage History</div>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="menu-item
            {{ Request::is('project_management') ? 'active' : '' }}
            {{ Request::is('project_management/*') ? 'active' : '' }}
    ">
        <a href="{{ url('/project_management') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout"></i>
            <div>Project Management</div>
        </a>
    </li>
    <!-- CMS -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">CMS</span>
    </li>
    <li
        class="menu-item
            {{ Request::is('notice') ? 'active' : '' }}
            {{ Request::is('notice/*') ? 'active' : '' }}
    ">
        <a href="{{ url('/notice') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-alert-triangle"></i>
            <div>Notice</div>
        </a>
    </li>
    <li
        class="menu-item
    {{ Request::is('banner') ? 'active' : '' }}
            {{ Request::is('banner/*') ? 'active' : '' }}
    ">
        <a href="{{ url('/banner') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-photo"></i>
            <div>Banner</div>
        </a>
    </li>
</ul>
