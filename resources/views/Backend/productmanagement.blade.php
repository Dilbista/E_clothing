<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Product Management | Luxury Fashion</title>
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

        .product-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        /* Header & Filters */
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

        /* Buttons */
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

        /* Table */
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

        /* Modal Styling */
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

        /* Toast Notification */
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

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-layout" id="adminLayout">
        @include('Backend.layouts.header')
        @include('Backend.layouts.sidebar')

        <main class="main-content" id="mainContent">
            <div class="product-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-tshirt" style="margin-right: 12px; color: var(--gold);"></i>
                        Product Management</h1>
                    <div class="search-box">
                        <input type="text" id="searchProducts" class="search-input" placeholder="🔍 Search by name...">
                        <button class="btn btn-primary" id="openAddProductBtn"><i class="fas fa-plus"></i> Add
                            Product</button>
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
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border-subtle);">
                                    @else
                                    <div style="width: 50px; height: 50px; border-radius: 8px; background: #100F0E; border: 1px solid var(--border-subtle); display: flex; align-items: center; justify-content: center; color: var(--gold); font-family: var(--font-display); font-weight: bold;">{{ substr($product->name, 0, 1) }}</div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $product->name }}</strong><br>
                                    <small style="color:var(--text-secondary);">
                                        Brand: {{ $product->brand ? $product->brand->name : 'N/A' }} |
                                        Sizes: {{ $product->sizes->pluck('name')->implode(', ') ?: 'N/A' }} |
                                        Colors: {{ $product->colors->pluck('name')->implode(', ') ?: 'N/A' }}
                                    </small>
                                </td>
                                <td><span class="badge">{{ $product->category ? $product->category->category_name : 'Uncategorized' }}</span></td>
                                <td>
                                    ${{ number_format($product->price, 2) }}
                                    @if($product->discount_price)
                                    <br><small style="color:var(--gold);">Discount: ${{ number_format($product->discount_price, 2) }}</small>
                                    @endif
                                </td>
                                <td>{{ $product->stock }}</td>
                                <td style="white-space: nowrap;">
                                    <button class="btn-outline btn-sm edit-product"
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-category="{{ $product->category_id }}"
                                        data-brand="{{ $product->brand_id }}"
                                        data-price="{{ $product->price }}"
                                        data-discount="{{ $product->discount_price }}"
                                        data-stock="{{ $product->stock }}"
                                        data-description="{{ $product->description }}"
                                        data-sizes="{{ $product->sizes->pluck('id')->implode(',') }}"
                                        data-colors="{{ $product->colors->pluck('id')->implode(',') }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger-sm delete-product" onclick="return confirm('Are you sure you want to remove this product?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align:center;">No products registered yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add / Edit Product -->
    <div class="modal-overlay" id="productModal">
        <div class="form-modal">
            <h3 id="modalTitle">Add New Product</h3>
            <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" id="productId">
                <div class="form-group">
                    <label>Product Name *</label>
                    <input type="text" name="name" id="prodName" placeholder="Silk Evening Gown" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category_id" id="prodCategoryId" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->category_id }}">
                                {{ $cat->category_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand *</label>
                        <select name="brand_id" id="prodBrandId" required>
                            <option value="">-- Select Brand --</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Price ($) *</label>
                        <input type="number" step="0.01" name="price" id="prodPrice" placeholder="249.00" required>
                    </div>
                    <div class="form-group">
                        <label>Discount Price ($)</label>
                        <input type="number" step="0.01" name="discount_price" id="prodDiscount" placeholder="199.00">
                    </div>
                    <div class="form-group">
                        <label>Stock *</label>
                        <input type="number" name="stock" id="prodStock" placeholder="15" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Sizes</label>
                        <select name="sizes[]" id="prodSizes" multiple style="height: 80px;">
                            @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Colors</label>
                        <select name="colors[]" id="prodColors" multiple style="height: 80px;">
                            @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="prodDesc" rows="2" placeholder="Luxury fabric, elegant design..."></textarea>
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" id="prodImage" accept="image/*" style="padding: 8px;">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save Product</button>
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

        // Attach event listeners to action buttons
        document.querySelectorAll('.edit-product').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('productId').value = this.dataset.id;
                document.getElementById('prodName').value = this.dataset.name;
                document.getElementById('prodCategoryId').value = this.dataset.category;
                document.getElementById('prodBrandId').value = this.dataset.brand;
                document.getElementById('prodPrice').value = this.dataset.price;
                document.getElementById('prodDiscount').value = this.dataset.discount;
                document.getElementById('prodStock').value = this.dataset.stock;
                document.getElementById('prodDesc').value = this.dataset.description;

                // Handle multi-selects
                const sizeIds = this.dataset.sizes ? this.dataset.sizes.split(',') : [];
                const colorIds = this.dataset.colors ? this.dataset.colors.split(',') : [];

                const sizeSelect = document.getElementById('prodSizes');
                Array.from(sizeSelect.options).forEach(opt => {
                    opt.selected = sizeIds.includes(opt.value);
                });

                const colorSelect = document.getElementById('prodColors');
                Array.from(colorSelect.options).forEach(opt => {
                    opt.selected = colorIds.includes(opt.value);
                });

                document.getElementById('modalTitle').innerText = "Edit Product Details";
                document.getElementById('productModal').classList.add('active');
            });
        });

        function openAddModal() {
            document.getElementById('productForm').reset();
            document.getElementById('productId').value = '';

            const sizeSelect = document.getElementById('prodSizes');
            Array.from(sizeSelect.options).forEach(opt => opt.selected = false);

            const colorSelect = document.getElementById('prodColors');
            Array.from(colorSelect.options).forEach(opt => opt.selected = false);

            document.getElementById('modalTitle').innerText = "Add New Product";
            document.getElementById('productModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('productModal').classList.remove('active');
        }

        document.getElementById('openAddProductBtn').addEventListener('click', openAddModal);
        document.getElementById('closeModalBtn').addEventListener('click', closeModal);
        document.getElementById('productModal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('productModal')) closeModal();
        });

        // simple local search on table rows
        document.getElementById('searchProducts').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#productsTableBody tr');
            rows.forEach(row => {
                if (row.children.length > 1) { // skip 'no products' row
                    const text = row.children[1].textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>

</html>