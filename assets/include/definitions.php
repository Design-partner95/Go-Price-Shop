<?php



//Server Information
$dbhost = "localhost";
$dbname = "dromproj_pricecompare";
$dbuser = "dromproj";
$dbpass = "jesus321";


  $username = $_SESSION['username'];

  $username = "";

//Point System

if(isset($_SESSION['cust_id'])){
  
  
  
  
  $curlevel = $result1['cur_level'];
  

//Error messages
$error1 = "Not able to execute SQL update"; //Possible mis-type, host down, or database corruption
$error2 = "Email was not able to send"; //Some issue with server most likely
$error3 = "Sent to a broken link"; //wrong referral, needs corrected ASAP
$error4 = "Status session not set";
$error5 = "User went to non-existing page";
//Status messages
$status1 = "Logged into website";
$status2 = "Logged out of website";
$status3 = "Requested username to be resent";
$status4 = "Requested password to be reset";












?>