<?php

class S_accountModel{

  public $account_id, $name, $phone_no, $email, $password, $status;

  function connect(){ 
    $pdo = new PDO('mysql:host=localhost;dbname=DCRSMS', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }

  function check_email(){
    $sql = "select * from Account where email = :email";
    $args = [':email'=>$this->email];

    $stmt = S_accountModel::connect()->prepare($sql);
    $stmt->execute($args);
    return $stmt->rowCount();
  }

  function get_end_S_ID(){
    $sql = "select account_id from Account where account_type = 'Staff' order by account_id desc limit 1";
    
    $stmt = S_accountModel::connect()->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {

      foreach ($stmt as $row)
        return $row['account_id'];

    } else return "AAAA0000";
  }

  function S_createAccount(){
    $sql = "insert into Account values (:account_id, 'Staff', :name, :phone_no, :email, :password, :status)";
    $args = [':account_id'=>$this->account_id, ':name'=>$this->name, ':phone_no'=>$this->phone_no, ':email'=>$this->email, ':password'=>$this->password, ':status'=>$this->status];
   
    $stmt = S_accountModel::connect()->prepare($sql);
    $stmt->execute($args);
    return $stmt->rowCount();
  }
  
  function check_S_Account(){
    $sql = "select * from Account where account_type = 'Customer' and email = :email and password = :password";
    $args = [':email'=>$this->email, ':password'=>$this->password];

    $stmt = S_accountModel::connect()->prepare($sql);
    $stmt->execute($args);
    return $stmt->rowCount();
  }

  function get_S_ID(){
    $sql = "select account_id, name from Account where account_type = 'Staff' and email = :email and password = :password";
    $args = [':email'=>$this->email, ':password'=>$this->password];

    $stmt = S_accountModel::connect()->prepare($sql);
    $stmt->execute($args);
    return $stmt;
  }

}
?>