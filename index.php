<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'database/database.php';

//connect to database: PHP Data object representing Database connection
$pdo = db_connect();
// submit response to database
handle_form_submission();


// Get comments from database
get_comments();
// Get commenters from database
get_commenters();

// include the template to display the page
include 'templates/index.html';