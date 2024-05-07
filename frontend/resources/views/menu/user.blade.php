<ul class="menu-inner py-1">

     <!-- Users -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Users</span>
    </li>
    <li
        class="menu-item
            {{ Request::is('user') ? 'active' : '' }}
            {{ Request::is('user/*') ? 'active' : '' }}
            ">
        <a href="{{ url('/user/detail/profile/') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div>User</div>
        </a>
    </li>

    <!-- Modules -->
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Modules</span>
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
                {{ Request::is('product-tag') ? 'active' : '' }}">
                    <a href="{{ url('/product-tag') }}" class="menu-link">
                        <div>Product Tag</div>
                    </a>
                </li>
                <li class="menu-item
                {{ Request::is('product') ? 'active' : '' }}
                {{ Request::is('product/*') ? 'active' : '' }}">
                    <a href="{{ url('/product') }}" class="menu-link">
                        <div>Product</div>
                    </a>
                </li>
            
        </ul>
    </li>
    <li
        class="menu-item
    {{ Request::is('additionalinformation') ? 'active' : '' }}
            {{ Request::is('additionalinformation/*') ? 'active' : '' }}
            ">
        <a href="{{ url('/additionalinformation') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-check"></i>
            <div>Additional Information</div>
        </a>
    </li>
    <li
        class="menu-item
    {{ Request::is('workhistory') ? 'active' : '' }}
            {{ Request::is('workhistory/*') ? 'active' : '' }}
            ">
        <a href="{{ url('/workhistory') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-check"></i>
            <div>Work History</div>
        </a>
    </li>
</ul>