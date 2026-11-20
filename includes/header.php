<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
$pageTitle = $pageTitle ?? 'T.M. Hotel, Madurai | Boutique Heritage Stay Near Meenakshi Temple & Junction';
$pageDesc = $pageDesc ?? 'T.M. Hotel Madurai (Est. 1950, T.M. Group) — 57 air-conditioned Deluxe & Executive rooms at 50 West Perumal Maistry Street, 2 mins from Madurai Railway Junction and 5 mins from Meenakshi Amman Temple.';
$activeNav = $activeNav ?? 'home';
$isHome = ($activeNav === 'home');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc); ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/styles.css?v=8" />
</head>
<body class="<?php echo $isHome ? 'page-home' : 'page-subpage'; ?>">
  <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
  <div class="custom-cursor" id="customCursor" aria-hidden="true"></div>

  <?php if ($isHome): ?>
  <div class="preloader" id="preloader" aria-label="Loading T.M. Hotel Madurai">
    <svg class="preloader__crest" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <rect x="6" y="6" width="68" height="68" rx="16" stroke="#DFB26B" stroke-width="1.5" />
      <path d="M22 54V35C22 25.0589 30.0589 17 40 17C49.9411 17 58 25.0589 58 35V54" stroke="#DFB26B" stroke-width="1.8" />
      <path d="M30 54V38C30 32.4772 34.4772 28 40 28C45.5228 28 50 32.4772 50 38V54" stroke="#C89648" stroke-width="1.5" />
      <path d="M18 54H62" stroke="#DFB26B" stroke-width="1.8" />
      <circle cx="40" cy="22" r="2.5" stroke="#DFB26B" stroke-width="1.5" />
    </svg>
    <div class="preloader__brand">T.M. Hotel</div>
    <div class="preloader__sub">Madurai • Legacy Since 1950</div>
  </div>
  <?php endif; ?>

  <header class="site-header <?php echo $isHome ? '' : 'is-solid'; ?>" id="siteHeader">
    <div class="container header-inner">
      <a href="index.php" class="brand-logo" aria-label="T.M. Hotel Madurai Home">
        <svg class="brand-logo__mark" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <rect x="2" y="2" width="44" height="44" rx="11" stroke="#DFB26B" stroke-width="1.5" />
          <path d="M13 35V22C13 15.9249 17.9249 11 24 11C30.0751 11 35 15.9249 35 22V35" stroke="#DFB26B" stroke-width="1.6" />
          <path d="M19 35V24C19 21.2386 21.2386 19 24 19C26.7614 19 29 21.2386 29 24V35" stroke="#C89648" stroke-width="1.4" />
          <path d="M10 35H38" stroke="#DFB26B" stroke-width="1.5" />
        </svg>
        <div class="brand-logo__text">
          <span class="brand-logo__name">T.M. Hotel</span>
          <span class="brand-logo__tag">Madurai • Est. 1950</span>
        </div>
      </a>

      <nav class="desktop-nav" aria-label="Primary Navigation">
        <a href="index.php" class="desktop-nav__link <?php echo $activeNav === 'home' ? 'is-active' : ''; ?>">Home</a>

        <div class="nav-dropdown" id="roomsDropdown">
          <a
            href="rooms.php"
            class="desktop-nav__link nav-dropdown__trigger <?php echo in_array($activeNav, ['rooms', 'deluxe', 'executive'], true) ? 'is-active' : ''; ?>"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Rooms <span class="nav-caret" aria-hidden="true">&#9662;</span>
          </a>
          <div class="nav-dropdown__menu" role="menu">
            <a href="rooms.php" class="nav-dropdown__item <?php echo $activeNav === 'rooms' ? 'is-active' : ''; ?>" role="menuitem">
              <strong>All Rooms &amp; Tariff</strong>
              <span>Overview of all 57 A/C rooms</span>
            </a>
            <a href="deluxe-room.php" class="nav-dropdown__item <?php echo $activeNav === 'deluxe' ? 'is-active' : ''; ?>" role="menuitem">
              <strong>Deluxe Room</strong>
              <span>204 sq. ft. • City View • From ₹2,150</span>
            </a>
            <a href="executive-room.php" class="nav-dropdown__item <?php echo $activeNav === 'executive' ? 'is-active' : ''; ?>" role="menuitem">
              <strong>Executive Room</strong>
              <span>228 sq. ft. • Terrace Option • From ₹2,650</span>
            </a>
          </div>
        </div>

        <a href="gallery.php" class="desktop-nav__link <?php echo $activeNav === 'gallery' ? 'is-active' : ''; ?>">Gallery</a>
        <a href="near-by-attractions.php" class="desktop-nav__link <?php echo $activeNav === 'sightseeing' ? 'is-active' : ''; ?>">Sight Seeing</a>
        <a href="contact.php" class="desktop-nav__link <?php echo $activeNav === 'contact' ? 'is-active' : ''; ?>">Contact Us</a>
      </nav>

      <div class="header-actions">
        <a href="quick-pay.php" class="btn btn--outline-light btn--sm header-quickpay <?php echo $activeNav === 'quickpay' ? 'is-active-btn' : ''; ?>">
          Quick Pay
        </a>
        <a href="book-now.php" class="btn btn--primary btn--sm header-book-btn" data-magnetic>
          Book Now
        </a>
        <button
          type="button"
          class="hamburger-btn"
          id="hamburgerBtn"
          aria-label="Open menu"
          aria-expanded="false"
          aria-controls="mobileDrawer"
        >
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <div class="mobile-drawer" id="mobileDrawer" aria-hidden="true">
    <nav class="mobile-drawer__links" aria-label="Mobile Navigation">
      <a href="index.php" class="mobile-drawer__link">Home <span>01</span></a>
      <div class="mobile-drawer__group">
        <button type="button" class="mobile-drawer__link mobile-drawer__accordion-btn" id="mobileRoomsToggle" aria-expanded="false">
          Rooms &amp; Tariff <span>&#9662;</span>
        </button>
        <div class="mobile-drawer__sublinks" id="mobileRoomsSub">
          <a href="rooms.php">All Rooms Overview</a>
          <a href="deluxe-room.php">Deluxe Double A/C Room</a>
          <a href="executive-room.php">Executive Double A/C Room</a>
        </div>
      </div>
      <a href="gallery.php" class="mobile-drawer__link">Gallery <span>03</span></a>
      <a href="near-by-attractions.php" class="mobile-drawer__link">Sight Seeing <span>04</span></a>
      <a href="contact.php" class="mobile-drawer__link">Contact Us <span>05</span></a>
      <a href="quick-pay.php" class="mobile-drawer__link">Quick Pay <span>06</span></a>
    </nav>

    <div class="mobile-drawer__footer">
      <a href="book-now.php" class="btn btn--primary">Book Direct (Save 10%: TM1950)</a>
      <a href="quick-pay.php" class="btn btn--outline-light">Quick Pay Settlement</a>
      <p>50, West Perumal Maistry Street, Madurai - 625001<br />Front Desk 24/7: +91 7708681651</p>
    </div>
  </div>
