<?php include('header.php'); ?>
<?php include('dbconn.php'); ?>
<div class="box1">
    <h2>All Students</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add students</button>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th>Update</th>
            <th>delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = 'select * from students';
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page_1.php? id=<?php echo $row['id']; ?>" class="btn btn-success">update</a></td>
                    <td><a href="delete_page.php? id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

        <?php


            }
        } else {
            die("query failed");
        }
        ?>



    </tbody>
</table>
<?php
if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'];
    "</h6>";
}
?>
<?php
if (isset($_GET['insert_msg'])) {

    echo  "<h5 style=''>" . $_GET['insert_msg'];
    "</h5>";
}
if (isset($_GET['update_msg'])) {
    echo "<h5>" . $_GET['update_msg'];
    "</h6>";
}
if (isset($_GET['delete_msg'])) {
    echo "<h6>" . $_GET['delete_msg'];
    "</h6>";
}
?>
<form action="./insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" name="f_name" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="add">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>