<?php include './includes/header.php'; ?>
<?php
$db = new Database();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    if ($name == '') {
        echo $error = 'Please fill out all required fields';
    } else {
        $query = "INSERT INTO categories (name) VALUES ('$name')";
        $update_row = $db->update($query);
    }
}
?>
    <form role="form" method="post" action="add_category.php">
        <div class="form-group ">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <input name="submit" type="submit" class="btn btn-success" value="Submit">
            <a class="btn btn-warning" href="index.php">Cancel</a>
        </div>
    </form>
<?php include './includes/footer.php'; ?>