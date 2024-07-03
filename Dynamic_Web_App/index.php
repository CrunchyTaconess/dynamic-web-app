<?php
include 'includes/db.php';
session_start();

$sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, users.username FROM posts JOIN users ON posts.user_id = users.id";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll();
?>

<?php include 'templates/header.php'; ?>
<h2>Posts</h2>
<?php foreach ($posts as $post): ?>
    <div>
        <h3><a href="view_post.php?id=<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
        <p><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
        <p><small>by <?php echo htmlspecialchars($post['username']); ?> on <?php echo $post['created_at']; ?></small></p>
    </div>
<?php endforeach; ?>
<?php include 'templates/footer.php'; ?>