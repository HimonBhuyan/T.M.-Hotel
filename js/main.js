/**
 * T.M. Hotel, Madurai — Interactive Functionalities & Concierge Logic
 */

(function () {
  'use strict';

  const DATA = window.TM_HOTEL_DATA;
  if (!DATA) return;

  const state = {
    activeRoomFilter: 'all',
    activeGalleryFilter: 'all',
    activeLandmarkId: DATA.landmarks[0].id, // Default pin: T.M. Hotel Madurai
    testimonialIndex: 0,
    lightboxIndex: 0,
    filteredGallery: [...DATA.gallery]
  };

  /* ------------------------------------------------------------------------
     Utility Helpers
  ------------------------------------------------------------------------ */
  function formatINR(amount) {
    return '₹' + Math.round(amount).toLocaleString('en-IN');
  }

  function getTodayISO(offsetDays = 0) {
    const d = new Date();
    d.setDate(d.getDate() + offsetDays);
    return d.toISOString().split('T')[0];
  }

  function calculateNights(checkIn, checkOut) {
    if (!checkIn || !checkOut) return 1;
    const d1 = new Date(checkIn);
    const d2 = new Date(checkOut);
    const diff = Math.round((d2 - d1) / (1000 * 60 * 60 * 24));
    return diff > 0 ? diff : 0;
  }

  async function submitToBackend(payload) {
    try {
      const res = await fetch('backend/booking.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      const json = await res.json();
      if (!res.ok || !json.ok) {
        throw new Error(json.error || 'Submission failed');
      }
      return { source: 'php', reference: json.reference, record: json.record };
    } catch (err) {
      // Graceful local fallback when previewed purely statically without PHP
      if (err && err.message && err.message.includes('Please')) {
        throw err;
      }
      const fallbackRef =
        'TMH-' +
        getTodayISO().replace(/-/g, '') +
        '-' +
        Math.random().toString(36).substring(2, 7).toUpperCase();
      try {
        const key = 'tm_hotel_submissions';
        const existing = JSON.parse(localStorage.getItem(key) || '[]');
        existing.push({ ...payload, reference: fallbackRef, createdAt: new Date().toISOString() });
        localStorage.setItem(key, JSON.stringify(existing));
      } catch (_) {
        // Ignore storage quota issues
      }
      return { source: 'local', reference: fallbackRef };
    }
  }

  /* ------------------------------------------------------------------------
     Mobile Navigation Drawer
  ------------------------------------------------------------------------ */
  function initNavigation() {
    const toggleBtn = document.getElementById('hamburgerBtn');
    const drawer = document.getElementById('mobileDrawer');
    if (!toggleBtn || !drawer) return;

    const setOpen = (open) => {
      toggleBtn.setAttribute('aria-expanded', String(open));
      drawer.classList.toggle('is-open', open);
      drawer.setAttribute('aria-hidden', String(!open));
      document.body.classList.toggle('no-scroll', open);
    };

    toggleBtn.addEventListener('click', () => {
      const isOpen = toggleBtn.getAttribute('aria-expanded') === 'true';
      setOpen(!isOpen);
    });

    drawer.querySelectorAll('a').forEach((el) => {
      el.addEventListener('click', () => setOpen(false));
    });

    const mobileRoomsToggle = document.getElementById('mobileRoomsToggle');
    const mobileRoomsSub = document.getElementById('mobileRoomsSub');
    mobileRoomsToggle?.addEventListener('click', () => {
      const expanded = mobileRoomsToggle.getAttribute('aria-expanded') === 'true';
      mobileRoomsToggle.setAttribute('aria-expanded', String(!expanded));
      mobileRoomsSub?.classList.toggle('is-open', !expanded);
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        setOpen(false);
      }
    });
  }

  /* ------------------------------------------------------------------------
     Modal Manager
  ------------------------------------------------------------------------ */
  function openModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('no-scroll');
  }

  function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    if (!document.querySelector('.modal-backdrop.is-open')) {
      document.body.classList.remove('no-scroll');
    }
  }

  function initModals() {
    document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
      backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) closeModal(backdrop);
      });
    });

    document.querySelectorAll('[data-close-modal]').forEach((btn) => {
      btn.addEventListener('click', () => {
        closeModal(btn.closest('.modal-backdrop'));
      });
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.querySelectorAll('.modal-backdrop.is-open').forEach(closeModal);
      }
    });

    document.querySelectorAll('[data-open-booking]').forEach((btn) => {
      btn.addEventListener('click', () => {
        const roomId = btn.getAttribute('data-room-id');
        const modal = document.getElementById('bookingModal');
        if (roomId) {
          const select = document.getElementById('bookingRoom');
          if (select) select.value = roomId;
        }
        if (modal) {
          updateBookingSummary();
          openModal('bookingModal');
        } else {
          const qs = roomId ? `?room=${encodeURIComponent(roomId)}` : '';
          window.location.href = `book-now.php${qs}`;
        }
      });
    });

    document.querySelectorAll('[data-open-quickpay]').forEach((btn) => {
      btn.addEventListener('click', () => {
        if (document.getElementById('quickPayModal')) openModal('quickPayModal');
        else window.location.href = 'quick-pay.php';
      });
    });
  }

  /* ------------------------------------------------------------------------
     Rooms Catalog, Filter & Detail Modal
  ------------------------------------------------------------------------ */
  function renderRooms() {
    const grid = document.getElementById('roomsGrid');
    if (!grid) return;

    grid.innerHTML = DATA.rooms
      .map(
        (room, idx) => `
      <article class="room-card reveal-up" data-category="${room.category}" data-delay="${idx * 90}" data-cursor="Explore">
        <div class="room-card__media">
          <img src="${room.image}" alt="${room.name} at T.M. Hotel Madurai" loading="lazy" />
          <span class="room-card__badge">${room.badge}</span>
          <div class="room-card__price-tag">${formatINR(room.rate)} <span>/ night</span></div>
        </div>
        <div class="room-card__body">
          <div class="room-card__meta">
            <span>${room.size}</span>
            <span>•</span>
            <span>${room.occupancy}</span>
          </div>
          <h3 class="room-card__title">${room.name}</h3>
          <p class="room-card__desc">${room.shortDesc}</p>
          <div class="room-card__amenities">
            ${room.amenities.slice(0, 4).map((a) => `<span class="chip">${a}</span>`).join('')}
          </div>
          <div class="room-card__actions">
            <a href="${room.pageUrl || 'rooms.php'}" class="btn btn--outline btn--sm">View Room Page</a>
            <button type="button" class="btn btn--dark btn--sm js-room-book" data-room-id="${room.id}">Reserve Now</button>
          </div>
        </div>
      </article>`
      )
      .join('');

    grid.querySelectorAll('.js-room-detail').forEach((btn) => {
      btn.addEventListener('click', () => showRoomDetail(btn.getAttribute('data-room-id')));
    });

    grid.querySelectorAll('.js-room-book').forEach((btn) => {
      btn.addEventListener('click', () => {
        const roomId = btn.getAttribute('data-room-id');
        const modal = document.getElementById('bookingModal');
        const roomSelect = document.getElementById('bookingRoom');
        if (roomSelect) roomSelect.value = roomId;
        if (modal) {
          updateBookingSummary();
          openModal('bookingModal');
        } else {
          window.location.href = `book-now.php?room=${encodeURIComponent(roomId)}`;
        }
      });
    });

    if (window.TMAnimations) window.TMAnimations.refreshReveals();
  }

  function initRoomFilters() {
    const pills = document.querySelectorAll('#roomFilterPills .filter-pill');
    pills.forEach((pill) => {
      pill.addEventListener('click', () => {
        pills.forEach((p) => p.classList.remove('is-active'));
        pill.classList.add('is-active');
        const filter = pill.getAttribute('data-filter');
        state.activeRoomFilter = filter;

        document.querySelectorAll('#roomsGrid .room-card').forEach((card) => {
          const match = filter === 'all' || card.getAttribute('data-category') === filter;
          card.classList.toggle('is-hidden', !match);
          if (match) card.classList.add('is-revealed');
        });
      });
    });
  }

  function showRoomDetail(roomId) {
    const room = DATA.rooms.find((r) => r.id === roomId);
    const body = document.getElementById('roomDetailContent');
    if (!room || !body) return;

    body.innerHTML = `
      <div class="image-curtain" style="margin-bottom: 1.25rem;">
        <img src="${room.image}" alt="${room.name}" style="aspect-ratio: 16/9;" />
      </div>
      <div class="room-card__meta" style="margin-bottom: 0.4rem;">
        <span>${room.badge}</span>
        <span>•</span>
        <span>${room.size}</span>
        <span>•</span>
        <span>${room.bed}</span>
      </div>
      <h3 class="display-title" style="font-size: 2rem; margin-bottom: 0.6rem;">${room.name}</h3>
      <p style="color: var(--text-muted); margin-bottom: 1rem;">${room.fullDesc}</p>
      <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.14em; margin-bottom: 0.6rem;">Included Amenities</h4>
      <div class="room-card__amenities" style="margin-bottom: 1.25rem;">
        ${room.amenities.map((a) => `<span class="chip">${a}</span>`).join('')}
      </div>
      <div class="rate-summary" style="margin-bottom: 1.25rem;">
        <div class="rate-summary__row">
          <span>Indicative Nightly Tariff</span>
          <strong>${formatINR(room.rate)} + GST</strong>
        </div>
        <div class="rate-summary__row">
          <span>Check-in / Check-out</span>
          <span>${DATA.property.checkIn} / ${DATA.property.checkOut}</span>
        </div>
      </div>
      <button type="button" class="btn btn--primary" style="width: 100%;" id="detailReserveBtn">
        Book ${room.name} Now
      </button>
    `;

    document.getElementById('detailReserveBtn').addEventListener('click', () => {
      closeModal(document.getElementById('roomDetailModal'));
      const roomSelect = document.getElementById('bookingRoom');
      if (roomSelect) roomSelect.value = room.id;
      updateBookingSummary();
      openModal('bookingModal');
    });

    openModal('roomDetailModal');
  }

  /* ------------------------------------------------------------------------
     Hero Dock & Booking Modal Live Tariff Engine
  ------------------------------------------------------------------------ */
  function syncDates() {
    const today = getTodayISO(0);
    const tomorrow = getTodayISO(1);

    const pairs = [
      ['dockCheckIn', 'dockCheckOut'],
      ['bookingCheckIn', 'bookingCheckOut']
    ];

    pairs.forEach(([inId, outId]) => {
      const inEl = document.getElementById(inId);
      const outEl = document.getElementById(outId);
      if (!inEl || !outEl) return;

      inEl.min = today;
      if (!inEl.value) inEl.value = today;
      outEl.min = tomorrow;
      if (!outEl.value || outEl.value <= inEl.value) {
        outEl.value = tomorrow;
      }

      inEl.addEventListener('change', () => {
        const nextDay = new Date(inEl.value);
        nextDay.setDate(nextDay.getDate() + 1);
        const nextISO = nextDay.toISOString().split('T')[0];
        outEl.min = nextISO;
        if (outEl.value <= inEl.value) {
          outEl.value = nextISO;
        }
        updateBookingSummary();
      });

      outEl.addEventListener('change', updateBookingSummary);
    });
  }

  function populateRoomSelectors() {
    const selectors = ['dockRoom', 'bookingRoom'];
    selectors.forEach((id) => {
      const sel = document.getElementById(id);
      if (!sel) return;
      sel.innerHTML = DATA.rooms
        .map((r) => `<option value="${r.id}">${r.name} (${formatINR(r.rate)}/night)</option>`)
        .join('');
    });
  }

  function updateBookingSummary() {
    const roomSel = document.getElementById('bookingRoom');
    const inEl = document.getElementById('bookingCheckIn');
    const outEl = document.getElementById('bookingCheckOut');
    const guestsEl = document.getElementById('bookingGuests');
    const breakfastEl = document.getElementById('bookingBreakfast');
    const promoEl = document.getElementById('bookingPromo');

    const summaryEl = document.getElementById('bookingRateSummary');
    if (!roomSel || !inEl || !outEl || !summaryEl) return { total: 0, nights: 1 };

    const room = DATA.rooms.find((r) => r.id === roomSel.value) || DATA.rooms[0];
    const nights = Math.max(1, calculateNights(inEl.value, outEl.value));
    const guests = parseInt(guestsEl?.value || '2', 10);

    const roomBase = room.rate * nights;
    const breakfastAddOn = breakfastEl && breakfastEl.checked ? 200 * guests * nights : 0;
    const promoApplied = promoEl && promoEl.value.trim().toUpperCase() === DATA.property.promoCode;
    const discount = promoApplied ? Math.round(roomBase * DATA.property.promoDiscountRate) : 0;
    const subtotal = roomBase - discount + breakfastAddOn;
    const gst = Math.round(subtotal * DATA.property.gstRate);
    const total = subtotal + gst;

    summaryEl.innerHTML = `
      <div class="rate-summary__row">
        <span>${room.name} × ${nights} night${nights > 1 ? 's' : ''}</span>
        <span>${formatINR(roomBase)}</span>
      </div>
      ${breakfastAddOn > 0
        ? `<div class="rate-summary__row"><span>South Indian Veg Breakfast (${guests} guest${guests > 1 ? 's' : ''})</span><span>${formatINR(breakfastAddOn)}</span></div>`
        : ''
      }
      ${discount > 0
        ? `<div class="rate-summary__row" style="color: var(--accent-sage); font-weight: 700;"><span>Heritage Promo (${DATA.property.promoCode} • 10% Off)</span><span>-${formatINR(discount)}</span></div>`
        : ''
      }
      <div class="rate-summary__row">
        <span>Estimated GST (12%)</span>
        <span>${formatINR(gst)}</span>
      </div>
      <div class="rate-summary__row rate-summary__total">
        <span>Estimated Total Stay</span>
        <span>${formatINR(total)}</span>
      </div>
    `;

    return { room, nights, guests, total, promoApplied };
  }

  function initBookingDockAndModal() {
    const dockForm = document.getElementById('heroBookingDock');
    if (dockForm) {
      dockForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const dockIn = document.getElementById('dockCheckIn').value;
        const dockOut = document.getElementById('dockCheckOut').value;
        const dockRoom = document.getElementById('dockRoom').value;
        const dockGuests = document.getElementById('dockGuests').value;

        document.getElementById('bookingCheckIn').value = dockIn;
        document.getElementById('bookingCheckOut').value = dockOut;
        document.getElementById('bookingRoom').value = dockRoom;
        document.getElementById('bookingGuests').value = dockGuests;

        updateBookingSummary();
        openModal('bookingModal');
      });
    }

    ['bookingRoom', 'bookingGuests', 'bookingBreakfast', 'bookingPromo'].forEach((id) => {
      const el = document.getElementById(id);
      if (el) el.addEventListener(el.tagName === 'INPUT' && el.type === 'text' ? 'input' : 'change', updateBookingSummary);
    });

    const bookingForm = document.getElementById('bookingForm');
    const feedback = document.getElementById('bookingFeedback');
    if (bookingForm && feedback) {
      bookingForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        feedback.className = 'form-feedback';
        feedback.textContent = '';

        const checkIn = document.getElementById('bookingCheckIn').value;
        const checkOut = document.getElementById('bookingCheckOut').value;
        const nights = calculateNights(checkIn, checkOut);
        if (nights <= 0) {
          feedback.className = 'form-feedback is-error';
          feedback.textContent = 'Check-out date must be at least 1 night after check-in.';
          return;
        }

        const guestName = document.getElementById('bookingName').value.trim();
        const guestPhone = document.getElementById('bookingPhone').value.trim();
        const guestEmail = document.getElementById('bookingEmail').value.trim();
        const specialRequests = document.getElementById('bookingNotes').value.trim();
        const calc = updateBookingSummary();

        const submitBtn = bookingForm.querySelector('button[type="submit"]');
        const prevText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Confirming Availability...';

        try {
          const result = await submitToBackend({
            type: 'booking',
            guestName,
            guestPhone,
            guestEmail,
            checkIn,
            checkOut,
            roomId: calc.room.id,
            guests: calc.guests,
            promoCode: document.getElementById('bookingPromo').value.trim().toUpperCase(),
            estimatedTotal: calc.total,
            specialRequests
          });

          const waText = encodeURIComponent(
            `Hello T.M. Hotel Madurai, I would like to confirm reservation ${result.reference}:\n` +
            `Guest: ${guestName} (${guestPhone})\n` +
            `Room: ${calc.room.name}\n` +
            `Check-in: ${checkIn} | Check-out: ${checkOut} (${calc.nights} nights)\n` +
            `Guests: ${calc.guests} | Est. Total: ${formatINR(calc.total)}`
          );

          feedback.className = 'form-feedback is-success';
          feedback.innerHTML = `
            <strong>Reservation Request Logged — Ref: ${result.reference}</strong><br/>
            Estimated stay: ${formatINR(calc.total)} for ${calc.nights} night(s) in ${calc.room.name}.
            Our 24/7 front desk will call you shortly, or send immediately via WhatsApp:<br/>
            <a href="https://wa.me/${DATA.property.whatsapp}?text=${waText}" target="_blank" rel="noopener" class="btn btn--dark btn--sm" style="margin-top: 0.65rem;">
              Confirm Instant on WhatsApp
            </a>
          `;
        } catch (err) {
          feedback.className = 'form-feedback is-error';
          feedback.textContent = err.message || 'Could not process reservation. Please call +91 7708681651.';
        } finally {
          submitBtn.disabled = false;
          submitBtn.textContent = prevText;
        }
      });
    }
  }

  /* ------------------------------------------------------------------------
     Quick Pay Modal
  ------------------------------------------------------------------------ */
  function initQuickPay() {
    const form = document.getElementById('quickPayForm');
    const feedback = document.getElementById('quickPayFeedback');
    if (!form || !feedback) return;

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      feedback.className = 'form-feedback';
      const payerName = document.getElementById('qpName').value.trim();
      const payerPhone = document.getElementById('qpPhone').value.trim();
      const bookingRef = document.getElementById('qpRef').value.trim();
      const amount = parseFloat(document.getElementById('qpAmount').value || '0');
      const paymentMethod = document.getElementById('qpMethod').value;

      if (!payerName || isNaN(amount) || amount <= 0) {
        feedback.className = 'form-feedback is-error';
        feedback.textContent = 'Please enter guest name and a valid INR amount.';
        return;
      }

      try {
        const res = await submitToBackend({
          type: 'quickpay',
          payerName,
          payerPhone,
          bookingRef,
          amount,
          paymentMethod
        });

        feedback.className = 'form-feedback is-success';
        feedback.innerHTML = `
          <strong>Quick Pay Receipt Initiated — ${res.reference}</strong><br/>
          Amount: <strong>${formatINR(amount)}</strong> via ${paymentMethod} for ${bookingRef || 'Direct Desk Settlement'}.<br/>
          Share this reference at the front desk (+91 7708681651) or email <em>reservations@tmhotel.in</em> for instant digital verification.
        `;
      } catch (err) {
        feedback.className = 'form-feedback is-error';
        feedback.textContent = err.message;
      }
    });
  }

  /* ------------------------------------------------------------------------
     Sight Seeing In Madurai (8 Attractions from tmhotel.in)
  ------------------------------------------------------------------------ */
  function renderSightseeing() {
    const grid = document.getElementById('sightseeingGrid');
    if (!grid || !DATA.sightseeing) return;

    grid.innerHTML = DATA.sightseeing
      .map((item, idx) => {
        const mapsUrl = `https://www.google.com/maps/dir/?api=1&origin=${encodeURIComponent(
          'T.M. Hotel, 50 West Perumal Maistry Street, Madurai'
        )}&destination=${encodeURIComponent(item.query)}`;

        return `
      <article class="sight-card reveal-up" data-category="${item.category}" data-delay="${(idx % 4) * 80}">
        <div class="sight-card__media">
          <img src="${item.image}" alt="${item.name} — ${item.distance}" loading="lazy" />
          <div class="sight-card__overlay" aria-hidden="true"></div>
          <span class="sight-card__cat">${item.categoryLabel}</span>
          <span class="sight-card__dist-pill">${item.distance}</span>
        </div>
        <div class="sight-card__body">
          <h3 class="sight-card__title">${item.name}</h3>
          <p class="sight-card__desc">${item.description}</p>
          <div class="sight-card__footer">
            <span style="font-size: 0.78rem; font-weight: 700; color: var(--accent-brass-deep);">${item.driveTime}</span>
            <a href="${mapsUrl}" target="_blank" rel="noopener" class="btn btn--dark btn--sm">
              Get Direction &rarr;
            </a>
          </div>
        </div>
      </article>`;
      })
      .join('');

    if (window.TMAnimations) window.TMAnimations.refreshReveals();
  }

  function initSightseeingFilters() {
    const pills = document.querySelectorAll('#sightseeingFilterPills .filter-pill');
    pills.forEach((pill) => {
      pill.addEventListener('click', () => {
        pills.forEach((p) => p.classList.remove('is-active'));
        pill.classList.add('is-active');
        const filter = pill.getAttribute('data-filter');

        document.querySelectorAll('#sightseeingGrid .sight-card').forEach((card) => {
          const match = filter === 'all' || card.getAttribute('data-category') === filter;
          card.classList.toggle('is-hidden', !match);
          if (match) card.classList.add('is-revealed');
        });
      });
    });
  }

  /* ------------------------------------------------------------------------
     Interactive Madurai Landmarks
  ------------------------------------------------------------------------ */
  function renderLandmarks() {
    const list = document.getElementById('landmarkButtons');
    const detail = document.getElementById('landmarkDetail');
    const mapIframe = document.getElementById('landmarkMapIframe');
    const dirLink = document.getElementById('landmarkDirectionsLink');
    const resetPinBtn = document.getElementById('resetHotelPinBtn');
    if (!list || !detail) return;

    const hotelOrigin = 'T.M. Hotel, 50 West Perumal Maistry Street, Madurai 625001';

    const updateStage = (lm) => {
      detail.innerHTML = `
        <div class="landmark-detail__head">
          <h3 class="landmark-detail__name">${lm.name}</h3>
          <div class="landmark-detail__metrics">
            <span class="chip" style="background: rgba(200,150,72,0.18); color: var(--accent-brass-bright);">${lm.distance}</span>
            <span class="chip" style="background: rgba(250,246,240,0.12); color: var(--text-light);">${lm.time}</span>
          </div>
        </div>
        <p style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.16em; color: var(--accent-brass-bright);">${lm.category}</p>
        <p class="landmark-detail__tip">${lm.tip}</p>
      `;

      const query = lm.mapQuery || `${lm.name}, Madurai, Tamil Nadu`;
      if (mapIframe) {
        const zoom = lm.id === 'tm-hotel' ? 16 : 15;
        mapIframe.src = `https://maps.google.com/maps?q=${encodeURIComponent(query)}&t=&z=${zoom}&ie=UTF8&iwloc=&output=embed`;
        mapIframe.title = `${lm.name} — Google Map`;
      }
      if (dirLink) {
        if (lm.id === 'tm-hotel') {
          dirLink.href = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(hotelOrigin)}`;
          dirLink.textContent = 'Open T.M. Hotel in Google Maps →';
        } else {
          dirLink.href = `https://www.google.com/maps/dir/?api=1&origin=${encodeURIComponent(hotelOrigin)}&destination=${encodeURIComponent(query)}`;
          dirLink.textContent = `Get Directions to ${lm.name} →`;
        }
      }
    };

    list.innerHTML = DATA.landmarks
      .map(
        (lm) => `
      <button type="button" class="landmark-btn ${lm.id === state.activeLandmarkId ? 'is-active' : ''}" data-landmark-id="${lm.id}">
        <div>
          <div class="landmark-btn__title">${lm.name}</div>
          <div class="landmark-btn__sub">${lm.category} • ${lm.time}</div>
        </div>
        <span class="landmark-btn__dist">${lm.distance}</span>
      </button>`
      )
      .join('');

    const selectLandmark = (id) => {
      state.activeLandmarkId = id;
      list.querySelectorAll('.landmark-btn').forEach((b) => {
        b.classList.toggle('is-active', b.getAttribute('data-landmark-id') === id);
      });
      const lm = DATA.landmarks.find((l) => l.id === id);
      if (lm) updateStage(lm);
    };

    const initial = DATA.landmarks.find((l) => l.id === state.activeLandmarkId) || DATA.landmarks[0];
    updateStage(initial);

    list.querySelectorAll('.landmark-btn').forEach((btn) => {
      btn.addEventListener('click', () => selectLandmark(btn.getAttribute('data-landmark-id')));
    });

    resetPinBtn?.addEventListener('click', () => selectLandmark('tm-hotel'));
  }

  /* ------------------------------------------------------------------------
     Gallery & Fullscreen Lightbox
  ------------------------------------------------------------------------ */
  function renderGallery() {
    const grid = document.getElementById('galleryGrid');
    if (!grid) return;

    grid.innerHTML = DATA.gallery
      .map(
        (item, index) => `
      <figure class="gallery-card reveal-up" data-category="${item.category}" data-index="${index}" data-cursor="View" tabindex="0" role="button" aria-label="View ${item.title}">
        <img src="${item.image}" alt="${item.title}" loading="lazy" />
        <figcaption class="gallery-card__caption">
          <span class="gallery-card__cat">${item.category}</span>
          <span class="gallery-card__title">${item.title}</span>
        </figcaption>
      </figure>`
      )
      .join('');

    const openAt = (idx) => {
      state.lightboxIndex = idx;
      updateLightbox();
      openModal('lightboxModal');
    };

    grid.querySelectorAll('.gallery-card').forEach((card) => {
      const idx = parseInt(card.getAttribute('data-index'), 10);
      card.addEventListener('click', () => openAt(idx));
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openAt(idx);
        }
      });
    });

    if (window.TMAnimations) window.TMAnimations.refreshReveals();
  }

  function initGalleryFilterAndLightbox() {
    const pills = document.querySelectorAll('#galleryFilterPills .filter-pill');
    pills.forEach((pill) => {
      pill.addEventListener('click', () => {
        pills.forEach((p) => p.classList.remove('is-active'));
        pill.classList.add('is-active');
        const filter = pill.getAttribute('data-filter');
        state.activeGalleryFilter = filter;
        document.querySelectorAll('#galleryGrid .gallery-card').forEach((card) => {
          const match = filter === 'all' || card.getAttribute('data-category') === filter;
          card.classList.toggle('is-hidden', !match);
          if (match) card.classList.add('is-revealed');
        });
      });
    });

    const prevBtn = document.getElementById('lightboxPrev');
    const nextBtn = document.getElementById('lightboxNext');
    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        state.lightboxIndex = (state.lightboxIndex - 1 + DATA.gallery.length) % DATA.gallery.length;
        updateLightbox();
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        state.lightboxIndex = (state.lightboxIndex + 1) % DATA.gallery.length;
        updateLightbox();
      });
    }

    document.addEventListener('keydown', (e) => {
      const modal = document.getElementById('lightboxModal');
      if (!modal || !modal.classList.contains('is-open')) return;
      if (e.key === 'ArrowLeft') prevBtn?.click();
      if (e.key === 'ArrowRight') nextBtn?.click();
    });

    const lightboxModal = document.getElementById('lightboxModal');
    let lbTouchX = 0;
    lightboxModal?.addEventListener('touchstart', (e) => {
      lbTouchX = e.changedTouches[0].clientX;
    }, { passive: true });
    lightboxModal?.addEventListener('touchend', (e) => {
      const delta = e.changedTouches[0].clientX - lbTouchX;
      if (Math.abs(delta) > 45) {
        if (delta > 0) prevBtn?.click();
        else nextBtn?.click();
      }
    }, { passive: true });
  }

  function updateLightbox() {
    const item = DATA.gallery[state.lightboxIndex];
    const img = document.getElementById('lightboxImg');
    const title = document.getElementById('lightboxTitle');
    const count = document.getElementById('lightboxCount');
    if (!item || !img) return;
    img.src = item.image;
    img.alt = item.title;
    if (title) title.textContent = item.title;
    if (count) count.textContent = `${state.lightboxIndex + 1} / ${DATA.gallery.length}`;
  }

  /* ------------------------------------------------------------------------
     Testimonials Slider
  ------------------------------------------------------------------------ */
  function initTestimonials() {
    const track = document.getElementById('testimonialsTrack');
    const dotsWrap = document.getElementById('testimonialDots');
    const prevBtn = document.getElementById('testimonialPrev');
    const nextBtn = document.getElementById('testimonialNext');
    if (!track || !dotsWrap) return;

    track.innerHTML = DATA.testimonials
      .map(
        (t) => `
      <div class="testimonial-slide">
        <div class="testimonial-stars" aria-label="${t.rating} out of 5 stars">${'★'.repeat(t.rating)}</div>
        <blockquote class="testimonial-quote">“${t.quote}”</blockquote>
        <div class="testimonial-author"><strong>${t.author}</strong> — ${t.location}</div>
      </div>`
      )
      .join('');

    dotsWrap.innerHTML = DATA.testimonials
      .map(
        (_, i) => `<button type="button" class="slider-dot ${i === 0 ? 'is-active' : ''}" aria-label="View review ${i + 1}" data-slide="${i}"></button>`
      )
      .join('');

    const goTo = (index) => {
      state.testimonialIndex = (index + DATA.testimonials.length) % DATA.testimonials.length;
      track.style.transform = `translateX(-${state.testimonialIndex * 100}%)`;
      dotsWrap.querySelectorAll('.slider-dot').forEach((d, i) => d.classList.toggle('is-active', i === state.testimonialIndex));
    };

    dotsWrap.querySelectorAll('.slider-dot').forEach((dot) => {
      dot.addEventListener('click', () => goTo(parseInt(dot.getAttribute('data-slide'), 10)));
    });
    prevBtn?.addEventListener('click', () => goTo(state.testimonialIndex - 1));
    nextBtn?.addEventListener('click', () => goTo(state.testimonialIndex + 1));

    let timer = setInterval(() => goTo(state.testimonialIndex + 1), 6500);
    const slider = document.getElementById('testimonialsSlider');
    slider?.addEventListener('mouseenter', () => clearInterval(timer));
    slider?.addEventListener('mouseleave', () => {
      timer = setInterval(() => goTo(state.testimonialIndex + 1), 6500);
    });

    let touchStartX = 0;
    slider?.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].clientX;
    }, { passive: true });
    slider?.addEventListener('touchend', (e) => {
      const delta = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(delta) > 45) {
        goTo(delta > 0 ? state.testimonialIndex - 1 : state.testimonialIndex + 1);
      }
    }, { passive: true });
  }

  function initScrollSpy() {
    const navLinks = Array.from(document.querySelectorAll('.desktop-nav__link'));
    const sections = navLinks
      .map((link) => {
        const href = link.getAttribute('href') || '';
        return href.startsWith('#') && href.length > 1 ? document.querySelector(href) : null;
      })
      .filter(Boolean);
    if (!sections.length) return;

    const onScroll = () => {
      const scrollPos = window.scrollY + 140;
      let activeId = '';
      sections.forEach((sec) => {
        if (scrollPos >= sec.offsetTop) activeId = sec.id;
      });
      navLinks.forEach((link) => {
        link.classList.toggle('is-active', link.getAttribute('href') === `#${activeId}`);
      });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ------------------------------------------------------------------------
     FAQs Accordion
  ------------------------------------------------------------------------ */
  function initFaqs() {
    const list = document.getElementById('faqList');
    if (!list) return;

    list.innerHTML = DATA.faqs
      .map(
        (item, idx) => `
      <div class="faq-item ${idx === 0 ? 'is-open' : ''}">
        <button type="button" class="faq-trigger" aria-expanded="${idx === 0 ? 'true' : 'false'}">
          <span>${item.q}</span>
          <span class="faq-icon" aria-hidden="true">+</span>
        </button>
        <div class="faq-panel" style="${idx === 0 ? 'max-height: 260px;' : ''}">
          <div class="faq-panel__inner">${item.a}</div>
        </div>
      </div>`
      )
      .join('');

    list.querySelectorAll('.faq-trigger').forEach((btn) => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.faq-item');
        const panel = item.querySelector('.faq-panel');
        const willOpen = !item.classList.contains('is-open');

        list.querySelectorAll('.faq-item').forEach((other) => {
          other.classList.remove('is-open');
          other.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
          other.querySelector('.faq-panel').style.maxHeight = null;
        });

        if (willOpen) {
          item.classList.add('is-open');
          btn.setAttribute('aria-expanded', 'true');
          panel.style.maxHeight = panel.scrollHeight + 'px';
        }
      });
    });
  }

  /* ------------------------------------------------------------------------
     Contact Form
  ------------------------------------------------------------------------ */
  function initContactForm() {
    const form = document.getElementById('contactForm');
    const feedback = document.getElementById('contactFeedback');
    if (!form || !feedback) return;

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      feedback.className = 'form-feedback';
      const name = document.getElementById('contactName').value.trim();
      const phone = document.getElementById('contactPhone').value.trim();
      const email = document.getElementById('contactEmail').value.trim();
      const topic = document.getElementById('contactTopic').value;
      const message = document.getElementById('contactMessage').value.trim();

      if (!name || (!phone && !email) || !message) {
        feedback.className = 'form-feedback is-error';
        feedback.textContent = 'Please provide your name, phone or email, and message.';
        return;
      }

      const btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;

      try {
        const res = await submitToBackend({ type: 'contact', name, phone, email, topic, message });
        feedback.className = 'form-feedback is-success';
        feedback.textContent = `Thank you, ${name}. Inquiry ${res.reference} has been received by our Madurai concierge desk.`;
        form.reset();
      } catch (err) {
        feedback.className = 'form-feedback is-error';
        feedback.textContent = err.message || 'Unable to send message right now.';
      } finally {
        btn.disabled = false;
      }
    });
  }

  /* ------------------------------------------------------------------------
     Bootstrap Everything
  ------------------------------------------------------------------------ */
  document.addEventListener('DOMContentLoaded', () => {
    try {
      populateRoomSelectors();
      syncDates();
      try {
        const params = new URLSearchParams(window.location.search);
        const roomParam = params.get('room');
        const bookRoomEl = document.getElementById('bookingRoom');
        if (roomParam && bookRoomEl && [...bookRoomEl.options].some((o) => o.value === roomParam)) {
          bookRoomEl.value = roomParam;
        }
      } catch (_) { }
      renderRooms();
      initRoomFilters();
      renderSightseeing();
      initSightseeingFilters();
      renderLandmarks();
      renderGallery();
      initGalleryFilterAndLightbox();
      initTestimonials();
      initFaqs();
      initNavigation();
      initModals();
      initBookingDockAndModal();
      initQuickPay();
      initContactForm();
      initScrollSpy();
      updateBookingSummary();
    } finally {
      if (window.TMAnimations) {
        window.TMAnimations.init();
      }
    }
  });
})();
