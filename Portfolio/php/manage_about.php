<?php
$filename = "../data/about.txt";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $about_text = htmlspecialchars($_POST['about_text']);  // Sanitize input

    // Default to existing image path if file exists
    $current_content = file_exists($filename) ? file_get_contents($filename) : "";
    // Safely explode content and assign default values
    $content_parts = explode('|', $current_content);
    $current_image = isset($content_parts[1]) ? $content_parts[1] : 'assets/images/about/default.jpg';  // Default image if none found

    // Handle new image upload
    if (!empty($_FILES['about_image']['name'])) {
        $image_path = "../assets/images/about/" . basename($_FILES['about_image']['name']);
        // Check if image was uploaded successfully
        if (move_uploaded_file($_FILES['about_image']['tmp_name'], $image_path)) {
            $about_image = "assets/images/about/" . basename($_FILES['about_image']['name']);  // Save relative path
        } else {
            header("Location: ../admin.php?status=image_error");
            exit;
        }
    } else {
        $about_image = $current_image; // Use the current image if no new one is uploaded
    }

    // Save the updated "About Me" content
    $new_content = "$about_text|$about_image";
    if (file_put_contents($filename, $new_content)) {
        header("Location: ../admin.php?status=about_updated");
    } else {
        header("Location: ../admin.php?status=error");
    }
}
?>
