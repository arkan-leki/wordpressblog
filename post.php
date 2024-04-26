<?php include "./includes/header.php"; ?>
<?php
$db = new Database();
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id=" . $id;
$post = $db->select($query)->fetch_assoc();
?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $post['title'] ?></h2>
        <p class="blog-post-meta"><?php echo $post['date'] ?>by <a href="#"><?php $post['author'] ?></a></p>
        <p><?php echo $post['body'] ?></p>
    </div>
<?php include "./includes/footer.php"; ?>