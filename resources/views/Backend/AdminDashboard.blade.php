<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
  <title>ÉLYSIAN · Admin Dashboard | Luxury Fashion</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --gold: #C8A96E;
      --gold-dark: #B2914A;
      --gold-light: #E2CDA0;
      --deep-bg: #0C0B0A;
      --card-bg: #1A1816;
      --sidebar-bg: #100F0E;
      --text-primary: #F5F0E8;
      --text-secondary: #B7AFA4;
      --border-subtle: rgba(200, 169, 110, 0.2);
      --error: #D4735E;
      --success: #6F9F7C;
      --info: #5B8FB9;
      --warning: #D4A853;
      --font-display: 'Playfair Display', serif;
      --font-body: 'Inter', sans-serif;
      --navbar-height: 70px;
    }

    body {
      font-family: var(--font-body);
      background-color: var(--deep-bg);
      color: var(--text-primary);
      line-height: 1.6;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border-radius: 40px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: 0.3s;
      border: none;
      font-family: var(--font-body);
      margin-top: 10px;
    }

    .btn-primary {
      background: var(--gold);
      color: black;
    }

    .btn-primary:hover {
      background: #dbbf78;
    }

    .btn-outline {
      background: transparent;
      border: 1.5px solid var(--gold);
      color: var(--gold);
    }

    .btn-outline:hover {
      background: rgba(200, 169, 110, 0.1);
    }

    .btn-sm {
      padding: 8px 20px;
      font-size: 0.8rem;
      border-radius: 30px;
      width: auto;
    }

    .btn-danger {
      background: var(--error);
      color: white;
    }

    .btn-success {
      background: var(--success);
      color: white;
    }

    /* ========== ADMIN LAYOUT ========== */
    .admin-layout {
      display: flex;
      min-height: 100vh;
      position: relative;
    }

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

    /* MAIN CONTENT VIEWPORT */
    .main-content {
      margin-left: 270px;
      margin-top: var(--navbar-height);
      flex: 1;
      padding: 35px;
      transition: margin 0.4s;
    }

    .page-title {
      font-family: var(--font-display);
      font-size: 2rem;
      margin-bottom: 25px;
    }

    .dashboard-panel {
      display: none;
      animation: fadeSlide 0.4s ease;
    }

    .dashboard-panel.active {
      display: block;
    }

    @keyframes fadeSlide {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Cards */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 22px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: var(--card-bg);
      border-radius: 22px;
      padding: 22px;
      border: 1px solid var(--border-subtle);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .stat-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    .stat-card .icon {
      font-size: 1.8rem;
      color: var(--gold);
      margin-bottom: 8px;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: 700;
    }

    .stat-label {
      color: var(--text-secondary);
      font-size: 0.85rem;
    }

    .charts-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
      margin-bottom: 30px;
    }

    .chart-card {
      background: var(--card-bg);
      border-radius: 22px;
      padding: 22px;
      border: 1px solid var(--border-subtle);
    }

    .table-wrapper {
      background: var(--card-bg);
      border-radius: 22px;
      padding: 20px;
      border: 1px solid var(--border-subtle);
      overflow-x: auto;
      margin-bottom: 25px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 12px 14px;
      text-align: left;
      border-bottom: 1px solid rgba(255, 255, 255, 0.04);
      font-size: 0.9rem;
    }

    th {
      color: var(--text-secondary);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 0.72rem;
    }

    .badge {
      padding: 5px 14px;
      border-radius: 20px;
      font-size: 0.72rem;
      font-weight: 600;
    }

    .badge-success {
      background: rgba(111, 159, 124, 0.2);
      color: var(--success);
    }

    .badge-warning {
      background: rgba(212, 168, 83, 0.2);
      color: var(--warning);
    }

    .badge-info {
      background: rgba(91, 143, 185, 0.2);
      color: var(--info);
    }

    /* MOBILE TOGGLE & OVERLAY */
    .menu-toggle {
      display: none;
      background: var(--gold);
      border: none;
      color: black;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      font-size: 1.2rem;
      cursor: pointer;
      align-items: center;
      justify-content: center;
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: 35;
      backdrop-filter: blur(4px);
    }

    .sidebar-overlay.active {
      display: block;
    }

    @media (max-width: 1024px) {
      .charts-row {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.open {
        transform: translateX(0);
      }

      .top-navbar {
        left: 0;
        padding: 0 20px;
      }

      .main-content {
        margin-left: 0;
        padding: 30px 20px;
      }

      .menu-toggle {
        display: flex;
      }

      .nav-search {
        display: none;
      }
    }
  </style>
</head>

<body>

  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="admin-layout" id="adminLayout">

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
          <div class="admin-profile-card">

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



        @endauth

      </div>

    </header>>

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




    <aside class="sidebar" id="sidebar">

      <div class="sidebar-header">
        ÉLYS<span>IAN</span>
      </div>

      <!-- USER NAME DISPLAY -->
      <div class="admin-badge">
        <i class="fas fa-crown"></i>
        {{ Auth::user()->name }}
      </div>

      <ul class="nav-menu">
        <li class="nav-item active" data-panel="analytics">
          <i class="fas fa-chart-line"></i> Analytics
        </li>

        <li class="nav-item" data-panel="products">
          <i class="fas fa-tshirt"></i> Products
        </li>

        <li class="nav-item" data-panel="orders">
          <i class="fas fa-shopping-cart"></i> Orders
        </li>

        <li class="nav-item" data-panel="users">
          <i class="fas fa-users"></i> Users
        </li>

        <li class="nav-item" data-panel="categories">
          <i class="fas fa-tags"></i> Categories
        </li>

        <li class="nav-item" data-panel="coupons">
          <i class="fas fa-ticket-alt"></i> Coupons
        </li>

        <li class="nav-item" data-panel="banners">
          <i class="fas fa-image"></i> Banners
        </li>

        <li class="nav-item" data-panel="inventory">
          <i class="fas fa-boxes"></i> Inventory
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

    <main class="main-content" id="mainContent">
      <div class="dashboard-panel active" id="panel-analytics">
        <h1 class="page-title">Dashboard Analytics</h1>
        <div class="stats-grid">
          <div class="stat-card">
            <div class="icon"><i class="fas fa-dollar-sign"></i></div>
            <div class="stat-value">$128.4K</div>
            <div class="stat-label">Total Revenue</div>
          </div>
          <div class="stat-card">
            <div class="icon"><i class="fas fa-shopping-bag"></i></div>
            <div class="stat-value">1,842</div>
            <div class="stat-label">Total Orders</div>
          </div>
          <div class="stat-card">
            <div class="icon"><i class="fas fa-users"></i></div>
            <div class="stat-value">8.2K</div>
            <div class="stat-label">Customers</div>
          </div>
          <div class="stat-card">
            <div class="icon"><i class="fas fa-box"></i></div>
            <div class="stat-value">356</div>
            <div class="stat-label">Products</div>
          </div>
        </div>
        <div class="charts-row">
          <div class="chart-card"><canvas id="revenueChart"></canvas></div>
          <div class="chart-card"><canvas id="ordersChart"></canvas></div>
        </div>
        <div class="table-wrapper">
          <h3 style="margin-bottom:12px;">Recent Orders</h3>
          <table>
            <tr>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
            <tr>
              <td>#3847</td>
              <td>Alexander Chen</td>
              <td>$5,650</td>
              <td><span class="badge badge-success">Delivered</span></td>
            </tr>
            <tr>
              <td>#3846</td>
              <td>Isabella Ross</td>
              <td>$2,100</td>
              <td><span class="badge badge-info">Shipped</span></td>
            </tr>
            <tr>
              <td>#3845</td>
              <td>Marcus Webb</td>
              <td>$980</td>
              <td><span class="badge badge-warning">Processing</span></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-products">
        <h1 class="page-title">Product Management</h1>
        <button class="btn btn-primary btn-sm" style="margin-bottom:20px;" onclick="alert('Add product modal')">+ Add
          Product</button>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Product</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>Silk Evening Gown</td>
              <td>Dresses</td>
              <td>$2,450</td>
              <td>24</td>
              <td><button class="btn btn-sm btn-outline">Edit</button> <button
                  class="btn btn-sm btn-danger">Delete</button></td>
            </tr>
            <tr>
              <td>Cashmere Overcoat</td>
              <td>Coats</td>
              <td>$3,200</td>
              <td>8</td>
              <td><button class="btn btn-sm btn-outline">Edit</button> <button
                  class="btn btn-sm btn-danger">Delete</button></td>
            </tr>
            <tr>
              <td>Leather Tote</td>
              <td>Bags</td>
              <td>$2,100</td>
              <td>15</td>
              <td><button class="btn btn-sm btn-outline">Edit</button> <button
                  class="btn btn-sm btn-danger">Delete</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-orders">
        <h1 class="page-title">Order Management</h1>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Date</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>#3847</td>
              <td>Alexander Chen</td>
              <td>May 18</td>
              <td>$5,650</td>
              <td><span class="badge badge-success">Delivered</span></td>
              <td><button class="btn btn-sm btn-outline">View</button></td>
            </tr>
            <tr>
              <td>#3846</td>
              <td>Isabella Ross</td>
              <td>May 17</td>
              <td>$2,100</td>
              <td><span class="badge badge-info">Shipped</span></td>
              <td><button class="btn btn-sm btn-outline">View</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-users">
        <h1 class="page-title">User Management</h1>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Orders</th>
              <th>Joined</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>Alexander Chen</td>
              <td>alex@elysian.com</td>
              <td>12</td>
              <td>Jan 2025</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
            <tr>
              <td>Isabella Ross</td>
              <td>isabella@email.com</td>
              <td>5</td>
              <td>Mar 2025</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-categories">
        <h1 class="page-title">Category Management</h1>
        <button class="btn btn-primary btn-sm" style="margin-bottom:20px;">+ Add Category</button>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Category</th>
              <th>Products</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>Dresses</td>
              <td>48</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
            <tr>
              <td>Coats</td>
              <td>32</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-coupons">
        <h1 class="page-title">Coupon Management</h1>
        <button class="btn btn-primary btn-sm" style="margin-bottom:20px;">+ Create Coupon</button>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Code</th>
              <th>Discount</th>
              <th>Usage</th>
              <th>Expiry</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>LUXE20</td>
              <td>20%</td>
              <td>145/500</td>
              <td>Dec 2026</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
            <tr>
              <td>WELCOME10</td>
              <td>10%</td>
              <td>890/1000</td>
              <td>Ongoing</td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-banners">
        <h1 class="page-title">Banner Management</h1>
        <button class="btn btn-primary btn-sm" style="margin-bottom:20px;">+ Add Banner</button>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Title</th>
              <th>Page</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>Summer Sale</td>
              <td>Homepage</td>
              <td><span class="badge badge-success">Active</span></td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
            <tr>
              <td>New Arrivals</td>
              <td>Collection</td>
              <td><span class="badge badge-warning">Draft</span></td>
              <td><button class="btn btn-sm btn-outline">Edit</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="dashboard-panel" id="panel-inventory">
        <h1 class="page-title">Inventory Management</h1>
        <div class="table-wrapper">
          <table>
            <tr>
              <th>Product</th>
              <th>SKU</th>
              <th>Stock</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            <tr>
              <td>Silk Gown</td>
              <td>ELY-SG-001</td>
              <td>24</td>
              <td><span class="badge badge-success">In Stock</span></td>
              <td><button class="btn btn-sm btn-outline">Update</button></td>
            </tr>
            <tr>
              <td>Cashmere Coat</td>
              <td>ELY-CC-002</td>
              <td>3</td>
              <td><span class="badge badge-warning">Low Stock</span></td>
              <td><button class="btn btn-sm btn-outline">Update</button></td>
            </tr>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script>
    // ========== NEW: LARAVEL API BACKEND FETCH CONFIGURATION ==========
    const API_BASE_URL = 'http://localhost:8000/api'; // Replace with your actual Laravel Domain
    const AUTH_TOKEN = localStorage.getItem('admin_auth_token'); // Retrieves your Sanctum/Passport token


    // ========== NAVIGATION & SIDEBAR LOGIC ==========
    const navItems = document.querySelectorAll('.nav-item');
    const panels = document.querySelectorAll('.dashboard-panel');

    navItems.forEach(item => {
      item.addEventListener('click', () => {
        navItems.forEach(n => n.classList.remove('active'));
        item.classList.add('active');

        panels.forEach(p => p.classList.remove('active'));
        const panelId = 'panel-' + item.dataset.panel;
        document.getElementById(panelId).classList.add('active');

        if (window.innerWidth <= 768) {
          closeSidebar();
        }
      });
    });

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
      sidebar.classList.add('open');
      sidebarOverlay.classList.add('active');
    }

    function closeSidebar() {
      sidebar.classList.remove('open');
      sidebarOverlay.classList.remove('active');
    }

    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      if (sidebar.classList.contains('open')) {
        closeSidebar();
      } else {
        openSidebar();
      }
    });

    sidebarOverlay.addEventListener('click', closeSidebar);

    document.getElementById('logoutAdminBtn').addEventListener('click', () => {
      localStorage.removeItem('admin_auth_token'); // Clear token storage keys
      alert("Token destroyed. Redirecting out...");
    });

    // ========== CHART SETUP FUNCTIONS ==========
    function initCharts() {
      const revCtx = document.getElementById('revenueChart')?.getContext('2d');
      if (revCtx) {
        new Chart(revCtx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
              label: 'Revenue ($K)',
              data: [28, 35, 42, 38, 52, 48],
              borderColor: '#C8A96E',
              backgroundColor: 'rgba(200,169,110,0.1)',
              fill: true,
              tension: 0.4,
              pointBackgroundColor: '#C8A96E',
            }]
          },
          options: {
            responsive: true,
            plugins: { legend: { labels: { color: '#B7AFA4' } } },
            scales: {
              x: { ticks: { color: '#B7AFA4' }, grid: { color: 'rgba(255,255,255,0.05)' } },
              y: { ticks: { color: '#B7AFA4' }, grid: { color: 'rgba(255,255,255,0.05)' } }
            }
          }
        });
      }

      const ordCtx = document.getElementById('ordersChart')?.getContext('2d');
      if (ordCtx) {
        new Chart(ordCtx, {
          type: 'bar',
          data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
              label: 'Orders',
              data: [18, 25, 32, 28, 40, 55, 35],
              backgroundColor: '#C8A96E',
              borderRadius: 8,
            }]
          },
          options: {
            responsive: true,
            plugins: { legend: { labels: { color: '#B7AFA4' } } },
            scales: {
              x: { ticks: { color: '#B7AFA4' }, grid: { display: false } },
              y: { ticks: { color: '#B7AFA4' }, grid: { color: 'rgba(255,255,255,0.05)' } }
            }
          }
        });
      }
    }

    // INITIALIZATION RENDER TRIGGERS
    initCharts();
    fetchAuthenticatedUser(); // Run the API fetch immediately on dashboard startup
  </script>
</body>

</html>