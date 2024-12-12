<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'official') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    $created_by = $_SESSION['user_id'];
    $creation_date = date("Y-m-d H:i:s");
    $closing_date = $_POST['closing_date'];

    $sql = "INSERT INTO Polls (title, description, creation_date, closing_date, created_by) 
            VALUES ('$title', '$description', '$creation_date', '$closing_date', '$created_by')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
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
    <title>Create Poll</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Create Poll</h1>
    </header>

    <main>
        <form action="create_poll.php" method="POST">
            <label for="title">Poll Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Poll Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="closing_date">Closing Date:</label>
            <input type="datetime-local" id="closing_date" name="closing_date" required>

            <button type="submit">Create Poll</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Citizen Engagement Platform</p>
    </footer>
</body>
</html>
