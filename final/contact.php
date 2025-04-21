<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="/assets/css/global.css" />


<!-- Mobile Menu Overlay -->
<div class="mobile-overlay"></div>

<!-- Page Header -->
<section class="page-header">
  <div class="container">
    <h1>Kontakt</h1>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section" id="contact">
  <div class="container">
    <div class="contact-container">
      <div class="contact-info">
        <h3>Standort</h3>
        <div class="contact-detail">
          <i>📍</i>
          <div>
            <strong>AlfredoMedia</strong><br />
            Louis Lampe<br />
            Worthgarten 10<br />
            32549 Bad Oeynhausen
          </div>
        </div>
        <div class="contact-detail">
          <i>📞</i>
          <div><strong>Telefon:</strong> 1735611892</div>
        </div>
        <div class="contact-detail">
          <i>✉️</i>
          <div><strong>E-Mail:</strong> louis.lampe@icloud.com</div>
        </div>

        <!-- Google Map - optimized height for mobile -->
        <div class="google-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2466.0462939889!2d8.79957!3d52.20611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ba7a1f8c9e9d7d%3A0x4269a3d62e584af0!2sWorthgarten%2010%2C%2032549%20Bad%20Oeynhausen%2C%20Germany!5e0!3m2!1sen!2sus!4v1691234567890!5m2!1sen!2sus"
            width="100%"
            height="250"
            style="border:0; border-radius: 0.5rem; margin-top: 1.5rem;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

      <div class="contact-form">
        <h3>Kontaktformular</h3>
        <form id="contactForm">
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              placeholder="Vorname"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              placeholder="E-Mail"
              required
            />
          </div>
          <div class="form-group">
            <textarea
              class="form-control"
              placeholder="Deine Nachricht"
              required
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Absenden</button>
        </form>
      </div>
    </div>
  </div>
</section>

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

  // Mobile menu toggle - improved implementation with better performance
  document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector(".mobile-toggle");
    const mobileOverlay = document.querySelector(".mobile-overlay");
    const navList = document.querySelector(".nav-list");

    // Helper function to toggle menu
    function toggleMenu() {
      navList.classList.toggle("active");
      mobileOverlay.classList.toggle("active");

      if (navList.classList.contains("active")) {
        document.body.style.overflow = "hidden"; // Prevent scrolling
      } else {
        document.body.style.overflow = ""; // Re-enable scrolling
      }
    }

    // Toggle menu on button click
    if (mobileToggle) {
      mobileToggle.addEventListener("click", toggleMenu);
    }

    // Close menu when clicking on overlay
    if (mobileOverlay) {
      mobileOverlay.addEventListener("click", toggleMenu);
    }

    // Close menu when clicking nav links
    document.querySelectorAll(".nav-link").forEach(function(link) {
      link.addEventListener("click", function() {
        if (navList.classList.contains("active")) {
          toggleMenu();
        }
      });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function(event) {
      if (navList && navList.classList.contains("active") &&
          !navList.contains(event.target) &&
          event.target !== mobileToggle) {
        toggleMenu();
      }
    });
  });

  // Form submission with improved feedback
  document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Disable submit button to prevent double submissions
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Wird gesendet...";

    // Simulate form submission
    setTimeout(() => {
      alert("Vielen Dank für Ihre Nachricht! Wir werden uns in Kürze bei Ihnen melden.");
      this.reset();
      submitBtn.disabled = false;
      submitBtn.innerHTML = "Absenden";
    }, 800);
  });
</script>