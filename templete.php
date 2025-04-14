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

  // Initialize cart data structure
  let cart = {
    items: [],
    subtotal: 0,
    shipping: 0,
    total: 0
  };

  // Products will be fetched from WooCommerce
  let products = [];

  // Function to fetch WooCommerce cart data via AJAX
  function fetchWooCommerceCart() {
    console.log('Fetching WooCommerce cart data...');

    // Make sure loading state is applied
    cartCount.classList.add('loading');

    // Use the WooCommerce AJAX endpoint
    fetch('/wp-admin/admin-ajax.php?action=get_refreshed_fragments', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      }
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('WooCommerce cart data received:', data);
      updateCartFromWooCommerce(data);
      // Remove loading state after successful update
      cartCount.classList.remove('loading');
    })
    .catch(error => {
      console.error('Error fetching WooCommerce cart:', error);
      // Fall back to localStorage if AJAX fails
      loadCart();
      // Remove loading state on error
      cartCount.classList.remove('loading');
    });
  }

  // Function to update cart from WooCommerce data
  function updateCartFromWooCommerce(wooData) {
    try {
      if (!wooData || !wooData.fragments) {
        console.log('No valid WooCommerce data received');
        // Use fallback data
        loadCart();
        return;
      }

      // Parse the cart fragments to extract cart data
      // This is a simplified approach - you may need to adjust based on your WooCommerce setup
      const cartFragment = wooData.fragments['.widget_shopping_cart_content'];
      if (!cartFragment) {
        console.log('No cart fragment found');
        // Use fallback data
        loadCart();
        return;
      }

      // Create a temporary element to parse the HTML
      const tempDiv = document.createElement('div');
      tempDiv.innerHTML = cartFragment;

      // Clear current cart
      cart.items = [];

      // Extract cart items
      const wooCartItems = tempDiv.querySelectorAll('.mini_cart_item');
      console.log('Found', wooCartItems.length, 'items in WooCommerce cart');

      if (wooCartItems.length === 0) {
        // Cart is empty
        cart.subtotal = 0;
        cart.total = 0;
        updateCartDisplay();
        console.log('WooCommerce cart is empty');
        return;
      }

      wooCartItems.forEach(wooItem => {
        try {
          // Extract product data from the WooCommerce cart item
          const productLink = wooItem.querySelector('a:not(.remove)');
          const productName = productLink ? productLink.textContent.trim() : 'Unknown Product';

          // Get the cart item key from the remove link
          const removeLink = wooItem.querySelector('.remove');
          const cartItemKey = removeLink ? removeLink.dataset.cartItem : '';
          const productId = parseInt(wooItem.dataset.productId || (removeLink ? removeLink.dataset.productId : 0));
          const productImage = wooItem.querySelector('img') ? wooItem.querySelector('img').src : '';

          // Extract price and quantity
          const quantityEl = wooItem.querySelector('.quantity');
          if (!quantityEl) {
            console.log('No quantity element found for item:', productName);
            return;
          }

          const priceText = quantityEl.textContent;
          const price = parseFloat(priceText.replace(/[^0-9,.]/g, '').replace(',', '.')) || 0;
          const quantityMatch = priceText.match(/\d+\s*×/);
          const quantity = quantityMatch ? parseInt(quantityMatch[0]) : 1;

          // Extract variation attributes if any
          const variationEl = wooItem.querySelector('.variation');
          const attributes = {};
          if (variationEl) {
            const variationText = variationEl.textContent;
            const variations = variationText.split(',');
            variations.forEach(variation => {
              const parts = variation.split(':').map(s => s.trim());
              if (parts.length === 2 && parts[0] && parts[1]) {
                attributes[parts[0]] = parts[1];
              }
            });
          }

          // Add to our cart structure
          cart.items.push({
            id: productId,
            key: cartItemKey, // Store the cart item key for later use
            name: productName,
            price: price,
            image: productImage,
            quantity: quantity,
            attributes: attributes
          });

          console.log('Added item to cart:', productName, 'ID:', productId, 'Key:', cartItemKey);
        } catch (itemError) {
          console.error('Error processing cart item:', itemError);
        }
      });

      // Extract totals
      const subtotalEl = tempDiv.querySelector('.subtotal .amount');
      if (subtotalEl) {
        const subtotalText = subtotalEl.textContent;
        cart.subtotal = parseFloat(subtotalText.replace(/[^0-9,.]/g, '').replace(',', '.')) || 0;
      } else {
        // Calculate subtotal from items if not found in fragment
        cart.subtotal = cart.items.reduce((total, item) => total + (item.price * item.quantity), 0);
      }

      cart.total = cart.subtotal; // Simplified - you may need to add tax, shipping, etc.

      // Update products array for add-to-cart functionality if we don't have any yet
      if (products.length === 0) {
        products = cart.items.map(item => ({
          id: item.id,
          name: item.name,
          price: item.price,
          image: item.image,
          quantity: 1, // Default quantity for adding to cart
          attributes: item.attributes
        }));
      }

      // Update the display
      updateCartDisplay();
      console.log('Cart updated from WooCommerce data:', cart);
    } catch (error) {
      console.error('Error processing WooCommerce cart data:', error);
      // Use fallback data
      loadCart();
    } finally {
      // Always make sure loading state is removed
      cartCount.classList.remove('loading');
    }
  }

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

        // Create cart item structure
        const cartItemImage = document.createElement('div');
        cartItemImage.className = 'cart-item-image';

        const img = document.createElement('img');
        img.alt = item.name;
        img.src = item.image;

        // Add error handling for images
        img.onerror = function() {
          console.log('Image failed to load:', item.image);
          // Replace with a fallback image
          this.src = 'https://via.placeholder.com/80x80/cccccc/333333?text=No+Image';
          this.onerror = null; // Prevent infinite loop if fallback also fails
        };

        cartItemImage.appendChild(img);
        cartItem.appendChild(cartItemImage);

        // Create content container
        const cartItemContent = document.createElement('div');
        cartItemContent.className = 'cart-item-content';

        // Title
        const title = document.createElement('a');
        title.href = `/product/${item.id}`;
        title.className = 'cart-item-title';
        title.textContent = item.name;
        cartItemContent.appendChild(title);

        // Attributes
        const meta = document.createElement('div');
        meta.className = 'cart-item-meta';
        meta.innerHTML = attributesHTML;
        cartItemContent.appendChild(meta);

        // Quantity controls
        const quantityContainer = document.createElement('div');
        quantityContainer.className = 'cart-item-quantity';

        const decreaseBtn = document.createElement('button');
        decreaseBtn.className = 'quantity-btn decrease-qty';
        decreaseBtn.dataset.id = item.id;
        decreaseBtn.innerHTML = `
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        `;
        decreaseBtn.addEventListener('click', () => decreaseQuantity(item.id));

        const quantityValue = document.createElement('span');
        quantityValue.className = 'quantity-value';
        quantityValue.textContent = item.quantity;

        const increaseBtn = document.createElement('button');
        increaseBtn.className = 'quantity-btn increase-qty';
        increaseBtn.dataset.id = item.id;
        increaseBtn.innerHTML = `
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg>
        `;
        increaseBtn.addEventListener('click', () => increaseQuantity(item.id));

        quantityContainer.appendChild(decreaseBtn);
        quantityContainer.appendChild(quantityValue);
        quantityContainer.appendChild(increaseBtn);
        cartItemContent.appendChild(quantityContainer);

        // Price
        const price = document.createElement('div');
        price.className = 'cart-item-price';
        price.textContent = formatPrice(item.price * item.quantity);
        cartItemContent.appendChild(price);

        cartItem.appendChild(cartItemContent);

        // Remove button
        const removeBtn = document.createElement('button');
        removeBtn.className = 'cart-item-remove';
        removeBtn.dataset.id = item.id;
        removeBtn.innerHTML = `
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        `;
        removeBtn.addEventListener('click', () => removeFromCart(item.id));

        cartItem.appendChild(removeBtn);

        // Add the cart item to the container
        cartItemsContainer.insertBefore(cartItem, cartEmptyState);
        console.log('Added cart item to display for product ID:', item.id);
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

  // Add item to cart using WooCommerce AJAX
  function addToCart(productId, quantity = 1) {
    console.log('Adding to cart via WooCommerce AJAX, product ID:', productId, 'quantity:', quantity);

    // Find product for notification purposes
    const product = products.find(p => p.id === productId);
    let productName = 'Produkt';
    if (product) {
      productName = product.name;
      console.log('Product found:', product);
    }

    // Show loading state
    cartCount.classList.add('loading');

    // Prepare form data for WooCommerce AJAX request
    const formData = new FormData();
    formData.append('product_id', productId);
    formData.append('quantity', quantity);
    formData.append('add-to-cart', productId);

    // Use WooCommerce's add to cart AJAX endpoint
    fetch('/wp-admin/admin-ajax.php?action=woocommerce_ajax_add_to_cart', {
      method: 'POST',
      credentials: 'same-origin',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('WooCommerce add to cart response:', data);

      // Remove loading state
      cartCount.classList.remove('loading');

      if (data.success) {
        // Animate cart count
        cartCount.classList.add('pulse');
        setTimeout(() => {
          cartCount.classList.remove('pulse');
        }, 500);

        // Show success notification
        showNotification('Produkt hinzugefügt', `${productName} wurde deinem Warenkorb hinzugefügt.`);

        // Refresh cart data
        fetchWooCommerceCart();
      } else {
        // Show error notification
        showNotification('Fehler', data.message || 'Das Produkt konnte nicht hinzugefügt werden.');
      }
    })
    .catch(error => {
      console.error('Error adding to cart:', error);

      // Remove loading state
      cartCount.classList.remove('loading');

      // Show error notification
      showNotification('Fehler', 'Das Produkt konnte nicht hinzugefügt werden. Bitte versuche es später erneut.');

      // Fallback to local cart handling if AJAX fails
      if (product) {
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

        // Save cart to localStorage (for persistence)
        saveCart();
      }
    });
  }

  // Remove item from cart using WooCommerce AJAX
  function removeFromCart(productId) {
    console.log('Removing item from cart, product ID:', productId);

    // Find the cart item key (needed for WooCommerce)
    const item = cart.items.find(item => item.id === productId);
    if (!item || !item.key) {
      console.log('Item not found or no key available, using fallback removal');
      // Fallback to local removal
      cart.items = cart.items.filter(item => item.id !== productId);
      calculateTotals();
      updateCartDisplay();
      showNotification('Produkt entfernt', 'Das Produkt wurde aus deinem Warenkorb entfernt.');
      saveCart();
      return;
    }

    // Show loading state
    cartCount.classList.add('loading');

    // Use WooCommerce's remove from cart AJAX endpoint
    fetch('/wp-admin/admin-ajax.php?action=woocommerce_remove_from_cart', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `cart_item_key=${encodeURIComponent(item.key)}`
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('WooCommerce remove from cart response:', data);

      // Remove loading state
      cartCount.classList.remove('loading');

      if (data.success) {
        // Show success notification
        showNotification('Produkt entfernt', 'Das Produkt wurde aus deinem Warenkorb entfernt.');

        // Refresh cart data
        fetchWooCommerceCart();
      } else {
        // Show error notification
        showNotification('Fehler', data.message || 'Das Produkt konnte nicht entfernt werden.');
      }
    })
    .catch(error => {
      console.error('Error removing from cart:', error);

      // Remove loading state
      cartCount.classList.remove('loading');

      // Show error notification
      showNotification('Fehler', 'Das Produkt konnte nicht entfernt werden. Bitte versuche es später erneut.');

      // Fallback to local cart handling if AJAX fails
      cart.items = cart.items.filter(item => item.id !== productId);
      calculateTotals();
      updateCartDisplay();
      saveCart();
    });
  }

  // Decrease item quantity using WooCommerce AJAX
  function decreaseQuantity(productId) {
    console.log('Decreasing quantity for product ID:', productId);

    const item = cart.items.find(item => item.id === productId);

    if (item) {
      if (item.quantity > 1) {
        // Update quantity via WooCommerce AJAX
        updateCartItemQuantity(productId, item.quantity - 1);
      } else {
        // Remove item if quantity is 1
        removeFromCart(productId);
      }
    }
  }

  // Increase item quantity using WooCommerce AJAX
  function increaseQuantity(productId) {
    console.log('Increasing quantity for product ID:', productId);

    const item = cart.items.find(item => item.id === productId);

    if (item) {
      // Update quantity via WooCommerce AJAX
      updateCartItemQuantity(productId, item.quantity + 1);
    }
  }

  // Update cart item quantity using WooCommerce AJAX
  function updateCartItemQuantity(productId, newQuantity) {
    console.log('Updating quantity for product ID:', productId, 'to', newQuantity);

    // Find the cart item
    const item = cart.items.find(item => item.id === productId);
    if (!item || !item.key) {
      console.log('Item not found or no key available, using fallback quantity update');
      // Fallback to local update
      if (item) {
        item.quantity = newQuantity;
        calculateTotals();
        updateCartDisplay();
        saveCart();
      }
      return;
    }

    // Show loading state
    cartCount.classList.add('loading');

    // Use WooCommerce's update cart AJAX endpoint
    const formData = new FormData();
    formData.append('cart[' + item.key + '][qty]', newQuantity);
    formData.append('update_cart', 'Update Cart');

    fetch('/wp-admin/admin-ajax.php?action=woocommerce_update_cart', {
      method: 'POST',
      credentials: 'same-origin',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('WooCommerce update cart response:', data);

      // Remove loading state
      cartCount.classList.remove('loading');

      if (data.success) {
        // Refresh cart data
        fetchWooCommerceCart();
      } else {
        // Show error notification
        showNotification('Fehler', data.message || 'Die Menge konnte nicht aktualisiert werden.');
      }
    })
    .catch(error => {
      console.error('Error updating cart quantity:', error);

      // Remove loading state
      cartCount.classList.remove('loading');

      // Show error notification
      showNotification('Fehler', 'Die Menge konnte nicht aktualisiert werden. Bitte versuche es später erneut.');

      // Fallback to local cart handling if AJAX fails
      if (item) {
        item.quantity = newQuantity;
        calculateTotals();
        updateCartDisplay();
        saveCart();
      }
    });
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
        // Initialize empty cart
        cart = {
          items: [],
          subtotal: 0,
          shipping: 0,
          total: 0
        };
        updateCartDisplay();
      }
    } catch (e) {
      console.error('Error loading cart from localStorage:', e);
      // Initialize empty cart on error
      cart = {
        items: [],
        subtotal: 0,
        shipping: 0,
        total: 0
      };
      updateCartDisplay();
    } finally {
      // Always make sure loading state is removed
      if (cartCount) {
        cartCount.classList.remove('loading');
      }
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

  // Add a loading spinner CSS to the cart count
  const loadingStyle = document.createElement('style');
  loadingStyle.textContent = `
    .cart-count.loading {
      position: relative;
      background: rgba(255, 102, 0, 0.3);
      color: transparent;
    }

    .cart-count.loading::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 10px;
      height: 10px;
      margin: -5px 0 0 -5px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: cart-loading-spin 0.8s linear infinite;
    }

    @keyframes cart-loading-spin {
      to { transform: rotate(360deg); }
    }
  `;
  document.head.appendChild(loadingStyle);

  // Add loading class to cart count while fetching
  if (cartCount) {
    cartCount.classList.add('loading');

    // Set a timeout to remove the loading state if it gets stuck
    setTimeout(() => {
      if (cartCount.classList.contains('loading')) {
        console.log('Loading state timeout reached, removing loading state');
        cartCount.classList.remove('loading');
      }
    }, 5000); // 5 second timeout
  }

  // First try to fetch cart data from WooCommerce
  fetchWooCommerceCart();

  // Dynamic cart count update (for WooCommerce AJAX add-to-cart)
  // This listens for WooCommerce events when items are added to cart
  document.addEventListener('added_to_cart', function(e, fragments, cart_hash, button) {
    console.log('WooCommerce added_to_cart event detected');
    // Fetch the updated cart data from WooCommerce
    fetchWooCommerceCart();
  });

  // Also listen for other WooCommerce cart events
  document.addEventListener('wc_fragments_refreshed', function() {
    console.log('WooCommerce fragments refreshed event detected');
    fetchWooCommerceCart();
  });

  document.addEventListener('wc_fragments_loaded', function() {
    console.log('WooCommerce fragments loaded event detected');
    fetchWooCommerceCart();
  });

  // Listen for cart updates from other parts of the site
  document.addEventListener('wc_cart_button_updated', function() {
    console.log('WooCommerce cart button updated event detected');
    fetchWooCommerceCart();
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

  // Add products to the page (using WooCommerce products if available)
  function addDemoProducts() {
    console.log('Adding products to page');

    // If no products are available yet, fetch them from WooCommerce
    if (products.length === 0) {
      console.log('No products available yet, fetching from WooCommerce...');
      fetchWooCommerceProducts();
      return;
    }

    const productsSection = document.createElement('div');
    productsSection.className = 'container';
    productsSection.style.padding = '8rem 0 2rem';

    // Create heading
    const heading = document.createElement('h2');
    heading.textContent = 'Unsere Produkte';
    heading.style.color = 'var(--light)';
    heading.style.marginBottom = '2rem';
    heading.style.textAlign = 'center';
    productsSection.appendChild(heading);

    // Create product grid
    const productGrid = document.createElement('div');
    productGrid.style.display = 'grid';
    productGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(250px, 1fr))';
    productGrid.style.gap = '2rem';
    productsSection.appendChild(productGrid);

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
      image.alt = product.name;
      image.style.width = '100%';
      image.style.height = '100%';
      image.style.objectFit = 'cover';

      // Add error handling for product images
      image.onerror = function() {
        console.log('Product image failed to load:', product.image);
        // Replace with a fallback image
        this.src = 'https://via.placeholder.com/250x250/cccccc/333333?text=No+Image';
        this.onerror = null; // Prevent infinite loop if fallback also fails
      };

      // Set the source after adding the error handler
      image.src = product.image;

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

    console.log('Products section created with', products.length, 'products');

    // Add the products section before the footer
    const footer = document.querySelector('footer');
    if (footer) {
      document.body.insertBefore(productsSection, footer);
    } else {
      document.body.appendChild(productsSection);
    }
  }

  // Function to fetch WooCommerce products
  function fetchWooCommerceProducts() {
    console.log('Fetching WooCommerce products...');

    // Add loading indicator
    if (cartCount) {
      cartCount.classList.add('loading');
    }

    // Use the WooCommerce REST API endpoint
    fetch('/wp-json/wc/v3/products?per_page=12', {
      method: 'GET',
      credentials: 'same-origin'
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('WooCommerce products received:', data);

      // Map WooCommerce products to our format
      products = data.map(product => ({
        id: product.id,
        name: product.name,
        price: parseFloat(product.price || 0),
        image: product.images && product.images.length > 0 ? product.images[0].src : '',
        quantity: 1,
        attributes: {}
      }));

      // Remove loading indicator
      if (cartCount) {
        cartCount.classList.remove('loading');
      }

      // Now add the products to the page
      addDemoProducts();
    })
    .catch(error => {
      console.error('Error fetching WooCommerce products:', error);

      // Remove loading indicator on error
      if (cartCount) {
        cartCount.classList.remove('loading');
      }

      // Fallback to demo products if WooCommerce API fails
      products = [
        {
          id: 1,
          name: "Premium T-Shirt",
          price: 29.99,
          image: "https://via.placeholder.com/200x200/333333/ffffff?text=T-Shirt",
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
          image: "https://via.placeholder.com/200x200/444444/ffffff?text=Hoodie",
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
          image: "https://via.placeholder.com/200x200/555555/ffffff?text=Tasse",
          quantity: 1,
          attributes: {}
        }
      ];

      addDemoProducts();
    });

    // Set a safety timeout to remove loading state if it gets stuck
    setTimeout(() => {
      if (cartCount && cartCount.classList.contains('loading')) {
        console.log('Product loading timeout reached, removing loading state');
        cartCount.classList.remove('loading');
      }
    }, 8000); // 8 second timeout
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