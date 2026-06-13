<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Admin Profile Management</title>
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

    /* Profile Card Container */
    .profile-container {
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
    }

    .profile-card {
        background: var(--card-bg);
        border-radius: 32px;
        border: 1px solid var(--border-subtle);
        overflow: hidden;
        backdrop-filter: blur(2px);
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.5);
    }

    .profile-header {
        background: linear-gradient(135deg, rgba(200, 169, 110, 0.15), rgba(0, 0, 0, 0.4));
        padding: 2rem 2rem 1.5rem;
        text-align: center;
        border-bottom: 1px solid var(--border-subtle);
    }

    .avatar-section {
        position: relative;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: var(--gold);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        font-weight: 700;
        color: #0C0B0A;
        border: 3px solid var(--gold-light);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-upload-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: var(--gold);
        border: none;
        border-radius: 50%;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: black;
        transition: 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .avatar-upload-btn:hover {
        background: var(--gold-dark);
        transform: scale(1.05);
    }

    .profile-name {
        font-family: var(--font-display);
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0.5rem 0 0.25rem;
    }

    .profile-role {
        color: var(--gold);
        letter-spacing: 1px;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .profile-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-size: 0.75rem;
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
        padding: 12px 18px;
        color: white;
        font-family: var(--font-body);
        outline: none;
        transition: 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 2px rgba(200, 169, 110, 0.2);
    }

    .form-row {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .form-row .form-group {
        flex: 1;
    }

    hr {
        border: none;
        height: 1px;
        background: var(--border-subtle);
        margin: 1.5rem 0;
    }

    .section-title {
        font-family: var(--font-display);
        font-size: 1.2rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--gold);
    }

    .btn {
        padding: 12px 24px;
        border-radius: 40px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.3s;
        border: none;
        font-family: var(--font-body);
        font-size: 0.8rem;
    }

    .btn-primary {
        background: var(--gold);
        color: black;
    }

    .btn-primary:hover {
        background: #dbbf78;
        transform: translateY(-2px);
    }

    .btn-outline {
        background: transparent;
        border: 1.5px solid var(--gold);
        color: var(--gold);
    }

    .btn-outline:hover {
        background: rgba(200, 169, 110, 0.1);
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 1rem;
    }

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

        .profile-body {
            padding: 1.5rem;
        }

        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            text-align: center;
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
            <div class="profile-container">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="avatar-section">
                            <div class="profile-avatar" id="avatarPreview">
                                <span id="avatarInitial">E</span>
                                <img id="avatarImg" style="display: none;" alt="avatar">
                            </div>
                            <button class="avatar-upload-btn" id="uploadAvatarBtn" aria-label="Upload avatar">
                                <i class="fas fa-camera"></i>
                            </button>
                            <input type="file" id="avatarFileInput" accept="image/*" style="display: none;">
                        </div>
                        <div class="profile-name" id="displayName">Elysian Admin</div>
                        <div class="profile-role">Administrator</div>
                    </div>

                    <div class="profile-body">
                        <!-- Profile Information Form -->
                        <div class="section-title">
                            <i class="fas fa-user-circle"></i> Personal Information
                        </div>
                        <form id="profileInfoForm">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" id="fullName" placeholder="John Doe" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" id="email" placeholder="admin@elysian.com" required>
                            </div>
                            <div class="form-group">
                                <label>Role (read-only)</label>
                                <input type="text" id="roleField" readonly disabled
                                    style="opacity:0.7; cursor:not-allowed;">
                            </div>
                        </form>

                        <hr>

                        <!-- Change Password Section -->
                        <div class="section-title">
                            <i class="fas fa-lock"></i> Change Password
                        </div>
                        <form id="passwordForm">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" id="currentPassword" placeholder="••••••••">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" id="newPassword" placeholder="Min. 6 characters">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" id="confirmPassword" placeholder="Re-enter new password">
                                </div>
                            </div>
                        </form>

                        <div class="action-buttons">
                            <button type="button" class="btn btn-outline" id="cancelBtn">Reset</button>
                            <button type="button" class="btn btn-primary" id="saveProfileBtn">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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


    // ----------------------------- ADMIN PROFILE MANAGEMENT (LOCAL STORAGE DEMO) -----------------------------
    // In a real app, replace with API calls using auth token.
    // For demo, we store profile data in localStorage.

    // Default / demo admin profile
    const DEFAULT_PROFILE = {
        fullName: "Elysian Admin",
        email: "admin@elysian.com",
        role: "Administrator",
        avatar: null, // base64 or URL
        passwordHash: btoa("admin123") // simple demo hash (base64 of "admin123")
    };

    // Load profile from localStorage or set default
    let adminProfile = JSON.parse(localStorage.getItem("elysian_admin_profile"));
    if (!adminProfile) {
        adminProfile = {
            ...DEFAULT_PROFILE
        };
        localStorage.setItem("elysian_admin_profile", JSON.stringify(adminProfile));
    }

    // Helper: show toast message
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    // Update UI with current profile data
    function updateProfileUI() {
        // text fields
        document.getElementById('fullName').value = adminProfile.fullName || "";
        document.getElementById('email').value = adminProfile.email || "";
        document.getElementById('roleField').value = adminProfile.role || "Administrator";
        document.getElementById('displayName').innerText = adminProfile.fullName || "Elysian Admin";

        // avatar handling
        const avatarImg = document.getElementById('avatarImg');
        const avatarInitialSpan = document.getElementById('avatarInitial');
        if (adminProfile.avatar && adminProfile.avatar.startsWith('data:image')) {
            avatarImg.src = adminProfile.avatar;
            avatarImg.style.display = 'block';
            avatarInitialSpan.style.display = 'none';
        } else {
            avatarImg.style.display = 'none';
            avatarInitialSpan.style.display = 'flex';
            const initial = (adminProfile.fullName ? adminProfile.fullName.charAt(0).toUpperCase() : 'E');
            avatarInitialSpan.innerText = initial;
        }
    }

    // Save profile data to localStorage and update UI
    function saveProfileToStorage(updatedData) {
        adminProfile = {
            ...adminProfile,
            ...updatedData
        };
        localStorage.setItem("elysian_admin_profile", JSON.stringify(adminProfile));
        updateProfileUI();
        showToast("Profile updated successfully");
    }

    // Validate email
    function isValidEmail(email) {
        return /^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/.test(email);
    }

    // Handle save (profile info + optional password change)
    document.getElementById('saveProfileBtn').addEventListener('click', () => {
        // 1. Get profile info values
        const newFullName = document.getElementById('fullName').value.trim();
        const newEmail = document.getElementById('email').value.trim();

        if (!newFullName) {
            showToast("Full name is required", true);
            return;
        }
        if (!newEmail || !isValidEmail(newEmail)) {
            showToast("Valid email is required", true);
            return;
        }

        // 2. Check password change fields (if any filled)
        const currentPwd = document.getElementById('currentPassword').value;
        const newPwd = document.getElementById('newPassword').value;
        const confirmPwd = document.getElementById('confirmPassword').value;

        // If any password field is non-empty, validate the change
        if (currentPwd || newPwd || confirmPwd) {
            // verify current password matches stored hash (demo: compare base64)
            const expectedHash = adminProfile.passwordHash || btoa("admin123");
            const providedHash = btoa(currentPwd);
            if (providedHash !== expectedHash) {
                showToast("Current password is incorrect", true);
                return;
            }
            if (newPwd.length < 6) {
                showToast("New password must be at least 6 characters", true);
                return;
            }
            if (newPwd !== confirmPwd) {
                showToast("New passwords do not match", true);
                return;
            }
            // update password hash
            adminProfile.passwordHash = btoa(newPwd);
        }

        // Update profile info
        saveProfileToStorage({
            fullName: newFullName,
            email: newEmail
        });

        // Clear password fields
        document.getElementById('currentPassword').value = "";
        document.getElementById('newPassword').value = "";
        document.getElementById('confirmPassword').value = "";
    });

    // Reset / cancel button: revert form fields to current profile data (without saving)
    document.getElementById('cancelBtn').addEventListener('click', () => {
        document.getElementById('fullName').value = adminProfile.fullName;
        document.getElementById('email').value = adminProfile.email;
        document.getElementById('currentPassword').value = "";
        document.getElementById('newPassword').value = "";
        document.getElementById('confirmPassword').value = "";
        showToast("Changes discarded");
    });

    // ----------------------------- AVATAR UPLOAD (image to base64) -----------------------------
    const avatarFileInput = document.getElementById('avatarFileInput');
    const uploadBtn = document.getElementById('uploadAvatarBtn');

    uploadBtn.addEventListener('click', () => {
        avatarFileInput.click();
    });

    avatarFileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const base64Image = e.target.result;
                // Save avatar to profile
                adminProfile.avatar = base64Image;
                localStorage.setItem("elysian_admin_profile", JSON.stringify(adminProfile));
                updateProfileUI();
                showToast("Avatar updated successfully");
            };
            reader.readAsDataURL(file);
        } else if (file) {
            showToast("Please select a valid image file", true);
        }
        avatarFileInput.value = ''; // reset so same file can be re-uploaded
    });

    // Initial UI population
    updateProfileUI();

    console.log("Admin profile management ready — localStorage persistence active.");
    </script>
</body>

</html>