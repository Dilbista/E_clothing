<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Coupon Management</title>
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

    /* ========== ADMIN LAYOUT ========== */
    .admin-layout {
        display: flex;
        min-height: 100vh;
        position: relative;
    }

    /* MAIN CONTENT VIEWPORT */
    .main-content {
        margin-left: 270px;
        margin-top: var(--navbar-height);
        flex: 1;
        padding: 35px;
        transition: margin 0.4s;
    }

    .coupon-container {
        max-width: 1300px;
        margin: 0 auto;
    }

    /* header & filters */
    .header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .page-title {
        font-family: var(--font-display);
        font-size: 2rem;
        font-weight: 600;
        letter-spacing: -0.5px;
    }

    .filter-group {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .filter-select {
        background: #1f1d1a;
        border: 1px solid var(--border-subtle);
        border-radius: 40px;
        padding: 8px 20px;
        color: white;
        font-family: var(--font-body);
        cursor: pointer;
        outline: none;
        font-size: 0.85rem;
    }

    .filter-select:focus {
        border-color: var(--gold);
    }

    .btn {
        padding: 8px 22px;
        border-radius: 40px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.2s;
        border: none;
        font-family: var(--font-body);
        font-size: 0.75rem;
    }

    .btn-primary {
        background: var(--gold);
        color: black;
    }

    .btn-primary:hover {
        background: #dbbf78;
        transform: translateY(-1px);
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
        padding: 5px 14px;
        font-size: 0.7rem;
    }

    .btn-danger-sm {
        background: var(--error);
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        color: white;
        font-size: 0.7rem;
        cursor: pointer;
    }

    /* table */
    .table-wrapper {
        background: var(--card-bg);
        border-radius: 24px;
        border: 1px solid var(--border-subtle);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 16px 14px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    th {
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 0.7rem;
        letter-spacing: 1px;
        text-transform: uppercase;
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

    .badge-danger {
        background: rgba(212, 115, 94, 0.2);
        color: var(--error);
    }

    .badge-info {
        background: rgba(91, 143, 185, 0.2);
        color: var(--info);
    }

    /* modal */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(6px);
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
        max-width: 560px;
        padding: 28px 32px;
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.5);
    }

    .form-modal h3 {
        font-family: var(--font-display);
        font-size: 1.6rem;
        margin-bottom: 1.2rem;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-secondary);
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        background: #100F0E;
        border: 1px solid var(--border-subtle);
        border-radius: 20px;
        padding: 12px 16px;
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
        margin-top: 24px;
    }

    /* toast */
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
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .toast-notify.show {
        transform: translateX(0);
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

    /* Responsive Queries */
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

        .header-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            justify-content: space-between;
        }

        .form-row {
            flex-direction: column;
            gap: 0;
        }
    }
    </style>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-layout" id="adminLayout">
        @include('Backend.layouts.header')
        @include('Backend.layouts.sidebar')

        <main class="main-content" id="mainContent">
            <div class="coupon-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-ticket-alt"
                            style="margin-right: 12px; color: var(--gold);"></i>
                        Coupon Management</h1>
                    <div class="filter-group">
                        <select id="couponStatusFilter" class="filter-select">
                            <option value="all">All Coupons</option>
                            <option value="active">Active</option>
                            <option value="expired">Expired</option>
                        </select>
                        <select id="couponTypeFilter" class="filter-select">
                            <option value="all">All Types</option>
                            <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed Amount ($)</option>
                        </select>
                        <button class="btn btn-primary" id="openAddCouponBtn"><i class="fas fa-plus"></i> Create
                            Coupon</button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="couponsTable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Min. Order</th>
                                <th>Expiry Date</th>
                                <th>Usage</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="couponsTableBody">
                            <tr>
                                <td colspan="7" style="text-align:center;">Loading coupons...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add / Edit Coupon -->
    <div class="modal-overlay" id="couponModal">
        <div class="form-modal">
            <h3 id="modalTitle">Create Coupon</h3>
            <form id="couponForm">
                <input type="hidden" id="couponId">
                <div class="form-group">
                    <label>Coupon Code *</label>
                    <input type="text" id="couponCode" placeholder="e.g., SUMMER20" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Discount Type</label>
                        <select id="couponType">
                            <option value="percentage">Percentage (%)</option>
                            <option value="fixed">Fixed Amount ($)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Discount Value *</label>
                        <input type="number" step="0.01" id="couponValue" placeholder="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Minimum Order Amount ($)</label>
                    <input type="number" step="0.01" id="couponMinOrder" placeholder="0.00" value="0">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Expiry Date *</label>
                        <input type="date" id="couponExpiry" required>
                    </div>
                    <div class="form-group">
                        <label>Usage Limit (optional)</label>
                        <input type="number" id="couponUsageLimit" placeholder="Unlimited">
                    </div>
                </div>
                <div class="form-group">
                    <label>Used Count (read‑only)</label>
                    <input type="number" id="couponUsedCount" readonly style="background:#2a2723;" value="0">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Coupon</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify">
        <i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ========== SIDEBAR & NAVIGATION TOGGLE ==========
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        if (sidebar) sidebar.classList.add('open');
        if (sidebarOverlay) sidebarOverlay.classList.add('active');
    }

    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('open');
        if (sidebarOverlay) sidebarOverlay.classList.remove('active');
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            if (sidebar && sidebar.classList.contains('open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }


    // ----------------------------- COUPON DATA (LocalStorage) -----------------------------
    let coupons = [];

    // Demo coupons
    const DEMO_COUPONS = [{
            id: 1,
            code: "LUXE20",
            type: "percentage",
            value: 20,
            minOrder: 100,
            expiry: "2026-12-31",
            usageLimit: 500,
            usedCount: 145,
            createdAt: "2025-01-01"
        },
        {
            id: 2,
            code: "WELCOME10",
            type: "percentage",
            value: 10,
            minOrder: 0,
            expiry: "2025-12-31",
            usageLimit: 1000,
            usedCount: 890,
            createdAt: "2025-01-15"
        },
        {
            id: 3,
            code: "FREESHIP",
            type: "fixed",
            value: 15,
            minOrder: 50,
            expiry: "2025-06-30",
            usageLimit: 200,
            usedCount: 67,
            createdAt: "2025-02-10"
        },
        {
            id: 4,
            code: "ELYSIAN100",
            type: "fixed",
            value: 100,
            minOrder: 500,
            expiry: "2025-05-01",
            usageLimit: 50,
            usedCount: 50,
            createdAt: "2025-03-01"
        } // expired
    ];

    function loadCoupons() {
        const stored = localStorage.getItem("elysian_coupons_module");
        if (stored) {
            coupons = JSON.parse(stored);
            if (coupons.length === 0) {
                coupons = [...DEMO_COUPONS];
                saveCoupons();
            }
        } else {
            coupons = [...DEMO_COUPONS];
            saveCoupons();
        }
    }

    function saveCoupons() {
        localStorage.setItem("elysian_coupons_module", JSON.stringify(coupons));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    // Helper: check if coupon is expired
    function isExpired(expiryDate) {
        const today = new Date().toISOString().slice(0, 10);
        return expiryDate < today;
    }

    // Render table with filters
    function renderCoupons() {
        const statusFilter = document.getElementById('couponStatusFilter').value;
        const typeFilter = document.getElementById('couponTypeFilter').value;
        const tbody = document.getElementById('couponsTableBody');

        let filtered = [...coupons];
        if (statusFilter === 'active') filtered = filtered.filter(c => !isExpired(c.expiry));
        if (statusFilter === 'expired') filtered = filtered.filter(c => isExpired(c.expiry));
        if (typeFilter !== 'all') filtered = filtered.filter(c => c.type === typeFilter);
        filtered.sort((a, b) => new Date(b.expiry) - new Date(a.expiry));

        if (filtered.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="7" style="text-align:center;">✨ No coupons found. Create your first coupon!</td></tr>';
            return;
        }

        tbody.innerHTML = '';
        filtered.forEach(c => {
            const discountDisplay = c.type === 'percentage' ? `${c.value}%` : `$${c.value.toFixed(2)}`;
            const usageDisplay = c.usageLimit ? `${c.usedCount} / ${c.usageLimit}` : `${c.usedCount} / ∞`;
            const expired = isExpired(c.expiry);
            const statusBadge = expired ? '<span class="badge badge-danger">Expired</span>' :
                '<span class="badge badge-success">Active</span>';
            const row = `
                <tr>
                  <td><strong>${escapeHtml(c.code)}</strong></td>
                  <td>${discountDisplay}</td>
                  <td>$${c.minOrder.toFixed(2)}</td>
                  <td>${c.expiry}</td>
                  <td>${usageDisplay}</td>
                  <td>${statusBadge}</td>
                  <td style="white-space: nowrap;">
                    <button class="btn-outline btn-sm edit-coupon" data-id="${c.id}"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn-danger-sm delete-coupon" data-id="${c.id}" style="margin-left: 6px;"><i class="fas fa-trash"></i> Del</button>
                  </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // Attach edit/delete events
        document.querySelectorAll('.edit-coupon').forEach(btn => {
            btn.addEventListener('click', () => openEditCoupon(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.delete-coupon').forEach(btn => {
            btn.addEventListener('click', () => deleteCoupon(parseInt(btn.dataset.id)));
        });
    }

    function openEditCoupon(id) {
        const coupon = coupons.find(c => c.id === id);
        if (!coupon) return;
        document.getElementById('couponId').value = coupon.id;
        document.getElementById('couponCode').value = coupon.code;
        document.getElementById('couponType').value = coupon.type;
        document.getElementById('couponValue').value = coupon.value;
        document.getElementById('couponMinOrder').value = coupon.minOrder;
        document.getElementById('couponExpiry').value = coupon.expiry;
        document.getElementById('couponUsageLimit').value = coupon.usageLimit || '';
        document.getElementById('couponUsedCount').value = coupon.usedCount;
        document.getElementById('modalTitle').innerText = "Edit Coupon";
        document.getElementById('couponModal').classList.add('active');
    }

    function deleteCoupon(id) {
        if (confirm("Delete this coupon permanently? This action cannot be undone.")) {
            coupons = coupons.filter(c => c.id !== id);
            saveCoupons();
            renderCoupons();
            showToast("Coupon deleted successfully");
        }
    }

    // Handle form submit (add or edit)
    document.getElementById('couponForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('couponId').value;
        let code = document.getElementById('couponCode').value.trim().toUpperCase();
        const type = document.getElementById('couponType').value;
        const value = parseFloat(document.getElementById('couponValue').value);
        const minOrder = parseFloat(document.getElementById('couponMinOrder').value) || 0;
        const expiry = document.getElementById('couponExpiry').value;
        let usageLimit = document.getElementById('couponUsageLimit').value;
        usageLimit = usageLimit ? parseInt(usageLimit) : null;
        const usedCount = id ? parseInt(document.getElementById('couponUsedCount').value) : 0;

        // Validation
        if (!code) {
            showToast("Coupon code is required", true);
            return;
        }
        if (isNaN(value) || value <= 0) {
            showToast("Valid discount value required", true);
            return;
        }
        if (!expiry) {
            showToast("Expiry date required", true);
            return;
        }
        if (type === 'percentage' && value > 100) {
            showToast("Percentage discount cannot exceed 100%", true);
            return;
        }

        // Check duplicate code
        if (!id && coupons.some(c => c.code === code)) {
            showToast("Coupon code already exists", true);
            return;
        }
        if (id) {
            const existing = coupons.find(c => c.id != id && c.code === code);
            if (existing) {
                showToast("Another coupon with this code already exists", true);
                return;
            }
        }

        const couponData = {
            code,
            type,
            value,
            minOrder,
            expiry,
            usageLimit,
            usedCount: usedCount,
            createdAt: id ? (coupons.find(c => c.id == id)?.createdAt || new Date().toISOString().slice(0,
                10)) : new Date().toISOString().slice(0, 10)
        };

        if (id) {
            // Update existing
            const idx = coupons.findIndex(c => c.id == id);
            if (idx !== -1) {
                coupons[idx] = {
                    ...coupons[idx],
                    ...couponData
                };
                showToast("Coupon updated successfully");
            }
        } else {
            // Create new
            const newId = Date.now();
            coupons.push({
                id: newId,
                ...couponData
            });
            showToast("Coupon created successfully");
        }
        saveCoupons();
        renderCoupons();
        closeModal();
    });

    function openAddModal() {
        document.getElementById('couponForm').reset();
        document.getElementById('couponId').value = '';
        document.getElementById('couponUsedCount').value = '0';
        document.getElementById('couponType').value = 'percentage';
        document.getElementById('couponMinOrder').value = '0';
        document.getElementById('modalTitle').innerText = "Create Coupon";
        document.getElementById('couponModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('couponModal').classList.remove('active');
    }

    // Event listeners
    document.getElementById('openAddCouponBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('couponModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('couponModal')) closeModal();
    });
    document.getElementById('couponStatusFilter').addEventListener('change', renderCoupons);
    document.getElementById('couponTypeFilter').addEventListener('change', renderCoupons);

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, (m) => {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Bootstrap
    loadCoupons();
    renderCoupons();
    </script>
</body>

</html>