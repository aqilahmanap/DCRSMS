<?php
require_once '../../Business Services Layer/Model/ManagePickupService/pickupModel.php';

session_start();
session_destroy();

class pickupController{

  //Staff VIEW list of Customers 
  function viewAll(){
        $customer = new pickupModel();
        return $customer->viewAllcustomer();
    } //end function
   

  //Staff VIEW one customer only
  function viewCust($account_id){
        $customer = new pickupModel();
        $customer->account_id = $account_id;
        return $customer->viewCustomer();
    } //end function


  //Staff NOTIFY pickup/delivery status to customer
  function notifyRider(){
        $customer = new pickupModel();
        $customer->account_id = $_POST['account_id'];
        if($customer->notifiedCust()){
            $message = "Success Notify!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = 'staffNotify.php';</script>";
        }
    } //end function


  //Rider VIEW customer pickup request
  function viewPickup($account_id){
        $customer = new pickupModel();
        $customer->account_id = $account_id;
        return $customer->viewPickupRequest();
    } //end function


  //Rider VIEW customer delivery request
  function viewDelivery($account_id){
        $customer = new pickupModel();
        $customer->account_id = $account_id;
        return $customer->viewDeliveryRequest();
    } //end function


}
?>