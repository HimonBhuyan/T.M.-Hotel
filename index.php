<?php
$pageTitle = 'T.M. Hotel, Madurai | Boutique Heritage Stay Near Meenakshi Temple & Junction';
$pageDesc = 'Welcome to T.M. Hotel Madurai (Est. 1950). Our Motto is to provide a Pleasant Stay and a Homely Care to our Prestigious Customers.';
$activeNav = 'home';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <!-- Hero Section -->
    <section class="hero" aria-label="Welcome to T.M. Hotel Madurai">
      <div class="hero__media">
        <img
          src="assets/images/hero-hotel.jpg"
          alt="Warm golden-hour architectural lobby of T.M. Hotel Madurai"
          class="hero__img"
        />
      </div>
      <div class="hero__scrim" aria-hidden="true"></div>

      <div class="container hero__content">
        <div class="hero__top">
          <div class="hero__badge hero__animate">
            <span class="hero__badge-dot" aria-hidden="true"></span>
            T.M. Group of Companies • Est. 1950
          </div>
          <h1 class="hero__title hero__animate">
            <span class="line">Welcome To T.M. Hotel</span>
            <span class="line"><em>Madurai,</em> Steps from</span>
            <span class="line">the Sacred Temple.</span>
          </h1>
          <p class="hero__subtitle hero__animate">
            “Our Motto is to provide a Pleasant Stay and a Homely Care to our Prestigious Customers.” — 57 air-conditioned Deluxe &amp; Executive rooms, 2 mins from Madurai Railway Junction and 5 mins from Meenakshi Amman Temple.
          </p>

          <div class="price-compare-card hero__animate">
            <span class="price-compare-card__tag">Lowest Direct Price</span>
            <span style="font-size: 0.9rem;">
              Direct Stay From <strong style="color: var(--accent-brass-bright);">₹2,150 / night</strong>
              <span style="text-decoration: line-through; opacity: 0.6; margin-left: 0.4rem;">₹3,500</span>
            </span>
            <a href="book-now.php" style="font-size: 0.78rem; color: var(--accent-brass-bright); text-decoration: underline;">
              Use Code TM1950 (10% Off)
            </a>
          </div>

          <div class="hero__cta-row hero__animate">
            <a href="book-now.php" class="btn btn--primary" data-magnetic>
              Book Now
            </a>
            <a href="rooms.php" class="btn btn--outline-light" data-magnetic>
              Explore Rooms
            </a>
            <a href="quick-pay.php" class="btn btn--outline-light">
              Quick Pay
            </a>
          </div>
        </div>

        <!-- Live Quick-Booking Glass Dock -->
        <form class="booking-dock hero__animate" id="heroBookingDock" aria-label="Quick availability search">
          <div class="dock-field">
            <label for="dockCheckIn">Check-In (12:00 PM)</label>
            <input type="date" id="dockCheckIn" required />
          </div>
          <div class="dock-field">
            <label for="dockCheckOut">Check-Out (11:00 AM)</label>
            <input type="date" id="dockCheckOut" required />
          </div>
          <div class="dock-field">
            <label for="dockRoom">Room Preference</label>
            <select id="dockRoom"></select>
          </div>
          <div class="dock-field">
            <label for="dockGuests">Guests</label>
            <select id="dockGuests">
              <option value="1">1 Guest</option>
              <option value="2" selected>2 Guests</option>
              <option value="3">3 Guests</option>
              <option value="4">4 Guests</option>
            </select>
          </div>
          <button type="submit" class="btn btn--primary" data-magnetic>
            Check Rate &rarr;
          </button>
        </form>

        <a href="#heritage" class="scroll-cue hero__animate" aria-label="Scroll down to explore T.M. Hotel">
          <span class="scroll-cue__mouse" aria-hidden="true">
            <span class="scroll-cue__wheel"></span>
          </span>
          <span class="scroll-cue__text">Scroll Down to Explore</span>
          <span class="scroll-cue__arrow" aria-hidden="true">&darr;</span>
        </a>
      </div>
    </section>

    <!-- Infinite Heritage Marquee Ticker -->
    <div class="marquee-bar" aria-label="Property Highlights">
      <div class="marquee-track">
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>2 Min Walk to Madurai Junction (650m)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>5 Min Walk to Meenakshi Amman Temple (700m)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>57 Air-Conditioned Boutique Rooms</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>Direct Booking Privilege: Promo Code TM1950 (10% Off)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>24-Hour Front Desk, Wi-Fi &amp; Room Service</span>
      </div>
      <div class="marquee-track" aria-hidden="true">
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>2 Min Walk to Madurai Junction (650m)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>5 Min Walk to Meenakshi Amman Temple (700m)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>57 Air-Conditioned Boutique Rooms</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>Direct Booking Privilege: Promo Code TM1950 (10% Off)</span>
        <span class="marquee-item"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="5" /></svg>24-Hour Front Desk, Wi-Fi &amp; Room Service</span>
      </div>
    </div>

    <!-- Heritage & About Section -->
    <section class="section" id="heritage">
      <div class="container heritage-grid">
        <div class="heritage-media reveal-up">
          <div class="image-curtain">
            <img src="assets/images/terrace-view.jpg" alt="Twilight view toward Meenakshi Amman Temple gopuram from T.M. Hotel Madurai" loading="lazy" />
          </div>
          <div class="heritage-floating-card">
            <div class="heritage-floating-card__num">1950</div>
            <div class="heritage-floating-card__text">
              <strong>T.M. Group Legacy</strong><br />
              Seven decades of trusted South Indian hospitality in Madurai Main.
            </div>
          </div>
        </div>

        <div class="reveal-up" data-delay="120">
          <span class="eyebrow">A Division of T.M. Group</span>
          <h2 class="display-title">
            Pleasant Stay &amp; <em>Homely Care</em> Since 1950.
          </h2>
          <p class="lead-copy" style="margin-top: 1.25rem;">
            T.M. Hotel is a division of the T.M. Group of Companies established in 1950 — a boutique hotel featuring well-designed decor for a comfortable stay at a budgeted price.
          </p>
          <p style="color: var(--text-muted); margin-top: 0.9rem;">
            Situated at 50, West Perumal Maistry Street right opposite Madurai Railway Junction (~650m, 2-minute walk) and Central Bus Stand – Periyar (~350m), we are just a 5-minute walk from the historic Madurai Meenakshi Amman Temple (~700m) and 11.9 km from Madurai Airport. Our 57 fully equipped rooms deliver spacious comfort and 24-hour care.
          </p>

          <div class="stats-row">
            <div class="stat-item">
              <div class="stat-item__val" data-count="1950">1950</div>
              <div class="stat-item__label">Group Founded</div>
            </div>
            <div class="stat-item">
              <div class="stat-item__val" data-count="57">57</div>
              <div class="stat-item__label">A/C Rooms</div>
            </div>
            <div class="stat-item">
              <div class="stat-item__val" data-count="2" data-suffix=" min">2 min</div>
              <div class="stat-item__label">To Railway Jn.</div>
            </div>
            <div class="stat-item">
              <div class="stat-item__val" data-count="5" data-suffix=" min">5 min</div>
              <div class="stat-item__label">To Temple</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Rooms & Tariff Showcase -->
    <section class="section section--sand" id="rooms">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">Accommodations</span>
            <h2 class="display-title">Thoughtful <em>Boutique</em> Stays</h2>
            <p class="lead-copy" style="margin-top: 0.65rem;">
              Explore our Deluxe Double A/C and Executive Double A/C rooms, or jump directly to dedicated room pages.
            </p>
          </div>
          <div class="filter-pills reveal-up" id="roomFilterPills" role="group" aria-label="Filter rooms by category">
            <button type="button" class="filter-pill is-active" data-filter="all">All Rooms</button>
            <button type="button" class="filter-pill" data-filter="deluxe">Deluxe A/C</button>
            <button type="button" class="filter-pill" data-filter="executive">Executive A/C</button>
            <button type="button" class="filter-pill" data-filter="terrace">Terrace View</button>
          </div>
        </div>

        <div class="rooms-grid" id="roomsGrid"></div>
      </div>
    </section>

    <!-- Amenities & Guest Services (All 6 Official tmhotel.in Amenities) -->
    <section class="section section--dark" id="amenities">
      <div class="container">
        <div class="section-head reveal-up">
          <span class="eyebrow">Hotel Facilities</span>
          <h2 class="display-title">Amenities &amp; <em>24-Hour</em> Care</h2>
          <p class="lead-copy">
            Thoughtfully equipped across all 57 rooms for a pleasant stay and homely care in the heart of Madurai.
          </p>
        </div>

        <div class="amenities-grid">
          <article class="amenity-card reveal-up" data-delay="0">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <circle cx="12" cy="12" r="9" />
                <path d="M12 7v5l3 2" />
              </svg>
            </div>
            <h3 class="amenity-card__title">24 Hrs Room Service</h3>
            <p class="amenity-card__desc">Round-the-clock room service and 24-hour front desk support for late-night arrivals and early temple darshan departures.</p>
          </article>

          <article class="amenity-card reveal-up" data-delay="70">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M5 12.55a11 11 0 0 1 14.08 0" />
                <path d="M1.42 9a16 16 0 0 1 21.16 0" />
                <path d="M8.53 16.11a6 6 0 0 1 6.95 0" />
                <circle cx="12" cy="20" r="1" />
              </svg>
            </div>
            <h3 class="amenity-card__title">Unlimited WiFi</h3>
            <p class="amenity-card__desc">Complimentary unlimited high-speed wireless internet access across all guest rooms and lobby areas.</p>
          </article>

          <article class="amenity-card reveal-up" data-delay="140">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M6 3h12l2 5-3 2v11H7V10L4 8l2-5z" />
              </svg>
            </div>
            <h3 class="amenity-card__title">Laundry Service</h3>
            <p class="amenity-card__desc">Convenient laundry and dry-cleaning service along with daily housekeeping for short and extended Madurai stays.</p>
          </article>

          <article class="amenity-card reveal-up" data-delay="210">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M3 12h18M3 6h18M3 18h12" />
              </svg>
            </div>
            <h3 class="amenity-card__title">Travel Assistance</h3>
            <p class="amenity-card__desc">Madurai sightseeing tours, car rentals, temple guidance, and Madurai International Airport transfer assistance.</p>
          </article>

          <article class="amenity-card reveal-up" data-delay="280">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="4" width="18" height="14" rx="2" />
                <path d="M8 21h8M12 18v3" />
              </svg>
            </div>
            <h3 class="amenity-card__title">Business Center</h3>
            <p class="amenity-card__desc">Dedicated business center facilities and quiet work-ready spaces for corporate and transit visitors.</p>
          </article>

          <article class="amenity-card reveal-up" data-delay="350">
            <div class="amenity-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M12 5v14M5 12h14" />
                <rect x="3" y="3" width="18" height="18" rx="4" />
              </svg>
            </div>
            <h3 class="amenity-card__title">Doctor On Call</h3>
            <p class="amenity-card__desc">Prompt 24-hour Doctor On Call medical assistance arranged immediately through our front desk for guest peace of mind.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Sight Seeing In Madurai Preview -->
    <section class="section section--sand" id="sightseeing">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">Near-By Attractions</span>
            <h2 class="display-title">Sight Seeing In <em>Madurai</em></h2>
            <p class="lead-copy" style="margin-top: 0.65rem;">
              All 8 iconic Madurai destinations with exact distances from T.M. Hotel and instant Google Maps directions.
            </p>
          </div>
          <div class="filter-pills reveal-up" id="sightseeingFilterPills" role="group" aria-label="Filter Madurai attractions">
            <button type="button" class="filter-pill is-active" data-filter="all">All Places (8)</button>
            <button type="button" class="filter-pill" data-filter="temples">Temples</button>
            <button type="button" class="filter-pill" data-filter="heritage">Palaces &amp; Tanks</button>
            <button type="button" class="filter-pill" data-filter="family">Museums &amp; Parks</button>
          </div>
        </div>

        <div class="sightseeing-grid" id="sightseeingGrid"></div>

        <div style="text-align: center; margin-top: 2.25rem;">
          <a href="near-by-attractions.php" class="btn btn--dark" data-magnetic>
            Open Dedicated Sight Seeing Page &rarr;
          </a>
        </div>
      </div>
    </section>

    <!-- Interactive Madurai Landmark Explorer + Live Google Map -->
    <section class="section" id="location">
      <div class="container">
        <div class="section-head reveal-up">
          <span class="eyebrow">Unmatched Central Address</span>
          <h2 class="display-title">Location &amp; <em>Interactive</em> Map</h2>
          <p class="lead-copy">
            Click any transit point or landmark below to inspect it live on Google Maps from 50 West Perumal Maistry Street.
          </p>
        </div>

        <div class="landmarks-wrap">
          <div class="landmark-buttons reveal-up" id="landmarkButtons"></div>

          <div class="landmark-stage reveal-up" data-delay="120">
            <div class="landmark-map-toolbar">
              <div class="landmark-map-badge">
                <span aria-hidden="true"></span>
                Interactive Madurai Map
              </div>
              <button type="button" class="btn btn--outline-light btn--sm" id="resetHotelPinBtn">
                Center on T.M. Hotel
              </button>
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
              <a
                id="landmarkDirectionsLink"
                href="https://www.google.com/maps/search/?api=1&query=T.M.+Hotel,+50+West+Perumal+Maistry+Street,+Madurai+625001"
                target="_blank"
                rel="noopener"
                class="btn btn--primary btn--sm"
              >
                Open T.M. Hotel in Google Maps &rarr;
              </a>
              <a href="contact.php" class="btn btn--outline-light btn--sm">
                Full Contact &amp; Directions Page
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Interactive Gallery -->
    <section class="section section--sand" id="gallery">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">Visual Tour</span>
            <h2 class="display-title">Inside <em>T.M. Hotel</em></h2>
          </div>
          <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 0.75rem;">
            <div class="filter-pills reveal-up" id="galleryFilterPills" role="group" aria-label="Filter gallery photos">
              <button type="button" class="filter-pill is-active" data-filter="all">All Photos</button>
              <button type="button" class="filter-pill" data-filter="rooms">Rooms</button>
              <button type="button" class="filter-pill" data-filter="views">Terrace &amp; Views</button>
              <button type="button" class="filter-pill" data-filter="architecture">Lobby &amp; Design</button>
            </div>
            <a href="gallery.php" class="btn btn--dark btn--sm">Full Gallery &rarr;</a>
          </div>
        </div>

        <div class="gallery-grid" id="galleryGrid"></div>
      </div>
    </section>

    <!-- Guest Stories & FAQs -->
    <section class="section section--dark">
      <div class="container">
        <div class="section-head reveal-up">
          <span class="eyebrow">Guest Voices</span>
          <h2 class="display-title">Trusted by <em>Pilgrims &amp; Travelers</em></h2>
        </div>

        <div class="testimonials-slider reveal-up" id="testimonialsSlider">
          <div class="testimonials-track" id="testimonialsTrack"></div>
          <div class="slider-controls">
            <div class="slider-dots" id="testimonialDots"></div>
            <div class="slider-arrows">
              <button type="button" class="icon-circle-btn" id="testimonialPrev" aria-label="Previous testimonial">&larr;</button>
              <button type="button" class="icon-circle-btn" id="testimonialNext" aria-label="Next testimonial">&rarr;</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--sand" id="faqs">
      <div class="container">
        <div class="section-head reveal-up" style="text-align: center; align-items: center;">
          <span class="eyebrow">Guest Information</span>
          <h2 class="display-title">Frequently Asked <em>Questions</em></h2>
        </div>
        <div class="faq-list reveal-up" id="faqList"></div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
