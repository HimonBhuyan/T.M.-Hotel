  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <a href="index.php" class="brand-logo" style="margin-bottom: 1rem;">
            <svg class="brand-logo__mark" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <rect x="2" y="2" width="44" height="44" rx="11" stroke="#DFB26B" stroke-width="1.5" />
              <path d="M13 35V22C13 15.9249 17.9249 11 24 11C30.0751 11 35 15.9249 35 22V35" stroke="#DFB26B" stroke-width="1.6" />
              <path d="M19 35V24C19 21.2386 21.2386 19 24 19C26.7614 19 29 21.2386 29 24V35" stroke="#C89648" stroke-width="1.4" />
              <path d="M10 35H38" stroke="#DFB26B" stroke-width="1.5" />
            </svg>
            <div class="brand-logo__text">
              <span class="brand-logo__name">T.M. Hotel</span>
              <span class="brand-logo__tag">A Division of T.M. Group (Est. 1950)</span>
            </div>
          </a>
          <p style="font-size: 0.875rem; color: var(--text-light-muted); max-width: 34ch;">
            Our Motto is to provide a Pleasant Stay and a Homely Care to our Prestigious Customers — 57 air-conditioned rooms steps from Madurai Junction &amp; Meenakshi Temple.
          </p>
        </div>

        <div>
          <h4 class="footer-heading">Pages</h4>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="rooms.php">All Rooms &amp; Tariff</a></li>
            <li><a href="deluxe-room.php">Deluxe Room</a></li>
            <li><a href="executive-room.php">Executive Room</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="near-by-attractions.php">Sight Seeing In Madurai</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading">Reservations</h4>
          <ul class="footer-links">
            <li><a href="book-now.php">Book Now (Direct Engine)</a></li>
            <li><a href="quick-pay.php">Quick Pay Portal</a></li>
            <li><a href="contact.php">Contact Us &amp; Map</a></li>
            <li><a href="https://wa.me/917708681651" target="_blank" rel="noopener">WhatsApp Concierge</a></li>
          </ul>
        </div>

        <div>
          <h4 class="footer-heading">Address &amp; Hours</h4>
          <ul class="footer-links">
            <li>50, West Perumal Maistry Street, Madurai - 625001</li>
            <li>Check-In: 12:00 PM &bull; Check-Out: 11:00 AM</li>
            <li><a href="tel:+917708681651">+91 7708681651</a> / <a href="tel:+914522341651">+91 452 2341651</a></li>
            <li><a href="mailto:reservations@tmhotel.in">reservations@tmhotel.in</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <span>&copy; 2026 T.M. Hotel, Madurai (T.M. Group of Companies). All rights reserved.</span>
        <span>Use promo code <strong style="color: var(--accent-brass-bright);">TM1950</strong> for 10% direct-stay savings.</span>
      </div>
    </div>
  </footer>

  <!-- Mobile Sticky Bottom Concierge Bar -->
  <div class="mobile-sticky-bar" aria-label="Quick Mobile Actions">
    <a href="tel:+917708681651" class="mobile-sticky-bar__call">Call Desk</a>
    <a href="https://wa.me/917708681651" target="_blank" rel="noopener" class="mobile-sticky-bar__wa">WhatsApp</a>
    <a href="book-now.php" class="mobile-sticky-bar__book">Book Now</a>
  </div>

  <!-- Floating WhatsApp Concierge (Desktop/Tablet) -->
  <a
    href="https://wa.me/917708681651?text=Hello%20T.M.%20Hotel%20Madurai%2C%20I%20would%20like%20assistance%20with%20a%20stay%20or%20sightseeing%20booking."
    target="_blank"
    rel="noopener"
    class="whatsapp-fab"
    aria-label="Chat on WhatsApp with T.M. Hotel Madurai"
    title="Chat on WhatsApp"
  >
    <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
      <path d="M12.03 2a9.97 9.97 0 0 0-8.46 15.27L2 22l4.86-1.53A9.98 9.98 0 1 0 12.03 2Zm5.82 14.13c-.24.68-1.42 1.3-1.97 1.38-.52.08-1.18.11-1.9-.12-.44-.14-1-.33-1.72-.64-3.03-1.31-5-4.38-5.15-4.58-.15-.2-1.23-1.64-1.23-3.13s.78-2.22 1.06-2.52c.28-.3.6-.38.8-.38h.58c.19 0 .44-.07.69.52.24.6.83 2.04.9 2.19.08.15.13.32.02.52-.1.2-.15.32-.3.5-.15.17-.32.39-.45.52-.15.15-.31.32-.13.62.18.3.79 1.3 1.7 2.11 1.17 1.04 2.15 1.36 2.45 1.51.3.15.48.13.65-.08.18-.2.75-.87.95-1.17.2-.3.4-.25.67-.15.27.1 1.74.82 2.04.97.3.15.5.22.57.35.08.13.08.73-.17 1.41Z" />
    </svg>
  </a>

  <button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">&uarr;</button>

  <?php if (($activeNav ?? '') !== 'book'): ?>
  <!-- Direct Reservation Modal -->
  <div class="modal-backdrop" id="bookingModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="bookingModalTitle">
    <div class="modal-dialog">
      <div class="modal-header">
        <div>
          <span class="eyebrow" style="margin-bottom: 0.25rem;">Best Direct Rate Guaranteed</span>
          <h2 id="bookingModalTitle" style="font-family: var(--font-display); font-size: 2rem;">Reserve Your Stay</h2>
        </div>
        <button type="button" class="modal-close" data-close-modal aria-label="Close booking dialog">&times;</button>
      </div>

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

        <button type="submit" class="btn btn--primary" style="width: 100%; margin-top: 0.25rem;">
          Request Instant Reservation
        </button>
        <div class="form-feedback" id="bookingFeedback" role="status" aria-live="polite"></div>
      </form>
    </div>
  </div>
  <?php endif; ?>

  <?php if (($activeNav ?? '') !== 'quickpay'): ?>
  <!-- Quick Pay Modal -->
  <div class="modal-backdrop" id="quickPayModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="quickPayTitle">
    <div class="modal-dialog">
      <div class="modal-header">
        <div>
          <span class="eyebrow" style="margin-bottom: 0.25rem;">Digital Settlement</span>
          <h2 id="quickPayTitle" style="font-family: var(--font-display); font-size: 2rem;">T.M. Hotel Quick Pay</h2>
        </div>
        <button type="button" class="modal-close" data-close-modal aria-label="Close Quick Pay dialog">&times;</button>
      </div>

      <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 1.15rem;">
        Log an advance reservation payment or settle an active room invoice. Our desk confirms digital receipts immediately.
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

        <button type="submit" class="btn btn--primary" style="width: 100%;">
          Generate Quick Pay Reference
        </button>
        <div class="form-feedback" id="quickPayFeedback" role="status" aria-live="polite"></div>
      </form>
    </div>
  </div>
  <?php endif; ?>

  <!-- Room Detail Modal -->
  <div class="modal-backdrop" id="roomDetailModal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Room Details">
    <div class="modal-dialog">
      <div class="modal-header" style="border-bottom: none; padding-bottom: 0; margin-bottom: 0.5rem;">
        <span></span>
        <button type="button" class="modal-close" data-close-modal aria-label="Close room details">&times;</button>
      </div>
      <div id="roomDetailContent"></div>
    </div>
  </div>

  <!-- Gallery Lightbox Modal -->
  <div class="modal-backdrop" id="lightboxModal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Image Lightbox">
    <div class="modal-dialog lightbox-dialog">
      <div class="modal-header" style="border-bottom-color: var(--border-dark);">
        <div>
          <strong id="lightboxTitle" style="font-family: var(--font-display); font-size: 1.4rem;"></strong>
          <div id="lightboxCount" style="font-size: 0.8rem; color: var(--accent-brass-bright);"></div>
        </div>
        <button type="button" class="modal-close" data-close-modal aria-label="Close lightbox">&times;</button>
      </div>
      <div class="lightbox-stage">
        <img id="lightboxImg" src="assets/images/hero-hotel.jpg" alt="Gallery preview" />
      </div>
      <div class="lightbox-bar">
        <button type="button" class="btn btn--outline-light btn--sm" id="lightboxPrev">&larr; Previous</button>
        <button type="button" class="btn btn--outline-light btn--sm" id="lightboxNext">Next &rarr;</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
  <script src="js/data.js?v=8" defer></script>
  <script src="js/animations.js?v=8" defer></script>
  <script src="js/main.js?v=8" defer></script>
</body>
</html>
