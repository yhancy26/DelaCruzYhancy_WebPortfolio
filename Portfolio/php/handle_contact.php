<?php
error_reporting(E_ALL);  // Display all errors for debugging
ini_set('display_errors', 1);  // Ensure errors are displayed

// Correct path to the contact_messages.txt file
$file = $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/data/contact_messages.txt";

// Check if the directory exists and is writable
if (!is_dir(dirname($file))) {
    echo "Error: Directory 'data' does not exist.";
    exit;
}

if (!is_writable(dirname($file))) {
    echo "Error: Directory 'data' is not writable.";
    exit;
}

// Handle the deletion if a POST request is made with 'delete' and 'index' parameters
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && isset($_POST['index'])) {
    $index = $_POST['index'];

    // Read the file contents
    $submissions = file_get_contents($file);

    // Debug: Check if we got submissions
    if ($submissions === false) {
        echo "Error: Failed to read the file.";
        exit;
    }

    // Split the file into individual submissions (separated by double newlines)
    $entries = explode("\n\n", trim($submissions));

    // Debug: Check if entries were split correctly
    if (empty($entries)) {
        echo "Error: No submissions found.";
        exit;
    }

    // Check if the index is valid
    if (isset($entries[$index])) {
        // Remove the selected entry from the array
        unset($entries[$index]);

        // Rebuild the content of the file without the deleted entry
        // Use array_values to reset keys and avoid issues with gaps in keys
        $entries = array_values($entries);

        // If no entries are left, set the content to an empty string
        $updatedContent = empty($entries) ? "" : implode("\n\n", $entries);

        // Save the updated content back to the file
        $writeResult = file_put_contents($file, $updatedContent);

        if ($writeResult === false) {
            echo "Error: Could not update the file. Write result: $writeResult";
            exit;
        } else {
            // Redirect back to admin.php with status=deleted
            header("Location: /Portfolio/admin.php?status=deleted");
            exit;
        }
    } else {
        echo "Error: Invalid submission index.";
        exit;
    }
}

// Handle adding a new submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete'])) {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $timestamp = date("Y-m-d H:i:s");

    // Create a new submission entry
    $entry = "Time: $timestamp\nName: $name\nEmail: $email\nMessage: $message\n\n";

    // Append the new entry to the file using FILE_APPEND to avoid overwriting
    if (file_put_contents($file, $entry, FILE_APPEND)) {
        header("Location: /Portfolio/index.php?status=success");
        exit;
    } else {
        header("Location: /Portfolio/index.php?status=error");
        exit;
    }
}
?>
