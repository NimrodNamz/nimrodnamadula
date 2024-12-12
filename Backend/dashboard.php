<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'official') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

$sql = "SELECT * FROM Polls";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="create_poll.php">Create Poll</a>
            <a href="../index.php">Home</a>
        </nav>
    </header>

    <main>
        <h2>Polls</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Creation Date</th>
                    <th>Closing Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['creation_date']; ?></td>
                        <td><?php echo $row['closing_date']; ?></td>
                        <td><a href="view_poll.php?id=<?php echo $row['id']; ?>">View</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Citizen Engagement Platform</p>
    </footer>
</body>
</html>
