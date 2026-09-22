<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$name = trim($_POST['name'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$service = trim($_POST['service'] ?? '');
$visit_date = $_POST['visit_date'] ?? null;
$address = trim($_POST['address'] ?? '');
$problem = trim($_POST['problem'] ?? '');

if ($name === '' || $mobile === '') {
    die('Name and mobile are required.');
}

$stmt = $pdo->prepare("
    INSERT INTO inquiries
    (name, mobile, service, visit_date, address, problem)
    VALUES
    (:name, :mobile, :service, :visit_date, :address, :problem)
");

$stmt->execute([
    ':name' => $name,
    ':mobile' => $mobile,
    ':service' => $service,
    ':visit_date' => $visit_date ?: null,
    ':address' => $address,
    ':problem' => $problem
]);

echo "Inquiry submitted successfully!";
