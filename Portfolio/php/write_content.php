<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure 'section' and 'content' are provided
    if (!isset($_POST['section']) || !isset($_POST['content'])) {
        echo "Error: Missing required parameters.";
        exit;
    }

    $section = $_POST['section'];
    $content = $_POST['content'];

    // Map sections to their respective file paths
    $file_map = [
        'home' => '../data/home.txt',
        'about' => '../data/about.txt',
        'skills' => '../data/skills.txt'
    ];

    // Check if the section exists in the mapping
    if (array_key_exists($section, $file_map)) {
        $filename = $file_map[$section];

        // Check if the file is writable
        if (is_writable($filename)) {
            // Open the file for writing
            $file = fopen($filename, 'w');
            if ($file) {
                // Write content to the file
                if (fwrite($file, $content) === false) {
                    echo "Error: Failed to write to file.";
                } else {
                    echo "Content updated successfully!";
                }
                fclose($file);
            } else {
                echo "Error: Unable to open file for writing.";
            }
        } else {
            echo "Error: File is not writable.";
        }
    } else {
        echo "Error: Invalid section specified.";
    }
}
?>
