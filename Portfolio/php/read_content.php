<?php
// Function to read content from a file
function read_content($filename) {
    // Check if the file exists
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        if ($content === false) {
            return "Error reading content from file.";
        }
        return $content;
    }
    return "No content available.";
}

// Function to read projects from a file
function read_projects($filename) {
    $projects = [];
    
    // Check if the file exists
    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        
        if ($file) {
            // Loop through each line in the file
            while (($line = fgets($file)) !== false) {
                $parts = explode('|', $line);
                // Ensure the line contains all four expected fields
                if (count($parts) === 4) {
                    $projects[] = [
                        'title' => htmlspecialchars(trim($parts[0])),
                        'description' => htmlspecialchars(trim($parts[1])),
                        'skills' => htmlspecialchars(trim($parts[2])),
                        'image' => htmlspecialchars(trim($parts[3]))
                    ];
                }
            }
            fclose($file);
        } else {
            error_log("Error: Unable to open file '$filename'.");
        }
    } else {
        error_log("Error: File '$filename' not found.");
    }
    
    return $projects;
}
