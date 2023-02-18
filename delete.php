<?php
include("connection.php");

$id =  $_GET['id'];

$query = "DELETE FROM `form` WHERE id ='$id' ";
$data = mysqli_query($conn,$query);
// echo"$query";
if($data)
{
    echo "<script>alert('Record Deleted successfully...?');</script>";
    ?>
        <meta http-equiv = "refresh" content = "0; url = 
        http://localhost/crudoperation/show.php" />
    <?php

}
else
{
    echo "<script>alert('Failed to Deleted....?');</script>";

}
?>
