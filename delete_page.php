<?php include('header.php'); ?>
<?php include('dbconn.php'); ?>

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from `students` where `id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result){
        header("location:index.php?delete_msg=your data has been successfully deleted");
    }
}

?>


<?php include('footer.php'); ?>