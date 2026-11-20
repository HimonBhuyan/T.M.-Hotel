# T.M. Hotel, Madurai — Luxury Heritage Website Redesign

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![GSAP](https://img.shields.io/badge/Animations-GSAP%203%20%2B%20ScrollTrigger-88CE02?style=flat-square)
![Vercel](https://img.shields.io/badge/Deploy-Vercel%20Ready-000000?style=flat-square&logo=vercel&logoColor=white)

A modern, animation-rich, mobile-responsive multi-page website redesign for **T.M. Hotel, Madurai** (*A Division of T.M. Group of Companies, Est. 1950*), located at **50, West Perumal Maistry Street, Madurai - 625001, Tamil Nadu, India**.

> *"Our Motto is to provide a Pleasant Stay and a Homely Care to our Prestigious Customers."*

---

## Highlights & Features

- **Multi-Page Architecture with Rooms Dropdown:** Matches the navigation structure of `tmhotel.in` (`Home`, `Rooms ▾` → `All Rooms` / `Deluxe Room` / `Executive Room`, `Gallery`, `Sight Seeing`, `Contact Us`, `Quick Pay`, `Book Now`).
- **Editorial Animations & Scroll Choreography:**
  - Animated heritage crest SVG preloader curtain & scroll-progress brass hairline
  - GSAP 3 + ScrollTrigger parallax on hero and subpage banners with `IntersectionObserver` fallback
  - Image curtain clip-path unmasking, staggered card reveals, animated stat counters (`1950`, `57`, `2 min`, `5 min`), magnetic buttons, 3D hover card tilt, and `prefers-reduced-motion` support
- **Mobile-First Responsive Design:** Built for `360px`+ mobile viewports up to `1440px`+ desktops with a slide-out drawer, expandable mobile **Rooms ▾** accordion, touch-swipe lightbox/testimonial slider, and a sticky mobile bottom bar (`Call Desk`, `WhatsApp`, `Book Now`).
- **Interactive Direct Booking Engine (`book-now.php` & Booking Modal):**
  - Check-in / Check-out date validation (`12:00 PM` / `11:00 AM`)
  - Live nightly tariff calculator, optional South Indian Veg Breakfast add-on (`₹200/guest/night`), `TM1950` promo code (`10%` off), `12%` estimated GST, and instant WhatsApp booking handoff
- **Quick Pay Portal (`quick-pay.php` & Modal):** Advance deposit and invoice settlement reference generator (`UPI`, `Card`, `NEFT`).
- **Sight Seeing In Madurai (`near-by-attractions.php`):** Filterable guide to 8 Madurai landmarks with real photography, exact distances from T.M. Hotel, and direct Google Maps route links.
- **Interactive Madurai Google Map (`#location`):** Embedded Google Map centered on T.M. Hotel that dynamically updates when selecting transit hubs and landmarks.
- **Dual Backend Support:** Works natively with PHP (`api/booking.php` writing to `data/submissions.json`) on XAMPP/Apache and via a Node.js Serverless Function (`api/booking.js`) on Vercel.

---

## Pages Overview

| Page | File | Purpose |
| :--- | :--- | :--- |
| **Home** | `index.php` | Hero, Quick-Booking Dock, Heritage 1950, Rooms, 6 Amenities, Sight Seeing, Map, Gallery, Reviews & Policies |
| **Rooms Overview** | `rooms.php` | Category filter (`All`, `Deluxe`, `Executive`, `Terrace`) & standard inclusions |
| **Deluxe Room** | `deluxe-room.php` | Deluxe Double A/C (`204 sq. ft.`) specifications, direct tariff & booking |
| **Executive Room** | `executive-room.php` | Executive Double A/C (`228 sq. ft.`) & Terrace Temple-View (`240 sq. ft.`) |
| **Gallery** | `gallery.php` | Filterable property photography with fullscreen keyboard/swipe Lightbox |
| **Sight Seeing** | `near-by-attractions.php` | 8 Madurai attractions with distances, filters, map & Google Maps directions |
| **Contact Us** | `contact.php` | 24/7 phone/email/address, Concierge Inquiry form & interactive directions map |
| **Quick Pay** | `quick-pay.php` | Digital settlement generator + billing & modification policies |
| **Book Now** | `book-now.php` | Full Direct Booking Engine + Check-in, ID (`PAN not accepted`) & Cancellation policies |

---

## Project Structure

```text
├── api/
│   ├── booking.php              # Local XAMPP/PHP JSON API (persists to data/submissions.json)
│   └── booking.js               # Vercel Node.js Serverless Function (/api/booking)
├── assets/images/               # Property & 8 Madurai sightseeing photographs
├── css/styles.css               # Design tokens, responsive grids, modals & animations
├── dist/                        # Pre-built static HTML/CSS/JS/assets output for Vercel
├── includes/
│   ├── header.php               # Shared head, preloader, desktop dropdown & mobile drawer
│   └── footer.php               # Shared footer, WhatsApp FAB, sticky mobile bar & modals
├── js/
│   ├── data.js                  # Rooms, sightseeing attractions, landmarks, testimonials & FAQs
│   ├── animations.js            # Preloader, GSAP ScrollTrigger, parallax & IntersectionObserver
│   └── main.js                  # Booking calculator, filters, lightbox, map & form handlers
├── scripts/
│   └── build-vercel.mjs         # Renders all PHP pages into static HTML inside dist/
├── index.php ... book-now.php   # Multi-page PHP entry points
├── package.json                 # ESM config & build:vercel script
├── vercel.json                  # Vercel outputDirectory ("dist"), cleanUrls & .php rewrites
└── README.md
```

---

## Local Development (XAMPP / PHP)

1. Clone or place this directory at `C:\xampp\htdocs\Tm_Hotel_Madhurai`.
2. Start **Apache** in the XAMPP Control Panel and open:
   - `http://localhost/Tm_Hotel_Madhurai/`
   *(Or run PHP's built-in server directly:)*
   ```bash
   php -S 127.0.0.1:8080
   ```
3. Local booking, Quick Pay, and contact form submissions are handled by `api/booking.php` and logged to `data/submissions.json` (git-ignored).

---

## Deploying to Vercel

This repository is ready for one-click import into Vercel:

1. **Static Output (`dist/`):** Pre-compiled static HTML + assets (`buildCommand: ""` in `vercel.json`, so Vercel does not need a PHP binary).
2. **Serverless API (`api/booking.js`):** Handles `GET` health checks and `POST` requests for `booking`, `quickpay`, and `contact` via `vercel.json` rewrite (`/api/booking.php` → `/api/booking`).
3. **Clean & Legacy Routes:** Both clean URLs (`/rooms`, `/deluxe-room`, `/near-by-attractions`) and `.php` paths (`/rooms.php`, `/deluxe-room.php`, etc.) resolve seamlessly.

If you edit any `.php` page locally, regenerate `dist/` before committing:

```bash
npm run build:vercel
```

---

## API Reference (`/api/booking.php` or `/api/booking`)

- **`GET`** — Returns `{ "status": "ok", "service": "..." }`.
- **`POST`** — Accepts JSON with `type` (`"booking"`, `"quickpay"`, or `"contact"`):
  - Returns HTTP `200` with `{ "ok": true, "reference": "TMH-YYYYMMDD-XXXXX", "record": { ... } }`.
  - Returns HTTP `422` when required fields are missing or invalid.

---

## Property Contact (T.M. Hotel, Madurai)

- **Address:** 50, West Perumal Maistry Street, Madurai Main, Madurai - 625001, Tamil Nadu, India
- **Phone:** +91 7708681651 / +91 452 2341651
- **Email:** `reservations@tmhotel.in` / `tmhotelmadurai@gmail.com`
- **Check-In / Check-Out:** 12:00 PM / 11:00 AM
