@php
    use App\Enums\UserType;
@endphp

<aside class="sidebar" id="sidebar">

    <!-- 1. FIXED HEADER (Doesn't scroll) -->
    <div class="sidebar-header-wrapper">
        <div class="sidebar-header">
            ÉLYS<span>IAN</span>
        </div>

        <div class="admin-badge">
            @if(Auth::user()->role_id == UserType::ADMIN->value)
                <i class="fas fa-crown"></i> ADMIN: 
            @else
                <i class="fas fa-store"></i> SELLER: 
            @endif
            {{ Auth::user()->name }}
        </div>
    </div>

    <!-- 2. SCROLLABLE MENU SECTION -->
    <div class="sidebar-menu-scroll">
        <ul class="nav-menu">

            <!-- ANALYTICS -->
            <li class="nav-item {{ Route::is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
            </li>

            <!-- PRODUCTS -->
            <li class="nav-item {{ Route::is('admin.productmanagement') ? 'active' : '' }}">
                <a href="{{ route('admin.productmanagement') }}" class="nav-link">
                    <i class="fas fa-tshirt"></i> Products
                </a>
            </li>

            <!-- ORDERS (ADMIN ONLY) -->
            @if(Auth::user()->role_id == UserType::ADMIN->value)
            <li class="nav-item {{ Route::is('admin.ordersmanagements') ? 'active' : '' }}">
                <a href="{{ route('admin.ordersmanagements') }}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
            </li>
            @endif

            <!-- USERS (ADMIN ONLY) -->
            @if(Auth::user()->role_id == UserType::ADMIN->value)
            <li class="nav-item {{ Route::is('admin.usermanagement') ? 'active' : '' }}">
                <a href="{{ route('admin.usermanagement') }}" class="nav-link">
                    <i class="fas fa-users"></i> Users
                </a>
            </li>
            @endif

            <!-- CATEGORIES -->
            <li class="nav-item {{ Route::is('admin.categoriesmanagements') ? 'active' : '' }}">
                <a href="{{ route('admin.categoriesmanagements') }}" class="nav-link">
                    <i class="fas fa-tags"></i> Categories
                </a>
            </li>

            <!-- BRANDS -->
            <li class="nav-item {{ Route::is('admin.productsbrand') ? 'active' : '' }}">
                <a href="{{ route('admin.productsbrand') }}" class="nav-link">
                    <i class="fas fa-gem"></i> Brand
                </a>
            </li>

            <!-- ADMIN ONLY EXTRAS -->
            @if(Auth::user()->role_id == UserType::ADMIN->value)
            <li class="nav-item {{ Route::is('admin.cauponmanagement') ? 'active' : '' }}">
                <a href="{{ route('admin.cauponmanagement') }}" class="nav-link">
                    <i class="fas fa-ticket-alt"></i> Coupons
                </a>
            </li>

            <li class="nav-item {{ Route::is('admin.banneremanagement') ? 'active' : '' }}">
                <a href="{{ route('admin.banneremanagement') }}" class="nav-link">
                    <i class="fas fa-image"></i> Banners
                </a>
            </li>

            <li class="nav-item {{ Route::is('admin.inventorymanagement') ? 'active' : '' }}">
                <a href="{{ route('admin.inventorymanagement') }}" class="nav-link">
                    <i class="fas fa-boxes"></i> Inventory
                </a>
            </li>
            @endif

        </ul>
    </div>

    <!-- 3. FIXED FOOTER (Doesn't scroll) -->
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>

<style>
/* SIDEBAR BASE CONFIG */
.sidebar {
    width: 270px;
    height: 100vh;
    background: #0C0B0A;
    border-right: 1px solid rgba(200, 169, 110, 0.2);
    position: fixed;
    top: 0; left: 0;
    z-index: 1000;
    display: flex;
    flex-direction: column; /* Vertical stack: Header, Menu, Footer */
}

/* 1. HEADER SECTION */
.sidebar-header-wrapper {
    padding: 30px 20px 10px 20px;
}

.sidebar-header {
    font-family: 'Playfair Display', serif;
    font-size: 1.8rem;
    letter-spacing: 4px;
    text-align: center;
    margin-bottom: 20px;
    color: #fff;
}
.sidebar-header span { color: #C8A96E; }

.admin-badge {
    text-align: center;
    font-size: 0.7rem;
    letter-spacing: 1px;
    color: #C8A96E;
    text-transform: uppercase;
    background: rgba(200, 169, 110, 0.05);
    padding: 10px;
    border-radius: 10px;
    border: 1px dashed rgba(200, 169, 110, 0.3);
}

/* 2. SCROLLABLE MENU AREA */
.sidebar-menu-scroll {
    flex-grow: 1; /* Takes up remaining space */
    overflow-y: auto; /* Enables scrolling */
    padding: 10px 20px;
}

/* --- CUSTOM GOLD SCROLLER --- */
.sidebar-menu-scroll::-webkit-scrollbar {
    width: 5px;
}
.sidebar-menu-scroll::-webkit-scrollbar-track {
    background: #151412;
}
.sidebar-menu-scroll::-webkit-scrollbar-thumb {
    background: #C8A96E; /* Gold Thumb */
    border-radius: 10px;
}
.sidebar-menu-scroll::-webkit-scrollbar-thumb:hover {
    background: #B2914A;
}

/* MENU ITEMS */
.nav-menu { list-style: none; padding: 0; margin: 0; }
.nav-item { margin-bottom: 8px; }
.nav-link {
    color: #B7AFA4;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 14px 18px;
    border-radius: 14px;
    transition: 0.3s;
    font-size: 0.9rem;
}
.nav-link i { width: 20px; text-align: center; font-size: 1.1rem; }

/* HOVER & ACTIVE */
.nav-item:not(.active) .nav-link:hover {
    background: rgba(200, 169, 110, 0.08);
    color: #fff;
}
.nav-item.active .nav-link {
    background: #C8A96E;
    color: #000;
    font-weight: 700;
}

/* 3. FIXED FOOTER (LOGOUT) */
.sidebar-footer {
    padding: 20px;
    background: #0C0B0A;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.logout-btn {
    width: 100%;
    background: transparent;
    border: 1px solid #C8A96E;
    color: #C8A96E;
    padding: 12px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    cursor: pointer;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    transition: 0.3s;
}

.logout-btn:hover {
    background: #C8A96E;
    color: #000;
}
</style>