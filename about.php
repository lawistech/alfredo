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
    }    /* Mobile Close Button Styling */
    
    
    /* Only show close button on mobile devices */
    @media (max-width: 768px) {
      .custom-close-container {
        display: block;
      }
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

    /* Page Header */
    .page-header {
      padding-top: 8rem;
      text-align: center;
      margin-bottom: 2rem;
    }

    .team-section {
      padding: 4rem 0;
      position: relative;
    }

    .team-section::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(
        circle at 30% 70%,
        rgba(255, 102, 0, 0.15),
        transparent 70%
      );
      z-index: -1;
    }

    .team-intro {
      max-width: 800px;
      margin: 0 auto 3rem;
      text-align: center;
    }

    .team-member {
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 2rem;
      background: rgba(26, 26, 26, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 1rem;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .member-photo {
      width: 100%;
      height: auto;
      border-radius: 0.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .member-info h3 {
      color: var(--primary);
      margin-bottom: 1rem;
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
      .team-member {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .member-photo {
        max-width: 300px;
        margin: 0 auto;
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
      }      .mobile-toggle {
        display: block;
      }

      .nav-list {
        padding-top: 1rem;
      }

      /* Make nav links close the menu when clicked */
      .nav-link {
        display: block;
        width: 100%;
        padding: 0.75rem 0;
        text-align: center;
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

    // Mobile menu toggle
    document
      .querySelector(".mobile-toggle")
      .addEventListener("click", function () {
        document.querySelector(".nav-list").classList.add("active");
        document.querySelector(".mobile-overlay").classList.add("active");
        document.body.style.overflow = "hidden"; // Prevent scrolling when menu is open
      });    // Mobile menu close button
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
    const mobileOverlay = document.querySelector(".mobile-overlay");

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

    // Close mobile menu when clicking outside (keeping for compatibility)
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
</body>

