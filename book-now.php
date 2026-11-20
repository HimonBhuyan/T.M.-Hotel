<?php
$pageTitle = 'Book Now | Direct Reservation Engine | T.M. Hotel, Madurai';
$pageDesc = 'Book directly with T.M. Hotel Madurai for the lowest guaranteed room tariff. Instant GST calculation, promo code TM1950 (10% off), and WhatsApp desk confirmation.';
$activeNav = 'book';
include __DIR__ . '/includes/header.php';
?>

  <main id="top">
    <section class="page-banner">
      <img src="assets/images/deluxe-room.jpg" alt="Book Direct at T.M. Hotel Madurai" class="page-banner__bg" />
      <div class="page-banner__scrim" aria-hidden="true"></div>
      <div class="container page-banner__inner">
        <nav class="breadcrumb" aria-label="Breadcrumb">
          <a href="index.php">Home</a> <span>/</span> <span>Book Now</span>
        </nav>
        <span class="eyebrow">Best Direct Rate Guaranteed</span>
        <h1 class="display-title">Reserve Your <em>Stay</em></h1>
        <p class="lead-copy" style="margin-top: 0.75rem;">
          Enjoy 10% direct-stay privilege with code <strong>TM1950</strong>, flexible early arrival notes, and instant WhatsApp front-desk confirmation.
        </p>
      </div>
    </section>

    <section class="section section--sand">
      <div class="container contact-grid">
        <div class="form-card reveal-up">
          <h2 style="font-family: var(--font-display); font-size: 2rem; margin-bottom: 0.35rem;">Direct Booking Engine</h2>
          <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem;">
            Check-In: 12:00 PM &bull; Check-Out: 11:00 AM
          </p>

          <form id="bookingForm" class="form-grid" novalidate>
            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="bookingCheckIn">Check-In Date *</label>
                <input type="date" id="bookingCheckIn" required />
              </div>
              <div class="field-group">
                <label for="bookingCheckOut">Check-Out Date *</label>
                <input type="date" id="bookingCheckOut" required />
              </div>
            </div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="bookingRoom">Room Category *</label>
                <select id="bookingRoom"></select>
              </div>
              <div class="field-group">
                <label for="bookingGuests">Guests</label>
                <select id="bookingGuests">
                  <option value="1">1 Guest</option>
                  <option value="2" selected>2 Guests</option>
                  <option value="3">3 Guests</option>
                  <option value="4">4 Guests</option>
                </select>
              </div>
            </div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="bookingPromo">Promo Code (Try TM1950)</label>
                <input type="text" id="bookingPromo" placeholder="TM1950 for 10% off" value="TM1950" />
              </div>
              <div class="field-group" style="justify-content: flex-end;">
                <label style="display: flex; align-items: center; gap: 0.55rem; min-height: 44px; cursor: pointer;">
                  <input type="checkbox" id="bookingBreakfast" style="width: 18px; height: 18px; min-height: 18px;" />
                  Add South Indian Veg Breakfast (+₹200/guest/night)
                </label>
              </div>
            </div>

            <div class="rate-summary" id="bookingRateSummary"></div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="bookingName">Guest Full Name *</label>
                <input type="text" id="bookingName" required placeholder="Full name as on ID" />
              </div>
              <div class="field-group">
                <label for="bookingPhone">Mobile / WhatsApp *</label>
                <input type="tel" id="bookingPhone" required placeholder="+91 98..." />
              </div>
            </div>

            <div class="form-grid form-grid--2">
              <div class="field-group">
                <label for="bookingEmail">Email (Optional)</label>
                <input type="email" id="bookingEmail" placeholder="name@example.com" />
              </div>
              <div class="field-group">
                <label for="bookingNotes">Arrival Time / Special Request</label>
                <input type="text" id="bookingNotes" placeholder="e.g. Early morning train arrival" />
              </div>
            </div>

            <button type="submit" class="btn btn--primary" style="width: 100%; margin-top: 0.25rem;" data-magnetic>
              Request Instant Reservation
            </button>
            <div class="form-feedback" id="bookingFeedback" role="status" aria-live="polite"></div>
          </form>
        </div>

        <div class="reveal-up" data-delay="120">
          <span class="eyebrow">Reservation Terms &amp; Policies</span>
          <h2 class="display-title">Guest <em>Guidelines</em></h2>
          <div class="contact-cards">
            <div class="contact-card">
              <div class="contact-card__icon">🕛</div>
              <div>
                <h3>Check-In &amp; Check-Out</h3>
                <p>Check-in: 12:00 PM (Noon) &bull; Check-out: 11:00 AM. Valid govt. photo ID &amp; address proof mandatory (PAN Card not accepted).</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon">🔄</div>
              <div>
                <h3>Cancellation &amp; Amendments</h3>
                <p>15+ days prior: Free (approx. 5.7% gateway deduction on refunds). 7–15 days: 1-night charge. 0–7 days / No-Show: 100% charge.</p>
              </div>
            </div>
            <div class="contact-card">
              <div class="contact-card__icon">🏷️</div>
              <div>
                <h3>Direct Guest Support</h3>
                <p>Save 10% with code <strong>TM1950</strong>. For modifications, call <a href="tel:+917708681651">+91 7708681651</a> or <a href="tel:+914522341651">+91 452 2341651</a>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/includes/footer.php'; ?>
