<!-- Alfredo Media Header and Footer Template for Oxygen Builder -->

<!-- CSS Styles for Header and Footer only -->
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
            src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/sdfdffdgfg-Photoroom.png"
            alt="Alfredo Media Logo"
            class="logo-icon"
          />
          Alfredo Media
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
          <a href="/cart/" class="icon-btn">
            <svg viewBox="0 0 24 24">
              <circle cx="9" cy="21" r="1"></circle>
              <circle cx="20" cy="21" r="1"></circle>
              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <span class="cart-count">0</span>
          </a>
        </div>
      </div>
    </header>
    





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