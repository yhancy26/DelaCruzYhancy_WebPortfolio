<?php include('php/read_content.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
    <style>
        /* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(270deg, #181A2F, #242E49, #37415C, #54162B);
    background-size: 200%;
    animation: waveAnimation 10s ease-in-out infinite;
    color: #fff;
    min-height: 100vh;
}

/* Header Styling */
h1 {
    text-align: center;
    padding: 20px;
    margin-bottom: 10px;
    background-color: #242E49;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    color: #00abf0;
    border-radius: 8px;
}

/* Section Styling */
section {
    margin: 20px;
    padding: 20px;
    background: rgba(36, 46, 73, 0.7);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h2 {
    margin-bottom: 10px;
    text-align: center;
    color: #00abf0;
}

/* Input and Button Styling */
input, textarea, select, button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

button {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

/* Table Styling */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    background: rgba(255, 255, 255, 0.5);
    color: #333;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}

td button {
    background-color: #f44336;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

td button:hover {
    background-color: #e53935;
}

/* Container for projects */
.projects-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px 0;
}

/* Individual project card */
.project-card {
    background: rgba(36, 46, 73, 0.9);
    color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    width: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

/* Project image */
.project-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* Project details */
.project-details {
    padding: 15px;
    text-align: left;
}

.project-details h3 {
    margin: 10px 0;
    font-size: 1.2rem;
    color: #00abf0;
}

.project-details p {
    font-size: 0.9rem;
    margin: 5px 0;
}

/* Actions container */
.project-actions {
    display: flex;
    justify-content: space-between;
    padding: 10px 15px;
    background-color: rgba(36, 46, 73, 0.8);
}

/* Buttons */
.edit-btn, .delete-btn {
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 0.9rem;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.edit-btn {
    background-color: #4CAF50;
    color: white;
}

.edit-btn:hover {
    background-color: #45a049;
}

.delete-btn {
    background-color: #f44336;
    color: white;
}

.delete-btn:hover {
    background-color: #e53935;
}



/* Animation */
@keyframes waveAnimation {
    0% { background-position: 0% 20%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

    </style>
<body>
    <h1>Admin Panel</h1>

    <!-- Read About Me Data -->
    <?php
    $about_content = file_exists('data/about.txt') ? file_get_contents('data/about.txt') : null;

    if ($about_content) {
        list($about_text, $about_image) = explode('|', $about_content) + [NULL, NULL]; 
    } else {
        $about_text = "No content available.";  
        $about_image = "assets/images/about/default.jpg";  
    }
    ?>

    <!-- Edit About Me -->
    <section>
        <h2>Edit About Me</h2>
        <form method="POST" action="php/manage_about.php" enctype="multipart/form-data">
            <label for="about_text">Motto:</label>
            <textarea name="about_text" rows="5" required><?php echo htmlspecialchars($about_text); ?></textarea>
            <br>
            <label for="about_image">Replace About Image:</label>
            <input type="file" name="about_image" accept="image/*">
            <br>
            <img src="<?php echo $about_image; ?>" alt="About Me Image" width="150">
            <br><br>
            <button type="submit">Update About Me</button>
        </form>
    </section>

    <!-- Add New Project -->
    <section>
        <h2>Add New Project</h2>
        <form method="POST" action="php/manage_projects.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add_project">
            <label for="title">Project Title:</label>
            <input type="text" name="title" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description" rows="5" required></textarea>
            <br>
            <label for="skills">Language:</label>
            <input type="text" name="skills" placeholder="e.g., HTML, CSS, JavaScript" required>
            <br>
            <label for="image">Project Image:</label>
            <input type="file" name="image" accept="image/*" required>
            <br><br>
            <button type="submit">Add Project</button>
        </form>
    </section>

    
   <!-- List Existing Projects -->
<section>
    <h2>Existing Projects</h2>
    <?php
    $projects = read_projects('data/projects.txt');
    foreach ($projects as $index => $project): ?>

        <div class="project">
            <!-- Display the project image in the admin panel -->
            <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>" width="100">
            <h3><?php echo $project['title']; ?></h3>
            <p><?php echo $project['description']; ?></p>
            <p><strong>Skills:</strong> <?php echo $project['skills']; ?></p>

            <!-- Edit Form -->
            <form method="POST" action="php/manage_projects.php" enctype="multipart/form-data" style="margin-bottom: 10px;">
                <input type="hidden" name="action" value="edit_project">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $project['title']; ?>" required>
                <br>
                <label for="description">Description:</label>
                <textarea name="description" rows="3" required><?php echo $project['description']; ?></textarea>
                <br>
                <label for="skills">Skills:</label>
                <input type="text" name="skills" value="<?php echo $project['skills']; ?>" required>
                <br>
                <label for="image">Replace Image:</label>
                <input type="file" name="image" accept="image/*">
                <br><br>
                <button type="submit">Edit Project</button>
            </form>

            <!-- Delete Form -->
            <form method="POST" action="php/manage_projects.php">
                <input type="hidden" name="action" value="delete_project">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <button type="submit" style="background-color: red; color: white;">Delete Project</button>
            </form>
        </div>
    <?php endforeach; ?>
</section>

    <!-- Manage Skills -->
<section>
    <h2>Manage Skills</h2>
    <?php
    // Path to the skills file
    $skills_file = 'data/skills.txt';

    // Read skills from the file
    $skills = file_exists($skills_file) ? array_map('trim', file($skills_file)) : [];

    if (empty($skills)) {
        echo "<p>No skills available. Add a new skill below.</p>";
    } else {
        echo '<table border="1" cellpadding="10">';
        echo '<tr><th>Skill</th><th>Percentage</th><th>Actions</th></tr>';

        foreach ($skills as $index => $line) {
            $parts = explode('|', $line);
            $name = $parts[0] ?? '';
            $percentage = $parts[1] ?? '';

            echo '<tr>';
            echo '<td>' . htmlspecialchars($name) . '</td>';
            echo '<td>' . htmlspecialchars($percentage) . '%</td>';
            echo '<td>
                <!-- Edit Skill Form -->
                <form method="POST" action="php/manage_skills.php" style="display:inline;">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="index" value="' . $index . '">
                    <input type="text" name="name" value="' . htmlspecialchars($name) . '" required>
                    <input type="number" name="percentage" value="' . htmlspecialchars($percentage) . '" min="0" max="100" required>
                    <button type="submit">Update</button>
                </form>
                <!-- Delete Skill Form -->
                <form method="POST" action="php/manage_skills.php" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="index" value="' . $index . '">
                    <button type="submit" style="background-color:red;color:white;">Delete</button>
                </form>
            </td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    ?>

    <!-- Add New Skill -->
    <form method="POST" action="php/manage_skills.php">
        <h3>Add New Skill</h3>
        <label for="skill_name">Skill Name:</label>
        <input type="text" name="name" id="skill_name" placeholder="e.g., HTML" required>
        <label for="skill_percentage">Skill Percentage:</label>
        <input type="number" name="percentage" id="skill_percentage" placeholder="e.g., 80" min="0" max="100" required>
        <br><br>
        <button type="submit" name="action" value="add">Add Skill</button>
    </form>
</section>

<section>
    <h2>Contact Submissions</h2>
    <div class="submissions">
        <?php
        // Correct path to the contact_messages.txt file
        $file = $_SERVER['DOCUMENT_ROOT'] . "/Portfolio/data/contact_messages.txt";

        // Check if the file exists
        if (!file_exists($file)) {
            echo "<p>Error: The file 'contact_messages.txt' does not exist at $file.</p>";
            exit;
        }

        // Read the file contents
        $submissions = file_get_contents($file);

        // Check if the file is empty
        if (empty(trim($submissions))) {
            echo "<p>No submissions yet.</p>";
        } else {
            // Split the file into individual submissions (separated by double newlines)
            $entries = explode("\n\n", trim($submissions));

            // Loop through each entry and display it
            foreach ($entries as $index => $entry) {
                echo "<div class='submission'>";
                echo nl2br(htmlspecialchars($entry)); 
                echo "<form action='/Portfolio/php/handle_contact.php' method='POST'>";
                echo "<input type='hidden' name='index' value='$index'>";
                echo "<input type='hidden' name='delete' value='1'>"; 
                echo "<button type='submit' style='background-color: red;'>Delete</button>";
                echo "</form>";
                echo "</div><hr>";
            }
        }
        ?>
    </div>
</section>

</body>
</html>
