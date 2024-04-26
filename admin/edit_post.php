<?php include './includes/header.php'; ?>

<?php
$db = new Database();
$id = $_GET['id'];
$query = "SELECT * FROM posts WHERE id =" . $id;
$posts = $db->select($query)->fetch_assoc();
$query = "SELECT * FROM categories";
$categories = $db->select($query);

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    if ($title == '' || $body == '' || $category == '' || $author == '') {
        echo $error = 'Please fill out all required fields';
    } else {
        $query = " UPDATE posts SET title = '$title', body = '$body', category ='$category', author ='$author', tags ='$tags' WHERE posts.id=" . $id;
        $inset_row = $db->update($query);
    }
}
if (isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id=" . $id;
    $delete_row = $db->delete($query);
}
?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $id ?>">
    <div class="form-group ">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title"
               value="<?php echo $posts['title'] ?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea class="form-control" name="body"
                  placeholder="Enter Post Body"><?php echo $posts['body']; ?></textarea>
                  <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
                  <script>CKEDITOR.replace('body');</script>    </div>
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
                    <option <?php echo $select; ?>
                        value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="">Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name"
               value="<?php echo $posts['author'] ?>">
    </div>
    <div class="form-group">
        <label for="">Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags"
               value="<?php echo $posts['tags'] ?>">
    </div>
    <div class="form-group">
        <input name="submit" type="submit" class="btn btn-success" value="Submit">
        <input name="delete" type="submit" class="btn btn-danger" value="delete">
        <a class="btn btn-warning" href="index.php">Cancel</a>
    </div>
</form>
<?php include './includes/footer.php'; ?>
