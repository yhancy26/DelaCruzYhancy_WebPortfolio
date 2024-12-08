<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the path to the skills file
$skills_file = '../data/skills.txt';
$skills = file_exists($skills_file) ? array_map('trim', file($skills_file)) : [];

// Get the action from the POST request
$action = $_POST['action'] ?? '';

if ($action === 'add') {
    // Add a new skill
    $name = trim($_POST['name'] ?? '');
    $percentage = trim($_POST['percentage'] ?? '');
    if ($name && is_numeric($percentage)) {
        $skills[] = $name . '|' . $percentage;
        file_put_contents($skills_file, implode(PHP_EOL, $skills));
    }
} elseif ($action === 'edit') {
    // Edit an existing skill
    $index = $_POST['index'] ?? -1;
    $name = trim($_POST['name'] ?? '');
    $percentage = trim($_POST['percentage'] ?? '');
    if ($index >= 0 && isset($skills[$index]) && $name && is_numeric($percentage)) {
        $skills[$index] = $name . '|' . $percentage;
        file_put_contents($skills_file, implode(PHP_EOL, $skills));
    }
} elseif ($action === 'delete') {
    // Delete a skill
    $index = $_POST['index'] ?? -1;
    if ($index >= 0 && isset($skills[$index])) {
        unset($skills[$index]);
        file_put_contents($skills_file, implode(PHP_EOL, $skills));
    }
}

// Redirect back to the admin page
header('Location: ../admin.php');
exit;
