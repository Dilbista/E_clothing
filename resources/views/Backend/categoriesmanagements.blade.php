<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>ÉLYSIAN · Category Management</title>
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

    .category-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* header */
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
        max-width: 520px;
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
    .form-group textarea:focus {
        border-color: var(--gold);
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

    @media (max-width: 640px) {
        body {
            padding: 1rem;
        }

        .header-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .form-modal {
            padding: 20px;
        }
    }
    </style>
</head>

<body>

    <div class="category-container">
        <div class="header-bar">
            <h1 class="page-title"><i class="fas fa-tags" style="margin-right: 12px; color: var(--gold);"></i> Category
                Management</h1>
            <button class="btn btn-primary" id="openAddCategoryBtn"><i class="fas fa-plus"></i> Add Category</button>
        </div>

        <div class="table-wrapper">
            <table id="categoriesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Products Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="categoriesTableBody">
                    <tr>
                        <td colspan="5" style="text-align:center;">Loading categories...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal: Add / Edit Category -->
    <div class="modal-overlay" id="categoryModal">
        <div class="form-modal">
            <h3 id="modalTitle">Add Category</h3>
            <form id="categoryForm">
                <input type="hidden" id="categoryId">
                <div class="form-group">
                    <label>Category Name *</label>
                    <input type="text" id="catName" placeholder="e.g., Evening Dresses" required>
                </div>
                <div class="form-group">
                    <label>Description (optional)</label>
                    <textarea id="catDesc" rows="3" placeholder="Brief description of the category"></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Category</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify"><i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ----------------------------- CATEGORY DATA MODEL (localStorage) -----------------------------
    let categories = [];

    // Demo categories with product counts (simulated)
    const DEMO_CATEGORIES = [{
            id: 1,
            name: "Dresses",
            slug: "dresses",
            description: "Elegant evening & casual dresses",
            productCount: 12
        },
        {
            id: 2,
            name: "Coats",
            slug: "coats",
            description: "Luxury outerwear",
            productCount: 8
        },
        {
            id: 3,
            name: "Bags",
            slug: "bags",
            description: "Designer handbags & clutches",
            productCount: 15
        },
        {
            id: 4,
            name: "Accessories",
            slug: "accessories",
            description: "Scarves, belts, jewelry",
            productCount: 24
        }
    ];

    function loadCategories() {
        const stored = localStorage.getItem("elysian_categories_module");
        if (stored) {
            categories = JSON.parse(stored);
            if (categories.length === 0) {
                categories = [...DEMO_CATEGORIES];
                saveCategories();
            }
        } else {
            categories = [...DEMO_CATEGORIES];
            saveCategories();
        }
    }

    function saveCategories() {
        localStorage.setItem("elysian_categories_module", JSON.stringify(categories));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    // Helper: generate slug from name
    function generateSlug(name) {
        return name.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-').replace(/^-+|-+$/g, '');
    }

    // Render categories table
    function renderCategories() {
        const tbody = document.getElementById('categoriesTableBody');
        if (categories.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="5" style="text-align:center;">✨ No categories yet. Click "Add Category" to create one.</td></tr>';
            return;
        }
        tbody.innerHTML = '';
        categories.forEach(cat => {
            const row = `
        <tr>
          <td>${cat.id}</td>
          <td><strong>${escapeHtml(cat.name)}</strong><br><small style="color:var(--text-secondary);">${escapeHtml(cat.description || '')}</small></td>
          <td>${escapeHtml(cat.slug)}</td>
          <td><span class="badge">${cat.productCount || 0} products</span></td>
          <td style="white-space: nowrap;">
            <button class="btn-outline btn-sm edit-category" data-id="${cat.id}"><i class="fas fa-edit"></i> Edit</button>
            <button class="btn-danger-sm delete-category" data-id="${cat.id}"><i class="fas fa-trash"></i> Del</button>
          </td>
        </tr>
      `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // attach event listeners
        document.querySelectorAll('.edit-category').forEach(btn => {
            btn.addEventListener('click', () => openEditCategory(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.delete-category').forEach(btn => {
            btn.addEventListener('click', () => deleteCategory(parseInt(btn.dataset.id)));
        });
    }

    function openEditCategory(id) {
        const cat = categories.find(c => c.id === id);
        if (!cat) return;
        document.getElementById('categoryId').value = cat.id;
        document.getElementById('catName').value = cat.name;
        document.getElementById('catDesc').value = cat.description || '';
        document.getElementById('modalTitle').innerText = "Edit Category";
        document.getElementById('categoryModal').classList.add('active');
    }

    function deleteCategory(id) {
        const catToDelete = categories.find(c => c.id === id);
        if (!catToDelete) return;
        // optional: check if productCount > 0 and warn
        if (catToDelete.productCount > 0) {
            if (!confirm(
                    `Category "${catToDelete.name}" has ${catToDelete.productCount} product(s). Deleting it will not delete products but they will become uncategorized. Continue?`
                    )) {
                return;
            }
        } else {
            if (!confirm(`Delete category "${catToDelete.name}" permanently?`)) return;
        }
        categories = categories.filter(c => c.id !== id);
        saveCategories();
        renderCategories();
        showToast(`Category "${catToDelete.name}" deleted`);
    }

    // Handle form submit (add or edit)
    document.getElementById('categoryForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('categoryId').value;
        let name = document.getElementById('catName').value.trim();
        const description = document.getElementById('catDesc').value.trim();

        if (!name) {
            showToast("Category name is required", true);
            return;
        }
        // Capitalize first letter of each word (optional)
        name = name.replace(/\b\w/g, c => c.toUpperCase());
        const slug = generateSlug(name);

        if (id) {
            // update existing
            const idx = categories.findIndex(c => c.id == id);
            if (idx !== -1) {
                // preserve productCount
                const oldName = categories[idx].name;
                categories[idx] = {
                    ...categories[idx],
                    name: name,
                    slug: slug,
                    description: description
                };
                saveCategories();
                renderCategories();
                showToast(`Category updated: "${oldName}" → "${name}"`);
            }
        } else {
            // check duplicate name
            if (categories.some(c => c.name.toLowerCase() === name.toLowerCase())) {
                showToast("A category with this name already exists", true);
                return;
            }
            const newId = Date.now();
            const newCategory = {
                id: newId,
                name: name,
                slug: slug,
                description: description,
                productCount: 0
            };
            categories.push(newCategory);
            saveCategories();
            renderCategories();
            showToast(`Category "${name}" created successfully`);
        }
        closeModal();
    });

    function openAddModal() {
        document.getElementById('categoryForm').reset();
        document.getElementById('categoryId').value = '';
        document.getElementById('modalTitle').innerText = "Add Category";
        document.getElementById('categoryModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.remove('active');
    }

    // Event listeners
    document.getElementById('openAddCategoryBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('categoryModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('categoryModal')) closeModal();
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
    loadCategories();
    renderCategories();
    </script>
</body>

</html>