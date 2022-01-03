<?php
require_once '../../libs/database.php';

class pickupModel{

  public $account_id, $custName, $custAddress, $custNo, $custItem, $date;

  

  function viewAllCustomer(){
        $sql = "SELECT account_id, custName, custAddress, custNo FROM customer";
        return DB::run($sql);
  } //end function  


  function viewCustomer(){

        $sql = "SELECT * FROM customer WHERE account_id ='C01'";
        $args = [':account_id'=>$this->account_id];
        return DB::run($sql, $args);
  } //end function  


    function notifiedCust(){
        $sql = "INSERT INTO customer (riderStatus) VALUES ('Notified')";
        $args = [':account_id'=>$this->account_id];
        return DB::run($sql,$args);
  } //end function  


  function viewPickupRequest(){
        $sql = "SELECT * FROM customer WHERE account_id ='C01'";
        $args = [':account_id'=>$this->account_id];
        return DB::run($sql, $args);
  } //end function 


    function viewDeliveryRequest(){
        $sql = "SELECT * FROM customer WHERE account_id ='C04'";
        $args = [':account_id'=>$this->account_id];
        return DB::run($sql, $args);
  } //end function 
}
?>