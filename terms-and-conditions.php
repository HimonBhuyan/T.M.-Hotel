<?php
$pageTitle = 'Terms & Conditions | T.M. Hotel, Madurai';
$pageDesc = 'General Terms and Conditions for staying at T.M. Hotel, Madurai — Tariff GST inclusions, bill settlement modes, and management lien policy.';
$activeNav = 'terms';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/hero-hotel.jpg" alt="T.M. Hotel Madurai Terms and Conditions" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Terms &amp; Conditions</span>
        </nav>
        <span class="eyebrow">Hotel Policies</span>
        <h1 class="display-title">Terms &amp; <em>Conditions</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Tariff inclusions, check-out settlement rules, and general stay terms at T.M. Hotel, Madurai.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container" style="max-width: 900px;">
        <div class="contact-cards" style="margin-top: 0;">
          <article class="contact-card reveal-up">
            <div class="contact-card__icon">1</div>
            <div>
              <h3>Tariff &amp; GST Inclusions</h3>
              <p>Published tariffs are inclusive of GST. Meals, laundry, airport transfers, and other auxiliary services are available and charged separately upon consumption.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="60">
            <div class="contact-card__icon">2</div>
            <div>
              <h3>Bill Settlement</h3>
              <p>All room and incidental bills must be settled in full upon check-out using cash, debit/credit card payments, or approved online digital transfers. Personal cheques are not accepted for online travel agency (OTA) bookings.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="120">
            <div class="contact-card__icon">3</div>
            <div>
              <h3>Check-In &amp; Valid Identity</h3>
              <p>Standard check-in is 12:00 PM (Noon) and check-out is 11:00 AM. Guests must present valid government-issued photo identity and address proof (PAN Card is not accepted as valid ID).</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="180">
            <div class="contact-card__icon">4</div>
            <div>
              <h3>Management Lien</h3>
              <p>In the event of a default in payment of hotel dues, management retains a lien on the guest’s luggage and belongings with the right to detain or sell them to clear outstanding dues.</p>
            </div>
          </article>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 0.85rem; margin-top: 2rem;">
          <a href="cancellation-policy.php" class="btn btn--dark">View Cancellation Policy &rarr;</a>
          <a href="privacy-policy.php" class="btn btn--outline">View Privacy Policy</a>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
