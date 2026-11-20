# T.M. Hotel, Madurai — Website Redesign

Responsive, animation-rich multi-page website redesign for **T.M. Hotel, Madurai** (A Division of T.M. Group of Companies, Est. 1950).

## Local Development (XAMPP / PHP)
1. Place the project in `C:\xampp\htdocs\Tm_Hotel_Madhurai` and start Apache in XAMPP (or run `php -S 127.0.0.1:8080`).
2. Visit `http://localhost/Tm_Hotel_Madhurai/` or `http://127.0.0.1:8080/`.
3. Form submissions (`book-now.php`, `quick-pay.php`, `contact.php`) are handled locally by `api/booking.php`.

## Deploying on Vercel
This repository is pre-configured for one-click Vercel deployment:
- `dist/` contains the compiled static multi-page bundle (`index.html`, `rooms.html`, `deluxe-room.html`, `executive-room.html`, `gallery.html`, `near-by-attractions.html`, `contact.html`, `quick-pay.html`, `book-now.html`) plus `css/`, `js/`, and `assets/`.
- `api/booking.js` provides a native Node.js Vercel Serverless Function for `booking`, `quickpay`, and `contact` submissions.
- `vercel.json` configures `outputDirectory: "dist"`, `cleanUrls: true`, and `.php` route rewrites.

If you update any `.php` page locally, rebuild `dist/` before committing:
```bash
node scripts/build-vercel.mjs
```
