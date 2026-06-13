<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
  <title>ÉLYSIAN · Complete Admin Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
      padding: 12px;
      border-radius: 40px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: 0.3s;
      border: none;
      font-family: var(--font-body);
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
      padding: 6px 18px;
      font-size: 0.7rem;
      border-radius: 30px;
      width: auto;
      letter-spacing: 1px;
    }

    .btn-danger-sm {
      background: var(--error);
      border: none;
      padding: 6px 14px;
      font-size: 0.7rem;
      border-radius: 30px;
      color: white;
      cursor: pointer;
    }

    .admin-layout {
      display: flex;
      min-height: 100vh;
    }

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
    }

    .nav-profile-section {
      display: flex;
      align-items: center;
      gap: 20px;
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
    }

    .profile-name {
      font-size: 0.85rem;
      font-weight: 600;
    }

    .profile-role {
      font-size: 0.7rem;
      color: var(--gold);
    }

    .sidebar {
      width: 270px;
      background: var(--sidebar-bg);
      border-right: 1px solid var(--border-subtle);
      padding: 25px 18px;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 40;
      overflow-y: auto;
    }

    .sidebar-header {
      font-family: var(--font-display);
      font-size: 1.6rem;
      letter-spacing: 5px;
      text-align: center;
      margin-bottom: 25px;
    }

    .sidebar-header span {
      color: var(--gold);
    }

    .admin-badge {
      text-align: center;
      font-size: 0.7rem;
      color: var(--gold);
      background: rgba(200, 169, 110, 0.08);
      padding: 8px;
      border-radius: 8px;
      margin-bottom: 25px;
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

    .main-content {
      margin-left: 270px;
      margin-top: var(--navbar-height);
      flex: 1;
      padding: 35px;
    }

    .page-title {
      font-family: var(--font-display);
      font-size: 2rem;
      margin-bottom: 25px;
    }

    .dashboard-panel {
      display: none;
      animation: fadeSlide 0.3s ease;
    }

    .dashboard-panel.active {
      display: block;
    }

    @keyframes fadeSlide {
      from {
        opacity: 0;
        transform: translateY(12px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .table-wrapper {
      background: var(--card-bg);
      border-radius: 22px;
      padding: 20px;
      border: 1px solid var(--border-subtle);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 14px 12px;
      text-align: left;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    th {
      color: var(--text-secondary);
      font-weight: 500;
      font-size: 0.7rem;
      letter-spacing: 1px;
    }

    .badge {
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 0.7rem;
      display: inline-block;
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

    .badge-danger {
      background: rgba(212, 115, 94, 0.2);
      color: var(--error);
    }

    .filter-bar {
      display: flex;
      gap: 12px;
      margin-bottom: 25px;
      flex-wrap: wrap;
    }

    .filter-select {
      background: #1f1d1a;
      border: 1px solid var(--border-subtle);
      border-radius: 30px;
      padding: 8px 20px;
      color: white;
      font-family: var(--font-body);
      cursor: pointer;
    }

    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(5px);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
      visibility: hidden;
      opacity: 0;
      transition: 0.2s;
    }

    .modal-overlay.active {
      visibility: visible;
      opacity: 1;
    }

    .form-modal {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: 28px;
      width: 90%;
      max-width: 580px;
      padding: 28px 32px;
      box-shadow: 0 25px 45px rgba(0, 0, 0, 0.5);
      max-height: 85vh;
      overflow-y: auto;
    }

    .form-modal h3 {
      font-family: var(--font-display);
      font-size: 1.6rem;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--text-secondary);
      margin-bottom: 6px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      background: #100F0E;
      border: 1px solid var(--border-subtle);
      border-radius: 16px;
      padding: 12px 14px;
      color: white;
      font-family: var(--font-body);
      outline: none;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--gold);
    }

    .form-row {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    .form-row .form-group {
      flex: 1;
    }

    .modal-actions {
      display: flex;
      gap: 12px;
      justify-content: flex-end;
      margin-top: 20px;
    }

    .toast-notify {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: #1E1C19;
      border-left: 4px solid var(--gold);
      padding: 12px 22px;
      border-radius: 40px;
      color: white;
      font-size: 0.85rem;
      z-index: 1100;
      display: flex;
      align-items: center;
      gap: 10px;
      transform: translateX(400px);
      transition: 0.3s;
    }

    .toast-notify.show {
      transform: translateX(0);
    }

    .banner-thumb {
      width: 80px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      background: #2a2723;
    }

    .product-thumb {
      width: 45px;
      height: 45px;
      object-fit: cover;
      border-radius: 10px;
    }

    .user-avatar-small {
      width: 32px;
      height: 32px;
      background: var(--gold);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: black;
      font-size: 0.8rem;
    }

    .reorder-icon {
      cursor: pointer;
      margin: 0 4px;
      opacity: 0.6;
      transition: 0.2s;
    }
    .reorder-icon:hover { opacity: 1; }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
        transition: 0.3s;
      }
      .sidebar.open {
        transform: translateX(0);
      }
      .top-navbar {
        left: 0;
      }
      .main-content {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>

<body>

<div class="admin-layout">
  <header class="top-navbar">
    <div style="display:flex; align-items:center; gap:20px;">
      <div class="logo" style="font-weight: 600;">ÉLYSIAN</div>
      <div class="nav-search">
        <i class="fas fa-search"></i>
        <input type="text" id="bannerSearchInput" placeholder="Search banners...">
      </div>
    </div>
    <div class="nav-profile-section">
      <div class="admin-profile-card">
        <div class="profile-avatar" id="avatarInitial">E</div>
        <div class="profile-info">
          <span class="profile-name">Elysian Admin</span>
          <span class="profile-role">ADMIN</span>
        </div>
      </div>
    </div>
  </header>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">ÉLYS<span>IAN</span></div>
    <div class="admin-badge"><i class="fas fa-crown"></i> <span id="sidebarUserName">Administrator</span></div>
    <ul class="nav-menu">
      <li class="nav-item" data-panel="analytics"><i class="fas fa-chart-line"></i> Analytics</li>
      <li class="nav-item" data-panel="products"><i class="fas fa-tshirt"></i> Products</li>
      <li class="nav-item" data-panel="orders"><i class="fas fa-shopping-cart"></i> Orders</li>
      <li class="nav-item" data-panel="users"><i class="fas fa-users"></i> Users</li>
      <li class="nav-item" data-panel="categories"><i class="fas fa-tags"></i> Categories</li>
      <li class="nav-item" data-panel="coupons"><i class="fas fa-ticket-alt"></i> Coupons</li>
      <li class="nav-item active" data-panel="banners"><i class="fas fa-image"></i> Banners</li>
    </ul>
    <button class="btn btn-outline" id="logoutBtn" style="margin-top:30px;"><i class="fas fa-sign-out-alt"></i> Logout</button>
  </aside>

  <main class="main-content">
    <!-- Analytics Panel -->
    <div class="dashboard-panel" id="panel-analytics">
      <h1 class="page-title">Analytics Overview</h1>
      <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:22px;">
        <div style="background:var(--card-bg); padding:20px; border-radius:22px;"><div class="stat-value" style="font-size:2rem;">$128.4K</div><div>Revenue</div></div>
        <div style="background:var(--card-bg); padding:20px; border-radius:22px;"><div class="stat-value" style="font-size:2rem;">1,842</div><div>Orders</div></div>
        <div style="background:var(--card-bg); padding:20px; border-radius:22px;"><div class="stat-value" style="font-size:2rem;">356</div><div>Products</div></div>
      </div>
    </div>

    <!-- Products Panel -->
    <div class="dashboard-panel" id="panel-products">
      <div style="display: flex; justify-content: space-between; margin-bottom: 25px;"><h1 class="page-title" style="margin-bottom:0;">Product Management</h1><button class="btn btn-primary btn-sm" id="openAddProductBtn"><i class="fas fa-plus"></i> Add Product</button></div>
      <div class="table-wrapper"><table id="productsTable"><thead><tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead><tbody id="productsTableBody"></tbody></table></div>
    </div>

    <!-- Orders Panel -->
    <div class="dashboard-panel" id="panel-orders">
      <h1 class="page-title">Order Management</h1>
      <div class="filter-bar"><select id="orderStatusFilter" class="filter-select"><option value="all">All Status</option><option value="Pending">Pending</option><option value="Shipped">Shipped</option><option value="Delivered">Delivered</option></select></div>
      <div class="table-wrapper"><table id="ordersTable"><thead><tr><th>Order ID</th><th>Customer</th><th>Date</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead><tbody id="ordersTableBody"></tbody></table></div>
    </div>

    <!-- Users Panel -->
    <div class="dashboard-panel" id="panel-users">
      <div style="display: flex; justify-content: space-between; margin-bottom: 25px;"><h1 class="page-title" style="margin-bottom:0;">User Management</h1><button class="btn btn-primary btn-sm" id="openAddUserBtn"><i class="fas fa-user-plus"></i> Add User</button></div>
      <div class="filter-bar"><select id="roleFilter" class="filter-select"><option value="all">All Roles</option><option value="Admin">Admin</option><option value="Seller">Seller</option><option value="Customer">Customer</option></select><select id="userStatusFilter" class="filter-select"><option value="all">All Status</option><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
      <div class="table-wrapper"><table id="usersTable"><thead><tr><th>Avatar</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Joined</th><th>Actions</th></tr></thead><tbody id="usersTableBody"></tbody></table></div>
    </div>

    <!-- Categories Panel -->
    <div class="dashboard-panel" id="panel-categories">
      <div style="display: flex; justify-content: space-between; margin-bottom: 25px;"><h1 class="page-title" style="margin-bottom:0;">Category Management</h1><button class="btn btn-primary btn-sm" id="openAddCategoryBtn"><i class="fas fa-folder-plus"></i> Add Category</button></div>
      <div class="table-wrapper"><table id="categoriesTable"><thead><tr><th>ID</th><th>Name</th><th>Slug</th><th>Products</th><th>Actions</th></tr></thead><tbody id="categoriesTableBody"></tbody></table></div>
    </div>

    <!-- Coupons Panel -->
    <div class="dashboard-panel" id="panel-coupons">
      <div style="display: flex; justify-content: space-between; margin-bottom: 25px;"><h1 class="page-title" style="margin-bottom:0;">Coupon Management</h1><button class="btn btn-primary btn-sm" id="openAddCouponBtn"><i class="fas fa-tag"></i> Create Coupon</button></div>
      <div class="filter-bar"><select id="couponStatusFilter" class="filter-select"><option value="all">All</option><option value="active">Active</option><option value="expired">Expired</option></select><select id="couponTypeFilter" class="filter-select"><option value="all">All Types</option><option value="percentage">%</option><option value="fixed">$</option></select></div>
      <div class="table-wrapper"><table id="couponsTable"><thead><tr><th>Code</th><th>Discount</th><th>Min.Order</th><th>Expiry</th><th>Usage</th><th>Status</th><th>Actions</th></tr></thead><tbody id="couponsTableBody"></tbody></table></div>
    </div>

    <!-- BANNERS MANAGEMENT (FULL CRUD + ORDERING) -->
    <div class="dashboard-panel active" id="panel-banners">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 class="page-title" style="margin-bottom:0;">Banner Management</h1>
        <button class="btn btn-primary btn-sm" id="openAddBannerBtn"><i class="fas fa-plus-circle"></i> Add Banner</button>
      </div>
      <div class="filter-bar">
        <select id="bannerStatusFilter" class="filter-select">
          <option value="all">All Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
        <select id="bannerPositionFilter" class="filter-select">
          <option value="all">All Positions</option>
          <option value="Homepage">Homepage</option>
          <option value="Collection">Collection</option>
          <option value="Product">Product Page</option>
        </select>
      </div>
      <div class="table-wrapper">
        <table id="bannersTable">
          <thead>
            <tr><th>Image</th><th>Title</th><th>Position</th><th>Link</th><th>Status</th><th>Order</th><th>Actions</th></tr>
          </thead>
          <tbody id="bannersTableBody">
            <tr><td colspan="7" style="text-align:center;">Loading banners...</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<!-- MODAL: Banner Form -->
<div class="modal-overlay" id="bannerModal">
  <div class="form-modal">
    <h3 id="bannerModalTitle">Add New Banner</h3>
    <form id="bannerForm">
      <input type="hidden" id="bannerId">
      <div class="form-group"><label>Title *</label><input type="text" id="bannerTitle" required placeholder="Summer Sale"></div>
      <div class="form-group"><label>Image URL *</label><input type="url" id="bannerImage" required placeholder="https://..."></div>
      <div class="form-row">
        <div class="form-group"><label>Position</label><select id="bannerPosition"><option value="Homepage">Homepage</option><option value="Collection">Collection</option><option value="Product Page">Product Page</option></select></div>
        <div class="form-group"><label>Display Order</label><input type="number" id="bannerOrder" value="0" step="1"></div>
      </div>
      <div class="form-group"><label>Link URL (optional)</label><input type="url" id="bannerLink" placeholder="/collections/sale"></div>
      <div class="form-group"><label>Description</label><textarea id="bannerDesc" rows="2" placeholder="Short description"></textarea></div>
      <div class="form-group"><label>Status</label><select id="bannerStatus"><option value="active">Active</option><option value="inactive">Inactive</option></select></div>
      <div class="modal-actions">
        <button type="button" class="btn btn-outline btn-sm" id="closeBannerModalBtn">Cancel</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Banner</button>
      </div>
    </form>
  </div>
</div>

<!-- Product, Category, User, Coupon modals (simplified but functional) -->
<div class="modal-overlay" id="productModal"><div class="form-modal"><h3 id="productModalTitle">Add Product</h3><form id="productForm"><input type="hidden" id="productId"><div class="form-group"><label>Name</label><input type="text" id="prodName" required></div><div class="form-group"><label>Category</label><select id="prodCategoryId" required></select></div><div class="form-group"><label>Price</label><input type="number" step="0.01" id="prodPrice" required></div><div class="form-group"><label>Stock</label><input type="number" id="prodStock" required></div><div class="form-group"><label>Image URL</label><input type="url" id="prodImage"></div><div class="modal-actions"><button type="button" class="btn btn-outline btn-sm" id="closeProductModalBtn">Cancel</button><button type="submit" class="btn btn-primary btn-sm">Save</button></div></form></div></div>
<div class="modal-overlay" id="categoryModal"><div class="form-modal"><h3 id="categoryModalTitle">Add Category</h3><form id="categoryForm"><input type="hidden" id="categoryId"><div class="form-group"><label>Name</label><input type="text" id="catName" required></div><div class="form-group"><label>Description</label><textarea id="catDesc" rows="2"></textarea></div><div class="modal-actions"><button type="button" class="btn btn-outline btn-sm" id="closeCategoryModalBtn">Cancel</button><button type="submit" class="btn btn-primary btn-sm">Save</button></div></form></div></div>
<div class="modal-overlay" id="userModal"><div class="form-modal"><h3 id="userModalTitle">Add User</h3><form id="userForm"><input type="hidden" id="userId"><div class="form-group"><label>Name</label><input type="text" id="userName" required></div><div class="form-group"><label>Email</label><input type="email" id="userEmail" required></div><div class="form-group"><label>Role</label><select id="userRole"><option>Customer</option><option>Seller</option><option>Admin</option></select></div><div class="form-group"><label>Status</label><select id="userStatus"><option value="active">Active</option><option value="inactive">Inactive</option></select></div><div class="modal-actions"><button type="button" class="btn btn-outline btn-sm" id="closeUserModalBtn">Cancel</button><button type="submit" class="btn btn-primary btn-sm">Save</button></div></form></div></div>
<div class="modal-overlay" id="couponModal"><div class="form-modal"><h3 id="couponModalTitle">Coupon</h3><form id="couponForm"><input type="hidden" id="couponId"><div class="form-group"><label>Code</label><input type="text" id="couponCode" required></div><div class="form-row"><div class="form-group"><label>Type</label><select id="couponType"><option value="percentage">%</option><option value="fixed">$</option></select></div><div class="form-group"><label>Value</label><input type="number" step="0.01" id="couponValue" required></div></div><div class="form-group"><label>Min Order</label><input type="number" step="0.01" id="couponMinOrder" value="0"></div><div class="form-row"><div class="form-group"><label>Expiry</label><input type="date" id="couponExpiry" required></div><div class="form-group"><label>Usage Limit</label><input type="number" id="couponUsageLimit"></div></div><div class="modal-actions"><button type="button" class="btn btn-outline btn-sm" id="closeCouponModalBtn">Cancel</button><button type="submit" class="btn btn-primary btn-sm">Save</button></div></form></div></div>

<div id="toastMsg" class="toast-notify"><i class="fas fa-check-circle"></i> <span id="toastText">Success</span></div>

<script>
  // ----------------------------- GLOBAL STORAGE -----------------------------
  let categories = [], products = [], orders = [], users = [], coupons = [], banners = [];

  // Demo Banners
  const DEMO_BANNERS = [
    { id: 1, title: "Summer Sale", image: "https://images.unsplash.com/photo-1607083206968-13611e3e76db?w=120&h=60&fit=crop", position: "Homepage", link: "/summer-sale", description: "Up to 40% off", status: "active", order: 1 },
    { id: 2, title: "New Arrivals", image: "https://images.unsplash.com/photo-1445205170230-053b83016050?w=120&h=60&fit=crop", position: "Homepage", link: "/new-arrivals", description: "Discover latest collection", status: "active", order: 2 },
    { id: 3, title: "Luxury Coats", image: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=120&h=60&fit=crop", position: "Collection", link: "/coats", description: "Cashmere & wool", status: "inactive", order: 1 }
  ];
  const DEMO_CATEGORIES = [{ id: 1, name: "Dresses", slug: "dresses", description: "", productCount: 1 },{ id: 2, name: "Coats", slug: "coats", productCount: 1 },{ id: 3, name: "Bags", slug: "bags", productCount: 1 }];
  const DEMO_PRODUCTS = [{ id: 101, name: "Silk Gown", category_id: 1, price: 2450, stock: 24, image_url: "https://images.unsplash.com/photo-1566174053879-31557023d8f4?w=100&h=100&fit=crop" },{ id: 102, name: "Cashmere Coat", category_id: 2, price: 3200, stock: 8, image_url: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=100&h=100&fit=crop" }];
  const DEMO_ORDERS = [{ id: "ORD-001", customer: "Alexander Chen", date: "2025-05-18", total: 5650, status: "Delivered" }];
  const DEMO_USERS = [{ id: 1, name: "Alexander Chen", email: "alex@elysian.com", role: "Admin", status: "active", joined: "2025-01-15" }];
  const DEMO_COUPONS = [{ id: 1, code: "LUXE20", type: "percentage", value: 20, minOrder: 100, expiry: "2026-12-31", usageLimit: 500, usedCount: 145, createdAt: "2025-01-01" }];

  function initData() {
    categories = JSON.parse(localStorage.getItem("elysian_categories") || JSON.stringify(DEMO_CATEGORIES));
    products = JSON.parse(localStorage.getItem("elysian_products") || JSON.stringify(DEMO_PRODUCTS));
    orders = JSON.parse(localStorage.getItem("elysian_orders") || JSON.stringify(DEMO_ORDERS));
    users = JSON.parse(localStorage.getItem("elysian_users") || JSON.stringify(DEMO_USERS));
    coupons = JSON.parse(localStorage.getItem("elysian_coupons") || JSON.stringify(DEMO_COUPONS));
    banners = JSON.parse(localStorage.getItem("elysian_banners") || JSON.stringify(DEMO_BANNERS));
    updateProductCounts();
  }
  function updateProductCounts() {
    categories = categories.map(cat => ({ ...cat, productCount: products.filter(p => p.category_id === cat.id).length }));
    localStorage.setItem("elysian_categories", JSON.stringify(categories));
  }
  function saveAll() {
    localStorage.setItem("elysian_categories", JSON.stringify(categories));
    localStorage.setItem("elysian_products", JSON.stringify(products));
    localStorage.setItem("elysian_orders", JSON.stringify(orders));
    localStorage.setItem("elysian_users", JSON.stringify(users));
    localStorage.setItem("elysian_coupons", JSON.stringify(coupons));
    localStorage.setItem("elysian_banners", JSON.stringify(banners));
  }
  function showToast(msg, isErr = false) {
    const toast = document.getElementById('toastMsg');
    document.getElementById('toastText').innerText = msg;
    toast.style.borderLeftColor = isErr ? '#D4735E' : '#C8A96E';
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
  }

  // ----------------------------- BANNERS CRUD + ORDERING -----------------------------
  function renderBanners() {
    const tbody = document.getElementById('bannersTableBody');
    let filtered = [...banners];
    const statusFilter = document.getElementById('bannerStatusFilter').value;
    const positionFilter = document.getElementById('bannerPositionFilter').value;
    const search = document.getElementById('bannerSearchInput').value.toLowerCase();
    if (statusFilter !== 'all') filtered = filtered.filter(b => b.status === statusFilter);
    if (positionFilter !== 'all') filtered = filtered.filter(b => b.position === positionFilter);
    if (search) filtered = filtered.filter(b => b.title.toLowerCase().includes(search) || (b.link && b.link.toLowerCase().includes(search)));
    filtered.sort((a,b) => a.order - b.order);
    if (!filtered.length) { tbody.innerHTML = '<tr><td colspan="7">No banners found</td></tr>'; return; }
    tbody.innerHTML = '';
    filtered.forEach(b => {
      const statusHtml = b.status === 'active' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
      const row = `
        <tr>
          <td><img src="${escapeHtml(b.image)}" class="banner-thumb" onerror="this.src='https://placehold.co/80x40'"></td>
          <td><strong>${escapeHtml(b.title)}</strong><br><small>${escapeHtml(b.description || '')}</small></td>
          <td>${escapeHtml(b.position)}</td>
          <td>${b.link ? `<a href="${escapeHtml(b.link)}" target="_blank" style="color:var(--gold);">Link</a>` : '—'}</td>
          <td>${statusHtml}</td>
          <td style="white-space: nowrap;">
            <i class="fas fa-arrow-up reorder-icon" data-id="${b.id}" data-dir="up"></i>
            <i class="fas fa-arrow-down reorder-icon" data-id="${b.id}" data-dir="down"></i>
            <span style="margin-left:6px;">${b.order}</span>
          </td>
          <td>
            <button class="btn btn-outline btn-sm edit-banner" data-id="${b.id}">Edit</button>
            <button class="btn btn-danger-sm delete-banner" data-id="${b.id}">Del</button>
          </td>
        </tr>
      `;
      tbody.insertAdjacentHTML('beforeend', row);
    });
    document.querySelectorAll('.edit-banner').forEach(btn => btn.addEventListener('click', () => openEditBanner(parseInt(btn.dataset.id))));
    document.querySelectorAll('.delete-banner').forEach(btn => btn.addEventListener('click', () => deleteBanner(parseInt(btn.dataset.id))));
    document.querySelectorAll('.reorder-icon').forEach(icon => icon.addEventListener('click', (e) => {
      const id = parseInt(icon.dataset.id);
      const dir = icon.dataset.dir;
      reorderBanner(id, dir);
    }));
  }
  function reorderBanner(id, dir) {
    const index = banners.findIndex(b => b.id === id);
    if (index === -1) return;
    if (dir === 'up' && index > 0) {
      [banners[index-1].order, banners[index].order] = [banners[index].order, banners[index-1].order];
    } else if (dir === 'down' && index < banners.length-1) {
      [banners[index+1].order, banners[index].order] = [banners[index].order, banners[index+1].order];
    } else return;
    banners.sort((a,b) => a.order - b.order);
    saveAll();
    renderBanners();
    showToast("Order updated");
  }
  function openEditBanner(id) {
    const b = banners.find(b => b.id === id);
    if (b) {
      document.getElementById('bannerId').value = b.id;
      document.getElementById('bannerTitle').value = b.title;
      document.getElementById('bannerImage').value = b.image;
      document.getElementById('bannerPosition').value = b.position;
      document.getElementById('bannerOrder').value = b.order;
      document.getElementById('bannerLink').value = b.link || '';
      document.getElementById('bannerDesc').value = b.description || '';
      document.getElementById('bannerStatus').value = b.status;
      document.getElementById('bannerModalTitle').innerText = "Edit Banner";
      document.getElementById('bannerModal').classList.add('active');
    }
  }
  function deleteBanner(id) {
    if (confirm("Delete this banner permanently?")) {
      banners = banners.filter(b => b.id !== id);
      saveAll();
      renderBanners();
      showToast("Banner deleted");
    }
  }
  document.getElementById('bannerForm').addEventListener('submit', (e) => {
    e.preventDefault();
    const id = document.getElementById('bannerId').value;
    const title = document.getElementById('bannerTitle').value.trim();
    const image = document.getElementById('bannerImage').value.trim();
    if (!title || !image) { showToast("Title and Image URL required", true); return; }
    const newBanner = {
      title,
      image,
      position: document.getElementById('bannerPosition').value,
      order: parseInt(document.getElementById('bannerOrder').value) || 0,
      link: document.getElementById('bannerLink').value,
      description: document.getElementById('bannerDesc').value,
      status: document.getElementById('bannerStatus').value
    };
    if (id) {
      const idx = banners.findIndex(b => b.id == id);
      if (idx !== -1) banners[idx] = { ...banners[idx], ...newBanner };
      showToast("Banner updated");
    } else {
      newBanner.id = Date.now();
      banners.push(newBanner);
      showToast("Banner added");
    }
    saveAll();
    renderBanners();
    document.getElementById('bannerModal').classList.remove('active');
    document.getElementById('bannerForm').reset();
    document.getElementById('bannerId').value = '';
  });
  document.getElementById('openAddBannerBtn').addEventListener('click', () => {
    document.getElementById('bannerForm').reset();
    document.getElementById('bannerId').value = '';
    document.getElementById('bannerModalTitle').innerText = "Add New Banner";
    document.getElementById('bannerOrder').value = banners.length + 1;
    document.getElementById('bannerModal').classList.add('active');
  });
  document.getElementById('closeBannerModalBtn').addEventListener('click', () => document.getElementById('bannerModal').classList.remove('active'));
  document.getElementById('bannerStatusFilter').addEventListener('change', renderBanners);
  document.getElementById('bannerPositionFilter').addEventListener('change', renderBanners);
  document.getElementById('bannerSearchInput').addEventListener('input', renderBanners);

  // ----------------------------- OTHER MODULES (simplified but functional) -----------------------------
  function renderProducts() { /* ... similar to before ... */ const tbody = document.getElementById('productsTableBody'); if(!products.length){tbody.innerHTML='<tr><td colspan="6">No products</td></tr>';return;} tbody.innerHTML=''; products.forEach(p=>{const cat=categories.find(c=>c.id===p.category_id)?.name||'';tbody.insertAdjacentHTML('beforeend',`<tr><td>${p.image_url?`<img src="${p.image_url}" class="product-thumb">`:'<div style="width:45px;height:45px;background:#2e2b26;"></div>'}</td><td>${escapeHtml(p.name)}</td><td>${escapeHtml(cat)}</td><td>$${p.price}</td><td>${p.stock}</td><td><button class="btn btn-outline btn-sm edit-prod" data-id="${p.id}">Edit</button> <button class="btn btn-danger-sm delete-prod" data-id="${p.id}">Del</button></td></tr>`);}); attachProductEvents();}
  function attachProductEvents(){document.querySelectorAll('.edit-prod').forEach(btn=>btn.addEventListener('click',()=>openEditProduct(parseInt(btn.dataset.id))));document.querySelectorAll('.delete-prod').forEach(btn=>btn.addEventListener('click',()=>{products=products.filter(p=>p.id!==parseInt(btn.dataset.id));updateProductCounts();saveAll();renderProducts();showToast("Product deleted");}));}
  function openEditProduct(id){const p=products.find(p=>p.id===id);if(p){document.getElementById('productId').value=p.id;document.getElementById('prodName').value=p.name;document.getElementById('prodCategoryId').value=p.category_id;document.getElementById('prodPrice').value=p.price;document.getElementById('prodStock').value=p.stock;document.getElementById('prodImage').value=p.image_url||'';document.getElementById('productModalTitle').innerText="Edit Product";document.getElementById('productModal').classList.add('active');}}
  document.getElementById('productForm')?.addEventListener('submit',(e)=>{e.preventDefault();const id=document.getElementById('productId').value;const data={name:document.getElementById('prodName').value,category_id:parseInt(document.getElementById('prodCategoryId').value),price:parseFloat(document.getElementById('prodPrice').value),stock:parseInt(document.getElementById('prodStock').value),image_url:document.getElementById('prodImage').value};if(id){const idx=products.findIndex(p=>p.id==id);if(idx!==-1)products[idx]={...products[idx],...data};showToast("Product updated");}else{products.push({id:Date.now(),...data});showToast("Product added");}updateProductCounts();saveAll();renderProducts();document.getElementById('productModal').classList.remove('active');});
  document.getElementById('openAddProductBtn')?.addEventListener('click',()=>{document.getElementById('productForm').reset();document.getElementById('productId').value='';document.getElementById('productModalTitle').innerText="Add Product";document.getElementById('productModal').classList.add('active');});
  document.getElementById('closeProductModalBtn')?.addEventListener('click',()=>document.getElementById('productModal').classList.remove('active'));

  function renderCategories(){const tbody=document.getElementById('categoriesTableBody');tbody.innerHTML=categories.map(c=>`<tr><td>${c.id}</td><td><strong>${escapeHtml(c.name)}</strong><br><small>${escapeHtml(c.description||'')}</small></td><td>${c.slug}</td><td>${c.productCount}</td><td><button class="btn btn-outline btn-sm edit-cat" data-id="${c.id}">Edit</button> <button class="btn btn-danger-sm delete-cat" data-id="${c.id}">Del</button></td></tr>`).join('');attachCategoryEvents();}
  function attachCategoryEvents(){document.querySelectorAll('.edit-cat').forEach(btn=>btn.addEventListener('click',()=>openEditCategory(parseInt(btn.dataset.id))));document.querySelectorAll('.delete-cat').forEach(btn=>btn.addEventListener('click',()=>{if(products.some(p=>p.category_id===parseInt(btn.dataset.id))){showToast("Cannot delete: products use this category",true);return;}categories=categories.filter(c=>c.id!==parseInt(btn.dataset.id));updateProductCounts();saveAll();renderCategories();refreshCategoryDropdown();showToast("Category deleted");}));}
  function openEditCategory(id){const c=categories.find(c=>c.id===id);if(c){document.getElementById('categoryId').value=c.id;document.getElementById('catName').value=c.name;document.getElementById('catDesc').value=c.description||'';document.getElementById('categoryModalTitle').innerText="Edit Category";document.getElementById('categoryModal').classList.add('active');}}
  document.getElementById('categoryForm')?.addEventListener('submit',(e)=>{e.preventDefault();const id=document.getElementById('categoryId').value;const name=document.getElementById('catName').value.trim();if(!name){showToast("Name required",true);return;}const data={name,description:document.getElementById('catDesc').value,slug:name.toLowerCase().replace(/\s+/g,'-')};if(id){const idx=categories.findIndex(c=>c.id==id);if(idx!==-1)categories[idx]={...categories[idx],...data};showToast("Category updated");}else{categories.push({id:Date.now(),...data,productCount:0});showToast("Category added");}updateProductCounts();saveAll();renderCategories();refreshCategoryDropdown();document.getElementById('categoryModal').classList.remove('active');});
  document.getElementById('openAddCategoryBtn')?.addEventListener('click',()=>{document.getElementById('categoryId').value='';document.getElementById('catName').value='';document.getElementById('catDesc').value='';document.getElementById('categoryModalTitle').innerText="Add Category";document.getElementById('categoryModal').classList.add('active');});
  document.getElementById('closeCategoryModalBtn')?.addEventListener('click',()=>document.getElementById('categoryModal').classList.remove('active'));
  function refreshCategoryDropdown(){const select=document.getElementById('prodCategoryId');if(select){select.innerHTML='';categories.forEach(c=>{const opt=document.createElement('option');opt.value=c.id;opt.textContent=c.name;select.appendChild(opt);});}}

  function renderOrders(){const filter=document.getElementById('orderStatusFilter').value;const tbody=document.getElementById('ordersTableBody');let filtered=orders.filter(o=>filter==='all'?true:o.status===filter);tbody.innerHTML=filtered.map(o=>`<tr><td>${o.id}</td><td>${escapeHtml(o.customer)}</td><td>${o.date}</td><td>$${o.total}</td><td><span class="badge badge-${o.status==='Delivered'?'success':(o.status==='Shipped'?'info':'warning')}">${o.status}</span></td><td><button class="btn btn-outline btn-sm">View</button></td></tr>`).join('');}
  document.getElementById('orderStatusFilter')?.addEventListener('change',renderOrders);

  function renderUsers(){const role=document.getElementById('roleFilter').value,status=document.getElementById('userStatusFilter').value;let filtered=users.filter(u=>(role==='all'||u.role===role)&&(status==='all'||u.status===status));const tbody=document.getElementById('usersTableBody');tbody.innerHTML=filtered.map(u=>`<tr><td><div class="user-avatar-small">${u.name.charAt(0)}</div></td><td>${escapeHtml(u.name)}</td><td>${escapeHtml(u.email)}</td><td>${u.role}</td><td><span class="badge ${u.status==='active'?'badge-success':'badge-danger'}">${u.status}</span></td><td>${u.joined||'N/A'}</td><td><button class="btn btn-outline btn-sm edit-user" data-id="${u.id}">Edit</button> <button class="btn btn-danger-sm delete-user" data-id="${u.id}">Del</button></td></tr>`).join('');attachUserEvents();}
  function attachUserEvents(){document.querySelectorAll('.edit-user').forEach(btn=>btn.addEventListener('click',()=>openEditUser(parseInt(btn.dataset.id))));document.querySelectorAll('.delete-user').forEach(btn=>btn.addEventListener('click',()=>{users=users.filter(u=>u.id!==parseInt(btn.dataset.id));saveAll();renderUsers();showToast("User deleted");}));}
  function openEditUser(id){const u=users.find(u=>u.id===id);if(u){document.getElementById('userId').value=u.id;document.getElementById('userName').value=u.name;document.getElementById('userEmail').value=u.email;document.getElementById('userRole').value=u.role;document.getElementById('userStatus').value=u.status;document.getElementById('userModalTitle').innerText="Edit User";document.getElementById('userModal').classList.add('active');}}
  document.getElementById('userForm')?.addEventListener('submit',(e)=>{e.preventDefault();const id=document.getElementById('userId').value;const data={name:document.getElementById('userName').value,email:document.getElementById('userEmail').value,role:document.getElementById('userRole').value,status:document.getElementById('userStatus').value,joined:new Date().toISOString().slice(0,10)};if(id){const idx=users.findIndex(u=>u.id==id);if(idx!==-1)users[idx]={...users[idx],...data};showToast("User updated");}else{users.push({id:Date.now(),...data});showToast("User added");}saveAll();renderUsers();document.getElementById('userModal').classList.remove('active');});
  document.getElementById('openAddUserBtn')?.addEventListener('click',()=>{document.getElementById('userForm').reset();document.getElementById('userId').value='';document.getElementById('userModalTitle').innerText="Add User";document.getElementById('userModal').classList.add('active');});
  document.getElementById('closeUserModalBtn')?.addEventListener('click',()=>document.getElementById('userModal').classList.remove('active'));
  document.getElementById('roleFilter')?.addEventListener('change',renderUsers);
  document.getElementById('userStatusFilter')?.addEventListener('change',renderUsers);

  function renderCoupons(){let filtered=coupons;const statusF=document.getElementById('couponStatusFilter').value;const typeF=document.getElementById('couponTypeFilter').value;const today=new Date().toISOString().slice(0,10);if(statusF!=='all')filtered=filtered.filter(c=>statusF==='active'?c.expiry>=today:c.expiry<today);if(typeF!=='all')filtered=filtered.filter(c=>c.type===typeF);const tbody=document.getElementById('couponsTableBody');tbody.innerHTML=filtered.map(c=>`<tr><td><strong>${c.code}</strong></td><td>${c.type==='percentage'?c.value+'%':'$'+c.value}</td><td>$${c.minOrder}</td><td>${c.expiry}</td><td>${c.usageLimit?`${c.usedCount||0}/${c.usageLimit}`:`${c.usedCount||0}/∞`}</td><td>${c.expiry>=today?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Expired</span>'}</td><td><button class="btn btn-outline btn-sm edit-coupon" data-id="${c.id}">Edit</button> <button class="btn btn-danger-sm delete-coupon" data-id="${c.id}">Del</button></td></tr>`).join('');attachCouponEvents();}
  function attachCouponEvents(){document.querySelectorAll('.edit-coupon').forEach(btn=>btn.addEventListener('click',()=>openEditCoupon(parseInt(btn.dataset.id))));document.querySelectorAll('.delete-coupon').forEach(btn=>btn.addEventListener('click',()=>{coupons=coupons.filter(c=>c.id!==parseInt(btn.dataset.id));saveAll();renderCoupons();showToast("Coupon deleted");}));}
  function openEditCoupon(id){const c=coupons.find(c=>c.id===id);if(c){document.getElementById('couponId').value=c.id;document.getElementById('couponCode').value=c.code;document.getElementById('couponType').value=c.type;document.getElementById('couponValue').value=c.value;document.getElementById('couponMinOrder').value=c.minOrder;document.getElementById('couponExpiry').value=c.expiry;document.getElementById('couponUsageLimit').value=c.usageLimit||'';document.getElementById('couponModalTitle').innerText="Edit Coupon";document.getElementById('couponModal').classList.add('active');}}
  document.getElementById('couponForm')?.addEventListener('submit',(e)=>{e.preventDefault();const id=document.getElementById('couponId').value;const data={code:document.getElementById('couponCode').value.toUpperCase(),type:document.getElementById('couponType').value,value:parseFloat(document.getElementById('couponValue').value),minOrder:parseFloat(document.getElementById('couponMinOrder').value)||0,expiry:document.getElementById('couponExpiry').value,usageLimit:document.getElementById('couponUsageLimit').value?parseInt(document.getElementById('couponUsageLimit').value):null,usedCount:id?coupons.find(c=>c.id==id)?.usedCount||0:0,createdAt:new Date().toISOString().slice(0,10)};if(!data.code||!data.value){showToast("Invalid data",true);return;}if(id){const idx=coupons.findIndex(c=>c.id==id);if(idx!==-1)coupons[idx]={...coupons[idx],...data};showToast("Coupon updated");}else{if(coupons.some(c=>c.code===data.code)){showToast("Code exists",true);return;}coupons.push({id:Date.now(),...data});showToast("Coupon created");}saveAll();renderCoupons();document.getElementById('couponModal').classList.remove('active');});
  document.getElementById('openAddCouponBtn')?.addEventListener('click',()=>{document.getElementById('couponForm').reset();document.getElementById('couponId').value='';document.getElementById('couponModalTitle').innerText="Create Coupon";document.getElementById('couponModal').classList.add('active');});
  document.getElementById('closeCouponModalBtn')?.addEventListener('click',()=>document.getElementById('couponModal').classList.remove('active'));
  document.getElementById('couponStatusFilter')?.addEventListener('change',renderCoupons);
  document.getElementById('couponTypeFilter')?.addEventListener('change',renderCoupons);

  // Navigation
  const navItems = document.querySelectorAll('.nav-item');
  const panels = document.querySelectorAll('.dashboard-panel');
  navItems.forEach(item => {
    item.addEventListener('click', () => {
      navItems.forEach(n => n.classList.remove('active'));
      item.classList.add('active');
      panels.forEach(p => p.classList.remove('active'));
      const panelId = 'panel-' + item.dataset.panel;
      document.getElementById(panelId).classList.add('active');
      if (item.dataset.panel === 'banners') renderBanners();
      if (item.dataset.panel === 'products') { refreshCategoryDropdown(); renderProducts(); }
      if (item.dataset.panel === 'categories') renderCategories();
      if (item.dataset.panel === 'orders') renderOrders();
      if (item.dataset.panel === 'users') renderUsers();
      if (item.dataset.panel === 'coupons') renderCoupons();
    });
  });

  function escapeHtml(str) { if (!str) return ''; return str.replace(/[&<>]/g, m => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[m])); }
  document.getElementById('logoutBtn').addEventListener('click', () => { showToast("Logged out (demo)"); location.reload(); });
  document.getElementById('avatarInitial').innerText = 'E';
  document.getElementById('sidebarUserName').innerText = 'Admin';

  initData();
  refreshCategoryDropdown();
  renderBanners();
  renderProducts();
  renderCategories();
  renderOrders();
  renderUsers();
  renderCoupons();
</script>
</body>

</html>
