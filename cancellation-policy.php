<?php
$pageTitle = 'Cancellation & Reservation Policy | T.M. Hotel, Madurai';
$pageDesc = 'T.M. Hotel Madurai reservation, check-in, ID proof (PAN not accepted), cancellation timelines, refund deduction, and date amendment policies.';
$activeNav = 'cancellation';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/deluxe-room.jpg" alt="T.M. Hotel Madurai Cancellation Policy" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Cancellation Policy</span>
        </nav>
        <span class="eyebrow">Reservation &amp; Refund Rules</span>
        <h1 class="display-title">Cancellation <em>Policy</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Clear timelines for cancellations, refunds, check-in ID verification, and booking amendments.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container" style="max-width: 900px;">
        <div class="contact-cards" style="margin-top: 0;">
          <article class="contact-card reveal-up">
            <div class="contact-card__icon">🕛</div>
            <div>
              <h3>Check-In &amp; Check-Out Times</h3>
              <p>Standard Check-In is <strong>12:00 PM</strong> and Check-Out is <strong>11:00 AM</strong>. Early check-in or late check-out is subject to room availability and may incur additional charges directly at the front desk.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="60">
            <div class="contact-card__icon">🪪</div>
            <div>
              <h3>Mandatory ID &amp; Card Matching</h3>
              <p>Guests must present a valid government-issued photo identity and address proof during check-in (<strong>PAN cards are not accepted</strong> as valid ID). If booked online via credit/debit card, the cardholder must be one of the traveling guests.</p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="120">
            <div class="contact-card__icon">📅</div>
            <div>
              <h3>Standard Cancellation Timelines</h3>
              <p>
                &bull; <strong>15 or more days</strong> before check-in: Free cancellation.<br />
                &bull; <strong>7 to 15 days</strong> in advance: Cancellation charge equivalent to 1 night’s tariff.<br />
                &bull; <strong>0 to 7 days</strong> in advance or No-Show: 100% charge of the booking.
              </p>
            </div>
          </article>

          <article class="contact-card reveal-up" data-delay="180">
            <div class="contact-card__icon">↩️</div>
            <div>
              <h3>Refund Processing &amp; Amendments</h3>
              <p>Full refunds subject to cancellation carry an approximate <strong>5.7% deduction</strong> toward payment gateway processing charges and take at least 15 days to process. Any date or room amendments to an existing booking are treated as cancellations.</p>
            </div>
          </article>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 0.85rem; margin-top: 2rem;">
          <a href="book-now.php" class="btn btn--primary">Proceed to Book Now</a>
          <a href="terms-and-conditions.php" class="btn btn--outline">View Terms &amp; Conditions</a>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
