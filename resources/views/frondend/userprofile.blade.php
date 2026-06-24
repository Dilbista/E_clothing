<!DOCTYPE html>
<html lang="en">
@include('frondend.layouts.navbar')

<body class="bg-gray-50">
    @include('frondend.layouts.header')

    <!-- Main Content Panel -->
    <main class="container mx-auto px-4 py-10 md:py-16">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation Panel -->
            <aside class="w-full lg:w-1/4">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                    <!-- Changeable User Account Avatar Card -->
                    <div class="flex items-center space-x-4 pb-6 border-b border-gray-100 mb-6">
                        <div class="relative group cursor-pointer w-14 h-14">

                            <!-- Hover Overlay -->
                            <div id="changeAvatarBtn"
                                class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="ri-camera-line text-white text-base"></i>
                            </div>

                            <!-- Hidden Image File Input -->
                            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-primary text-white text-lg font-semibold">
                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">
                                {{ trim(Auth::user()->first_name . ' ' . Auth::user()->last_name) }}
                            </h3>
                            <p class="text-xs text-gray-500">
                                Member since {{ Auth::user()->created_at->format('Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Left Sidebar Nav Links -->
                    <nav id="account-sidebar-nav" class="space-y-1">
                        <button onclick="switchTab('dashboard')" id="nav-dashboard"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-primary bg-primary/10 transition-colors">
                            <i class="ri-dashboard-line text-lg"></i>
                            <span>Dashboard</span>
                        </button>
                        <button onclick="switchTab('orders')" id="nav-orders"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-shopping-bag-3-line text-lg"></i>
                            <span>Order History</span>
                        </button>
                        <button onclick="switchTab('addresses')" id="nav-addresses"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-map-pin-line text-lg"></i>
                            <span>My Addresses</span>
                        </button>
                        <button onclick="switchTab('profile')" id="nav-profile"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-user-settings-line text-lg"></i>
                            <span>Account Details</span>
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-rose-600 hover:bg-rose-50 transition-colors mt-6 pt-4 border-t border-gray-100">
                                <i class="ri-logout-box-r-line text-lg"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

            <!-- Interactive Tab Sections -->
            <section class="w-full lg:w-3/4">

                <!-- Tab: Dashboard -->
                <div id="tab-dashboard" class="tab-content block space-y-8">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hello, {{ Auth::user()->first_name }}</h2>
                        <p class="text-gray-600 text-sm">From your account dashboard you can easily view your recent
                            orders, manage your shipping and billing addresses, and edit your password and profile
                            details.</p>
                    </div>

                    <!-- Quick stats grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Active
                                    Orders</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">1</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-indigo-50 text-primary rounded-full flex items-center justify-center">
                                <i class="ri-truck-line text-xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Total
                                    Spent</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">Rs.428.94</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center">
                                <i class="ri-wallet-line text-xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Saved
                                    Addresses</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">{{ Auth::user()->addresses->count() }}</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center">
                                <i class="ri-map-pin-line text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Order Section inside Dashboard -->
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-gray-900 text-lg">Recent Order</h3>
                            <button onclick="switchTab('orders')"
                                class="text-primary text-sm font-semibold hover:underline">View All Orders</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-100 text-xs text-gray-400 font-semibold uppercase">
                                        <th class="pb-3">Order ID</th>
                                        <th class="pb-3">Date</th>
                                        <th class="pb-3">Status</th>
                                        <th class="pb-3">Total Price</th>
                                        <th class="pb-3 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-sm border-b border-gray-50">
                                        <td class="py-4 font-semibold text-gray-900">#SE-8942</td>
                                        <td class="py-4 text-gray-600">June 02, 2026</td>
                                        <td class="py-4">
                                            <span
                                                class="inline-block px-2.5 py-1 bg-indigo-50 text-primary text-xs font-semibold rounded-full">Shipped</span>
                                        </td>
                                        <td class="py-4 font-semibold text-gray-900">Rs.134.98</td>
                                        <td class="py-4 text-right">
                                            <a href="#"
                                                class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab: Orders -->
                <div id="tab-orders"
                    class="tab-content hidden bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                    <h3 class="font-bold text-gray-900 text-lg mb-6">Your Complete Order History</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-100 text-xs text-gray-400 font-semibold uppercase">
                                    <th class="pb-3">Order ID</th>
                                    <th class="pb-3">Date</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Total Price</th>
                                    <th class="pb-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-8942</td>
                                    <td class="py-4 text-gray-600">June 02, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-indigo-50 text-primary text-xs font-semibold rounded-full">Shipped</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.134.98</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-8519</td>
                                    <td class="py-4 text-gray-600">May 14, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full">Delivered</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.214.00</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-7901</td>
                                    <td class="py-4 text-gray-600">April 02, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full">Delivered</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.79.96</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Addresses (Interactive Modals Integrated) -->
                <div id="tab-addresses" class="tab-content hidden space-y-6">
                    <div
                        class="flex justify-between items-center bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg">My Saved Addresses</h3>
                        <!-- Add Address Trigger Button -->
                        <button type="button" onclick="openAddAddressModal()"
                            class="py-2 px-4 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition-colors focus:outline-none">
                            Add Address
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse(Auth::user()->addresses as $address)
                        <!-- Address Card -->
                        <div class="bg-white p-6 rounded-lg border {{ $address->is_default ? 'border-primary' : 'border-gray-100' }} relative shadow-sm">
                            @if($address->is_default)
                            <span
                                class="absolute top-4 right-4 text-xs text-primary font-bold bg-indigo-50 px-2 py-0.5 rounded-full uppercase">Default</span>
                            @endif
                            <h4 class="font-bold text-gray-900 mb-3 text-base">{{ ucfirst($address->type) }} Address</h4>
                            <div class="space-y-1 text-sm text-gray-600">
                                <p class="font-semibold text-gray-800">{{ $address->name }}</p>
                                <p>{{ $address->address_line1 }}</p>
                                @if($address->address_line2)
                                <p>{{ $address->address_line2 }}</p>
                                @endif
                                <p>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
                                <p class="pt-2"><span class="font-medium text-gray-800">Phone: </span> {{ $address->phone }}
                                </p>
                            </div>
                            <div class="mt-6 flex gap-3 border-t border-gray-50 pt-4">
                                <!-- Edit Button with data attributes for fast populating -->
                                <button type="button"
                                    onclick="openEditAddressModal(this)"
                                    data-id="{{ $address->id }}"
                                    data-type="{{ $address->type }}"
                                    data-name="{{ $address->name }}"
                                    data-line1="{{ $address->address_line1 }}"
                                    data-line2="{{ $address->address_line2 }}"
                                    data-city="{{ $address->city }}"
                                    data-state="{{ $address->state }}"
                                    data-zip="{{ $address->postal_code }}"
                                    data-phone="{{ $address->phone }}"
                                    data-default="{{ $address->is_default ? '1' : '0' }}"
                                    class="text-sm font-semibold text-primary hover:underline flex items-center gap-1 focus:outline-none">
                                    <i class="ri-edit-line"></i> Edit
                                </button>
                                <span class="text-gray-200">|</span>
                                <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to remove this address?')"
                                        class="text-sm font-semibold text-gray-400 hover:text-rose-600 transition flex items-center gap-1 focus:outline-none">
                                        <i class="ri-delete-bin-line"></i> Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-2 text-center py-8 text-gray-500">
                            <p>You haven't saved any addresses yet.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Tab: Profile Settings -->
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div id="tab-profile" class="tab-content hidden space-y-6">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6">Account Information</h3>
                        <form action="{{ route('profile.update.info') }}"
                            method="POST"
                            class="space-y-6">

                            @csrf <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text"
                                        name="first_name"
                                        value="{{ Auth::user()->first_name }}"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded">
                                </div>
                                {{-- <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text"
                                        name="last_name"
                                        value="{{ Auth::user()->last_name }}"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded">
                                </div> 
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email"
                                        name="email"
                                        value="{{ Auth::user()->email }}"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="text"
                                        name="phone"
                                        value="{{ Auth::user()->phone }}"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-50 flex justify-end">
                                <button type="submit"
                                    class="py-2.5 px-6 bg-primary text-white text-sm font-semibold rounded-button">
                                    Save Personal Info
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6">Change Password</h3>
                        <form action="{{ route('profile.update.password') }}"
                            method="POST"
                            class="space-y-6">

                            @csrf
                            @error('current_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                <input type="password"
                                    name="current_password"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password"
                                        name="new_password"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New
                                        Password</label>
                                    <input type="password"
                                        name="new_password_confirmation"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded">
                                </div>
                            </div>
                            <div class="pt-4 border-t border-gray-50 flex justify-end">
                                <button type="submit"
                                    class="py-2.5 px-6 bg-primary text-white text-sm font-semibold rounded-button">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </main>

    <!-- Address Add/Edit Modal (Overlay backdrop styled via Tailwind) -->
    <div id="addressModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/60 backdrop-blur-sm p-4 transition-all duration-300">
        <div class="bg-white w-full max-w-lg rounded-lg border border-gray-100 shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="addressModalCard">
            <!-- Modal Header -->
            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                <h3 id="addressModalTitle" class="text-lg font-bold text-gray-900">Add New Address</h3>
                <button type="button" onclick="closeAddressModal()" class="text-gray-400 hover:text-gray-600 text-2xl transition focus:outline-none">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            
            <!-- Modal Form -->
            <form id="addressForm" action="" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="_method" id="addressFormMethod" value="POST">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Address Type / Label</label>
                        <select name="type" id="addr_type" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required>
                            <option value="shipping">Shipping Address</option>
                            <option value="billing">Billing Address</option>
                            <option value="home">Home</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Full Name</label>
                        <input type="text" name="name" id="addr_name" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="Emily Richardson">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Address Line 1</label>
                        <input type="text" name="address_line1" id="addr_line1" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="124 Parkview Terrace">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Address Line 2 (Optional)</label>
                        <input type="text" name="address_line2" id="addr_line2" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" placeholder="Apartment 4B">
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">City</label>
                        <input type="text" name="city" id="addr_city" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="New York">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">State</label>
                        <input type="text" name="state" id="addr_state" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="NY">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Postal Code</label>
                        <input type="text" name="postal_code" id="addr_zip" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="10011">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Phone Number</label>
                    <input type="text" name="phone" id="addr_phone" class="w-full px-4 py-2.5 border border-gray-200 rounded text-sm outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition" required placeholder="+1 (555) 123-4567">
                </div>

                <div class="flex items-center pt-2">
                    <label class="custom-checkbox flex items-center pl-7 text-sm text-gray-700 select-none">
                        <input type="checkbox" name="is_default" id="addr_default" value="1" />
                        <span class="checkmark"></span>
                        Set as default address
                    </label>
                </div>

                <!-- Footer buttons inside Form -->
                <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
                    <button type="button" onclick="closeAddressModal()" class="py-2.5 px-6 border border-gray-200 text-gray-700 text-sm font-semibold rounded-button hover:bg-gray-50 transition focus:outline-none">Cancel</button>
                    <button type="submit" class="py-2.5 px-6 bg-primary text-white text-sm font-semibold rounded-button hover:bg-primary/90 transition focus:outline-none">Save Address</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer (Identical Pattern to Home and About Pages) -->
    <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Column 1: About -->
                <div class="lg:col-span-2">
                    <a href="#" class="font-['Pacifico'] text-2xl text-primary inline-block mb-4">logo</a>
                    <p class="text-gray-600 mb-6 max-w-md">
                        We offer premium quality clothing and accessories for men and
                        women. Our mission is to provide sustainable fashion that lasts.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-pinterest-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Shop -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">Shop</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Women</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Men</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Accessories</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Footwear</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">New Arrivals</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sale</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Help -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">Help</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Customer Service</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">My Account</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Find a Store</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Shipping &
                                Returns</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">FAQs</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: About -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">About</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sustainability</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Careers</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Press</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm mb-4 md:mb-0">
                        &copy; 2025 ShopEase. All rights reserved.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Privacy Policy</a>
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Terms of Service</a>
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Cookies Settings</a>
                    </div>
                    <div class="flex items-center space-x-3 mt-4 md:mt-0">
                        <i class="ri-visa-fill text-2xl text-gray-600"></i>
                        <i class="ri-mastercard-fill text-2xl text-gray-600"></i>
                        <i class="ri-paypal-fill text-2xl text-gray-600"></i>
                        <i class="ri-apple-fill text-2xl text-gray-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts (Keeps your custom handlers for profile tab navigation and optional avatar uploading) -->
    <script id="profileInteractions">
        document.addEventListener("DOMContentLoaded", function() {
            // Profile Avatar Upload Handler
            const avatarInput = document.getElementById('avatarInput');
            const changeAvatarBtn = document.getElementById('changeAvatarBtn');
            const avatarImage = document.getElementById('avatarImage');

            if (changeAvatarBtn && avatarInput && avatarImage) {
                changeAvatarBtn.addEventListener('click', function() {
                    avatarInput.click();
                });

                avatarInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            avatarImage.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });

        // Account Tab Switching System
        function switchTab(tabId) {
            // Hide all tabs
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('block');
            });

            // Show selected tab
            const activeContent = document.getElementById('tab-' + tabId);
            if (activeContent) {
                activeContent.classList.remove('hidden');
                activeContent.classList.add('block');
            }

            // Remove active styles from navigation buttons
            const navButtons = document.querySelectorAll('#account-sidebar-nav button');
            navButtons.forEach(btn => {
                btn.classList.remove('text-primary', 'bg-primary/10');
                btn.classList.add('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
            });

            // Add active style to selected navigation button
            const activeButton = document.getElementById('nav-' + tabId);
            if (activeButton) {
                activeButton.classList.add('text-primary', 'bg-primary/10');
                activeButton.classList.remove('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
            }
        }

        // --- NEW: Address Add/Edit Modal Handlers ---
        function openAddAddressModal() {
            const modal = document.getElementById('addressModal');
            const card = document.getElementById('addressModalCard');
            const form = document.getElementById('addressForm');
            const method = document.getElementById('addressFormMethod');
            const title = document.getElementById('addressModalTitle');

            // Reset form fields
            form.reset();
            
            // Set dynamic endpoint actions for Laravel store
            form.action = "{{ route('addresses.store') }}"; // Replace with your named Laravel Route
            method.value = "POST";
            title.textContent = "Add New Address";

            // Open Modal Transitions
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                card.classList.remove('scale-95', 'opacity-0');
                card.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function openEditAddressModal(btn) {
            const modal = document.getElementById('addressModal');
            const card = document.getElementById('addressModalCard');
            const form = document.getElementById('addressForm');
            const method = document.getElementById('addressFormMethod');
            const title = document.getElementById('addressModalTitle');

            // Retrieve data attributes from card triggers
            const id = btn.getAttribute('data-id');
            const type = btn.getAttribute('data-type');
            const name = btn.getAttribute('data-name');
            const line1 = btn.getAttribute('data-line1');
            const line2 = btn.getAttribute('data-line2');
            const city = btn.getAttribute('data-city');
            const state = btn.getAttribute('data-state');
            const zip = btn.getAttribute('data-zip');
            const phone = btn.getAttribute('data-phone');
            const isDefault = btn.getAttribute('data-default');

            // Populate form inputs
            document.getElementById('addr_type').value = type;
            document.getElementById('addr_name').value = name;
            document.getElementById('addr_line1').value = line1;
            document.getElementById('addr_line2').value = line2 || '';
            document.getElementById('addr_city').value = city;
            document.getElementById('addr_state').value = state;
            document.getElementById('addr_zip').value = zip;
            document.getElementById('addr_phone').value = phone;
            document.getElementById('addr_default').checked = isDefault === "1";

            // Set dynamic action endpoints and method spoofing for Laravel update
            form.action = `/addresses/${id}`;
            method.value = "PUT";
            title.textContent = "Edit Address Details";

            // Open Modal Transitions
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                card.classList.remove('scale-95', 'opacity-0');
                card.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeAddressModal() {
            const modal = document.getElementById('addressModal');
            const card = document.getElementById('addressModalCard');

            // Close card transitions
            card.classList.remove('scale-100', 'opacity-100');
            card.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let activeTab = "{{ session('active_tab') }}";

            if (activeTab) {
                // hide all tabs
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.add('hidden');
                });

                // show selected tab
                document.getElementById(activeTab).classList.remove('hidden');
            }
        });
    </script>
    
</body>

</html>