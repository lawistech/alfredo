<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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

      html {
        scroll-behavior: smooth;
      }

      body {
        background: linear-gradient(to bottom, var(--dark), var(--darker));
        color: var(--light);
        line-height: 1.6;
        overflow-x: hidden;
      }

      /* Typography */
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1rem;
      }

      h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        background: linear-gradient(
          45deg,
          var(--primary-light) 0%,
          var(--primary) 20%,
          var(--accent) 40%,
          #ff9900 60%,
          var(--accent-dark) 80%,
          var(--primary) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 300% auto;
        animation: gradientShift 6s ease infinite;
        text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        letter-spacing: -1px;
      }

      @keyframes gradientShift {
        0% {
          background-position: 0% 50%;
        }
        50% {
          background-position: 100% 50%;
        }
        100% {
          background-position: 0% 50%;
        }
      }

      h2 {
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        position: relative;
        padding-bottom: 1rem;
      }

      h3 {
        font-size: clamp(1.25rem, 3vw, 1.75rem);
      }

      p {
        margin-bottom: 1.5rem;
        color: var(--gray-300);
      }

      /* Container and Layout Classes */
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

      /* Button Styles */
      .btn {
        display: inline-block;
        padding: 0.875rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
        cursor: pointer;
        border: none;
        font-size: 1rem;
      }

      .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: 0 4px 20px rgba(0, 153, 255, 0.5);
      }

      .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 153, 255, 0.6);
      }

      .btn-accent {
        background: var(--accent);
        color: white;
        box-shadow: 0 4px 20px rgba(255, 102, 0, 0.5);
      }

      .btn-accent:hover {
        background: var(--accent-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 102, 0, 0.6);
      }

      .btn-outline {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
      }

      .btn-outline:hover {
        background: var(--primary);
        color: white;
      }

      /* Page Header */
      .page-header {
        padding-top: 8rem;
        text-align: center;
        margin-bottom: 2rem;
      }

      /* Merch-specific styles */
      .merch-section {
        padding: 4rem 0;
        position: relative;
      }

      .merch-section::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(
          circle at 70% 30%,
          rgba(255, 102, 0, 0.15),
          transparent 70%
        );
        z-index: -1;
      }

      .merch-intro {
        max-width: 800px;
        margin: 0 auto 3rem;
        text-align: center;
      }

      .merch-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
      }

      .merch-card {
        background: rgba(26, 26, 26, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .merch-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
      }

      .merch-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
      }

      .merch-info {
        padding: 1.5rem;
      }

      .merch-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: var(--light);
      }

      .merch-desc {
        color: var(--gray-300);
        font-size: 0.9375rem;
        margin-bottom: 1.5rem;
      }

      .merch-price {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-light);
        margin-bottom: 1rem;
        display: block;
      }

      /* CTA Section */
      .cta-section {
        text-align: center;
        padding: 3rem 0;
        background: linear-gradient(
          to right,
          rgba(26, 26, 26, 0.8),
          rgba(18, 18, 18, 0.8)
        );
        border-radius: 1rem;
        margin: 2rem 0;
      }

      .cta-title {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(45deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
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

      /* WooCommerce Specific Styles */
      /* Hide default WooCommerce elements that we don't want */
      .woocommerce ul.products li.product {
        background: transparent;
        border: none;
        padding: 0;
        margin: 0;
        box-shadow: none;
      }

      .woocommerce ul.products {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin: 3rem 0;
        list-style: none;
        padding: 0;
        width: 100%;
      }

      .woocommerce ul.products li.product .woocommerce-loop-product__title,
      .woocommerce ul.products li.product .price {
        display: none;
      }

      .woocommerce ul.products li.product .button {
        display: none;
      }

      /* Custom Product Card Wrapper */
      .custom-product-card {
        width: 100%;
        background: rgba(26, 26, 26, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
      }

      .custom-product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
      }

      .custom-product-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
      }

      .custom-product-info {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
      }

      .custom-product-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: var(--light);
      }

      .custom-product-desc {
        color: var(--gray-300);
        font-size: 0.9375rem;
        margin-bottom: 1.5rem;
        flex-grow: 1;
      }

      .custom-product-price {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-light);
        margin-bottom: 1rem;
        display: block;
      }

      /* Responsive Styles */
      @media (max-width: 992px) {
        .woocommerce ul.products {
          grid-template-columns: repeat(2, 1fr);
        }

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

      @media (max-width: 576px) {
        .woocommerce ul.products {
          grid-template-columns: 1fr;
        }
      }
    </style>


    <!-- Mobile Menu Overlay -->
    <div class="mobile-overlay"></div>

    <!-- Page Header -->
    <section class="page-header">
      <div class="container">
        <h1>Unsere Merch-Kollektion</h1>
      </div>
    </section>

    <!-- Merch Section -->
    <section class="merch-section">
      <div class="container">
        <div class="merch-intro">
          <p>
            Willkommen bei der Alfredo Media Merch-Kollektion! Hier finden Sie
            hochwertige und stylische Kleidung, die nicht nur gut aussieht,
            sondern auch Ihre Unterstützung für unsere Marke zeigt.
          </p>
        </div>

        <!-- WooCommerce Products -->
        <div class="woocommerce-products-wrapper">
          <?php
          // Remove default WooCommerce hooks
          remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
          remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
          remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
          remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
          remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
          remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
          remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
          remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

          // Add our custom product display
          add_action('woocommerce_before_shop_loop_item', 'custom_product_wrapper_open', 10);
          add_action('woocommerce_after_shop_loop_item', 'custom_product_wrapper_close', 10);

          function custom_product_wrapper_open() {
            global $product;
            echo '<div class="custom-product-card">';
            echo '<a href="' . get_permalink($product->get_id()) . '">';
            echo '<img src="' . get_the_post_thumbnail_url($product->get_id(), 'large') . '" alt="' . $product->get_name() . '" class="custom-product-image">';
            echo '</a>';
            echo '<div class="custom-product-info">';
            echo '<h3 class="custom-product-title"><a href="' . get_permalink($product->get_id()) . '">' . $product->get_name() . '</a></h3>';
            echo '<p class="custom-product-desc">' . wp_trim_words($product->get_short_description(), 15) . '</p>';
            echo '<span class="custom-product-price">' . $product->get_price_html() . '</span>';
            echo '<a href="' . $product->add_to_cart_url() . '" class="btn btn-primary add_to_cart_button">IN DEN WARENKORB</a>';
            echo '</div>';
          }
          echo do_shortcode('[products limit="12" columns="3" orderby="date" order="DESC"]');
          function custom_product_wrapper_close() {
            echo '</div>';
          }
move_action('woocommerce_before_shop_loop_item', 'custom_product_wrapper_open', 10);
          // Display productsve_action('woocommerce_after_shop_loop_item', 'custom_product_wrapper_close', 10);
          echo do_shortcode('[products limit="12" columns="3" orderby="date" order="DESC"]');          ?>

          // Remove our custom hooks after use
          remove_action('woocommerce_before_shop_loop_item', 'custom_product_wrapper_open', 10);
          remove_action('woocommerce_after_shop_loop_item', 'custom_product_wrapper_close', 10);class="cta-section">
          ?>
        </div>
t unserer hochwertigen Merch-Kollektion werden Sie Teil der
        <!-- CTA Section -->
        <div class="cta-section">
          <h2 class="cta-title">Zeigen Sie Ihre Unterstützung</h2> href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-accent">ALLE PRODUKTE ANSEHEN</a>
          <p>
            Mit unserer hochwertigen Merch-Kollektion werden Sie Teil der      </div>
            Alfredo Media Familie.
          </p>
          <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-accent">ALLE PRODUKTE ANSEHEN</a>
        </div>
      </div>
    </section>oll", function () {
ader");
    <!-- Scripts -->ow.scrollY > 50) {
    <script>
      // Scroll event to change header background else {
      window.addEventListener("scroll", function () { header.classList.remove("header-scrolled");
        const header = document.getElementById("header");        }
        if (window.scrollY > 50) {
          header.classList.add("header-scrolled");
        } else {
          header.classList.remove("header-scrolled");
        }
      });

      // Mobile menu toggleocument.querySelector(".mobile-overlay").classList.add("active");
      document          document.body.style.overflow = "hidden"; // Prevent scrolling when menu is open
        .querySelector(".mobile-toggle")
        .addEventListener("click", function () {
          document.querySelector(".nav-list").classList.add("active");on overlay
          document.querySelector(".mobile-overlay").classList.add("active");
          document.body.style.overflow = "hidden"; // Prevent scrolling when menu is open
        });

      // Close mobile menu when clicking on overlayocument.querySelector(".mobile-overlay").classList.remove("active");
      document          document.body.style.overflow = ""; // Re-enable scrolling when menu is closed
        .querySelector(".mobile-overlay")
        .addEventListener("click", function () {
          document.querySelector(".nav-list").classList.remove("active");(for better UX)
          document.querySelector(".mobile-overlay").classList.remove("active");
          document.body.style.overflow = ""; // Re-enable scrolling when menu is closed
        });ive");
ocument.querySelector(".mobile-overlay").classList.remove("active");
      // Close mobile menu when clicking a nav link (for better UX) document.body.style.overflow = ""; // Re-enable scrolling
      document.querySelectorAll(".nav-link").forEach(function (link) {        });
        link.addEventListener("click", function () {
          document.querySelector(".nav-list").classList.remove("active");
          document.querySelector(".mobile-overlay").classList.remove("active");
          document.body.style.overflow = ""; // Re-enable scrolling
        });        const navList = document.querySelector(".nav-list");
      });t mobileToggle = document.querySelector(".mobile-toggle");

      // Close mobile menu when clicking outside
      document.addEventListener("click", function (event) {ctive") &&
        const navList = document.querySelector(".nav-list");navList.contains(event.target) &&
        const mobileToggle = document.querySelector(".mobile-toggle");

        if (
          navList.classList.contains("active") && document.querySelector(".mobile-overlay").classList.remove("active");
          !navList.contains(event.target) && document.body.style.overflow = ""; // Re-enable scrolling
          event.target !== mobileToggle







    </script> 