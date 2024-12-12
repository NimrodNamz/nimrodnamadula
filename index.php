<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citizen Engagement Platform</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Welcome to the Citizen Engagement Platform</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="feedback.php">Feedback</a>
            <a href="polls.php">Polls</a>
            <a href="townhall.php">Town Halls</a>
            <a href="projects.php">Track Projects</a>
            <a href="report_issue.php">Report an Issue</a>
            <a href="notifications.php">Notifications</a>
        </nav>
    </header>

    <main>
        <section>
        <h1 style="text-align: center;">About the Platform</h1>

            <p>This platform allows citizens to participate in public governance by providing feedback, voting on policies, attending virtual town halls, and tracking local initiatives.</p>
        </section>

        <section class="stats">
            <div class="stat-card">
                <h3>Total Polls</h3>
                <p>5</p>
            </div>
            <div class="stat-card">
                <h3>Projects Ongoing</h3>
                <p>3</p>
            </div>
            <div class="stat-card">
                <h3>Total Issues Reported</h3>
                <p>12</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; © Developed and maintained by Nimrod Namadula, SIN 2305298580</p>
    </footer>
</body>
</html>
