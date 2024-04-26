<?php include './includes/header.php' ?>
<?php
$db = new Database();
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT * FROM `posts`   WHERE category=" . $category . " ORDER BY `posts`.`date` DESC";
    $posts = $db->select($query);
} elseif (isset($_GET['author'])) {
    $author = $_GET['author'];
    $query = "SELECT * FROM `posts` WHERE `author`= '$author'  ORDER BY `posts`.`date` DESC ";
    $posts = $db->select($query);
} else {
    $query = "SELECT * FROM `posts` ORDER BY `posts`.`date` DESC ";
    $posts = $db->select($query);
}
?>
<?php if ($posts): ?>
    <?php while ($row = $posts->fetch_assoc()): ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> <a
                    href="./posts.php?author=<?php echo urldecode($row['author']); ?>"><?php echo $row['author']; ?></a>
            </p>
            <p><?php echo shortenText($row['body']); ?></p>
            <a class="readmore" href="./post.php?id=<?php echo urldecode($row['id']); ?>">Read more</a>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>There is no posts yet</p>
<?php endif; ?>
<?php include "./includes/footer.php" ?>
