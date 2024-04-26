<?php include './includes/header.php'; ?>

<?php
$db = new Database();

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if ($title == '' || $body == '' || $category == '' || $author == '') {
        echo $error = 'Please fill out all required fields';
    } else {
        $query = "INSERT INTO posts (title,body,category,author,tags) VALUES ('$title','$body','$category','$author','$tags')";
        $inset_row = $db->insert($query);
    }

}
?>
<?php
$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>
<form role="form" method="post" action="add_post.php">
    <div class="form-group ">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea class="form-control" name="body" placeholder="Enter Post Body"></textarea>
        <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <script>CKEDITOR.replace('body');</script>
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <label>
            <select class="form-control" name="category">
                <?php while ($row = $categories->fetch_assoc()): ?>
                    <?php if ($row['id'] == $posts['category']) {
                        $select = 'selected';
                    } else {
                        $select = '';
                    } ?>
                    <option <?php echo $select; ?> value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="">Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label for="">Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
    </div>
    <div class="form-group">
        <input name="submit" type="submit" class="btn btn-success" value="Submit">
        <a class="btn btn-warning" href="index.php">Cancel</a>
    </div>
</form>
<?php include './includes/footer.php'; ?>



