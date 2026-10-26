<?php
header('Content-Type: application/json');

// Load .env
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') === false) continue;
        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

$apiKey = $_ENV['BREVO_API_KEY'] ?? '';
$fromEmail = $_ENV['BREVO_FROM_EMAIL'] ?? '';
$toEmail = $_ENV['BREVO_TO_EMAIL'] ?? '';
$apiUrl = $_ENV['BREVO_API_URL'] ?? 'https://api.brevo.com/v3/smtpEmail';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $subject === '' || $message === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

$payload = [
    'sender' => ['email' => $fromEmail],
    'to' => [['email' => $toEmail]],
    'replyTo' => ['email' => $email, 'name' => $name],
    'subject' => $subject,
    'htmlContent' => '<p><strong>From:</strong> ' . htmlspecialchars($name) . ' (' . htmlspecialchars($email) . ')</p><p>' . nl2br(htmlspecialchars($message)) . '</p>',
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'api-key: ' . $apiKey,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'cURL error: ' . $curlError]);
    exit;
}

if ($httpCode >= 200 && $httpCode < 300) {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} else {
    http_response_code($httpCode ?: 500);
    echo json_encode(['success' => false, 'message' => 'Brevo API error', 'details' => $response]);
}
