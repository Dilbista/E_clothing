<header class="top-navbar">
    <!-- LEFT: LOGO + SEARCH -->
    <div style="display:flex; align-items:center; gap:20px;">
        <div class="logo">
            E-CLOTHING
        </div>

        <!-- SEARCH BAR -->
        <form class="nav-search" method="GET" action="#">
            <i class="fas fa-search"></i>
            <input type="text" name="search" placeholder="Search products, orders..." />
        </form>
    </div>

    <!-- RIGHT PROFILE -->
    <div class="nav-profile-section">

        <!-- NOTIFICATION -->
        <button class="nav-icon-btn">
            <i class="far fa-bell"></i>
            <span class="badge-dot"></span>
        </button>

        @auth
        <a href="{{ route('admin.adminprofilemanagement') }}" style="text-decoration:none; color:inherit;">

            <div class="admin-profile-card" style="cursor:pointer;">
                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="profile-info">
                    <span class="profile-name">
                        {{ auth()->user()->name }}
                    </span>

                    <span class="profile-role">
                        @if(auth()->user()->role_id == \App\Enums\UserType::ADMIN->value)
                        ADMIN
                        @elseif(auth()->user()->role_id == \App\Enums\UserType::SELLER->value)
                        SELLER
                        @else
                        CUSTOMER
                        @endif
                    </span>
                </div>
            </div>

        </a>
        @endauth

    </div>
</header>
<style>
/* TOP NAVBAR */
.top-navbar {
    position: fixed;
    top: 0;
    right: 0;
    left: 270px;
    height: var(--navbar-height);
    background: var(--sidebar-bg);
    border-bottom: 1px solid var(--border-subtle);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 35px;
    z-index: 30;
    transition: left 0.4s;
}

.nav-search {
    display: flex;
    align-items: center;
    background: #1f1d1a;
    border: 1px solid var(--border-subtle);
    padding: 8px 16px;
    border-radius: 20px;
    width: 300px;
}

.nav-search input {
    background: transparent;
    border: none;
    color: white;
    outline: none;
    margin-left: 10px;
    width: 100%;
    font-size: 0.85rem;
}

.nav-profile-section {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-icon-btn {
    background: transparent;
    border: none;
    color: var(--text-secondary);
    font-size: 1.1rem;
    cursor: pointer;
    position: relative;
}

.nav-icon-btn .badge-dot {
    position: absolute;
    top: -2px;
    right: -2px;
    width: 8px;
    height: 8px;
    background: var(--gold);
    border-radius: 50%;
}

.admin-profile-card {
    display: flex;
    align-items: center;
    gap: 12px;
    border-left: 1px solid rgba(255, 255, 255, 0.1);
    padding-left: 20px;
}

.profile-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--gold);
    display: flex;
    align-items: center;
    justify-content: center;
    color: black;
    font-weight: 700;
    border: 1px solid var(--gold-light);
    text-transform: uppercase;
}

.profile-info {
    display: flex;
    flex-direction: column;
}

.profile-name {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-primary);
}

.profile-role {
    font-size: 0.7rem;
    color: var(--gold);
    letter-spacing: 0.5px;
}
</style>
<style>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background: #111;
    color: white;
}

.logo {
    font-size: 20px;
    font-weight: bold;
}

.nav-profile-section {
    display: flex;
    align-items: center;
    gap: 15px;
}

.nav-icon-btn {
    position: relative;
    background: none;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
}

.badge-dot {
    position: absolute;
    top: 0;
    right: 0;
    width: 8px;
    height: 8px;
    background: red;
    border-radius: 50%;
}

.admin-profile-card {
    display: flex;
    align-items: center;
    gap: 10px;
}

.profile-avatar {
    width: 35px;
    height: 35px;
    background: gray;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: bold;
}

.profile-name {
    font-weight: bold;
    display: block;
}

.profile-role {
    font-size: 12px;
    color: #aaa;
}

.logout-btn {
    background: red;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
}

.login-btn {
    background: green;
    color: white;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 5px;
}
</style>