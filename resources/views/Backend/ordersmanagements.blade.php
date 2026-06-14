<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Orders Management</title>
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

    .orders-container {
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

    .filter-select,
    .search-input {
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

    .search-input {
        width: 260px;
        cursor: text;
    }

    .filter-select:focus,
    .search-input:focus {
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

    .badge-info {
        background: rgba(91, 143, 185, 0.2);
        color: var(--info);
    }

    .badge-danger {
        background: rgba(212, 115, 94, 0.2);
        color: var(--error);
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

    .order-modal {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 28px;
        width: 90%;
        max-width: 650px;
        padding: 28px 32px;
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.5);
        max-height: 85vh;
        overflow-y: auto;
    }

    .order-modal h3 {
        font-family: var(--font-display);
        font-size: 1.6rem;
        margin-bottom: 1.2rem;
    }

    .detail-row {
        margin-bottom: 12px;
        display: flex;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding-bottom: 8px;
    }

    .detail-label {
        width: 130px;
        font-weight: 600;
        color: var(--gold);
    }

    .items-list {
        margin-top: 12px;
        background: #0f0e0c;
        border-radius: 16px;
        padding: 12px;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
        font-size: 0.85rem;
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .form-group label {
        display: block;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-secondary);
        margin-bottom: 6px;
    }

    .form-group select {
        width: 100%;
        background: #100F0E;
        border: 1px solid var(--border-subtle);
        border-radius: 20px;
        padding: 10px 16px;
        color: white;
        font-family: var(--font-body);
        outline: none;
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

        .search-input {
            width: 100%;
        }

        .detail-label {
            width: 100px;
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
            <div class="orders-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-shopping-cart"
                            style="margin-right: 12px; color: var(--gold);"></i>
                        Orders Management</h1>
                    <div class="filter-group">
                        <input type="text" id="searchOrders" class="search-input"
                            placeholder="🔍 Search by ID or customer...">
                        <select id="statusFilter" class="filter-select">
                            <option value="all">All Statuses</option>
                            <option value="Pending">Pending</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="ordersTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTableBody">
                            <tr>
                                <td colspan="6" style="text-align:center;">Loading orders...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Update Status -->
    <div class="modal-overlay" id="statusModal">
        <div class="order-modal">
            <h3>Update Order Status</h3>
            <input type="hidden" id="statusOrderId">
            <div class="form-group" style="margin-bottom: 20px;">
                <label>New Status</label>
                <select id="newOrderStatus">
                    <option value="Pending">Pending</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="modal-actions">
                <button class="btn-outline btn-sm" id="closeStatusModalBtn">Cancel</button>
                <button class="btn-primary btn-sm" id="confirmStatusUpdate">Update</button>
            </div>
        </div>
    </div>

    <!-- Modal: Order Details -->
    <div class="modal-overlay" id="detailsModal">
        <div class="order-modal">
            <h3>Order Details</h3>
            <div id="orderDetailsContent"></div>
            <div class="modal-actions" style="margin-top: 25px;">
                <button class="btn-outline btn-sm" id="closeDetailsModalBtn">Close</button>
            </div>
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


    // ----------------------------- ORDERS DATA (LOCALSTORAGE) -----------------------------
    let orders = [];

    // Demo orders with rich details
    const DEMO_ORDERS = [{
            id: "ELY-1001",
            customer: "Alexander Chen",
            date: "2025-05-18",
            total: 5650.00,
            status: "Delivered",
            items: [{
                    name: "Silk Evening Gown",
                    quantity: 1,
                    price: 2450
                },
                {
                    name: "Leather Tote",
                    quantity: 1,
                    price: 2100
                },
                {
                    name: "Cashmere Scarf",
                    quantity: 2,
                    price: 550
                }
            ],
            shipping: "123 Fifth Ave, New York, NY 10001",
            notes: "Gift wrap requested."
        },
        {
            id: "ELY-1002",
            customer: "Isabella Ross",
            date: "2025-05-17",
            total: 3200.00,
            status: "Shipped",
            items: [{
                name: "Cashmere Overcoat",
                quantity: 1,
                price: 3200
            }],
            shipping: "45 Rue du Faubourg, Paris, France",
            notes: "Express delivery."
        },
        {
            id: "ELY-1003",
            customer: "Marcus Webb",
            date: "2025-05-16",
            total: 980.00,
            status: "Pending",
            items: [{
                    name: "Leather Belt",
                    quantity: 2,
                    price: 120
                },
                {
                    name: "Silk Tie",
                    quantity: 3,
                    price: 80
                }
            ],
            shipping: "22 Baker St, London, UK",
            notes: ""
        },
        {
            id: "ELY-1004",
            customer: "Sophia Laurent",
            date: "2025-05-15",
            total: 4320.00,
            status: "Shipped",
            items: [{
                    name: "Evening Gown",
                    quantity: 1,
                    price: 2450
                },
                {
                    name: "Pumps",
                    quantity: 2,
                    price: 935
                }
            ],
            shipping: "Corso Como 10, Milan, Italy",
            notes: "Leave at concierge."
        }
    ];

    function loadOrders() {
        const stored = localStorage.getItem("elysian_orders_module");
        if (stored) {
            orders = JSON.parse(stored);
            if (orders.length === 0) {
                orders = [...DEMO_ORDERS];
                saveOrders();
            }
        } else {
            orders = [...DEMO_ORDERS];
            saveOrders();
        }
    }

    function saveOrders() {
        localStorage.setItem("elysian_orders_module", JSON.stringify(orders));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    function getStatusBadge(status) {
        const map = {
            'Delivered': 'badge-success',
            'Shipped': 'badge-info',
            'Pending': 'badge-warning',
            'Cancelled': 'badge-danger'
        };
        const cls = map[status] || 'badge-info';
        return `<span class="badge ${cls}">${status}</span>`;
    }

    function renderOrders() {
        const statusFilter = document.getElementById('statusFilter').value;
        const searchTerm = document.getElementById('searchOrders').value.toLowerCase();
        let filtered = [...orders];
        if (statusFilter !== 'all') filtered = filtered.filter(o => o.status === statusFilter);
        if (searchTerm) {
            filtered = filtered.filter(o => o.id.toLowerCase().includes(searchTerm) || o.customer.toLowerCase()
                .includes(searchTerm));
        }
        const tbody = document.getElementById('ordersTableBody');
        if (filtered.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;">✨ No orders found.</td></tr>';
            return;
        }
        tbody.innerHTML = '';
        filtered.forEach(order => {
            const row = `
                <tr>
                  <td><strong>${escapeHtml(order.id)}</strong></td>
                  <td>${escapeHtml(order.customer)}</td>
                  <td>${order.date}</td>
                  <td>$${order.total.toFixed(2)}</td>
                  <td>${getStatusBadge(order.status)}</td>
                  <td style="white-space: nowrap;">
                    <button class="btn-outline btn-sm update-status" data-id="${order.id}"><i class="fas fa-sync-alt"></i> Status</button>
                    <button class="btn-primary btn-sm view-details" data-id="${order.id}" style="margin-left: 6px;"><i class="fas fa-eye"></i> View</button>
                  </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // Attach event listeners to buttons
        document.querySelectorAll('.update-status').forEach(btn => {
            btn.addEventListener('click', () => openStatusModal(btn.dataset.id));
        });
        document.querySelectorAll('.view-details').forEach(btn => {
            btn.addEventListener('click', () => openDetailsModal(btn.dataset.id));
        });
    }

    function openStatusModal(orderId) {
        const order = orders.find(o => o.id === orderId);
        if (order) {
            document.getElementById('statusOrderId').value = orderId;
            document.getElementById('newOrderStatus').value = order.status;
            document.getElementById('statusModal').classList.add('active');
        }
    }

    function updateOrderStatus(orderId, newStatus) {
        const idx = orders.findIndex(o => o.id === orderId);
        if (idx !== -1) {
            orders[idx].status = newStatus;
            saveOrders();
            renderOrders();
            showToast(`Order ${orderId} status updated to ${newStatus}`);
        } else {
            showToast("Order not found", true);
        }
    }

    function openDetailsModal(orderId) {
        const order = orders.find(o => o.id === orderId);
        if (!order) return;
        let itemsHtml = '<div class="items-list"><strong>Items:</strong>';
        order.items.forEach(item => {
            itemsHtml +=
                `<div class="item-row"><span>${escapeHtml(item.name)}</span><span>Qty: ${item.quantity} x $${item.price.toFixed(2)} = $${(item.quantity * item.price).toFixed(2)}</span></div>`;
        });
        itemsHtml += '</div>';
        const detailsDiv = document.getElementById('orderDetailsContent');
        detailsDiv.innerHTML = `
          <div class="detail-row"><div class="detail-label">Order ID</div><div>${escapeHtml(order.id)}</div></div>
          <div class="detail-row"><div class="detail-label">Customer</div><div>${escapeHtml(order.customer)}</div></div>
          <div class="detail-row"><div class="detail-label">Order Date</div><div>${order.date}</div></div>
          <div class="detail-row"><div class="detail-label">Total Amount</div><div>$${order.total.toFixed(2)}</div></div>
          <div class="detail-row"><div class="detail-label">Status</div><div>${getStatusBadge(order.status)}</div></div>
          <div class="detail-row"><div class="detail-label">Shipping Address</div><div>${escapeHtml(order.shipping)}</div></div>
          <div class="detail-row"><div class="detail-label">Notes</div><div>${order.notes ? escapeHtml(order.notes) : '—'}</div></div>
          ${itemsHtml}
        `;
        document.getElementById('detailsModal').classList.add('active');
    }

    // Event handlers
    document.getElementById('statusFilter').addEventListener('change', renderOrders);
    document.getElementById('searchOrders').addEventListener('input', renderOrders);
    document.getElementById('confirmStatusUpdate').addEventListener('click', () => {
        const orderId = document.getElementById('statusOrderId').value;
        const newStatus = document.getElementById('newOrderStatus').value;
        updateOrderStatus(orderId, newStatus);
        document.getElementById('statusModal').classList.remove('active');
    });
    document.getElementById('closeStatusModalBtn').addEventListener('click', () => {
        document.getElementById('statusModal').classList.remove('active');
    });
    document.getElementById('closeDetailsModalBtn').addEventListener('click', () => {
        document.getElementById('detailsModal').classList.remove('active');
    });

    // Close modals on overlay click
    document.getElementById('statusModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('statusModal')) {
            document.getElementById('statusModal').classList.remove('active');
        }
    });
    document.getElementById('detailsModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('detailsModal')) {
            document.getElementById('detailsModal').classList.remove('active');
        }
    });

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
    loadOrders();
    renderOrders();
    </script>
</body>

</html>