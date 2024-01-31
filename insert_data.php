<?php include('dbconn.php');?>
<?php

if(isset($_POST['add_students'])){
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $age=$_POST['age'];

    if($f_name=="" || empty($f_name)){
        header('location:index.php?message=you need to fill in the first name');
    }
    else{
        $query="insert into `students` (`first_name`,`last_name`,`age`) values('$f_name','$l_name','$age')";
        $result = mysqli_query($conn, $query);

        if(!$result){
         die("query failed");
        }
        else{
            header('location:index.php?insert_msg=your data has been added successsfully');
        }
    }

}
?>