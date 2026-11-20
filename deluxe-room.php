<?php
$pageTitle = 'Deluxe Room | T.M. Hotel, Madurai';
$pageDesc = 'Book the Deluxe Double A/C Room (204 sq. ft.) at T.M. Hotel Madurai — city views, 32-inch LED TV, complimentary Wi-Fi, 24-hour room service.';
$activeNav = 'deluxe';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/deluxe-room.jpg" alt="Deluxe Double A/C Room at T.M. Hotel Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <a href="rooms.php">Rooms</a> <span>/</span> <span>Deluxe Room</span>
        </nav>
        <span class="eyebrow">Guest Favorite • 204 Sq. Ft.</span>
        <h1 class="display-title">Deluxe Double <em>A/C Room</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          A serene, air-conditioned city-view sanctuary designed for pilgrims, families, and solo travelers seeking clean comfort steps from Madurai Junction.
        </p>
      </div>
    </section>

    <section class="section">
      <div class="container heritage-grid">
        <div class="image-curtain reveal-up">
          <img src="assets/images/deluxe-room.jpg" alt="Deluxe Double A/C Room interior with teakwood headboard and crisp white linens" />
        </div>

        <div class="reveal-up" data-delay="120">
          <span class="eyebrow">Direct Tariff: ₹2,150 / Night + GST</span>
          <h2 class="display-title">Restful Simplicity in <em>Madurai Main</em></h2>
          <p style="color: var(--text-muted); margin-top: 1rem;">
            Thoughtfully arranged across 204 sq. ft., our Deluxe Double A/C Room blends warm wood accents, blackout drapes for undisturbed rest after temple visits or late trains, and dependable modern essentials.
          </p>

          <div class="rate-summary" style="margin-top: 1.5rem;">
            <div class="rate-summary__row"><span>Room Size</span><strong>204 sq. ft.</strong></div>
            <div class="rate-summary__row"><span>Bedding</span><strong>Queen / Double Bed</strong></div>
            <div class="rate-summary__row"><span>Occupancy</span><strong>2 Adults (+1 Child)</strong></div>
            <div class="rate-summary__row"><span>Check-In / Check-Out</span><strong>12:00 PM / 11:00 AM</strong></div>
            <div class="rate-summary__row rate-summary__total"><span>Direct Web Rate (with TM1950)</span><span>₹1,935 + GST</span></div>
          </div>

          <div class="room-card__amenities" style="margin-bottom: 1.5rem;">
            <span class="chip">Individually Controlled A/C</span>
            <span class="chip">32" LED Satellite TV</span>
            <span class="chip">Complimentary Wi-Fi</span>
            <span class="chip">24-Hr Hot &amp; Cold Water</span>
            <span class="chip">Blackout Curtains</span>
            <span class="chip">24-Hr Room Service</span>
          </div>

          <div style="display: flex; flex-wrap: wrap; gap: 0.85rem;">
            <button type="button" class="btn btn--primary" data-open-booking data-room-id="deluxe-double" data-magnetic>
              Book Deluxe Room
            </button>
            <a href="executive-room.php" class="btn btn--outline">
              Compare Executive Room &rarr;
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
