<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'database/database.php';

//connect to database: PHP Data object representing Database connection
$pdo = db_connect();
// submit response to database
handle_form_submission();

// include the template to display the page
include 'templates/index.html';