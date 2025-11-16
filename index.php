<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pofu Photography</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.html">Pofu Photography</a></h1>
            <ul>
                <li><a href="photobooth.html">Photo Booth</a></li>
                <li><a href="backdrops.html">Backdrops</a></li>
                <li><a href="photography.html">Photography</a></li>
                <li><a href="https://pofuphotos.smugmug.com/Client-Photos-">Gallery</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="documentation.html">Documentation</a></li>
                <li><a href="sources.html">Sources</a></li>
            </ul>
        </nav>
    </header>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img1.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img2.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img3.jpg" style="width:100%">
            <div class="text">Caption Three</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <!-- The dots/circles -->
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <div class="wrapper">
        <div class="div1">
            <h1><i>Instant Photo Prints</i></h1>
            <p>Open Air Photo Booth with customized design prints for you and your guests to enjoy and take home as a souvenir. 
                This classic photobooth is a must at all events to add fun for all guests.</p>
        </div>
        <div class="div2">
            <h1><i>Portraits on White</i></h1>
            <p>Our B&W portraits are a timeless classic and is a photo worth putting in a frame and hanging as a memory at home. 
                Our booth uses a monochrome program to enhance the photo taken by the guest and produce a timeless keepsake.</p>
        </div>
        <div class="div3">
            <h2>Service Package</h2>
            <h2>$600</h2>
            <h4>
                2 hours of service<br><br>
                Double 2x6 Prints or Single 4x6 Prints<br><br>
                Includes Standard Setup and Takedown<br><br>
                Onsite Service Attendant<br><br>
                Custom Photo Template design<br><br>
                Online Gallery with Digital Download Delivery<br><br>
                Instand Digital Sharing for Guests via QR Codes<br><br>
                Additional Hours $150.00
            </h4>
        </div>
    </div>
    <footer>
        <h2>Photo Booth & Event Photography</h2>
        <ul>
            <li><a href="mailto:keith@pofuphotography.com">keith@pofuphotography.com</a></li><br>
            <li><a href="tel:604-799-4901">(604)799.4901</a></li><br>
            <li><a href="contact.html"><button class="order" id="order">Contact Us!</button></a></li><br>
            <li><p>New Westminster, BC, Canada</p></li>
        </ul>
    </footer>
</body>
</html>