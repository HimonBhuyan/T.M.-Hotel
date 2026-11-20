<?php
$pageTitle = 'Gallery | T.M. Hotel, Madurai';
$pageDesc = 'View photos of T.M. Hotel Madurai — Deluxe & Executive A/C rooms, lobby entrance, and twilight terrace views of Meenakshi Amman Temple.';
$activeNav = 'gallery';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/terrace-view.jpg" alt="T.M. Hotel Madurai Gallery" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Gallery</span>
        </nav>
        <span class="eyebrow">Visual Tour</span>
        <h1 class="display-title">Inside <em>T.M. Hotel</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Explore our warm lobby hospitality, air-conditioned rooms, and city-view terraces overlooking Madurai. Click any image for fullscreen lightbox view.
        </p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head section-head--split">
          <div class="reveal-up">
            <span class="eyebrow">Curated Photography</span>
            <h2 class="display-title">Spaces &amp; <em>Atmosphere</em></h2>
          </div>
          <div class="filter-pills reveal-up" id="galleryFilterPills" role="group" aria-label="Filter gallery photos">
            <button type="button" class="filter-pill is-active" data-filter="all">All Photos</button>
            <button type="button" class="filter-pill" data-filter="rooms">Rooms</button>
            <button type="button" class="filter-pill" data-filter="views">Terrace &amp; Views</button>
            <button type="button" class="filter-pill" data-filter="architecture">Lobby &amp; Design</button>
          </div>
        </div>

        <div class="gallery-grid" id="galleryGrid"></div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
