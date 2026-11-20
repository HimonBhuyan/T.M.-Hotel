/**
 * T.M. Hotel, Madurai — Vercel Serverless Concierge API
 * Handles booking, quickpay, and contact JSON POST requests.
 */

import crypto from 'node:crypto';

function cleanText(val, max = 300) {
  return String(val ?? '')
    .replace(/<[^>]*>/g, '')
    .trim()
    .slice(0, max);
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

export default async function handler(req, res) {
  res.setHeader('Content-Type', 'application/json; charset=utf-8');
  res.setHeader('X-Content-Type-Options', 'nosniff');

  if (req.method === 'GET') {
    return res.status(200).json({
      status: 'ok',
      service: 'T.M. Hotel Madurai Concierge API (Vercel)',
      timestamp: new Date().toISOString()
    });
  }

  if (req.method !== 'POST') {
    return res.status(405).json({ ok: false, error: 'Method not allowed' });
  }

  let payload = req.body;
  if (typeof payload === 'string') {
    try {
      payload = JSON.parse(payload);
    } catch {
      return res.status(400).json({ ok: false, error: 'Invalid JSON payload' });
    }
  }

  if (!payload || typeof payload !== 'object' || Array.isArray(payload)) {
    return res.status(400).json({ ok: false, error: 'Invalid JSON payload' });
  }

  const type = cleanText(payload.type || 'contact', 20);
  if (!['booking', 'quickpay', 'contact'].includes(type)) {
    return res.status(400).json({ ok: false, error: 'Unsupported submission type' });
  }

  const dateTag = new Date().toISOString().slice(0, 10).replace(/-/g, '');
  const randTag = crypto.randomBytes(3).toString('hex').toUpperCase().slice(0, 5);
  const record = {
    reference: `TMH-${dateTag}-${randTag}`,
    type,
    createdAt: new Date().toISOString()
  };

  if (type === 'booking') {
    const guestName = cleanText(payload.guestName, 120);
    const guestPhone = cleanText(payload.guestPhone, 32);
    const rawEmail = cleanText(payload.guestEmail, 120);
    const guestEmail = isValidEmail(rawEmail) ? rawEmail : '';
    const checkIn = cleanText(payload.checkIn, 20);
    const checkOut = cleanText(payload.checkOut, 20);
    const roomId = cleanText(payload.roomId, 40);
    const guests = Math.max(1, Math.min(12, parseInt(payload.guests ?? 2, 10) || 2));
    const promoCode = cleanText(payload.promoCode, 20).toUpperCase();
    const estimatedTotal = Math.max(0, parseInt(payload.estimatedTotal ?? 0, 10) || 0);

    if (!guestName || !guestPhone || !checkIn || !checkOut) {
      return res.status(422).json({
        ok: false,
        error: 'Please complete guest name, phone, check-in, and check-out dates.'
      });
    }

    Object.assign(record, {
      guestName,
      guestPhone,
      guestEmail,
      checkIn,
      checkOut,
      roomId,
      guests,
      promoCode,
      estimatedTotal,
      specialRequests: cleanText(payload.specialRequests, 500)
    });
  } else if (type === 'quickpay') {
    const bookingRef = cleanText(payload.bookingRef, 40);
    const payerName = cleanText(payload.payerName, 120);
    const payerPhone = cleanText(payload.payerPhone, 32);
    const amount = Number(payload.amount || 0);
    const paymentMethod = cleanText(payload.paymentMethod || 'UPI', 40);

    if (!payerName || Number.isNaN(amount) || amount <= 0) {
      return res.status(422).json({
        ok: false,
        error: 'Please provide guest name and a valid payment amount in INR.'
      });
    }

    Object.assign(record, {
      bookingRef: bookingRef || 'WALKIN-SETTLEMENT',
      payerName,
      payerPhone,
      amount: Math.round(amount * 100) / 100,
      paymentMethod
    });
  } else {
    const name = cleanText(payload.name, 120);
    const rawEmail = cleanText(payload.email, 120);
    const email = isValidEmail(rawEmail) ? rawEmail : '';
    const phone = cleanText(payload.phone, 32);
    const topic = cleanText(payload.topic || 'General Inquiry', 80);
    const message = cleanText(payload.message, 1000);

    if (!name || (!phone && !email) || !message) {
      return res.status(422).json({
        ok: false,
        error: 'Please fill in your name, contact detail, and message.'
      });
    }

    Object.assign(record, { name, email, phone, topic, message });
  }

  return res.status(200).json({
    ok: true,
    reference: record.reference,
    record
  });
}
