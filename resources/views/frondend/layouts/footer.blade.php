 <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
        <!-- Column 1: About -->
        <div class="lg:col-span-2">
     <img src="{{ asset('build/images/logo.png') }}"
                    alt="Logo"
                    class="h-20 w-auto">
            </a>          <p class="text-gray-600 mb-6 max-w-md">
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
              <a href="{{ route('frontend.women') }}" class="text-gray-600 hover:text-primary transition-colors">Women</a>
            </li>
            <li>
              <a href="{{ route('frontend.men') }}" class="text-gray-600 hover:text-primary transition-colors">Men</a>
            </li>
            <li>
              <a href="{{ route('frontend.accessories') }}" class="text-gray-600 hover:text-primary transition-colors">Accessories</a>
            </li>
            <li>
              <a href="{{ route('frontend.footwear') }}" class="text-gray-600 hover:text-primary transition-colors">Footwear</a>
            </li>
            <li>
              <a href="{{ route('frontend.new-arrivals') }}" class="text-gray-600 hover:text-primary transition-colors">New Arrivals</a>
            </li>
            <li>
              <a href="{{ route('frontend.sale') }}" class="text-gray-600 hover:text-primary transition-colors">Sale</a>
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
              <a href="{{ route('frontend.userprofile') }}" class="text-gray-600 hover:text-primary transition-colors">My Account</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Find a Store</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Shipping &amp; Returns</a>
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

{{-- ========================================================
     AUTH-GUARD MODAL  — included on every page via footer
     Shows when a guest clicks View / Wishlist / Cart icons
     ======================================================== --}}

<!-- Auth Guard Modal -->
<div id="authGuardModal" style="display:none; position:fixed; inset:0; z-index:9999; align-items:center; justify-content:center;">
    <!-- Backdrop -->
    <div id="authGuardBackdrop"
         style="position:absolute; inset:0; background:rgba(0,0,0,0.55); backdrop-filter:blur(4px); cursor:pointer;"></div>

    <!-- Modal Card -->
    <div id="authGuardCard"
         style="position:relative; background:#fff; border-radius:20px; padding:2.5rem 2rem 2rem;
                width:90%; max-width:420px; box-shadow:0 25px 60px rgba(0,0,0,0.25);
                transform:translateY(40px); opacity:0; transition:transform 0.35s cubic-bezier(.34,1.56,.64,1), opacity 0.3s ease;
                text-align:center;">

        <!-- Close button -->
        <button id="authGuardClose"
                style="position:absolute; top:1rem; right:1rem; background:none; border:none;
                       font-size:1.4rem; color:#9ca3af; cursor:pointer; line-height:1;">
            <i class="ri-close-line"></i>
        </button>

        <!-- Lock icon -->
        <div style="width:72px; height:72px; border-radius:50%; background:linear-gradient(135deg,#6366f1,#8b5cf6);
                    display:flex; align-items:center; justify-content:center; margin:0 auto 1.25rem; box-shadow:0 8px 24px rgba(99,102,241,0.35);">
            <i class="ri-lock-2-line" style="font-size:2rem; color:#fff;"></i>
        </div>

        <h2 style="font-size:1.4rem; font-weight:700; color:#111827; margin-bottom:0.5rem;">
            Login Required
        </h2>
        <p style="font-size:0.95rem; color:#6b7280; margin-bottom:1.75rem; line-height:1.6;">
            Please log in to your account to view products, save to wishlist, or add items to your cart.
        </p>

        <!-- Buttons -->
        <div style="display:flex; gap:0.75rem; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('login') }}"
               style="display:inline-flex; align-items:center; gap:0.4rem;
                      padding:0.65rem 1.5rem; background:linear-gradient(135deg,#4f46e5,#7c3aed);
                      color:#fff; border-radius:50px; font-weight:600; font-size:0.9rem;
                      text-decoration:none; box-shadow:0 4px 14px rgba(79,70,229,0.4);
                      transition:transform 0.15s ease, box-shadow 0.15s ease;"
               onmouseover="this.style.transform='scale(1.04)'; this.style.boxShadow='0 6px 20px rgba(79,70,229,0.5)';"
               onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 14px rgba(79,70,229,0.4)';">
                <i class="ri-login-box-line"></i> Log In
            </a>
            <a href="{{ route('register') }}"
               style="display:inline-flex; align-items:center; gap:0.4rem;
                      padding:0.65rem 1.5rem; background:#fff; color:#4f46e5;
                      border:2px solid #4f46e5; border-radius:50px; font-weight:600; font-size:0.9rem;
                      text-decoration:none; transition:background 0.15s ease, color 0.15s ease;"
               onmouseover="this.style.background='#eef2ff'; "
               onmouseout="this.style.background='#fff';">
                <i class="ri-user-add-line"></i> Register
            </a>
        </div>
    </div>
</div>

{{-- Global Auth State — passed from Laravel to JS --}}
<script>
    window.__userLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
</script>

<script>
(function () {
    'use strict';

    // ── Modal helpers ───────────────────────────────────────────
    const modal    = document.getElementById('authGuardModal');
    const card     = document.getElementById('authGuardCard');
    const backdrop = document.getElementById('authGuardBackdrop');
    const closeBtn = document.getElementById('authGuardClose');

    function openAuthModal() {
        modal.style.display = 'flex';
        // Trigger animation on next frame
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                card.style.transform = 'translateY(0)';
                card.style.opacity   = '1';
            });
        });
        document.body.style.overflow = 'hidden';
    }

    function closeAuthModal() {
        card.style.transform = 'translateY(40px)';
        card.style.opacity   = '0';
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }, 320);
    }

    if (closeBtn)  closeBtn.addEventListener('click', closeAuthModal);
    if (backdrop)  backdrop.addEventListener('click', closeAuthModal);
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeAuthModal(); });

    // ── Auth Guard Interceptor ───────────────────────────────────
    // Selectors that identify "protected" product action elements
    const PROTECTED_SELECTORS = [
        '.add-to-wishlist-btn',
        '.featured-action-btn',       // featured product icon buttons (home)
        '[data-auth-action]',         // any element with data-auth-action attribute
    ].join(', ');

    document.addEventListener('click', function (e) {
        // If user is logged in, allow everything
        if (window.__userLoggedIn) return;

        const target = e.target.closest(PROTECTED_SELECTORS);
        if (!target) return;

        // Block the action
        e.preventDefault();
        e.stopImmediatePropagation();
        openAuthModal();
    }, true); // useCapture=true so we intercept BEFORE other handlers

})();
</script>