<?php include 'includes/header.php'; ?>

<?php
$db = new Database();
$query = "SELECT posts.*, categories.name From posts INNER JOIN categories on posts.category = categories.id ORDER BY `posts`.`date` DESC";
$posts = $db->select($query);
$query = "SELECT * FROM categories";
$categories = $db->select($query)
?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
    <?php if ($posts): ?>
        <?php while ($row = $posts->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><a href="edit_post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['author'] ?></td>
                <td><?php echo $row['date']; ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-success"><a class="alert-text"
                                            href="add_post.php"> <?php echo htmlentities('add new post') ?></a></div>
    <?php endif; ?>
</table>
<table class="table table-striped table-bordered">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
    <?php if ($categories): ?>
        <?php while ($row = $categories->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><a href="edit_category.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-success"><a class="alert-text"> <?php echo htmlentities('add new category') ?></a></div>
    <?php endif; ?>
</table>
<?php include 'includes/footer.php'; ?>



