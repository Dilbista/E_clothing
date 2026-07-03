<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Brand Management</title>
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

    .brand-container {
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

    .brand-logo-preview {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #100F0E;
        border: 1px solid var(--border-subtle);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-display);
        color: var(--gold);
        font-weight: bold;
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

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 30px 20px;
        }

        .header-bar {
            flex-direction: column;
            align-items: stretch;
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
            <div class="brand-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-gem" style="margin-right: 12px; color: var(--gold);"></i>
                        Brand Portfolio</h1>
                    <button class="btn btn-primary" id="openAddBrandBtn"><i class="fas fa-plus"></i> Add New
                        Brand</button>
                </div>

                <div class="table-wrapper">
                    <table id="brandsTable">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Brand Details</th>
                                <th>Origin</th>
                                <th>Product Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="brandsTableBody">
                            @forelse($brands as $brand)
                            <tr>
                                <td>
                                    @if($brand->logo)
                                    <img src="{{ asset($brand->logo) }}" alt="Logo"
                                        style="width: 40px; height: 40px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-subtle);">
                                    @else
                                    <div class="brand-logo-preview">{{ substr($brand->name, 0, 1) }}</div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $brand->name }}</strong><br>
                                    <small
                                        style="color:var(--text-secondary); display: block; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $brand->description ?: 'No description provided' }}
                                    </small>
                                </td>
                                <td><i class="fas fa-map-marker-alt"
                                        style="font-size:0.7rem; color:var(--gold); margin-right:5px;"></i>
                                    {{ $brand->origin ?: 'International' }}</td>
                                <td><span class="badge">{{ $brand->product_count }} Products</span></td>
                                <td style="white-space: nowrap;">
                                    <button class="btn-outline btn-sm edit-brand" data-id="{{ $brand->id }}"
                                        data-name="{{ $brand->name }}" data-origin="{{ $brand->origin }}"
                                        data-description="{{ $brand->description }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger-sm delete-brand"
                                            onclick="return confirm('Are you sure you want to remove this brand?');"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">No brands registered yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add / Edit Brand -->
    <div class="modal-overlay" id="brandModal">
        <div class="form-modal">
            <h3 id="modalTitle">Register Brand</h3>
            <form id="brandForm" action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="brand_id" id="brandId">
                <div class="form-group">
                    <label>Brand Name *</label>
                    <input type="text" name="name" id="brandName" placeholder="e.g., Gucci" required>
                </div>
                <div class="form-group">
                    <label>Brand Logo</label>
                    <input type="file" name="logo" id="brandLogo" accept="image/*" style="padding: 8px;">
                </div>
                <div class="form-group">
                    <label>Country of Origin</label>
                    <input type="text" name="origin" id="brandOrigin" placeholder="e.g., Italy">
                </div>
                <div class="form-group">
                    <label>Brand Story / Description</label>
                    <textarea name="description" id="brandDesc" rows="3"
                        placeholder="Tell the brand's heritage story..."></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Brand</button>
                </div>
            </form>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify">
        <i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3000);
    }

    @if(session('success'))
    showToast("{{ session('success') }}");
    @endif
    @if(session('error'))
    showToast("{{ session('error') }}", true);
    @endif
    @if($errors->any())
    showToast("{{ $errors->first() }}", true);
    @endif

    // Attach event listeners for editing
    document.querySelectorAll('.edit-brand').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('brandId').value = this.dataset.id;
            document.getElementById('brandName').value = this.dataset.name;
            document.getElementById('brandOrigin').value = this.dataset.origin;
            document.getElementById('brandDesc').value = this.dataset.description;
            document.getElementById('modalTitle').innerText = "Edit Brand Details";
            document.getElementById('brandModal').classList.add('active');
        });
    });

    function openAddModal() {
        document.getElementById('brandForm').reset();
        document.getElementById('brandId').value = '';
        document.getElementById('modalTitle').innerText = "Register New Brand";
        document.getElementById('brandModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('brandModal').classList.remove('active');
    }

    document.getElementById('openAddBrandBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    </script>
</body>

</html>