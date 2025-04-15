<!-- Simple WooCommerce Cart Page for Oxygen Builder -->
<style>
/* Basic Reset for Cart Page */
.woocommerce-cart-form {
  max-width: 1200px;
  margin: 0 auto;
}

/* Basic Table Styling */
.woocommerce-cart-form__contents {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 2rem;
  background: rgba(26, 26, 26, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  overflow: hidden;
}

.woocommerce-cart-form__contents th {
  background: rgba(0, 0, 0, 0.3);
  color: #cbd5e1;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.875rem;
  letter-spacing: 0.5px;
  padding: 1rem;
  text-align: left;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.woocommerce-cart-form__contents td {
  padding: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  color: #ffffff;
  vertical-align: middle;
}

/* Product Image */
.woocommerce-cart-form__contents img {
  width: 70px !important;
  height: 70px !important;
  object-fit: cover;
  border-radius: 0.5rem;
  display: block;
}

/* Product Name */
.woocommerce-cart-form__contents td.product-name a {
  color: #ffffff;
  text-decoration: none;
  font-weight: 500;
}

.woocommerce-cart-form__contents td.product-name a:hover {
  color: #0099ff;
}

/* Product Price */
.woocommerce-cart-form__contents td.product-price {
  color: #cbd5e1;
}

/* Product Subtotal */
.woocommerce-cart-form__contents td.product-subtotal {
  color: #ff6600;
  font-weight: bold;
}

/* Remove Button */
.woocommerce-cart-form__contents td.product-remove a.remove {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
  background: rgba(239, 68, 68, 0.1);
  color: #ef4444 !important;
  border-radius: 50%;
  text-decoration: none;
  font-size: 1.25rem;
  line-height: 1;
}

.woocommerce-cart-form__contents td.product-remove a.remove:hover {
  background: #ef4444;
  color: white !important;
}

/* Quantity Input */
.woocommerce-cart-form__contents .quantity {
  display: flex;
  align-items: center;
}

.woocommerce-cart-form__contents .quantity input {
  width: 50px;
  text-align: center;
  padding: 0.5rem;
  border: 1px solid rgba(255, 255, 255, 0.1);
  background: rgba(0, 0, 0, 0.2);
  color: #ffffff;
  border-radius: 0.25rem;
}

/* Actions Section */
.woocommerce-cart-form__contents .actions {
  padding: 1rem;
  background: rgba(0, 0, 0, 0.1);
}

.woocommerce-cart-form__contents .actions .coupon {
  display: flex;
  gap: 0.5rem;
  margin-bottom: 1rem;
}

.woocommerce-cart-form__contents .actions .coupon .input-text {
  padding: 0.5rem;
  border: 1px solid rgba(255, 255, 255, 0.1);
  background: rgba(0, 0, 0, 0.2);
  color: #ffffff;
  border-radius: 0.25rem;
}

.woocommerce-cart-form__contents .actions .button {
  background: #0099ff;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 0.25rem;
  cursor: pointer;
}

.woocommerce-cart-form__contents .actions .button:hover {
  background: #0077cc;
}

/* Cart Totals */
.cart-collaterals {
  max-width: 1200px;
  margin: 0 auto;
}

.cart-collaterals .cart_totals {
  float: right;
  width: 40%;
  background: rgba(26, 26, 26, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  overflow: hidden;
}

.cart-collaterals .cart_totals h2 {
  background: rgba(0, 0, 0, 0.3);
  color: #cbd5e1;
  font-size: 1.25rem;
  padding: 1rem;
  margin: 0;
}

.cart-collaterals .cart_totals table {
  width: 100%;
  border-collapse: collapse;
}

.cart-collaterals .cart_totals th,
.cart-collaterals .cart_totals td {
  padding: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  color: #ffffff;
}

.cart-collaterals .cart_totals .order-total td {
  color: #ff6600;
  font-weight: bold;
}

.cart-collaterals .wc-proceed-to-checkout {
  padding: 1rem;
}

.cart-collaterals .wc-proceed-to-checkout .button {
  display: block;
  width: 100%;
  background: #ff6600;
  color: white;
  border: none;
  padding: 0.75rem;
  border-radius: 0.25rem;
  text-align: center;
  text-decoration: none;
  font-weight: bold;
  cursor: pointer;
}

.cart-collaterals .wc-proceed-to-checkout .button:hover {
  background: #cc5200;
}

/* Empty Cart */
.cart-empty.woocommerce-info {
  background: rgba(26, 26, 26, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.05);
  border-radius: 0.5rem;
  padding: 2rem;
  text-align: center;
  color: #cbd5e1;
  max-width: 1200px;
  margin: 2rem auto;
}

.return-to-shop {
  text-align: center;
  margin: 2rem auto;
  max-width: 1200px;
}

.return-to-shop .button {
  background: #0099ff;
  color: white;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 0.25rem;
  text-decoration: none;
  display: inline-block;
}

.return-to-shop .button:hover {
  background: #0077cc;
}

/* Clean up WooCommerce default styles */
.woocommerce a.remove {
  display: inline-block !important;
}

.woocommerce-cart table.cart img {
  width: 70px !important;
}

.woocommerce-cart table.cart td.actions .coupon .input-text {
  width: 150px !important;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .cart-collaterals .cart_totals {
    width: 100%;
    float: none;
  }
  
  .woocommerce-cart-form__contents .actions {
    display: flex;
    flex-direction: column;
  }
  
  .woocommerce-cart-form__contents .actions .coupon {
    width: 100%;
    margin-bottom: 1rem;
  }
  
  .woocommerce-cart-form__contents .actions button[name="update_cart"] {
    width: 100%;
  }
  
  /* Simplified mobile table view */
  .woocommerce-cart-form__contents td.product-thumbnail {
    display: none;
  }
}
</style>

<?php 
// Output the standard WooCommerce cart
echo do_shortcode('[woocommerce_cart]'); 
?>

<script>
// Small script to make the quantity inputs easier to use
document.addEventListener('DOMContentLoaded', function() {
  // Auto-update cart when quantity changes
  const qtyInputs = document.querySelectorAll('.woocommerce-cart-form .qty');
  let timer;
  
  qtyInputs.forEach(function(input) {
    input.addEventListener('change', function() {
      clearTimeout(timer);
      timer = setTimeout(function() {
        document.querySelector('[name="update_cart"]').click();
      }, 500);
    });
  });
});
</script>