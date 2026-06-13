<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · User Management</title>
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

    .user-container {
        max-width: 1200px;
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

    .user-avatar-small {
        width: 36px;
        height: 36px;
        background: var(--gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: black;
        font-size: 0.9rem;
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

        .search-input {
            width: 100%;
        }
    }
    </style>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-layout" id="adminLayout">

        <main class="main-content" id="mainContent">
            <div class="user-container">
                <div class="header-bar">
                    <h1 class="page-title"><i class="fas fa-users" style="margin-right: 12px; color: var(--gold);"></i>
                        User
                        Management</h1>
                    <div class="filter-group">
                        <input type="text" id="searchUser" class="search-input"
                            placeholder="🔍 Search by name or email...">
                        <select id="roleFilter" class="filter-select">
                            <option value="all">All Roles</option>
                            <option value="Admin">Admin</option>
                            <option value="Seller">Seller</option>
                            <option value="Customer">Customer</option>
                        </select>
                        <select id="statusFilter" class="filter-select">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <button class="btn btn-primary" id="openAddUserBtn"><i class="fas fa-user-plus"></i> Add
                            User</button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="usersTable">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <tr>
                                <td colspan="7" style="text-align:center;">Loading users...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Add / Edit User -->
    <div class="modal-overlay" id="userModal">
        <div class="form-modal">
            <h3 id="modalTitle">Add New User</h3>
            <form id="userForm">
                <input type="hidden" id="userId">
                <div class="form-group">
                    <label>Full Name *</label>
                    <input type="text" id="userName" placeholder="Isabella Ross" required>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" id="userEmail" placeholder="user@elysian.com" required>
                </div>
                <div class="form-group">
                    <label>Role *</label>
                    <select id="userRole" required>
                        <option value="Customer">Customer</option>
                        <option value="Seller">Seller</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id="userStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Password (min 6 chars, optional for edit)</label>
                    <input type="password" id="userPassword" placeholder="Leave blank to keep unchanged">
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-outline btn-sm" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn-sm">Save User</button>
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


    // ----------------------------- USER DATA (localStorage) -----------------------------
    let users = [];

    // Demo users
    const DEMO_USERS = [{
            id: 1,
            name: "Alexander Chen",
            email: "alex@elysian.com",
            role: "Admin",
            status: "active",
            joined: "2025-01-15",
            password: "admin123"
        },
        {
            id: 2,
            name: "Isabella Ross",
            email: "isabella@elysian.com",
            role: "Seller",
            status: "active",
            joined: "2025-02-20",
            password: "seller123"
        },
        {
            id: 3,
            name: "Marcus Webb",
            email: "marcus@elysian.com",
            role: "Customer",
            status: "active",
            joined: "2025-03-10",
            password: "customer123"
        },
        {
            id: 4,
            name: "Sophia Laurent",
            email: "sophia@elysian.com",
            role: "Customer",
            status: "inactive",
            joined: "2025-04-05",
            password: "sophia123"
        },
        {
            id: 5,
            name: "Oliver Chen",
            email: "oliver@elysian.com",
            role: "Seller",
            status: "active",
            joined: "2025-04-22",
            password: "oliver123"
        }
    ];

    function loadUsers() {
        const stored = localStorage.getItem("elysian_users_module");
        if (stored) {
            users = JSON.parse(stored);
            if (users.length === 0) {
                users = [...DEMO_USERS];
                saveUsers();
            }
        } else {
            users = [...DEMO_USERS];
            saveUsers();
        }
    }

    function saveUsers() {
        localStorage.setItem("elysian_users_module", JSON.stringify(users));
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    // Role badge
    function getRoleBadge(role) {
        if (role === 'Admin') return '<span class="badge badge-success">Admin</span>';
        if (role === 'Seller') return '<span class="badge badge-info">Seller</span>';
        return '<span class="badge badge-warning">Customer</span>';
    }

    function getStatusBadge(status) {
        if (status === 'active') return '<span class="badge badge-success">Active</span>';
        return '<span class="badge badge-danger">Inactive</span>';
    }

    // Render users table with filters
    function renderUsers() {
        const roleFilter = document.getElementById('roleFilter').value;
        const statusFilter = document.getElementById('statusFilter').value;
        const searchTerm = document.getElementById('searchUser').value.toLowerCase();

        let filtered = [...users];
        if (roleFilter !== 'all') filtered = filtered.filter(u => u.role === roleFilter);
        if (statusFilter !== 'all') filtered = filtered.filter(u => u.status === statusFilter);
        if (searchTerm) {
            filtered = filtered.filter(u => u.name.toLowerCase().includes(searchTerm) || u.email.toLowerCase().includes(
                searchTerm));
        }

        const tbody = document.getElementById('usersTableBody');
        if (filtered.length === 0) {
            tbody.innerHTML =
                '<tr><td colspan="7" style="text-align:center;">✨ No users found. Click "Add User" to create one.</td></tr>';
            return;
        }
        tbody.innerHTML = '';
        filtered.forEach(user => {
            const avatarLetter = user.name.charAt(0).toUpperCase();
            const row = `
                <tr>
                  <td><div class="user-avatar-small">${avatarLetter}</div></td>
                  <td><strong>${escapeHtml(user.name)}</strong></td>
                  <td>${escapeHtml(user.email)}</td>
                  <td>${getRoleBadge(user.role)}</td>
                  <td>${getStatusBadge(user.status)}</td>
                  <td>${user.joined || 'N/A'}</td>
                  <td style="white-space: nowrap;">
                    <button class="btn-outline btn-sm edit-user" data-id="${user.id}"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn-danger-sm delete-user" data-id="${user.id}"><i class="fas fa-trash"></i> Del</button>
                  </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // Attach edit/delete events
        document.querySelectorAll('.edit-user').forEach(btn => {
            btn.addEventListener('click', () => openEditUser(parseInt(btn.dataset.id)));
        });
        document.querySelectorAll('.delete-user').forEach(btn => {
            btn.addEventListener('click', () => deleteUser(parseInt(btn.dataset.id)));
        });
    }

    function openEditUser(id) {
        const user = users.find(u => u.id === id);
        if (!user) return;
        document.getElementById('userId').value = user.id;
        document.getElementById('userName').value = user.name;
        document.getElementById('userEmail').value = user.email;
        document.getElementById('userRole').value = user.role;
        document.getElementById('userStatus').value = user.status;
        document.getElementById('userPassword').value = '';
        document.getElementById('modalTitle').innerText = 'Edit User';
        document.getElementById('userModal').classList.add('active');
    }

    function deleteUser(id) {
        if (confirm('Delete this user permanently? This action cannot be undone.')) {
            users = users.filter(u => u.id !== id);
            saveUsers();
            renderUsers();
            showToast('User deleted successfully');
        }
    }

    // Handle form submit (add or edit)
    document.getElementById('userForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const id = document.getElementById('userId').value;
        const name = document.getElementById('userName').value.trim();
        const email = document.getElementById('userEmail').value.trim();
        const role = document.getElementById('userRole').value;
        const status = document.getElementById('userStatus').value;
        const password = document.getElementById('userPassword').value;

        if (!name || !email) {
            showToast('Name and email are required', true);
            return;
        }
        // Email duplicate check (excluding current user if editing)
        const emailExists = users.some(u => u.email.toLowerCase() === email.toLowerCase() && u.id != id);
        if (emailExists) {
            showToast('Email already exists', true);
            return;
        }

        const userData = {
            name,
            email,
            role,
            status
        };
        if (password && password.length >= 3) userData.password = password;

        if (id) {
            // Update existing
            const idx = users.findIndex(u => u.id == id);
            if (idx !== -1) {
                users[idx] = {
                    ...users[idx],
                    ...userData
                };
                saveUsers();
                showToast('User updated successfully');
            }
        } else {
            // Create new
            const newId = Date.now();
            const newUser = {
                id: newId,
                ...userData,
                joined: new Date().toISOString().slice(0, 10),
                password: password || 'default123'
            };
            users.push(newUser);
            saveUsers();
            showToast('New user added');
        }
        renderUsers();
        closeModal();
    });

    function openAddModal() {
        document.getElementById('userForm').reset();
        document.getElementById('userId').value = '';
        document.getElementById('modalTitle').innerText = 'Add New User';
        document.getElementById('userModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('userModal').classList.remove('active');
    }

    // Event listeners
    document.getElementById('openAddUserBtn').addEventListener('click', openAddModal);
    document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    document.getElementById('userModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('userModal')) closeModal();
    });
    document.getElementById('roleFilter').addEventListener('change', renderUsers);
    document.getElementById('statusFilter').addEventListener('change', renderUsers);
    document.getElementById('searchUser').addEventListener('input', renderUsers);

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
    loadUsers();
    renderUsers();
    </script>
</body>

</html>