<?php
session_start();

include 'backend/db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'], $_POST['description'], $_SESSION['user_id'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("INSERT INTO Projects (title, description, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $description, $user_id);
        $stmt->execute();
        $stmt->close();
    }
}

$sql = "SELECT * FROM Projects";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Public Projects and Initiatives</h1>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No projects found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; © Developed and maintained by Nimrod Namadula, SIN 2305298580</p>
    </footer>
</body>
</html>
