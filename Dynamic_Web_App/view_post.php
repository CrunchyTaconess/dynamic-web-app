<?php
include 'includes/db.php';
session_start();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$post_id = $_GET['id'];

$sql = "SELECT posts.title, posts.body, posts.created_at, users.username FROM posts JOIN users ON posts.user_id = userS.id WHERE posts.id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post) {
    header('Location: index.php');
    exit;
}
?>

<?php include 'templates/header.php'; ?>
<h2><?php echo htmlspecialchars($post['title']); ?></h2>
<p><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
<p><small>by <?php echo htmlspecialchars($post['username']); ?> on <?php echo $post['created_at']; ?></small></p>
<a href="index.php">Back to Posts</a>
<?php include 'templates/footer.php'; ?>