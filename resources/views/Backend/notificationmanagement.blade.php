<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>ÉLYSIAN · Notifications Manager</title>
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
    }

    body {
        font-family: var(--font-body);
        background-color: var(--deep-bg);
        color: var(--text-primary);
        line-height: 1.5;
        min-height: 100vh;
        padding: 2rem;
    }

    /* Notifications Container */
    .notifications-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 2rem;
        gap: 1rem;
    }

    .page-title {
        font-family: var(--font-display);
        font-size: 2rem;
        font-weight: 600;
        letter-spacing: -0.5px;
    }

    .filter-bar {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 1.5rem;
    }

    .filter-select {
        background: #1f1d1a;
        border: 1px solid var(--border-subtle);
        border-radius: 30px;
        padding: 8px 20px;
        color: white;
        font-family: var(--font-body);
        cursor: pointer;
        outline: none;
        transition: 0.2s;
    }

    .filter-select:focus {
        border-color: var(--gold);
    }

    .btn {
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.3s;
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
        padding: 5px 12px;
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

    .table-wrapper {
        background: var(--card-bg);
        border-radius: 24px;
        padding: 1.25rem;
        border: 1px solid var(--border-subtle);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 14px 12px;
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

    .notification-unread {
        background: rgba(200, 169, 110, 0.05);
        border-left: 3px solid var(--gold);
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

    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }

        .panel-header {
            flex-direction: column;
            align-items: flex-start;
        }

        th,
        td {
            padding: 10px 8px;
        }

        .btn-sm,
        .btn-danger-sm {
            padding: 4px 10px;
            font-size: 0.65rem;
        }
    }
    </style>
</head>

<body>

    <div class="notifications-container">
        <div class="panel-header">
            <h1 class="page-title"><i class="fas fa-bell" style="margin-right: 12px; color: var(--gold);"></i>
                Notifications</h1>
            <div>
                <button class="btn btn-outline btn-sm" id="markAllReadBtn"><i class="fas fa-check-double"></i> Mark all
                    as read</button>
            </div>
        </div>

        <div class="filter-bar">
            <select id="notifFilter" class="filter-select">
                <option value="all">All notifications</option>
                <option value="unread">Unread</option>
                <option value="read">Read</option>
            </select>
        </div>

        <div class="table-wrapper">
            <table id="notificationsTable">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="notificationsTableBody">
                    <tr>
                        <td colspan="5" style="text-align:center;">Loading notifications...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="toastMsg" class="toast-notify"><i class="fas fa-check-circle"></i> <span id="toastText">Success</span>
    </div>

    <script>
    // ----------------------------- NOTIFICATIONS DATA (LOCALSTORAGE WITH DEMO) -----------------------------
    let notifications = [];

    // Demo notifications (rich dataset)
    const DEMO_NOTIFICATIONS = [{
            id: 1,
            type: "order",
            message: "New order #ORD-3847 from Alexander Chen - $5,650",
            date: "2025-05-20T10:30:00",
            read: false
        },
        {
            id: 2,
            type: "stock",
            message: "Low stock alert: Cashmere Overcoat (only 3 left)",
            date: "2025-05-19T15:20:00",
            read: false
        },
        {
            id: 3,
            type: "user",
            message: "New user registration: Sophia Laurent (sophia@elysian.com)",
            date: "2025-05-18T09:15:00",
            read: true
        },
        {
            id: 4,
            type: "coupon",
            message: "Coupon 'LUXE20' has been used 50 times today",
            date: "2025-05-17T14:45:00",
            read: false
        },
        {
            id: 5,
            type: "system",
            message: "Automated backup completed successfully",
            date: "2025-05-16T23:00:00",
            read: true
        },
        {
            id: 6,
            type: "order",
            message: "Order #ORD-3846 was shipped to Isabella Ross",
            date: "2025-05-15T11:20:00",
            read: false
        },
        {
            id: 7,
            type: "review",
            message: "New 5-star review on 'Silk Evening Gown'",
            date: "2025-05-14T08:45:00",
            read: false
        }
    ];

    // Load from localStorage or init with demo
    function loadNotifications() {
        const stored = localStorage.getItem("elysian_notifications_module");
        if (stored) {
            notifications = JSON.parse(stored);
            if (notifications.length === 0) {
                notifications = [...DEMO_NOTIFICATIONS];
                saveNotifications();
            }
        } else {
            notifications = [...DEMO_NOTIFICATIONS];
            saveNotifications();
        }
    }

    function saveNotifications() {
        localStorage.setItem("elysian_notifications_module", JSON.stringify(notifications));
    }

    // Helper: show toast
    function showToast(message, isError = false) {
        const toast = document.getElementById('toastMsg');
        const toastText = document.getElementById('toastText');
        toastText.innerText = message;
        toast.style.borderLeftColor = isError ? '#D4735E' : '#C8A96E';
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }

    // Format date nicely
    function formatDate(dateString) {
        const d = new Date(dateString);
        return d.toLocaleDateString() + ' ' + d.toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    // Get badge for notification type
    function getTypeBadge(type) {
        const types = {
            order: '<span class="badge badge-info"><i class="fas fa-shopping-cart"></i> Order</span>',
            stock: '<span class="badge badge-warning"><i class="fas fa-boxes"></i> Stock</span>',
            user: '<span class="badge badge-success"><i class="fas fa-user"></i> User</span>',
            coupon: '<span class="badge badge-info"><i class="fas fa-tag"></i> Coupon</span>',
            system: '<span class="badge" style="background:rgba(200,169,110,0.2);color:var(--gold);"><i class="fas fa-cog"></i> System</span>',
            review: '<span class="badge" style="background:rgba(212,168,83,0.2);color:var(--warning);"><i class="fas fa-star"></i> Review</span>'
        };
        return types[type] || '<span class="badge">Info</span>';
    }

    // Render notification table with current filter
    function renderNotifications() {
        const filterValue = document.getElementById('notifFilter').value;
        let filtered = [...notifications];
        if (filterValue === 'unread') filtered = filtered.filter(n => !n.read);
        if (filterValue === 'read') filtered = filtered.filter(n => n.read);
        // sort by date descending (newest first)
        filtered.sort((a, b) => new Date(b.date) - new Date(a.date));

        const tbody = document.getElementById('notificationsTableBody');
        if (filtered.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;">✨ No notifications found</td></tr>';
            return;
        }

        tbody.innerHTML = '';
        filtered.forEach(notif => {
            const rowClass = notif.read ? '' : 'notification-unread';
            const readBadge = notif.read ? '<span class="badge badge-success">Read</span>' :
                '<span class="badge badge-warning">Unread</span>';
            const row = `
        <tr class="${rowClass}">
          <td>${getTypeBadge(notif.type)}</td>
          <td>${escapeHtml(notif.message)}</td>
          <td>${formatDate(notif.date)}</td>
          <td>${readBadge}</td>
          <td style="white-space: nowrap;">
            ${!notif.read ? `<button class="btn btn-outline btn-sm mark-read" data-id="${notif.id}"><i class="fas fa-check"></i> Read</button> ` : ''}
            <button class="btn btn-danger-sm delete-notif" data-id="${notif.id}"><i class="fas fa-trash"></i> Del</button>
          </td>
        </tr>
      `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        // attach event listeners to dynamically created buttons
        document.querySelectorAll('.mark-read').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = parseInt(btn.getAttribute('data-id'));
                markAsRead(id);
            });
        });
        document.querySelectorAll('.delete-notif').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = parseInt(btn.getAttribute('data-id'));
                deleteNotification(id);
            });
        });
    }

    // Mark a single notification as read
    function markAsRead(id) {
        const notif = notifications.find(n => n.id === id);
        if (notif && !notif.read) {
            notif.read = true;
            saveNotifications();
            renderNotifications();
            showToast("Notification marked as read");
        }
    }

    // Delete a notification
    function deleteNotification(id) {
        notifications = notifications.filter(n => n.id !== id);
        saveNotifications();
        renderNotifications();
        showToast("Notification deleted");
    }

    // Mark all as read
    document.getElementById('markAllReadBtn').addEventListener('click', () => {
        let changed = false;
        notifications.forEach(n => {
            if (!n.read) {
                n.read = true;
                changed = true;
            }
        });
        if (changed) {
            saveNotifications();
            renderNotifications();
            showToast("All notifications marked as read");
        } else {
            showToast("No unread notifications");
        }
    });

    // Filter change listener
    document.getElementById('notifFilter').addEventListener('change', renderNotifications);

    // Helper to escape HTML
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }

    // Initialize
    loadNotifications();
    renderNotifications();
    </script>
</body>

</html>