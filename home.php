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
          #EECA5E 60%,
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

      /* Hero */
      .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding: 8rem 0 4rem;
        background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
      }      
      
      .hero::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(
            circle at 70% 30%,
            rgba(10, 35, 66, 0.15),
            transparent 70%
          ),
          radial-gradient(
            circle at 30% 70%,
            rgba(212, 175, 55, 0.1),
            transparent 60%
          );
        z-index: 0;
      }

      .hero-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
      }

      .hero-img {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
      }      
      
      .hero-logo-image {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 15px 35px rgba(10, 35, 66, 0.3),
          0 5px 15px rgba(212, 175, 55, 0.2);
        animation: float 6s ease-in-out infinite;
      }

      @keyframes float {
        0% {
          transform: translateY(0px) rotate(0deg);
        }
        50% {
          transform: translateY(-20px) rotate(2deg);
        }
        100% {
          transform: translateY(0px) rotate(0deg);
        }
      }

      .hero-title {
        margin-bottom: 1.5rem;
        position: relative;
      }

      .hero-title::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 80px;
        height: 4px;
        background: var(--accent);
        border-radius: 2px;
      }

      @media (max-width: 768px) {
        .hero-title::after {
          left:
          50%;
          transform: translateX(-50%);
        }
      }

      .hero-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 0;
      }

      /* Services */
      .services {
        padding: 8rem 0;
        position: relative;
      }      
      
      .services::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(
          circle at 30% 70%,
          rgba(212, 175, 55, 0.15),
          transparent 70%
        );
        z-index: -1;
      }

      .section-title {
        text-align: center;
        margin-bottom: 4rem;
      }

      .section-title span {
        display: block;
        text-transform: uppercase;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--primary);
        letter-spacing: 2px;
        margin-bottom: 0.5rem;
      }

      .section-title h2::after {
        content: "";
        display: block;
        width: 50px;
        height: 3px;
        background: var(--accent);
        margin: 1rem auto 0;
      }

      .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
      }

      .service-card {
        background: rgba(26, 26, 26, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        padding: 2rem;
        transition: all 0.3s ease;
      }

      .service-card:hover {
        transform: translateY(-10px);
        border-color: rgba(0, 153, 255, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      }

      .service-icon {
        width: 4rem;
        height: 4rem;
        background: var(--primary);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
      }

      .service-icon svg {
        width: 2rem;
        height: 2rem;
        fill: none;
        stroke: white;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
      }

      .service-title {
        font-size: 1.25rem;
        margin-bottom: 1rem;
      }

      /* Pricing */
      .pricing {
        padding: 8rem 0;
        position: relative;
      }

      .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
      }

      .pricing-card {
        background: rgba(26, 26, 26, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        padding: 2.5rem 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .pricing-card.featured {
        transform: scale(1.03);
      }

      .pricing-card.featured::before {
        content: "Most Popular";
        position: absolute;
        top: 1rem;
        right: -3rem;
        background: var(--accent);
        color: white;
        padding: 0.25rem 3rem;
        transform: rotate(45deg);
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 1;
      }

      .pricing-card:hover {
        transform: translateY(-10px);
        border-color: rgba(0, 153, 255, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      }

      .pricing-card.featured:hover {
        transform: scale(1.03) translateY(-10px);
      }

      .pricing-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      }

      .pricing-name {
        font-size: 1.25rem;
        margin-bottom: 1rem;
      }

      .pricing-price {
        font-size: 3rem;
        font-weight: 800;
        color: var(--light);
        display: block;
        margin-bottom: 0.5rem;
      }

      .pricing-price sup {
        font-size: 1.5rem;
        font-weight: 600;
        margin-right: 0.25rem;
        vertical-align: super;
      }

      .pricing-vat {
        font-size: 0.875rem;
        color: var(--gray-400);
      }

      .pricing-features {
        margin-bottom: 2rem;
        list-style: none;
      }

      .pricing-feature {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.9375rem;
      }

      .pricing-feature::before {
        content: "✓";
        display: inline-block;
        color: var(--accent);
        margin-right: 0.75rem;
        font-weight: bold;
      }

      /* CTA */
      .cta {
        padding: 6rem 0;
        position: relative;
        overflow: hidden;
      }      
      
      .cta::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          135deg,
          rgba(10, 35, 66, 0.1),
          rgba(212, 175, 55, 0.1)
        );
        z-index: -1;
      }

      .cta-card {
        background: rgba(26, 26, 26, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        padding: 4rem 2rem;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
      }

      /* Buttons */
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
        box-shadow: 0 4px 20px rgba(10, 35, 66, 0.5);
      }

      .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(10, 35, 66, 0.6);
      }

      .btn-accent {
        background: var(--accent);
        color: var(--dark);
        box-shadow: 0 4px 20px rgba(212, 175, 55, 0.5);
      }

      .btn-accent:hover {
        background: var(--accent-dark);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.6);
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

      /* Responsive */
      @media (max-width: 992px) {
        .hero-content {
          grid-template-columns: 1fr;
          text-align: center;
          gap: 3rem;
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

        .service-card,
        .pricing-card {
          text-align: center;
        }

        .pricing-card.featured {
          transform: none;
          order: -1;
        }

        .service-icon {
          margin-left: auto;
          margin-right: auto;
        }

        .pricing-feature {
          justify-content: center;
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

    <!-- Hero Section -->
    <section class="hero">
      <div class="container">
        <div class="hero-content">
          <div class="hero-text">
            <h1 class="hero-title">Ihr Erfolg beginnt mit unserer Website</h1>
            <p class="hero-subtitle">
              Wir sind der einfachste Weg zu mehr Kunden! Wir verstehen, dass
              die Erstellung einer professionellen Website überwältigend sein
              kann. Deshalb sind wir hier, um Ihnen zu helfen. Unser Ziel ist
              es, den Prozess so einfach und verständlich wie möglich zu
              gestalten, damit Sie sich auf das konzentrieren können, was Sie am
              besten können: Ihr Geschäft.
            </p>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-primary"
              >Unsere Dienstleistungen</a
            >
          </div>
          <div class="hero-img">
            <img
              src="https://alfredomedia.nangkil.com/wp-content/uploads/2025/04/new-logo.png"
              alt="Alfredo Media Logo"
              class="hero-logo-image"
            />
          </div>
        </div>
      </div>
      <div class="hero-particles" id="particles-js"></div>
    </section>
    <!-- Digital Future Section -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <span>Unsere Vision</span>
          <h2>Die Zukunft ist Digital Test</h2>
          <p>
            In einer Welt, die sich ständig weiterentwickelt, ist es kein
            Wunder, dass sich die Dinge ändern. Viele Unternehmen bemerken, dass
            das Telefon nicht mehr so oft klingelt wie früher. Der Grund dafür
            ist einfach: Die meisten Menschen suchen heute mit ihrem
            Mobiltelefon im Internet nach Dienstleistern.
          </p>
          <p>
            Wenn Ihr Unternehmen nicht digital sichtbar ist, ist es ganz normal,
            dass die Zahl der Kunden abnimmt. Deshalb sind wir hier.
          </p>
          <p>
            Alfredo Media sorgt dafür, dass Sie den Anschluss nicht verlieren
            und online sichtbar werden. Wir erstellen benutzerfreundliche und
            ansprechende Websites, die Ihr Geschäft ins digitale Zeitalter
            bringen. Mit unserer Hilfe erreichen Sie mehr Kunden und bleiben
            wettbewerbsfähig in einer zunehmend digitalen Welt.
          </p>
          <p>
            Lassen Sie uns gemeinsam sicherstellen, dass Ihr Unternehmen nicht
            nur präsent, sondern auch erfolgreich ist: online und offline.
          </p>
        </div>
        <div class="section-title">
          <span>Unser Angebot</span>
          <h2>Warum wir?</h2>
        </div>
        <div class="services-grid">
          <div class="service-card">
            <div class="service-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 16.5V15.5M12 13.5V8.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                />
              </svg>
            </div>
            <h3 class="service-title">Kundensupport</h3>
            <p>
              Wir bieten exzellenten Kundensupport und stehen Ihnen jederzeit
              zur Verfügung.
            </p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M9.31 17.25L14.69 17.25C15.5 17.25 16.31 16.95 16.93 16.33C18.61 14.65 20.75 11.4 18.75 7.25C18.02 5.84 16.71 4.92 15.19 4.63C13.67 4.34 12.09 4.7 10.83 5.62C9.94 6.31 8.98 6.38 8.03 5.83C7.37 5.44 6.61 5.33 5.87 5.51C5.13 5.69 4.48 6.15 4.06 6.79C2.85 8.65 2.99 13.21 6.09 16.32C6.71 16.95 7.51 17.25 8.31 17.25"
                />
                <path d="M12 17V20" />
              </svg>
            </div>
            <h3 class="service-title">Erschwingliche Preise</h3>
            <p>
              Wir bieten transparente und faire Preisstrukturen, damit auch
              kleine Unternehmen von einer professionellen Online-Präsenz
              profitieren können.
            </p>
          </div>
          <div class="service-card">
            <div class="service-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M8 12H12M16 12H12M12 12V8M12 12V16M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                />
              </svg>
            </div>
            <h3 class="service-title">Einfachheit</h3>
            <p>Wir machen den Prozess einfach und verständlich.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title">
          <span>Transparente Preise</span>
          <h2>Preise</h2>
          <p>Wählen Sie das perfekte Paket für Ihre Geschäftsbedürfnisse.</p>
        </div>
        <div class="pricing-grid">
          <div class="pricing-card">
            <div class="pricing-header">
              <h3 class="pricing-name">BASIC</h3>
              <span class="pricing-price"><sup>€</sup>975</span>
              <span class="pricing-vat">zzgl. 19% MwSt.</span>
            </div>
            <ul class="pricing-features">
              <li class="pricing-feature">Homepage</li>
              <li class="pricing-feature">Design für alle Geräte</li>
              <li class="pricing-feature">
                Kontaktformular und Social Media-Integration
              </li>
              <li class="pricing-feature">Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-outline">JETZT KAUFEN</a>
          </div>
          <div class="pricing-card featured">
            <div class="pricing-header">
              <h3 class="pricing-name">PREMIUM</h3>
              <span class="pricing-price"><sup>€</sup>1975</span>
              <span class="pricing-vat">zzgl. 19% MwSt.</span>
            </div>
            <ul class="pricing-features">
              <li class="pricing-feature">Homepage +4 Seiten</li>
              <li class="pricing-feature">Design für alle Geräte</li>
              <li class="pricing-feature">
                Kontaktformular und Social Media-Integration
              </li>
              <li class="pricing-feature">Terminbuchungssystem</li>
              <li class="pricing-feature">Online Shop</li>
              <li class="pricing-feature">Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-accent">JETZT KAUFEN</a>
          </div>
          <div class="pricing-card">
            <div class="pricing-header">
              <h3 class="pricing-name">STANDARD</h3>
              <span class="pricing-price"><sup>€</sup>1475</span>
              <span class="pricing-vat">zzgl. 19% MwSt.</span>
            </div>
            <ul class="pricing-features">
              <li class="pricing-feature">Homepage +2 Seiten</li>
              <li class="pricing-feature">Design für alle Geräte</li>
              <li class="pricing-feature">
                Kontaktformular und Social Media-Integration
              </li>
              <li class="pricing-feature">Terminbuchungssystem</li>
              <li class="pricing-feature">Kostenlose Anpassungen</li>
            </ul>
            <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-outline">JETZT KAUFEN</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to action -->
    <section class="cta">
      <div class="container">
        <div class="cta-card">
          <h2>Diese Website könnte ihnen gehören</h2>
          <p>
            Lassen Sie uns gemeinsam sicherstellen, dass Ihr Unternehmen nicht
            nur präsent, sondern auch erfolgreich ist: online und offline.
          </p>
          <a href="https://alfredomedia.nangkil.com/contact/" class="btn btn-accent">Jetzt starten</a>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <!-- Add this script before the closing body tag -->
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
    </script>
  </body>
