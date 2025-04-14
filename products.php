<?php
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
$product_price = $product->get_price_html();
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

// If no features found, use some default ones or leave empty
if (empty($product_features)) {
    // You can set default features or leave as empty array
    $product_features = array();
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

/* Reset WooCommerce styles */
.woocommerce-page div.product div.images,
.woocommerce-page div.product div.summary,
.woocommerce-page div.product .woocommerce-tabs,
.woocommerce-page div.product .related,
.woocommerce-page div.product .up-sells {
  float: none;
  width: 100%;
  clear: both;
  margin: 0;
  padding: 0;
}

.woocommerce div.product div.summary {
  margin-bottom: 0;
}

.woocommerce div.product form.cart {
  margin-bottom: 0;
}

.woocommerce div.product .price {
  color: var(--accent) !important;
}

.woocommerce div.product .price del {
  color: var(--gray-400) !important;
  opacity: 1 !important;
}

.woocommerce div.product .price ins {
  color: var(--accent) !important;
  text-decoration: none;
}

.woocommerce-product-gallery {
  opacity: 1 !important;
}

/* Extra reset for Oxygen */
#-product-feature-section * {
  box-sizing: border-box;
}

/* Main styles */
.alfredo-product-wrapper {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

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

.alfredo-product-section {
  padding: 2rem 0 4rem;
  position: relative;
  margin-bottom: 2rem;
}

.alfredo-product-section::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

.alfredo-product-intro {
  max-width: 800px;
  margin: 0 auto 3rem;
  text-align: center;
  font-size: 1.1rem;
  color: var(--gray-300);
}

.alfredo-product-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  margin-bottom: 4rem;
  align-items: flex-start;
}

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

.alfredo-product-actions {
  display: flex;
  gap: 1rem;
  margin-top: auto;
  align-items: stretch;
}

.alfredo-product-actions .quantity {
  margin-right: 0 !important;
}

/* Enhanced Quantity Controls */
.alfredo-quantity-wrapper {
  position: relative;
  display: flex;
  align-items: stretch;
  background: rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 0.5rem;
  overflow: hidden;
  width: 140px;
  height: 50px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

.alfredo-quantity-wrapper:hover {
  border-color: var(--primary);
  box-shadow: 0 4px 15px rgba(0, 153, 255, 0.2);
}

.alfredo-quantity-btn {
  width: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0, 0, 0, 0.2);
  border: none;
  color: var(--light);
  font-size: 1.5rem;
  font-weight: 300;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  flex-shrink: 0;
  overflow: hidden;
}

.alfredo-quantity-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0.1), transparent);
  opacity: 0;
  transition: opacity 0.2s ease;
}

.alfredo-quantity-btn:hover {
  background: var(--primary-dark);
  color: white;
}

.alfredo-quantity-btn:hover::before {
  opacity: 1;
}

.alfredo-quantity-btn:active {
  transform: scale(0.95);
}

.alfredo-quantity-input {
  flex: 1;
  width: 50px !important;
  background: transparent !important;
  border: none !important;
  border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
  border-right: 1px solid rgba(255, 255, 255, 0.1) !important;
  color: var(--light) !important;
  font-size: 1.125rem !important;
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

/* Focus state */
.alfredo-quantity-input:focus {
  background: rgba(0, 153, 255, 0.1) !important;
  outline: none !important;
}

/* For variable products */
.woocommerce-variation-add-to-cart .quantity {
  margin-right: 0 !important;
}

/* Quantity controls for variable products */
.woocommerce div.product form.cart div.quantity {
  float: none !important;
  margin: 0 !important;
}

/* Custom wrapper for quantity in variable products */
.single_variation_wrap .woocommerce-variation-add-to-cart .quantity {
  display: flex !important;
  width: 140px !important;
}

.alfredo-add-to-cart-button {
  flex-grow: 1;
  background: var(--accent) !important;
  color: white !important;
  border: none !important;
  border-radius: 0.5rem !important;
  font-weight: 600 !important;
  font-size: 1rem !important;
  padding: 0 2rem !important;
  cursor: pointer !important;
  transition: all 0.3s ease !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  min-height: 45px !important;
  box-shadow: 0 4px 20px rgba(255, 102, 0, 0.3) !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 100%; /* Ensure it takes full width when in column layout */
}

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

/* Enhanced Variable Product Styling */

/* General variations form */
.variations_form {
  margin-bottom: 2rem;
}

/* Table layout */
.variations {
  width: 100%;
  margin-bottom: 1.5rem;
  border-collapse: separate;
  border-spacing: 0 1rem;
}

/* Labels */
.variations label {
  font-weight: 600;
  color: var(--gray-300);
  margin-bottom: 0.5rem;
  display: block;
}

/* Reset variations link */
.reset_variations {
  display: inline-block;
  margin-top: 0.75rem;
  font-size: 0.875rem;
  color: var(--primary);
  text-decoration: none;
  transition: color 0.3s;
}

.reset_variations:hover {
  color: var(--primary-light);
  text-decoration: underline;
}

/* Color swatches */
.variations .value .variable-item {
  margin-right: 0.5rem;
  margin-bottom: 0.5rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

/* Color swatches */
.variable-items-wrapper.color-variable-items-wrapper {
  display: flex;
  flex-wrap: wrap;
  margin: 0;
  padding: 0;
  list-style: none;
}

.variable-items-wrapper .variable-item.color-variable-item {
  width: 30px;
  height: 30px;
  padding: 2px;
  border-radius: 50%;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.1);
  overflow: hidden;
  transition: all 0.3s ease;
}

.variable-items-wrapper .variable-item.color-variable-item.selected {
  border-color: var(--primary);
  box-shadow: 0 0 0 1px var(--primary);
}

.variable-items-wrapper .variable-item.color-variable-item:hover {
  border-color: var(--primary-light);
}

.variable-items-wrapper .variable-item.color-variable-item .variable-item-span {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  display: block;
}

/* Button/Image swatches */
.variable-items-wrapper.button-variable-items-wrapper {
  display: flex;
  flex-wrap: wrap;
  margin: 0;
  padding: 0;
  list-style: none;
}

.variable-items-wrapper .variable-item.button-variable-item {
  padding: 0.5rem 1rem;
  border-radius: 0.5rem;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: var(--gray-300);
  transition: all 0.3s ease;
  margin-right: 0.5rem;
  margin-bottom: 0.5rem;
}

.variable-items-wrapper .variable-item.button-variable-item.selected {
  background: rgba(0, 153, 255, 0.15);
  border-color: var(--primary);
  color: var(--light);
}

.variable-items-wrapper .variable-item.button-variable-item:hover {
  background: rgba(0, 153, 255, 0.1);
  border-color: var(--primary-light);
}

/* Dropdown select for variations */
.variations select {
  padding: 0.75rem 1rem;
  border-radius: 0.5rem;
  background-color: rgba(255, 255, 255, 0.05);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23cbd5e1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 1rem center;
  background-size: 1.2em;
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: var(--light);
  width: 100%;
  max-width: 300px;
  appearance: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

.variations select:hover {
  border-color: var(--primary-light);
}

.variations select:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 2px rgba(0, 153, 255, 0.2);
}

/* Price display for variations */
.woocommerce-variation-price {
  margin-bottom: 1.5rem;
}

.woocommerce-variation-price .price {
  font-size: 1.75rem;
  font-weight: 700;
  color: var(--accent) !important;
  display: block;
}

.woocommerce-variation-price .price del {
  font-size: 1.25rem;
  opacity: 0.7;
  font-weight: normal;
  margin-right: 0.5rem;
}

.woocommerce-variation-price .price ins {
  text-decoration: none;
}

/* Variation description */
.woocommerce-variation-description {
  margin-bottom: 1.5rem;
  font-size: 0.9375rem;
  color: var(--gray-300);
}

/* Variation availability */
.woocommerce-variation-availability {
  margin-bottom: 1.5rem;
}

.woocommerce-variation-availability p.stock {
  margin: 0;
  display: inline-block;
  padding: 0.25rem 0.75rem;
  border-radius: 2rem;
  font-size: 0.875rem;
  font-weight: 500;
}

.woocommerce-variation-availability p.in-stock {
  background: rgba(16, 185, 129, 0.1);
  color: #10b981;
}

.woocommerce-variation-availability p.out-of-stock {
  background: rgba(239, 68, 68, 0.1);
  color: #ef4444;
}

/* Quantity input for variable products */
.woocommerce-variation-add-to-cart {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  align-items: stretch;
}

/* Enhanced add to cart button */
.alfredo-add-to-cart-button,
.single_add_to_cart_button {
  flex-grow: 1;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 0.5rem;
  background: var(--accent) !important;
  color: white !important;
  border: none !important;
  border-radius: 0.5rem !important;
  padding: 0 2rem !important;
  height: 50px !important;
  min-height: 50px !important;
  font-weight: 600 !important;
  font-size: 1rem !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
  cursor: pointer !important;
  transition: all 0.3s ease !important;
  box-shadow: 0 4px 10px rgba(255, 102, 0, 0.3) !important;
  position: relative;
  overflow: hidden;
}

.alfredo-add-to-cart-button::before,
.single_add_to_cart_button::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.7s ease;
}

.alfredo-add-to-cart-button:hover,
.single_add_to_cart_button:hover {
  background: var(--accent-dark) !important;
  transform: translateY(-3px) !important;
  box-shadow: 0 8px 20px rgba(255, 102, 0, 0.4) !important;
}

.alfredo-add-to-cart-button:hover::before,
.single_add_to_cart_button:hover::before {
  left: 100%;
}

.alfredo-add-to-cart-button svg,
.single_add_to_cart_button svg {
  width: 18px;
  height: 18px;
}

.alfredo-add-to-cart-button.loading::after,
.single_add_to_cart_button.loading::after {
  content: "";
  position: absolute;
  top: 50%;
  right: 1rem;
  width: 16px;
  height: 16px;
  margin-top: -8px;
  border: 2px solid rgba(255, 255, 255, 0.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: rotation 0.6s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}

/* Fix for variable products */
.variations_form .variations {
  margin-bottom: 1.5rem;
  width: 100%;
}

.variations_form .variations th,
.variations_form .variations td {
  padding: 0.5rem 0;
  vertical-align: middle;
}

.variations_form .variations th {
  text-align: left;
  color: var(--gray-300);
  width: 30%;
  font-weight: 600;
}

.variations_form .value select {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 0.5rem;
  color: var(--light);
  padding: 0.5rem 1rem;
  width: 100%;
}

/* Tabs section styles */
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

/* Custom styling for variable products wrapper */
.alfredo-variations-wrapper {
  margin-bottom: 2rem;
  padding: 1.5rem;
  background: rgba(26, 26, 26, 0.3);
  border-radius: 1rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
  transition: all 0.3s ease;
}

.alfredo-variations-wrapper.valid-selection {
  border-color: rgba(0, 153, 255, 0.3);
  background: rgba(0, 153, 255, 0.05);
}

/* Responsive styles */
@media (max-width: 992px) {
  .alfredo-product-container {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .alfredo-feature-list {
    grid-template-columns: 1fr;
  }

  .alfredo-products-grid {
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  }

  .variations_form .variations th,
  .variations_form .variations td {
    display: block;
    width: 100%;
  }

  .variations_form .variations th {
    padding-bottom: 0.25rem;
  }

  .variations_form .variations td {
    padding-top: 0.25rem;
  }
}

@media (max-width: 768px) {
  .alfredo-product-actions {
    flex-direction: column;
  }

  .alfredo-quantity-wrapper {
    margin-bottom: 1rem !important;
    width: 100%;
    max-width: 200px;
  }

  .woocommerce-variation-add-to-cart {
    flex-direction: column;
  }

  .woocommerce-variation-add-to-cart .quantity {
    margin-bottom: 1rem;
    width: 100%;
  }

  .woocommerce-variation-add-to-cart .single_add_to_cart_button {
    width: 100%;
  }
}

@media (max-width: 576px) {
  .alfredo-tabs {
    flex-wrap: wrap;
  }

  .alfredo-tab {
    flex: 1 0 auto;
    text-align: center;
  }

  .alfredo-products-grid {
    grid-template-columns: 1fr;
  }

  .variable-items-wrapper {
    justify-content: center;
  }
}
</style>


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
            <?php echo $product_price; ?>
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
        // Add to cart form with improved quantity controls
        if ($product->is_purchasable() && $product->is_in_stock()) {
            echo '<form class="cart" action="'.esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())).'" method="post" enctype="multipart/form-data">';

            // For variable products
            if ($product->is_type('variable')) {
                // Add a wrapper div with a class for easier styling
                echo '<div class="alfredo-variations-wrapper">';

                // This outputs the variation form with all the dropdowns/swatches
                do_action('woocommerce_variable_add_to_cart');

                echo '</div>';
            } else {
                // For simple products
                echo '<div class="alfredo-product-actions">';

                // Quantity input with enhanced design
                echo '<div class="alfredo-quantity-wrapper">';
                echo '<button type="button" class="alfredo-quantity-btn alfredo-decrease-qty">−</button>'; // Using proper minus sign

                woocommerce_quantity_input(array(
                    'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                    'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                    'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(),
                    'classes' => apply_filters('woocommerce_quantity_input_classes', array('input-text', 'qty', 'text', 'alfredo-quantity-input'), $product),
                ));

                echo '<button type="button" class="alfredo-quantity-btn alfredo-increase-qty">+</button>';
                echo '</div>'; // End quantity wrapper

                // Add to cart button
                echo '<button type="submit" name="add-to-cart" value="'.esc_attr($product->get_id()).'" class="alfredo-add-to-cart-button">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">';
                echo '<circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>';
                echo '<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>';
                echo '</svg> In den Warenkorb';
                echo '</button>';

                echo '</div>'; // End product actions
            }

            do_action('woocommerce_before_add_to_cart_button');
            do_action('woocommerce_after_add_to_cart_button');

            echo '</form>';
        } else {
            // Display out of stock or not purchasable message
            echo '<p class="alfredo-product-unavailable">';
            if (!$product->is_in_stock()) {
                echo 'Dieses Produkt ist leider nicht mehr verfügbar.';
            } else {
                echo 'Dieses Produkt kann derzeit nicht gekauft werden.';
            }
            echo '</p>';
        }
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

        <?php do_action('woocommerce_product_additional_information', $product); ?>
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
        <button class="alfredo-cta-button" onclick="document.querySelector('.alfredo-add-to-cart-button').click(); return false;">JETZT KAUFEN</button>
      </div>
    </div>
  </section>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
  // Tabs functionality
  const tabs = document.querySelectorAll('.alfredo-tab');
  const tabContents = document.querySelectorAll('.alfredo-tab-content');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const tabId = tab.getAttribute('data-tab');

      // Remove active class from all tabs and contents
      tabs.forEach(t => t.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));

      // Add active class to clicked tab and corresponding content
      tab.classList.add('active');
      document.getElementById(tabId).classList.add('active');
    });
  });

  // Gallery functionality
  const galleryItems = document.querySelectorAll('.alfredo-gallery-item');
  const mainImage = document.getElementById('main-product-image');

  if (galleryItems.length && mainImage) {
    galleryItems.forEach(item => {
      item.addEventListener('click', () => {
        // Update main image
        const imageSrc = item.getAttribute('data-image');
        mainImage.src = imageSrc;

        // Update active state
        galleryItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
      });
    });
  }

  // Notification function
  function showNotification(title, message) {
    // Check if notification container exists, if not create it
    let notificationContainer = document.getElementById('alfredo-notifications');
    if (!notificationContainer) {
      notificationContainer = document.createElement('div');
      notificationContainer.id = 'alfredo-notifications';
      notificationContainer.style.position = 'fixed';
      notificationContainer.style.top = '20px';
      notificationContainer.style.right = '20px';
      notificationContainer.style.zIndex = '9999';
      document.body.appendChild(notificationContainer);

      // Add styles for notifications
      const style = document.createElement('style');
      style.textContent = `
        .alfredo-notification {
          background: rgba(26, 26, 26, 0.9);
          border-left: 4px solid #0099ff;
          color: white;
          padding: 15px 20px;
          margin-bottom: 10px;
          border-radius: 4px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
          display: flex;
          flex-direction: column;
          min-width: 300px;
          max-width: 400px;
          transform: translateX(120%);
          transition: transform 0.3s ease;
        }
        .alfredo-notification.error {
          border-left-color: #ff3b30;
        }
        .alfredo-notification.success {
          border-left-color: #34c759;
        }
        .alfredo-notification.show {
          transform: translateX(0);
        }
        .alfredo-notification-title {
          font-weight: bold;
          margin-bottom: 5px;
        }
        .alfredo-notification-message {
          font-size: 14px;
        }
        .alfredo-notification-close {
          position: absolute;
          top: 10px;
          right: 10px;
          background: none;
          border: none;
          color: white;
          cursor: pointer;
          font-size: 16px;
          opacity: 0.7;
        }
        .alfredo-notification-close:hover {
          opacity: 1;
        }
      `;
      document.head.appendChild(style);
    }

    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'alfredo-notification';
    if (title.toLowerCase() === 'error') {
      notification.classList.add('error');
    } else if (title.toLowerCase() === 'success') {
      notification.classList.add('success');
    }

    // Add title
    const notificationTitle = document.createElement('div');
    notificationTitle.className = 'alfredo-notification-title';
    notificationTitle.textContent = title;
    notification.appendChild(notificationTitle);

    // Add message
    const notificationMessage = document.createElement('div');
    notificationMessage.className = 'alfredo-notification-message';
    notificationMessage.textContent = message;
    notification.appendChild(notificationMessage);

    // Add close button
    const closeButton = document.createElement('button');
    closeButton.className = 'alfredo-notification-close';
    closeButton.innerHTML = '&times;';
    closeButton.addEventListener('click', () => {
      notification.style.opacity = '0';
      setTimeout(() => {
        notification.remove();
      }, 300);
    });
    notification.appendChild(closeButton);

    // Add to container
    notificationContainer.appendChild(notification);

    // Show notification with animation
    setTimeout(() => {
      notification.classList.add('show');
    }, 10);

    // Auto-remove after 5 seconds
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 5000);
  }

  // Quantity button functionality
  function initQuantityControls() {
    // Find all quantity inputs
    const quantityInputs = document.querySelectorAll('.qty, .input-text.qty.text');
    
    quantityInputs.forEach(input => {
      // Skip if already handled
      if (input.closest('.alfredo-quantity-wrapper')) {
        return;
      }
      
      // Create wrapper element
      const wrapper = document.createElement('div');
      wrapper.className = 'alfredo-quantity-wrapper';
      
      // Create decrease button
      const decreaseBtn = document.createElement('button');
      decreaseBtn.type = 'button';
      decreaseBtn.className = 'alfredo-quantity-btn alfredo-decrease-qty';
      decreaseBtn.textContent = '−';
      
      // Create increase button
      const increaseBtn = document.createElement('button');
      increaseBtn.type = 'button';
      increaseBtn.className = 'alfredo-quantity-btn alfredo-increase-qty';
      increaseBtn.textContent = '+';
      
      // Add input to wrapper with buttons
      const parent = input.parentNode;
      parent.insertBefore(wrapper, input);
      wrapper.appendChild(decreaseBtn);
      wrapper.appendChild(input);
      wrapper.appendChild(increaseBtn);
      
      // Add event listeners to buttons
      decreaseBtn.addEventListener('click', function() {
        const currentValue = parseInt(input.value, 10);
        if (currentValue > 1) {
          input.value = currentValue - 1;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
      });
      
      increaseBtn.addEventListener('click', function() {
        const currentValue = parseInt(input.value, 10);
        const max = input.getAttribute('max') ? parseInt(input.getAttribute('max'), 10) : '';
        
        if (!max || currentValue < max) {
          input.value = currentValue + 1;
          input.dispatchEvent(new Event('change', { bubbles: true }));
        }
      });
    });
  }

  // Function to check if we're on a variation product page
  function isVariableProduct() {
    return document.querySelector('form.variations_form') !== null;
  }

  // Check if all variations are selected
  function allVariationsSelected() {
    const selects = document.querySelectorAll('form.variations_form select[name^="attribute_"]');
    return Array.from(selects).every(select => select.value !== '');
  }

  // Important: Clear any problematic items from cart on page load
  // This helps prevent the "Please choose product options" error
  if (window.location.href.includes('/cart/') && document.querySelector('.woocommerce-error')) {
    // Add a clear cart button for debugging
    const clearCartBtn = document.createElement('button');
    clearCartBtn.textContent = 'Clear Cart';
    clearCartBtn.className = 'button';
    clearCartBtn.style.marginBottom = '20px';
    clearCartBtn.addEventListener('click', function() {
      // Make a request to clear the cart
      fetch('/wp-admin/admin-ajax.php', {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=woocommerce_clear_cart_url'
      })
      .then(() => {
        window.location.reload();
      });
    });
    
    const returnBtn = document.querySelector('.return-to-shop');
    if (returnBtn) {
      returnBtn.parentNode.insertBefore(clearCartBtn, returnBtn);
    }
  }

  // Initialize quantity controls
  initQuantityControls();

  // For variable products - important event listeners
  if (isVariableProduct() && typeof jQuery !== 'undefined') {
    jQuery('form.variations_form').on('found_variation', function(event, variation) {
      setTimeout(initQuantityControls, 100);
    });
    
    jQuery('form.variations_form').on('reset_data', function() {
      setTimeout(initQuantityControls, 100);
    });
    
    // Very important: prevent form submission if not all variations are selected
    jQuery('form.variations_form').on('submit', function(e) {
      if (!allVariationsSelected()) {
        e.preventDefault();
        showNotification('Error', 'Please select all product options before adding to cart');
        return false;
      }
      // Continue with normal submission for variations
      return true;
    });
  }

  // For simple products only
  const simpleForms = document.querySelectorAll('form.cart:not(.variations_form)');
  simpleForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      // Normal submission for simple products
      showNotification('Success', 'Adding product to cart...');
    });
  });

  // Image zoom effect on hover (optional)
  const productImageWrapper = document.querySelector('.alfredo-product-image-wrapper');
  const productImage = document.querySelector('.alfredo-product-image');

  if (productImageWrapper && productImage && window.innerWidth > 768) {
    productImageWrapper.addEventListener('mousemove', function(e) {
      const { left, top, width, height } = this.getBoundingClientRect();
      const x = (e.clientX - left) / width;
      const y = (e.clientY - top) / height;

      productImage.style.transformOrigin = `${x * 100}% ${y * 100}%`;
      productImage.style.transform = 'scale(1.5)';
    });

    productImageWrapper.addEventListener('mouseleave', function() {
      productImage.style.transform = 'scale(1)';
    });
  }

  // If there's a CTA button that should trigger the add to cart
  const ctaButton = document.querySelector('.alfredo-cta-button');
  if (ctaButton) {
    ctaButton.addEventListener('click', function() {
      const addToCartButton = document.querySelector('.single_add_to_cart_button, .alfredo-add-to-cart-button');
      if (addToCartButton) {
        // Check if we're on a variable product page and all variations are selected
        if (isVariableProduct() && !allVariationsSelected()) {
          showNotification('Error', 'Please select all product options before adding to cart');
          return;
        }
        addToCartButton.click();
      }
    });
  }
});
</script>