<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>ÉLYSIAN · Product Management</title>
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

    .product-container {
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

    .search-box {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .search-input {
        background: #1f1d1a;
        border: 1px solid var(--border-subtle);
        border-radius: 40px;
        padding: 8px 20px;
        color: white;
        font-family: var(--font-body);
        outline: none;
        font-size: 0.85rem;
        width: 260px;
    }

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

    .btn-danger-sm {
        background: var(--error);
        border: none;
        padding: 5px 12px;
        border-radius: 30px;
        color: white;
        font-size: 0.7rem;
        cursor: pointer;
        margin-left: 6px;
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

    .product-thumb {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 12px;
        background: #2a2723;
    }

    .badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        background: rgba(200, 169, 110, 0.15);
        color: var(--gold);
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
    .form-group select,
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

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
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

    @media (max-width: 680px) {
        body {
            padding: 1rem;
        }

        .header-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-input {
            width: 100%;
        }

        .form-row {
            flex-direction: column;
            gap: 0;
        }
    }
    </style>
</head>

<body>

    <div class="product-container">
        <div class="header-bar">
            <h1 class="page-title"><i class="fas fa-tshirt" style="margin-right: 12px; color: var(--gold);"></i> Product
                Management</h1>
            <div class="search-box">
                <input type="text" id="searchProducts" class="search-input" placeholder="🔍 Search by name...">
                <button class="btn btn-primary" id="openAddProductBtn"><i class="fas fa-plus"></i> Add Product</button>
            </div>
        </div>

        <div class="table-wrapper">
            <table id="productsTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    <tr>
                        <td colspan="6" style="text-align:center;">Loading products...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal: Add / Edit Product -->
    <div class="modal-overlay" id="productModal">
        <div class="form-modal">
            <h3 id="modalTitle">Add New Product</h3>
            <form id="productForm">
                <input type="hidden" id="productId">
                <div class="form-group">
                    <label>Product Name *</label>
                    <input type="text" id="prodName" placeholder="Silk Evening Gown" required>
                </div>
                <div class="form-group">
                    <label>Category *</label>
                    <select id="prodCategoryId" required>
                        <option value="">-- Select Category --</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Price ($) *</label>
                        <input type="number" step="0.01" id="prodPrice" placeholder="249.00" required>
                    </div>
                    <div class="form-group">
                        <label>Stock *</label>
                        <input type="number" id="prodStock" placeholder="15" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="prodDesc" rows="2" placeholder="Luxury fabric, elegant design..."></textarea>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="url" id="prodImage" placeholder="https://example.com/image.jpg">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify"><i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ----------------------------- PRODUCT & CATEGORY DATA (localStorage) -----------------------------
    let products = [];
    let categories = [];

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

    // Demo products
    const DEMO_PRODUCTS = [{
            id: 101,
            name: "Silk Evening Gown",
            category_id: 1,
            price: 2450.00,
            stock: 24,
            description: "Exquisite silk gown with hand-embroidered details.",
            image_url: "https://images.unsplash.com/photo-1566174053879-31557023d8f4?w=100&h=100&fit=crop"
        },
        {
            id: 102,
            name: "Cashmere Overcoat",
            category_id: 2,
            price: 3200.00,
            stock: 8,
            description: "Luxurious cashmere overcoat, perfect for winter.",
            image_url: "https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=100&h=100&fit=crop"
        },
        {
            id: 103,
            name: "Leather Tote",
            category_id: 3,
            price: 2100.00,
            stock: 15,
            description: "Handcrafted Italian leather tote bag.",
            image_url: "https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=100&h=100&fit=crop"
        }
    ];

    function loadCategories() {
        const stored = localStorage.getItem("elysian_products_categories");
        if (stored) {
            categories = JSON.parse(stored);
        } else {
            categories = [...DEMO_CATEGORIES];
            localStorage.setItem("elysian_products_categories", JSON.stringify(categories));
        }
        renderCategoryDropdown();
    }

    function renderCategoryDropdown() {
        const select = document.getElementById('prodCategoryId');
        select.innerHTML = '<option value="">-- Select Category --</option>';
        categories.forEach(cat => {
            const opt = document.createElement('option');
            opt.value = cat.id;
            opt.textContent = cat.name;
            select.appendChild(opt);
        });
    }

    function loadProducts() {
        const stored = localStorage.getItem("elysian_products_data");
        if (stored) {
            products = JSON.parse(stored);
            if (products.length === 0) {
                products = [...DEMO_PRODUCTS];
                saveProducts();
            }
        } else {
            products = [...DEMO_PRODUCTS];
            saveProducts();
        }
    }

    function saveProducts() {
        localStorage.setItem("elysian_products_data", JSON.stringify(products));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    // Render product table
    function renderProducts() {
        const searchTerm = document.getElementById('searchProducts').value.toLowerCase();
        let filtered = [...products];
        if (searchTerm) {
            filtered = filtered.filter(p => p.name.toLowerCase().includes(searchTerm));
        }
        const tbody = document.getElementById('productsTableBody');
        if (filtered.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="6" style="text-align:center;">✨ No products found. Click "Add Product" to create one.</td></tr>';
            return;
        }
        tbody.innerHTML = '';
        filtered.forEach(prod => {
            const cat = categories.find(c => c.id === prod.category_id) || {
                name: 'Uncategorized'
            };
            const imgHtml = prod.image_url ?
                `<img src="${prod.image_url}" class="product-thumb" onerror="this.src='https://placehold.co/50x50?text=No+Image'">` :
                `<div style="width:50px;height:50px;background:#2e2b26;border-radius:12px;"></div>`;
            const row = `
        <tr>
          <td>${imgHtml}</td>
          <td><strong>${escapeHtml(prod.name)}</strong></td>
          <td>${escapeHtml(cat.name)}</td>
          <td>$${prod.price.toFixed(2)}</td>
          <td>${prod.stock}</td>
          <td style="white-space: nowrap;">
            <button class="btn-outline btn-sm edit-product" data-id="${prod.id}"><i class="fas fa-edit"></i> Edit</button>
            <button class="btn-danger-sm delete-product" data-id="${prod.id}"><i class="fas fa-trash"></i> Del</button>
          </td>
        </tr>
      `;
            tbody.insertAdjacentHTML('beforeend', row);
        });
        // attach event listeners to buttons
        document.querySelectorAll('.edit-product').forEach(btn => {
            btn.addEventListener('click', () => openEditProduct(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.delete-product').forEach(btn => {
            btn.addEventListener('click', () => deleteProduct(parseInt(btn.dataset.id)));
        });
    }

    function openEditProduct(id) {
        const prod = products.find(p => p.id === id);
        if (!prod) return;
        document.getElementById('productId').value = prod.id;
        document.getElementById('prodName').value = prod.name;
        document.getElementById('prodCategoryId').value = prod.category_id;
        document.getElementById('prodPrice').value = prod.price;
        document.getElementById('prodStock').value = prod.stock;
        document.getElementById('prodDesc').value = prod.description || '';
        document.getElementById('prodImage').value = prod.image_url || '';
        document.getElementById('modalTitle').innerText = "Edit Product";
        document.getElementById('productModal').classList.add('active');
    }

    function deleteProduct(id) {
        if (confirm("Delete this product permanently?")) {
            products = products.filter(p => p.id !== id);
            saveProducts();
            renderProducts();
            showToast("Product deleted successfully");
        }
    }

    // Handle form submit (add or edit)
    document.getElementById('productForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('productId').value;
        const name = document.getElementById('prodName').value.trim();
        const category_id = parseInt(document.getElementById('prodCategoryId').value);
        const price = parseFloat(document.getElementById('prodPrice').value);
        const stock = parseInt(document.getElementById('prodStock').value);
        const description = document.getElementById('prodDesc').value.trim();
        const image_url = document.getElementById('prodImage').value.trim();

        if (!name) {
            showToast("Product name is required", true);
            return;
        }
        if (!category_id) {
            showToast("Please select a category", true);
            return;
        }
        if (isNaN(price) || price <= 0) {
            showToast("Valid price required", true);
            return;
        }
        if (isNaN(stock) || stock < 0) {
            showToast("Valid stock quantity required", true);
            return;
        }

        const productData = {
            name,
            category_id,
            price,
            stock,
            description,
            image_url
        };

        if (id) {
            // update existing
            const idx = products.findIndex(p => p.id == id);
            if (idx !== -1) {
                products[idx] = {
                    ...products[idx],
                    ...productData
                };
                saveProducts();
                showToast("Product updated successfully");
            }
        } else {
            // create new
            const newId = Date.now();
            products.push({
                id: newId,
                ...productData
            });
            saveProducts();
            showToast("Product added successfully");
        }
        renderProducts();
        closeModal();
    });

    function openAddModal() {
        document.getElementById('productForm').reset();
        document.getElementById('productId').value = '';
        document.getElementById('modalTitle').innerText = "Add New Product";
        document.getElementById('productModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('productModal').classList.remove('active');
    }

    // Event listeners
    document.getElementById('openAddProductBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('productModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('productModal')) closeModal();
    });
    document.getElementById('searchProducts').addEventListener('input', renderProducts);

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
    loadCategories();
    loadProducts();
    renderProducts();
    </script>
</body>

</html>