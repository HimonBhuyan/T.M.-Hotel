<?php
$pageTitle = 'Sight Seeing In Madurai | Near-By Attractions | T.M. Hotel';
$pageDesc = 'Discover Sight Seeing in Madurai from T.M. Hotel: Meenakshi Amman Temple (800m), Mariamman Theppakulam (4.7 km), Alagar Kovil (15 km), Thirumalai Nayakar Mahal (1.7 km), Gandhi Museum, and more.';
$activeNav = 'sightseeing';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/terrace-view.jpg" alt="Sight Seeing In Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Sight Seeing</span>
        </nav>
        <span class="eyebrow">Near-By Attractions</span>
        <h1 class="display-title">Sight Seeing In <em>Madurai</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          From Meenakshi Amman Temple just 800m away to hill shrines and royal palaces, navigate Madurai effortlessly from our central address.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">8 Iconic Destinations</span>
            <h2 class="display-title">Explore Around <em>T.M. Hotel</em></h2>
          </div>
          <div class="filter-pills reveal-up" id="sightseeingFilterPills" role="group" aria-label="Filter Madurai attractions">
            <button type="button" class="filter-pill is-active" data-filter="all">All Places (8)</button>
            <button type="button" class="filter-pill" data-filter="temples">Temples</button>
            <button type="button" class="filter-pill" data-filter="heritage">Palaces &amp; Tanks</button>
            <button type="button" class="filter-pill" data-filter="family">Museums &amp; Parks</button>
          </div>
        </div>

        <div class="sightseeing-grid" id="sightseeingGrid"></div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal-up">
          <span class="eyebrow">Interactive Route Map</span>
          <h2 class="display-title">Transit &amp; <em>Landmark</em> Map</h2>
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
                Open Route in Google Maps &rarr;
              </a>
              <a href="contact.php" class="btn btn--outline-light btn--sm">Request Sightseeing Cab</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
