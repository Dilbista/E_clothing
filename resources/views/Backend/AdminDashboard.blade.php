<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ÉLYSIAN · Admin Dashboard | Luxury Fashion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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

    .btn {
        width: 100%;
        padding: 12px;
        border-radius: 40px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.3s;
        border: none;
        font-family: var(--font-body);
        margin-top: 10px;
    }

    .btn-primary {
        background: var(--gold);
        color: black;
    }

    .btn-primary:hover {
        background: #dbbf78;
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
        padding: 8px 20px;
        font-size: 0.8rem;
        border-radius: 30px;
        width: auto;
    }

    .btn-danger {
        background: var(--error);
        color: white;
    }

    .btn-success {
        background: var(--success);
        color: white;
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

    .page-title {
        font-family: var(--font-display);
        font-size: 2rem;
        margin-bottom: 25px;
    }

    .dashboard-panel {
        display: none;
        animation: fadeSlide 0.4s ease;
    }

    .dashboard-panel.active {
        display: block;
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 22px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--card-bg);
        border-radius: 22px;
        padding: 22px;
        border: 1px solid var(--border-subtle);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    .stat-card .icon {
        font-size: 1.8rem;
        color: var(--gold);
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.85rem;
    }

    .charts-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: var(--card-bg);
        border-radius: 22px;
        padding: 22px;
        border: 1px solid var(--border-subtle);
    }

    .table-wrapper {
        background: var(--card-bg);
        border-radius: 22px;
        padding: 20px;
        border: 1px solid var(--border-subtle);
        overflow-x: auto;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px 14px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        font-size: 0.9rem;
    }

    th {
        color: var(--text-secondary);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.72rem;
    }

    .badge {
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.72rem;
        font-weight: 600;
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

    @media (max-width: 1024px) {
        .charts-row {
            grid-template-columns: 1fr;
        }
    }

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
    }
    </style>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-layout" id="adminLayout">
        @include('Backend.layouts.header')
        @include('Backend.layouts.sidebar')

        <main class="main-content" id="mainContent">
            <div class="dashboard-panel active" id="panel-analytics">
                <h1 class="page-title">Dashboard Analytics</h1>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                        <div class="stat-value">$128.4K</div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                    <div class="stat-card">
                        <div class="icon"><i class="fas fa-shopping-bag"></i></div>
                        <div class="stat-value">1,842</div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                    <div class="stat-card">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <div class="stat-value">8.2K</div>
                        <div class="stat-label">Customers</div>
                    </div>
                    <div class="stat-card">
                        <div class="icon"><i class="fas fa-box"></i></div>
                        <div class="stat-value">356</div>
                        <div class="stat-label">Products</div>
                    </div>
                </div>
                <div class="charts-row">
                    <div class="chart-card"><canvas id="revenueChart"></canvas></div>
                    <div class="chart-card"><canvas id="ordersChart"></canvas></div>
                </div>
                <div class="table-wrapper">
                    <h3 style="margin-bottom:12px;">Recent Orders</h3>
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>#3847</td>
                            <td>Alexander Chen</td>
                            <td>$5,650</td>
                            <td><span class="badge badge-success">Delivered</span></td>
                        </tr>
                        <tr>
                            <td>#3846</td>
                            <td>Isabella Ross</td>
                            <td>$2,100</td>
                            <td><span class="badge badge-info">Shipped</span></td>
                        </tr>
                        <tr>
                            <td>#3845</td>
                            <td>Marcus Webb</td>
                            <td>$980</td>
                            <td><span class="badge badge-warning">Processing</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
    // ========== NEW: LARAVEL API BACKEND FETCH CONFIGURATION ==========
    const API_BASE_URL = 'http://localhost:8000/api'; // Replace with your actual Laravel Domain
    const AUTH_TOKEN = localStorage.getItem('admin_auth_token'); // Retrieves your Sanctum/Passport token


    // ========== NAVIGATION & SIDEBAR LOGIC ==========
    const navItems = document.querySelectorAll('.nav-item');
    const panels = document.querySelectorAll('.dashboard-panel');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            navItems.forEach(n => n.classList.remove('active'));
            item.classList.add('active');

            panels.forEach(p => p.classList.remove('active'));
            const panelId = 'panel-' + item.dataset.panel;
            document.getElementById(panelId).classList.add('active');

            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        });
    });

    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.add('open');
        sidebarOverlay.classList.add('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('active');
    }

    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        if (sidebar.classList.contains('open')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    sidebarOverlay.addEventListener('click', closeSidebar);

    document.getElementById('logoutAdminBtn').addEventListener('click', () => {
        localStorage.removeItem('admin_auth_token'); // Clear token storage keys
        alert("Token destroyed. Redirecting out...");
    });

    // ========== CHART SETUP FUNCTIONS ==========
    function initCharts() {
        const revCtx = document.getElementById('revenueChart')?.getContext('2d');
        if (revCtx) {
            new Chart(revCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue ($K)',
                        data: [28, 35, 42, 38, 52, 48],
                        borderColor: '#C8A96E',
                        backgroundColor: 'rgba(200,169,110,0.1)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#C8A96E',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#B7AFA4'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#B7AFA4'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.05)'
                            }
                        },
                        y: {
                            ticks: {
                                color: '#B7AFA4'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.05)'
                            }
                        }
                    }
                }
            });
        }

        const ordCtx = document.getElementById('ordersChart')?.getContext('2d');
        if (ordCtx) {
            new Chart(ordCtx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Orders',
                        data: [18, 25, 32, 28, 40, 55, 35],
                        backgroundColor: '#C8A96E',
                        borderRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: '#B7AFA4'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#B7AFA4'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            ticks: {
                                color: '#B7AFA4'
                            },
                            grid: {
                                color: 'rgba(255,255,255,0.05)'
                            }
                        }
                    }
                }
            });
        }
    }

    // INITIALIZATION RENDER TRIGGERS
    initCharts();
    fetchAuthenticatedUser(); // Run the API fetch immediately on dashboard startup
    </script>
</body>

</html>