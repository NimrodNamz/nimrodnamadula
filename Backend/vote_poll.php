<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $poll_id = $_POST['poll_id'];
    $vote_option = $_POST['vote_option'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Votes (poll_id, user_id, vote_option, vote_date) 
            VALUES ('$poll_id', '$user_id', '$vote_option', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: polls.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
