<?php
$pageTitle = 'Quick Pay | T.M. Hotel, Madurai';
$pageDesc = 'T.M. Hotel Madurai Quick Pay portal — settle advance room deposits or active hotel bills safely with instant reference confirmation.';
$activeNav = 'quickpay';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/hero-hotel.jpg" alt="T.M. Hotel Quick Pay" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Quick Pay</span>
        </nav>
        <span class="eyebrow">Digital Settlement</span>
        <h1 class="display-title">T.M. Hotel <em>Quick Pay</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Initiate advance reservation settlements or pay an active stay balance cleanly via UPI, Card, or Bank Transfer.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container contact-grid">
        <div class="form-card reveal-up">
          <h2 style="font-family: var(--font-display); font-size: 2rem; margin-bottom: 0.4rem;">Settle Payment</h2>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">
            Enter your booking reference or room number and payment amount in INR.
          </p>

          <form id="quickPayForm" class="form-grid" novalidate>
            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="qpRef">Booking Ref / Room No.</label>
                <input type="text" id="qpRef" placeholder="e.g. TMH-20261120 or Room 204" />
              </div>
              <div class="field-group">
                <label for="qpAmount">Amount (INR) *</label>
                <input type="number" id="qpAmount" min="100" step="50" required placeholder="2500" />
              </div>
            </div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="qpName">Guest Name *</label>
                <input type="text" id="qpName" required placeholder="Full name" />
              </div>
              <div class="field-group">
                <label for="qpPhone">Mobile Number *</label>
                <input type="tel" id="qpPhone" required placeholder="+91 98..." />
              </div>
            </div>

            <div class="field-group">
              <label for="qpMethod">Preferred Digital Mode</label>
              <select id="qpMethod">
                <option value="UPI (GPay / PhonePe / Paytm)">UPI (GPay / PhonePe / Paytm)</option>
                <option value="Credit / Debit Card">Credit / Debit Card</option>
                <option value="NEFT / Bank Transfer">NEFT / Bank Transfer</option>
              </select>
            </div>

            <button type="submit" class="btn btn--primary" style="width: 100%;" data-magnetic>
              Generate Quick Pay Reference
            </button>
            <div class="form-feedback" id="quickPayFeedback" role="status" aria-live="polite"></div>
          </form>
        </div>

        <div class="reveal-up" data-delay="120">
          <span class="eyebrow">Billing &amp; Support</span>
          <h2 class="display-title">Transparent <em>Policies</em></h2>
          <div class="contact-cards">
            <div class="contact-card">
              <div class="contact-card__icon">💳</div>
              <div>
                <h3>Accepted Settlement Modes</h3>
                <p>Bills must be settled upon check-out via cash, debit/credit card, or online transfer (personal cheques not accepted for OTA bookings).</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon">🧾</div>
              <div>
                <h3>Tariffs &amp; Valid ID</h3>
                <p>Tariffs include GST; meals &amp; extra services are billed separately. Cardholder must be one of the travelers for card bookings.</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon">📞</div>
              <div>
                <h3>Modify / Cancel Reservation</h3>
                <p>Call <a href="tel:+917708681651">+91 7708681651</a> or email <a href="mailto:reservations@tmhotel.in">reservations@tmhotel.in</a> with your TMH reference.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
