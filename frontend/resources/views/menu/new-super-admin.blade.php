<ul class="menu-inner py-1">

    <!-- Dashboards -->
    @isPermissions('Read_Dashboard')
    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
        <a href="{{ url('/home') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div>Dashboard</div>
        </a>
    </li>
    @endisPermissions
 
    <!-- Permission -->
    @isPermissions('Read_Role')
    <li class="menu-item {{ Request::is('role') ? 'active' : '' }}">
        <a href="{{ url('/role') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-accessible"></i>
            <div>Role & Permission</div>
        </a>
    </li>    
    @endisPermissions

    <!-- Users -->
    @isPermissions('Read_User')
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Users</span>
    </li>
    <li class="menu-item
        {{ Request::is('user') ? 'active' : '' }}
        {{ Request::is('user/*') ? 'active' : '' }}">
        <a href="{{ url('/user') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div>User</div>
        </a>

    </li>
    @endisPermissions

    @isPermissions('Read_UserConfig')
    <li class="menu-item
        {{ Request::is('position') ? 'active open' : '' }}
        {{ Request::is('position/*') ? 'active open' : '' }}
        {{ Request::is('department') ? 'active open' : '' }}
        {{ Request::is('department/*') ? 'active open' : '' }}
        {{ Request::is('division') ? 'active open' : '' }}
        {{ Request::is('division/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-settings'></i>
            <div>User Configuration</div>
        </a>
        <ul class="menu-sub">
            @isPermissions('Read_Position')
            <li class="menu-item
                {{ Request::is('position') ? 'active' : '' }}
                {{ Request::is('position/*') ? 'active' : '' }}">
                <a href="{{ url('/position') }}" class="menu-link">
                    <div>Position</div>
                </a>
            </li>
            @endisPermissions
            @isPermissions('Read_Department')
            <li class="menu-item
                {{ Request::is('department') ? 'active' : '' }}
                {{ Request::is('department/*') ? 'active' : '' }}">
                <a href="{{ url('/department') }}" class="menu-link">
                    <div>Department</div>
                </a>
            </li>
            @endisPermissions
            @isPermissions('Read_Division')
            <li class="menu-item
                {{ Request::is('division') ? 'active' : '' }}
                {{ Request::is('division/*') ? 'active' : '' }}">
                <a href="{{ url('/division') }}" class="menu-link">
                    <div>Division</div>
                </a>
            </li>
            @endisPermissions
        </ul>
    </li>
    @endisPermissions

    <!-- Modules -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Modules</span>
    </li>
    @isPermissions('Read_Attendance')
    <li class="menu-item
        {{ Request::is('attendance') ? 'active' : '' }}
        {{ Request::is('attendance/*') ? 'active' : '' }} ">
        <a href="{{ url('/attendance') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-check"></i>
            <div>Attendance</div>
        </a>
    </li>
    @endisPermissions

    <li class="menu-item">
        <a href="#" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar"></i>
            <div>Event</div>
        </a>
    </li>

    @isPermissions('Read_Product')
    <li class="menu-item
        {{ Request::is('product-tag') ? 'active open' : '' }}
        {{ Request::is('product-tag/*') ? 'active open' : '' }}
        {{ Request::is('product') ? 'active open' : '' }}
        {{ Request::is('product/*') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-tag'></i>
            <div>Product</div>
        </a>
        <ul class="menu-sub">
            @isPermissions('Read_ProductTag')
            <li class="menu-item
                {{ Request::is('product-tag') ? 'active' : '' }}">
                <a href="{{ url('/product-tag') }}" class="menu-link">
                    <div>Product Tag</div>
                </a>
            </li>
            @endisPermissions
            @isPermissions('Read_Product')
            <li class="menu-item
                {{ Request::is('product') ? 'active' : '' }}
                {{ Request::is('product/*') ? 'active' : '' }}">
                <a href="{{ url('/product') }}" class="menu-link">
                    <div>Product</div>
                </a>
            </li>
            @endisPermissions
        </ul>
    </li>
    @endisPermissions

    @isPermissions('Read_Inventory')
    <li class="menu-item
        {{ Request::is('inventory') ? 'active open' : '' }}
        {{ Request::is('inventory/*') ? 'active open' : '' }}

        {{ Request::is('room') ? 'active open' : '' }}
        {{ Request::is('room/*') ? 'active open' : '' }}

        {{ Request::is('category') ? 'active open' : '' }}
        {{ Request::is('category/*') ? 'active open' : '' }}

        {{ Request::is('office') ? 'active open' : '' }}
        {{ Request::is('office/*') ? 'active open' : '' }}

        {{ Request::is('all_usage_history') ? 'active open' : '' }}
        {{ Request::is('all_usage_history/*') ? 'active open' : '' }}

        {{ Request::is('all_damage_history') ? 'active open' : '' }}
        {{ Request::is('all_damage_history/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-package'></i>
            <div>Inventory</div>
        </a>
        <ul class="menu-sub">
            @isPermissions('Read_Item')
            <li class="menu-item
                {{ Request::is('inventory') ? 'active' : '' }}
                {{ Request::is('inventory/*') ? 'active' : '' }}">
                <a href="{{ url('/inventory') }}" class="menu-link">
                    <div>Item</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_Room')
            <li class="menu-item
                {{ Request::is('room') ? 'active' : '' }}
                {{ Request::is('room/*') ? 'active' : '' }}">
                <a href="{{ url('/room') }}" class="menu-link">
                    <div>Room</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_Category')
            <li class="menu-item
                {{ Request::is('category') ? 'active' : '' }}
                {{ Request::is('category/*') ? 'active' : '' }}">
                <a href="{{ url('/category') }}" class="menu-link">
                    <div>Category</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_Office')
            <li class="menu-item
                {{ Request::is('office') ? 'active' : '' }}
                {{ Request::is('office/*') ? 'active' : '' }}">
                <a href="{{ url('/office') }}" class="menu-link">
                    <div>Office</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_UsageHistory')
            <li class="menu-item
                {{ Request::is('all_usage_history') ? 'active' : '' }}
                {{ Request::is('all_usage_history/*') ? 'active' : '' }}">
                <a href="{{ url('/all_usage_history') }}" class="menu-link">
                    <div>Usage History</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_DamageHistory')
            <li class="menu-item
                {{ Request::is('all_damage_history') ? 'active' : '' }}
                {{ Request::is('all_damage_history/*') ? 'active' : '' }}">
                <a href="{{ url('/all_damage_history') }}" class="menu-link">
                    <div>Damage History</div>
                </a>
            </li>
            @endisPermissions
        </ul>
    </li>
    @endisPermissions

    @isPermissions('Read_Leave')
    <li class="menu-item 
        {{ Request::is('leave-management') ? 'active open' : '' }}
        {{ Request::is('leave-management/*') ? 'active open' : '' }} 

        {{ Request::is('leave-type') ? 'active open' : '' }}
        {{ Request::is('leave-type/*') ? 'active open' : '' }} 

        {{ Request::is('leave-histories') ? 'active open' : '' }}
        {{ Request::is('leave-histories/*') ? 'active open' : '' }} ">

        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons ti ti-report'></i>
            <div>Leave</div>
        </a>
        <ul class="menu-sub">   
            @isPermissions('Read_LeaveManagement')        
            <li class="menu-item
                {{ Request::is('leave-management') ? 'active' : '' }}
                {{ Request::is('leave-management/*') ? 'active' : '' }}">
                <a href="{{ url('/leave-management') }}" class="menu-link">
                    <div>Leave Management</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_LeaveType')
            <li class="menu-item
                {{ Request::is('leave-type') ? 'active' : '' }}
                {{ Request::is('leave-type/*') ? 'active' : '' }}">
                <a href="{{ url('leave-type') }}" class="menu-link">
                    <div>Manage Leave Type</div>
                </a>
            </li>
            @endisPermissions

            @isPermissions('Read_LeaveHistory')
            <li class="menu-item
                {{ Request::is('leave-histories') ? 'active' : '' }}
                {{ Request::is('leave-histories/*') ? 'active' : '' }}">
                <a href="{{ url('leave-histories') }}" class="menu-link">
                    <div>Leave Histories</div>
                </a>
            </li>
            @endisPermissions
        </ul>
    </li>
    @endisPermissions

    @isPermissions('Read_LeaveApplication')
    <li class="menu-item {{ Request::is('leave-application') ? 'active' : '' }}">
        <a href="{{ url('/leave-application') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-report-medical"></i>
            <div>Leave Request</div>
        </a>
    </li>    
    @endisPermissions


    <!-- CMS -->
    @isPermissions('Read_Notice')
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">CMS</span>
    </li>
    @endisPermissions

        @isPermissions("Read_Notice")
        <li class="menu-item
                {{ Request::is('notice') ? 'active' : '' }}
                {{ Request::is('notice/*') ? 'active' : '' }}">
            <a href="{{ url('/notice') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-alert-triangle"></i>
                <div>Notice</div>
            </a>
        </li>
        @endisPermissions

        @isPermissions('Read_Banner')
        <li class="menu-item
        {{ Request::is('banner') ? 'active' : '' }}
                {{ Request::is('banner/*') ? 'active' : '' }}">
            <a href="{{ url('/banner') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-photo"></i>
                <div>Banner</div>
            </a>
        </li>
        @endisPermissions
</ul>