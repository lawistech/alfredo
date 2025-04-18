
<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="/assets/css/global.css" />

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Unsere Projekte</h1>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="portfolio-section">
    <div class="container">
      <div class="portfolio-intro">
        <p>
          Möchten Sie einen Einblick in unsere Arbeit erhalten? Hier sind
          einige unserer neuesten Projekte:
        </p>
      </div>

      <!-- Projects Section -->
      <section id="projects" class="projects">
        <div class="filter-buttons">
          <div class="filter-btn" data-filter="all">Alle Projekte</div>
          <div class="filter-btn active" data-filter="wordpress">Professionals</div>
          <div class="filter-btn" data-filter="figma">Businesses</div>
        </div>

        <div class="projects-grid">
          <!-- WordPress Projects -->
          <div class="project-card" data-category="wordpress">
            <img
              src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/Group-1171275148-2.png"
              alt="Takiseffect"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://takiseffect.incms.net/" class="project-btn">View Project</a>
            </div>
          </div>

           <div class="project-card" data-category="wordpress">
            <img
              src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/Group-1171275148-3.png"
              alt="ACT"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://criaderonavia.com" class="project-btn">View Project</a>
            </div>
          </div>

           <div class="project-card" data-category="wordpress">
            <img
              src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/painters.png"
              alt="ACT"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://warholworks.nangkil.com/" class="project-btn">View Project</a>
            </div>
          </div>

          <!-- Figma Projects -->
          <div class="project-card" data-category="figma">
            <img
              src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/Group-1171275148-4.png"
              alt="Cannibeast"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://bigbrothermovingllc.com/" class="project-btn">View Project</a>
            </div>
          </div>

          <div class="project-card" data-category="figma">
            <img
              src="https://portfolio.nangkil.com/wp-content/uploads/2025/04/Group-1171275148.png"
              alt="Suptoma"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://serenityshores.nangkil.com/" class="project-btn">View Project</a>
            </div>
          </div>

          <div class="project-card" data-category="figma">
            <img
              src="https://portfolio.nangkil.com/wp-content/uploads/2025/04/Group-1171275148-1.png"
              alt="ROP"
              class="project-image"
            />
            <div class="project-overlay">
              <a href="https://glowbeauty.nangkil.com/" class="project-btn">View Project</a>
            </div>
          </div>

        </div>
      </section>

      <p class="highlight-text">
        Wir sind stolz darauf, unsere Expertise in diesen Projekten unter
        Beweis gestellt zu haben. Lassen Sie sich inspirieren und sehen Sie,
        wie wir auch Ihrem Unternehmen helfen können.
      </p>

      <!-- CTA Section -->
      <div class="cta-section">
        <h2 class="cta-title">Diese Website könnte Ihnen gehören</h2>
        <p>
          Starten Sie noch heute Ihr digitales Erfolgsprojekt mit Alfredo
          Media.
        </p>
        <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-accent">KONTAKT AUFNEHMEN</a>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script>
    // Project filter functionality
    document.addEventListener('DOMContentLoaded', function() {
      // Get all filter buttons and projects
      const filterButtons = document.querySelectorAll('.filter-btn');
      const projectCards = document.querySelectorAll('.project-card');

      // Filter function
      function filterProjects(filter) {
        // Loop through all project cards
        projectCards.forEach(card => {
          // Get the category from the data attribute
          const category = card.getAttribute('data-category');

          // Reset any animations
          card.classList.remove('fade-in');

          // Show or hide based on filter
          if (filter === 'all' || category === filter) {
            // Apply fade-in animation
            setTimeout(() => {
              card.classList.add('fade-in');
            }, 10);
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }

      // Add click event to all filter buttons
      filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
          // Remove active class from all buttons
          filterButtons.forEach(b => b.classList.remove('active'));

          // Add active class to clicked button
          this.classList.add('active');

          // Get filter value and apply filter
          const filter = this.getAttribute('data-filter');
          filterProjects(filter);
        });
      });

      // Apply default filter (wordpress) on page load
      filterProjects('wordpress');
    });

    // Scroll event to change header background
    window.addEventListener("scroll", function() {
      const header = document.getElementById("header");
      if (window.scrollY > 50) {
        header.classList.add("header-scrolled");
      } else {
        header.classList.remove("header-scrolled");
      }
    });

    // Mobile menu toggle
    const mobileToggle = document.querySelector(".mobile-toggle");
    const mobileOverlay = document.querySelector(".mobile-overlay");
    const navList = document.querySelector(".nav-list");

    if (mobileToggle) {
      mobileToggle.addEventListener("click", function() {
        navList.classList.add("active");
        mobileOverlay.classList.add("active");
        document.body.style.overflow = "hidden"; // Prevent scrolling when menu is open
      });
    }

    // Close mobile menu when clicking on overlay
    if (mobileOverlay) {
      mobileOverlay.addEventListener("click", function() {
        closeMenu();
      });
    }

    // Close mobile menu when clicking a nav link
    document.querySelectorAll(".nav-link").forEach(function(link) {
      link.addEventListener("click", function() {
        closeMenu();
      });
    });

    // Close mobile menu when clicking outside
    document.addEventListener("click", function(event) {
      if (navList && navList.classList.contains("active") &&
          !navList.contains(event.target) &&
          event.target !== mobileToggle) {
        closeMenu();
      }
    });

    // Close mobile menu with Escape key
    document.addEventListener("keydown", function(e) {
      if (e.key === "Escape" && navList && navList.classList.contains("active")) {
        closeMenu();
      }
    });

    // Helper function to close the mobile menu
    function closeMenu() {
      if (navList) navList.classList.remove("active");
      if (mobileOverlay) mobileOverlay.classList.remove("active");
      document.body.style.overflow = ""; // Re-enable scrolling

      // Return focus to the menu toggle button for accessibility
      if (mobileToggle) mobileToggle.focus();
    }
  </script>