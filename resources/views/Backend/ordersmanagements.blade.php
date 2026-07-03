<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @include('backend.layouts.header') --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ÉLYSIAN · Order Management</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap"
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
            min-height: 100vh;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar correction for layout */
        .main-content {
            margin-left: 270px;
            /* Adjust based on your actual sidebar width */
            margin-top: var(--navbar-height);
            flex: 1;
            padding: 35px;
            transition: 0.3s;
        }

        .orders-container {
            max-width: 1300px;
            margin: 0 auto;
        }

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
        }

        /* Search and Filter */
        .filter-group {
            display: flex;
            gap: 0.75rem;
        }

        .filter-select,
        .search-input {
            background: #1f1d1a;
            border: 1px solid var(--border-subtle);
            border-radius: 40px;
            padding: 8px 20px;
            color: white;
            outline: none;
            font-size: 0.85rem;
        }

        /* Table Styling */
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
            padding: 18px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        th {
            color: var(--text-secondary);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Badges */
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
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

        .badge-danger {
            background: rgba(212, 115, 94, 0.2);
            color: var(--error);
        }

        /* Buttons */
        .btn {
            border-radius: 40px;
            padding: 6px 16px;
            font-size: 0.75rem;
            cursor: pointer;
            border: none;
            transition: 0.2s;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--gold);
            color: black;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
        }

        .btn-outline:hover {
            background: rgba(200, 169, 110, 0.1);
        }

        /* Modals */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(6px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .order-modal {
            background: var(--card-bg);
            border: 1px solid var(--border-subtle);
            border-radius: 28px;
            width: 100%;
            max-width: 650px;
            padding: 30px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .detail-label {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .items-list {
            background: #0f0e0c;
            border-radius: 15px;
            padding: 15px;
            margin-top: 15px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            padding: 5px 0;
        }

        /* Toast Notification */
        .toast-notify {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #1E1C19;
            border-left: 4px solid var(--gold);
            padding: 15px 25px;
            border-radius: 50px;
            color: white;
            transform: translateX(150%);
            transition: 0.5s;
            z-index: 2000;
        }

        .toast-notify.show {
            transform: translateX(0);
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .header-bar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <div class="admin-layout">
        @include('Backend.layouts.sidebar')

        <div style="flex: 1;">
            @include('Backend.layouts.header')

            <main class="main-content">
                <div class="orders-container">

                    <div class="header-bar">
                        <h1 class="page-title">Order Management</h1>

                        <form action="{{ route('admin.ordersmanagements') }}" method="GET" class="filter-group">
                            <input type="text" name="search" class="search-input"
                                placeholder="Search Order # or Name..." value="{{ request('search') }}">
                            <select name="status" class="filter-select" onchange="this.form.submit()">
                                <option value="all">All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped
                                </option>
                                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>
                                    Delivered</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled</option>
                            </select>
                        </form>
                    </div>

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td>
                                            {{ $order->first_name }} {{ $order->last_name }}
                                            <div style="font-size: 0.65rem; color: var(--text-secondary);">
                                                {{ $order->phone }}</div>
                                        </td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td style="color: var(--gold); font-weight: 600;">Rs.
                                            {{ number_format($order->total_amount, 2) }}</td>
                                        <td>
                                            @php
                                                $status = strtolower($order->order_status);
                                                $badge = match ($status) {
                                                    'pending' => 'badge-warning',
                                                    'shipped' => 'badge-info',
                                                    'delivered' => 'badge-success',
                                                    'cancelled' => 'badge-danger',
                                                    default => 'badge-info',
                                                };
                                            @endphp
                                            <span class="badge {{ $badge }}">{{ ucfirst($order->order_status) }}</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline"
                                                onclick="openStatusModal({{ $order->id }}, '{{ $order->order_status }}')">Status</button>
                                            <button class="btn btn-primary" onclick="openDetailsModal({{ $order->id }})"><i
                                                    class="fas fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            style="text-align: center; padding: 50px; color: var(--text-secondary);">No
                                            orders found in database.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-top: 20px;">
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal: Update Status -->
    <div class="modal-overlay" id="statusModal">
        <div class="order-modal">
            <h3 style="font-family: var(--font-display); margin-bottom: 20px;">Update Order Status</h3>
            <input type="hidden" id="modalOrderId">
            <div style="margin-bottom: 20px;">
                <label style="font-size: 0.7rem; text-transform: uppercase; color: var(--text-secondary);">Select New
                    Status</label>
                <select id="newStatusSelect" class="filter-select"
                    style="width: 100%; margin-top: 10px; border-radius: 15px;">
                    <option value="pending">Pending</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button class="btn btn-outline" onclick="closeModal('statusModal')">Cancel</button>
                <button class="btn btn-primary" onclick="saveStatusUpdate()">Update Status</button>
            </div>
        </div>
    </div>

    <!-- Modal: Order Details -->
    <div class="modal-overlay" id="detailsModal">
        <div class="order-modal">
            <h3 style="font-family: var(--font-display); margin-bottom: 20px;">Order Details</h3>
            <div id="detailsContent">
                <!-- Loaded via AJAX -->
            </div>
            <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                <button class="btn btn-outline" onclick="closeModal('detailsModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast-notify">
        <i class="fas fa-check-circle" style="margin-right: 10px; color: var(--gold);"></i>
        <span id="toastText">Action successful</span>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        function showToast(msg) {
            const toast = document.getElementById('toast');
            document.getElementById('toastText').innerText = msg;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 3000);
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }

        // --- Status Modal Logic ---
        function openStatusModal(id, currentStatus) {
            document.getElementById('modalOrderId').value = id;
            document.getElementById('newStatusSelect').value = currentStatus.toLowerCase();
            document.getElementById('statusModal').classList.add('active');
        }

        async function saveStatusUpdate() {
            const id = document.getElementById('modalOrderId').value;
            const status = document.getElementById('newStatusSelect').value;

            const response = await fetch(`/admin/orders/${id}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ status: status })
            });

            if (response.ok) {
                closeModal('statusModal');
                showToast("Order status updated successfully!");
                setTimeout(() => location.reload(), 1000);
            }
        }

        // --- Details Modal Logic ---
        async function openDetailsModal(id) {
            const content = document.getElementById('detailsContent');
            content.innerHTML = '<p style="text-align:center;">Loading details...</p>';
            document.getElementById('detailsModal').classList.add('active');

            try {
                const response = await fetch(`/admin/orders/${id}`);
                const order = await response.json();

                let itemsHtml = '<div class="items-list"><strong>Items Ordered:</strong>';
                order.items.forEach(item => {
                    itemsHtml += `
                        <div class="item-row">
                            <span>${item.product.name} (x${item.quantity})</span>
                            <span>Rs. ${(item.price * item.quantity).toLocaleString()}</span>
                        </div>`;
                });
                itemsHtml += '</div>';

                content.innerHTML = `
                    <div class="detail-row"><span class="detail-label">Order Number</span><span>${order.order_number}</span></div>
                    <div class="detail-row"><span class="detail-label">Customer Name</span><span>${order.first_name} ${order.last_name}</span></div>
                    <div class="detail-row"><span class="detail-label">Phone</span><span>${order.phone}</span></div>
                    <div class="detail-row"><span class="detail-label">Email</span><span>${order.email}</span></div>
                    <div class="detail-row"><span class="detail-label">Shipping Address</span><span>${order.address}, ${order.city}</span></div>
                    <div class="detail-row"><span class="detail-label">Payment Method</span><span>${order.payment_method.toUpperCase()}</span></div>
                    <div class="detail-row"><span class="detail-label">Grand Total</span><span style="color:var(--gold); font-weight:bold;">Rs. ${parseFloat(order.total_amount).toLocaleString()}</span></div>
                    ${itemsHtml}
                `;
            } catch (error) {
                content.innerHTML = '<p style="color:var(--error);">Failed to load details.</p>';
            }
        }
    </script>
</body>

</html>