<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RSVP - Sneaker District</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>
<body>


<section id="inner">
    <div class="background" id="image"></div>
    <canvas id="canvas" class="canvas"></canvas>
    <header>
        <nav>
            <ul>
                <li>
                    <div class="logo logo-sneakerdistrict"></div>
                </li>
                <li>
                    <div class="logo logo-company"></div>
                </li>
            </ul>
        </nav>
    </header>

    <figure id="figure-1">
        <img src="assets/images/sd-banner.png" alt="Sneaker District">
    </figure>

    <figure id="figure-2">
        <img src="assets/images/sneaker.png" alt="Adidas Nite Jogger">
    </figure>


    <div class="component rsvp-box">

        <form action="?" method="POST">
            <div class="grid">
                <fieldset>
                    <legend><h1>sneaker district</h1>
                        <span><h2>Adidas launch event</h2></span>
                    </legend>

                    <div class="icon not-visible">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                    <div class="succes-message hide">
                        <p></p>
                    </div>

                    <div class="fields">
                        <ul>
                            <li><a target="_blank"
                                   href="https://www.google.com/maps/place/Sneaker+District/@51.215836,4.3939847,18z/data=!3m1!4b1!4m5!3m4!1s0x47c3f6f3bb618735:0x9f2fdda474fc4756!8m2!3d51.215836!4d4.395079">
                                    <span class="detail-title">Location</span>
                                    <span>Kloosterstraat 55 <br> 2000 Antwerpen</span>
                                </a></li>
                            <li><a>
                                    <span class="detail-title">Date</span>
                                    <span>April 11, 2019</span>
                                </a></li>
                            <li><a>
                                    <span class="detail-title">Time</span>
                                    <span>20:00 - 23:00</span>
                                </a></li>
                        </ul>

                        <div class="field-form">

                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your name" required
                                   data-error-message="Name field is required.">

                            <span class="error-message name-error"></span>

                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" placeholder="Your email address" required
                                   data-error-message="Email field is required.">
                            <span class="error-message email-error"></span>

                            <h3>EVENT SUMMARY</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do llamco laboris nisi ut
                                aliquip
                            </p>
                        </div>
                        <button id="submit" class="submit-button" type="button" name="submit">RESERVE A SPOT</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
    <figure id="figure-3" class="not-visible">
        <img src="assets/images/nitejogger_transparent.png" alt="The Pulpit Rock">
    </figure>
    <div class="logo-company-mobile not-visible">
        <div class="company-logo"></div>
    </div>
</section>

</body>

<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/rsvp.js"></script>


</html>