<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <!-- Laravel CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ÉLYSIAN · Banner Management</title>
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

    .banner-container {
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

    .badge-danger {
        background: rgba(212, 115, 94, 0.2);
        color: var(--error);
    }

    .banner-thumb {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        background: #2a2723;
    }

    .reorder-icon {
        cursor: pointer;
        margin: 0 4px;
        opacity: 0.6;
        transition: 0.2s;
    }

    .reorder-icon:hover {
        opacity: 1;
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
        max-height: 85vh;
        overflow-y: auto;
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

    /* Preview styles */
    .image-preview-box {
        margin-top: 10px;
        display: none;
    }

    .image-preview-box img {
        width: 100%;
        max-height: 140px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid var(--border-subtle);
        background: #100F0E;
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

        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .banner-thumb {
            width: 60px;
            height: 40px;
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
            <div class="banner-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-image" style="margin-right: 12px; color: var(--gold);"></i>
                        Banner Management</h1>
                    <div class="filter-group">
                        <input type="text" id="searchBanner" class="search-input"
                            placeholder="🔍 Search by title or link...">
                        <select id="statusFilter" class="filter-select">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <select id="positionFilter" class="filter-select">
                            <option value="all">All Positions</option>
                            <option value="Homepage">Homepage</option>
                            <option value="Collection">Collection</option>
                            <option value="Product Page">Product Page</option>
                        </select>
                        <button class="btn btn-primary" id="openAddBannerBtn"><i class="fas fa-plus-circle"></i> Add
                            Banner</button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="bannersTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Position</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bannersTableBody">
                            <tr>
                                <td colspan="7" style="text-align:center;">Loading banners...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add / Edit Banner -->
    <div class="modal-overlay" id="bannerModal">
        <div class="form-modal">
            <h3 id="modalTitle">Add New Banner</h3>
            <form id="bannerForm">
                <input type="hidden" id="bannerId">
                <div class="form-group">
                    <label>Title *</label>
                    <input type="text" id="bannerTitle" placeholder="Summer Sale" required>
                </div>
                <div class="form-group">
                    <label>Banner Image *</label>
                    <!-- File input for local image upload -->
                    <input type="file" id="bannerImage" accept="image/*">
                    <div class="image-preview-box" id="bannerImagePreviewContainer">
                        <img id="bannerImagePreview" src="" alt="Preview">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Position</label>
                        <select id="bannerPosition">
                            <option value="Homepage">Homepage</option>
                            <option value="Collection">Collection</option>
                            <option value="Product Page">Product Page</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Display Order</label>
                        <input type="number" id="bannerOrder" value="0" step="1">
                    </div>
                </div>
                <div class="form-group">
                    <label>Link URL (optional)</label>
                    <input type="url" id="bannerLink" placeholder="https://example.com/collections/sale">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="bannerDesc" rows="2" placeholder="Short description"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id="bannerStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Banner</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify">
        <i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ========== CSRF Config ==========
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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


    // ----------------------------- BANNERS SYNC OPERATIONS -----------------------------
    let banners = [];

   async function loadBanners() {
    try {
        // Changed to use the direct endpoint path
        const response = await fetch("/admin/banners/data");
        if (!response.ok) throw new Error("Could not load banners.");
        banners = await response.json();
        renderBanners();
    } catch (error) {
        console.error(error);
        showToast("Failed to load banners from server.", true);
    }
}

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    function renderBanners() {
        const statusFilter = document.getElementById('statusFilter').value;
        const positionFilter = document.getElementById('positionFilter').value;
        const searchTerm = document.getElementById('searchBanner').value.toLowerCase();

        let filtered = [...banners];
        if (statusFilter !== 'all') filtered = filtered.filter(b => b.status === statusFilter);
        if (positionFilter !== 'all') filtered = filtered.filter(b => b.position === positionFilter);
        if (searchTerm) {
            filtered = filtered.filter(b => b.title.toLowerCase().includes(searchTerm) || (b.link && b.link
                .toLowerCase().includes(searchTerm)));
        }
        filtered.sort((a, b) => a.order - b.order);

        const tbody = document.getElementById('bannersTableBody');
        if (filtered.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="7" style="text-align:center;">✨ No banners found. Click "Add Banner" to create one.</td></tr>';
            return;
        }

        tbody.innerHTML = '';
        filtered.forEach(b => {
            const statusBadge = b.status === 'active' ?
                '<span class="badge badge-success">Active</span>' :
                '<span class="badge badge-danger">Inactive</span>';
            const row = `
        <tr>
          <td><img src="${escapeHtml(b.image_url)}" class="banner-thumb" onerror="this.src='https://placehold.co/80x50?text=No+Image'"></td>
          <td><strong>${escapeHtml(b.title)}</strong><br><small style="color:var(--text-secondary);">${escapeHtml(b.description || '')}</small></td>
          <td>${escapeHtml(b.position)}</td>
          <td>${b.link ? `<a href="${escapeHtml(b.link)}" target="_blank" style="color:var(--gold);">Link</a>` : '—'}</td>
          <td>${statusBadge}</td>
          <td style="white-space: nowrap;">
            <i class="fas fa-arrow-up reorder-up" data-id="${b.id}" style="cursor:pointer; margin-right:8px;"></i>
            <i class="fas fa-arrow-down reorder-down" data-id="${b.id}" style="cursor:pointer;"></i>
            <span style="margin-left:8px;">${b.order}</span>
           </td>
          <td>
            <button class="btn-outline btn-sm edit-banner" data-id="${b.id}"><i class="fas fa-edit"></i> Edit</button>
            <button class="btn-danger-sm delete-banner" data-id="${b.id}" style="margin-left:6px;"><i class="fas fa-trash"></i> Del</button>
           </td>
        </tr>
      `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // attach events
        document.querySelectorAll('.edit-banner').forEach(btn => {
            btn.addEventListener('click', () => openEditBanner(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.delete-banner').forEach(btn => {
            btn.addEventListener('click', () => deleteBanner(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.reorder-up').forEach(icon => {
            icon.addEventListener('click', () => reorderBanner(parseInt(icon.dataset.id), 'up'));
        });
        document.querySelectorAll('.reorder-down').forEach(icon => {
            icon.addEventListener('click', () => reorderBanner(parseInt(icon.dataset.id), 'down'));
        });
    }

    async function reorderBanner(id, direction) {
        try {
            const response = await fetch(`/admin/banners/${id}/reorder`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ direction })
            });

            const result = await response.json();

            if (response.ok) {
                showToast(result.message || "Ordering updated.");
                loadBanners();
            } else {
                showToast(result.message || "Order change not allowed.", true);
            }
        } catch (error) {
            console.error(error);
            showToast("Ordering synchronization failed.", true);
        }
    }

    function openEditBanner(id) {
        const banner = banners.find(b => b.id === id);
        if (!banner) return;
        document.getElementById('bannerId').value = banner.id;
        document.getElementById('bannerTitle').value = banner.title;
        
        // Clear old file selections. File input cannot have programmatic default paths.
        document.getElementById('bannerImage').value = '';
        document.getElementById('bannerImage').removeAttribute('required');

        // Show thumbnail preview of the existing banner image
        const previewImg = document.getElementById('bannerImagePreview');
        const previewContainer = document.getElementById('bannerImagePreviewContainer');
        if (banner.image_url) {
            previewImg.src = banner.image_url;
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }

        document.getElementById('bannerPosition').value = banner.position;
        document.getElementById('bannerOrder').value = banner.order;
        document.getElementById('bannerLink').value = banner.link || '';
        document.getElementById('bannerDesc').value = banner.description || '';
        document.getElementById('bannerStatus').value = banner.status;
        document.getElementById('modalTitle').innerText = 'Edit Banner';
        document.getElementById('bannerModal').classList.add('active');
    }

    async function deleteBanner(id) {
        if (!confirm('Delete this banner permanently?')) return;

        try {
            const response = await fetch(`/admin/banners/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                showToast(result.message || "Banner removed successfully.");
                loadBanners();
            } else {
                showToast(result.message || "Could not delete banner.", true);
            }
        } catch (error) {
            console.error(error);
            showToast("Server error during banner removal.", true);
        }
    }

    // Handles live file input image preview changes
    document.getElementById('bannerImage').addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('bannerImagePreview').src = e.target.result;
                document.getElementById('bannerImagePreviewContainer').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle form submit (add / edit with Multipart Formdata)
    document.getElementById('bannerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const id = document.getElementById('bannerId').value;
        const title = document.getElementById('bannerTitle').value.trim();
        const position = document.getElementById('bannerPosition').value;
        let order = parseInt(document.getElementById('bannerOrder').value);
        const link = document.getElementById('bannerLink').value.trim();
        const description = document.getElementById('bannerDesc').value.trim();
        const status = document.getElementById('bannerStatus').value;
        const fileInput = document.getElementById('bannerImage');

        if (!title) {
            showToast('Title is required', true);
            return;
        }
        if (!id && fileInput.files.length === 0) {
            showToast('An image file is required to create a banner', true);
            return;
        }
        if (isNaN(order)) order = 0;

        // Build FormData payload to allow file uploads over AJAX
        const formData = new FormData();
        formData.append('title', title);
        formData.append('position', position);
        formData.append('order', order);
        formData.append('link', link);
        formData.append('description', description);
        formData.append('status', status);

        if (fileInput.files.length > 0) {
            formData.append('image', fileInput.files[0]);
        }

        let url = '/admin/banners';
        
        // Method Spoofing: Force PUT values over standard multipart POST request
        if (id) {
            url = `/admin/banners/${id}`;
            formData.append('_method', 'PUT');
        }

        try {
            const response = await fetch(url, {
                method: 'POST', // Keep as POST. Method spoofing handles PUT logic.
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                    // IMPORTANT: Do not set Content-Type. Browser sets boundary automatically.
                },
                body: formData
            });

            const result = await response.json();

            if (response.ok) {
                showToast(result.message || "Banner saved.");
                closeModal();
                loadBanners();
            } else {
                let errorMsg = result.message || "Validation failed.";
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join(" ");
                }
                showToast(errorMsg, true);
            }
        } catch (error) {
            console.error(error);
            showToast("Could not contact server to save banner.", true);
        }
    });

    function openAddModal() {
        document.getElementById('bannerForm').reset();
        document.getElementById('bannerId').value = '';
        
        // Ensure image selection is required on creation
        document.getElementById('bannerImage').setAttribute('required', 'required');
        document.getElementById('bannerImagePreviewContainer').style.display = 'none';
        
        document.getElementById('bannerOrder').value = banners.length + 1;
        document.getElementById('modalTitle').innerText = 'Add New Banner';
        document.getElementById('bannerModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('bannerModal').classList.remove('active');
    }

    // Event listeners
    document.getElementById('openAddBannerBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('bannerModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('bannerModal')) closeModal();
    });
    document.getElementById('statusFilter').addEventListener('change', renderBanners);
    document.getElementById('positionFilter').addEventListener('change', renderBanners);
    document.getElementById('searchBanner').addEventListener('input', renderBanners);

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, (m) => {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Initialize application data
    loadBanners();
    </script>
</body>

</html>