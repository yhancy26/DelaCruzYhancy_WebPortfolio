<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the file that contains the functions
include('php/read_content.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yhancy</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:wght@300;400;500; 600;700; 800; 9008 display=swap');">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* General Styles */
        
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(270deg, #181A2F, #242E49, #37415C, #54162B);
            background-size: 200%;
            animation: waveAnimation 10s ease-in-out infinite;
            color: #fff;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            border: none;
            outline: none;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --text-color: #ededed;
            --main-color: #00abf0;
            --other-color: #081b29;
        }
        /* Base Styles */
        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        section {
            padding: 4rem 2rem;
            text-align: center;
        }

        h2.heading {
            font-size: 5rem;
            margin-bottom: 3rem;
            text-align: center; 
        }

        h2.heading span {
            color: var(--main-color);
        }

        /* Navigation Styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 2rem 9%;
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .logo {
            font-size: 2.5rem;
            color: whitesmoke;
            font-weight: 600;
        }        

        .navbar a {
            font-size: 1.7rem;
            color: whitesmoke;
            font-weight: 500;
            margin-left: 3.5rem;
            transition: .3s;
        }

        .navbar a:hover {
            color: #fda481;
        }

       
        /* Home Section */
       
        .home {
            display: flex;
            align-items: center;
            justify-content: space-between; 
            padding: 10% 9%; 
            background: url('assets/logo.png') no-repeat;
            background-size: 50%; 
            background-position: 90% center; 
            min-height: 100vh;
        }

        .home-content {
            max-width: 60rem;
        }

        .home-content h1{
            font-size: 5.6rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .home-content .text-animate {
            position: relative;
            width: 32.8rem;
        }

        .home-content .text-animate h3 {
            padding-right: 50%;
            font-size: 3.2rem;
            font-weight: 700;
            color: transparent;
            -webkit-text-stroke: .7px #00abf0;
        }

        .home-content p {
            font-size: 1.6rem;
            margin: 2rem 0 4rem;
        }

        .btn-box {
            position: relative;
            display: flex;
            justify-content: space-between;
            width: 34.5rem;
            height: 5rem;
        }

        .btn-box .btn {
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 15rem;
            height: 100%;
            background: var(--main-color);
            border: .2rem solid var(--main-color);
            border-radius: .8rem;
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: .1rem;
            color: var(--other-color);    
            z-index: 1;
            overflow: hidden; 
            transition: .5s;
            
        } 

        .btn-box .btn:hover {
            color: var(--main-color);
        }

        .btn-box .btn:nth-child(2) {
            background: transparent;
            color: var(--main-color);
        }

        .btn-box .btn:nth-child(2):hover {
            color: var(--other-color);

        }

        .btn-box .btn:nth-child(2)::before {
            background: var(--main-color);
        }

        .btn-box .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--other-color);
            z-index: -1;
            transition: .5s;
        }

        .btn-box .btn:hover::before {
            width: 100%;
        }

        .home-sci {
            position: absolute;
            bottom: 4rem;
            width: 170px;
            display: flex;
            justify-content: space-between;
            margin-left: 8%;
        }

        .home-sci a {
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background: transparent;
            border: .2rem solid var(--main-color);
            border-radius: 50%;
            font-size: 20px;
            color: var(--main-color);
            z-index: 1;
            overflow: hidden;
            transition: .5s;
            margin: 20px 5px;
        }

        .home-sci a:hover {
            color: var(--other-color);
        }

        .home-sci a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--main-color);
            z-index: -1;
            transition: .5s;
        }

        .home-sci a:hover::before {
            width: 100%;
        }

        .home-imgHover {
            position: absolute;
            top: 50%;
            right: -10%;
            transform: translateY(-50%);
            width: 50%;
            height: auto;
            background: transparent;
            transition: all 0.5s ease-in-out;
            opacity: 0;
        }

        .home-imgHover img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: transparent;
            opacity: .8;
        }

        /* Adjusted Home Content */
        .home-content {
            max-width: 50rem; 
            margin-left: 10%; 
            z-index: 2; 
        }

        /* Ensure text alignment remains intact */
        .home-content h1,
        .home-content p {
            text-align: left;
        }

        .about {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
            background: transparent;
            padding-bottom: 6rem;
        }

        .heading {
            font-size: 5rem;
            margin-bottom: 3rem;
            text-align: center;

        }

        span {
            color: var(--main-color)
        }

        /* Projects Section */
        .projects-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            padding: 3rem;
            background: transparent;
        }

        /* Individual Project Container */
        .project-container {
            display: flex;
            flex: 1;
            max-width: 45%;
            min-width: 280px;
            align-items: center;
            background: rgba(36, 46, 73, 0.8); 
            border-radius: 1rem;
            box-shadow: 0 0 15px var(--main-color); 
            padding: 2rem;
            color: #fff;
            gap: 1.5rem;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hover Effect */
        .project-container:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px var(--main-color);
        }

        /* Project Info Section */
        .project-info {
            flex: 2;
        }

        .project-info h3 {
            font-size: 1.8rem;
            color: var(--main-color);
            margin-bottom: 1rem;
        }

        .project-info p {
            font-size: 1.4rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        /* Project Image Section */
        .project-image {
            flex: 1;
            text-align: center;
        }

        .project-image img {
            width: 150px;
            height: 150px;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-image img:hover {
            transform: scale(1.5);
        }

        @media (max-width: 768px) {
        .project-container {
            flex-direction: column;
            max-width: 100%;
        }

        .project-info {
            text-align: center;
        }

        .project-image img {
             margin-top: 1rem;
        }
        }

            /*about me*/
        .about-me-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3rem;
            padding: 3rem;
            background: transparent;
            position: relative;
            flex-wrap: wrap;
        }

        .contact-container,
        .right-container {
            flex: 1;
            min-width: 280px;
            padding: 1.5rem;
            background: rgba(36, 46, 73, 0.8); 
            border-radius: 1rem;
            box-shadow: 0 0 15px var(--main-color); 
            color: #fff;
        }

        .contact-container h3,
        .right-container h3 {
            font-size: 1.8rem;
            color: var(--main-color);
            margin-bottom: 1rem;
        }

        .contact-container p,
        .right-container p {
            font-size: 1.4rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .center-image {
            flex: 1;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .center-image img {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5); 
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .center-image img:hover {
            transform: scale(1.5); 
        }

        .education-box .education-content {
            margin-bottom: 2rem;
            padding: 1rem;
            border-left: 0.3rem solid var(--main-color); 
            background: rgba(0, 0, 0, 0.6);
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2); 
            color: #fff;
        }

        .education-content .year {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--main-color);
        }

        .education-content h3 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
        }

        .education-content p {
            font-size: 1.4rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
        .about-me-container {
            flex-direction: column;
            align-items: center;
        }

        .center-image {
            margin-bottom: 2rem;
        }
        }

        /* Media Query for Smaller Screens */
        @media (max-width: 768px) {
        .about-container {
            flex-direction: column; 
            text-align: center; 
        }

        .about-container img {
            max-width: 80%; 
        }

        .about-container p {
            margin-top: 1.5rem; 
        }
        }

        /* Skills Section */
        .skills-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            max-width: 800px;
            margin: auto;
            align-items: center;
        }

        .skill {
            width: 100%;
            text-align: left;
        }

        .skill p {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: whitesmoke;
        }

        .skill p span {
            font-weight: bold;
            color: var(--accent-color);
        }

        .progress-bar {
            width: 100%;
            height: 1.5rem;
            background: #37415c;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .progress-bar .progress {
            height: 100%;
            background: linear-gradient(90deg, #00abf0, #fda481);
            border-radius: 1rem;
            transition: width 0.6s ease-in-out;
        }

        .progress-bar .progress:hover {
            filter: brightness(1.6);
        }

        /* Contact Section */
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            max-width: 600px;
            margin: auto;
        }

        form input,
        form textarea {
            width: 100%;
            padding: 1rem;
            font-size: 1.6rem;
            border: none;
            border-radius: 0.5rem;
            background: #37415c;
            color: var(--text-color);
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
            outline: none;
        }

        form input:focus,
        form textarea:focus {
            border: 2px solid var(--main-color);
            box-shadow: 0 0 10px var(--main-color);
        }

        form button {
            padding: 1rem 2rem;
            font-size: 1.6rem;
            color: #fff;
            background: var(--main-color);
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: var(--main-color) 0.3s ease;
        }

        form button:hover {
            background: var(--accent-color);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 2rem 0;
            font-size: 1.4rem;
            background: #222;
        }

        footer .social-icons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        footer .social-icons a {
            color: whitesmoke;
            font-size: 1.8rem;
            transition: color 0.3s ease;
        }

        footer .social-icons a:hover {
            color: var(--main-color);
        }
                    
            /* Background Animation */
        @keyframes waveAnimation {
             0% {
            background-position: 0% 20%;
        }
            50% {
            background-position: 100% 50%;
        }
            100% {
            background-position: 0% 50%;
            } 
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <header class="header">
        <a href="#" class="logo">YR</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about-me">About Me</a>
            <a href="#projects">Projects</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>  
        </nav>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="home-content">
        <h1>Welcome to My Portfolio, I'm <span>Yhancy</span></h1>
        <div class="text-animate">
            <h3>Information Technology</h3>
        </div>

        <p><?php echo htmlspecialchars(read_content('data/home.txt') ?: "Currently pursuing my studies in the field, I am gaining expertise in various areas such as programming, networking, data management, and systems analysis. 
        I enjoy staying up to date with the latest trends and advancements in IT, and I am always eager to apply my knowledge to real-world projects. With a strong foundation in both theoretical concepts and practical skills, I am excited to contribute to the tech industry and develop innovative solutions."); ?></p>
        
        <div class="btn-box">
            <a href="#" class="btn">Hire Me</a>
            <a href="#" class="btn">let's Talk</a>
        </div>
        </div>

        <div class="home-sci">
            <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook'></i></a>
            <a href="https://www.instagram.com/__yancie/" target="_blank"><i class='bx bxl-instagram-alt'></i></a>
            <a href="https://www.linkedin.com/in/yhancy-ruspel-dela-cruz-j77059295/" target="_blank"><i class='bx bxl-linkedin'></i></a>
            <a href="https://github.com/yhancy26/DelaCruzYhancy_WebPortfolio/upload" target="_blank"><i class='bx bxl-github'></i></a>
        </div>

        <div class="home-imgHover"></div>
    </section>

    <?php
    $about_content = file_exists('data/about.txt') ? file_get_contents('data/about.txt') : "No content available.";
    list($about_text, $about_image) = explode('|', $about_content) + [NULL, "assets/images/default-about.jpg"];
    ?>

    <!-- About Me Section -->
    <section class="about-me" id="about-me">
    <h2 class="heading">About <span>Me</span></h2>
    <div class="about-me-container">

        <!-- Left Side: Contact Info -->
        <div class="contact-container">
            <h3>Contact Information</h3>
            <p><strong>Address:</strong> Bryg. Poblacion, Aguilar, Pangasinan</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
            <p><strong>Email:</strong> yhancy.delacruz@gmail.com</p>
        </div>

        <!-- Center Image -->
        <div class="center-image">
            <img src="<?php echo htmlspecialchars($about_image ?: 'assets/images/default-about.jpg'); ?>" alt="About Me Image">
        </div>

        <!-- Right Side: Editable Text and Education -->
        <div class="right-container">
            <div class="editable-text">
                <h3>Motto</h3>
                <p><?php echo htmlspecialchars($about_text ?: "I am a passionate developer with expertise in various technologies."); ?></p>
            </div>

            <div class="education-section">
                <h3>Education</h3>
                <div class="education-box">
                    <div class="education-content">
                        <div class="content">
                            <div class="year"><i class="bx bx-calendar"></i>2017 - 2021</div>
                            <h3>High School Graduate</h3>
                            <p>"Aguilar Catholic School Inc."</p>
                        </div>
                    </div>

                    <div class="education-content">
                        <div class="content">
                            <div class="year"><i class="bx bx-calendar"></i>2021 - 2023</div>
                            <h3>Senior High School Diploma, TVL-ICT</h3>
                            <p>"Lyceum Northwestern University."</p>
                        </div>
                    </div>

                    <div class="education-content">
                        <div class="content">
                            <div class="year"><i class="bx bx-calendar"></i>2023 - Present</div>
                            <h3>Currently Taking BSIT</h3>
                            <p>"Universidad De Daguapan"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Section -->
<section id="projects">
    <h2 class="heading">Projects</h2>
    <div class="projects-container">
        <?php
        $projects = read_projects('data/projects.txt');
        if (empty($projects)) {
            echo "<p>No projects available at the moment. Check back soon!</p>";
        } else {
            foreach ($projects as $project): ?>
                <div class="project-container">
                    <!-- Left Section: Project Info -->
                    <div class="project-info">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><strong>Language:</strong> <?php echo htmlspecialchars($project['skills'] ?? 'N/A'); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($project['description'] ?? 'No description available.'); ?></p>
                    </div>

                    <!-- Center Section: Image -->
                    <div class="project-image">
                        <img src="<?php echo htmlspecialchars($project['image'] ?: 'assets/images/default-project.jpg'); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                    </div>
                </div>
            <?php endforeach;
        }
        ?>
    </div>
</section>

<!-- Skills Section -->
<section id="skills">
    <h2 class="heading">My <span>Skills</span></h2>
    <div class="skills-container">
        <?php
        $skills_file = 'data/skills.txt';
        $skills = file_exists($skills_file) ? array_map('trim', file($skills_file)) : [];
        foreach ($skills as $line) {
            $parts = explode('|', $line);
            if (count($parts) === 2): 
                $name = htmlspecialchars($parts[0]);
                $percentage = htmlspecialchars($parts[1]); ?>
                <div class="skill">
                    <p><?php echo $name; ?> <span>(<?php echo $percentage; ?>%)</span></p>
                    <div class="progress-bar">
                        <div class="progress" style="width: <?php echo $percentage; ?>%;"></div>
                    </div>
                </div>
            <?php endif;
        }
        ?>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <h2 class="heading">Get in <span>Touch</span></h2>
    <form action="php/handle_contact.php" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>

<!-- Footer -->
<footer>
    <p>&copy; <?php echo date('Y'); ?> My Portfolio</p>
    <div class="social-icons">
        <a href="https://www.facebook.com/" target="_blank"><i class="bx bxl-facebook"></i></a>
        <a href="#"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.linkedin.com/in/yhancy-ruspel-dela-cruz-j77059295/" target="_blank"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/yhancy26/DelaCruzYhancy_WebPortfolio/upload" target="_blank"><i class="bx bxl-github"></i></a>
    </div>
</footer>

</body>
</html>
