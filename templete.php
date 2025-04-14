<?php
/**
 * Alfredo Media Header Template with Functioning Cart
 * 
 * This template includes a header with a working cart sidebar
 * that properly integrates with WooCommerce's AJAX functions.
 */
?>

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
  0% { transform: scale(1); }
  50% { transform: scale(1.3); }
  100% { transform: scale(1); }
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

/* Responsive Styles */
@media (max-width: 992px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 768px) {
  .mobile-toggle {
    display: block;
  }
  
  .nav-list {
    position: fixed;
    top: 0;
    right: -280px;
    width: 280px;
    height: 100vh;
    background: var(--darker);
    flex-direction: column;
    padding: 5rem 2rem 2rem;
    gap: 1.5rem;
    transition: right 0.3s ease;
    z-index: 1001;
    box-shadow: -5px 0 15px rgba(0, 0, 0, 0.3);
  }

  .nav-list.active {
    right: 0;
  }

  .cart-sidebar {
    width: 100%;
    right: -100%;
  }
}

@media (max-width: 576px) {
  .header-icons {
    gap: 1rem;
  }
  
  .cart-count {
    top: -5px;
    right: -5px;
    width: 16px;
    height: 16px;
    font-size: 0.7rem;
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
      <button class="mobile-toggle" aria-label="Toggle Menu">☰</button>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'container' => false,
          'menu_class' => 'nav-list',
          'fallback_cb' => function() {
            echo '<ul class="nav-list">
              <li><a href="' . esc_url(home_url('/')) . '" class="nav-link">HOME</a></li>
              <li><a href="' . esc_url(home_url('/about/')) . '" class="nav-link">ÜBER UNS</a></li>
              <li><a href="' . esc_url(home_url('/services/')) . '" class="nav-link">DIENSTLEISTUNGEN</a></li>
              <li><a href="' . esc_url(home_url('/portfolio/')) . '" class="nav-link">PORTFOLIO</a></li>
              <li><a href="' . esc_url(home_url('/merch/')) . '" class="nav-link">MERCH</a></li>
              <li><a href="' . esc_url(home_url('/contact/')) . '" class="nav-link">KONTAKT</a></li>
            </ul>';
          }
        ));
      ?>
    </nav>
    <div class="header-icons">
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="icon-btn" aria-label="My Account">
        <svg viewBox="0 0 24 24">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </a>
      <div class="icon-btn" id="cart-toggle" aria-label="Cart">
        <svg viewBox="0 0 24 24">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span class="cart-count"><?php echo is_object(WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?></span>
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
      <span>Warenkorb (<span id="cart-items-count"><?php echo is_object(WC()->cart) ? WC()->cart->get_cart_contents_count() : '0'; ?></span>)</span>
    </div>
    <button class="cart-close" id="cart-close" aria-label="Close Cart">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <div class="cart-body" id="cart-items">
    <!-- WooCommerce Mini Cart -->
    <div class="woocommerce-mini-cart-wrapper">
      <?php 
      if (function_exists('woocommerce_mini_cart')) {
        woocommerce_mini_cart();
      } else {
        // Fallback for when WooCommerce is not active or mini cart is not available
        echo '<div class="cart-empty" id="cart-empty">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg>
          <h4 class="cart-empty-title">Dein Warenkorb ist leer</h4>
          <p class="cart-empty-message">Entdecke unsere Produkte und füge einige zu deinem Warenkorb hinzu.</p>
          <a href="' . esc_url(home_url('/shop/')) . '" class="cart-empty-action">Zum Shop</a>
        </div>';
      }
      ?>
    </div>
  </div>

  <div class="cart-footer" id="cart-footer">
    <div class="cart-totals">
      <div class="cart-totals-row">
        <span class="cart-totals-label">Zwischensumme</span>
        <span class="cart-totals-value" id="cart-subtotal">
          <?php echo is_object(WC()->cart) ? WC()->cart->get_cart_subtotal() : '0,00 €'; ?>
        </span>
      </div>
      <div class="cart-totals-row">
        <span class="cart-totals-label">Versand</span>
        <span class="cart-totals-value" id="cart-shipping">Berechnet an der Kasse</span>
      </div>
      <div class="cart-totals-row">
        <span class="cart-totals-label">Gesamt</span>
        <span class="cart-totals-value" id="cart-total">
          <?php echo is_object(WC()->cart) ? WC()->cart->get_cart_total() : '0,00 €'; ?>
        </span>
      </div>
    </div>
    <div class="cart-actions">
      <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="btn btn-outline">Warenkorb anzeigen</a>
      <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn btn-accent">Zur Kasse</a>
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
  <button class="toast-close" id="toast-close" aria-label="Close Notification">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="18" y1="6" x2="6" y2="18"></line>
      <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
  </button>
</div>

<!-- Mobile Menu Overlay -->
<div class="mobile-overlay"></div>

<script>
jQuery(document).ready(function($) {
  // Cart functionality
  const cartToggle = document.getElementById('cart-toggle');
  const cartSidebar = document.getElementById('cart-sidebar');
  const cartOverlay = document.getElementById('cart-overlay');
  const cartClose = document.getElementById('cart-close');
  const cartCount = document.querySelector('.cart-count');
  const cartItemsCount = document.getElementById('cart-items-count');
  const toast = document.getElementById('notification-toast');
  const toastTitle = document.getElementById('toast-title');
  const toastMessage = document.getElementById('toast-message');
  const toastClose = document.getElementById('toast-close');
  
  // Toggle cart sidebar
  function toggleCart() {
    cartSidebar.classList.toggle('active');
    cartOverlay.classList.toggle('active');
    
    if (cartSidebar.classList.contains('active')) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = '';
    }
  }
  
  // Show notification toast
  function showNotification(title, message, duration = 3000) {
    toastTitle.textContent = title;
    toastMessage.textContent = message;
    toast.classList.add('show');
    
    const timeout = setTimeout(() => {
      hideNotification();
    }, duration);
    
    toast.dataset.timeout = timeout;
  }
  
  // Hide notification toast
  function hideNotification() {
    toast.classList.remove('show');
    
    if (toast.dataset.timeout) {
      clearTimeout(parseInt(toast.dataset.timeout));
      toast.dataset.timeout = null;
    }
  }
  
  // Update cart via AJAX
  function refreshCart() {
    $.ajax({
      url: wc_add_to_cart_params ? wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'get_refreshed_fragments') : '/?wc-ajax=get_refreshed_fragments',
      type: 'POST',
      success: function(data) {
        if (data && data.fragments) {
          // Replace fragments
          $.each(data.fragments, function(key, value) {
            $(key).replaceWith(value);
          });
          
          // Update cart count
          const newCount = data.cart_hash ? (data.fragments['.cart-count'] ? $(data.fragments['.cart-count']).text() : $('.woocommerce-mini-cart .quantity').length) : '0';
          $('.cart-count').text(newCount);
          $('#cart-items-count').text(newCount);
          
          // Show/hide empty cart message
          if (newCount === '0') {
            $('#cart-footer').hide();
            $('.cart-empty').show();
          } else {
            $('#cart-footer').show();
            $('.cart-empty').hide();
          }
          
          // Update cart totals if available
          if (data.cart_hash) {
            const subtotal = $('.woocommerce-mini-cart__total .amount').text();
            $('#cart-subtotal').text(subtotal);
            $('#cart-total').text(subtotal);
          }
          
          // Trigger event for other scripts
          $(document.body).trigger('wc_fragments_refreshed');
        }
      }
    });
  }
  
  // Handle add to cart events
  $(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
    // Show success notification
    showNotification('Produkt hinzugefügt', 'Das Produkt wurde deinem Warenkorb hinzugefügt.');
    
    // Update cart count with animation
    cartCount.classList.add('pulse');
    setTimeout(() => {
      cartCount.classList.remove('pulse');
    }, 500);
    
    // Open cart sidebar if it's not already open
    if (!cartSidebar.classList.contains('active')) {
      toggleCart();
    }
  });
  
  // Remove from cart
  $(document).on('click', '.woocommerce-mini-cart .remove_from_cart_button', function(e) {
    // Default WooCommerce functionality will handle the AJAX
    // We just need to show a notification after it's done
    $(document.body).on('removed_from_cart', function() {
      showNotification('Produkt entfernt', 'Das Produkt wurde aus deinem Warenkorb entfernt.');
      // This event runs only once
      $(document.body).off('removed_from_cart');
    });
  });
  
  // Event listeners
  if (cartToggle) cartToggle.addEventListener('click', toggleCart);
  if (cartClose) cartClose.addEventListener('click', toggleCart);
  if (cartOverlay) cartOverlay.addEventListener('click', toggleCart);
  if (toastClose) toastClose.addEventListener('click', hideNotification);
  
  // Close cart with Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && cartSidebar.classList.contains('active')) {
      toggleCart();
    }
  });
  
  // Mobile menu functionality
  const mobileToggle = document.querySelector('.mobile-toggle');
  const mobileOverlay = document.querySelector('.mobile-overlay');
  const navList = document.querySelector('.nav-list');
  
  function toggleMobileMenu() {
    navList.classList.toggle('active');
    mobileOverlay.classList.toggle('active');
    
    if (navList.classList.contains('active')) {
      document.body.style.overflow = 'hidden';
    } else {
      // Only restore scroll if cart isn't open
      if (!cartSidebar.classList.contains('active')) {
        document.body.style.overflow = '';
      }
    }
  }
  
  if (mobileToggle) mobileToggle.addEventListener('click', toggleMobileMenu);
  if (mobileOverlay) mobileOverlay.addEventListener('click', function() {
    if (navList.classList.contains('active')) {
      toggleMobileMenu();
    }
  });
  
  // Close mobile menu when clicking nav links
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function() {
      if (navList.classList.contains('active')) {
        toggleMobileMenu();
      }
    });
  });
  
  // Header scroll effect
  function handleHeaderScroll() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
      header.classList.add('header-scrolled');
    } else {
      header.classList.remove('header-scrolled');
    }
  }
  
  window.addEventListener('scroll', handleHeaderScroll);
  
  // Initialize the header state on page load
  handleHeaderScroll();
  
  // Refresh fragments on page load
  $(document).ready(function() {
    refreshCart();
  });
});
</script>