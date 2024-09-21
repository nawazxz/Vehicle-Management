<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <ul class="py-1 menu-inner">

        <!-- Existing menu items -->
        <x-menu.menu-item :active="request()->routeIs('dashboard')">
            <x-menu.menu-link :href="route('dashboard')">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <span>Check-IN-OUT</span>
            </x-menu.menu-link>
        </x-menu.menu-item>

        <!-- New Expenses menu item -->
        <x-menu.menu-item :active="request()->routeIs('expenses')">
            <x-menu.menu-link :href="route('expenses')">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <span>Expenses</span>
            </x-menu.menu-link>
        </x-menu.menu-item>

        <!-- Logout menu item -->
        <x-menu.menu-item :active="request()->routeIs('logout')">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a class="menu-link" href="#" onclick="event.preventDefault(); confirmLogout();">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                Logout
            </a>
        </x-menu.menu-item>

    </ul>
</aside>
