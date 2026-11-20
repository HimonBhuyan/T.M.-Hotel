<?php
$pageTitle = 'Privacy Policy | T.M. Hotel, Madurai';
$pageDesc = 'Privacy Policy of T.M. Hotel Madurai regarding guest data collection, browser cookies, and privacy support via reservations@tmhotel.in.';
$activeNav = 'privacy';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/executive-room.jpg" alt="T.M. Hotel Madurai Privacy Policy" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Privacy Policy</span>
        </nav>
        <span class="eyebrow">Guest Data &amp; Trust</span>
        <h1 class="display-title">Privacy <em>Policy</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          How T.M. Hotel, Madurai handles guest inquiry data, cookies, and privacy requests.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container" style="max-width: 900px;">
        <div class="contact-cards" style="margin-top: 0;">
          <article class="contact-card reveal-up">
            <div class="contact-card__icon">🔒</div>
            <div>
              <h3>Information Collection</h3>
              <p>T.M. Hotel may collect guest contact details through direct reservation inquiries, Quick Pay references, or optional online surveys/feedback to enhance hospitality services and coordinate check-in requests.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="60">
            <div class="contact-card__icon">🍪</div>
            <div>
              <h3>Cookies &amp; Site Personalization</h3>
              <p>This website uses standard browser cookies or local storage solely to personalize user experiences (such as date selections or booking state) and improve site performance; they do not read data from your computer’s hard disk.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="120">
            <div class="contact-card__icon">✉️</div>
            <div>
              <h3>Privacy Queries &amp; Support</h3>
              <p>Any queries regarding guest privacy, booking records, or data deletion requests can be directed to <a href="mailto:reservations@tmhotel.in">reservations@tmhotel.in</a> or by calling <a href="tel:+917708681651">+91 7708681651</a>.</p>
            </div>
          </article>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 0.85rem; margin-top: 2rem;">
          <a href="contact.php" class="btn btn--dark">Contact Front Desk</a>
          <a href="terms-and-conditions.php" class="btn btn--outline">Terms &amp; Conditions</a>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
