<header class="admin-navbar d-flex align-items-center justify-content-between px-4 py-3 border-bottom shadow-sm">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-secondary btn-sm d-lg-none text-dark" id="sidebarToggleBtn" aria-label="Toggle navigation" style="border-color: #d9cebe;">
            <i class="bi bi-list fs-5"></i>
        </button>
        <div class="page-header-title d-none d-sm-block">
            <h5 class="mb-0 text-dark" style="font-family: 'Playfair Display', Georgia, serif; font-weight: 700; color: #240038 !important; letter-spacing: 0.25px;">
                @yield('page_title', "Sara's Boutique — Couture Management")
            </h5>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3">
        <!-- Live Store Shortcut -->
        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-gold d-none d-md-inline-flex align-items-center gap-2 px-3 py-2">
            <i class="bi bi-shop"></i> Storefront
        </a>

        <!-- User Dropdown -->
        <div class="dropdown">
            <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center gap-2 border shadow-sm px-3 py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: #ffffff; border-color: rgba(212, 175, 55, 0.3) !important; border-radius: 10px;">
                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width: 32px; height: 32px; font-size: 0.85rem; background: linear-gradient(135deg, #3B005A 0%, #240038 100%); border: 1.5px solid #d4af37;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <span class="text-dark fw-semibold small d-none d-sm-inline" style="font-family: 'Poppins', sans-serif;">{{ auth()->user()->name ?? 'Admin' }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end border shadow-lg py-2" style="background: #ffffff; border-color: rgba(212, 175, 55, 0.3); border-radius: 12px; min-width: 230px;">
                <li class="px-3 py-2 border-bottom" style="border-color: #f3f0e8 !important; background: #faf6ef;">
                    <span class="d-block text-dark small fw-bold" style="font-family: 'Playfair Display', Georgia, serif; color: #240038 !important;">{{ auth()->user()->name ?? 'Administrator' }}</span>
                    <span class="text-muted small" style="font-size: 0.75rem;">{{ auth()->user()->email ?? '' }}</span>
                </li>
                <li><a class="dropdown-item py-2 small" href="{{ route('admin.users.edit', auth()->id() ?? 1) }}"><i class="bi bi-person-gear me-2" style="color: #b8860b;"></i> Profile Settings</a></li>
                <li><a class="dropdown-item py-2 small" href="{{ route('admin.settings.index') }}"><i class="bi bi-sliders me-2" style="color: #b8860b;"></i> Store Configuration</a></li>
                <li><hr class="dropdown-divider my-1" style="border-color: #f3f0e8;"></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 small text-danger fw-semibold">
                            <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
