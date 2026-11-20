<?php
$pageTitle = 'Rooms & Tariff | T.M. Hotel, Madurai';
$pageDesc = 'Explore Deluxe Double A/C and Executive Double A/C rooms at T.M. Hotel, Madurai. Compare amenities, sizes, and book directly for the lowest guaranteed rate.';
$activeNav = 'rooms';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/executive-room.jpg" alt="Rooms at T.M. Hotel Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Rooms</span>
        </nav>
        <span class="eyebrow">57 Air-Conditioned Boutique Rooms</span>
        <h1 class="display-title">Rooms &amp; <em>Tariff</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Choose between our restful Deluxe Double A/C rooms and spacious Executive Double A/C rooms (including select Temple-View Terrace rooms).
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">Choose Your Sanctuary</span>
            <h2 class="display-title">Compare <em>Categories</em></h2>
          </div>
          <div class="filter-pills reveal-up" id="roomFilterPills" role="group" aria-label="Filter rooms by category">
            <button type="button" class="filter-pill is-active" data-filter="all">All Rooms</button>
            <button type="button" class="filter-pill" data-filter="deluxe">Deluxe Room</button>
            <button type="button" class="filter-pill" data-filter="executive">Executive Room</button>
            <button type="button" class="filter-pill" data-filter="terrace">Terrace View</button>
          </div>
        </div>

        <div class="rooms-grid" id="roomsGrid"></div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal-up" style="text-align: center; align-items: center;">
          <span class="eyebrow">Standard Inclusions</span>
          <h2 class="display-title">Every Stay <em>Includes</em></h2>
        </div>
        <div class="amenities-grid">
          <div class="contact-card reveal-up">
            <div class="contact-card__icon">❄️</div>
            <div><h3>Climate Comfort</h3><p>Individually controlled A/C &amp; blackout curtains</p></div>
          </div>
          <div class="contact-card reveal-up" data-delay="60">
            <div class="contact-card__icon">📶</div>
            <div><h3>Connectivity</h3><p>Unlimited high-speed Wi-Fi &amp; 32" LED Satellite TV</p></div>
          </div>
          <div class="contact-card reveal-up" data-delay="120">
            <div class="contact-card__icon">🛎️</div>
            <div><h3>24-Hr Care</h3><p>Round-the-clock room service &amp; front desk</p></div>
          </div>
          <div class="contact-card reveal-up" data-delay="180">
            <div class="contact-card__icon">🚿</div>
            <div><h3>Bath &amp; Care</h3><p>24-hour hot &amp; cold water + daily housekeeping</p></div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
