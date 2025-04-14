<?php
/**
 * Enhanced WooCommerce Single Product Template for Alfredo Media
 * 
 * This template provides a custom layout for single product pages
 * while ensuring proper WooCommerce cart functionality.
 */

// Make sure this is a single product page
if (!is_product()) {
    return;
}

// Get the global product object
global $product;

// Get product data
$product_id = $product->get_id();
$product_name = $product->get_name();
$product_description = $product->get_description();
$product_short_description = $product->get_short_description();
$product_price_html = $product->get_price_html();
$product_regular_price = $product->get_regular_price();
$product_sale_price = $product->get_sale_price();

// Calculate savings if the product is on sale
$savings = '';
$savings_amount = '';
$savings_percentage = '';
if ($product->is_on_sale() && $product_regular_price && $product_sale_price) {
    $savings_amount = $product_regular_price - $product_sale_price;
    $savings = wc_price($savings_amount);
    $savings_percentage = round(($savings_amount / $product_regular_price) * 100);
}

// Get product image
$image_id = $product->get_image_id();
$image_url = wp_get_attachment_image_url($image_id, 'full');
if (!$image_url) {
    $image_url = wc_placeholder_img_src('full');
}

// Get product gallery images
$attachment_ids = $product->get_gallery_image_ids();
$gallery_images = array();
foreach ($attachment_ids as $attachment_id) {
    $gallery_images[] = wp_get_attachment_url($attachment_id);
}

// Best seller badge - you can use product tags or other criteria
$is_bestseller = has_term('bestseller', 'product_tag', $product_id);

// Get product features from product attributes or a custom field
$product_features = array();
$attributes = $product->get_attributes();
if (!empty($attributes)) {
    foreach ($attributes as $attribute) {
        if ($attribute->get_visible()) {
            $name = $attribute->get_name();
            $values = array();
            if ($attribute->is_taxonomy()) {
                $terms = wp_get_post_terms($product_id, $name, 'all');
                foreach ($terms as $term) {
                    $values[] = $term->name;
                }
            } else {
                $values = $attribute->get_options();
            }

            if (!empty($values)) {
                foreach ($values as $value) {
                    $product_features[] = $value;
                }
            }
        }
    }
}

// Alternatively, get features from a custom field
$custom_features = get_post_meta($product_id, 'product_features', true);
if (!empty($custom_features) && is_array($custom_features)) {
    $product_features = array_merge($product_features, $custom_features);
}

// Get related products
$related_limit = 3;
$related_ids = wc_get_related_products($product_id, $related_limit);
$related_products = array();

foreach ($related_ids as $related_id) {
    $related_product = wc_get_product($related_id);
    if ($related_product) {
        $related_products[] = array(
            'id' => $related_id,
            'name' => $related_product->get_name(),
            'price' => $related_product->get_price_html(),
            'image' => get_the_post_thumbnail_url($related_id, 'medium') ?: wc_placeholder_img_src('medium'),
            'url' => get_permalink($related_id),
        );
    }
}

// Get product categories for breadcrumbs
$product_categories = get_the_terms($product_id, 'product_cat');
$categories = array();
if (!empty($product_categories) && !is_wp_error($product_categories)) {
    foreach ($product_categories as $category) {
        $categories[] = array(
            'name' => $category->name,
            'url' => get_term_link($category)
        );
    }
}
?>

<!-- Main Product Container -->
<div class="alfredo-product-wrapper">
  <!-- Breadcrumbs -->
  <div class="alfredo-breadcrumbs">
    <a href="<?php echo esc_url(home_url()); ?>">Home</a>
    <span class="alfredo-separator">›</span>
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Shop</a>
    <?php if (!empty($categories)): ?>
      <span class="alfredo-separator">›</span>
      <a href="<?php echo esc_url($categories[0]['url']); ?>"><?php echo esc_html($categories[0]['name']); ?></a>
    <?php endif; ?>
    <span class="alfredo-separator">›</span>
    <span><?php echo esc_html($product_name); ?></span>
  </div>

  <section class="alfredo-product-section">
    <div class="alfredo-product-container">
      <div class="alfredo-product-image-container">
        <div class="alfredo-product-image-wrapper">
          <?php if ($is_bestseller): ?>
            <span class="alfredo-badge">BESTSELLER</span>
          <?php endif; ?>

          <?php if ($product->is_on_sale() && $savings_percentage): ?>
            <span class="alfredo-discount-badge">-<?php echo esc_html($savings_percentage); ?>%</span>
          <?php endif; ?>

          <img
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($product_name); ?>"
            class="alfredo-product-image"
            id="main-product-image"
          />
        </div>

        <?php if (!empty($gallery_images) || $image_url): ?>
        <div class="alfredo-product-gallery">
          <?php if ($image_url): ?>
            <div class="alfredo-gallery-item active" data-image="<?php echo esc_url($image_url); ?>">
              <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product_name); ?>" />
            </div>
          <?php endif; ?>

          <?php foreach ($gallery_images as $index => $gallery_image): ?>
            <div class="alfredo-gallery-item" data-image="<?php echo esc_url($gallery_image); ?>">
              <img src="<?php echo esc_url($gallery_image); ?>" alt="<?php echo esc_attr($product_name); ?> - Image <?php echo esc_attr($index + 1); ?>" />
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      
      <div class="alfredo-product-details">
        <?php if ($product->get_categories()): ?>
          <div class="alfredo-product-subtitle"><?php echo wc_get_product_category_list($product_id); ?></div>
        <?php endif; ?>

        <h1 class="alfredo-product-title"><?php echo esc_html($product_name); ?></h1>

        <div class="alfredo-product-price-container">
          <div class="alfredo-product-price">
            <?php echo $product_price_html; ?>
          </div>

          <?php if ($product->is_on_sale() && $product_regular_price && $product_sale_price): ?>
            <span class="alfredo-price-save">Sie sparen <?php echo $savings; ?> (<?php echo esc_html($savings_percentage); ?>%)</span>
          <?php endif; ?>
        </div>

        <div class="alfredo-product-description">
          <?php echo wpautop($product_short_description); ?>
        </div>

        <?php if (!empty($product_features)): ?>
        <div class="alfredo-feature-section">
          <h3 class="alfredo-feature-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            Produktmerkmale
          </h3>
          <ul class="alfredo-feature-list">
            <?php foreach ($product_features as $feature): ?>
              <li class="alfredo-feature-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <?php echo esc_html($feature); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <div class="alfredo-product-meta">
          <span>SKU: <?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'N/A'; ?></span>
          <?php if ($product->get_tags()): ?>
            <span>Tags: <?php echo wc_get_product_tag_list($product_id); ?></span>
          <?php endif; ?>
        </div>

        <?php
        /**
         * IMPORTANT: This section is key for cart functionality
         * Instead of creating our own add to cart form, we let WooCommerce handle it
         */
        if ($product->is_purchasable() && $product->is_in_stock()): 
            if ($product->is_type('variable')):
                // For variable products, we output the entire form
                echo '<div class="alfredo-variations-wrapper">';
                woocommerce_variable_add_to_cart();
                echo '</div>';
            else:
                // For simple products, we create a styled wrapper but use WooCommerce's add to cart functionality
                ?>
                <div class="alfredo-add-to-cart-wrapper">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
                <?php
            endif;
        else:
            // Display out of stock message
            ?>
            <p class="alfredo-product-unavailable">
                <?php if (!$product->is_in_stock()): ?>
                    Dieses Produkt ist leider nicht mehr verfügbar.
                <?php else: ?>
                    Dieses Produkt kann derzeit nicht gekauft werden.
                <?php endif; ?>
            </p>
            <?php
        endif;
        ?>

        <div class="alfredo-secure-checkout">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
          </svg>
          Sichere Zahlung mit SSL-Verschlüsselung
        </div>
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="alfredo-tabs-container">
      <div class="alfredo-tabs">
        <div class="alfredo-tab active" data-tab="description">Beschreibung</div>
        <div class="alfredo-tab" data-tab="specs">Spezifikationen</div>
        <div class="alfredo-tab" data-tab="testimonials">Kundenstimmen</div>
      </div>

      <div class="alfredo-tab-content active" id="description">
        <h3>Über das <?php echo esc_html($product_name); ?></h3>
        <?php echo wpautop($product_description); ?>
      </div>

      <div class="alfredo-tab-content" id="specs">
        <h3>Technische Details</h3>

        <?php if ($product->has_attributes()): ?>
          <table class="alfredo-specs-table">
            <tbody>
              <?php foreach ($product->get_attributes() as $attribute): ?>
                <?php if ($attribute->get_visible()): ?>
                  <tr>
                    <th><?php echo wc_attribute_label($attribute->get_name()); ?></th>
                    <td>
                      <?php
                      $values = array();
                      if ($attribute->is_taxonomy()) {
                        $attribute_taxonomy = $attribute->get_taxonomy_object();
                        $attribute_values = wc_get_product_terms($product->get_id(), $attribute->get_name(), array('fields' => 'all'));

                        foreach ($attribute_values as $attribute_value) {
                          $values[] = esc_html($attribute_value->name);
                        }
                      } else {
                        $values = $attribute->get_options();
                        foreach ($values as &$value) {
                          $value = esc_html($value);
                        }
                      }
                      echo apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                      ?>
                    </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Für dieses Produkt sind keine technischen Details verfügbar.</p>
        <?php endif; ?>
      </div>

      <div class="alfredo-tab-content" id="testimonials">
        <h3>Das sagen unsere Kunden</h3>

        <?php if ($product->get_review_count() > 0): ?>
          <?php
          $args = array(
            'post_id' => $product_id,
            'status' => 'approve',
            'number' => 5,
          );
          $comments = get_comments($args);
          ?>

          <?php foreach ($comments as $comment): ?>
            <div class="alfredo-testimonial">
              <div class="alfredo-testimonial-rating">
                <?php
                $rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
                for ($i = 1; $i <= 5; $i++) {
                  if ($i <= $rating) {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
                  } else {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
                  }
                }
                ?>
              </div>
              <div class="alfredo-testimonial-content">
                <?php echo wpautop(get_comment_text($comment)); ?>
              </div>
              <div class="alfredo-testimonial-author">
                — <?php echo get_comment_author($comment); ?>
              </div>
            </div>
          <?php endforeach; ?>

          <?php if ($product->get_review_count() > 5): ?>
            <div style="text-align: center; margin-top: 2rem;">
              <a href="#reviews" class="alfredo-btn alfredo-btn-outline">Alle Bewertungen ansehen</a>
            </div>
          <?php endif; ?>

        <?php else: ?>
          <p>Dieses Produkt hat noch keine Bewertungen. Seien Sie der Erste, der dieses Produkt bewertet!</p>
          <div style="margin-top: 2rem;">
            <a href="#review_form" class="alfredo-btn alfredo-btn-primary">Bewertung schreiben</a>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <?php if (!empty($related_products)): ?>
    <!-- Related Products Section -->
    <div class="alfredo-related-products">
      <h2 class="alfredo-related-title">Diese Produkte könnten Sie auch interessieren</h2>
      <div class="alfredo-products-grid">
        <?php foreach ($related_products as $related_product): ?>
          <div class="alfredo-product-card">
            <img
              src="<?php echo esc_url($related_product['image']); ?>"
              alt="<?php echo esc_attr($related_product['name']); ?>"
              class="alfredo-product-card-image"
            />
            <div class="alfredo-product-card-info">
              <h3 class="alfredo-product-card-title"><?php echo esc_html($related_product['name']); ?></h3>
              <span class="alfredo-product-card-price"><?php echo $related_product['price']; ?></span>
              <a href="<?php echo esc_url($related_product['url']); ?>" class="alfredo-product-card-button">DETAILS ANSEHEN</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- CTA Section -->
    <div class="alfredo-cta-section">
      <div class="alfredo-cta-content">
        <h2 class="alfredo-cta-title">Bereit für Ihren digitalen Erfolg?</h2>
        <p class="alfredo-cta-description">
          Steigern Sie Ihre Online-Präsenz und erreichen Sie mehr Kunden mit unserem <?php echo esc_html($product_name); ?>.
        </p>
        <button class="alfredo-cta-button">JETZT KAUFEN</button>
      </div>
    </div>
  </section>
</div>

<script>
jQuery(document).ready(function($) {
  // Tabs functionality
  $('.alfredo-tab').on('click', function() {
    const tabId = $(this).data('tab');
    $('.alfredo-tab').removeClass('active');
    $('.alfredo-tab-content').removeClass('active');
    $(this).addClass('active');
    $('#' + tabId).addClass('active');
  });

  // Gallery functionality
  $('.alfredo-gallery-item').on('click', function() {
    const imageSrc = $(this).data('image');
    $('#main-product-image').attr('src', imageSrc);
    $('.alfredo-gallery-item').removeClass('active');
    $(this).addClass('active');
  });

  // Handle CTA button click - trigger the add to cart button
  $('.alfredo-cta-button').on('click', function() {
    // Find and click the actual add to cart button
    $('.single_add_to_cart_button').click();
  });

  // Fix quantity handling for WooCommerce
  function handleQuantityButtons() {
    // Increase quantity
    $(document).on('click', '.quantity .plus, .quantity .increment', function(e) {
      e.preventDefault();
      let input = $(this).closest('.quantity').find('.qty');
      let val = parseInt(input.val());
      let max = parseInt(input.attr('max'));
      
      if (!max || val < max) {
        input.val(val + 1).change();
      }
    });

    // Decrease quantity
    $(document).on('click', '.quantity .minus, .quantity .decrement', function(e) {
      e.preventDefault();
      let input = $(this).closest('.quantity').find('.qty');
      let val = parseInt(input.val());
      let min = parseInt(input.attr('min'));
      
      if (!min || val > min) {
        if (val > 1) {
          input.val(val - 1).change();
        }
      }
    });
  }

  // Initialize the quantity handling
  handleQuantityButtons();

  // For variable products, we need to reinitialize after variation change
  if ($('form.variations_form').length) {
    $('form.variations_form').on('woocommerce_variation_has_changed', function() {
      handleQuantityButtons();
    });
  }

  // Add styling to WooCommerce quantity inputs
  function styleQuantityInputs() {
    $('.woocommerce .quantity:not(.styled)').each(function() {
      $(this).addClass('styled alfredo-quantity-wrapper');
      
      // Only add buttons if they don't exist
      if (!$(this).find('.minus').length) {
        $(this).prepend('<button type="button" class="minus alfredo-quantity-btn">−</button>');
      }
      
      if (!$(this).find('.plus').length) {
        $(this).append('<button type="button" class="plus alfredo-quantity-btn">+</button>');
      }
      
      // Add the custom class to the input
      $(this).find('input.qty').addClass('alfredo-quantity-input');
    });
  }

  // Initialize and run when variations change
  styleQuantityInputs();
  $('body').on('woocommerce_variation_has_changed', styleQuantityInputs);
});
</script>

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

/* Main container styles */
.alfredo-product-wrapper {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

/* Breadcrumbs */
.alfredo-breadcrumbs {
  padding-top: 2rem;
  margin-bottom: 2rem;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.alfredo-breadcrumbs a {
  color: var(--gray-400);
  text-decoration: none;
  font-size: 0.875rem;
  transition: color 0.3s;
}

.alfredo-breadcrumbs a:hover {
  color: var(--primary);
}

.alfredo-breadcrumbs .alfredo-separator {
  color: var(--gray-500);
  margin: 0 0.5rem;
}

/* Product section */
.alfredo-product-section {
  padding: 2rem 0 4rem;
  position: relative;
  margin-bottom: 2rem;
}

.alfredo-product-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  margin-bottom: 4rem;
  align-items: start;
}

/* Product image */
.alfredo-product-image-container {
  position: relative;
}

.alfredo-product-image-wrapper {
  position: relative;
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

.alfredo-product-image {
  width: 100%;
  display: block;
  transition: transform 0.5s ease;
}

.alfredo-product-image-wrapper:hover .alfredo-product-image {
  transform: scale(1.05);
}

.alfredo-badge {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: var(--accent);
  color: var(--light);
  padding: 0.5rem 1rem;
  font-weight: 600;
  font-size: 0.875rem;
  border-radius: 0.5rem;
  z-index: 2;
  box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
}

.alfredo-discount-badge {
  position: absolute;
  top: 1rem;
  left: 1rem;
  background: var(--primary);
  color: var(--light);
  padding: 0.5rem 1rem;
  font-weight: 600;
  font-size: 0.875rem;
  border-radius: 0.5rem;
  z-index: 2;
  box-shadow: 0 4px 12px rgba(0, 153, 255, 0.3);
}

.alfredo-product-gallery {
  display: flex;
  gap: 0.5rem;
  margin-top: 1rem;
}

.alfredo-gallery-item {
  width: 80px;
  height: 80px;
  border-radius: 0.5rem;
  overflow: hidden;
  cursor: pointer;
  border: 2px solid transparent;
  transition: all 0.3s ease;
}

.alfredo-gallery-item:hover {
  transform: translateY(-3px);
}

.alfredo-gallery-item.active {
  border-color: var(--primary);
  box-shadow: 0 4px 12px rgba(0, 153, 255, 0.3);
}

.alfredo-gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Product details */
.alfredo-product-details {
  display: flex;
  flex-direction: column;
}

.alfredo-product-subtitle {
  color: var(--primary);
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.alfredo-product-title {
  font-size: 2.5rem;
  margin-bottom: 1rem;
  color: var(--light);
  line-height: 1.2;
}

.alfredo-product-price-container {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 0.75rem;
  margin-bottom: 1.5rem;
}

.alfredo-product-price {
  font-size: 2rem;
  font-weight: 700;
  color: var(--accent);
}

.alfredo-product-price del {
  font-size: 1.25rem;
  color: var(--gray-400);
  text-decoration: line-through;
  font-weight: normal;
}

.alfredo-product-price ins {
  text-decoration: none;
}

.alfredo-price-save {
  font-size: 1rem;
  color: var(--primary-light);
  font-weight: 500;
  background: rgba(0, 153, 255, 0.1);
  padding: 0.25rem 0.75rem;
  border-radius: 2rem;
}

.alfredo-product-description {
  margin-bottom: 2rem;
  color: var(--gray-300);
  font-size: 1.05rem;
  line-height: 1.6;
}

/* Feature section */
.alfredo-feature-section {
  margin-bottom: 2rem;
  background: rgba(26, 26, 26, 0.4);
  border-radius: 1rem;
  padding: 1.5rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.alfredo-feature-title {
  font-size: 1.25rem;
  margin-bottom: 1rem;
  color: var(--light);
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.alfredo-feature-title svg {
  color: var(--primary);
}

.alfredo-feature-list {
  list-style: none;
  margin-bottom: 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0.75rem 2rem;
}

.alfredo-feature-item {
  display: flex;
  align-items: flex-start;
  color: var(--gray-300);
  font-size: 0.95rem;
}

.alfredo-feature-item svg {
  color: var(--primary);
  min-width: 20px;
  margin-right: 0.75rem;
  margin-top: 0.25rem;
}

.alfredo-product-meta {
  margin-bottom: 2rem;
  font-size: 0.875rem;
  color: var(--gray-400);
}

.alfredo-product-meta span {
  display: inline-block;
  margin-right: 1rem;
}

.alfredo-product-meta a {
  color: var(--primary);
  text-decoration: none;
  transition: color 0.3s;
}

.alfredo-product-meta a:hover {
  color: var(--primary-light);
}

/* Cart related styles */
.alfredo-add-to-cart-wrapper {
  margin-bottom: 2rem;
}

.alfredo-variations-wrapper {
  margin-bottom: 2rem;
  padding: 1.5rem;
  background: rgba(26, 26, 26, 0.4);
  border-radius: 1rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

/* WooCommerce overrides for better integration */
.woocommerce div.product form.cart {
  margin-bottom: 1rem;
}

.woocommerce div.product p.price,
.woocommerce div.product span.price {
  color: var(--accent) !important;
}

/* Quantity controls styling */
.woocommerce .quantity {
  position: relative;
  display: flex;
  align-items: center;
  margin-right: 1rem !important;
}

.woocommerce .quantity .qty {
  width: 3.631em;
  text-align: center;
  padding: .5rem;
  height: 45px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 0.5rem;
  color: var(--light);
}

/* Custom styled quantity input */
.alfredo-quantity-wrapper {
  display: flex;
  align-items: center;
  background: rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 0.5rem;
  overflow: hidden;
  width: 130px;
  height: 45px;
  transition: all 0.3s ease;
  margin-right: 1rem !important;
}

.alfredo-quantity-wrapper:hover {
  border-color: var(--primary);
}

.alfredo-quantity-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 100%;
  background: rgba(0, 0, 0, 0.2);
  border: none;
  color: var(--light);
  font-size: 1.25rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.alfredo-quantity-btn:hover {
  background: var(--primary-dark);
  color: white;
}

.alfredo-quantity-btn:focus {
  outline: none;
}

.alfredo-quantity-input {
  flex: 1;
  width: 50px;
  background: transparent !important;
  border: none !important;
  border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
  border-right: 1px solid rgba(255, 255, 255, 0.1) !important;
  color: var(--light) !important;
  font-size: 1rem !important;
  font-weight: 600 !important;
  text-align: center !important;
  padding: 0 !important;
  margin: 0 !important;
  -moz-appearance: textfield !important;
}

.alfredo-quantity-input::-webkit-outer-spin-button,
.alfredo-quantity-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Add to cart button styling */
.woocommerce div.product form.cart .button,
.single_add_to_cart_button,
button.single_add_to_cart_button.button.alt {
  background-color: var(--accent) !important;
  color: white !important;
  border: none !important;
  border-radius: 0.5rem !important;
  padding: 0 2rem !important;
  height: 45px !important;
  font-weight: 600 !important;
  font-size: 1rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  transition: all 0.3s ease !important;
  box-shadow: 0 4px 10px rgba(255, 102, 0, 0.3) !important;
}

.woocommerce div.product form.cart .button:hover,
.single_add_to_cart_button:hover,
button.single_add_to_cart_button.button.alt:hover {
  background-color: var(--accent-dark) !important;
  transform: translateY(-3px) !important;
  box-shadow: 0 8px 20px rgba(255, 102, 0, 0.4) !important;
}

/* Product unavailable message */
.alfredo-product-unavailable {
  background: rgba(255, 0, 0, 0.1);
  color: var(--light);
  padding: 1rem;
  border-radius: 0.5rem;
  border: 1px solid rgba(255, 0, 0, 0.2);
  margin-bottom: 2rem;
  font-size: 0.95rem;
  text-align: center;
}

/* Secure checkout info */
.alfredo-secure-checkout {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 1rem;
  color: var(--gray-400);
  font-size: 0.875rem;
}

.alfredo-secure-checkout svg {
  color: var(--primary);
}

/* Tabs styling */
.alfredo-tabs-container {
  margin-top: 4rem;
}

.alfredo-tabs {
  display: flex;
  overflow-x: auto;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  margin-bottom: 2rem;
}

.alfredo-tab {
  padding: 1rem 1.5rem;
  color: var(--gray-400);
  cursor: pointer;
  position: relative;
  white-space: nowrap;
  font-weight: 500;
}

.alfredo-tab:after {
  content: '';
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: width 0.3s ease;
}

.alfredo-tab.active {
  color: var(--light);
}

.alfredo-tab.active:after {
  width: 100%;
}

.alfredo-tab-content {
  display: none;
  padding: 1rem 0 2rem;
}

.alfredo-tab-content.active {
  display: block;
  animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.alfredo-tab-content h3 {
  margin-bottom: 1.5rem;
  color: var(--primary-light);
}

/* Specs table */
.alfredo-specs-table {
  width: 100%;
  border-collapse: collapse;
}

.alfredo-specs-table th,
.alfredo-specs-table td {
  padding: 0.75rem;
  text-align: left;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.alfredo-specs-table th {
  width: 30%;
  color: var(--gray-300);
  font-weight: 600;
}

.alfredo-specs-table td {
  color: var(--light);
}

/* Testimonials */
.alfredo-testimonial {
  background: rgba(26, 26, 26, 0.4);
  border-radius: 1rem;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.alfredo-testimonial-rating {
  display: flex;
  margin-bottom: 1rem;
  color: var(--accent);
}

.alfredo-testimonial-content {
  color: var(--gray-300);
  font-style: italic;
  margin-bottom: 1rem;
}

.alfredo-testimonial-author {
  color: var(--light);
  font-weight: 500;
}

/* Related products section */
.alfredo-related-products {
  margin-top: 4rem;
}

.alfredo-related-title {
  text-align: center;
  margin-bottom: 2rem;
  color: var(--primary-light);
}

.alfredo-products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.alfredo-product-card {
  background: rgba(26, 26, 26, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 1rem;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.alfredo-product-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

.alfredo-product-card-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.alfredo-product-card-info {
  padding: 1.5rem;
}

.alfredo-product-card-title {
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
  color: var(--light);
}

.alfredo-product-card-price {
  display: block;
  margin-bottom: 1rem;
  font-weight: 600;
  color: var(--accent);
}

.alfredo-product-card-button {
  display: inline-block;
  padding: 0.6rem 1rem;
  background: var(--primary);
  color: white;
  text-decoration: none;
  border-radius: 0.5rem;
  font-size: 0.9rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.alfredo-product-card-button:hover {
  background: var(--primary-dark);
  transform: translateY(-3px);
}

/* CTA section */
.alfredo-cta-section {
  margin-top: 4rem;
  padding: 3rem 2rem;
  text-align: center;
  background: linear-gradient(135deg, rgba(0, 153, 255, 0.1), rgba(255, 102, 0, 0.1));
  border-radius: 1rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.alfredo-cta-title {
  font-size: 2rem;
  margin-bottom: 1rem;
  background: linear-gradient(45deg, var(--primary), var(--accent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.alfredo-cta-description {
  max-width: 700px;
  margin: 0 auto 2rem;
  color: var(--gray-300);
  font-size: 1.1rem;
}

.alfredo-cta-button {
  display: inline-block;
  padding: 1rem 2.5rem;
  background: var(--accent);
  color: white;
  font-weight: 600;
  font-size: 1rem;
  border: none;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 0.3s ease;
  text-transform: uppercase;
  letter-spacing: 1px;
  box-shadow: 0 4px 20px rgba(255, 102, 0, 0.3);
}

.alfredo-cta-button:hover {
  background: var(--accent-dark);
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(255, 102, 0, 0.4);
}

/* Variations/attributes styling */
.variations {
  width: 100%;
  margin-bottom: 1.5rem;
}

.variations tr {
  display: flex;
  flex-direction: column;
  margin-bottom: 1rem;
}

.variations th {
  text-align: left;
  padding-bottom: 0.5rem;
  color: var(--gray-300);
  font-weight: 600;
}

.variations td {
  padding: 0;
}

.variations select {
  width: 100%;
  padding: 0.75rem;
  background-color: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 0.5rem;
  color: var(--light);
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23cbd5e1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.75rem center;
  background-size: 1em;
}

.variations .reset_variations {
  display: inline-block;
  margin-top: 0.75rem;
  color: var(--primary);
  text-decoration: none;
}

.woocommerce-variation-price {
  margin-bottom: 1rem;
}

.woocommerce-variation-availability {
  margin-bottom: 1rem;
}

.woocommerce div.product form.cart .variations {
  margin-bottom: 1.5rem;
}

/* Form layout fixes */
.woocommerce div.product form.cart div.quantity {
  float: none;
  margin: 0 0 1rem 0;
}

.woocommerce-variation-add-to-cart {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

/* Media queries for responsive design */
@media (max-width: 992px) {
  .alfredo-product-container {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .alfredo-feature-list {
    grid-template-columns: 1fr;
  }

  .woocommerce .quantity {
    margin-bottom: 1rem;
  }

  .woocommerce-variation-add-to-cart {
    flex-direction: column;
    align-items: flex-start;
  }

  .woocommerce div.product form.cart div.quantity {
    margin-bottom: 1rem;
  }
}

@media (max-width: 768px) {
  .alfredo-tabs {
    overflow-x: auto;
  }

  .alfredo-tab {
    padding: 0.75rem 1rem;
    white-space: nowrap;
  }

  .alfredo-products-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }
}

@media (max-width: 576px) {
  .alfredo-products-grid {
    grid-template-columns: 1fr;
  }

  .alfredo-cta-section {
    padding: 2rem 1rem;
  }
}

</style>