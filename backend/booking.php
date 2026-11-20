<?php
/**
 * T.M. Hotel, Madurai — Local XAMPP/PHP Reservation, Quick Pay & Inquiry Endpoint
 * Stores validated submissions locally in data/submissions.json
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET') {
    echo json_encode([
        'status' => 'ok',
        'service' => 'T.M. Hotel Madurai Concierge API',
        'timestamp' => gmdate('c'),
    ]);
    exit;
}

if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$payload = json_decode($raw ?: '', true);

if (!is_array($payload)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid JSON payload']);
    exit;
}

$type = trim((string)($payload['type'] ?? 'contact'));
$allowedTypes = ['booking', 'quickpay', 'contact'];
if (!in_array($type, $allowedTypes, true)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Unsupported submission type']);
    exit;
}

function clean_text(mixed $val, int $max = 300): string {
    $str = trim(strip_tags((string)$val));
    return mb_substr($str, 0, $max);
}

$record = [
    'reference' => 'TMH-' . date('Ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 5)),
    'type' => $type,
    'createdAt' => gmdate('c'),
];

if ($type === 'booking') {
    $name = clean_text($payload['guestName'] ?? '', 120);
    $phone = clean_text($payload['guestPhone'] ?? '', 32);
    $email = filter_var(trim((string)($payload['guestEmail'] ?? '')), FILTER_VALIDATE_EMAIL) ?: '';
    $checkIn = clean_text($payload['checkIn'] ?? '', 20);
    $checkOut = clean_text($payload['checkOut'] ?? '', 20);
    $roomId = clean_text($payload['roomId'] ?? '', 40);
    $guests = max(1, min(12, (int)($payload['guests'] ?? 2)));
    $promo = strtoupper(clean_text($payload['promoCode'] ?? '', 20));
    $estimatedTotal = max(0, (int)($payload['estimatedTotal'] ?? 0));

    if ($name === '' || $phone === '' || $checkIn === '' || $checkOut === '') {
        http_response_code(422);
        echo json_encode(['ok' => false, 'error' => 'Please complete guest name, phone, check-in, and check-out dates.']);
        exit;
    }

    $record += [
        'guestName' => $name,
        'guestPhone' => $phone,
        'guestEmail' => $email,
        'checkIn' => $checkIn,
        'checkOut' => $checkOut,
        'roomId' => $roomId,
        'guests' => $guests,
        'promoCode' => $promo,
        'estimatedTotal' => $estimatedTotal,
        'specialRequests' => clean_text($payload['specialRequests'] ?? '', 500),
    ];
} elseif ($type === 'quickpay') {
    $bookingRef = clean_text($payload['bookingRef'] ?? '', 40);
    $payerName = clean_text($payload['payerName'] ?? '', 120);
    $payerPhone = clean_text($payload['payerPhone'] ?? '', 32);
    $amount = (float)($payload['amount'] ?? 0);
    $methodChoice = clean_text($payload['paymentMethod'] ?? 'UPI', 40);

    if ($payerName === '' || $amount <= 0) {
        http_response_code(422);
        echo json_encode(['ok' => false, 'error' => 'Please provide guest name and a valid payment amount in INR.']);
        exit;
    }

    $record += [
        'bookingRef' => $bookingRef !== '' ? $bookingRef : 'WALKIN-SETTLEMENT',
        'payerName' => $payerName,
        'payerPhone' => $payerPhone,
        'amount' => round($amount, 2),
        'paymentMethod' => $methodChoice,
    ];
} else {
    $name = clean_text($payload['name'] ?? '', 120);
    $email = filter_var(trim((string)($payload['email'] ?? '')), FILTER_VALIDATE_EMAIL) ?: '';
    $phone = clean_text($payload['phone'] ?? '', 32);
    $topic = clean_text($payload['topic'] ?? 'General Inquiry', 80);
    $message = clean_text($payload['message'] ?? '', 1000);

    if ($name === '' || ($phone === '' && $email === '') || $message === '') {
        http_response_code(422);
        echo json_encode(['ok' => false, 'error' => 'Please fill in your name, contact detail, and message.']);
        exit;
    }

    $record += [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'topic' => $topic,
        'message' => $message,
    ];
}

$dataDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$file = $dataDir . DIRECTORY_SEPARATOR . 'submissions.json';
$existing = [];
if (is_file($file)) {
    $decoded = json_decode((string)file_get_contents($file), true);
    if (is_array($decoded)) {
        $existing = $decoded;
    }
}

$existing[] = $record;
file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

echo json_encode([
    'ok' => true,
    'reference' => $record['reference'],
    'record' => $record,
]);
