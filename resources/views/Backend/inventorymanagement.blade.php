<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>ÉLYSIAN · Inventory Management</title>
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
        --text-primary: #F5F0E8;
        --text-secondary: #B7AFA4;
        --border-subtle: rgba(200, 169, 110, 0.2);
        --error: #D4735E;
        --success: #6F9F7C;
        --info: #5B8FB9;
        --warning: #D4A853;
        --font-display: 'Playfair Display', serif;
        --font-body: 'Inter', sans-serif;
    }

    body {
        font-family: var(--font-body);
        background-color: var(--deep-bg);
        color: var(--text-primary);
        line-height: 1.5;
        padding: 2rem;
        min-height: 100vh;
    }

    /* container */
    .inventory-container {
        max-width: 1400px;
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

    /* table */
    .table-wrapper {
        background: var(--card-bg);
        border-radius: 24px;
        border: 1px solid var(--border-subtle);
        overflow-x: auto;
        padding: 0;
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

    .product-thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 12px;
        background: #2a2723;
    }

    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        display: inline-block;
        font-weight: 500;
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

    .btn-sm {
        padding: 6px 16px;
        font-size: 0.7rem;
        border-radius: 30px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        font-family: var(--font-body);
    }

    .btn-primary-sm {
        background: var(--gold);
        color: black;
    }

    .btn-primary-sm:hover {
        background: #dbbf78;
        transform: translateY(-1px);
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
        max-width: 520px;
        padding: 28px 32px;
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.5);
    }

    .form-modal h3 {
        font-family: var(--font-display);
        font-size: 1.6rem;
        margin-bottom: 1rem;
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
    .form-group textarea {
        width: 100%;
        background: #100F0E;
        border: 1px solid var(--border-subtle);
        border-radius: 20px;
        padding: 12px 16px;
        color: white;
        font-family: var(--font-body);
        outline: none;
    }

    .form-group input:focus {
        border-color: var(--gold);
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 24px;
    }

    .btn-outline {
        background: transparent;
        border: 1.5px solid var(--gold);
        color: var(--gold);
    }

    .btn-outline:hover {
        background: rgba(200, 169, 110, 0.1);
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

    @media (max-width: 680px) {
        body {
            padding: 1rem;
        }

        .header-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-group {
            flex-wrap: wrap;
        }

        .search-input {
            width: 100%;
        }

        th,
        td {
            padding: 12px 8px;
        }
    }
    </style>
</head>

<body>

    <div class="inventory-container">
        <div class="header-bar">
            <h1 class="page-title"><i class="fas fa-boxes" style="margin-right: 12px; color: var(--gold);"></i>
                Inventory Management</h1>
            <div class="filter-group">
                <input type="text" id="searchInventory" class="search-input" placeholder="🔍 Search by name or SKU...">
                <select id="stockStatusFilter" class="filter-select">
                    <option value="all">All Stock Status</option>
                    <option value="in_stock">In Stock (>10)</option>
                    <option value="low_stock">Low Stock (1–10)</option>
                    <option value="out_of_stock">Out of Stock (0)</option>
                </select>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Category</th>
                        <th>Current Stock</th>
                        <th>Stock Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="inventoryTableBody">
                    <tr>
                        <td colspan="7" style="text-align:center;">Loading inventory...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Update Stock Modal -->
    <div class="modal-overlay" id="stockModal">
        <div class="form-modal">
            <h3>Update Stock Quantity</h3>
            <form id="stockForm">
                <input type="hidden" id="stockProductId">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" id="stockProductName" readonly style="opacity:0.8;">
                </div>
                <div class="form-group">
                    <label>Current Stock</label>
                    <input type="number" id="currentStock" readonly style="background:#2a2723;">
                </div>
                <div class="form-group">
                    <label>New Stock Quantity *</label>
                    <input type="number" id="newStock" required min="0" step="1">
                </div>
                <div class="form-group">
                    <label>Adjustment Note (optional)</label>
                    <input type="text" id="stockNote" placeholder="e.g., Restock, damaged, return">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeStockModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary-sm btn-sm">Update Stock</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify"><i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ----------------------------- INVENTORY DATA MODEL (localStorage) -----------------------------
    let categories = [];
    let products = [];

    // Demo categories
    const DEMO_CATEGORIES = [{
            id: 1,
            name: "Dresses"
        },
        {
            id: 2,
            name: "Coats"
        },
        {
            id: 3,
            name: "Bags"
        },
        {
            id: 4,
            name: "Accessories"
        }
    ];

    // Demo products with SKU, image, stock
    const DEMO_PRODUCTS = [{
            id: 101,
            name: "Silk Evening Gown",
            sku: "ELY-SG-001",
            category_id: 1,
            price: 2450,
            stock: 24,
            image_url: "https://images.unsplash.com/photo-1566174053879-31557023d8f4?w=100&h=100&fit=crop"
        },
        {
            id: 102,
            name: "Cashmere Overcoat",
            sku: "ELY-CO-002",
            category_id: 2,
            price: 3200,
            stock: 8,
            image_url: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=100&h=100&fit=crop"
        },
        {
            id: 103,
            name: "Leather Tote",
            sku: "ELY-LT-003",
            category_id: 3,
            price: 2100,
            stock: 15,
            image_url: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=100&h=100&fit=crop"
        },
        {
            id: 104,
            name: "Silk Scarf",
            sku: "ELY-SC-004",
            category_id: 4,
            price: 350,
            stock: 0,
            image_url: "https://images.unsplash.com/photo-1601924994987-69e26d50dc26?w=100&h=100&fit=crop"
        }
    ];

    function initData() {
        categories = JSON.parse(localStorage.getItem("elysian_inv_categories"));
        if (!categories) {
            categories = DEMO_CATEGORIES;
            localStorage.setItem("elysian_inv_categories", JSON.stringify(categories));
        }
        products = JSON.parse(localStorage.getItem("elysian_inv_products"));
        if (!products) {
            products = DEMO_PRODUCTS;
            localStorage.setItem("elysian_inv_products", JSON.stringify(products));
        }
    }

    function saveProducts() {
        localStorage.setItem("elysian_inv_products", JSON.stringify(products));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    // Helper: get category name by id
    function getCategoryName(catId) {
        const cat = categories.find(c => c.id === catId);
        return cat ? cat.name : 'Uncategorized';
    }

    // Stock status badge
    function getStockStatusBadge(stock) {
        if (stock <= 0)
        return '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Out of Stock</span>';
        if (stock <= 10)
        return '<span class="badge badge-warning"><i class="fas fa-exclamation-triangle"></i> Low Stock</span>';
        return '<span class="badge badge-success"><i class="fas fa-check-circle"></i> In Stock</span>';
    }

    // Render inventory table with filters
    function renderInventory() {
        const tbody = document.getElementById('inventoryTableBody');
        const statusFilter = document.getElementById('stockStatusFilter').value;
        const searchTerm = document.getElementById('searchInventory').value.toLowerCase();

        let filtered = [...products];
        // stock status filter
        if (statusFilter === 'in_stock') filtered = filtered.filter(p => p.stock > 10);
        else if (statusFilter === 'low_stock') filtered = filtered.filter(p => p.stock > 0 && p.stock <= 10);
        else if (statusFilter === 'out_of_stock') filtered = filtered.filter(p => p.stock === 0);
        // search filter
        if (searchTerm) {
            filtered = filtered.filter(p => p.name.toLowerCase().includes(searchTerm) || (p.sku && p.sku.toLowerCase()
                .includes(searchTerm)));
        }

        if (filtered.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="7" style="text-align:center;">✨ No products match the current filters.</td></tr>';
            return;
        }

        tbody.innerHTML = '';
        filtered.forEach(product => {
            const imgHtml = product.image_url ?
                `<img src="${product.image_url}" class="product-thumb" onerror="this.src='https://placehold.co/48x48?text=No+Image'">` :
                `<div style="width:48px;height:48px;background:#2e2b26;border-radius:12px;"></div>`;
            const row = `
        <tr>
          <td>${imgHtml}</td>
          <td><strong>${escapeHtml(product.name)}</strong></td>
          <td>${escapeHtml(product.sku || '—')}</td>
          <td>${escapeHtml(getCategoryName(product.category_id))}</td>
          <td>${product.stock}</td>
          <td>${getStockStatusBadge(product.stock)}</td>
          <td><button class="btn-primary-sm btn-sm update-stock-btn" data-id="${product.id}"><i class="fas fa-edit"></i> Update Stock</button></td>
        </tr>
      `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // attach event listeners to "Update Stock" buttons
        document.querySelectorAll('.update-stock-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = parseInt(btn.getAttribute('data-id'));
                openStockModal(id);
            });
        });
    }

    // Open modal with product details
    function openStockModal(productId) {
        const product = products.find(p => p.id === productId);
        if (!product) return;
        document.getElementById('stockProductId').value = product.id;
        document.getElementById('stockProductName').value = product.name;
        document.getElementById('currentStock').value = product.stock;
        document.getElementById('newStock').value = product.stock;
        document.getElementById('stockNote').value = '';
        document.getElementById('stockModal').classList.add('active');
    }

    // Handle stock update submission
    document.getElementById('stockForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const id = parseInt(document.getElementById('stockProductId').value);
        const newStock = parseInt(document.getElementById('newStock').value);
        if (isNaN(newStock) || newStock < 0) {
            showToast("Please enter a valid stock quantity (0 or more)", true);
            return;
        }
        const productIndex = products.findIndex(p => p.id === id);
        if (productIndex !== -1) {
            const oldStock = products[productIndex].stock;
            products[productIndex].stock = newStock;
            saveProducts();
            renderInventory();
            showToast(`Stock updated: ${products[productIndex].name} — ${oldStock} → ${newStock}`);
            document.getElementById('stockModal').classList.remove('active');
        } else {
            showToast("Product not found", true);
        }
    });

    // close modal
    document.getElementById('closeStockModalBtn').addEventListener('click', () => {
        document.getElementById('stockModal').classList.remove('active');
    });
    // click outside overlay
    document.getElementById('stockModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('stockModal')) {
            document.getElementById('stockModal').classList.remove('active');
        }
    });

    // filter events
    document.getElementById('stockStatusFilter').addEventListener('change', renderInventory);
    document.getElementById('searchInventory').addEventListener('input', renderInventory);

    // Helper: escape HTML
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, (m) => {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // bootstrap
    initData();
    renderInventory();
    </script>
</body>

</html>