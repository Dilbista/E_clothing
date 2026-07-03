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
        /* CSS remains consistent with your luxury theme */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --gold: #C8A96E;
            --gold-dark: #B2914A;
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
            --navbar-height: 70px;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--deep-bg);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

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

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-family: var(--font-display);
            font-size: 2rem;
        }

        /* Table Styles */
        .table-wrapper {
            background: var(--card-bg);
            border-radius: 24px;
            border: 1px solid var(--border-subtle);
            overflow: hidden;
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
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Avatar & Badges */
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
        }

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
        }

        .badge-success {
            background: rgba(111, 159, 124, 0.2);
            color: var(--success);
        }

        .badge-info {
            background: rgba(91, 143, 185, 0.2);
            color: var(--info);
        }

        .badge-warning {
            background: rgba(212, 168, 83, 0.2);
            color: var(--warning);
        }

        .badge-danger {
            background: rgba(212, 115, 94, 0.2);
            color: var(--error);
        }

        .btn {
            padding: 8px 22px;
            border-radius: 40px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        .btn-primary {
            background: var(--gold);
            color: black;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--gold);
            color: var(--gold);
        }

        .btn-danger-sm {
            background: var(--error);
            color: white;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            cursor: pointer;
            border: none;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
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
            padding: 32px;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-size: 0.7rem;
            color: var(--text-secondary);
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            background: #100F0E;
            border: 1px solid var(--border-subtle);
            border-radius: 20px;
            padding: 12px 16px;
            color: white;
            outline: none;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    @include('Backend.layouts.header')
    @include('Backend.layouts.sidebar')

    <div class="admin-layout">
        <main class="main-content">
            <div class="user-container">
                <div class="header-bar">
                    <h1 class="page-title">
                        <i class="fas fa-users" style="margin-right: 12px; color: var(--gold);"></i>
                        User Management
                    </h1>
                    <button class="btn btn-primary" id="openAddUserBtn">
                        <i class="fas fa-user-plus"></i> Add User
                    </button>
                </div>

                <!-- Display Success/Error Messages -->
                @if(session('success'))
                    <div style="color: var(--success); margin-bottom: 20px;">{{ session('success') }}</div>
                @endif

                <div class="table-wrapper">
                    <table>
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
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="user-avatar-small">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    </td>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role_id == \App\Enums\UserType::ADMIN->value)
                                            <span class="badge badge-success">Admin</span>
                                        @elseif($user->role_id == \App\Enums\UserType::SELLER->value)
                                            <span class="badge badge-info">Seller</span>
                                        @else
                                            <span class="badge badge-warning">Customer</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $user->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                            {{ ucfirst($user->status ?? 'active') }}
                                        </span>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <button class="btn-outline btn" style="padding: 4px 12px;"
                                            onclick="openEditUser('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role_id }}', '{{ $user->status }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('users_destroy', $user->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger-sm"
                                                onclick="return confirm('Remove this user?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination-custom-wrapper">
    {{ $users->links() }}
</div>
        </main>
    </div>

 
<style>

    /* --- PAGINATION CONTAINER --- */
.pagination-custom-wrapper {
    background-color: #F8312F; 
    padding: 15px 25px;
    border-radius: 15px;
    margin-top: 30px;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    width: 100%;
    min-height: 70px;
}

/* Force everything into a single horizontal row */
.pagination-custom-wrapper nav,
.pagination-custom-wrapper nav div:last-child,
.pagination-custom-wrapper nav div:last-child span {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 12px;
}

/* Hide the "Showing 1 to 10..." text */
.pagination-custom-wrapper nav div:first-child {
    display: none !important;
}

/* --- ARROWS (White Circles) --- */
.pagination-custom-wrapper a[rel="prev"], 
.pagination-custom-wrapper a[rel="next"],
.pagination-custom-wrapper span[aria-disabled="true"] {
    background-color: #ffffff !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #F8312F !important;
    border: none !important;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s;
}

.pagination-custom-wrapper a:hover {
    transform: scale(1.1);
}

/* --- THE NUMBERS PILL --- */
.pagination-custom-wrapper nav div:last-child .inline-flex {
    background-color: #FFF1F1 !important; /* Light white/pink pill */
    padding: 4px 12px !important;
    border-radius: 30px !important;
    display: flex !important;
    flex-direction: row !important;
    border: none !important;
    gap: 5px;
}

/* Individual Number Styling */
.pagination-custom-wrapper a:not([rel="prev"]):not([rel="next"]) {
    color: #F8312F !important;
    font-weight: 800 !important;
    padding: 6px 12px !important;
    text-decoration: none !important;
    font-size: 0.9rem;
}

/* --- ACTIVE PAGE (Red Circle) --- */
.pagination-custom-wrapper span[aria-current="page"] span {
    background-color: #F8312F !important;
    color: #ffffff !important;
    width: 32px !important;
    height: 32px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 50% !important;
    margin: 0 2px !important;
    font-weight: bold;
    border: none !important;
}

/* SVG Icon Sizing */
.pagination-custom-wrapper svg {
    width: 18px;
    height: 18px;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const paginationLinks = document.querySelectorAll('.pagination-custom-wrapper a');
    
    paginationLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Optional: Add a fade effect to the table when switching pages
            const table = document.querySelector('table');
            if(table) {
                table.style.opacity = '0.5';
                table.style.transition = '0.5s';
            }
        });
    });
});
</script>

    <!-- Modal: Add / Edit User -->
    <div class="modal-overlay" id="userModal">
        <div class="form-modal">
            <h3 id="modalTitle" style="font-family: var(--font-display); margin-bottom: 20px;">Add New User</h3>

            <form id="userForm" method="POST" action="{{ route('users_store') }}">
                @csrf
                <input type="hidden" name="user_id" id="userId">

                <div class="form-group">
                    <label>Full Name *</label>
                    <input type="text" name="name" id="userName" required>
                </div>

                <div class="form-group">
                    <label>Email Address *</label>
                    <input type="email" name="email" id="userEmail" required>
                </div>

                <div class="form-group">
                    <label>Assigned Role *</label>
                    <select name="role_id" id="userRole" required>
                        <option value="{{ \App\Enums\UserType::CUSTOMER->value }}">Customer</option>
                        <option value="{{ \App\Enums\UserType::SELLER->value }}">Seller</option>
                        <option value="{{ \App\Enums\UserType::ADMIN->value }}">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Account Status</label>
                    <select name="status" id="userStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Password (Leave blank if not changing)</label>
                    <input type="password" name="password">
                </div>

                <div class="modal-actions"
                    style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
                    <button type="button" class="btn-outline btn" id="closeModalBtn">Cancel</button>
                    <button type="submit" class="btn-primary btn">Save User</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        const modal = document.getElementById('userModal');
        const userForm = document.getElementById('userForm');

        // Open Add User Modal
        document.getElementById('openAddUserBtn').addEventListener('click', () => {
            userForm.reset();
            document.getElementById('userId').value = '';
            document.getElementById('modalTitle').innerText = 'Add New User';
            modal.classList.add('active');
        });

        // Open Edit User Modal
        function openEditUser(id, name, email, role, status) {
            document.getElementById('userId').value = id;
            document.getElementById('userName').value = name;
            document.getElementById('userEmail').value = email;
            document.getElementById('userRole').value = role;
            document.getElementById('userStatus').value = status;

            document.getElementById('modalTitle').innerText = 'Edit User Details';
            modal.classList.add('active');
        }

        // Close Modal
        document.getElementById('closeModalBtn').addEventListener('click', () => {
            modal.classList.remove('active');
        });

        // Close when clicking background
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.remove('active');
        });
    </script>
</body>

</html>