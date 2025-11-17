<?php
    // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('validation.php');

  // Validate form submission
  validate();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pofu Photography</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <script src="index.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html"><img src="images/logo.png" style="width:30%"></a></li>
                <li><a href="photobooth.html">Photo Booth</a></li>
                <li><a href="photography.html">Photography</a></li>
                <li><a href="https://pofuphotos.smugmug.com/Client-Photos-">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="documentation.html">Documentation</a></li>
                <li><a href="sources.html">Sources</a></li>
            </ul>
        </nav>
    </header>
    <div class="forms">
        <h3>Feel free to contact me anytime if you have any questions or want further details about my services. I will get back to you within 24 hours :)</h3>
        <form action="contact.php" method="get">
            <fieldset>
                <h4>Name (required)</h4>
                <label>
                    First Name
                    <input type="text" name="fname" required>
                    <?php the_validation_message('fname'); ?>
                </label>
                <label>
                    Last Name
                    <input type="text" name="lname" required>
                    <?php the_validation_message('lname'); ?>
                </label>
                <label>
                    Email
                    <input type="email" name="email" required>
                    <?php the_validation_message('email'); ?>
                </label>
                <label>
                    Phone
                    <input type="tel" name="phone" required>
                    <?php the_validation_message('phone'); ?>
                </label>
            </fieldset>
            <fieldset>
                <h4>Event Location (required)</h4>
                <label>
                    Address
                    <input type="text" name="location" required>
                    <?php the_validation_message('address'); ?>
                </label>
                <label>
                    City
                    <input type="text" name="city" required>
                    <?php the_validation_message('city'); ?>
                </label>
                <label>
                    Province
                    <input type="text" name="province" required>
                    <?php the_validation_message('province'); ?>
                </label>
                <label>
                    Postal Code
                    <input type="text" name="postal">
                    <?php the_validation_message('postal'); ?>
                </label>
            </fieldset>
            <label>
                Day of Event
                <input type="date" name="date" required>
            </label>
            <label>
                Start Time of Event <br>*We will arrive 1 hour early for setup
                <input type="time" name="start" required>
            </label>
            <label>
                End Time of Event
                <input type="time" name="end" required>
            </label>
            <label>
                Service
                <select name="service" required>
                    <option value="photography">Event Photography</option>
                    <option value="wedding">Wedding Photography</option>
                    <option value="photobooth">Photo Booth</option>
                    <option value="other">Other</option>
                </select>
            </label>
            <label>
                Photo Booth 
            </label>
            <label>
                Additional Details
                <textarea id="details" name="details" rows="4" cols="50"></textarea>
            </label>
            <input type="submit" value="Submit">
        </form>
        <!-- Display the results -->
        <?php the_results(); ?>
    </div>
    <footer>
        <h2>Photo Booth & Event Photography</h2>
        <ul>
            <li><a href="mailto:keith@pofuphotography.com">keith@pofuphotography.com</a></li><br>
            <li><a href="tel:604-799-4901">(604)799.4901</a></li><br>
            <li><a href="www.instagram.com/pofuphotography/">Instagram</a></li><br>
            <li><a href="contact.php"><button class="order" id="order">Contact Us!</button></a></li><br>
            <li><p>New Westminster, BC, Canada</p></li>
        </ul>
    </footer>
</body>
</html>