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
      display: block;
      width: 100%;
      padding: 0.75rem 0;
      text-align: center;
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

    /* Page Header */
    .page-header {
      padding-top: 8rem;
      text-align: center;
      margin-bottom: 2rem;
    }

    /* Plan Section Styles */
    .plan-section {
      padding: 4rem 0;
      position: relative;
    }

    .plan-section::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(
        circle at 70% 30%,
        rgba(0, 153, 255, 0.15),
        transparent 70%
      );
      z-index: -1;
    }

    .plan-intro {
      max-width: 800px;
      margin: 0 auto 3rem;
      text-align: center;
    }

    .service-section {
      margin-bottom: 5rem;
    }

    .service-header {
      margin-bottom: 2rem;
      text-align: center;
    }

    .service-header h2 {
      display: inline-block;
      background: linear-gradient(45deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .pricing-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 3rem;
    }

    .pricing-card {
      background: rgba(26, 26, 26, 0.6);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 1rem;
      padding: 2rem;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .pricing-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(to right, var(--primary), var(--accent));
    }

    .card-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--light);
    }

    .card-price {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--accent);
      margin-bottom: 0.5rem;
    }

    .price-note {
      color: var(--gray-400);
      font-size: 0.875rem;
      margin-bottom: 2rem;
    }

    .feature-list {
      list-style: none;
      margin-bottom: 2rem;
      text-align: left;
    }

    .feature-list li {
      margin-bottom: 0.75rem;
      padding-left: 1.5rem;
      position: relative;
      color: var(--gray-300);
    }

    .feature-list li::before {
      content: "✓";
      position: absolute;
      left: 0;
      color: var(--primary);
      font-weight: bold;
    }

    .btn {
      display: inline-block;
      padding: 0.875rem 2rem;
      background: var(--primary);
      color: white;
      font-weight: 600;
      text-decoration: none;
      border-radius: 0.5rem;
      transition: all 0.3s ease;
      text-align: center;
      cursor: pointer;
      border: none;
      font-size: 1rem;
      box-shadow: 0 4px 20px rgba(0, 153, 255, 0.5);
    }

    .btn:hover {
      background: var(--primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 153, 255, 0.6);
    }

    .service-image {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      margin: 2rem auto;
      display: block;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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
      .pricing-cards {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }

      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 768px) {
      .mobile-toggle {
        display: block;
      }
      
      .nav-list {
        position: fixed;
        top: 0;
        right: -300px;
        width: 280px;
        height: 100vh;
        background: var(--darker);
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        gap: 0.5rem;
        transition: all 0.3s ease;
        z-index: 1001;
        padding: 2rem 0;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.3);
        overflow-y: auto;
      }

      .nav-list li {
        width: 100%;
        padding: 0 1.5rem;
      }

      .nav-link {
        padding: 1rem 0;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .nav-link::after {
        display: none;
      }

      .nav-list.active {
        right: 0;
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
</head>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-overlay"></div>

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Der 3-Finger-Plan</h1>
    </div>
  </section>

  <!-- Plan Section -->
  <section class="plan-section">
    <div class="container">
      <div class="plan-intro">
        <p>Ihr umfassendes Paket für digitalen Erfolg</p>
        <p>
          Im heutigen digitalen Zeitalter ist es unerlässlich, dass Ihr
          Unternehmen online sichtbar und leicht zu finden ist. Bei Alfredo
          Media bieten wir Ihnen den 3-Finger-Plan – eine umfassende Lösung, die
          sicherstellt, dass Ihr Unternehmen in der digitalen Welt erfolgreich
          ist. Unser Plan umfasst drei wesentliche Komponenten:
          Website-Erstellung, SEO und Social Media Werbung.
        </p>
      </div>

      <!-- Website-Erstellung Section -->
      <div class="service-section">
        <div class="service-header">
          <h2>Website-Erstellung</h2>
          <p>
            Eine professionelle und ansprechende Website ist das Fundament Ihres
            Online-Auftritts. Unser erfahrenes Team erstellt maßgeschneiderte
            Websites, die perfekt auf Ihre Bedürfnisse abgestimmt sind. Wir
            kümmern uns um alles – von der Konzeption bis zur Fertigstellung.
            Unsere Websites sind nicht nur optisch ansprechend, sondern auch
            benutzerfreundlich und für alle Geräte optimiert.
          </p>
        </div>

        <div class="pricing-cards">
          <!-- Basic Package -->
          <div class="pricing-card">
            <h3 class="card-title">BASIC</h3>
            <div class="card-price">975€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Homepage</li>
              <li>Design für alle Geräte</li>
              <li>Kontaktformular und Social Media-Integration</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Standard Package -->
          <div class="pricing-card">
            <h3 class="card-title">STANDARD</h3>
            <div class="card-price">1475€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Homepage +2 Seiten</li>
              <li>Design für alle Geräte</li>
              <li>Kontaktformular und Social Media-Integration</li>
              <li>Terminbuchungssystem</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Premium Package -->
          <div class="pricing-card">
            <h3 class="card-title">PREMIUM</h3>
            <div class="card-price">1975€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Homepage +4 Seiten</li>
              <li>Design für alle Geräte</li>
              <li>Kontaktformular und Social Media-Integration</li>
              <li>Terminbuchungssystem</li>
              <li>Online Shop</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>
        </div>
      </div>

      <!-- SEO Section -->
      <div class="service-section">
        <div class="service-header">
          <h2>SEO (Suchmaschinenoptimierung)</h2>
          <p>
            Eine schöne Website allein reicht nicht aus, wenn sie von Ihren
            potenziellen Kunden nicht gefunden wird. Hier kommt unsere
            SEO-Expertise ins Spiel. Wir optimieren Ihre Website, damit sie in
            den Suchmaschinen besser gefunden wird und Sie mehr organischen
            Traffic erhalten.
          </p>
        </div>

        <div class="pricing-cards">
          <!-- Basic Package -->
          <div class="pricing-card">
            <h3 class="card-title">BASIC</h3>
            <div class="card-price">80€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Erstellung eines prägnanten SEO-Textes mit 500 Wörtern</li>
              <li>Optimierung für Suchmaschinen</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Standard Package -->
          <div class="pricing-card">
            <h3 class="card-title">STANDARD</h3>
            <div class="card-price">120€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>
                Erstellung eines detaillierten SEO-Textes mit 1000 Wörtern
              </li>
              <li>Optimierung für Suchmaschinen</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Premium Package -->
          <div class="pricing-card">
            <h3 class="card-title">PREMIUM</h3>
            <div class="card-price">160€</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>
                Erstellung eines ausführlichen SEO-Textes mit 1500 Wörtern
              </li>
              <li>Optimierung für Suchmaschinen</li>
              <li>Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>
        </div>
      </div>

      <!-- Social Media Werbung Section -->
      <div class="service-section">
        <div class="service-header">
          <h2>Social Media Werbung</h2>
          <p>
            Neben einer gut gestalteten und optimierten Website ist es wichtig,
            Ihre Zielgruppe dort zu erreichen, wo sie ihre Zeit verbringt – auf
            den sozialen Medien. Unsere Experten entwickeln maßgeschneiderte
            Social Media Werbekampagnen, die Ihre Marke ins Rampenlicht rücken
            und mehr Kunden zu Ihnen führen.
          </p>
        </div>

        <div class="pricing-cards">
          <!-- Basic Package -->
          <div class="pricing-card">
            <h3 class="card-title">BASIC</h3>
            <div class="card-price">30€ mtl.</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Erstellung von 1 Social Media Beitrag mtl.</li>
              <li>Werbebudget: 15€</li>
              <li>Zielgruppen-Targeting</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Standard Package -->
          <div class="pricing-card">
            <h3 class="card-title">STANDARD</h3>
            <div class="card-price">50€ mtl.</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Erstellung von 3 Social Media Beiträgen mtl.</li>
              <li>Werbebudget: 20€</li>
              <li>Zielgruppen-Targeting</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>

          <!-- Premium Package -->
          <div class="pricing-card">
            <h3 class="card-title">PREMIUM</h3>
            <div class="card-price">70€ mtl.</div>
            <div class="price-note">zzgl. 19% MwSt.</div>
            <ul class="feature-list">
              <li>Erstellung von 6 Social Media Beiträgen mtl.</li>
              <li>Werbebudget: 25€</li>
              <li>Zielgruppen-Targeting</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn">JETZT KAUFEN</a>
          </div>
        </div>
      </div>

      <!-- Plan Image -->
<!--       <div class="text-center">
        <img
          src="img/Photo-01.08.24-17-16-12.png"
          alt="3-Finger-Plan Übersicht"
          class="service-image"
        />
      </div> -->
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
        document.querySelector(".nav-list").classList.toggle("active");
        document.querySelector(".mobile-overlay").classList.toggle("active");
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
      
    // Close mobile menu when clicking on a navigation link
    document.querySelectorAll(".nav-link").forEach(function(link) {
      link.addEventListener("click", function() {
        if (window.innerWidth <= 768) { // Only on mobile
          document.querySelector(".nav-list").classList.remove("active");
          document.querySelector(".mobile-overlay").classList.remove("active");
          document.body.style.overflow = ""; // Re-enable scrolling
        }
      });
    });

  </script>
</body>
