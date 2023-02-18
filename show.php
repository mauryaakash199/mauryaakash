<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background:#a4b0be;
            }
            table{
                background:#ffffff;
            }
            .update {
                background-color: #2c3e50;
                color: white;
                font-size: 18px;
                border:0;
                outline: none;
                border-radius: 5px;
                font-weight: bold;
                height: 25px;
                cursor: pointer;
                margin-right: 17px;
            }
            .delete{
                background-color: #ED4C67;
                color: white;
                font-size: 18px;
                border:0;
                outline: none;
                border-radius: 5px;
                font-weight: bold;
                height: 25px;
                cursor: pointer;
                
            }
        </style>
    </head>
</html>

<?php
include("connection.php");
// error_reporting(0);

$query = "SELECT * FROM form";
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);
// $result = mysqli_fetch_assoc($data);


// echo $total;
if($total != 0)
{
   ?>
     <h2 align="center"><mark> Displaying All Records</mark></h2>
     <center> <table border="5px" cellspacing="7" width="100%">
     <tr>
        <th width="3%">ID</th>
        <th width="6%">images</th>
        <th width="7%">First Name</th>
        <th width="7%">Last Name</th>
        <th width="7%">Password</th>
        <th width="8%">Confirm Password</th>
        <th width="5%">Gender</th>
        <th width="15%">Email</th>
        <th width="8%">Phone</th>
        <th width="5%">Caste</th>
        <th width="5%">Language</th>
        <th width="13%">Address</th>
        <th width="10%">Action</th>
        </tr>

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo" <tr>
                <td>$result[id]"."</td> 
                <td><img src= '$result[std_image]"."' height='80px' width='80px'</td> 

                <td>$result[fname]"."</td> 
                <td>$result[lname]"."</td> 
                <td>$result[password]"."</td> 
                <td>$result[conpassword]"."</td>
                <td>$result[gender]"."</td>
                <td>$result[email]"."</td>
                <td>$result[phone]"."</td>
                <td>$result[caste]"."</td>
                <td>$result[language]"."</td>
                <td>$result[address]"."</td>
               
                <td><a href='update_design.php ? id=$result[id]'><input 
                type='submit'value='Update' class='update'></a>

                <a href='delete.php ? id=$result[id]'><input 
                type='submit'value='Delete' class='delete' onclick='return check_delete()'></a></td>
              </tr>
            ";
    }
}
else{
    echo "No record found";
}
?>
 </table>
 </center>

<!-- Confirmation delete  function -->
<script>
    function check_delete()
    {
        return confirm('Are you sure you want delete this data');
    }
</script>

