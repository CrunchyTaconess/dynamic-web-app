<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    try {
        $sql = "INSERT INTO posts (user_id, title, body) VALUES (?, ?, ?)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $title, $body]);

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>

<?php include 'templates/header.php'; ?>
<h2>Create Post</h2>
<form method="POST" action="create_post.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>
    <label for="body">Body:</label>
    <textarea id="body" name="body" required></textarea><br>
    <button type="submit">Create</button>
</form>
<?php include 'templates/footer.php'; ?>