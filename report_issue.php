<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'backend/db.php';
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    
    $sql = "INSERT INTO Public_Issue_Reporting (user_id, issue_title, issue_description, report_date)
            VALUES ('$user_id', '$issue_title', '$issue_description', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: issues.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Issues</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Report Public Issues</h1>
    </header>

    <main>
        <form action="issues.php" method="POST">
            <label for="issue_title">Issue Title:</label>
            <input type="text" id="issue_title" name="issue_title" required>

            <label for="issue_description">Issue Description:</label>
            <textarea id="issue_description" name="issue_description" required></textarea>

            <button type="submit">Report Issue</button>
        </form>
    </main>
    <footer>
        <p>&copy; © Developed and maintained by Nimrod Namadula, SIN 2305298580</p>
    </footer>
</body>
</html>
