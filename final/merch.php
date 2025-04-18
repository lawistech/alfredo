<?php
/**
 * Theme Functions: Add this to your theme's functions.php file
 */

// Custom function to display products in a proper grid
function display_custom_products() {
    echo '<div class="custom-product-grid">';

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC'
    );

    $products = new WP_Query($args);

    if($products->have_posts()) {
        while($products->have_posts()) {
            $products->the_post();
            global $product;

            echo '<div class="custom-product-card">';
            echo '<a href="' . get_permalink() . '">';
            echo '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '" alt="' . get_the_title() . '" class="custom-product-image">';
            echo '</a>';
            echo '<div class="custom-product-info">';
            echo '<h3 class="custom-product-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            echo '<span class="custom-product-price">' . $product->get_price_html() . '</span>';
            echo '<a href="' . $product->add_to_cart_url() . '" class="btn btn-primary add_to_cart_button">IN DEN WARENKORB</a>';
            echo '</div>';
            echo '</div>';
        }
    }

    wp_reset_postdata();
    echo '</div>';
}

/**
 * Main Template File
 * This is your complete template file including the custom product display
 */
?>
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="/assets/css/global.css" />



    <!-- Header would go here -->

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

        <!-- NEW: Custom Product Display (replaces WooCommerce shortcode) -->
        <?php display_custom_products(); ?>

        <!-- CTA Section -->
        <div class="cta-section">
          <h2 class="cta-title">Zeigen Sie Ihre Unterstützung</h2>
          <p>
            Mit unserer hochwertigen Merch-Kollektion werden Sie Teil der
            Alfredo Media Familie.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer would go here -->

    <!-- Scripts -->
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

      // Close mobile menu when clicking outside
      document.addEventListener("click", function (event) {
        const navList = document.querySelector(".nav-list");
        const mobileToggle = document.querySelector(".mobile-toggle");

        if (
          navList.classList.contains("active") &&
          !navList.contains(event.target) &&
          event.target !== mobileToggle
        ) {
          navList.classList.remove("active");
          document.querySelector(".mobile-overlay").classList.remove("active");
          document.body.style.overflow = ""; // Re-enable scrolling
        }
      });
    </script>