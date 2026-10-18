<aside class="admin-sidebar" id="adminSidebar">
    <div class="admin-sidebar-header d-flex align-items-center justify-content-between py-3 px-3 text-center">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center justify-content-center w-100 text-decoration-none py-1">
            <img src="{{ asset('assets/img/logo1.png') }}" alt="Sara's Boutique" class="brand-logo img-fluid" style="max-height: 75px; width: auto; max-width: 220px; object-fit: contain; filter: drop-shadow(0 3px 10px rgba(212, 175, 55, 0.45));">
        </a>
        <button class="btn btn-sm btn-link text-white-50 d-lg-none position-absolute end-0 top-0 mt-3 me-2" id="sidebarCloseBtn" aria-label="Close sidebar">
            <i class="bi bi-x-lg fs-5"></i>
        </button>
    </div>

    <!-- Staff User Card -->
    <div class="sidebar-user-card p-3 mx-3 my-3 rounded-3" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(212, 175, 55, 0.3); backdrop-filter: blur(5px);">
        <div class="d-flex align-items-center gap-3">
            <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center fw-bold shadow" style="width: 42px; height: 42px; background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%); color: #1b002c; border: 1.5px solid #fff1c5;">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="overflow-hidden">
                <div class="text-white fw-bold text-truncate small" style="font-family: 'Playfair Display', Georgia, serif; font-size: 0.95rem; letter-spacing: 0.2px;">{{ auth()->user()->name ?? 'Administrator' }}</div>
                <span class="badge" style="background: rgba(212, 175, 55, 0.25); color: #f5d77f; font-size: 0.68rem; font-weight: 600; font-family: 'Poppins', sans-serif; border: 1px solid rgba(212, 175, 55, 0.4);">
                    <i class="bi bi-shield-fill-check me-1"></i>{{ auth()->user()->roles->first()->name ?? 'Super Admin' }}
                </span>
            </div>
        </div>
    </div>

    <div class="sidebar-menu px-2 pb-5">
        <div class="menu-label px-3 py-2 text-uppercase small fw-bold" style="font-family: 'Cinzel', serif; font-size: 0.68rem; letter-spacing: 1.5px; color: #d4af37 !important;">Overview</div>
        
        <ul class="nav flex-column gap-1 mb-3">
            @can('view dashboard')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
                </a>
            </li>
            @endcan
        </ul>

        <div class="menu-label px-3 py-2 text-uppercase small fw-bold" style="font-family: 'Cinzel', serif; font-size: 0.68rem; letter-spacing: 1.5px; color: #d4af37 !important;">Couture Catalog</div>
        <ul class="nav flex-column gap-1 mb-3">
            @can('view products')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <i class="bi bi-bag-check-fill me-2"></i> All Products
                </a>
            </li>
            @endcan

            @can('create products')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}" href="{{ route('admin.products.create') }}">
                    <i class="bi bi-plus-circle-fill me-2"></i> Add Product
                </a>
            </li>
            @endcan

            @can('view categories')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-tags-fill me-2"></i> Categories
                </a>
            </li>
            @endcan
        </ul>

        <div class="menu-label px-3 py-2 text-uppercase small fw-bold" style="font-family: 'Cinzel', serif; font-size: 0.68rem; letter-spacing: 1.5px; color: #d4af37 !important;">Orders &amp; Inquiries</div>
        <ul class="nav flex-column gap-1 mb-3">
            @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin') || auth()->user()->can('view orders')))
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }} d-flex align-items-center justify-content-between" href="{{ route('admin.orders.index') }}">
                    <span><i class="bi bi-bag-heart-fill me-2"></i> Direct Orders</span>
                    @php
                        $newOrdersBadge = \App\Models\Order::where('order_status', 'new')->count();
                    @endphp
                    @if($newOrdersBadge > 0)
                        <span class="badge rounded-pill bg-danger shadow-sm px-2 py-1" style="font-size: 0.7rem; font-family: 'Poppins', sans-serif;">{{ $newOrdersBadge }} new</span>
                    @endif
                </a>
            </li>
            @endif
        </ul>

        <div class="menu-label px-3 py-2 text-uppercase small fw-bold" style="font-family: 'Cinzel', serif; font-size: 0.68rem; letter-spacing: 1.5px; color: #d4af37 !important;">Concierge Care</div>
        <ul class="nav flex-column gap-1 mb-3">
            @can('view contacts')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <i class="bi bi-envelope-paper-fill me-2"></i> Client Enquiries
                </a>
            </li>
            @endcan
        </ul>

        <div class="menu-label px-3 py-2 text-uppercase small fw-bold" style="font-family: 'Cinzel', serif; font-size: 0.68rem; letter-spacing: 1.5px; color: #d4af37 !important;">Access &amp; Settings</div>
        <ul class="nav flex-column gap-1 mb-3">
            @can('view users')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people-fill me-2"></i> Staff Users
                </a>
            </li>
            @endcan

            @can('view roles')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <i class="bi bi-shield-lock-fill me-2"></i> Roles Matrix
                </a>
            </li>
            @endcan

            @can('view permissions')
            <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                    <i class="bi bi-key-fill me-2"></i> Permissions
                </a>
            </li>
            @endcan

            <!-- <li class="nav-item">
                <a class="nav-link admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear-wide-connected me-2"></i> Store Settings
                </a>
            </li> -->
        </ul>

        <div class="px-3 pt-3 border-top" style="border-color: rgba(212, 175, 55, 0.25) !important;">
            <a href="{{ route('home') }}" target="_blank" class="btn w-100 btn-sm text-decoration-none py-2 d-flex align-items-center justify-content-center gap-2" style="background: rgba(212, 175, 55, 0.15); border: 1px solid #d4af37; color: #f5d77f; font-weight: 600; border-radius: 10px; transition: all 0.25s ease;">
                <i class="bi bi-box-arrow-up-right"></i> View Live Store
            </a>
        </div>
    </div>
</aside>
