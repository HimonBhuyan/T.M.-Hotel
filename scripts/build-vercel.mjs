/**
 * Renders the PHP multi-page site into static HTML inside dist/ for Vercel deployment.
 * Keeps XAMPP PHP workflow intact while providing zero-config static + Serverless API output.
 */

import fs from 'node:fs';
import path from 'node:path';
import { spawnSync } from 'node:child_process';

const root = process.cwd();
const distDir = path.join(root, 'dist');
const phpExe = process.env.PHP_BIN || 'C:\\xampp\\php\\php.exe';

const pages = [
  'index.php',
  'rooms.php',
  'deluxe-room.php',
  'executive-room.php',
  'gallery.php',
  'near-by-attractions.php',
  'contact.php',
  'quick-pay.php',
  'book-now.php'
];

fs.rmSync(distDir, { recursive: true, force: true });
fs.mkdirSync(distDir, { recursive: true });

for (const page of pages) {
  const res = spawnSync(phpExe, [path.join(root, page)], {
    cwd: root,
    encoding: 'utf8'
  });
  if (res.status !== 0) {
    throw new Error(`Failed rendering ${page}: ${res.stderr}`);
  }

  // Convert internal page .php links to clean Vercel paths (keep api/booking.php handled by vercel.json rewrite)
  let html = res.stdout
    .replace(/href="index\.php"/g, 'href="/"')
    .replace(/href="([a-z-]+)\.php(#[^"]*)?"/g, (_, slug, hash = '') => `href="/${slug}${hash}"`);

  const outName = page.replace(/\.php$/, '.html');
  fs.writeFileSync(path.join(distDir, outName), html, 'utf8');
  console.log(`Built dist/${outName}`);
}

for (const folder of ['css', 'js', 'assets']) {
  fs.cpSync(path.join(root, folder), path.join(distDir, folder), { recursive: true });
  console.log(`Copied ${folder}/ -> dist/${folder}/`);
}

console.log('Vercel static bundle ready in dist/');
