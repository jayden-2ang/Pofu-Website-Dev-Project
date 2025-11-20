<?php
require 'config.php';

// Global result of form validation
$valid = false;
// Global array of validation messages. For valid fields, message is ""
$val_messages = Array("fName"=>"", "lName"=>"", "email"=>"", "phone"=>"", "address"=>"", "city"=>"", "province"=>"", "postal"=>"", "date"=>"", "start"=>"", "end"=>"", "service"=>"");

// Should return a PDO
function db_connect() {

  try {
    // try to open database connection using constants set in config.php
    // return $pdo;

    $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}

// Check each field to make sure submitted data is valid. If no boxes are checked, isset() will return false
function validate()
{
    global $valid;
    global $val_messages;
    $fName_valid = false;
    $lName_valid = false;
    $email_valid = false;
    $phone_valid = false;
    $address_valid = false;
    $city_valid = false;
    $province_valid = false;
    $postal_valid = false;
    $date_valid = false;
    $start_valid = false;
    $end_valid = false;
    $service_valid = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      //First Name Validation
      if(ctype_upper(substr($_POST['fName'], 0, 1))){
        $fName_valid = true;
      }
      else{
        $val_messages['fName'] = "<div class='failure-message'>Please make sure the first letter of your name is capitalized.</div>";
      }
      //Last Name Validation
      if(ctype_upper(substr($_POST['lName'], 0, 1))){
        $lName_valid = true;
      }
      else{
        $val_messages['lName'] = "<div class='failure-message'>Please make sure the first letter of your last name is capitalized.</div>";
      }
      //Email Validation
      if(preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $_POST['email'])){
        $email_valid = true;
      }
      else {
        $val_messages['email'] = "<div class='failure-message'>Please make sure that you input a proper email address.</div>";
      }
      //Phone Number Validation
      if(preg_match('/^\d{3}\d{3}\d{4}$/', $_POST['phone'])){
        $phone_valid = true;
      }
      else{
        $val_messages['phone'] = "<div class='failure-message'> Please make sure your phone number follows the format 1234567890.</div>";
      }
      //Address Validation
      if(strlen($_POST['address']) > 5){
        $address_valid = true;
      }
      else{
        $val_messages['address'] = "<div class='failure-message'> Please make sure your address has at least 5 characters.</div>";
      }
      //City Validation
      if(strlen($_POST['city']) > 5){
        $city_valid = true;
      }
      else{
        $val_messages['city'] = "<div class='failure-message'> Please make sure your city has at least 5 characters.</div>";
      }
      //Province Validation
      if(strlen($_POST['province']) == 2){
        $province_valid = true;
      }
      else{
        $val_messages['province'] = "<div class='failure-message'> Please make sure your province has 2 characters.</div>";
      }
      //Postal Code Validation
      if(preg_match('/^([A-Za-z]\d[A-Za-z]) ?(\d[A-Za-z]\d)$/', $_POST['postal'])){
        $postal_valid = true;
      }
      else{
        $val_messages['postal'] = "<div class='failure-message'> Please make sure your postal code follows the format A1A 1A1.</div>";
      }
      //Date Validation
      if(isset($_POST['date'])){
        $date_valid = true;
      }
      else{
        $val_messages['date'] = "<div class='failure-message'>Please make sure that you input a valid date.</div>";
      }
      //Start Time Validation
      if(isset($_POST['start'])){
        $start_valid = true;
      }
      else{
        $val_messages['start'] = "<div class='failure-message'>Please make sure that you select a starting time for your event.</div>";
      }
      //End Time Validation
      if(isset($_POST['end'])){
        $end_valid = true;
      }
      else{
        $val_messages['end'] = "<div class='failure-message'>Please make sure that you select a ending time for your event.</div>";
      }
      //Service Validation
      if(isset($_POST['service'])){
        $service_valid = true;
      }
      else{
        $val_messages['service'] = "<div class='failure-message'>Please make sure that you select a service.</div>";
      }
      //Full Validation
      if($fName_valid && $lName_valid && $email_valid && $phone_valid && $address_valid && $city_valid && $province_valid && $postal_valid && $date_valid && $start_valid && $end_valid && $service_valid){
        $valid = true;
      }
    }
}

// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type) {
  global $valid;
  global $val_messages;

  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if(isset($type) && $valid == false){
      echo $val_messages[$type];
      
    }
  }
}

// Handle form submission
function handle_form_submission() {
  global $pdo;
    $sql = "INSERT INTO responses (FName, LName, Email, Phone, Address, City, Province, PostalCode, Date, Start, End, Service, Backdrop, Details) VALUES (:fName, :lName, :email, :phone, :address, :city, :province, :postal, :date, :start, :end, :service, :backdropName, :details)";
    
    $statement = $pdo->prepare($sql);

    $statement->bindValue(':fName', $_POST['fName']);
    $statement->bindValue(':lName', $_POST['lName']);
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':phone', $_POST['phone']);
    $statement->bindValue(':address', $_POST['address']);
    $statement->bindValue(':city', $_POST['city']);
    $statement->bindValue(':province', $_POST['province']);
    $statement->bindValue(':postal', $_POST['postal']);
    $statement->bindValue(':date', $_POST['date']);
    $statement->bindValue(':start', $_POST['start']);
    $statement->bindValue(':end', $_POST['end']);
    $statement->bindValue(':service', $_POST['service']);
    $statement->bindValue(':backdropName', $_POST['backdropName'] ?? '');
    $statement->bindValue(':details', $_POST['details'] ?? '');
    $statement->execute();
    $submitMessage = "Thank You! Your response has been submitted.";
    echo "<script>alert('$submitMessage');</script>";
    header('Location: index.html');
    exit();
}
?>