<!-- notified.php -->
<!-- Admin can delete one particular data. -->

<?php

include ("mydb.php");

$account_id = $_GET['account_id'];
$query = "DELETE FROM customer WHERE account_id = '$account_id'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in notified.php");

if($result){
echo "<script type= 'text/javascript'> window.location='staffHomepage.php'</script>";
}
?>