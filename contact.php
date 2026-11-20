<?php
$pageTitle = 'Contact Us | T.M. Hotel, Madurai';
$pageDesc = 'Contact T.M. Hotel Madurai at 50 West Perumal Maistry Street, Madurai - 625001. Call +91 7708681651 / +91 452 2341651 or email reservations@tmhotel.in.';
$activeNav = 'contact';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/hero-hotel.jpg" alt="Contact T.M. Hotel Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Contact Us</span>
        </nav>
        <span class="eyebrow">24/7 Front Desk &amp; Concierge</span>
        <h1 class="display-title">Contact <em>T.M. Hotel</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Reach our Madurai reservation team anytime for room inquiries, railway/airport transfers, group pilgrimage bookings, or directions.
        </p>
      </div>
    </section>

    <section class="section">
      <div class="container contact-grid">
        <div class="reveal-up">
          <span class="eyebrow">Direct Desk Details</span>
          <h2 class="display-title">Plan Your <em>Arrival</em></h2>

          <div class="contact-cards">
            <div class="contact-card">
              <div class="contact-card__icon" aria-hidden="true">📍</div>
              <div>
                <h3>Hotel Address</h3>
                <p>50, West Perumal Maistry Street, Madurai Main, Madurai - 625001, Tamil Nadu</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon" aria-hidden="true">📞</div>
              <div>
                <h3>24-Hour Reservations</h3>
                <p><a href="tel:+917708681651">+91 7708681651</a> &nbsp;/&nbsp; <a href="tel:+914522341651">+91 452 2341651</a></p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon" aria-hidden="true">✉️</div>
              <div>
                <h3>Email Concierge</h3>
                <p><a href="mailto:reservations@tmhotel.in">reservations@tmhotel.in</a><br /><a href="mailto:tmhotelmadurai@gmail.com">tmhotelmadurai@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="form-card reveal-up" data-delay="120">
          <h3 style="font-family: var(--font-display); font-size: 1.9rem; margin-bottom: 0.35rem;">Send a Concierge Inquiry</h3>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">
            Share your travel dates, group size, or sightseeing cab requests and our front desk will reply promptly.
          </p>

          <form id="contactForm" class="form-grid" novalidate>
            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="contactName">Full Name *</label>
                <input type="text" id="contactName" required placeholder="e.g. Sundar Rajan" />
              </div>
              <div class="field-group">
                <label for="contactPhone">Phone / WhatsApp *</label>
                <input type="tel" id="contactPhone" required placeholder="+91 98..." />
              </div>
            </div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="contactEmail">Email Address</label>
                <input type="email" id="contactEmail" placeholder="name@example.com" />
              </div>
              <div class="field-group">
                <label for="contactTopic">Inquiry Topic</label>
                <select id="contactTopic">
                  <option value="Room Reservation">Room Reservation</option>
                  <option value="Group / Family Pilgrimage">Group / Family Pilgrimage</option>
                  <option value="Airport / Railway Transfer">Airport / Railway Transfer</option>
                  <option value="Sightseeing Cab Tour">Sightseeing Cab Tour</option>
                  <option value="Quick Pay / Billing">Quick Pay / Billing</option>
                </select>
              </div>
            </div>

            <div class="field-group">
              <label for="contactMessage">Message *</label>
              <textarea id="contactMessage" rows="4" required placeholder="Share your arrival dates, room preference, or special requests..."></textarea>
            </div>

            <button type="submit" class="btn btn--primary" style="width: 100%;" data-magnetic>
              Send Message to Front Desk
            </button>
            <div class="form-feedback" id="contactFeedback" role="status" aria-live="polite"></div>
          </form>
        </div>
      </div>
    </section>

    <section class="section section--sand" id="location">
      <div class="container">
        <div class="section-head reveal-up">
          <span class="eyebrow">Find Us Easily</span>
          <h2 class="display-title">Interactive <em>Directions</em></h2>
        </div>

        <div class="landmarks-wrap">
          <div class="landmark-buttons reveal-up" id="landmarkButtons"></div>

          <div class="landmark-stage reveal-up" data-delay="120">
            <div class="landmark-map-toolbar">
              <div class="landmark-map-badge"><span aria-hidden="true"></span>Interactive Madurai Map</div>
              <button type="button" class="btn btn--outline-light btn--sm" id="resetHotelPinBtn">Center on T.M. Hotel</button>
            </div>
            <div class="landmark-map-frame">
              <iframe
                id="landmarkMapIframe"
                title="T.M. Hotel Madurai Interactive Map"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://maps.google.com/maps?q=T.M.+Hotel,+50,+West+Perumal+Maistry+Street,+Madurai,+Tamil+Nadu+625001&t=&z=16&ie=UTF8&iwloc=&output=embed"
              ></iframe>
            </div>
            <div id="landmarkDetail"></div>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; padding-top: 0.75rem; border-top: 1px solid var(--border-dark);">
              <a id="landmarkDirectionsLink" href="https://www.google.com/maps/search/?api=1&query=T.M.+Hotel,+50+West+Perumal+Maistry+Street,+Madurai+625001" target="_blank" rel="noopener" class="btn btn--primary btn--sm">
                Open in Google Maps &rarr;
              </a>
              <a href="book-now.php" class="btn btn--outline-light btn--sm">Book Your Stay</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
