<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="/assets/css/global.css" />

  <!-- Mobile Menu Overlay -->
  <div class="mobile-overlay"></div>

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Unser Team</h1>
    </div>
  </section>

  <!-- Team Section -->
  <section class="team-section">
    <div class="container">
      <div class="team-intro">
        <p>
          Bei Alfredo Media steht Ihnen ein engagiertes und erfahrenes Team von
          fünf Mitarbeitern zur Seite. Wir übernehmen alles für Sie: von der
          Konzeption bis zur Fertigstellung Ihrer Website. Wir arbeiten eng mit
          Ihnen zusammen, um sicherzustellen, dass Ihre Website genau Ihren
          Bedürfnissen entspricht und Ihre Kunden anspricht.
        </p>
      </div>

      <h2 class="text-center">Unser CEO</h2>

      <div class="team-member">
        <div class="member-image">
          <img
            src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/Photo-23.07.24-21-20-37_94b4e21614308d9c14429531ff9375f6.jpg"
            alt="Louis, CEO von Alfredo Media"
            class="member-photo"
            loading="lazy"
          />
        </div>
        <div class="member-info">
          <h3>Louis</h3>
          <p>
            Mein Name ist Louis und ich bin 19 Jahre alt. Schon früh habe ich
            den Wunsch entwickelt, selbstständig zu sein, jedoch fehlten mir
            anfangs die richtigen Ideen. Meine erste Berührung mit Webdesign
            hatte ich mit 15 Jahren, als ich versuchte, einen Online-Shop für
            meine T-Shirts zu erstellen.
          </p>
          <p>
            Dieses Projekt hat mich schnell überfordert, denn im Internet
            scheint vieles einfacher als es ist. Nach jahrelanger Erfahrung habe
            ich nun meinen eigenen erfolgreichen Online-Shop und biete
            selbstbewusst meine Dienste auch meinen Kunden an.
          </p>
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

    // Mobile menu toggle - improved implementation
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
  </script>
</body>

