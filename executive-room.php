<?php
$pageTitle = 'Executive Room | T.M. Hotel, Madurai';
$pageDesc = 'Book the Executive Double A/C & Terrace Temple-View Room (228–240 sq. ft.) at T.M. Hotel Madurai — spacious desk, plush king bedding, and temple views.';
$activeNav = 'executive';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/executive-room.jpg" alt="Executive Double A/C Room at T.M. Hotel Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <a href="rooms.php">Rooms</a> <span>/</span> <span>Executive Room</span>
        </nav>
        <span class="eyebrow">Upgraded Space • 228–240 Sq. Ft.</span>
        <h1 class="display-title">Executive Double <em>A/C Room</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Expanded boutique proportions with an executive writing desk, upgraded furnishings, and select top-floor rooms featuring private terraces overlooking Madurai &amp; Meenakshi Temple towers.
        </p>
      </div>
    </section>

    <section class="section">
      <div class="container heritage-grid">
        <div class="image-curtain reveal-up">
          <img src="assets/images/executive-room.jpg" alt="Executive Double A/C Room opening toward Madurai twilight terrace" />
        </div>

        <div class="reveal-up" data-delay="120">
          <span class="eyebrow">Direct Tariff: From ₹2,650 / Night + GST</span>
          <h2 class="display-title">Elevated Comfort &amp; <em>Temple Horizon</em></h2>
          <p style="color: var(--text-muted); margin-top: 1rem;">
            Ideal for business travelers and extended family stays in Madurai, our Executive tier provides extra floor space, dedicated laptop workspace, and optional private terrace seating.
          </p>

          <div class="rate-summary" style="margin-top: 1.5rem;">
            <div class="rate-summary__row"><span>Executive Double A/C</span><strong>228 sq. ft. • ₹2,650 / night</strong></div>
            <div class="rate-summary__row"><span>Executive Terrace Temple-View</span><strong>240 sq. ft. + Terrace • ₹3,100 / night</strong></div>
            <div class="rate-summary__row"><span>Bedding</span><strong>King / Twin Plush Bedding</strong></div>
            <div class="rate-summary__row"><span>Check-In / Check-Out</span><strong>12:00 PM / 11:00 AM</strong></div>
            <div class="rate-summary__row rate-summary__total"><span>Direct Web Rate (with TM1950)</span><span>From ₹2,385 + GST</span></div>
          </div>

          <div class="room-card__amenities" style="margin-bottom: 1.5rem;">
            <span class="chip">Executive Work Desk</span>
            <span class="chip">Optional Private Terrace</span>
            <span class="chip">High-Speed Wi-Fi</span>
            <span class="chip">32" LED Satellite TV</span>
            <span class="chip">24-Hr Room Service</span>
            <span class="chip">Priority Travel Desk</span>
          </div>

          <div style="display: flex; flex-wrap: wrap; gap: 0.85rem;">
            <button type="button" class="btn btn--primary" data-open-booking data-room-id="executive-double" data-magnetic>
              Book Executive Double
            </button>
            <button type="button" class="btn btn--dark" data-open-booking data-room-id="executive-terrace">
              Book Terrace Temple-View
            </button>
            <a href="deluxe-room.php" class="btn btn--outline">
              View Deluxe Room
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
