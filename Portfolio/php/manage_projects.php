<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filename = "../data/projects.txt";

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Handle "Add Project" Action
    if ($action === 'add_project') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $skills = trim($_POST['skills']);
        $image_path = null;

        // Validate and process the uploaded image
        if (!empty($_FILES['image']['name'])) {
            $target_dir = "../assets/images/projects/";
            $image_path = $target_dir . basename($_FILES['image']['name']);
            
            // Check if the file is a valid image
            if (getimagesize($_FILES['image']['tmp_name']) === false) {
                echo "File is not a valid image.";
                exit;
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                // Save the relative path to the image
                $image_path = "assets/images/projects/" . basename($_FILES['image']['name']);
            } else {
                echo "Error uploading the image.";
                exit;
            }
        } else {
            echo "No image provided.";
            exit;
        }

        // Save the new project to the projects.txt file
        $new_project = "$title|$description|$skills|$image_path\n";
        if (file_put_contents($filename, $new_project, FILE_APPEND)) {
            header("Location: ../admin.php?status=project_added");
        } else {
            echo "Error saving the project.";
        }
        exit;
    }

    // Handle "Edit Project" Action
    if ($action === 'edit_project') {
        $index = (int)$_POST['index'];
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $skills = trim($_POST['skills']);
        $image_path = null;

        // Read existing projects
        $projects = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES) : [];

        if (isset($projects[$index])) {
            // Check if a new image was uploaded
            if (!empty($_FILES['image']['name'])) {
                $target_dir = "../assets/images/projects/";
                $image_path = $target_dir . basename($_FILES['image']['name']);

                // Validate and process the uploaded image
                if (getimagesize($_FILES['image']['tmp_name']) === false) {
                    echo "File is not a valid image.";
                    exit;
                }

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                    echo "Error uploading the image.";
                    exit;
                }
            } else {
                // Retain the old image path if no new image is provided
                $old_project = explode('|', $projects[$index]);
                $image_path = trim($old_project[3]);
            }

            // Update the project entry
            $projects[$index] = "$title|$description|$skills|$image_path";

            // Save the updated projects back to the file
            if (file_put_contents($filename, implode("\n", $projects) . "\n")) {
                header("Location: ../admin.php?status=project_updated");
            } else {
                echo "Error updating the project.";
            }
        } else {
            echo "Project not found.";
        }
        exit;
    }

    // Handle "Delete Project" Action
    if ($action === 'delete_project') {
        $index = (int)$_POST['index'];

        // Read existing projects
        $projects = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES) : [];

        if (isset($projects[$index])) {
            // Remove the project from the list
            unset($projects[$index]);

            // Save the updated projects back to the file
            if (file_put_contents($filename, implode("\n", $projects) . "\n")) {
                header("Location: ../admin.php?status=project_deleted");
            } else {
                echo "Error deleting the project.";
            }
        } else {
            echo "Project not found.";
        }
        exit;
    }
}
?>
