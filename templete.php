<!-- Alfredo Media Header with Cart Sidebar -->

<!-- CSS Styles for Header, Cart Sidebar and Footer -->
<style>
:root {
  --primary: #0099ff;
  --primary-light: #33adff;
  --primary-dark: #0077cc;
  --accent: #ff6600;
  --accent-dark: #cc5200;
  --dark: #1a1a1a;
  --darker: #121212;
  --light: #ffffff;
  --gray-100: #f1f5f9;
  --gray-200: #e2e8f0;
  --gray-300: #cbd5e1;
  --gray-400: #94a3b8;
  --gray-500: #64748b;
  --gray-600: #475569;
  --gray-700: #334155;
  --gray-800: #1e293b;
  --gray-900: #0f172a;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}

body {
  background: linear-gradient(to bottom, var(--dark), var(--darker));
  color: var(--light);
  line-height: 1.6;
  overflow-x: hidden;
}

.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

.flex {
  display: flex;
}

.items-center {
  align-items: center;
}

.justify-between {
  justify-content: space-between;
}

.justify-center {
  justify-content: center;
}

.grid {
  display: grid;
}

.text-center {
  text-align: center;
}

/* Header */
header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  padding: 1.5rem 0;
  transition: all 0.3s ease;
  background: transparent;
  backdrop-filter: none;
}

.header-scrolled {
  padding: 1rem 0;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  background: rgba(26, 26, 26, 0.95);
  backdrop-filter: blur(10px);
}

.logo {
  font-size: 1.5rem;
  font-weight: 700;
  text-decoration: none;
  color: var(--light);
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.logo-icon {
  width: 2.5rem;
  height: 2.5rem;
}

.nav-list {
  display: flex;
  list-style: none;
  gap: 2rem;
}

.nav-link {
  color: var(--gray-300);
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s;
  position: relative;
}

.nav-link::after {
  content: "";
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(to right, var(--primary), var(--accent));
  transition: width 0.3s;
}

.nav-link:hover {
  color: var(--light);
}

.nav-link:hover::after {
  width: 100%;
}

.mobile-toggle {
  display: none;
  background: none;
  border: none;
  color: var(--light);
  font-size: 1.5rem;
  cursor: pointer;
}

/* Header Account and Cart */
.header-icons {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.icon-btn {
  color: var(--gray-300);
  position: relative;
  transition: color 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.icon-btn:hover {
  color: var(--light);
}

.icon-btn svg {
  width: 1.5rem;
  height: 1.5rem;
  fill: none;
  stroke: currentColor;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
}

.cart-count {
  position: absolute;
  top: -8px;
  right: -8px;
  width: 18px;
  height: 18px;
  background: var(--accent);
  color: white;
  border-radius: 50%;
  font-size: 0.75rem;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: scale(1);
  transition: transform 0.3s ease;
}

.cart-count.pulse {
  animation: pulse 0.5s ease-in-out;
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.3);
  }
  100% {
    transform: scale(1);
  }
}

/* Mobile menu overlay */
.mobile-overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  z-index: 999;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.mobile-overlay.active {
  display: block;
  opacity: 1;
}

/* Cart Sidebar */
.cart-sidebar {
  position: fixed;
  top: 0;
  right: -400px;
  width: 400px;
  height: 100%;
  background: var(--dark);
  box-shadow: -5px 0 25px rgba(0, 0, 0, 0.3);
  z-index: 1100;
  transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.cart-sidebar.active {
  right: 0;
}

.cart-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  z-index: 1090;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

.cart-overlay.active {
  opacity: 1;
  visibility: visible;
}

.cart-header {
  padding: 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.cart-title {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--light);
}

.cart-title svg {
  width: 1.5rem;
  height: 1.5rem;
  color: var(--accent);
}

.cart-close {
  background: transparent;
  border: none;
  color: var(--gray-400);
  width: 2rem;
  height: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border-radius: 50%;
  transition: all 0.3s ease;
}

.cart-close:hover {
  background: rgba(255, 255, 255, 0.1);
  color: var(--light);
}

.cart-close svg {
  width: 1.5rem;
  height: 1.5rem;
  stroke-width: 2;
}

.cart-body {
  flex: 1;
  overflow-y: auto;
  padding: 1.5rem;
}

.cart-item {
  display: flex;
  gap: 1rem;
  padding-bottom: 1.5rem;
  margin-bottom: 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateX(10px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

.cart-item-image {
  width: 80px;
  height: 80px;
  border-radius: 0.5rem;
  overflow: hidden;
  background: rgba(255, 255, 255, 0.05);
  flex-shrink: 0;
}

.cart-item-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.cart-item-content {
  flex: 1;
  display: flex;
  flex-direction: column;
}

.cart-item-title {
  font-weight: 600;
  color: var(--light);
  margin-bottom: 0.25rem;
  text-decoration: none;
  transition: color 0.3s ease;
}

.cart-item-title:hover {
  color: var(--primary);
}

.cart-item-meta {
  font-size: 0.875rem;
  color: var(--gray-400);
  margin-bottom: 0.5rem;
}

.cart-item-price {
  font-weight: 600;
  color: var(--accent);
  margin-top: auto;
}

.cart-item-remove {
  align-self: flex-start;
  background: transparent;
  border: none;
  color: var(--gray-500);
  width: 1.75rem;
  height: 1.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border-radius: 50%;
  transition: all 0.3s ease;
}

.cart-item-remove:hover {
  background: rgba(255, 255, 255, 0.1);
  color: #ef4444;
}

.cart-item-remove svg {
  width: 1rem;
  height: 1rem;
  stroke-width: 2;
}

.cart-item-quantity {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 0.5rem;
}

.quantity-btn {
  width: 1.75rem;
  height: 1.75rem;
  border-radius: 0.375rem;
  background: rgba(255, 255, 255, 0.1);
  border: none;
  color: var(--light);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s ease;
}

.quantity-btn:hover {
  background: var(--primary);
}

.quantity-btn:active {
  transform: scale(0.95);
}

.quantity-btn svg {
  width: 1rem;
  height: 1rem;
}

.quantity-value {
  width: 2rem;
  text-align: center;
  font-weight: 600;
  color: var(--light);
}

.cart-empty {
  text-align: center;
  padding: 3rem 1.5rem;
  color: var(--gray-400);
}

.cart-empty svg {
  width: 4rem;
  height: 4rem;
  color: var(--gray-600);
  margin-bottom: 1.5rem;
  stroke-width: 1;
}

.cart-empty-title {
  font-size: 1.25rem;
  color: var(--light);
  margin-bottom: 0.75rem;
}

.cart-empty-message {
  margin-bottom: 1.5rem;
}

.cart-empty-action {
  display: inline-block;
  padding: 0.75rem 1.5rem;
  background: var(--primary);
  color: white;
  font-weight: 600;
  border-radius: 0.5rem;
  text-decoration: none;
  transition: all 0.3s ease;
}

.cart-empty-action:hover {
  background: var(--primary-dark);
  transform: translateY(-3px);
}

.cart-footer {
  padding: 1.5rem;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  background: rgba(0, 0, 0, 0.2);
}

.cart-totals {
  margin-bottom: 1.5rem;
}

.cart-totals-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 0.75rem;
}

.cart-totals-row:last-child {
  margin-bottom: 0;
  padding-top: 0.75rem;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  font-weight: 600;
  font-size: 1.125rem;
}

.cart-totals-label {
  color: var(--gray-300);
}

.cart-totals-value {
  color: var(--light);
}

.cart-actions {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.btn {
  display: inline-block;
  padding: 0.875rem 1.5rem;
  font-weight: 600;
  border-radius: 0.5rem;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease;
  border: none;
  font-size: 1rem;
}

.btn-primary {
  background: var(--primary);
  color: white;
  box-shadow: 0 4px 12px rgba(0, 153, 255, 0.2);
}

.btn-primary:hover {
  background: var(--primary-dark);
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(0, 153, 255, 0.3);
}

.btn-accent {
  background: var(--accent);
  color: white;
  box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
}

.btn-accent:hover {
  background: var(--accent-dark);
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(255, 102, 0, 0.3);
}

.btn-outline {
  background: transparent;
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: var(--light);
}

.btn-outline:hover {
  border-color: var(--primary);
  color: var(--primary);
  transform: translateY(-3px);
}

/* Notification toast */
.toast {
  position: fixed;
  bottom: 1.5rem;
  right: 1.5rem;
  background: var(--dark);
  border-left: 4px solid var(--accent);
  color: var(--light);
  padding: 1rem 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  gap: 1rem;
  z-index: 2000;
  max-width: 350px;
  transform: translateY(150%);
  opacity: 0;
  transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

.toast.show {
  transform: translateY(0);
  opacity: 1;
}

.toast-icon {
  flex-shrink: 0;
  width: 1.5rem;
  height: 1.5rem;
  color: var(--accent);
}

.toast-content {
  flex: 1;
}

.toast-title {
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.toast-message {
  font-size: 0.875rem;
  color: var(--gray-300);
}

.toast-close {
  background: transparent;
  border: none;
  color: var(--gray-400);
  cursor: pointer;
  flex-shrink: 0;
  padding: 0.25rem;
}

.toast-close:hover {
  color: var(--light);
}

/* Footer */
footer {
  background: var(--darker);
  padding: 5rem 0 2rem;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.footer-grid {
  display: grid;
  grid-template-columns: 2fr repeat(3, 1fr);
  gap: 2rem;
  margin-bottom: 3rem;
}

.footer-brand {
  margin-bottom: 1.5rem;
}

.footer-brand-desc {
  color: var(--gray-400);
  font-size: 0.9375rem;
  margin-bottom: 1.5rem;
}

.footer-social {
  display: flex;
  gap: 0.75rem;
}

.social-icon {
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.05);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.social-icon:hover {
  background: var(--primary);
  transform: translateY(-3px);
}

.footer-heading {
  font-size: 1.125rem;
  margin-bottom: 1.5rem;
  color: var(--light);
}

.footer-links {
  list-style: none;
}

.footer-link {
  margin-bottom: 0.75rem;
}

.footer-link a {
  color: var(--gray-400);
  text-decoration: none;
  transition: color 0.3s;
  font-size: 0.9375rem;
}

.footer-link a:hover {
  color: var(--primary);
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  padding-top: 2rem;
  text-align: center;
  color: var(--gray-500);
  font-size: 0.875rem;
}

/* Added animation for cart items */
@keyframes slideInRight {
  from {
    transform: translateX(30px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

.cart-item {
  animation: slideInRight 0.3s ease-out forwards;
}

/* Loading spinner */
.loading-spinner {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  border: 2px solid rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  border-top-color: var(--light);
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

/* Scrollbar styling */
.cart-body::-webkit-scrollbar {
  width: 6px;
}

.cart-body::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.2);
}

.cart-body::-webkit-scrollbar-thumb {
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 3px;
}

.cart-body::-webkit-scrollbar-thumb:hover {
  background-color: rgba(255, 255, 255, 0.3);
}

/* Responsive Styles */
@media (max-width: 992px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 768px) {
  .nav-list {
    position: fixed;
    top: 0;
    right: -100%;
    width: 250px;
    height: 100vh;
    background: var(--darker);
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    transition: all 0.3s ease;
    z-index: 1000;
  }

  .nav-list.active {
    right: 0;
  }

  .mobile-toggle {
    display: block;
  }

  .cart-sidebar {
    width: 100%;
    right: -100%;
  }

  .footer-grid {
    grid-template-columns: 1fr;
    text-align: center;
  }

  .footer-social {
    justify-content: center;
  }
}
</style>

<!-- Header Template -->
<header id="header">
  <div class="container flex justify-between items-center">
    <a href="/" class="logo">
      <img
        src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/new-logo.png"
        alt="Alfredo Media Logo"
        class="logo-icon"
      />
      Adstethik
    </a>
    <nav>
      <button class="mobile-toggle">☰</button>
      <ul class="nav-list">
        <li>
          <a href="/" class="nav-link">HOME</a>
        </li>
        <li>
          <a href="/about/" class="nav-link">ÜBER UNS</a>
        </li>
        <li>
          <a href="/pricing/" class="nav-link">DIENSTLEISTUNGEN</a>
        </li>
        <li>
          <a href="/portfolio/" class="nav-link">PORTFOLIO</a>
        </li>
        <li>
          <a href="/merch/" class="nav-link">MERCH</a>
        </li>
        <li>
          <a href="/contact/" class="nav-link">KONTAKT</a>
        </li>
      </ul>
    </nav>
    <div class="header-icons">
      <a href="/my-account/" class="icon-btn">
        <svg viewBox="0 0 24 24">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </a>
      <div class="icon-btn" id="cart-toggle">
        <svg viewBox="0 0 24 24">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span class="cart-count">0</span>
      </div>
    </div>
  </div>
</header>

<!-- Cart Overlay -->
<div class="cart-overlay" id="cart-overlay"></div>

<!-- Cart Sidebar -->
<div class="cart-sidebar" id="cart-sidebar">
  <div class="cart-header">
    <div class="cart-title">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
      </svg>
      <span>Warenkorb (<span id="cart-items-count">0</span>)</span>
    </div>
    <button class="cart-close" id="cart-close">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <div class="cart-body" id="cart-items">
    <!-- Cart items will be dynamically inserted here -->

    <!-- Empty cart state -->
    <div class="cart-empty" id="cart-empty">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
      </svg>
      <h4 class="cart-empty-title">Dein Warenkorb ist leer</h4>
      <p class="cart-empty-message">Entdecke unsere Produkte und füge einige zu deinem Warenkorb hinzu.</p>
      <a href="/shop/" class="cart-empty-action">Zum Shop</a>
    </div>
  </div>

  <div class="cart-footer" id="cart-footer">
    <div class="cart-totals">
      <div class="cart-totals-row">
        <span class="cart-totals-label">Zwischensumme</span>
        <span class="cart-totals-value" id="cart-subtotal">0,00 €</span>
      </div>
      <div class="cart-totals-row">
        <span class="cart-totals-label">Versand</span>
        <span class="cart-totals-value" id="cart-shipping">Berechnet an der Kasse</span>
      </div>
      <div class="cart-totals-row">
        <span class="cart-totals-label">Gesamt</span>
        <span class="cart-totals-value" id="cart-total">0,00 €</span>
      </div>
    </div>
    <div class="cart-actions">
      <a href="/cart/" class="btn btn-outline">Warenkorb anzeigen</a>
      <a href="/checkout/" class="btn btn-accent">Zur Kasse</a>
    </div>
  </div>
</div>

<!-- Notification Toast -->
<div class="toast" id="notification-toast">
  <div class="toast-icon">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
  </div>
  <div class="toast-content">
    <div class="toast-title" id="toast-title">Produkt hinzugefügt</div>
    <div class="toast-message" id="toast-message">Das Produkt wurde deinem Warenkorb hinzugefügt.</div>
  </div>
  <button class="toast-close" id="toast-close">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="18" y1="6" x2="6" y2="18"></line>
      <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
  </button>
</div>

<!-- JavaScript for Cart Functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM fully loaded, initializing cart functionality');

  // Cart elements
  const cartToggle = document.getElementById('cart-toggle');
  console.log('Cart toggle element:', cartToggle);

  const cartSidebar = document.getElementById('cart-sidebar');
  console.log('Cart sidebar element:', cartSidebar);

  const cartOverlay = document.getElementById('cart-overlay');
  console.log('Cart overlay element:', cartOverlay);

  const cartClose = document.getElementById('cart-close');
  console.log('Cart close element:', cartClose);

  const cartItemsContainer = document.getElementById('cart-items');
  console.log('Cart items container element:', cartItemsContainer);

  const cartEmptyState = document.getElementById('cart-empty');
  console.log('Cart empty state element:', cartEmptyState);

  const cartCount = document.querySelector('.cart-count');
  console.log('Cart count element:', cartCount);

  const cartItemsCount = document.getElementById('cart-items-count');
  console.log('Cart items count element:', cartItemsCount);

  const cartSubtotal = document.getElementById('cart-subtotal');
  console.log('Cart subtotal element:', cartSubtotal);

  const cartTotal = document.getElementById('cart-total');
  console.log('Cart total element:', cartTotal);

  const cartFooter = document.getElementById('cart-footer');
  console.log('Cart footer element:', cartFooter);

  // Notification toast elements
  const toast = document.getElementById('notification-toast');
  console.log('Toast element:', toast);

  const toastTitle = document.getElementById('toast-title');
  console.log('Toast title element:', toastTitle);

  const toastMessage = document.getElementById('toast-message');
  console.log('Toast message element:', toastMessage);

  const toastClose = document.getElementById('toast-close');
  console.log('Toast close element:', toastClose);

  // Sample cart data (this would be replaced with actual data from your e-commerce system)
  let cart = {
    items: [],
    subtotal: 0,
    shipping: 0,
    total: 0
  };

  // Sample products (this would come from your database)
  const products = [
    {
      id: 1,
      name: "Premium T-Shirt",
      price: 29.99,
      image: "https://placekitten.com/200/200",
      quantity: 1,
      attributes: {
        size: "M",
        color: "Schwarz"
      }
    },
    {
      id: 2,
      name: "Hoodie mit Logo",
      price: 49.99,
      image: "https://placekitten.com/200/201",
      quantity: 1,
      attributes: {
        size: "L",
        color: "Grau"
      }
    },
    {
      id: 3,
      name: "Kaffeetasse",
      price: 14.99,
      image: "https://placekitten.com/200/202",
      quantity: 1,
      attributes: {}
    }
  ];

  // Toggle cart sidebar
  function toggleCart() {
    console.log('Toggling cart sidebar');
    cartSidebar.classList.toggle('active');
    cartOverlay.classList.toggle('active');

    // Disable body scroll when cart is open
    if (cartSidebar.classList.contains('active')) {
      console.log('Cart is now open');
      document.body.style.overflow = 'hidden';
    } else {
      console.log('Cart is now closed');
      document.body.style.overflow = '';
    }
  }

  // Format price
  function formatPrice(price) {
    return price.toFixed(2).replace('.', ',') + ' €';
  }

  // Update cart display
  function updateCartDisplay() {
    console.log('Updating cart display, cart items:', cart.items);

    // Update cart item count
    const totalItems = cart.items.reduce((total, item) => total + item.quantity, 0);
    cartCount.textContent = totalItems;
    cartItemsCount.textContent = totalItems;
    console.log('Total items in cart:', totalItems);

    // Show/hide empty state
    if (cart.items.length === 0) {
      console.log('Cart is empty, showing empty state');
      cartEmptyState.style.display = 'block';
      cartFooter.style.display = 'none';
    } else {
      console.log('Cart has items, hiding empty state');
      cartEmptyState.style.display = 'none';
      cartFooter.style.display = 'block';

      // Clear current items
      console.log('Clearing current cart items from display');
      // Remove all cart items but keep the empty state element
      const cartChildren = Array.from(cartItemsContainer.children);
      cartChildren.forEach(child => {
        if (child !== cartEmptyState) {
          cartItemsContainer.removeChild(child);
        }
      });

      // Add cart items
      cart.items.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.setAttribute('data-id', item.id);
        cartItem.style.animationDelay = `${index * 0.1}s`;

        // Build attributes string
        let attributesHTML = '';
        if (item.attributes && Object.keys(item.attributes).length > 0) {
          attributesHTML = Object.entries(item.attributes)
            .map(([key, value]) => `${key}: ${value}`)
            .join(' / ');
        }

        cartItem.innerHTML = `
          <div class="cart-item-image">
            <img src="${item.image}" alt="${item.name}">
          </div>
          <div class="cart-item-content">
            <a href="/product/${item.id}" class="cart-item-title">${item.name}</a>
            <div class="cart-item-meta">${attributesHTML}</div>
            <div class="cart-item-quantity">
              <button class="quantity-btn decrease-qty" data-id="${item.id}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
              </button>
              <span class="quantity-value">${item.quantity}</span>
              <button class="quantity-btn increase-qty" data-id="${item.id}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
              </button>
            </div>
            <div class="cart-item-price">${formatPrice(item.price * item.quantity)}</div>
          </div>
          <button class="cart-item-remove" data-id="${item.id}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="18" y1="6" x2="6" y2="18"></line>
              <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
          </button>
        `;

        cartItemsContainer.insertBefore(cartItem, cartEmptyState);

        // Add event listeners to buttons
        cartItem.querySelector('.decrease-qty').addEventListener('click', () => decreaseQuantity(item.id));
        cartItem.querySelector('.increase-qty').addEventListener('click', () => increaseQuantity(item.id));
        cartItem.querySelector('.cart-item-remove').addEventListener('click', () => removeFromCart(item.id));
      });
    }

    // Update totals
    cartSubtotal.textContent = formatPrice(cart.subtotal);
    cartTotal.textContent = formatPrice(cart.total);
  }

  // Calculate cart totals
  function calculateTotals() {
    cart.subtotal = cart.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    // Here you could add tax calculations, shipping costs, etc.
    cart.total = cart.subtotal + cart.shipping;
  }

  // Add item to cart
  function addToCart(productId, quantity = 1) {
    console.log('Adding to cart, product ID:', productId, 'quantity:', quantity);

    // Find product
    const product = products.find(p => p.id === productId);
    if (!product) {
      console.error('Product not found with ID:', productId);
      return;
    }

    console.log('Product found:', product);

    // Check if product already in cart
    const existingItem = cart.items.find(item => item.id === productId);

    if (existingItem) {
      // Increase quantity
      existingItem.quantity += quantity;
      console.log('Increased quantity for existing item, new quantity:', existingItem.quantity);
    } else {
      // Add new item
      const cartItem = {...product, quantity};
      cart.items.push(cartItem);
      console.log('Added new item to cart:', cartItem);
    }

    // Update totals and display
    calculateTotals();
    updateCartDisplay();

    // Animate cart count
    cartCount.classList.add('pulse');
    setTimeout(() => {
      cartCount.classList.remove('pulse');
    }, 500);

    // Show notification
    showNotification('Produkt hinzugefügt', `${product.name} wurde deinem Warenkorb hinzugefügt.`);

    // Save cart to localStorage (for persistence)
    saveCart();
    console.log('Current cart:', cart);
  }

  // Remove item from cart
  function removeFromCart(productId) {
    // Remove the item
    cart.items = cart.items.filter(item => item.id !== productId);

    // Update totals and display
    calculateTotals();
    updateCartDisplay();

    // Show notification
    showNotification('Produkt entfernt', 'Das Produkt wurde aus deinem Warenkorb entfernt.');

    // Save cart to localStorage
    saveCart();
  }

  // Decrease item quantity
  function decreaseQuantity(productId) {
    const item = cart.items.find(item => item.id === productId);

    if (item) {
      if (item.quantity > 1) {
        item.quantity--;
      } else {
        // Remove item if quantity is 1
        return removeFromCart(productId);
      }

      // Update totals and display
      calculateTotals();
      updateCartDisplay();

      // Save cart to localStorage
      saveCart();
    }
  }

  // Increase item quantity
  function increaseQuantity(productId) {
    const item = cart.items.find(item => item.id === productId);

    if (item) {
      item.quantity++;

      // Update totals and display
      calculateTotals();
      updateCartDisplay();

      // Save cart to localStorage
      saveCart();
    }
  }

  // Save cart to localStorage
  function saveCart() {
    try {
      const cartJson = JSON.stringify(cart);
      localStorage.setItem('cart', cartJson);
      console.log('Cart saved to localStorage:', cartJson);
    } catch (e) {
      console.error('Error saving cart to localStorage:', e);
    }
  }

  // Load cart from localStorage
  function loadCart() {
    try {
      const savedCart = localStorage.getItem('cart');
      console.log('Loaded cart from localStorage:', savedCart);

      if (savedCart) {
        cart = JSON.parse(savedCart);
        calculateTotals();
        updateCartDisplay();
        console.log('Cart loaded and displayed:', cart);
      } else {
        console.log('No saved cart found in localStorage');
      }
    } catch (e) {
      console.error('Error loading cart from localStorage:', e);
    }
  }

  // Show notification toast
  function showNotification(title, message, duration = 3000) {
    toastTitle.textContent = title;
    toastMessage.textContent = message;

    toast.classList.add('show');

    // Auto-hide toast after duration
    const toastTimeout = setTimeout(() => {
      hideNotification();
    }, duration);

    // Store timeout in the toast to clear it if closed manually
    toast.dataset.timeout = toastTimeout;
  }

  // Hide notification toast
  function hideNotification() {
    toast.classList.remove('show');

    // Clear timeout if exists
    if (toast.dataset.timeout) {
      clearTimeout(parseInt(toast.dataset.timeout));
      toast.dataset.timeout = null;
    }
  }

  // Add event listeners
  console.log('Setting up cart event listeners');

  // Check if elements exist before adding event listeners
  if (cartToggle) {
    console.log('Cart toggle button found, adding click event');
    cartToggle.addEventListener('click', function(e) {
      console.log('Cart toggle button clicked');
      toggleCart();
    });
  } else {
    console.error('Cart toggle button not found!');
  }

  if (cartClose) {
    cartClose.addEventListener('click', toggleCart);
  } else {
    console.error('Cart close button not found!');
  }

  if (cartOverlay) {
    cartOverlay.addEventListener('click', toggleCart);
  } else {
    console.error('Cart overlay not found!');
  }

  if (toastClose) {
    toastClose.addEventListener('click', hideNotification);
  } else {
    console.error('Toast close button not found!');
  }

  // Close cart with Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && cartSidebar.classList.contains('active')) {
      toggleCart();
    }
  });

  // Demo: Add "Add to Cart" button event listeners on the page
  // This would usually be handled by your e-commerce system
  document.addEventListener('click', function(e) {
    // Find the add-to-cart button or its child elements
    const addToCartBtn = e.target.closest('.add-to-cart');

    if (addToCartBtn) {
      e.preventDefault();

      // Get the product ID from data attribute
      const productId = parseInt(addToCartBtn.dataset.productId);
      console.log('Add to cart clicked for product ID:', productId);

      if (productId) {
        // Add the product to cart
        addToCart(productId);

        // If cart is not visible, show it
        if (!cartSidebar.classList.contains('active')) {
          toggleCart();
        }
      } else {
        console.error('No product ID found on add-to-cart button');
      }
    }
  });

  // Enhanced Header Scroll Effect
  function handleHeaderScroll() {
    const header = document.getElementById("header");
    if (window.scrollY > 50) {
      header.classList.add("header-scrolled");
    } else {
      header.classList.remove("header-scrolled");
    }
  }

  window.addEventListener("scroll", handleHeaderScroll);

  // Mobile menu functionality
  const mobileToggle = document.querySelector(".mobile-toggle");
  const mobileOverlay = document.querySelector(".mobile-overlay");
  const navList = document.querySelector(".nav-list");

  if (mobileToggle && mobileOverlay && navList) {
    mobileToggle.addEventListener("click", function() {
      navList.classList.add("active");
      mobileOverlay.classList.add("active");
      document.body.style.overflow = "hidden"; // Prevent scrolling
    });

    function closeMobileMenu() {
      navList.classList.remove("active");
      mobileOverlay.classList.remove("active");

      // Only re-enable scrolling if cart is not open
      if (!cartSidebar.classList.contains('active')) {
        document.body.style.overflow = "";
      }
    }

    mobileOverlay.addEventListener("click", closeMobileMenu);

    document.querySelectorAll(".nav-link").forEach(function(link) {
      link.addEventListener("click", closeMobileMenu);
    });
  }

  // Initialize the cart
  console.log('Initializing cart...');
  loadCart();

  // For demo purposes: Add some items to the cart initially if it's empty
  if (cart.items.length === 0) {
    console.log('Cart is empty, adding demo items');
    // Add demo items to cart for testing
    addToCart(1);
    addToCart(3);
  } else {
    console.log('Cart already has items:', cart.items.length);
  }

  // Dynamic cart count update (for WooCommerce AJAX add-to-cart)
  // This listens for WooCommerce events when items are added to cart
  document.addEventListener('added_to_cart', function(e, fragments, cart_hash, button) {
    // Reload cart from localStorage or make an AJAX request to get cart data
    loadCart();
  });

  // Function to update cart from WooCommerce data
  // This would be used in a real implementation with WooCommerce
  function updateCartFromWooCommerce(wooCartData) {
    if (!wooCartData) return;

    // Clear current cart
    cart.items = [];

    // Map WooCommerce cart items to our cart structure
    for (const [key, item] of Object.entries(wooCartData.items)) {
      cart.items.push({
        id: item.product_id,
        name: item.product_name,
        price: parseFloat(item.price),
        quantity: item.quantity,
        image: item.product_image,
        attributes: item.variation
      });
    }

    // Update totals
    cart.subtotal = parseFloat(wooCartData.subtotal);
    cart.total = parseFloat(wooCartData.total);

    // Update display
    updateCartDisplay();
  }

  // Example of AJAX request to get WooCommerce cart data
  // This is a placeholder for how you might fetch cart data from WooCommerce
  function fetchWooCommerceCart() {
    fetch('/wp-admin/admin-ajax.php?action=get_cart_contents')
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          updateCartFromWooCommerce(data.cart);
        }
      })
      .catch(error => {
        console.error('Error fetching cart:', error);
      });
  }

  // Add demo products to the page (for testing only)
  function addDemoProducts() {
    console.log('Adding demo products to page');
    const demoProductsSection = document.createElement('div');
    demoProductsSection.className = 'container';
    demoProductsSection.style.padding = '8rem 0 2rem';

    // Create heading
    const heading = document.createElement('h2');
    heading.textContent = 'Demo Produkte';
    heading.style.color = 'var(--light)';
    heading.style.marginBottom = '2rem';
    heading.style.textAlign = 'center';
    demoProductsSection.appendChild(heading);

    // Create product grid
    const productGrid = document.createElement('div');
    productGrid.style.display = 'grid';
    productGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
    productGrid.style.gap = '2rem';
    demoProductsSection.appendChild(productGrid);

    // Add each product
    products.forEach(product => {
      console.log('Creating product card for:', product.name, 'ID:', product.id);

      const productCard = document.createElement('div');
      productCard.className = 'product-card';
      productCard.style.background = 'rgba(26, 26, 26, 0.6)';
      productCard.style.border = '1px solid rgba(255, 255, 255, 0.05)';
      productCard.style.borderRadius = '1rem';
      productCard.style.overflow = 'hidden';
      productCard.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';

      // Image container
      const imageContainer = document.createElement('div');
      imageContainer.style.width = '100%';
      imageContainer.style.height = '250px';
      imageContainer.style.overflow = 'hidden';

      const image = document.createElement('img');
      image.src = product.image;
      image.alt = product.name;
      image.style.width = '100%';
      image.style.height = '100%';
      image.style.objectFit = 'cover';

      imageContainer.appendChild(image);
      productCard.appendChild(imageContainer);

      // Content container
      const contentContainer = document.createElement('div');
      contentContainer.style.padding = '1.5rem';

      const title = document.createElement('h3');
      title.textContent = product.name;
      title.style.fontSize = '1.25rem';
      title.style.marginBottom = '0.5rem';
      title.style.color = 'var(--light)';
      contentContainer.appendChild(title);

      const priceActionContainer = document.createElement('div');
      priceActionContainer.style.display = 'flex';
      priceActionContainer.style.justifyContent = 'space-between';
      priceActionContainer.style.alignItems = 'center';
      priceActionContainer.style.marginTop = '1rem';

      const price = document.createElement('span');
      price.textContent = formatPrice(product.price);
      price.style.fontSize = '1.25rem';
      price.style.fontWeight = '600';
      price.style.color = 'var(--accent)';
      priceActionContainer.appendChild(price);

      const addToCartBtn = document.createElement('button');
      addToCartBtn.className = 'add-to-cart btn btn-primary';
      addToCartBtn.dataset.productId = product.id;
      addToCartBtn.textContent = 'In den Warenkorb';
      addToCartBtn.style.padding = '0.5rem 1rem';
      addToCartBtn.style.fontSize = '0.875rem';

      // Add click event directly to the button
      addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Add to cart button clicked directly for product ID:', product.id);
        addToCart(product.id);

        // If cart is not visible, show it
        if (!cartSidebar.classList.contains('active')) {
          toggleCart();
        }
      });

      priceActionContainer.appendChild(addToCartBtn);
      contentContainer.appendChild(priceActionContainer);
      productCard.appendChild(contentContainer);

      productGrid.appendChild(productCard);
    });

    console.log('Demo products section created with', products.length, 'products');

    // Add the demo products section before the footer
    const footer = document.querySelector('footer');
    if (footer) {
      document.body.insertBefore(demoProductsSection, footer);
    } else {
      document.body.appendChild(demoProductsSection);
    }
  }

  // Show demo products for testing
  addDemoProducts();

  // Add CSS for pulse animation when an item is added to cart
  const style = document.createElement('style');
  style.textContent = `
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.2);
      }
      100% {
        transform: scale(1);
      }
    }

    .pulse {
      animation: pulse 0.5s ease-in-out;
    }
  `;
  document.head.appendChild(style);
});
</script>






<!-- Footer Template -->
<footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <div class="footer-brand">
            <a href="/" class="logo">
              <img
                src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/sdfdffdgfg-Photoroom.png"
                alt="Alfredo Media Logo"
                class="logo-icon"
              />
            </a>
          </div>
          <p class="footer-brand-desc">
            Alfredo Media ist Ihr Partner für die digitale Transformation und
            bietet innovative Lösungen, die Ihrem Unternehmen zum Erfolg
            verhelfen.
          </p>
          <div class="footer-social">
            <a href="#" class="social-icon">
              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" fill="none">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
            </a>
            <a href="#" class="social-icon">
              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" fill="none">
                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
              </svg>
            </a>
            <a href="#" class="social-icon">
              <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" fill="none">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
              </svg>
            </a>
          </div>
        </div>
        <div>
          <h3 class="footer-heading">Schnelllinks</h3>
          <ul class="footer-links">
            <li class="footer-link"><a href="/">HOME</a></li>
            <li class="footer-link"><a href="/about/">ÜBER UNS</a></li>
            <li class="footer-link">
              <a href="/pricing/">DIENSTLEISTUNGEN</a>
            </li>
            <li class="footer-link"><a href="/portfolio/">PORTFOLIO</a></li>
            <li class="footer-link"><a href="/contact/">KONTAKT</a></li>
          </ul>
        </div>
        <div>
          <h3 class="footer-heading">Dienstleistungen</h3>
          <ul class="footer-links">
            <li class="footer-link"><a href="#">Webentwicklung</a></li>
            <li class="footer-link"><a href="#">Digitales Marketing</a></li>
            <li class="footer-link"><a href="#">E-Commerce Lösungen</a></li>
          </ul>
        </div>
        <div>
          <h3 class="footer-heading">Kontakt</h3>
          <ul class="footer-links">
            <li class="footer-link">
              <a href="mailto:info@alfredomedia.com">Email: info@alfredomedia.com</a>
            </li>
            <li class="footer-link">
              <a href="tel:+1234567890">Telefon: +123 456 7890</a>
            </li>
            <li class="footer-link">
              <a href="#">Adresse: 123 Digital Street, Tech City</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>
          &copy; 2023 Alfredo Media. Alle Rechte vorbehalten. |
          <a href="/impressum/">Impressum</a> |
          <a href="/datenschutz/">Datenschutz</a> |
          <a href="/haftungsausschluss/">Haftungsausschluss</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- JavaScript for Header Interaction -->
  <script>
    // Scroll event to change header background
    window.addEventListener("scroll", function () {
      const header = document.getElementById("header");
      if (window.scrollY > 50) {
        header.classList.add("header-scrolled");
      } else {
        header.classList.remove("header-scrolled");
      }
    });

    // Mobile menu toggle
    document
      .querySelector(".mobile-toggle")
      .addEventListener("click", function () {
        document.querySelector(".nav-list").classList.add("active");
        document.querySelector(".mobile-overlay").classList.add("active");
        document.body.style.overflow = "hidden"; // Prevent scrolling when menu is open
      });

    // Close mobile menu when clicking on overlay
    document
      .querySelector(".mobile-overlay")
      .addEventListener("click", function () {
        document.querySelector(".nav-list").classList.remove("active");
        document.querySelector(".mobile-overlay").classList.remove("active");
        document.body.style.overflow = ""; // Re-enable scrolling when menu is closed
      });

    // Close mobile menu when clicking a nav link (for better UX)
    document.querySelectorAll(".nav-link").forEach(function (link) {
      link.addEventListener("click", function () {
        document.querySelector(".nav-list").classList.remove("active");
        document.querySelector(".mobile-overlay").classList.remove("active");
        document.body.style.overflow = ""; // Re-enable scrolling
      });
    });

    // Update cart count (example function - connect to your cart system)
    function updateCartCount(count) {
      document.querySelector(".cart-count").textContent = count;
    }

    // You would typically call this with data from your cart system
    // For example: updateCartCount(5);
  </script>