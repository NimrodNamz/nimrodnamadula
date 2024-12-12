<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'backend/db.php';
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Feedback (user_id, title, description, submission_date) VALUES ('$user_id', '$title', '$description', NOW())";
    if ($conn->query($sql) === TRUE) {
        header('Location: feedback.php');
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
    <title>Feedback</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Submit Feedback</h1>
    </header>

    <main>
        <form action="feedback.php" method="POST">
            <label for="title">Feedback Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Feedback Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </main>

    <footer>
        <p>&copy; © Developed and maintained by Nimrod Namadula, SIN 2305298580</p>
    </footer>
</body>
</html>
