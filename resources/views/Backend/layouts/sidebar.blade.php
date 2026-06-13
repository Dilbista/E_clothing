<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">
        ÉLYS<span>IAN</span>
    </div>

    <!-- USER NAME DISPLAY -->
    <div class="admin-badge">
        <i class="fas fa-crown"></i>
        {{ Auth::user()->name }}
    </div>

    <ul class="nav-menu nav-menu--admin">

        <li class="nav-item">
            <a href="#" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-chart-line"></i> Analytics
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.productmanagement') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-tshirt"></i> Products
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.ordersmanagements') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-shopping-cart"></i> Orders
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.usermanagement') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-users"></i> Users
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.categoriesmanagements') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-tags"></i> Categories
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.cauponmanagement') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-ticket-alt"></i> Coupons
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.banneremanagement') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-image"></i> Banners
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.inventorymanagement') }}" class="nav-link"
                style="color:#fff; text-decoration:none; display:flex; align-items:center; gap:10px;">
                <i class="fas fa-boxes"></i> Inventory
            </a>
        </li>

    </ul>

    <!-- LOGOUT (FIXED) -->
    <form method="POST" action="{{ route('logout') }}" style="margin-top:30px;">
        @csrf

        <button class="btn btn-outline" id="logoutAdminBtn">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </button>
    </form>

</aside>

<style>
/* SIDEBAR */
.sidebar {
    width: 270px;
    min-height: 100vh;
    background: var(--sidebar-bg);
    border-right: 1px solid var(--border-subtle);
    padding: 25px 18px;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 40;
    overflow-y: auto;
    transition: transform 0.4s;
}

.sidebar-header {
    font-family: var(--font-display);
    font-size: 1.6rem;
    letter-spacing: 5px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
}

.sidebar-header span {
    color: var(--gold);
}

.admin-badge {
    text-align: center;
    font-size: 0.7rem;
    letter-spacing: 2px;
    color: var(--gold);
    margin-bottom: 25px;
    text-transform: uppercase;
    background: rgba(200, 169, 110, 0.08);
    padding: 8px;
    border-radius: 8px;
    border: 1px dashed var(--border-subtle);
}

.nav-menu {
    list-style: none;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 16px;
    border-radius: 14px;
    cursor: pointer;
    transition: 0.3s;
    margin-bottom: 6px;
    color: var(--text-secondary);
    font-weight: 500;
    font-size: 0.88rem;
}

.nav-item i {
    width: 20px;
    text-align: center;
}

.nav-item:hover {
    background: rgba(200, 169, 110, 0.08);
    color: white;
}

.nav-item.active {
    background: var(--gold);
    color: black;
    font-weight: 600;
}
</style>