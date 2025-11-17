<?php
require 'config.php';

// Should return a PDO
function db_connect() {

  try {
    // TODO
    // try to open database connection using constants set in config.php
    // return $pdo;

    $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $user = DBUSER;
    $pass = DBPASS;

    $pdo = new PDO($connString,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
    // $pdo = null;
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}

// Handle form submission
function handle_form_submission() {
  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // TODO
    if(isset($_POST['email']) && isset($_POST['mood']) && isset($_POST['comment'])){

      $sql = "INSERT INTO comments (date, mood, email, commentText) VALUES (:date, :mood, :email, :commentText)";
      
      $statement = $pdo->prepare($sql);

      $statement->bindValue(':date', date('Y-m-d'));
      $statement->bindValue(':mood', $_POST['mood']);
      $statement->bindValue(':email', $_POST['email']);
      $statement->bindValue(':commentText', $_POST['comment']);
      $statement->execute();
      header('Location: index.php');
    }
  }
}

// Get all comments from database and store in $comments
function get_comments() {
  global $pdo;
  global $comments;
  $filter = $_GET['filter'];

  //TODO
  $sql = "SELECT * FROM comments ORDER BY ID DESC";

  if($filter != ''){
    $sql = "SELECT * FROM comments WHERE email = '$filter' ORDER BY ID DESC";
  }

  $result = $pdo->query($sql);
  while($row = $result->fetch()){
    $comments[] = $row;
  }
}

// Get unique email addresses and store in $commenters
function get_commenters() {
  global $pdo;
  global $commenters;

  //TODO
  $sql = "SELECT DISTINCT email FROM comments";

  $result = $pdo->query($sql);
  while($row = $result->fetch()){
    $commenters[] = $row;
  }
}