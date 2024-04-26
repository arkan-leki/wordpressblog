<?php include './includes/header.php'; ?>
<?php
$db = new Database();
$id = $_GET['id'];
$query = "SELECT * FROM categories WHERE id =" . $id;
$categories = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    if ($name == '') {
        echo $error = 'Please fill out all required fields';
    } else {
        $query = "UPDATE categories SET name='$name' WHERE categories.id=" . $id;
        $update_row = $db->update($query);
    }
}
if (isset($_POST['delete'])) {
    $query = "DELETE FROM categories WHERE id=" . $id;
    $delete_row = $db->delete($query);
}
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>">
    <div class="form-group ">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Name"
               value="<?php echo $categories['name'] ?>">
    </div>
    <div class="form-group">
        <input name="submit" type="submit" class="btn btn-success" value="Submit">
        <input name="delete" type="submit" class="btn btn-danger" value="delete">
        <a class="btn btn-warning" href="index.php">Cancel</a>
    </div>
</form>
<?php include './includes/footer.php'; ?>



