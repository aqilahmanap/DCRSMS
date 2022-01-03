<?php

require_once '../../Business Services Layer/Controller/ManagePickupService/pickupController.php';

$account_id = $_GET['account_id'];

$customer = new pickupController();
$data = $customer->viewAll($account_id);

if(isset($_POST['notifyRider'])){
    $customer->notifyRider();
}

?>

<html>
<head>
  <title>Welcome to Dercs Repair Shop!</title>
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <script src="../../js/jquery_library.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <style>
	
table {
  border-collapse: collapse;
  border: 2px solid #ddd;
  width: 80%;
  margin-left:auto; 
  margin-right:auto;
}

th, td {
  text-align: center;
   border: 2px solid #ddd;
  padding: 8px;
}


th {
  background-color: #09224E;
  color: white;
}
  </style>
</head>

<body style = "background: #e6f2ff" >

  <!--navbar-->
  <nav class="navbar navbar-default navbar-fixed-top" style="background:#b3d9ff">
    <div class="container">

      <ul class="nav navbar-nav navbar-left">
        <li><a href="../../index.php"><img src="../../images/logo.jpg" alt="Dercs Logo" style="width:100px;height:60px;"><strong>  Dercs Computer Repair Shop</strong></a></li>
        <li><a href="C_homepage.php"><span class="glyphicon glyphicon-list-alt"></span> About</a></li>
        <li><a href="C_payment.php"><span class="glyphicon glyphicon-list-alt"></span> Payment</a></li>
        <li><a href="C_services.php"><span class="glyphicon glyphicon-list-alt"></span> Services</a></li>
        <li><a href="riderHomepage.php"><span class="glyphicon glyphicon-list-alt"></span> Pickup</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?=$CAccountID?> -->
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="R_Login.php" onclick="alertMsg()">Logout</a></li>
          </ul>
        </li>
      </ul>

      <script>
        function alertMsg(){
          alert("Logout Successful");
        }
      </script>

    </div>
  </nav>
  <br><br><br>
  <!-- end of navigation bar -->
    <br><br>
    <h1><center>PICK UP REQUEST</center></h>
<br>

<!-- TABLE DISPLAY LIST OF CUSTOMER -->
<table>
  <tr>
    <th>#</th>
	<th>Customer's Name</th>
    <th>Address</th>
    <th>Phone Number</th>
	<th>Action</th>
  </tr>

<tr>
        <?php   foreach($data as $row){  
        ?>
				<td><?=$row["account_id"]?></td> 
				<td><?=$row["custName"]?></td>
				<td><?=$row["custAddress"]?></td>
				<td><?=$row["custNo"]?></td>
				
				<td>
        <form action="" method="POST">
                            
                                &nbsp;<button type="button" onclick="location.href='./staffRequest.php?account_id=<?=$row['account_id']?>'">View</i></button>
                                <input type="hidden" name="account_id" value="<?=$row['account_id']?>">
                                <input type="submit" name="delete" value="Notify">
                            
                    </form>
        </td>

</tr>
<?php

}
?>	
	</tbody>
    </table>
<!-- END TABLE -->

    </center>
    <br><br>
    <!-- footer -->
  <nav class="navbar navbar-default navbar-fixed-bottom" style="background:#b3d9ff">
    <ul class="nav navbar-nav navbar-left">
      <li><a> Developed by DCRSMS</a></li>
    </ul>
  </nav>
  <!-- end of footer -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
