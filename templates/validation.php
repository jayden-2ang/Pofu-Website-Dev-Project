<?php
// Global result of form validation
$valid = false;
// Global array of validation messages. For valid fields, message is ""
$val_messages = Array("fname"=>"", "lname"=>"", "email"=>"", "phone"=>"", "address"=>"", "city"=>"", "province"=>"", "postal"=>"");

// Output the results if all fields are valid.
function the_results()
{
  global $valid;

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if($valid == true){
      echo "<p>Thank you!<p>";
    }
  }
}

// Check each field to make sure submitted data is valid. If no boxes are checked, isset() will return false
function validate()
{
    global $valid;
    global $val_messages;
    $email_valid = false;
    $date_valid = false;
    $animals_valid = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      // Use the following patterns to validate email and date or come up with your own.
      // email: '#^(.+)@([^\.].*)\.([a-z]{2,})$#'
      // date: '#^\d{4}/((0[1-9])|(1[0-2]))/((0[1-9])|([12][0-9])|(3[01]))$#'
      if(preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $_POST['email']) == true){
        $email_valid = true;
      }
      else {
        $val_messages['email'] = "<div class='failure-message'>Please make sure that you input a proper email address.</div>";
      }

      if(preg_match('#^\d{4}/((0[1-9])|(1[0-2]))/((0[1-9])|([12][0-9])|(3[01]))$#', $_POST['date']) == true){
        $date_valid = true;
      }
      else{
        $val_messages['date'] = "<div class='failure-message'>Please make sure that you input a valid date.</div>";
      }

      if(isset($_POST['animals']) && count($_POST['animals']) >= 3){
        $animals_valid = true;
      }
      else{
        $val_messages['animals'] = "<div class='failure-message'>Please make sure that you select at least 3 animals.</div>";
      }

      if($email_valid && $date_valid && $animals_valid == true){
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