<?php
    // error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Import functions
    require '../database/database.php';

    $pdo = db_connect();      
    validate();               

    if ($valid) {
        handle_form_submission();  
    }

    the_results();         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pofu Photography</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html"><img src="../images/logo.png" style="width:20%"></a></li>
                <li><a href="photobooth.html">Photo Booth</a></li>
                <li><a href="photography.html">Photography</a></li>
                <li><a href="https://pofuphotos.smugmug.com/Client-Photos-">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="documentation.html">Documentation</a></li>
                <li><a href="sources.html">Sources</a></li>
            </ul>
        </nav>
    </header>
    <form action="contact.php" method="get">
        <div class="forms">
            <h3>Feel free to contact me anytime if you have any questions or want further details about my services. I will get back to you within 24 hours :)</h3>
            <fieldset id="forms1">
                <h2>Name (required)</h2>
                <label>
                    <p>First Name</p>
                    <input type="text" name="fName" required>
                    <?php the_validation_message('fName'); ?>
                </label>
                <label>
                    <p>Last Name</p>
                    <input type="text" name="lName" required>
                    <?php the_validation_message('lName'); ?>
                </label>
                <label>
                    <p>Email</p>
                    <input type="email" name="email" required>
                    <?php the_validation_message('email'); ?>
                </label>
                <label>
                    <p>Phone</p>
                    <input type="tel" name="phone" required>
                    <?php the_validation_message('phone'); ?>
                </label>
            </fieldset>
            <fieldset id="forms2">
                <h2>Event Location (required)</h2>
                <label>
                    <p>Address</p>
                    <input type="text" name="location" required>
                    <?php the_validation_message('address'); ?>
                </label>
                <label>
                    <p>City</p>
                    <input type="text" name="city" required>
                    <?php the_validation_message('city'); ?>
                </label>
                <label>
                    <p>Province</p>
                    <input type="text" name="province" required>
                    <?php the_validation_message('province'); ?>
                </label>
                <label>
                    <p>Postal Code</p>
                    <input type="text" name="postal" required>
                    <?php the_validation_message('postal'); ?>
                </label>
            </fieldset>
            <fieldset id="forms3">
                <label>
                    <p>Day of Event</p>
                    <input type="date" name="date" required>
                    <?php the_validation_message('date'); ?>
                </label>
                <label>
                    <p>Start Time of Event</p>
                    <h7>*We will arrive 1 hour early for setup</h7><br>
                    <input type="time" name="start" required>
                    <?php the_validation_message('start'); ?>
                </label>
                <label>
                    <p>End Time of Event</p>
                    <input type="time" name="end" required>
                    <?php the_validation_message('end'); ?>
                </label>
                <label>
                    <p>Service</p>
                    <select name="service" required>
                        <option value="">Select a Service</option>
                        <option value="photography">Event Photography</option>
                        <option value="wedding">Wedding Photography</option>
                        <option value="photobooth">Photo Booth</option>
                        <option value="other">Other</option>
                    </select>
                    <?php the_validation_message('service'); ?>
                </label>
                <label>
                    <p>Photo Booth Backdrop</p>
                    <select id="backdropType">
                        <option value="">Select a type of Backdrop</option>
                        <option value="sparkle">Sparkle Backdrops</option>
                        <option value="sequin">Sequin Backdrops</option>
                        <option value="deco">Deco Backdrops</option>
                        <option value="light">Light Backdrops</option>
                        <option value="floral">Floral Backdrops</option>
                        <option value="unique">Unique Backdrops</option>
                        <option value="brushed">Brushed Backdrops</option>
                        <option value="festive">Festive Backdrops</option>
                    </select>
                </label>
                <label id="name">
                    <select id="backdropName" name="backdropName">
                        <option value="">Select the name of your backdrop</option>
                    </select>
                </label>
                <label>
                    <p>Additional Details</p>
                    <textarea id="details" name="details"></textarea>
                </label>
                <input type="submit" value="Submit" id="submit">
            </fieldset>
        </div>
    </form>
    <!-- Display the results -->
    <?php the_results(); ?>
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
    <script>
        const backdropSelect = document.getElementById('backdropType');
        const nameSelect = document.getElementById('backdropName');

        // Define your data structure
        const data = {
            sparkle: ['Silver Sparkle', 'Gold Sparkle', 'Black Sparkle', 'Sapphire Sparkle', 'Dark Glimmer', 'Rose Gold Glitter'],
            sequin: ['Black Sequin', 'Gold Sequin', 'Red Sequin', 'Silver Sequin', 'Rose Gold Sequin', 'Unicorn Sequin', 'Crimson Red Sequin', 'Deep Gold Sequin', 'White Petal Sequin'],
            deco: ['White & Gold Deco', 'Black & Gold Deco', 'Blue & Yellow Deco', 'Mixed Deco'],
            light: ['Warm Lights', 'Bokeh Lights', 'Bright Lights', 'Wood with Lights'],
            floral: ['Wood with Vines', 'Flower Blossom', 'Barn Door with Vines', 'Green Bush', 'White Roses', 'Light Pink Flowers'],
            unique: ['White & Gold Mermaid', 'White Marble', 'Golden Lattice'],
            brushed: ['Brushed White to Purple', 'Brushed Turquoise to Indigo', 'Brushed White to Black'],
            festive: ['Classic Christmas', 'By the Fireplace', 'Christmas Ornaments', 'Gold Snowflakes Ornaments', 'Christmas Wreath', 'Glittery Red Snowflakes']
        };

        backdropSelect.addEventListener('change', function() {
            const selectedCategory = this.value; // Get the value of the selected category
            nameSelect.innerHTML = '<option value="">Select an Item</option>'; // Clear existing options

            if (selectedCategory) {
                const items = data[selectedCategory]; // Get items for the selected category
                if (items) {
                    items.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.toLowerCase(); // Use lowercase for value
                        option.textContent = item;
                        nameSelect.appendChild(option);
                    });
                }
            }
        });
    </script>
</body>
</html>