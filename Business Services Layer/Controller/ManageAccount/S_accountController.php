<?php
require_once '../../Business Services Layer/Model/ManageAccount/S_accountModel.php';

session_start();
session_destroy();

class S_accountController{

  function S_signup(){

    $staff = new S_accountModel();

    $staff->email = $_POST['s_email'];

    if($staff->check_email()>0){
      return true;
    } 

    $ID = $staff->get_S_ID();
    $ID++;

    $staff->account_id = $ID;
    $staff->name = $_POST['s_name'];
    $staff->phone_no = $_POST['s_phone'];
    $staff->password = $_POST['acc_password'];
    $staff->status = "Active";  

    if($staff->S_createAccount() > 0){
      $message = "Registration Complete!";
      echo "<script type='text/javascript'>alert('$message');
      window.location = 'C_Login.php';</script>";
    }
    
  }//end function

  function S_accountLogin(){

    $staff = new S_accountModel();
    $staff->email = $_POST['s_email'];
    $staff->password = $_POST['s_password'];

    if ($staff->check_S_Account() > 0) {

      $result = $staff->get_S_ID();

      foreach ($result as $row){
        $account_id = $row['account_id'];
        $name = $row['name'];
      }

      session_start();
      $_SESSION['account_id'] = $account_id;
      $_SESSION['name'] = $name;

     	$message = "Login Successful!";
      echo "<script type='text/javascript'>alert('$message');
      window.location = '../../../Application Layer/view/C_View/C_Home.php';</script>";

    }else{

        $message = "Incorrect email/password!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../../Application Layer/view/C_View/C_Login.php';</script>";
    }
  }//end function

}
?>
